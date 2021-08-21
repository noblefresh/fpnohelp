<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [App\Http\Controllers\PageController::class, 'index'])->name('welcome');
Route::get('/blog/{id}', [App\Http\Controllers\PageController::class, 'blog']);
Route::get('/privacy-policy', [App\Http\Controllers\PageController::class, 'policy'])->name('policy');
Route::get('/terms', [App\Http\Controllers\PageController::class, 'terms'])->name('terms');




Auth::routes(['verify' => true]);

// USER DASHBOARD PAGE ROUTES
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/more-past-question', [App\Http\Controllers\HomeController::class, 'morepastquestion'])->name('morepastquestion');
Route::get('/user-profile', [App\Http\Controllers\HomeController::class, 'userprofile'])->name('userprofile');
Route::get('/last-year-past-question', [App\Http\Controllers\HomeController::class, 'lastyearpq'])->name('lastyearpq');
Route::get('/user-blog', [App\Http\Controllers\HomeController::class, 'userblog'])->name('userblog');
Route::get('/first-semester-pq', [App\Http\Controllers\HomeController::class, 'firstsemester'])->name('firstsemester');
Route::get('/second-semester-pq', [App\Http\Controllers\HomeController::class, 'secondsemester'])->name('secondsemester');
Route::get('/smart-bot', [App\Http\Controllers\HomeController::class, 'smartbot'])->name('smartbot');
Route::get('/account-setup', [App\Http\Controllers\HomeController::class, 'accountsetup']);
Route::get('/app-download', [App\Http\Controllers\HomeController::class, 'appdownload'])->name('appdownload');
// Route::get('/sample', [App\Http\Controllers\HomeController::class, 'sample'])->name('sample');





// ADMIN DASHBOARD PAGE ROUTE
Route::get('/add-faculty', [App\Http\Controllers\HomeController::class, 'addfaculty'])->name('addfaculty');
Route::get('/add-past-question', [App\Http\Controllers\HomeController::class, 'addpastquestion'])->name('addpastquestion');
Route::get('/all-users', [App\Http\Controllers\HomeController::class, 'allusers'])->name('allusers');
Route::get('/all-pd-subscribed', [App\Http\Controllers\HomeController::class, 'allpqsubscribed'])->name('allpqsubscribed');
Route::get('/all-donation', [App\Http\Controllers\HomeController::class, 'alldonation'])->name('alldonation');
Route::get('/manage-blog', [App\Http\Controllers\HomeController::class, 'manageblog'])->name('manageblog');
Route::get('/all-quote', [App\Http\Controllers\HomeController::class, 'quotes'])->name('quote');
Route::get('/image-box', [App\Http\Controllers\HomeController::class, 'imagebox'])->name('imagebox');
Route::get('/bot-training', [App\Http\Controllers\HomeController::class, 'bottraining'])->name('bottraining');





// ADMIN BACKEND PROCCESSING  ROUTES
Route::post('/savefaculty', [App\Http\Controllers\FacultyController::class, 'store']);
Route::post('/savedepartment', [App\Http\Controllers\DepartmentController::class, 'store']);
Route::get('/fetchdepartment', [App\Http\Controllers\DepartmentController::class, 'fetchdepartment']);
Route::post('/saveaccountsetup', [App\Http\Controllers\AccountSetupController::class, 'store']);
Route::post('/save_pastquestion', [App\Http\Controllers\PastQuestionController::class, 'store']);
Route::get('/deletepastquestion/{id}', [App\Http\Controllers\PastQuestionController::class, 'destroy']);
Route::post('/profile_picture', [App\Http\Controllers\PictureController::class, 'store']);
Route::get('/processpayment', [App\Http\Controllers\PaymentController::class, 'store']);
Route::get('/make_user_admin/{id}', [App\Http\Controllers\AccountSetupController::class, 'makeuseradmin']);
Route::get('/remove_as_admin/{id}', [App\Http\Controllers\AccountSetupController::class, 'removeasadmin']);
Route::get('/processdonation', [App\Http\Controllers\DonationController::class, 'store']);
Route::post('/savequote', [App\Http\Controllers\QuoteController::class, 'store']);
Route::post('/save_post', [App\Http\Controllers\BlogController::class, 'store']);
Route::get('/deletepost/{id}', [App\Http\Controllers\BlogController::class, 'destroy']);
Route::get('/viewpost/{id}', [App\Http\Controllers\HomeController::class, 'viewpost']);
Route::post('/save_image', [App\Http\Controllers\ImageboxController::class, 'store']);
Route::get('/deletedepartment/{id}', [App\Http\Controllers\DepartmentController::class, 'destroy']);
Route::post('/search_past_question', [App\Http\Controllers\HomeController::class, 'search_result']);
Route::post('/save_bot_training', [App\Http\Controllers\BotbrainController::class, 'store']);
Route::get('/edit_bot_message/{id}', [App\Http\Controllers\BotbrainController::class, 'show']);
Route::post('/update_bot_message/{id}', [App\Http\Controllers\BotbrainController::class, 'update']);
Route::get('/delete_bot_message/{id}', [App\Http\Controllers\BotbrainController::class, 'destroy']);
Route::get('/send_message', [App\Http\Controllers\SmartbotController::class, 'send_message']);
Route::get('/get_reply', [App\Http\Controllers\SmartbotController::class, 'get_reply']);
Route::get('/reply_bot_unknown_message/{id}', [App\Http\Controllers\SmartbotController::class, 'show']);
Route::post('/update_bot_unknown_message/{id}', [App\Http\Controllers\SmartbotController::class, 'update']);
Route::get('/searchBotBrain', [App\Http\Controllers\SmartbotController::class, 'searchBotBrain']);




