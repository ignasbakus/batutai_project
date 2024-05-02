<?php

namespace App\Trampolines\Services;

use App\Trampolines\Trampoline;

class TrampolineRentService extends Trampoline
{

    public function rentTrampoline($RentData) {

        $this->rent();

    }

}
