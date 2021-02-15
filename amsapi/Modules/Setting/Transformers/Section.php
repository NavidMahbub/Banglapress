<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Section extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
