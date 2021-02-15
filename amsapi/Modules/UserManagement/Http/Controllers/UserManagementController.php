<?php

namespace Modules\UserManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\UserManagement\Entities\Activation ;
use App\User ; 
use App\Role ; 
use App\RoleUser ;
use Modules\ContentManager\Transformers\User as UserResource ;
class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }
    public function user_permission(Request $request){
        $user = Auth()->user();
        $role_id = RoleUser::where('user_id',$user->id)->first()->role_id ; 
        return Role::where('id',$role_id)->first()->permissions2; 
    }
    public function create(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password2' => 'required|same:password',
        ]);
        $user = new User ;
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password);
        if($user->save()){

            $role_user = new RoleUser ;
            $role_user->user_id = $user->id ;
            $role_user->role_id = $request->role['id'] ;
            $role_user->save() ;

            $activation = new Activation ;
            $activation->user_id = $user->id ;
            $activation->code = '1234' ;
            $activation->completed = 1 ;
            if($activation->save()){
                return $user ;
            }
        }

    }

    public function update(Request $request,$id){
        $validator = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'password2' => 'required|same:password',
        ]);
        
        $user = User::findOrfail($id);
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password);
        if($user->save()){
            $role_user = RoleUser::where('user_id',$user->id)->first();
            $role_user->role_id = $request->role['id'];
            $role_user->save();
            return $user ;
        }
    } 

    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if($user->delete()){
            return $user ;
        }
    }
}
