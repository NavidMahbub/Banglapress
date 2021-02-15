<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class PostContent extends Model
{
    protected $fillable = [
        'post_id',
        'content_id',
        'type',
        'created_by',
        'updated_by'
    ];

    protected $table = 'post_contents';

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
