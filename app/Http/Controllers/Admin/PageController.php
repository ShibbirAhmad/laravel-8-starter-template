<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.page.create')->render();

        return response()->json([
            'html' => $html,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|unique:pages',
            'content' => 'required',
        ]);

        if (!$validator->fails()) {
            $page = new Page();
            $page->name = $request->name;
            $page->slug = Str::slug($request->name);
            $page->content = $request->content;
            if ($page->save()) {
                return response()->json([
                    'success' => "OK",
                    'message' => 'Page Was Create',
                ]);
            }
        }

        return response()->json([
            'success' => 'FALD',
            'errors' => $validator->errors()->all(),
        ]);
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $html = view('admin.page.edit', compact('page'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|unique:pages,name,'.$id,
            'content' => 'required',
        ]);

        if (!$validator->fails()) {
            $page = Page::find($id);
            $page->name = $request->name;
            $page->slug = Str::slug($request->name);
            $page->content = $request->content;
            if ($page->save()) {
                return response()->json([
                    'success' => "OK",
                    'message' => 'Page Was Updated',
                ]);
            }
        }

        return response()->json([
            'success' => 'FALD',
            'errors' => $validator->errors()->all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::find($id);
        if($page->delete()){
            return response()->json([
                'success' => "OK",
                'message' => 'Page Was Delete',
            ]);
        }
    }
}
