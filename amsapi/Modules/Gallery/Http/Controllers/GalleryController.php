<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Gallery\Entities\Album;
use Modules\Gallery\Transformers\Album as AlbumResource;

use Modules\Gallery\Transformers\Gallery as GalleryResource;
use Modules\Gallery\Transformers\AlbumDetail ;

class GalleryController extends Controller
{
    public function index(Request $request){
        $album_list = Album::all(); 
        return AlbumResource::collection($album_list);
    }



    public function store(Request $request,$id=0)
    {
        $validator = $request->validate([
            'title' => 'required',
            'cover_id' => 'required',
        ]);
        // return  $request->gallery_content[0]['caption'];
        $album = $request->isMethod('put') ? Album::findOrFail($id) : new Album;
        // $gal_id = $album->id ;
        $album -> title = $request->title;
        $album -> cover_id = $request->cover_id;
        $album->save();
        $album->contents()->sync($request->more_photo_ids);
        $album->save();
        // $album
        
        // foreach($request->gallery_content as $item){
        //     $content =  new GalleryContent;
        //     $content->caption = $item['caption'] ;
        //     $content->content = $item['content'] ;
        //     $content->gallery_id = $gal_id ;
        //     $content->save();
        // }
        // dates
        $log_user = Auth()->user();
        $request->isMethod('put') ?  $album ->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $album ->created_by = $log_user->id : '' ;
        $request->isMethod('post') ? $album ->updated_by = $log_user->id : '' ;


        if($album->save()){
            return new GalleryResource($album);
        }
    }

    public function detail($id){
        $album = Album::findOrfail($id) ;
        if($album){
            return new AlbumDetail($album);
        }
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        if($album->delete()){
        	return new AlbumResource($album);
        }
    }
}
