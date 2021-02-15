<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Language;
use Modules\Setting\Transformers\Language as LanguageResource;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // return Language::all();
        return LanguageResource::collection(Language::all());
    }

    public function store(Request $request)
    {
        // return $request->method();
        // validate 
        if($request->isMethod('post')){
            // when adding new fields have to unique
            $validatro = $request->validate([
                'title' => 'required|unique:language',
                'slug' => 'required|unique:language',
            ]);

        }else{
            // when updating then dont check unique
            $validatro = $request->validate([
                'title' => 'required',
                'slug' => 'required',
            ]);
        }
        
        // case while updating if title & slug are set to previously eiisting title & slug then what !
        
        // post or put !
        // add or update !

        $lang = $request->isMethod('put')? Language::findOrfail($request->id) : new Language ;
        $lang->title  = $request->title;
        $lang->slug  = $request->slug;
        $lang->admin_field  = $request->admin_field;
        $lang->frontend_field  = $request->frontend_field;

        // who did this ? (create/ update)
        $user_id = Auth()->user()->id ;
        if($request->isMethod('post')){ // create 
            $lang->created_by = $user_id ;
        }else{
            $lang->updated_by = $user_id ;
        }
        if($lang->save()){
            return new LanguageResource($lang) ;
        }

    }


    public function destroy($id)
    {
        $lang = Language::findOrfail($id) ;

        if($lang->delete()){
            return new LanguageResource($lang) ;
        }
    }
}
