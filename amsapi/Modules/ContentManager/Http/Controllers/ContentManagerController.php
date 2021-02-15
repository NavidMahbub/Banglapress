<?php

namespace Modules\ContentManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\File;
use Modules\ContentManager\Entities\Content;
use Illuminate\Support\Facades\Storage;
use Modules\ContentManager\Transformers\Content as ContentResource;
use DB;
use Auth;
use App\User;
use App\Lib\FileUpload;
class ContentManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        // search object use korte hobe  
        // if($request->content_category){
        //     $Content = Content::where('content_category_id',$request->content_category)->paginate(15);
        //     return ContentResource::collection($Content);
        // }
        $content_list = [] ;
        if($request->content_category && $request->title){
            // return "ok1";
            $content_list = Content::where('content_category_id',$request->content_category)
                                    ->where('title','like','%'.$request->title.'%')
                                    ->paginate(15);
            return ContentResource::collection($content_list);
        }    
        else if($request->content_category){
            // return "ok2";
            $content_list = Content::where('content_category_id',$request->content_category)->paginate(15);
            return ContentResource::collection($content_list);
        }
        else if($request->title){
            // return "ok3";
            $content_list = Content::where('title','like','%'.$request->title.'%')->paginate(15);
            return ContentResource::collection($content_list);

        }
        // return "ok4";
        $Content = Content::paginate(15);
        return ContentResource::collection($Content);
    }

    /**
     * Load data on request.
     * @return Response
     */
    

    /**
     * Load data on request.
     * @return Response
     */
   
    public function store(Request $request){
		
    	$validator = $request->validate([
    		'file'     => 'required',
    		'title'    => 'required',
    	]);
    	
    	$Content =  new Content ;


        if ($request->hasFile('file'))
        {
            $file           = $request->file('file');
            $prefix         = 'file';
            $path           = 'uploads/';

            $file_upload = new FileUpload;
            $upload = $file_upload->upload($file, $prefix, $path);
            $file = $upload['file_name'];
            $type = $upload['type'];
            
        }
        else
        {
            
            $file = $request->input('file');
            $type = $request->input('type');
        }

        $Content->file_name = $file;
    	$Content->title = $request['title'];
        $Content->type  = $type; 
        if($request->content_category) $Content->content_category_id  = $request->content_category; 
        // $Content->file_url =  config fiel to get bae url + file path 

        $log_user = Auth()->user();

        $request->isMethod('put') ?  $Content->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $Content->created_at = $log_user->id : '' ;
        $request->isMethod('post') ? $Content->updated_at = $log_user->id : '' ;

        if($Content->save()){
        	return new ContentResource($Content);
        }else{
            return response()->json(['errors' =>['message'=>'No Data']],400);
        }	
	}

	public function delFile($id){
		$doc = Content::findOrFail($id);
        $path           = 'uploads/';
        $file = $doc->file_name;
        $file_upload = new FileUpload;
        $upload = $file_upload->remove($file,$path);
		if($doc->delete()){
			return $doc ;
		}
	}
    
}
