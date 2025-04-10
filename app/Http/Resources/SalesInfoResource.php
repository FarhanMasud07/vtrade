<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $orginalResult = parent::toArray($request);
        $orginalResult['sales_at']  =  date('Y-m-d', strtotime($orginalResult['sales_at']));
        return $orginalResult;
    }
}
