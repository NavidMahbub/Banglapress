<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [];

    public function thumnail(){
        return $this->hasMany('Modules\Gallery\Entities\AlbumContent','album_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }

    public function contents(){
        return $this->belongsToMany('Modules\ContentManager\Entities\Content','album_contents');
    }
}
