<?php

namespace App\Trampolines;

use App\Interfaces\Order;

class TrampolineOrder implements Order
{

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete(TrampolineOrderData $trampolineOrderData): void
    {
        $order = \App\Models\Order::find($trampolineOrderData->orderID);
        $order->trampolines()->delete();
        $order->client()->delete();
        $order->address()->delete();
        $order->delete();
    }
}
