<?php

namespace App\Http\Controllers;

use App\blog;
use App\category;
use App\tags;
use Illuminate\Http\Request; 
use Intervention\Image\Facades\Image;

class blogController extends BassController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        $Tags = tags::all();
        return view('admin\addBlog', compact('categories', 'Tags' ));
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
        //   return  $request;
        $data =  $request->validate([
            'title' => 'required',
            'image' => 'required',
            'category' => '',
            'tags[]' => '',
            'body' => 'required',
            'PostType' => 'required',
        ]);
// return $data;
        $image = $request->image;
        $imagePath = $image->store('posts', 'public');
        Image::make(public_path("storage/{$imagePath}"))->fit(800, 500);
        $imageArray = array(
            'image' => $imagePath,
        );
        $tagsArray = array(
            'tags' => $request->tags
        );

        Blog::create(array_merge(
            $data,
            $imageArray,
            $tagsArray
        ));

        return redirect()->route('admin.home')->with('message', 'Blog post has been published');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $posts = blog::orderBy('created_at', 'desc')->get();
        return view('admin\bloglist', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = blog::where('id', $id)->first();
        return view('admin\editBlog', compact('post'));
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
        $post = Blog::where('id', $id)->first();

        $data =  $request->validate([
                'title' => 'required',
                'image' => 'required',
                'category' => 'required',
                'tags' => 'required',
                'body' => 'required',
        ]);
        if ($request->image) {
            $image = $request->image;
            $imagePath = $image->store('posts', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 500);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }
        $post->update(array_merge(
            $data,
            $imageArray
        ));
        return view('admin\dashboard')->with('message', 'Blog post has been Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = blog::where('id', $id)->first();
        $post->delete();
        return view('admin\dashboard')->with('message', 'Blog post has been Deleted succesfully');
    }
}
