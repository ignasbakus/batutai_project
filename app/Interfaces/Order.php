<?php

namespace App\Interfaces;

use App\Trampolines\TrampolineOrderData;
use Stripe\Forwarding\Request;

interface Order
{
    public function create(TrampolineOrderData $trampolineOrderData);
    public function update(TrampolineOrderData $trampolineOrderData);

    public function delete($request);

    public function read($orderID);
}
