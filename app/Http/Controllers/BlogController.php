<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
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
            if($image_resize->save(public_path() . '/storage/postImages/'.$nameToStore )){
                $save_post = new blog;
                $save_post->title = $request->title;
                $save_post->author = $request->author;
                $save_post->content = $request->content;
                $save_post->deptid = $request->deptid;
                $save_post->faculty_id = $request->faculty_id;
                $save_post->image = $nameToStore;
                $save_post->save();
                return redirect('/manage-blog')->with('success','Blog Post Added Successful');
            }else{
                return redirect('/manage-blog')->with('error','Network Error');
            }
        }else{
            return redirect('/manage-blog')->with('error','No Image Found');
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
        if(Auth::user()->level < 3){
            return redirect('/manage-blog')->with('error','Sorry! You cannot delete, Only Super Admin can perform this activity');
        }else{
            DB::delete('delete from blogs where id = ?', [$id]);
            return redirect('/manage-blog')->with('success','Post Deleted Successfully!');
        }
    }
}
