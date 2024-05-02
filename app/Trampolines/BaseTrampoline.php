<?php

namespace App\Trampolines;

use App\Interfaces\Trampoline;
use App\Models\Parameter;
use Faker\Provider\Base;

class BaseTrampoline implements Trampoline
{

    public function register(BaseTrampolineData $TrampolineData): void
    {
        $Trampoline = \App\Models\Trampoline::create([
            'title' => $TrampolineData->trampolineName,
            'description' => $TrampolineData->trampolineDescription,
        ]);
        Parameter::create([
            'trampolines_id' => $Trampoline->id,
            'color' => $TrampolineData->trampolineColor,
            'height' => $TrampolineData->trampolineHeight,
            'width' => $TrampolineData->trampolineWidth,
            'length' => $TrampolineData->trampolineLength,
            'rental_duration' => $TrampolineData->trampolineRentalDuration,
            'rental_duration_type' => $TrampolineData->trampolineRentalDurationType,
            'activity' => $TrampolineData->trampolineActivity,
            'price' => $TrampolineData->trampolinePrice
        ]);
    }

    public function update(BaseTrampolineData $TrampolineData): void
    {
        $trampoline = \App\Models\Trampoline::updateOrCreate(
            [
                'id' => $TrampolineData->trampolineID
            ],
            [
                'title' => $TrampolineData->trampolineName,
                'description' => $TrampolineData->trampolineDescription,
            ]
        );
        Parameter::updateOrCreate(
            [
                'trampolines_id' => $trampoline->id,
            ],
            [
                'color' => $TrampolineData->trampolineColor,
                'height' => $TrampolineData->trampolineHeight,
                'width' => $TrampolineData->trampolineWidth,
                'length' => $TrampolineData->trampolineLength,
                'rental_duration' => $TrampolineData->trampolineRentalDuration,
                'rental_duration_type' => $TrampolineData->trampolineRentalDurationType,
                'activity' => $TrampolineData->trampolineActivity,
                'price' => $TrampolineData->trampolinePrice
            ]
        );

    }

    public function delete(BaseTrampolineData $TrampolineData): void
    {
        $trampoline = \App\Models\Trampoline::find($TrampolineData->trampolineID);
        $trampoline->Parameter()->delete();
        $trampoline->delete();
    }

    public function read($TrampolineID): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return \App\Models\Trampoline::with('Parameter')->find($TrampolineID);
    }

    public function rent()
    {
        // TODO: Implement rent() method.
    }

    public function cancelRent()
    {
        // TODO: Implement cancelRent() method.
    }

    public function makeRentable()
    {
        // TODO: Implement makeRentable() method.
    }

    public function onHold()
    {
        // TODO: Implement onHold() method.
    }
}
