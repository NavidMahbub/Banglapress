<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Language extends Resource
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
            'admin_field' => json_decode( $this->admin_field ),
            'frontend_field' => json_decode($this->frontend_field),
        ];
    }
}
