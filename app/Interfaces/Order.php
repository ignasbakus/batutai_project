<?php

namespace App\Interfaces;

use App\Trampolines\TrampolineOrderData;

interface Order
{
    public function update(TrampolineOrderData $trampolineOrderData);

    public function delete(TrampolineOrderData $trampolineOrderData);

    public function read($orderID);
}
