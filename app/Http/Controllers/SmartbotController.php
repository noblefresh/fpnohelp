<?php

namespace App\Http\Controllers;

use App\Mail\BotUnknown;
use App\Models\botbrain;
use App\Mail\BotFeedback;
use App\Models\botmessage;
use Illuminate\Http\Request;
use App\Models\unknownquestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SmartbotController extends Controller
{
    // SEND MESSAGE FUNCTION
    public function send_message(Request $req){
        // return Auth::user()->id 'bot';
        $search1 = botbrain::where('question', $req->message)
            ->orWhere('question', 'like', '%' .$req->message. '%')
            ->first();

        if($search1 != null){
            $this->save_user_message($req->message);
                $reply = $search1->answer;
                $this->save_bot_message($reply);
            return json_encode([
                'status' => 'success'
            ]);
        }else{
            $search2 = botbrain::where('answer', $req->message)
            ->orWhere('answer', 'like', '%' .$req->message. '%')
            ->first();

            if($search2 != null){
                $this->save_user_message($req->message);
                $reply = $search2->answer;
                $this->save_bot_message($reply);
                return json_encode([
                    'status' => 'success'
                ]);
            }else{
                $analysis = $this->analyseQuestion($req->message);
                if ($analysis == true) {
                    return json_encode([
                        'status' => 'success'
                    ]);
                } else {
                    $reply = "Opoos, Give me up to 20 mintues to find a concrete response to this message. I will notify you via your mail once I'm done. Thanks.";
            
                    // send a mail notification to the admin here
                    $this->save_user_message($req->message);
                    $this->save_bot_message($reply);
                    $this->unknown_question($req->message);
                    // Mail::to('okechinoble@gmail.com')
                    // ->send(new BotUnknown());
                    return json_encode([
                        'status' => 'unknown'
                    ]);
                }
                
            }

            // $reply = "Opoos, Give me up to 20 mintues to find a concrete response to this message. I will notify you via your mail once I'm done. Thanks.";
            
            // // send a mail notification to the admin here
            // $this->save_user_message($req->message);
            // $this->save_bot_message($reply);
            // $this->unknown_question($req->message);
            // // Mail::to('okechinoble@gmail.com')
            // // ->send(new BotUnknown());
            // return json_encode([
            //     'status' => 'unknown'
            // ]);
            // // if(Mail::to('okechinoble@gmail.com')
            // // ->send(new BotUnknown())){
               
            // // }else{
            // //     // return a message or sweet alert
            // // }
        }
    }

    public function analyseQuestion($question)
    {
        $questionArray = explode(' ', strtolower($question));
        $brain = botbrain::all();
        // Initialize 
        $no_tokens = 0; $savedKey = -1;
        foreach ($brain as $key => $knowledge) {
            $tokenArray = explode(' ', strtolower($knowledge->question));
            $no_matched = 0;
            foreach ($tokenArray as $word) {
                if ($word != '') {
                    if (in_array($word, $questionArray)) {
                        $no_matched++;
                    }

                    if ($no_matched >= $no_tokens) {
                        $no_tokens = $no_matched;
                        $savedKey = $key;
                    }
                }
            }
        }

        if($no_tokens == 0){
            return false;
        }else{
            $this->save_user_message($question);
            $reply = $brain[$savedKey]->answer;
            $this->save_bot_message($reply);
            return true;
        }
    }

    public function save_user_message($message){
        $saveMessage = new botmessage;
        $saveMessage->message = $message;
        $saveMessage->receiver_id = 'bot';
        $saveMessage->user_id = Auth::user()->id;
        $saveMessage->chat_id = Auth::user()->id.'bot';
        $saveMessage->save();
    }

    public function save_bot_message($reply){
        $saveMessage = new botmessage;
        $saveMessage->message = $reply;
        $saveMessage->receiver_id = Auth::user()->id;
        $saveMessage->chat_id = Auth::user()->id.'bot';
        $saveMessage->user_id = 'bot';
        $saveMessage->save();
    }

    public function unknown_question($question){
        $unknownQuestion = new unknownquestion;
        $unknownQuestion->question = $question;
        $unknownQuestion->userid = Auth::user()->id;
        $unknownQuestion->useremail = Auth::user()->email;
        $unknownQuestion->username = Auth::user()->name;
        $unknownQuestion->save();
    }

    public function get_reply(){
        // $get_reply = botmessage::where('user_id',Auth::user()->id)->orWhere('receiver_id',Auth::user()->id)->where('user_id','bot')->orWhere('receiver_id','bot')->get();
        $chatid = Auth::user()->id.'bot';

        // FUNCTION TO BE REMOVED SOON
        $get_reply = botmessage::where('chat_id',$chatid)->get();
        if(count($get_reply) < 1){
            $default = "Hello, I'm still undergoing trainning, I'm sorry I might not have immediate response to deep question. But send me message, let's see.";
            $this->save_default_message($default);
        }
        // FUNCTION END

        $get_reply = botmessage::where('chat_id',$chatid)->get();
        foreach ($get_reply as $reply) {
            $reply->user = $reply->user;
            // if ($reply->user->profilepicture == null) {
            //     $reply->profilepicture = $reply->user->profilepicture;
            // }           
        }
        return $get_reply;
    }

    // 
    public function save_default_message($default){
        $saveMessage = new botmessage;
        $saveMessage->message = $default;
        $saveMessage->receiver_id = Auth::user()->id;
        $saveMessage->chat_id = Auth::user()->id.'bot';
        $saveMessage->user_id = 'bot';
        $saveMessage->save();
    }
    // 

    public function show($id)
    {
        $getMessage = unknownquestion::where('id',$id)->get();
        return view('admin.reply_bot_unknown_message',['message'=>$getMessage]);
    }

    public function update(Request $request, $id)
    {
        $question = $request->question;
        $answer = $request->answer;
        $userid = $request->userid;
        $useremail = $request->useremail;
        $username = $request->username;
        $this->register_question_on_botbrain($question, $answer);
        $this->reply_user_question($answer, $userid);
        // Mail::to('okechinoble@gmail.com')
        //     ->send(new BotFeedback());

        DB::delete('delete from unknownquestions where id = ?', [$id]);
        return redirect('/bot-training')->with('success','Reply done successfully!');
    }
    
    public function register_question_on_botbrain($question, $answer){
        $saveBotbrain = new botbrain;
        $saveBotbrain->question = $question;
        $saveBotbrain->answer = $answer;
        $saveBotbrain->save();
    }

    public function reply_user_question($answer, $userid){
        $saveMessage = new botmessage;
        $saveMessage->message = $answer;
        $saveMessage->receiver_id = $userid;
        $saveMessage->chat_id = $userid.'bot';
        $saveMessage->user_id = 'bot';
        $saveMessage->save();
    }

    public function searchBotBrain(Request $request){
       if($request->data == ''){
            $search = botbrain::orderBy('id','DESC')->get();
       }else{
            $search = botbrain::where('question', $request->data)
            ->orWhere('question', 'like', '%' .$request->data. '%')
            ->get();
       }

       return json_encode($search);
    }
}
