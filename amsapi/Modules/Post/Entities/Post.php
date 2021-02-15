<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'shoulder',
        'headline',
        'hanger',
        'athor_id',
        'reporter_id',
        'featured_image_id',
        'featured_video_id',
        'video_position',
        'share_at',
        'published_at',
        'status',
        'Instant_article',
        'created_by',
        'updated_by'
    ];

    protected $table = 'posts';

    // tag *
    // topic *
    // category *
    // area *
    // content *
    // scroll
    public function tags(){

        return $this->belongsToMany('Modules\Setting\Entities\Tag','post_tags');
    }
    public function topics(){

        return $this->belongsToMany('Modules\Setting\Entities\Topic','post_topics');
    }

    public function areas(){

        return $this->belongsToMany('Modules\Setting\Entities\Area','post_areas');
    }

    public function categories(){

        return $this->belongsToMany('Modules\Setting\Entities\Category','post_categories');
    }


    public function scrolls(){

        return $this->belongsToMany('Modules\Setting\Entities\Scroll','post_scrolls');
    }


    public function contents(){
        return $this->belongsToMany('Modules\ContentManager\Entities\Content','post_contents');
    }


}
