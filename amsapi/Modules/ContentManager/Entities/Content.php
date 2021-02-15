<?php

namespace Modules\ContentManager\Entities;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [];

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }

    public function posts(){
        return $this->belongsToMany('Modules\Post\Entities\Post','post_contents');
    }

    public function albums(){
        return $this->belongsToMany('Modules\Gallery\Entities\Album','album_contents');
    }

    public function content_category(){
        return $this->belongsTo('Modules\ContentManager\Entities\ContentCategory','content_category_id');
    }
}
