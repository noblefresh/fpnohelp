<?php

namespace App\Http\Controllers;

use App\Models\lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class LecturerController extends Controller
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
            if($image_resize->save(public_path() . '/storage/lecturerimages/'.$nameToStore )){
                // validation
                // $retrive = lecturer::all();
                // foreach($retrive as $value){
                //     if($value->deptid == $request->deptid && $value->faculty_id == $request->faculty_id && $value->name == $request->name && $value->email == $request->email){
                //         return redirect('/manage-lecturer')->with('error','Sorry! This lecturer info already exit.');
                //     }else{
                        // return $request;
                        $save_lecturer = new lecturer;
                        $save_lecturer->deptid = $request->deptid;
                        $save_lecturer->faculty_id = $request->faculty_id;
                        $save_lecturer->name = $request->name;
                        $save_lecturer->email = $request->email;
                        $save_lecturer->education = $request->education;
                        $save_lecturer->location = $request->location;
                        $save_lecturer->skill = $request->skill;
                        $save_lecturer->note = $request->note;
                        $save_lecturer->image = $nameToStore;
                        $save_lecturer->description = $request->description;
                        // return $save_lecturer;
                        $save_lecturer->save();
                        return redirect('/manage-lecturer')->with('success','Info saved successful');     
                //     }
                // }
            }else{
                return redirect('/manage-lecturer')->with('error','Network Error');
            }
        }else{
            return redirect('/manage-lecturer')->with('error','No Image Found');
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
        $getSelectedLecturer = lecturer::where('id',$id)->get();
        return view('admin.edit_lecturer',['lecturer'=>$getSelectedLecturer]);
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
            if($image_resize->save(public_path() . '/storage/lecturerimages/'.$nameToStore )){
                $name = $request->name;
                $email = $request->email;
                $education = $request->education;
                $location = $request->location;
                $skill = $request->skill;
                if($request->note == ''){
                    $note = 'null';
                }else{
                    $note = $request->note;
                }
                $image = $nameToStore;
                $description = $request->description;
                DB::update('update lecturers set name = ?, email = ?, education = ?, location = ?, skill = ?, note = ?, image = ?, description = ? where id = ?',[$name, $email, $education, $location, $skill, $note, $nameToStore, $description, $id]);
                return redirect('/manage-lecturer')->with('success','Info updated successful');     

            }else{
                return redirect('/manage-lecturer')->with('error','Network Error');
            }
        }else{
            $name = $request->name;
            $email = $request->email;
            $education = $request->education;
            $location = $request->location;
            $skill = $request->skill;
            if($request->note == ''){
                $note = 'null';
            }else{
                $note = $request->note;
            }
            $description = $request->description;
            DB::update('update lecturers set name = ?, email = ?, education = ?, location = ?, skill = ?, note = ?, description = ? where id = ?',[$name, $email, $education, $location, $skill, $note, $description, $id]);
            return redirect('/manage-lecturer')->with('success','Info updated successful'); 
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
        // 
        if(Auth::user()->level < 3){
            return redirect('/manage-lecturer')->with('error','Sorry! You cannot delete, Only Super Admin can perform this activity');
        }else{
            DB::delete('delete from lecturers where id = ?', [$id]);
            return redirect('/manage-lecturer')->with('success','Info deleted successfully!');
        }
    }
}
