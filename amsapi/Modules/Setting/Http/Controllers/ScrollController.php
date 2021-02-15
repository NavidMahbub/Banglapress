<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Scroll;
use Modules\Setting\Transformers\Scroll as ScrollResource;

class ScrollController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return ScrollResource::collection(Scroll::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
        ]);
        $scroll = new Scroll;
        $scroll->title = $request->title;
        $scroll->parent_id = $request->parent_id ? $request->parent_id : null;
        if ($scroll->save()) {
            return new ScrollResource($scroll);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title' => 'required',
        ]);
        if ($request->parent_id == $id) {
            return response()->json(['error' => 'can not be own parent'], 422);
        }
        $scroll = Scroll::findOrfail($id);
        $scroll->title = $request->title;
        $scroll->parent_id = $request->parent_id ? $request->parent_id : null;

        if ($scroll->save()) {
            return new ScrollResource($scroll);
        }
    }
    
    public function destroy($id)
    {
        $scroll = Scroll::findOrfail($id);

        if ($scroll->delete()) {
            return new ScrollResource($scroll);
        }
    }
}
