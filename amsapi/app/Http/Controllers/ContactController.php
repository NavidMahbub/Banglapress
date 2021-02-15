<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\RoleUser;
use Sentinel;
use Illuminate\Support\Facades\Hash;

use App\Http\Resources\Contact as ContactResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserBasic as UserBasicResource;

use Auth;
use DB;
class ContactController extends Controller
{
    public function user(){
        $user = User::find(Auth::user()->id);
        return new UserResource($user);
    }
    public function details($id){
        $user = User::find($id);
        return new UserResource($user);
    }
    public function index(){
        // $user = User::paginate(5);
        $user = User::all();
        return UserBasicResource::collection($user);
    }

    public function specificContact($type){
        
        if($type==1){
            $user = User::whereIn('type',[1,2])->get();
        }elseif($type==4){
            $user = User::whereIn('type',[1,2,3])->get();
        }else{
            $user = User::where('type',$type)->get();
        }
        // return $user;
        // return response()->json(['error'=>$user],400);
        return UserBasicResource::collection($user);
    }

    public function pagination(Request $request){


        $user_id = Auth()->user()->id;
        $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        $role = Sentinel::findRoleById($role_id);

        $id = [];
        $created_user = Contact::where('created_by',$user_id)->get();
        foreach ($created_user as $key => $data) {
            array_push($id, $data->user_id);
        }

        $search_item = ($request->has('search_item'))?$request['search_item']:null;
        
        $type = ($request->has('type'))?$request['type']:null;
        if($type==10){
            $type = null;
            $type2=[1,2];
        }else{
            $type2=null;
        }
        $user = '';
        if ($role->hasAccess(['contact.view']))
        {
            $user  = User::whereNotIn('id', [1])->when($search_item && $type, function($q) use($search_item,$type,$id){return $q->whereIn('id',$id)->where('type',$type)->where('name','like',"%$search_item%");})
            ->when($search_item, function($q) use($search_item,$id){return $q->whereIn('id',$id)->where('name','like',"%$search_item%")->orWhere('email','like',"%$search_item%");})
            ->when($type, function($q) use($type,$id){return $q->whereIn('id',$id)->where('type',$type);})
            ->when($type2, function($q) use($type2,$id){return $q->whereIn('id',$id)->whereIn('type',$type2);})
            ->when($id, function($q) use($id){return $q->whereIn('id',$id);})
            ->orderBy('name','asc')->paginate(50);
        }
        if ($role->hasAccess(['contact.viewall']))
        {
            $user  = User::whereNotIn('id', [1])->when($search_item && $type, function($q) use($search_item,$type){return $q->where('type',$type)->where('name','like',"%$search_item%");})
            ->when($search_item, function($q) use($search_item){return $q->where('name','like',"%$search_item%")->orWhere('email','like',"%$search_item%");})
            ->when($type, function($q) use($type){return $q->where('type',$type);})
            ->when($type2, function($q) use($type2){return $q->whereIn('type',$type2);})
            ->orderBy('name','asc')->paginate(50);
        }
                
        return UserBasicResource::collection($user);
    }

