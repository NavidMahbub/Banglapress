<?php

namespace Modules\ContentManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ContentManager\Entities\ContentCategory ;
use Modules\ContentManager\Transformers\ContentCategory as ContentCategoryResource ;
class ContentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        // return "ok";
        return ContentCategoryResource::collection( ContentCategory::all());
    }
    public function index2(Request $request)
    {
        return ContentCategoryResource::collection( ContentCategory::paginate(5));
    }

    public function create(Request $request){
        $validatro  = $request->validate([
            'label' => 'required',
        ]);
        // can not be own / recuresive parent 
        $content_category  = new ContentCategory ;
        $content_category->title = $request->label ;
        $content_category->parent_id = $request->parent ;
        $content_category->created_by = Auth()->user()->id ;
        if($content_category->save()){
            return  $content_category ;
        }
    }

    public function update(Request $request,$id){
        $validatro  = $request->validate([
            'label' => 'required',
        ]);
        if($request->parent['id'] == $id){
            return response()->json(['error'=>'can not be own parent'],422);
        }
        // have to check if the parent is already a child of $this or not 
        $content_category  =  ContentCategory::findOrfail($id) ;
        $content_category->title = $request->label ;
        $content_category->parent_id = $request->parent ;
        $content_category->updated_by = Auth()->user()->id ;
        if($content_category->save()){
            return $content_category ;
        }
    }
    public function destroy($id)
    {
        //
        $content_category = ContentCategory::findOrfail($id) ;
        if($content_category->delete()){
            return $content_category ;
        }
    }
}
