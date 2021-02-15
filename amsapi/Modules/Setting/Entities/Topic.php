<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title',
        'cover',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $table = 'topics';

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }

    public function posts(){
        return $this->belongsToMany('Modules\Post\Entities\Post','post_topics');
    }
    // todo 
    public function parent(){
        return $this->belongsTo('Modules\Setting\Entities\Topic','parent_id');
    }
    public function child(){
        return $this->hasMany('Modules\Setting\Entities\Topic','parent_id');
    }
}
