<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Setting\Transformers\Category as CategoryResource;
class Category extends Resource
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
            //'parent'=> $this->parent->title,
            'parent_id' => $this->parent_id ,
            'display_name' => $this->display_name ,
            'color' => $this->color,
            'header_display' => $this->header_display ,
            'home_display' => $this->home_display ,
            'menubar_display' => $this->menubar_display ,
            'photo_display' => $this->photo_display ,
            'video_display' => $this->video_display ,
            'status' => $this->status ,

            'children'   => CategoryResource::collection($this->child),
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
