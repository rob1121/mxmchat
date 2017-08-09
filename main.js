$(function(){
  // navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

  // var constraints = {video: true};

  // function successCallback(localMediaStream) {
  //   window.stream = localMediaStream;
  //   var video = document.querySelector("video");
  //   video.src = window.URL.createObjectURL(localMediaStream);
  //   video.play();
  // }

  // function errorCallback(error){
  //   console.log("navigator.getUserMedia error: ", error);
  // }

  // navigator.getUserMedia(constraints, successCallback, errorCallback);


	$('#chat-list').perfectScrollbar();
	$('#coversation-list').perfectScrollbar();
	var interval_id;
	$(window).focus(function() {
	    // console.log("test");
	});
	// askPermission(),testNotification();
	notifyMe();

	$(".ele").typed({
		strings:[
					"“Start by doing what's necessary;<br> then do what's possible;<br> and suddenly you are doing the impossible.” <br>\<label style='font-size:15px'>\"-Francis of Assisi\"<label>",
					"“You must do the things you think you cannot do.” <br>\<label style='font-size:15px'>\"-Eleanor Roosevelt\"<label>",
					"“A creative man is motivated by the desire to achieve,<br> not by the desire to beat others.”<br>\<label style='font-size:15px'>\"-Ayn Rand\"<label>",
          "“How many cares one loses when one decides not to be something but to be someone.”<br>\<label style='font-size:15px'>\"-Gabrielle “Coco” Chanel\"<label>",
          "“Expect the best. Prepare for the worst. Capitalize on what comes.”<br>\<label style='font-size:15px'>\"-Zig Ziglar\"<label>",


				],
		typeSpeed: 100
	});
});

function askPermission(){
    webkitNotifications.requestPermission(testNotification);
}

function testNotification(){
    var notification = webkitNotifications.createNotification('IMAGE','TITLE','BODY');
    notification.show();
}

function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support system notifications");
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    // var notification = new Notification("Hi there!");
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        // var notification = new Notification("Hi there!");
      }
    });
  }

  // Finally, if the user has denied notifications and you
  // want to be respectful there is no need to bother them any more.
}

function spawnNotification(theBody,theIcon,theTitle) {
  var options = {
      body: theBody,
      icon: theIcon
  }
  var n = new Notification(theTitle,options);
  setTimeout(n.close.bind(n), 1000);
}

function hashCode (str){
    var hash = 0;
    if (str.length == 0) return hash;
    for (i = 0; i < str.length; i++) {
        char = str.charCodeAt(i);
        hash = ((hash<<5)-hash)+char;
        hash = hash & hash; // Convert to 32bit integer
    }
    return hash;
}

function testChat(from,to){
  $('.chat-area').css('background-color','#fff');
  $('.input-area').show();
  $('#user-title').data('id',to);
  $('#user-title').data('myid',from);
  $('#new-msg-'+to).hide();
  var uto = $('#user-title').data('id');
  var ufrom = $('#user-title').data('myid');
  $('#chart-list').scrollTop(0);
  // console.log($('#user-title').data('id'));
  // console.log($('#user-title').data('myid'));
  try{
        var socket = io.connect('http://10.197.80.12:8080');
      socket.io.on('connect_error', function(err) {

      });

    }catch(e){
      console.log('asdsadsa');
    }

  if(socket !== undefined){
    var err = false;
    var cml = $('.chat-list ul .chat-message');
    cml.remove();
    socket.emit('get_selected_user',to);

    socket.on('selected_user',function(data){
      try{
        $('#user-title').text(data[0]['display_name']);
      }catch(e){
        $('#user-title').text('Public');
      }
    });

    var msngr = {
      'from' : from,
      'to' : to
    }
    // console.log(msngr);
    socket.emit('get_output',msngr);
    // socket.on('set_output',function(data){

    //   var cm = $('.chat-list ul');
    //       var cmp = $('.chat-list .chat-message');
    //       cmp.remove();
    //       var list_msg = '';
    //       if(data.length){

    //         for (var i = 0; i < data.length; i++) {
    //           console.log(ufrom);
    //           if ((data[i].id == ufrom &&  data[i].to == uto) || (data[i].id == uto &&  data[i].to == ufrom)){

    //             if(data[i]['message'].trim()=="" || data[i]['message'].trim()==":)"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/default.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="tb"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/tb.jpeg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="spanky"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/spanky.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()==">("){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/angry.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="jeff"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/my-pic.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="zzz"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/sleepy.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else{
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p>'+data[i]['message']+'</p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }

    //           }else{

    //             if(data[i]['message'].trim()=="" || data[i]['message'].trim()==":)"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/default.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="tb"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/tb.jpeg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="spanky"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/spanky.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()==">("){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/angry.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="jeff"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/my-pic.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else if(data[i]['message'].trim()=="zzz"){
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/sleepy.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }else{
    //               list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p>'+data[i]['message']+'</p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
    //             }
    //           }

    //         };

    //         cm.append(list_msg);
    //         emojify.run(document.getElementById('chat-list'));
    //         var objDiv = document.getElementById("chat-list");
    //         $('#chat-list').stop().animate({
    //           scrollTop: $("#chat-list")[0].scrollHeight
    //         }, 500);
    //       }

    // });
  }
}