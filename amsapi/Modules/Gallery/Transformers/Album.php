<?php

namespace Modules\Gallery\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\ContentManager\Transformers\Image  as ImageResource ;
use Modules\ContentManager\Transformers\Content  as ContentResource ;
use Modules\ContentManager\Entities\Content ;
use App\User ;
class Album extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $created_by = null ;
        $updated_by = null ;
     
        if(User::where('id',$this->created_by)->exists()){
            $created_by = User::where('id',$this->created_by)->first()->name ;
        }
        if(User::where('id',$this->updated_by)->exists()){
            $updated_by = User::where('id',$this->updated_by)->first()->name ;
        }

        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'cover'=> new ContentResource(Content::where('id',$this->cover_id)->first()),
            'updated_by' => $updated_by ,//$this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $created_by , //$this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
