<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Ncategory;

use Modules\Setting\Transformers\Ncategory as NcategoryResource;

class NcategoryController extends Controller
{
    public function index(Request $request){


        // $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        // $role = Sentinel::findRoleById($role_id);
        // $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $ncategory = '';

        // if ($role->hasAccess(['department.view'])){
        //     $department = Department::when($search_item , function($q) use($search_item,$user_id){return $q->where('created_by',$user_id)->where('name','like',"%$search_item%");})
        //         ->when($user_id , function($q) use($user_id){return $q->where('created_by',$user_id);})
        //        ->paginate(10);
        // }
        // if ($role->hasAccess(['department.viewall'])){
             $ncategory = Ncategory::whereNull('parent_id')->paginate(10);
        // }
    	return NcategoryResource::collection($ncategory);
    }



    public function store(Request $request)
    {

        $ncategory = $request->isMethod('put') ? Ncategory::findOrFail($request->ncategory_id) : new Ncategory;
        $ncategory -> title = $request->input('title');
        $ncategory -> display_name = $request->input('display_name');
        $ncategory -> color = $request->input('color');
        $ncategory -> parent_id = $request->input('parent_id');
        $ncategory -> header_display = $request->input('header_display');
        $ncategory -> home_display = $request->input('home_display');
        $ncategory -> menubar_display = $request->input('menubar_display');
        $ncategory -> photo_display = $request->input('photo_display');
        $ncategory -> video_display = $request->input('video_display');
        $ncategory -> status = $request->input('status');

        //vat_reg_no
        $log_user = Auth()->user();
        $request->isMethod('put') ?  $ncategory ->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $ncategory ->created_by = $log_user->id : '' ;
        $request->isMethod('post') ? $ncategory ->updated_by = $log_user->id : '' ;


        if($ncategory->save()){
            return new NcategoryResource($ncategory);
        }
    }

    public function destroy($id)
    {
        $ncategory = Ncategory::findOrFail($id);

        if($ncategory->delete()){
        	return new NcategoryResource($ncategory);
        }
    }
}
