<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\FrontEnd\Entities\Category;
use Modules\FrontEnd\Entities\Post;
use Modules\FrontEnd\Entities\PostSection;


use Modules\FrontEnd\Entities\PostCategory;
use Modules\FrontEnd\Transformers\Post as PostResource;
use Modules\FrontEnd\Transformers\Category as CategoryResource;
use Modules\FrontEnd\Transformers\PostSection as PostSectionResource;

use Modules\Post\Transformers\PostDetail ;
use Modules\Setting\Entities\Section;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        //return $request->all();

        $section     = ($request->has('section'))?$request['section']:null;
        $category     = ($request->has('category'))?$request['category']:null;
        $tag     = ($request->has('tag'))?$request['tag']:null;
        $area     = ($request->has('area'))?$request['area']:null;
        $limit     = ($request->has('limit'))?$request['limit']:10;
        $search     = ($request->has('search'))?$request['search']:null;
        $popular     = ($request->has('popular'))?$request['popular']:null;
        $latest     = ($request->has('latest'))?$request['latest']:null;
        
        if($popular==1){
             $post = Post::select('posts.*')->orderBy('posts.view', 'DESC')->paginate($limit);
            return PostResource::collection($post);
        }
    
        $post = Post::select('posts.*')
        ->when($section,function($q) use($section){return $q->join('post_sections','post_sections.post_id','=','posts.id')->where('post_sections.section_id', $section);})
        ->when($category,function($q) use($category){return $q->join('post_categories','post_categories.post_id','=','posts.id')->where('post_categories.category_id', $category);})
        ->when($tag,function($q) use($tag){return $q->join('post_tags','post_tags.post_id','=','posts.id')->where('post_tags.tag_id',$tag);})
        ->when($area,function($q) use($area){return $q->join('post_areas','post_areas.post_id','=','posts.id')->where('post_areas.area_id', $area);})
            ->orderBy('posts.id', 'DESC')
            ->paginate($limit);
        return PostResource::collection($post);
    }
    public function details($id){
        $post = Post::where('id',$id)->first();
        return new PostResource($post);
    }

   public function category()
   {
       $category = Category::whereNull('parent_id')->get();
       return CategoryResource::collection($category);
   }
   
   public function homeCategory(Request $request)
   {
       $limit     = ($request->has('limit'))?$request['limit']:10;
       $categories = Category::where('home',1)->get();
       $posts = [];
       $i = 0;
       
       foreach ($categories as $item) {
           $post = Post::select('posts.*')
           ->join('post_categories','post_categories.post_id','=','posts.id')->where('post_categories.category_id', $item->id)
           ->orderBy('posts.id', 'DESC')
            ->paginate($limit);
           $posts[$i] = PostResource::collection($post);
           $i=$i+1;
       }
       
       return response()->json([
            'categories'  => $categories,
            'posts'        => $posts,
        ],200);
   }
   
   


    public function postSection ()
    {
        $section = PostSection::orderBy('id', 'DESC')->get();
        return PostSectionResource::collection($section);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('frontend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
