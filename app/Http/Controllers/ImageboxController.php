<?php

namespace App\Http\Controllers;

use App\Models\imagebox;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ImageboxController extends Controller
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
        //
        // return $request;
        if($request->hasFile('image')){
            //get Image
            $image = $request->file('image');
            //Get the Original File Name and path
            $thumbnail = $image->getClientOriginalName();
            //Get the filename only using native php 'pathinfo'
            $filename = pathinfo($thumbnail, PATHINFO_FILENAME);
            //Extract the Extension
            $ext = strtolower($image->getClientOriginalExtension());
            //prepare the file to be stored
            $nameToStore = $filename . '_'. time() .'.'. $ext;
            //upload the file
            $image_resize = Image::make($image->getRealPath());
            // To resize the image to a width of 600 and constrain aspect ratio (auto height)
            $image_resize->resize(600,  null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if($image_resize->save(public_path() . '/storage/imageBox/'.$nameToStore)){
                $save_image = new imagebox;
                $save_image->image = $nameToStore;
                $save_image->save();
                return redirect('/image-box')->with('success','Image has been added successfully');
            }else{
                return redirect('/image-box')->with('error','Network Error');
            }
        }else{
            return redirect('/image-box')->with('error','No Image Found');
        }
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
