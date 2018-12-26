<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Traits\AdminBuilder;

class Category extends Model
{

        use AdminBuilder, ModelTree {
        ModelTree::boot as treeBoot;
    }

    protected $table= 'categories';
    //
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
