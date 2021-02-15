<?php

namespace Modules\ContentManager\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Image extends Resource
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
            'id' => $this->id,
            'title' => $this->title,
            'file' => $this->file_name,
        ];
    }
}
