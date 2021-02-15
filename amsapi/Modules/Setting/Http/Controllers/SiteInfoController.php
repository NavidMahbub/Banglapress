<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

use Modules\Setting\Entities\SiteInfo;
use Modules\Setting\Transformers\SiteInfo as SiteInfoResource;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $SiteInfo = SiteInfo::all();
        return SiteInfoResource::collection($SiteInfo);
    }

 
    public function store(Request $request)
    {
        // return $request->method();
        // validate 
        if($request->isMethod('post')){
            // when adding new fields have to unique
            $validatro = $request->validate([
                'title' => 'required|unique:site_infos',
                'slug' => 'required|unique:site_infos',
            ]);

        }else{
            // when updating then dont check unique
            $validatro = $request->validate([
                'title' => 'required',
                'slug' => 'required',
            ]);
        }
        
        
        $site = $request->isMethod('put')? SiteInfo::findOrfail($request->id) : new SiteInfo ;
        $site->title  = $request->title;
        $site->slug  = $request->slug;
        $site->content  = json_encode($request->content);

        // who did this ? (create/ update)
        $user_id = Auth()->user()->id ;
        if($request->isMethod('post')){ // create 
            $site->created_by = $user_id ;
        }else{
            $site->updated_by = $user_id ;
        }
        if($site->save()){
            return new SiteInfoResource($site) ;
        }

    }



    public function destroy($id)
    {
        $site = SiteInfo::findOrfail($id) ;
        if($site->delete()){
            return $site ;
        }
    }
    public function detail($id){
        // return "ok";
        $site_info = SiteInfo::findOrfail($id) ;
        return new SiteInfoResource($site_info);
    }
}
