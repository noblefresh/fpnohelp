@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="contet">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-0 p-0">
                        <div class="card direct-chat direct-chat-warning" id="chabox" >
                            <div class="card-header">
                              <h3 class="card-title"><i class="fas fa-robot"></i> Smart Bot Chat</h3>
          
                              {{-- <div class="card-tools">
                                <span title="3 New Messages" class="badge badge-warning">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                  <i class="fas fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="background-color: rgb(229, 233, 236);">
                              <!-- Conversations are loaded here -->
                              <div class="direct-chat-messages direct-chat-messages-margin" id="chat-area"> 
                                <!-- Message. Default to the left -->
                                {{-- <div class="direct-chat-msg">
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Smart Bot</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                  </div>
                                  <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                  <div class="direct-chat-text">
                                    Hi
                                  </div>
                                </div>
                                <!-- /.direct-chat-msg -->
          
                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">{{ Auth()->user()->name }}</span>
                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                  </div>
                                  <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                  <div class="direct-chat-text">
                                    Hello
                                  </div>
                                </div> --}}
                                <!-- /.direct-chat-msg -->
                                {{-- <div class="" >

                                </div> --}}
                                <!-- Message. Default to the left bot loading -->
                                {{-- <div class="botTyping">
                                 
                                </div> --}}
                                <!-- /.direct-chat-msg -->
          
                              </div>
                              <!--/.direct-chat-messages-->
          
                              <!-- Contacts are loaded here -->
                              {{-- <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                  <li>
                                    <a href="#">
                                      <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">
          
                                      <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                          Count Dracula
                                          <small class="contacts-list-date float-right">2/28/2015</small>
                                        </span>
                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                      </div>
                                      <!-- /.contacts-list-info -->
                                    </a>
                                  </li>
                                  <!-- End Contact Item -->
                                  <li>
                                    <a href="#">
                                      <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">
          
                                      <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                          Sarah Doe
                                          <small class="contacts-list-date float-right">2/23/2015</small>
                                        </span>
                                        <span class="contacts-list-msg">I will be waiting for...</span>
                                      </div>
                                      <!-- /.contacts-list-info -->
                                    </a>
                                  </li>
                                  <!-- End Contact Item -->
                                  <li>
                                    <a href="#">
                                      <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">
          
                                      <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                          Nadia Jolie
                                          <small class="contacts-list-date float-right">2/20/2015</small>
                                        </span>
                                        <span class="contacts-list-msg">I'll call you back at...</span>
                                      </div>
                                      <!-- /.contacts-list-info -->
                                    </a>
                                  </li>
                                  <!-- End Contact Item -->
                                  <li>
                                    <a href="#">
                                      <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">
          
                                      <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                          Nora S. Vans
                                          <small class="contacts-list-date float-right">2/10/2015</small>
                                        </span>
                                        <span class="contacts-list-msg">Where is your new...</span>
                                      </div>
                                      <!-- /.contacts-list-info -->
                                    </a>
                                  </li>
                                  <!-- End Contact Item -->
                                  <li>
                                    <a href="#">
                                      <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">
          
                                      <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                          John K.
                                          <small class="contacts-list-date float-right">1/27/2015</small>
                                        </span>
                                        <span class="contacts-list-msg">Can I take a look at...</span>
                                      </div>
                                      <!-- /.contacts-list-info -->
                                    </a>
                                  </li>
                                  <!-- End Contact Item -->
                                  <li>
                                    <a href="#">
                                      <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">
          
                                      <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                          Kenneth M.
                                          <small class="contacts-list-date float-right">1/4/2015</small>
                                        </span>
                                        <span class="contacts-list-msg">Never mind I found...</span>
                                      </div>
                                      <!-- /.contacts-list-info -->
                                    </a>
                                  </li>
                                  <!-- End Contact Item -->
                                </ul>
                                <!-- /.contacts-list -->
                              </div> --}}
                              <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-foter p-3 chatbox-footer" style="">
                              {{-- <form action="" method="post"> --}}
                                <div class="row">
                                 <div class="col-10 col-lg-9">
                                     <input type="hidden" id="name" value="{{ Auth()->user()->name }}">
                                    <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control" style="height: 50px">
                                 </div>
                                 <div class="col-2 col-lg-3">
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