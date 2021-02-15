<?php

namespace Modules\Gallery\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\ContentManager\Transformers\Image;
use Modules\ContentManager\Transformers\Content as ContentResource;
use Modules\ContentManager\Entities\Content;
class AlbumDetail extends Resource
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
            'id'=> $this->id ,
            'title' => $this->title ,
            'cover' => new ContentResource(Content::where('id',$this->cover_id)->first()) ,
            'cover_id' => $this->cover_id ,
            'more_photo' => ContentResource::collection($this->contents) ,
        ];
    }
}
