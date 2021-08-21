// window.moment = require('moment');
// let now = moment().format('LLLL');

$(document).ready(function(){
    $('#profile').on('click', function(){
        $('#showprofile').toggle('fast');
    });
    
    $('.getDepartment').on('change',function(){
        $id = $(this).val();
        
        $.ajax({
            type:'get',
            url:'/fetchdepartment',
            data:{id:$id},
            dataType:'json',
            success: function(data){
                $departments = '<option value="">Select Department</option>';
                data.forEach(department => {
                    $departments += `<option value="${department.id}">${department.department}</option>`;
                });
                $('.department').html($departments);
            },
            error:function(e,r,error){
                console.log('Failed'+ error);
            }
        });
    });

    $('#validatedCustomFile').on('change', function (e) {
        let image = e.target.files[0];
        let reader = new FileReader();
        reader.onload = function (e) {
          $('#img_preview').slideUp();
          $('#img_preview').attr('src', e.target.result);
          $('#img_preview').slideDown('slow');
        }
        reader.readAsDataURL(image);
    });

    $('.unlock').on('click', function(){
        $year = $(this).attr('title');
        $('#unlockModal').on('show.bs.modal', function(){
            $('#modalMsg').text($year);
            $('#yearval').val($year);
        });
        $('#unlockModal').modal('show');
    });

    $('#pay').on('click',function(){
        let userid = $('#userid').val();
        let year = $('#yearval').val();
        let email = $('#email').val();
        let amount = 200;
        let phone = 0000;

        payWithRave() // TRIGGER PAYWITHRAVE TO POP-UP
    
        function payWithRave() {

            var x = getpaidSetup({
                // FLWPUBK-ff9268493fa87b738ca4da04acb65589-X
                PBFPubKey: 'FLWPUBK_TEST-26cfc4234cf0aff44fe588346ba2b84c-X',
                customer_email: email,
                amount: amount,
                customer_phone: phone,
                currency: "NGN",
                txref: "rave-123456",
                meta: [{
                    metaname: "flightID",
                    metavalue: "AP1234"
                }],
                onclose: function() {
                    $('#msg').html('');
                },
                callback: function(response) {
                    var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                    console.log("This is the response returned after a charge", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        $.ajax({
                            type:'get',
                            url:'/processpayment',
                            data:{userid:userid, year:year},
                            dataType:'json',
                            success:function(res){
                                if(res.status == 'success'){
                                    $('#sucessModal').on('show.bs.modal', function(){
                                        $('.modalMsg').text('Activation Completed Successfully');
                                    });
                                    $('#sucessModal').modal('show');
                                    window.location.reload();
                                }else{
                                    $('#errorModal').on('show.bs.modal', function(){
                                        $('.errorModalMsg').text('An Error Occurred!');
                                    });
                                    $('#errorModal').modal('show');
                                }
                            },
                            error:function(e,r,error){
                                console.log('FAILED'+error);
                            }
                        });

                    } else {
                        $('#errorModal').on('show.bs.modal', function(){
                            $('.errorModalMsg').text("An error occured while proccessing payment, try again later");
                        });
                        $('#errorModal').modal('show');
                    }
    
                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }
    });

    $('#payDonation').on('click',function(){
        let userid = $('#userid').val();
        let amount = $('#amount').val();
        let email = $('#email').val();
        let phone = 0000;

        if(amount != ''){
            payWithRave() // TRIGGER PAYWITHRAVE TO POP-UP
    
            function payWithRave() {

                var x = getpaidSetup({
                    // FLWPUBK-ff9268493fa87b738ca4da04acb65589-X
                    PBFPubKey: 'FLWPUBK_TEST-26cfc4234cf0aff44fe588346ba2b84c-X',
                    customer_email: email,
                    amount: amount,
                    customer_phone: phone,
                    currency: "NGN",
                    txref: "rave-123456",
                    meta: [{
                        metaname: "flightID",
                        metavalue: "AP1234"
                    }],
                    onclose: function() {
                        $('#msg').html('');
                    },
                    callback: function(response) {
                        var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                        console.log("This is the response returned after a charge", response);
                        if (
                            response.tx.chargeResponseCode == "00" ||
                            response.tx.chargeResponseCode == "0"
                        ) {
                            $.ajax({
                                type:'get',
                                url:'/processdonation',
                                data:{userid:userid, email:email, amount:amount},
                                dataType:'json',
                                success:function(res){
                                    if(res.status == 'success'){
                                        $('#sucessModal').on('show.bs.modal', function(){
                                            $('.modalMsg').text('Thanks for Your Support');
                                        });
                                        $('#sucessModal').modal('show');
                                        window.location.reload();
                                    }else{
                                        $('#errorModal').on('show.bs.modal', function(){
                                            $('.errorModalMsg').text('An Error Occurred!');
                                        });
                                        $('#errorModal').modal('show');
                                    }
                                },
                                error:function(e,r,error){
                                    console.log('FAILED'+error);
                                }
                            });

                        } else {
                            $('#errorModal').on('show.bs.modal', function(){
                                $('.errorModalMsg').text("An error occured while proccessing payment, try again later");
                            });
                            $('#errorModal').modal('show');
                        }
        
                        x.close(); // use this to close the modal immediately after payment.
                    }
                });
            }
        }else{
            $('#errorModal').on('show.bs.modal', function(){
                $('.errorModalMsg').text("Invalid input! Please enter a valid amount");
            });
            $('#errorModal').modal('show');
        }
    });

    // SMART BOT MESSAGING
    $('.btnSend').on('click',function(){
        sendMessage();
    });

    $('#message').on('keyup', function (e) {
        $keycode = e.keyCode
        if ($keycode == 13) {
            sendMessage();
        }
    })

    function sendMessage() {
        let message = $('#message').val();
        let name = $('#name').val();
        if(message == ''){

        }else{
            $.ajax({
                type:'get',
                url:'/send_message',
                data:{message:message},
                dataType:'JSON',
                beforeSend:function () {

                    // $('#chat-area').append(`
                    // <div class="direct-chat-msg right">
                    //   <div class="direct-chat-infos clearfix">
                    //     <span class="direct-chat-name float-right">${name}</span>
                    //     <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    //   </div>
                    //   <!-- /.direct-chat-infos -->
                    //   <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    //   <!-- /.direct-chat-img -->
                    //   <div class="direct-chat-text">
                    //     ${message}
                    //   </div>
                    // </div>`);
                    // setTimeout(() => {        
                    // }, 1000);

                },
                success:function(data){
                    if(data.status == 'success'){
                        $('#message').val('');
                       fetchReply();
                       $('#chat-area').animate({ scrollTop: $('#chat-area')[0].scrollHeight}, "slow");
                    }else{
                        $('#message').val('');
                        fetchReply();
                        $('#chat-area').animate({ scrollTop: $('#chat-area')[0].scrollHeight}, "slow");
                    }
                },
                error:function(r,e,error){
                    console.log('FAILED' + error);
                }
            });
        }
    }

    function fetchReply() {
        $.ajax({
            type:'get',
            url:'/get_reply',
            data:{},
            dataType:'JSON',
            async:true,
            beforeSend:function () {
                $('#chat-area').append(`<div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left"></span>
                    </div>
                    <img class="direct-chat-img" src="images/bot1.jpg" alt="message user image">
                    <div class="typing-indicator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    </div>`);
                    // $('#chat-area').animate({ scrollTop: $('#chat-area')[0].scrollHeight}, "slow");

            },
            success:function(data){
                // console.log(data);
                $chat_area = ``;
                data.forEach(chat => {
                    if (chat.user_id == "bot") {
                        $chat_area += `<div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="images/bot1.jpg"
                                class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                            ${chat.message}
                            <span class="msg_time">${moment(chat.created_at).fromNow()}</span>
                        </div>
                        </div>`;
                    } else {
                        $chat_area += `<div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            ${chat.message}
                            <span class="msg_time_send">${moment(chat.created_at).fromNow()}</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="userImage/default.png" class="rounded-circle user_img_msg">
                        </div>
                        </div>`;
                    }
                });
                // console.log($chat_area);

                $('#chat-area').html($chat_area);
            },
            error:function(r,e,error){
                console.log('FAILED' + error);
            }
        });
    }

    fetchReply();
    // $('#backTopBottom').trigger('click');
    $('#chat-area').animate({ scrollTop: $('#chat-area')[0].scrollHeight}, "slow");

    // $('.bottomTop').click();
    // fetchReply();

    // SEARCH BOT BRAIN FOR ADMIN
    // $('input[name=searchBotBrain]').on('keyup', function(e){
    //     e.preventDefault();
    //     $data = $('#searchBotBrain').val();

    //     // alert($data);
        
    //     $.ajax({
    //         type:'get',
    //         url:'/searchBotBrain',
    //         data:{data:$data},
    //         dataType:'JSON',
    //         success:function (response) {
    //             $botbrain_message = ``;
    //             response.forEach(search => {
    //                 $botbrain_message = `<li class="list-group-item active">Bot Brain Message</li>
    //                 <li class="list-group-item ">
    //                     <span class="bg-secondary p-1  rounded">${search.question}</span><br>
    //                     <span class="bg-primary p-1 rounded mt-2" style="float: right">${search.answer}</span><br>
    //                     <p style="" class="mt-4 mb-0 text-center">
    //                         <a href="/edit_bot_message/${search.id}" class="mr-2"> <i class="fas fa-edit text-dark"></i></a>
    //                         <a href="/delete_bot_message/${search.id}" class="ml-2"> <i class="fas fa-trash text-danger"></i></a>
    //                     </p>
    //                 </li>`;
    //             });
    //             $('#botBrainMessage').html($botbrain_message);
    //         },
    //         error:function (e,r,error) {
    //             console.log("FAILED" + error);
    //         }
    //     });
    // })

   
});