<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;
use App\Models\quote;
use App\Models\faculty;
use App\Models\botbrain;
use App\Models\donation;
use App\Models\follower;
use App\Models\imagebox;
use App\Models\lecturer;
use App\Models\department;
use App\Models\practiceapp;
use App\Models\user_access;
use App\Models\pastquestion;
use Illuminate\Http\Request;
use App\Models\profilepicture;
use App\Models\unknownquestion;
use App\Models\user_department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    
    public function index()
    {
        // Remember the Year and Level Updating. It will affect the software after 2-4 years 
        if(Auth::user()->level < 2){
            if(Auth::user()->status != 'pending'){
                if(Auth::user()->cyear != date('Y')){
                    // update level and cyear
                    $level = Auth::user()->userlevel;
                    $newlevel = $level + 100;
                    $cyear = date('Y');
                    $id = Auth::user()->id;
                    DB::update('update Users set userlevel = ?, cyear = ? where id = ?',[$newlevel, $cyear, $id]);
                    $year = date('Y');
                    $ans = $year - 1;
                    $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
                    ->where('level',Auth::user()->userlevel)
                    ->where('year',$ans)->get();
                    return view('users.home',['myPQ'=>$getMyPQ]);
                }else{
                    $year = date('Y');
                    $ans = $year - 1;
                    $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
                    ->where('level',Auth::user()->userlevel)
                    ->where('year',$ans)->get();
                    return view('users.home',['myPQ'=>$getMyPQ]);
                }
            }else{
                return redirect('/account-setup')->with('popModalSetup','Setup your account');
            }
        }else if(Auth::user()->level == 2){
            if(Auth::user()->status != 'pending'){
                if(Auth::user()->cyear != date('Y')){
                    // update level and cyear
                    $level = Auth::user()->userlevel;
                    $newlevel = $level + 100;
                    $cyear = date('Y');
                    $id = Auth::user()->id;
                    DB::update('update Users set userlevel = ?, cyear = ? where id = ?',[$newlevel, $cyear, $id]);
                    $year = date('Y');
                    $ans = $year - 1;
                    $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
                    ->where('level',Auth::user()->userlevel)
                    ->where('year',$ans)->get();
                    return view('admin.home',['myPQ'=>$getMyPQ]);
                }else{
                    $year = date('Y');
                    $ans = $year - 1;
                    $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
                    ->where('level',Auth::user()->userlevel)
                    ->where('year',$ans)->get();
                    return view('admin.home',['myPQ'=>$getMyPQ]);
                }
            }else{
                return redirect('/account-setup')->with('popModalSetup','Setup your account');
            }
        }else{
            // if(Auth::user()->status != 'pending'){
                if(Auth::user()->cyear != date('Y')){
                    // update level and cyear
                    $level = Auth::user()->userlevel;
                    $newlevel = $level + 100;
                    $cyear = date('Y');
                    $id = Auth::user()->id;
                    DB::update('update Users set userlevel = ?, cyear = ? where id = ?',[$newlevel, $cyear, $id]);
                    $year = date('Y');
                    $ans = $year - 1;
                    $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
                    ->where('level',Auth::user()->userlevel)
                    ->where('year',$ans)->get();
                    return view('admin.home',['myPQ'=>$getMyPQ]);
                }else{
                    $year = date('Y');
                    $ans = $year - 1;
                    $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
                    ->where('level',Auth::user()->userlevel)
                    ->where('year',$ans)->get();
                    return view('admin.home',['myPQ'=>$getMyPQ]);
                }
            // }else{
            //     return view('admin.home');
            //     // return redirect('/more-past-question')->with('popModalSetup','Setup your account');
            // }
        }
    }

    // MORE PAST QUESTION FUNCTION
    public function morepastquestion(){
        $year = date('Y');
        $ans = $year - 1;
        $years = pastquestion::select('year')
        ->where('deptid',Auth::user()->deptid)
        ->where('level',Auth::user()->userlevel)
        ->where('year','<',$ans)->distinct()->orderBy('year', 'DESC')->get();
        return view('users.morepastquestion',['years' => $years]);
    }

    public function addfaculty(){
        return view('admin.addfaculty');
    }

    // ADMIN [ADD PAST QUESTION]
    public function addpastquestion(){
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            $getAllPQ = pastquestion::orderBy('year','DESC')->get();
            return view('admin.addpastquestion',['pastquestions'=>$getAllPQ]);
        }else{
            $getAllPQ = pastquestion::orderBy('year','DESC')->get();
            return view('admin.addpastquestion',['pastquestions'=>$getAllPQ]);
        }
        
    }

    // PROFILE PAGE [NOT RESTRICTED]
    public function userprofile(){
        return view('users.profile');
    }

    // LAST YEAR PAST QUESTIONS
    public function lastyearpq(){
        if(Auth::user()->status != 'pending'){
            $year = date('Y');
            $ans = $year - 1;
            $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
            ->where('level',Auth::user()->userlevel)
            ->where('year',$ans)->get();
            return view('users.lastyearpq',['myPQ'=>$getMyPQ]);
        }else{
            return redirect('/account-setup')->with('popModalSetup','Setup your account');
        }
    }

    // ADMIN ALL USERS PAGE FUNCTION
    public function allusers(){
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            $getAllUsers = User::orderBy('id','DESC')->get();
            $getUsersPicture = profilepicture::all();
            return view('admin.allusers',['allusers'=>$getAllUsers, 'profilepicture'=>$getUsersPicture]);
        }else{
            $getAllUsers = User::orderBy('id','DESC')->get();
            $getUsersPicture = profilepicture::all();
            return view('admin.allusers',['allusers'=>$getAllUsers, 'profilepicture'=>$getUsersPicture]);
        }
    }

    // ADMIN ALL PQ SUBSCRIBED PAGE
    public function allpqsubscribed(){
        // For Restricted Pages
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            return redirect('/home')->with('error','You are strictly restricted from accessing this page');
        }else{
            $paidPQ = user_access::orderBy('id','DESC')->get();
            return view('admin.allpqsubscribed',['paidPQ'=>$paidPQ]);
        }
    }

    // ADMIN ALL DONATION PAGE
    public function alldonation(){
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            return redirect('/home')->with('error','You are strictly restricted from accessing this page');
        }else{
            $donations= donation::orderBy('id','DESC')->get();
            return view('admin.alldonation',['donations'=>$donations]);
        }
    }

    // ADMIN MANAGE BLOG PAGE
    public function manageblog(){
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            $blog= blog::orderBy('id','DESC')->get();
            return view('admin.blog',['blog'=>$blog]);
        }else{
            $blog= blog::orderBy('id','DESC')->get();
            return view('admin.blog',['blog'=>$blog]);
        }
    }

    // Auth View Post Page
    public function viewpost($id){
        $post = blog::where('id',$id)->get();
        return view('admin.blogview',['post'=>$post]);
    }

    // USER BLOG PAGE
    public function userblog(){
        $blog= blog::orderBy('id','DESC')->get();
        return view('users.userblog',['blog'=>$blog]);
    }

    // ADMIN MANAGE BLOG PAGE
    public function quotes(){
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            $quote= quote::orderBy('id','DESC')->get();
            return view('admin.quotes',['quotes'=>$quote]);
        }else{
            $quote= quote::orderBy('id','DESC')->get();
            return view('admin.quotes',['quotes'=>$quote]);
        }
    }

    // ADMIN IMAGE BOX PAGE
    public function imagebox(){
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            $imagebox = imagebox::orderBy('id','DESC')->get();
            return view('admin.imagebox',['imagebox'=>$imagebox]);
        }else{
            $imagebox = imagebox::orderBy('id','DESC')->get();
            return view('admin.imagebox',['imagebox'=>$imagebox]);
        }
    }

    public function firstsemester(){
        if(Auth::user()->status != 'pending'){
            $year = date('Y');
            $ans = $year - 1;
            $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
            ->where('level',Auth::user()->userlevel)
            ->where('year',$ans)
            ->where('semester',1)->get();
            return view('users.firstsemester',['myPQ'=>$getMyPQ]);
        }else{
            return redirect('/account-setup')->with('popModalSetup','Setup your account');
        }
    }

    public function secondsemester(){
        if(Auth::user()->status != 'pending'){
            $year = date('Y');
            $ans = $year - 1;
            $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
            ->where('level',Auth::user()->userlevel)
            ->where('year',$ans)
            ->where('semester',2)->get();
            return view('users.secondsemester',['myPQ'=>$getMyPQ]);
        }else{
            return redirect('/account-setup')->with('popModalSetup','Setup your account');
        }
    }
    

    public function validateUser($page)
    {

        // For Restricted Pages
        if(Auth::user()->level < 2){
            // return users;
        }else if(Auth::user()->level == 2){
            // ruturn Base Admin
        }else{
            // return Super Admin
        }

        // For Pages that are free for everyone
        if(Auth::user()->status != 'pending'){
            // return view
        }else{
            return redirect('/account-setup')->with('popModalSetup','Setup your account');
        }
    }

    // SEARCH RESULT
    public function search_result(Request $req){
        // return $req;
        $search = pastquestion::where('deptid',$req->deptid)->where('level',$req->level)->where('year',$req->year)->where('program',$req->program)->where('semester',$req->semester)->get();
        return view('admin.search_result',['pastquestions'=>$search]);
    }

    // SMART BOT SECTION
    public function smartbot(){
        return view('users.smartbot');
    }

    // FIND A LECTURER
    public function lecturer_find()
    {
        $getFaculty = faculty::orderBy('id','DESC')->get();
        return view('users.lecturer_find', ['faculty'=>$getFaculty]);
    }

    // LECTURER DEPARTMENT
    public function lecturer_department(Request $request)
    {
        $getDepartment = department::where('faculty_id',$request->id)->orderBy('id','DESC')->get();
        return view('users.lecturer_department',['department'=>$getDepartment]);
    }

    // LECTURERS
    public function lecturers($id)
    {
        $getLecturers = lecturer::where('deptid',$id)->orderBy('id','DESC')->get();
        return view('users.lecturers',['lecturers'=>$getLecturers]);
    }

    // LECTURER
    public function lecturer_view($id)
    {
        $getSelectedLecturer = lecturer::where('id',$id)->get();
        $getFollower = follower::orderBy('id','DESC')->limit(1)->get();
        return view('users.lecturer_view',['lecturer'=>$getSelectedLecturer, 'follower'=>$getFollower]);
    }

    // MANAGE LECTURER
    public function manage_lecturer()
    {
        // For Restricted Pages
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            return redirect('/home')->with('error','You are strictly restricted from accessing this page');
        }else{
            $getLecturer = lecturer::orderBy('id','DESC')->get();
            return view('admin.manage_lecturer',['lecturer'=>$getLecturer]);
        }
    }

    //PRACTICE APPS
    public function practice_apps()
    {
        $getApps = practiceapp::orderBy('id','DESC')->get();
        return view('users.practice_apps',['practiceapp'=>$getApps]);
    }

    // MANAGE LECTURER
    public function manage_apps()
    {
        // For Restricted Pages
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            return redirect('/home')->with('error','You are strictly restricted from accessing this page');
        }else{
            $getApps = practiceapp::orderBy('id','DESC')->get();
            return view('admin.manage_apps',['practiceapp'=>$getApps]);
        }
    }

    // ADMIN ALL PQ SUBSCRIBED PAGE
    public function bottraining(){
        // For Restricted Pages
        if(Auth::user()->level < 2){
            return view('users.profile');
        }else if(Auth::user()->level == 2){
            return redirect('/home')->with('error','You are strictly restricted from accessing this page');
        }else{
            $bot = botbrain::orderBy('id','DESC')->get();
            $unknown = unknownquestion::orderBy('id','DESC')->get();
            return view('admin.bot_training',['botbrain'=>$bot, 'unknown'=>$unknown]);
        }
    }

    // ACCOUNT SETUP
    public function accountsetup(){
        return view('users.setup');
    }

    // DOWNLOAD APP
    public function appdownload(){
        return view('users.mobile');
    }

     // SAMPLE
     public function sample(){
        return view('users.sample');
    }
}
