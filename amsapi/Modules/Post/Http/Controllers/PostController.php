<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;


use Modules\Post\Entities\PostCategory;
use Modules\Post\Transformers\Post as PostResource;
use Modules\Post\Transformers\PostCategory as PostCategoryResource;

use Modules\Post\Transformers\PostDetail ;

use Modules\Setting\Entities\Ncategory;

use Modules\Setting\Transformers\Ncategory as NcategoryResource;

use Modules\Post\Transformers\ReporterPost ;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return PostResource::collection(Post::all());

    }

    public function postCategory()
    {
        $category = Ncategory::all();
         return NcategoryResource::collection($category);
        return PostResource::collection(Post::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function detail($id){
        $post = Post::findOrfail($id);
        if($post){
            return new PostDetail($post);
            // return $post::with('tags','topics','contents','areas','categories')->first();
        }
    }

    public function create(Request $request)
    {

//        // validate reqest data
//        $validator = $request->validate([
//            'shoulder' => 'required',
//            'headline' => 'required',
//            'reporter' => 'required',
//            'author' => 'required',
//            'status' => 'required',
//            ]);
//            // return $request->selected_areas ;
//        $auth_user_id = Auth()->user()->id ;
//        $post = new Post;
//        $post->shoulder = $request->shoulder;
//        $post->headline = $request->headline;
//        $post->hanger = $request->hanger;
//        $post->reporter_id = $request->reporter['id'];
//        $post->author_id = $request->author['id'];
//        $post->content   = $request->content;
//
//        $post->share_at = $request->share_at;
//        $post->published_at = $request->publish_at;
//        $post->status = $request->status;
//        $post->instant_article = $request->instant_article;
//
//        // fetred photo
//        $post->featured_image_id = $request->featured_image_id ;
//        $post->featured_video_id = $request->featured_video_id ;
//
//        // $post->created_by = $auth_user_id ;
//        $post->save();
//        // tag
//        $post->tags()->attach($request->tag_ids);
//        // topic
//        $post->topics()->attach($request->selected_topics);
//        // category
//        $post->categories()->attach($request->selected_categories);
//        // area
//        $post->areas()->attach($request->selected_areas);
//        // content -> more photo
//        $post->contents()->attach($request->content_ids);
//
//        if ($post->save()) {
//            return $post;
//        }


        // validate reqest data
        $validator = $request->validate([
            'shoulder' => 'required',
            'headline' => 'required',
            'reporter' => 'required',
            // 'author' => 'required',
            'content' => 'required|min:10',    
            'status' => 'required',

            ]);
            // return $request->selected_areas ;
        $auth_user_id = Auth()->user()->id ;
        $post = new Post;
        $post->shoulder = $request->shoulder;
        $post->headline = $request->headline;
        $post->hanger = $request->hanger;
        $post->reporter_id = $request->reporter['id'];
        $post->author_id = $request->author['id'];
        $post->content   = $request->content;

        $post->share_at = $request->share_at;
        $post->published_at = $request->publish_at;
        $post->status = $request->status;
        $post->instant_article = $request->instant_article;

        // fetred photo
        $post->featured_image_id = $request->featured_image_id ;
        $post->featured_video_id = $request->featured_video_id ;

        $post->created_by = $auth_user_id ;
        $post->save();
        // tag
        $post->tags()->attach($request->tag_ids);
        // topic
        $post->topics()->attach($request->selected_topics);
        // category
        $post->categories()->attach($request->selected_categories);
        // area
        $post->areas()->attach($request->selected_areas);
        // content -> more photo
        $post->contents()->attach($request->content_ids);
        $post->scrolls()->attach($request->selected_scrolls);
        if ($post->save()) {
            return $post;
        }
    }


    public function update(Request $request,$id){


//        $post = Post::findOrfail($id);
//        $validator = $request->validate([
//            'shoulder' => 'required',
//            'headline' => 'required',
//            'reporter' => 'required',
//            'author' => 'required',
//            'status' => 'required',
//        ]);
//        $auth_user_id = Auth()->user()->id ;
//        $post->shoulder = $request->shoulder;
//        $post->headline = $request->headline;
//        $post->hanger = $request->hanger;
//        $post->reporter_id = $request->reporter['id'];
//        $post->author_id = $request->author['id'];
//        $post->content   = $request->content;
//
//        $post->share_at = $request->share_at;
//        $post->published_at = $request->publish_at;
//        $post->status = $request->status;
//        $post->instant_article = $request->instant_article;
//
//        // fetred photo
//        $post->featured_image_id = $request->featured_image_id ;
//        $post->featured_video_id = $request->featured_video_id ;
//
//        $post->updated_by = $auth_user_id ;
//
//        $post->save();
//
//        // tag
//        $post->tags()->sync($request->tag_ids);
//        // topic
//        $post->topics()->sync($request->selected_topics);
//        //area
//        $post->areas()->sync($request->selected_areas);
//        // content
//        $post->contents()->sync($request->content_ids);
//        // categories
//        $post->categories()->sync($request->selected_categories);
//        if ($post->save()) {
//            return $post;
//        }
        $post = Post::findOrfail($id);
        $validator = $request->validate([
            'shoulder' => 'required',
            'headline' => 'required',
            'reporter' => 'required',
            // 'author' => 'required',
            'status' => 'required',
        ]);
        $auth_user_id = Auth()->user()->id ;
        $post->shoulder = $request->shoulder;
        $post->headline = $request->headline;
        $post->hanger = $request->hanger;
        $post->reporter_id = $request->reporter['id'];
        $post->author_id = $auth_user_id ;//$request->author['id'];
        $post->content   = $request->content;

        $post->share_at = $request->share_at;
        $post->published_at = $request->publish_at;
        $post->status = $request->status;
        $post->instant_article = $request->instant_article;

        // fetred photo
        $post->featured_image_id = $request->featured_image_id ;
        $post->featured_video_id = $request->featured_video_id ;

        $post->updated_by = $auth_user_id ;

        $post->save();

        // tag
        $post->tags()->sync($request->tag_ids);
        // topic
        $post->topics()->sync($request->selected_topics);
        //area
        $post->areas()->sync($request->selected_areas);
        // content
        $post->contents()->sync($request->content_ids);
        // categories
        $post->categories()->sync($request->selected_categories);
        // scroll
        $post->scrolls()->sync($request->selected_scrolls);
        if ($post->save()) {
            return $post;
        }
    }


    public function reporterNews(Request $request){

        $posts = Post::all();
        return ReporterPost::collection($posts);
    }


    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        if($post->delete()){
            return $post ;
        }
    }
}
