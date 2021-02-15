<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Poll;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Poll::paginate(3);
    }

    public function store(Request $request)
    {
        // return $request->method();
        // validate incoming
        $validator = $request->validate([
            'content' => 'required',
            'options' => 'required',
            'publish_at' => 'required',
            'expire_at' => 'required',
        ]);
        //  if has id then put or post
        // return $request->method();
        $poll = $request->isMethod('put') ? Poll::findOrfail($request->id) : new Poll;
        //  publish and expire date have no relation with create / update
        $poll->content = $request->input('content');
        $poll->options = $request->input('options');
        $poll->status = $request->input('status');
        // dates
        $poll->publish_at = $request->input('publish_at');
        $poll->expire_at = $request->input('expire_at');
        $user_id = Auth()->user()->id;
        if ($request->isMethod('post')) {
            $poll->created_by = $user_id;
        } else {
            $poll->updated_by = $user_id;
        }
        //  return created / updated entry
        if ($poll->save()) {
            return $poll;
        }
    }

    public function destroy($id)
    {
        $poll = Poll::findOrfail($id) ;
        if($poll->delete()) return $poll ;

    }
}
