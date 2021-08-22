<?php

namespace App\Http\Controllers;

use App\Models\pastquestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;


class PastQuestionController extends Controller
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
            $image_resize->resize(600,  null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if($image_resize->save(public_path() . '/storage/pastquestionImages/'.$nameToStore )){
                // validation
                $retrive = pastquestion::all();
                foreach($retrive as $value){
                    if($value->deptid == $request->deptid && $value->faculty_id == $request->faculty_id && $value->year == $request->year && $value->level == $request->level && $value->semester == $request->semester && $value->coursecode == $request->coursecode && $value->page == $request->page){
                        return redirect('/add-past-question')->with('error','Sorry! This past question already exit.');
                    }else{
                        // return $request;
                        $save_past_question = new pastquestion;
                        $save_past_question->deptid = $request->deptid;
                        $save_past_question->faculty_id = $request->faculty_id;
                        $save_past_question->year = $request->year;
                        $save_past_question->level = $request->level;
                        $save_past_question->semester = $request->semester;
                        $save_past_question->coursecode = $request->coursecode;
                        $save_past_question->program = $request->program;
                        $save_past_question->page = $request->page;
                        $save_past_question->image = $nameToStore;
                        $save_past_question->userid = Auth::user()->id;
                        // return $save_past_question;
                        $save_past_question->save();
                        return redirect('/add-past-question')->with('success','Past Question Added Successful');     
                    }
                }
            }else{
                return redirect('/add-past-question')->with('error','Network Error');
            }
        }else{
            return redirect('/add-past-question')->with('error','No Image Found');
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
        if(Auth::user()->level < 3){
            return redirect('/add-past-question')->with('error','Sorry! You cannot delete, Only Super Admin can perform this activity');
        }else{
            DB::delete('delete from pastquestions where id = ?', [$id]);
            return redirect('/add-past-question')->with('success','Past Question Deleted Successfully!');
        }
    }
}
