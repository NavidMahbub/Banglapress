<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Area;

use Modules\Setting\Transformers\Area as AreaResource;
class AreaController extends Controller
{
    public function index(Request $request){
        $areas = Area::all();
        return AreaResource::collection($areas);
    }



    public function create(Request $request)
    {
            $validator = $request->validate([
                'title' => 'required',
            ]);
            $area = new Area ;
            $area->title = $request->title ;
            $area->parent_id = $request->parent_id? $request->parent_id:null;
            if($area->save()){
                return new AreaResource($area) ;
            }

    }

    public function update(Request $request,$id){
           $validator = $request->validate([
               'title' => 'required', 
           ]);
           if($request->parent_id == $id){
                return response()->json(['error'=>'can not be own parent'],422);
           }
           $area = Area::findOrfail($id);
           $area->title = $request->title ;
           $area->parent_id = $request->parent_id? $request->parent_id:null;

           if($area->save()){
               return new AreaResource($area);
           }
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);

        if($area->delete()){
            return $area ;
        	// return new AreaResource($area);
        }
    }
}
