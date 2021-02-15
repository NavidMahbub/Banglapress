<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable = [
        'post_id',
        'tag_id',
        'created_by',
        'updated_by'
    ];

    protected $table = 'post_tags';

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
