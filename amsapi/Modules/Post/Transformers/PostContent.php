<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class PostContent extends Resource
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
            'post_id'=>$this->post_id,
            'content_id'=>$this->content_id,
            'type'=>$this->type,
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}