<?php

namespace App\Trampolines;

use Illuminate\Http\Request;

class BaseTrampolineData
{
    public int $trampolineID;
    public string $trampolineColor;
    public string $trampolineDescription;
    public float $trampolineHeight;
    public float $trampolineLength;
    public string $trampolineName;
    public float $trampolinePrice;
    public float $trampolineWidth;
    public float $trampolineRentalDuration;
    public bool $trampolineActivity;
    public string $trampolineRentalDurationType;

    public function __construct(Request $request = null)
    {
        if (!is_null($request)) {
            $this->trampolineID = $request->get("trampolineID",0);
            $this->trampolineColor = $request->get("trampolineColor",'');
            $this->trampolineHeight = $request->get("trampolineHeight",0);
            $this->trampolineLength = $request->get("trampolineLength",0);
            $this->trampolineName = $request->get("trampolineName",'');
            $this->trampolinePrice = $request->get("trampolinePrice",0);
            $this->trampolineWidth = $request->get("trampolineWidth",0);
            $this->trampolineDescription = $request->get("trampolineDescription",'');
            switch ($request->get("trampolineActivity")) {
                case 'true' :
                    $this->trampolineActivity = true;
                    break;
                case 'false' :
                    $this->trampolineActivity = false;
                    break;
            }
        }
        $this->trampolineRentalDuration = config('trampolines.rental_duration');
        $this->trampolineRentalDurationType = config('trampolines.rental_duration_type');
    }

}
