<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Setting\Transformers\Topic as TopicResource;

class Topic extends Resource
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
            'id'=> $this->id,
            'label'=> $this->title,
            'parent_id'=> $this->parent_id,
            'children'   => TopicResource::collection($this->child),
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
