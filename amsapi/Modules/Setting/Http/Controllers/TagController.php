<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Transformers\Tag as TagResources ;
use Modules\ContentManager\Transformers\Content as ContentResource;
use Modules\Setting\Entities\Tag ;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        // $tags = Tag::all();
        return Tag::orderBy('created_at', 'DSC')->get();
        // return  TagResources::collection(Tag::all());
    }
    public function index2(Request $request){
        $tag = Tag::paginate(6);
    }

    public function create(Request $request){
        $validator = $request->validate([
            'title' => 'required|unique:tags',
        ]);
        $user = Auth()->user();    
        $tag = new Tag ;
        $tag->title = $request->title ;
        $tag->created_by = $user->id ;
        if($tag->save()){
            return $tag ;
        }
    }
    public function update(Request $request , $id = 0){
        $validator = $request->validate([
            'title' => 'required',
        ]);
        
        $user = Auth()->user() ;
        $tag = Tag::findOrfail($id);
        $tag->title = $request->title ;
        $tag->update_by = $user->id ;
        if($tag->save()){
            return $tag ;
        }
    }
    public function destroy($id)
    {
        $tag = Tag::findOrfail($id);
        if($tag->delete()){
            return $tag ;
        }
    }
}