    public function store(Request $request)
    {
         if( $request->isMethod('post')){
            $validatedData = $request->validate([
                'email'            =>'required|email|unique:users',
            ]);
            $log_user = Auth()->user();
            $type = $request->input('type');
            $name = $request->input('name');
            $email = $request->input('email');
            $password = str_random(6);

            $credentials = [
                'type'     => $type,
                'name'     => $name,
                'email'    => $email,
                'password' => $password,
            ];
            // Sentinel::registerAndActivate(['type'=>$type,'name'=>$name,'email'=>$email,'password' => $password]);
            Sentinel::registerAndActivate($credentials);
            $user = User::whereEmail($email)->first();

            $role_id = 2;
            $role = Sentinel::findRoleById($role_id);
            $role->users()->attach($user);

            $contact = new Contact;
            $contact -> user_id = $user->id;
            $contact -> designation = $request->input('designation');
            $contact -> father_name = $request->input('father_name');
            $contact -> mother_name = $request->input('mother_name');
            $contact -> spouse_name = $request->input('spouse_name');
            $contact -> area_code = $request->input('area_code');
            $contact -> mobile_number = $request->input('mobile_number');
            $contact -> contact_number = $request->input('contact_number');
            $contact -> occupation = $request->input('occupation');
            $contact -> nid = $request->input('nid');
            $contact -> birthday = $request->input('birthday');
            $contact -> district_id = $request->input('district_id');
            $contact -> subdistrict_id = $request->input('subdistrict_id');
            $contact -> ward_union = $request->input('ward_union');
            $contact -> area_village = $request->input('area_village');
            $contact -> street_para = $request->input('street_para');
            $contact -> post_ofiice = $request->input('post_ofiice');
            $contact -> company_name = $request->input('company_name');
            $contact -> agent_id = $request->input('agent_id');

            // if($request->not_edit_image == 10){
            //     $contact -> image = $request->image;
            // }

            if($request->not_edit_image == 11){

                $exploded = explode(',', $request->image);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0], 'jpeg'))
                    $extension = 'jpg';
                else
                    $extension = 'png';

                $fileName = str_random().'.'.$extension;
                $path = public_path().'/images/'.$fileName;
                file_put_contents($path, $decoded);
                $contact -> image = url('/').'/images/'.$fileName;
            }else{
                $contact -> image = $request->image;
            }

            $contact -> created_by = $log_user->id;
            $contact -> updated_by = $log_user->id;
            if($contact->save()){
                return new UserResource($user);
            }

        }

        if( $request->isMethod('put')){
             $contact_id = $request->contact_id;
             $contact = Contact::find($contact_id);
             $id = $contact->user->id;
            
             $validatedData = $request->validate([
                'email'            =>'required|email|unique:users,email,'.$id,
            ]);
            $log_user = Auth()->user();
           
            $type = $request->input('type');
            $name = $request->input('name');
            $email = $request->input('email');
            $user = User::whereId($id)->first();
            $user->type =  $type;
            $user->name =  $name;
            $user->email = $email;
            $user->save();

            $role_id     = $request->role_id;
            $old_role_id = $request->old_role_id;
            
            $old_role = Sentinel::findRoleById($old_role_id);
            if($old_role){
                $old_role->users()->detach($user);
            }
            $role = Sentinel::findRoleById($role_id);
            $role->users()->attach($user);



            $contact -> designation = $request->input('designation');
            $contact -> father_name = $request->input('father_name');
            $contact -> mother_name = $request->input('mother_name');
            $contact -> spouse_name = $request->input('spouse_name');
            $contact -> area_code = $request->input('area_code');
            $contact -> mobile_number = $request->input('mobile_number');
            $contact -> contact_number = $request->input('contact_number');
            $contact -> occupation = $request->input('occupation');
            $contact -> nid = $request->input('nid');
            $contact -> birthday = $request->input('birthday');
            $contact -> district_id = $request->input('district_id');
            $contact -> subdistrict_id = $request->input('subdistrict_id');
            $contact -> ward_union = $request->input('ward_union');
            $contact -> area_village = $request->input('area_village');
            $contact -> street_para = $request->input('street_para');
            $contact -> post_ofiice = $request->input('post_ofiice');
            $contact -> company_name = $request->input('company_name');
            $contact -> agent_id = $request->input('agent_id');
            $contact -> updated_by =  $log_user->id;

            if($request->not_edit_image == 11){

                $exploded = explode(',', $request->image);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0], 'jpeg'))
                    $extension = 'jpg';
                else
                    $extension = 'png';

                $fileName = str_random().'.'.$extension;
                $path = public_path().'/images/'.$fileName;
                file_put_contents($path, $decoded);
                $contact -> image = url('/').'/images/'.$fileName;
            }else{
                $contact -> image = $request->image;
            }
            
            if($contact->save()){
                return new UserResource($user);
            }

        }
        
    }

    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->delete()){
        	return response()->json(['success'=>'Delete successfully'],200);
        }
    }
}
