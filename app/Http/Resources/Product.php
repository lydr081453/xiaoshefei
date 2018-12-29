<?php

namespace App\Http\Resources;
use App\Models\Brand;
use Illuminate\Http\Resources\Json\JsonResource;
use Log;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //Log::info($this.toArray());
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'title'=>$this->title,
            'amount'=>$this->amount,
            'original'=>$this->original,
            'unit'=>$this->unit,
            'stock'=>$this->stock,
            'brandid'=>$this->brandid,
            //'brandname'=>$this->brand->name,
            'picurl'=>$this->picurl,
        ];
    }
}
