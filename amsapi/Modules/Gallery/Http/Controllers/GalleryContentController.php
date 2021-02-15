<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Gallery\Entities\GalleryContent;

use Modules\Gallery\Transformers\GalleryContent as GalleryContentResource;

class GalleryContentController extends Controller
{
    public function index(Request $request){


        // $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        // $role = Sentinel::findRoleById($role_id);
        // $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $gcontent = '';

        // if ($role->hasAccess(['department.view'])){
        //     $department = Department::when($search_item , function($q) use($search_item,$user_id){return $q->where('created_by',$user_id)->where('name','like',"%$search_item%");})
        //         ->when($user_id , function($q) use($user_id){return $q->where('created_by',$user_id);})
        //        ->paginate(10);
        // }
        // if ($role->hasAccess(['department.viewall'])){
          return $gcontent = GalleryContent::when($search_item , function($q) use($search_item){return $q->where('name','like',"%$search_item%");})
           ->paginate(10);
        // }
    	return GalleryContentResource::collection($gcontent);
    }



    public function store(Request $request)
    {

        $gcontent = $request->isMethod('put') ? GalleryContent::findOrFail($request->gcontent_id) : new GalleryContent;
        $gcontent -> caption = $request->input('caption');
        $gcontent -> content = $request->input('content');
        $gcontent -> gallery_id = $request->input('gallery_id');

        //vat_reg_no
        $log_user = Auth()->user();
        $request->isMethod('put') ?  $gcontent ->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $gcontent ->created_by = $log_user->id : '' ;
        $request->isMethod('post') ? $gcontent ->updated_by = $log_user->id : '' ;


        if($gcontent->save()){
            return new GalleryContentResource($gcontent);
        }
    }

    public function destroy($id)
    {
        $gcontent = GalleryContent::findOrFail($id);

        if($gcontent->delete()){
        	return new GalleryContentResource($gcontent);
        }
    }
}
