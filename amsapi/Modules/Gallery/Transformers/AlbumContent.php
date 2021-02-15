<?php

namespace Modules\Gallery\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class AlbumContent extends Resource
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
            'caption'=> $this->caption,
            'content'=> $this->content,
            'album_id'=> $this->album_id,
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
