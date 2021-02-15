<?php

namespace Modules\ContentManager\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use App\RoleUser ;
use App\Role ;
class User extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $role_user =  RoleUser::where('user_id',$this->id)->first();
        if($role_user){

            $role = Role::select('id','name','permissions2')->where('id',$role_user->role_id)->first();
        }else{
            $role = null ;
        }
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'email' => $this->email ,
            'role'  => $role , 
        ];
    }
}
