<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\ContentManager\Transformers\User as UserResource;
use Modules\ContentManager\Entities\User ;
class ReporterPost extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $user =User::where('id',$this->reporter_id)->first();
        $reporter = null ;
        if($user){
            $reporter  = $user->name ;
        }
        return [
            'id' => $this->id ,
            'shoulder' => $this->shoulder ,
            'reporter' => $reporter ,
        ];
    }
}
