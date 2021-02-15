<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [];

    public function posts(){
        return $this->belongsToMany('Modules\Post\Entities\Post','post_tags');
    }
}
