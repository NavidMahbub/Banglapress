<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'title',
        'parent_id',
        'created_by',
        'updated_by'
    ];

    protected $table = 'areas';

    public function parent(){
        return $this->belongsTo('Modules\Setting\Entities\Area','parent_id');
    }
    public function child(){
        return $this->hasMany('Modules\Setting\Entities\Area','parent_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }

    public function posts(){
        return $this->belongsToMany('Modules\Post\Entities\Post','post_areas');
    }
}
