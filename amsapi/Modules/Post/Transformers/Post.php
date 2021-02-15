<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use App\User ;
class Post extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'shoulder'=>$this->shoulder,
            'headline'=>$this->headline,
            'hanger'=>$this->hanger,
            'athor_id'=>$this->athor_id,
            'reporter_id'=>$this->reporter_id,
            'featured_image_id'=>$this->featured_image_id,
            'featured_video_id'=>$this->featured_video_id,
            'video_position'=>$this->video_position,
            'share_at'=>$this->share_at,
            'published_at'=>$this->published_at,
            'status'=>$this->status,
            'Instant_article'=>$this->Instant_article,
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

    }
}
