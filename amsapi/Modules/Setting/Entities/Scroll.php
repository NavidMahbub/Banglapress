<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Scroll extends Model
{
    protected $fillable = [];
    protected $table = 'scrolls';

    public function child(){
        return $this->hasMany('Modules\Setting\Entities\Scroll','parent_id');
    }

    public function posts(){
        return $this->belongsToMany('Modules\Post\Entities\Post','post_scrolls');
    }
}
