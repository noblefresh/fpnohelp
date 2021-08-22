@extends('layouts.app')

@section('content')
<style>

.chat{
margin-top: auto;
margin-bottom: auto;
height: 100vh;
/* background-color: #c23616; */
/* background: #7F7FD5;
 background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
  background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); */
}
.card{
  
}
.contacts_body{
padding:  0.75rem 0 !important;
overflow-y: auto;
white-space: nowrap;
}
.msg_card_body{
overflow-y: auto;
-webkit-transform: translate(0, 0);
  transform: translate(0, 0);
  /* overflow: auto; */
  padding: 9px 70px;
  /* margin: 30px 70px; */
  /* bottom: 20 !important; */
  /* height: 70vh !important; */
}
.card-header{
/* border-radius: 15px 15px 0 0 !important; */
border-bottom: 0 !important;
background-color: #007bff;
}
.card-footer{
border-radius: 0 0 15px 15px !important;
border-top: 0 !important;
}
.container{
align-content: center;
}
.search{
border-radius: 15px 0 0 15px !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color:white !important;
}
.search:focus{
 box-shadow:none !important;
   outline:0px !important;
}
.type_msg{
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color:white !important;
height: 60px !important;
overflow-y: auto;
}
.type_msg:focus{
 box-shadow:none !important;
   outline:0px !important;
}
.attach_btn{
border-radius: 15px 0 0 15px !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color: white !important;
cursor: pointer;
}
.send_btn{
border-radius: 0 15px 15px 0 !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color: white !important;
cursor: pointer;
}
.search_btn{
border-radius: 0 15px 15px 0 !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color: white !important;
cursor: pointer;
}
.contacts{
list-style: none;
padding: 0;
}
.contacts li{
width: 100% !important;
padding: 5px 10px;
margin-bottom: 15px !important;
}
.active{
background-color: rgba(0,0,0,0.3);
}
.user_img{
height: 70px;
width: 70px;
border:1.5px solid #f5f6fa;

}
.user_img_msg{
height: 40px;
width: 40px;
border:1.5px solid #f5f6fa;

}
.img_cont{
position: relative;
height: 70px;
width: 70px;
}
.img_cont_msg{
height: 40px;
width: 40px;
}
.online_icon{
position: absolute;
height: 15px;
width:15px;
background-color: #4cd137;
border-radius: 50%;
bottom: 0.2em;
right: 0.4em;
border:1.5px solid white;
}
.offline{
background-color: #c23616 !important;
}
.user_info{
margin-top: auto;
margin-bottom: auto;
margin-left: 15px;
}

.hd_back{
margin-top: auto;
margin-bottom: auto;
/* margin-left: 4px; */
}
.user_info span{
font-size: 20px;
color: white;
}
.user_info p{
font-size: 10px;
color: rgba(255,255,255,0.6);
}
.video_cam{
margin-left: 50px;
margin-top: 5px;
}
.video_cam span{
color: white;
font-size: 20px;
cursor: pointer;
margin-right: 20px;
}
.msg_cotainer{
margin-top: auto;
margin-bottom: auto;
margin-left: 10px;
border-radius: 25px;
background-color: #8fd5f5;
padding: 10px 20px;
position: relative;
max-width: 500px;
min-width: 30px;
}
.msg_cotainer_send{
margin-top: auto;
margin-bottom: auto;
margin-right: 10px;
border-radius: 25px;
background-color: white;
padding: 10px 20px;
position: relative;
color: black;
max-width: 500px;
min-width: 30px;
}
.msg_time{
position: absolute;
left: 0;
bottom: -15px;
color: rgba(10, 10, 10, 0.5);
font-size: 10px;
}
.msg_time_send{
position: absolute;
right:0;
bottom: -15px;
color: rgba(10, 10, 10, 0.5);
font-size: 10px;
}
.msg_head{
position: relative;
}
#action_menu_btn{
position: absolute;
right: 10px;
top: 10px;
color: white;
cursor: pointer;
font-size: 20px;
}
.action_menu{
z-index: 1;
position: absolute;
padding: 15px 0;
background-color: rgba(0,0,0,0.5);
color: white;
border-radius: 15px;
top: 30px;
right: 15px;
display: none;
}
.action_menu ul{
list-style: none;
padding: 0;
margin: 0;
}
.action_menu ul li{
width: 100%;
padding: 10px 15px;
margin-bottom: 5px;
}
.action_menu ul li i{
padding-right: 10px;

}
.action_menu ul li:hover{
cursor: pointer;
background-color: rgba(0,0,0,0.2);
}
@media(max-width: 576px){
  .contacts_card{
    margin-bottom: 15px !important;
  }
  .msg_card_body{
    padding: 5px 10px;
    /* height: 89vh; */
  }
}
</style>
    <div class="content-wrapper">
        <section class="contet">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-0 p-0">
                        <div class="car chat d-flex flex-column" id="chaox">
                            <div class="card-header msg_head ">
                                <div class="d-flex bd-highlight">
                                  <div class="hd_back">
                                    <a class="nav-lik text-dark pr-3" data-widget="" href="{{ route('home') }}" role="button"><i class="fas fa-chevron-left"></i></a>
                                  </div>
                                    <div class="img_cont">
                                        <img src="{{ asset('images/bot1.jpg') }}"
                                            class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span>Smart Bot</span>
                                        <p>Active</p>
                                    </div>
                                </div>
                                {{-- <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span> --}}
                               
                            </div>
                            <!-- /.card-header -->
                            <div class="card-bdy msg_card_body" style="flex-grow: 1" id="chat-area">
                              {{-- <div class="" id="chat-area">
                                
                              </div> --}}
                             
                              {{-- <div id="backTopBottom" style="scroll-behavior: smooth"></div> --}}
                          </div>
                          {{-- <a href="#backTopBottom" class="position-absolute bg-danger" style="z-index: 4; right: 5; bottom: 3">hjdfs jshdf sjsdfhhjh</a> --}}
                            <!-- /.card-body -->
                            <div class="card-foter p-3 chatbox-footer" style="">
                                <div class="d-flex ">
                                    <div style="flex-grow:1" class="mr-2">
                                        <input type="hidden" id="name" value="{{ Auth()->user()->name }}">
                                        <input type="text" name="message" id="message" placeholder="Type Message ..."
                                            class="form-control" style="height: 50px; flex-grow:1">
                                    </div>
                                    <div class="">
                                        <button type="button" class="btnSend shadow">
                                            <i class="far fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
