<?php

namespace Modules\UserManagement\Http\Controllers;

use App\User;
use Sentinel;
use DB;
// use App\RoleUser;
use Modules\UserManagement\Transformers\Role as RoleResource;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    
    
    public function index(Request $request)
    {   
        $role = DB::table('roles')->get();
        // $role = DB::table('roles')->get();
        return RoleResource::collection($role);
    }

    public function index2()
    {   
        $user_id = Auth()->user()->id;
        $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        $role = Sentinel::findRoleById($role_id);
        return new RoleResource($role);
    }

    public function index3()
    {   
        $role = DB::table('roles')->whereNotIn('id', [1,2])->get();
        // $role = DB::table('roles')->get();
        return RoleResource::collection($role);
    }

    public function store(Request $request)
    {
        // validator 
        $validate = $request->validate([
              'name' => 'required',  
        ]);
        // return $request ;
        try{
            $name = $request->role_name;
            $slug = strtolower($request->role_name);
            $role = Sentinel::getRoleRepository()->createModel()->create([
                'name' => $name,
                'slug' => $slug,
            ]);
            
            $role->permissions = [
                'category.view'   => $request->category_view,   
                'category.viewall'   => $request->category_viewall,   
                'category.create' => $request->category_create,
                'category.update' => $request->category_update,
                'category.updateall' => $request->category_updateall,
                'category.delete' => $request->category_delete,
                'category.deleteall' => $request->category_deleteall,

                'topic.view'   => $request->topic_view,   
                'topic.viewall'   => $request->topic_viewall,   
                'topic.create' => $request->topic_create,
                'topic.update' => $request->topic_update,
                'topic.updateall' => $request->topic_updateall,
                'topic.delete' => $request->topic_delete,
                'topic.deleteall' => $request->topic_deleteall,

                'area.view'   => $request->area_view,   
                'area.viewall'   => $request->area_viewall,   
                'area.create' => $request->area_create,
                'area.update' => $request->area_update,
                'area.updateall' => $request->area_updateall,
                'area.delete' => $request->area_delete,
                'area.deleteall' => $request->area_deleteall,

                'scroll.view'   => $request->scroll_view,   
                'scroll.viewall'   => $request->scroll_viewall,   
                'scroll.create' => $request->scroll_create,
                'scroll.update' => $request->scroll_update,
                'scroll.updateall' => $request->scroll_updateall,
                'scroll.delete' => $request->scroll_delete,
                'scroll.deleteall' => $request->scroll_deleteall,

                'news.view'   => $request->news_view,   
                'news.viewall'   => $request->news_viewall,   
                'news.create' => $request->news_create,
                'news.update' => $request->news_update,
                'news.updateall' => $request->news_updateall,
                'news.delete' => $request->news_delete,
                'news.deleteall' => $request->news_deleteall,


                'album.view'   => $request->album_view,   
                'album.viewall'   => $request->album_viewall,   
                'album.create' => $request->album_create,
                'album.update' => $request->album_update,
                'album.updateall' => $request->album_updateall,
                'album.delete' => $request->album_delete,
                'album.deleteall' => $request->album_deleteall,

                'role.view'   => $request->role_view,   
                'role.viewall'   => $request->role_viewall,   
                'role.create' => $request->role_create,
                'role.update' => $request->role_update,
                'role.updateall' => $request->role_updateall,
                'role.delete' => $request->role_delete,
                'role.deleteall' => $request->role_deleteall,

                'user.view'   => $request->user_view,   
                'user.viewall'   => $request->user_viewall,   
                'user.create' => $request->user_create,
                'user.update' => $request->user_update,
                'user.updateall' => $request->user_updateall,
                'user.delete' => $request->user_delete,
                'user.deleteall' => $request->user_deleteall,


            ];
            $role->permissions2 = json_encode([
                'category_view'   => $request->category_view,   
                'category_viewall'   => $request->category_viewall,   
                'category_create' => $request->category_create,
                'category_update' => $request->category_update,
                'category_updateall' => $request->category_updateall,
                'category_delete' => $request->category_delete,
                'category_deleteall' => $request->category_deleteall,

                'topic_view'   => $request->topic_view,   
                'topic_viewall'   => $request->topic_viewall,   
                'topic_create' => $request->topic_create,
                'topic_update' => $request->topic_update,
                'topic_updateall' => $request->topic_updateall,
                'topic_delete' => $request->topic_delete,
                'topic_deleteall' => $request->topic_deleteall,

                'area_view'   => $request->area_view,   
                'area_viewall'   => $request->area_viewall,   
                'area_create' => $request->area_create,
                'area_update' => $request->area_update,
                'area_updateall' => $request->area_updateall,
                'area_delete' => $request->area_delete,
                'area_deleteall' => $request->area_deleteall,

                'scroll_view'   => $request->scroll_view,   
                'scroll_viewall'   => $request->scroll_viewall,   
                'scroll_create' => $request->scroll_create,
                'scroll_update' => $request->scroll_update,
                'scroll_updateall' => $request->scroll_updateall,
                'scroll_delete' => $request->scroll_delete,
                'scroll_deleteall' => $request->scroll_deleteall,

                'news_view'   => $request->news_view,   
                'news_viewall'   => $request->news_viewall,   
                'news_create' => $request->news_create,
                'news_update' => $request->news_update,
                'news_updateall' => $request->news_updateall,
                'news_delete' => $request->news_delete,
                'news_deleteall' => $request->news_deleteall,    

                'album_view'   => $request->album_view,   
                'album_viewall'   => $request->album_viewall,   
                'album_create' => $request->album_create,
                'album_update' => $request->album_update,
                'album_updateall' => $request->album_updateall,
                'album_delete' => $request->album_delete,
                'album_deleteall' => $request->album_deleteall,    

                'role_view'   => $request->role_view,   
                'role_viewall'   => $request->role_viewall,   
                'role_create' => $request->role_create,
                'role_update' => $request->role_update,
                'role_updateall' => $request->role_updateall,
                'role_delete' => $request->role_delete,
                'role_deleteall' => $request->role_deleteall,    

                'user_view'   => $request->user_view,   
                'user_viewall'   => $request->user_viewall,   
                'user_create' => $request->user_create,
                'user_update' => $request->user_update,
                'user_updateall' => $request->user_updateall,
                'user_delete' => $request->user_delete,
                'user_deleteall' => $request->user_deleteall,    

            ]);

            // $log_user = Auth()->user();
            // $role->created_by = $log_user->id;
            // $role->updated_by = $log_user->id;

            if($role->save()){
                return new RoleResource($role);
            }
        }
        catch (QueryException $e) {
            return response()->json(['error'=>'Role name must be unique'],400);
        }
    }

    public function update(Request $request)
    {

        try{
            
            $name = $request->input('role_name');
            $slug = strtolower($request->input('role_name'));
            $role = Sentinel::findRoleById($request->id);
            $role->name = $name;
            $role->slug = $slug;
            $role->permissions = [
                'category.view'   => $request->category_view,   
                'category.viewall'   => $request->category_viewall,   
                'category.create' => $request->category_create,
                'category.update' => $request->category_update,
                'category.updateall' => $request->category_updateall,
                'category.delete' => $request->category_delete,
                'category.deleteall' => $request->category_deleteall,

                'topic.view'   => $request->topic_view,   
                'topic.viewall'   => $request->topic_viewall,   
                'topic.create' => $request->topic_create,
                'topic.update' => $request->topic_update,
                'topic.updateall' => $request->topic_updateall,
                'topic.delete' => $request->topic_delete,
                'topic.deleteall' => $request->topic_deleteall,

                'area.view'   => $request->area_view,   
                'area.viewall'   => $request->area_viewall,   
                'area.create' => $request->area_create,
                'area.update' => $request->area_update,
                'area.updateall' => $request->area_updateall,
                'area.delete' => $request->area_delete,
                'area.deleteall' => $request->area_deleteall,

                'scroll.view'   => $request->scroll_view,   
                'scroll.viewall'   => $request->scroll_viewall,   
                'scroll.create' => $request->scroll_create,
                'scroll.update' => $request->scroll_update,
                'scroll.updateall' => $request->scroll_updateall,
                'scroll.delete' => $request->scroll_delete,
                'scroll.deleteall' => $request->scroll_deleteall,

                'news.view'   => $request->news_view,   
                'news.viewall'   => $request->news_viewall,   
                'news.create' => $request->news_create,
                'news.update' => $request->news_update,
                'news.updateall' => $request->news_updateall,
                'news.delete' => $request->news_delete,
                'news.deleteall' => $request->news_deleteall,


                'album.view'   => $request->album_view,   
                'album.viewall'   => $request->album_viewall,   
                'album.create' => $request->album_create,
                'album.update' => $request->album_update,
                'album.updateall' => $request->album_updateall,
                'album.delete' => $request->album_delete,
                'album.deleteall' => $request->album_deleteall,


                'role.view'   => $request->role_view,   
                'role.viewall'   => $request->role_viewall,   
                'role.create' => $request->role_create,
                'role.update' => $request->role_update,
                'role.updateall' => $request->role_updateall,
                'role.delete' => $request->role_delete,
                'role.deleteall' => $request->role_deleteall,


                'user.view'   => $request->user_view,   
                'user.viewall'   => $request->user_viewall,   
                'user.create' => $request->user_create,
                'user.update' => $request->user_update,
                'user.updateall' => $request->user_updateall,
                'user.delete' => $request->user_delete,
                'user.deleteall' => $request->user_deleteall,


            ];
            $role->permissions2 = json_encode([
                'category_view'   => $request->category_view,   
                'category_viewall'   => $request->category_viewall,   
                'category_create' => $request->category_create,
                'category_update' => $request->category_update,
                'category_updateall' => $request->category_updateall,
                'category_delete' => $request->category_delete,
                'category_deleteall' => $request->category_deleteall,

                'topic_view'   => $request->topic_view,   
                'topicviewall'   => $request->topic_viewall,   
                'topic_create' => $request->topic_create,
                'topic_update' => $request->topic_update,
                'topic_updateall' => $request->topic_updateall,
                'topic_delete' => $request->topic_delete,
                'topic_deleteall' => $request->topic_deleteall,

                'area_view'   => $request->area_view,   
                'area_viewall'   => $request->area_viewall,   
                'area_create' => $request->area_create,
                'area_update' => $request->area_update,
                'area_updateall' => $request->area_updateall,
                'area_delete' => $request->area_delete,
                'area_deleteall' => $request->area_deleteall,

                'scroll_view'   => $request->scroll_view,   
                'scroll_viewall'   => $request->scroll_viewall,   
                'scroll_create' => $request->scroll_create,
                'scroll_update' => $request->scroll_update,
                'scroll_updateall' => $request->scroll_updateall,
                'scroll_delete' => $request->scroll_delete,
                'scroll_deleteall' => $request->scroll_deleteall,

                'news_view'   => $request->news_view,   
                'news_viewall'   => $request->news_viewall,   
                'news_create' => $request->news_create,
                'news_update' => $request->news_update,
                'news_updateall' => $request->news_updateall,
                'news_delete' => $request->news_delete,
                'news_deleteall' => $request->news_deleteall,    

                'album_view'   => $request->album_view,   
                'album_viewall'   => $request->album_viewall,   
                'album_create' => $request->album_create,
                'album_update' => $request->album_update,
                'album_updateall' => $request->album_updateall,
                'album_delete' => $request->album_delete,
                'album_deleteall' => $request->album_deleteall,    

                'role_view'   => $request->role_view,   
                'role_viewall'   => $request->role_viewall,   
                'role_create' => $request->role_create,
                'role_update' => $request->role_update,
                'role_updateall' => $request->role_updateall,
                'role_delete' => $request->role_delete,
                'role_deleteall' => $request->role_deleteall,    

                'user_view'   => $request->user_view,   
                'user_viewall'   => $request->user_viewall,   
                'user_create' => $request->user_create,
                'user_update' => $request->user_update,
                'user_updateall' => $request->user_updateall,
                'user_delete' => $request->user_delete,
                'user_deleteall' => $request->user_deleteall,    

            ]);
            // $log_user = Auth()->user();
            // $role->updated_by = $log_user->id;

            if($role->save()){
                return new RoleResource($role);
            }
        }
        catch (QueryException $e) {
            return response()->json(['error'=>'Role name must be unique'],400);
        }
       
        
    }
    // public function detail($id){
    //     $role = Sentinel::findRoleByID($id);

    // }
    
    public function destroy($id)
    {
        $role = Sentinel::findRoleById($id);


        // $guest = Sentinel::findRoleByName('Guest');
        // if($id != $guest->id){
        //     if($role->delete()){
        //         return new RoleResource($role);
        //     }
        // }
        // else{
        //     return response()->json("Not Possible",401);
        // }

        if($role->delete()){
            return new RoleResource($role);
        }
        
    }

    public function getPermission($id)
    {
        $role = Sentinel::findRoleById($id);
        $contact_view   = $role->permissions["contact.view"];
        $contact_create = $role->permissions["contact.create"];
        $contact_update = $role->permissions["contact.update"];
        $contact_delete = $role->permissions["contact.delete"];

        $permission = ['contact_view'=>$contact_view,'contact_create'=>$contact_create,'contact_update'=>$contact_update,'contact_delete'=>$contact_delete];
        return response()->json($permission,200);
    }

    public function updatePermission(Request $request)
    {
        $role_id        = $request->input('role_id');
        $contact_view   = $request->input('contact_view');
        $contact_create = $request->input('contact_create');
        $contact_update = $request->input('contact_update');
        $contact_delete = $request->input('contact_delete');

        $role = Sentinel::findRoleById($role_id);

        $role->permissions = [
            'contact.view'   => $contact_view,
            'contact.create' => $contact_create,
            'contact.update' => $contact_update,
            'contact.delete' => $contact_delete,
        ];
        $role->save();
        $contact_view   = $role->permissions["contact.view"];
        $contact_create = $role->permissions["contact.create"];
        $contact_update = $role->permissions["contact.update"];
        $contact_delete = $role->permissions["contact.delete"];

        $permission = ['contact_view'=>$contact_view,'contact_create'=>$contact_create,'contact_update'=>$contact_update,'contact_delete'=>$contact_delete];
        return response()->json($permission,200);
    }


    public function testRole(){

       $role_info = DB::table('role_users')
        ->join('users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.name as user_name','users.email','roles.name as role_name','role_users.*')
        ->get();

        return response()->json($role_info,200);
    }

    public function getAssignRole(){

      $role_info = DB::table('role_users')->whereNotIn('role_id', [1,2])
        ->join('users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.name as user_name','users.email','roles.name as role_name','role_users.*')
        ->get();

      return response()->json($role_info,200);
    }

    public function updateAssignRole(Request $request){

        $role_id     = $request->role_id;
        $old_role_id = $request->old_role_id;
        $user_id     = $request->user_id;

        $user = Sentinel::findById($user_id);
        $old_role = Sentinel::findRoleById($old_role_id);

        if($old_role){
            $old_role->users()->detach($user);
        }
        
        $role = Sentinel::findRoleById($role_id);
        $role->users()->attach($user);

      $role_info = DB::table('role_users')
        ->join('users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.name as user_name','users.email','roles.name as role_name','role_users.*')
        ->where('users.id', $user_id)
        ->get();

      return response()->json($role_info,200);
    }
}
