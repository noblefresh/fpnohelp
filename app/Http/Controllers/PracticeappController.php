<?php

namespace App\Http\Controllers;

use App\Models\practiceapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PracticeappController extends Controller
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
            $image_resize->resize(400,  null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if($image_resize->save(public_path() . '/storage/appimages/'.$nameToStore )){
                // return $request;
                $save_app = new practiceapp;
                $save_app->app_name = $request->name;
                $save_app->downloadlink = $request->donwload_link;
                $save_app->image = $nameToStore;
                // return $save_app;
                $save_app->save();
                return redirect('/manage-apps')->with('success','Info saved successful'); 
            }else{
                return redirect('/manage-apps')->with('error','Network Error');
            }
        }else{
            return redirect('/manage-apps')->with('error','No Image Found');
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
        $getSelectedApp = practiceapp::where('id',$id)->get();
        return view('admin.edit_app',['app'=>$getSelectedApp]);
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
            $image_resize->resize(400,  null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if($image_resize->save(public_path() . '/storage/appimages/'.$nameToStore )){
                $name = $request->name;
                $donwloadlink = $request->donwload_link;
                $image = $nameToStore;
                DB::update('update practiceapps set app_name = ?, downloadlink = ?, image = ? where id = ?',[$name, $donwloadlink,  $nameToStore,  $id]);
                return redirect('/manage-apps')->with('success','Info updated successful');     

            }else{
                return redirect('/manage-apps')->with('error','Network Error');
            }
        }else{
            $name = $request->name;
            $donwloadlink = $request->donwload_link;
            DB::update('update practiceapps set app_name = ?, downloadlink = ? where id = ?',[$name, $donwloadlink,  $id]);
            return redirect('/manage-apps')->with('success','Info updated successful'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->level < 3){
            return redirect('/manage-apps')->with('error','Sorry! You cannot delete, Only Super Admin can perform this activity');
        }else{
            DB::delete('delete from practiceapps where id = ?', [$id]);
            return redirect('/manage-apps')->with('success','Info deleted successfully!');
        }
    }
}
