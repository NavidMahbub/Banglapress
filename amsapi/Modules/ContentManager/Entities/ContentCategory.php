<?php

namespace Modules\ContentManager\Entities;

use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    protected $table = 'content_categories';
    protected $fillable = [];
    
    public function news_posts(){
        return $this->belongsToMany('Modules\Post\Entities\NewsPost','news_category');
    }

    public function children(){
        return $this->hasMany('Modules\ContentManager\Entities\ContentCategory','parent_id');
    }

    public function contents(){
        return $this->hasMany('Modules\ContentManager\Entities\Content','content_category_id');
    }

}
