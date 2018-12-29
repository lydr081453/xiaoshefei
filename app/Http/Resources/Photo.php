<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Photo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'id'=>$this->id,
                'photourl'=>$this->photourl,
                'title'=>$this->title,
                'key'=>$this->key,
                'linkurl'=>$this->linkurl,
                'type'=>$this->type,
        ];
    }
}
