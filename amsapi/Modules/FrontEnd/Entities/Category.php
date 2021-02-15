<?php

namespace Modules\FrontEnd\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [];

     public function parent(){
        return $this->belongsTo('Modules\Setting\Entities\Category','parent_id');
    }
    public function child(){
        return $this->hasMany('Modules\Setting\Entities\Category','parent_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }

    public function posts(){
        return $this->belongsToMany('Modules\Post\Entities\Post','post_categories');
    }
}
