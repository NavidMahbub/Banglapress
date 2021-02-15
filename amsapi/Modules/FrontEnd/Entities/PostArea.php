<?php

namespace Modules\FrontEnd\Entities;

use Illuminate\Database\Eloquent\Model;

class PostArea extends Model
{
    protected $fillable = [
        'post_id',
        'area_id',
        'created_by',
        'updated_by'
    ];

    protected $table = 'post_areas';

    public function post(){
        return $this->belongsTo('Modules\Post\Entities\Post','post_id');
    }


    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }
}
