<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Trampoline;
use App\Trampolines\BaseTrampoline;
use App\Trampolines\DataTablesProcessing;
use App\Trampolines\OccupationTimeFrames;
use App\Trampolines\TrampolineOrder;
use App\Trampolines\TrampolineOrderData;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{

    public function adminGetDatatable(): JsonResponse
    {
        $Orders = (new DataTablesProcessing())->getPaginatedData(
            new Order(),
            [
                'Trampolines',
                'Client',
                'Address'
            ],
            \request()->get('length', 0),
            \request()->get('start', 0),
            \request()->get('order', [])
        );

        return response()->json([
            'status' => true,
            'DATA' => $Orders->data,
            'draw' => \request()->get('draw'),
            'list' => $Orders->List,
            'recordsTotal' => $Orders->recordsTotal,
            'recordsFiltered' => $Orders->recordsFiltered,
        ]);

    }

    public function adminGetIndex(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('orders.private.admin_order_table');
    }

    public function publicGetIndex(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $Trampolines = (new Trampoline())->newQuery()->whereIn('id',\request()->get('trampoline_id',[]))->get();
        $Availability = (new BaseTrampoline())->getAvailability($Trampolines, Carbon::now()->startOfDay(), true);
        foreach ($Trampolines as $trampoline) {
            $trampoline->rental_start = Carbon::parse($Availability[0]->start)->format('Y-m-d');
            $trampoline->rental_end = Carbon::parse($Availability[0]->end)->format('Y-m-d');
        }
        return view ('orders.public.order',[
            'Availability' => $Availability,
            'Occupied' => (new BaseTrampoline())->getOccupation($Trampolines, OccupationTimeFrames::MONTH, new Order() , true),
            'Trampolines' => $Trampolines,
            'Dates' => (object)[
                'CalendarInitial'=>Carbon::now()->format('Y-m-d')
            ]
        ]);
    }

    public function publicGetCalendar(Request $request): JsonResponse
    {
        $occupied = (new BaseTrampoline())->getOccupationDataForTargetDate($request);
        return response()->json([
            'status' => true,
            'occupied' => $occupied
        ]);
    }

    public function orderGet(): JsonResponse
    {
        return \response()->json([
            'status' => true,
            'order' => (new TrampolineOrder())->read(request()->get('order_id'))
        ]);
    }

    public function orderInsert(Request $request): JsonResponse
    {
        $NewOrderEventBackgroundColor = 'green';
        $NewOrderEventTitle = 'Jūsų užsakymas pateiktas';
        $Order = (new TrampolineOrder())->create((new TrampolineOrderData($request)));
        $trampolines_id = [];
        foreach ($request->get('trampolines', []) as $Trampoline) {
            $trampolines_id[] = $Trampoline['id'];
        }
        $Trampolines = (new Trampoline())->newQuery()->whereIn('id', $trampolines_id)->get();
        if (!$Order->status) {
            $Events = [];
        } else {
            $Events = [
                (object)[
                    'id' => $Order->Order->id,
                    'extendedProps' => [
                        'trampolines' => $Trampolines,
                        'order' => $Order->Order,
                        'order_id' => $Order->Order->id
                    ],
                    'title' => $NewOrderEventTitle,
                    'start' => $Order->OrderTrampolines[0]->rental_start,
                    'end' => $Order->OrderTrampolines[0]->rental_end,
                    'backgroundColor' => $NewOrderEventBackgroundColor
                ]
            ];
        }

        return response()->json([
            'failed_input' => $Order->failedInputs,
            'status' => $Order->status,
            'Occupied' => (new BaseTrampoline())->getOccupation(
                $Trampolines,
                OccupationTimeFrames::MONTH,
                $Order->Order,
                true
            ),
            'Events' => $Events
        ]);
    }

    public function orderUpdate(Request $request): JsonResponse
    {
        return response()->json((new TrampolineOrder())->update(new TrampolineOrderData($request)));
    }

    public function orderDelete(Request $request): JsonResponse
    {
        //$DeleteResult = (new TrampolineOrder())->delete((new TrampolineOrderData()));
//        dd($request);
        $deleteResult = (new TrampolineOrder())->delete($request->input('orderID'));
        return response()->json($deleteResult);
    }
}
