<?php

namespace App\Trampolines;

use App\Interfaces\Order;
use App\Models\Client;
use App\Models\ClientAddress;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class TrampolineOrder implements Order
{

    public array $Errors;
    public array $receivedParams;
    public array $Messages;
    public bool $status;
    public \Illuminate\Support\MessageBag $failedInputs;

    public function __construct()
    {
        $this->failedInputs = new MessageBag();
        $this->receivedParams = [];
        $this->Errors = [];
        $this->Messages = [];
    }

    public function update(TrampolineOrderData $trampolineOrderData): static
    {
        if (!$trampolineOrderData->ValidationStatus) {
            $this->failedInputs = $trampolineOrderData->failedInputs;
            $this->status = false;
            return $this;
        }
        $Order = \App\Models\Order::updateOrCreate(
            [
                'id' => $trampolineOrderData->orderID
            ],
            [
                /*Visi parametrai*/
            ]
        );
        Client::updateOrCreate(
            [
                'id' => $Order->client_id
            ],
            [
                'name' => $trampolineOrderData->CustomerName,
                'surname' => $trampolineOrderData->CustomerSurname,
                'email' => $trampolineOrderData->CustomerEmail,
                'phone' => $trampolineOrderData->CustomerPhone
            ]
        );
        ClientAddress::updateOrCreate(
            [
                'clients_id' => $Order->delivery_address_id,
            ],
            [
                'address_street' => $trampolineOrderData->Address,
                'address_town' => $trampolineOrderData->City,
                'address_postcode' => $trampolineOrderData->PostCode
            ]
        );
        $this->status = true;
        $this->Messages[] = 'Užsakymas atnaujintas sėkmingai !';
        return $this;
    }

    public function delete(TrampolineOrderData $trampolineOrderData): static
    {
        try {
            $order = \App\Models\Order::find($trampolineOrderData->orderID);
//            $order->trampolines()->delete();
//            $order->client()->delete();
//            $order->address()->delete();
//            $this->status = $order->delete();
            $this->Messages[] = 'Užsakymas #'.$trampolineOrderData->orderID.' ištrintas sėkmingai !';
        } catch (\Exception $exception) {
            $this->Errors[] = 'Trinant užsakymą įvyko klaida : '.$exception->getMessage();
            $this->status = false;
        }
        return $this;
    }


    public function read($orderID): Model|Collection|Builder|array|null
    {
        return \App\Models\Order::with('client', 'address')->find($orderID);
    }
}
