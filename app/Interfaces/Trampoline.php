<?php

namespace App\Interfaces;

use App\Trampolines\BaseTrampolineData;
use App\Trampolines\TrampolineOrderData;

interface Trampoline
{
    public function register(BaseTrampolineData $TrampolineData);

    public function update(BaseTrampolineData $TrampolineData);

    public function delete(BaseTrampolineData $TrampolineData);

    public function read($TrampolineID);

    public function rent(TrampolineOrderData $trampolineOrderData);

    public function cancelRent();

    public function makeRentable();

    public function onHold();
}
