<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profilepicture;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
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
        $checkPicture = profilepicture::where('userid',Auth()->user()->id)->get();
        $userid = $request->userid;
        if(count($checkPicture) > 0){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('userImage', $name);
            DB::update('update profilepictures set image = ? where id = ?',[$name, $userid]);
            return redirect()->back();
        }else{
            if($file = $request->file('image')){
                $name = $file->getClientOriginalName();
                if($file->move('userImage', $name)){
                    $userimage = new profilepicture;
                    $userimage->image = $name;
                    $userimage->userid = $request->userid;
                    $userimage->save();
                    return redirect()->back();
                }
                return "An error occured!, try later";
            }
            return "No image detected";
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
