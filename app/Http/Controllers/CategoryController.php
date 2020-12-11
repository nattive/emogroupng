<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\tags;
use Illuminate\Http\Request;

class CategoryController extends HomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|max:255|unique:categories',
            'categoryToSub' => 'required',
        ]);

        Category::create($validatedData);
        return response('Category Added Succesfully', 200);
    }
    public function tags_store(Request $request)
    {
        $validatedData = $request->validate([
            'Tags' => 'required|max:255',
        ]);

        tags::create($validatedData);
        return response('Tags Added Succesfully', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Category)
    {
        $posts = Blog::where('category', 'like', '%' . $Category . '%')->get();
        $title = "Posts related to " . $Category . " Categories";
        return view('blog', compact('posts', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
