<?php

namespace App\Interfaces;

use App\Trampolines\TrampolineOrderData;

interface Order
{
    public function create(TrampolineOrderData $trampolineOrderData);
    public function update(TrampolineOrderData $trampolineOrderData);

    public function delete($orderID);

    public function read($orderID);
}
