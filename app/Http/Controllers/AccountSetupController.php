<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\user_department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AccountSetupController extends Controller
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
        $accountSetup = new User;
        $userID = Auth::user()->id;

        $deptid = $request->input('deptid');
        $userlevel = $request->input('level');
        $program = $request->input('program');
        $cyear = date('Y');
        $status = 'OK';
        DB::update('update Users set deptid = ?, cyear = ?, status = ?, userlevel = ?, program = ? where id = ?', [$deptid, $cyear, $status, $userlevel, $program, $userID]);
        return redirect('/home')->with('success','Account Successfully Configured');
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

    public function makeuseradmin(Request $req, $id){
        $level = 2;
        DB::update('update Users set level = ? where id = ?',[$level, $id]);
        return redirect('/all-users')->with('success','You have successfully made this user a Base Admin');
    }

    public function removeasadmin(Request $req, $id){
        $level = 1;
        DB::update('update Users set level = ? where id = ?',[$level, $id]);
        return redirect('/all-users')->with('success','You have successfully Remove this user a Base Admin');
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
