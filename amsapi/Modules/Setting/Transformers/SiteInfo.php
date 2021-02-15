<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class SiteInfo extends Resource
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
            'title' => $this->title ,
            'slug'  => $this->slug ,
            'content' => json_decode($this->content ),
            // 'content' => json_encode($this->content ),
            // 'content' => $this->content ,
        ];
    }
}
