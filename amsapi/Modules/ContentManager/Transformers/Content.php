<?php

namespace Modules\ContentManager\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Content extends Resource
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
            'title'=> $this->title,
            'file'=>config('global.file_path').$this->file_name,
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
