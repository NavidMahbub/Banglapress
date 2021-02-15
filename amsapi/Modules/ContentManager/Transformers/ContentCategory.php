<?php

namespace Modules\ContentManager\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class ContentCategory extends Resource
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
            'id' => $this->id ,
            'label' => $this->title ,
            'parent_id' => $this->parent_id ,
            'children' => ContentCategory::collection($this->children),
        ];
    }
}
