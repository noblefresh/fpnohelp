<?php

namespace App\Http\Controllers;

use App\Models\follower;
use App\Models\lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsez
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
    public function follow($id)
    {
        $getLecturer = lecturer::where('id',$id)->get();
        foreach ($getLecturer as $value) {
            $getFollowers = $value->followers;
            $getFollowers = $getFollowers + 1;

            // store follower info
            $follow = new follower;
            $follow->userid = Auth::user()->id;
            $follow->lecturer_id = $id;
            $follow->join_id = Auth::user()->id.$id;

            // updating followers
            DB::update('update lecturers set followers = ? where id = ?',[$getFollowers, $id]);
            $follow->save();
            return redirect()->back()->with('success','You started following this lecturer');
        }
        
    }

    public function unfollow($id)
    {
        $getLecturer = lecturer::where('id',$id)->get();
        foreach ($getLecturer as $value) {
            $getFollowers = $value->followers;
            $getFollowers = $getFollowers - 1;

            // updating followers
            DB::update('update lecturers set followers = ? where id = ?',[$getFollowers, $id]);
            // removing stored data from the follower table
            DB::delete('delete from followers where join_id = ?', [Auth::user()->id.$id]);
            return redirect()->back()->with('success','You started following this lecturer');
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
