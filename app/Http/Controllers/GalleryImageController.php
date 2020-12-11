<?php

namespace App\Http\Controllers;

use App\GalleryImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryImageController extends HomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryImages = GalleryImage::all();
        return view('gallery', compact('galleryImages'));
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
        // return $request;
        $validateData = $request->validate([
            'image' => 'required',
            'caption' => ''
        ]);

        $imagePath = $request->image->store('gallery', 'public');
        Image::make(public_path("storage/{$imagePath}"))->fit(800, 800)->save();
        // return   $imageArray;
        $galleryImage = new GalleryImage();
        $galleryImage->image = $imagePath;
        $galleryImage->caption = $request->caption;
        $galleryImage->save();
        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->delete();
        return redirect()->route('admin.home');
    }
}
