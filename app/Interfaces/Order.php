<?php

namespace App\Interfaces;

use App\Trampolines\TrampolineOrderData;

interface Order
{
    public function update();

    public function delete(TrampolineOrderData $trampolineOrderData);
}
