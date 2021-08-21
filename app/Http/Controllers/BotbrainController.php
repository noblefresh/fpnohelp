<?php

namespace App\Http\Controllers;

use App\Models\botbrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BotbrainController extends Controller
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
        $saveBotbrain = new botbrain;
        $saveBotbrain->question = $request->question;
        $saveBotbrain->answer = $request->answer;
        $saveBotbrain->save();
        return redirect('/bot-training')->with('success','Content added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getMessage = botbrain::where('id',$id)->get();
        return view('admin.edit_bot_message',['message'=>$getMessage]);
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
        $question = $request->question;
        $answer = $request->answer;
        DB::update('update botbrains set question = ?, answer = ? where id = ?',[$question, $answer, $id]);
        return redirect('/bot-training')->with('success','Update done successfully!');
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
            DB::delete('delete from botbrains where id = ?', [$id]);
            return redirect('/bot-training')->with('success','Message deleted successfully!');
        }
    }
}
