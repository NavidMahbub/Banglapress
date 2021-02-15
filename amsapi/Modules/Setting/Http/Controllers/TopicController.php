<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Topic;

use Modules\Setting\Transformers\Topic as TopicResource;

class TopicController extends Controller
{
    public function index(Request $request){

        $topic = Topic::all();
    	return TopicResource::collection($topic);
    }



    public function store(Request $request,$id=0)
    {
        $validate = $request->validate([
            'title' => 'required'
        ]);

        $topic = $request->isMethod('put') ? Topic::findOrFail($id) : new Topic;
        $topic -> title = $request->input('title');
        $topic -> parent_id = $request->input('parent_id');

        if($request->isMethod('put')){
            if($request->parent_id == $id){
                return response()->json(['error'=>'can not be own parent'],422);
            }
        }
        //vat_reg_no
        $log_user = Auth()->user();
        $request->isMethod('put') ?  $topic ->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $topic ->created_by = $log_user->id : '' ;
        $request->isMethod('post') ? $topic ->updated_by = $log_user->id : '' ;


        if($topic->save()){
            return new TopicResource($topic);
        }
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);

        if($topic->delete()){
        	return new TopicResource($topic);
        }
    }
}
