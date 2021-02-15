<?php

namespace Modules\FrontEnd\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'shoulder',
        'headline',
        'hanger',
        'athor_id',
        'reporter_id',
        'video_position',
        'share_at',
        'published_at',
        'status',
        'Instant_article',
        'created_by',
        'updated_by'
    ];

    protected $table = 'posts';

    public function FeaturedImage()
    {
        return $this->belongsTo('Modules\FrontEnd\Entities\Content', 'featured_image_id','id')->select('file_name','title','type');
    }

    public function FeaturedVideo()
    {
        return $this->belongsTo('Modules\FrontEnd\Entities\Content', 'featured_video_id','id')->select('file_name','title','type');
    }
   
    public function PostContent()
    {
        return $this->hasManyThrough('Modules\FrontEnd\Entities\Content','Modules\FrontEnd\Entities\PostContent','post_id','id','id','content_id');
    }
    public function PostTag()
    {
        return $this->hasManyThrough('Modules\FrontEnd\Entities\Tag','Modules\FrontEnd\Entities\PostTag','post_id','id','id','tag_id');
    }
    public function PostArea()
    {
        return $this->hasManyThrough('Modules\FrontEnd\Entities\Area','Modules\FrontEnd\Entities\PostArea','post_id','id','id','area_id');
    }
    public function PostCategory()
    {
        return $this->hasManyThrough('Modules\FrontEnd\Entities\Category','Modules\FrontEnd\Entities\PostCategory','post_id','id','id','category_id');
    }

    public function Author(){
        return $this->belongsTo('App\User','author_id');
    }
    public function Reporter(){
        return $this->belongsTo('App\User','reporter_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }
}
