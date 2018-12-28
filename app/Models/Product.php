<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brandid');
    }
}
