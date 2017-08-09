<!DOCTYPE html>
<?php
	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
		die();
	}

	// echo $_SESSION['display_name'];
?>

<html>
<head>
	<title>MXMchat</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="src/css/basic/emojify.css">
	<link href="css/perfect-scrollbar.min.css" rel="stylesheet">
	<link href="css/csshake.min.css" rel="stylesheet">
	<script src="jquery-1.11.3.min.js"></script>
	<script src="jquery-migrate-1.2.1.min.js"></script>
	<link rel="shortcut icon" href="img/spanky.jpg">

</head>
<body>
<audio id="buzzer" src="sound/pm-message.mp3" type="audio/mp3"></audio>
<audio id="notif" src="sound/user-connected.mp3" type="audio/mp3"></audio>
<audio id="msc" type="audio/mp3"></audio>
<div >

	<?php
		$ipAddress=$_SERVER['REMOTE_ADDR'];
		// echo $_SESSION['userid'];
	?>
	<header>
		<nav role="navigation">
			<ul>
				<li>
					<a style="background-color:#fff">
						<div>
							<h1 class="maxclr">MXM<b><span style="font-size:20px;color:#7f8c8d;">chat</span></b></h1>
						</div>
					</a>

				</li>
				<div style="position:absolute;display:block;right:0;bottom:0;"><a id="logout" href="logout.php" style="font-descoration:none"><i class="fa fa-sign-out fa-4x" style="color:#fff"></a></i></div>
			</ul>
		</nav>
	</header>
	<div class="window-wrapper">
		<div class="window-title">
			<div class="dots">
				<i class="fa fa-circle"></i>
				<i class="fa fa-circle"></i>
				<i class="fa fa-circle"></i>
			</div>
			<div class="title">
				<h1 class="maxclr">MXM<b><span style="font-size:10px;color:#7f8c8d;">chat</span></b></h1>
			</div>
			<div class="expand">
				<i class="fa fa-expand"></i>
			</div>
		</div>
		<div class="window-area">
			<div class="conversation-list" style="overflow-y:scroll">
				<ul class="" >
					<?php if ($_SESSION['username']=='7thsign' || $_SESSION['username']=='mangjuan' || $_SESSION['username']=='jay' || $_SESSION['username']=='boy' || $_SESSION['username']=='ryan' || $_SESSION['username']=='vic'): ?>
						<li class="item" ><select name="" id="songs">
							<option value=""></option>
							<?php
								 $dir    = 'sound';
								 $files2 = scandir($dir, 1);
								 foreach ($files2 as $key => $value) {
								 	echo "<option>$value</option>";
								 }
							?>
						</select></li>

						<li class="item" style="text-align: center"><a href="#" onCLick="change()">PLAY</a></li>


					<?php endif ?>

					<!-- <li><a href="#"><i class="fa fa-circle-o online"></i></i><span>Cucu Ionel</span><i class="fa fa-times"></i></a></li>
					<li><a href="#"><i class="fa fa-circle-o idle"></i></i><span>Jan Dvořák</span><i class="fa fa-times"></i></a></li>
					<li><a href="#"><i class="fa fa-circle-o offline"></i></i><span>Clark Kent</span><i class="fa fa-times"></i></a></li> -->
          <!-- <li><a href="#"><i class="fa fa-circle-o offline"></i></i><span>Ioana Marcu</span><i class="fa fa-times"></i></a></li> -->
				</ul>
				<!-- <div class="my-account">
					<div class="image">
						<?php if ($_SESSION['avatar'] == ''): ?>
							<img src="img/default_user.png" height="140" width="140">
						<?php else: ?>
							<img src="img/spanky.jpg" height="140" width="140">
						<?php endif ?>

						<i class="fa fa-circle online"></i>
					</div>
					<div class="name">
						<span><?php echo $_SESSION['username']; ?></span>
						<i class="fa fa-angle-down"></i>
						<span class="availability chat-status">Available</span>
					</div>

				</div> -->
			</div>
			<div class="chat-area" style="background-color:#000">
				<div class="title"><b id="user-title">DASHBOARD</b></div>
				<div class="chat-list" id="chat-list" >
					<ul>
						<!-- <li class="chat-message">
							<div class="name">
								<span class="">Christian Smith</span>
							</div>
							<div class="message">
								<p>Yeah, will do.</p>
								<span class="msg-time">5:04 pm</span>
							</div>
						</li> -->
						<!-- <li class="chat-message"><div class="name"><p style="color:#e67e22"></p></div><div class="message" style="text-align:center"><h1>WELCOME TO SPANKY CHAT</h1><p></p></div></li> -->
						<li class="chat-message"><embed style="width:100%;height:300px;margin-top:15%" src="swf/evangelions.swf"></li>

					</ul>
				</div>
				<div class="input-area" style="display:none">
					<div class="input-wrapper">
						<input class="chat-textarea" type="text" value="">
						<i class="fa fa-smile-o"></i>
						<label for="file-input">
					        <i class="fa fa-paperclip"></i>
					    </label>
					    <input type="file" id="file-input" style="display:none">
					</div>
					<input type="button" value="Submit" class="send-btn" id="chat-click">
				</div>
			</div>
			<div class="right-tabs">
				<ul class="tabs">
					<li class="active">
						<a href="#"><i class="fa fa-users"></i></a>
					</li>
					<li><a href="#"><i class="fa fa-paperclip"></i></a></li>
					<li><a href="#"><i class="fa fa-link"></i></a></li>
				</ul>
				<ul class="tabs-container">
					<li class="active">
						<ul class="member-list">
							<!-- <li><span class="status online"><i class="fa fa-circle-o"></i></span><span>Cucu Ionel</span></li>
							<li><span class="status online"><i class="fa fa-circle-o"></i></span><span>Christian Smith</span></li>
							<li><span class="status idle"><i class="fa fa-circle-o"></i></span><span>John Bradley</span><span class="time">10:45 pm</span></li>
							<li><span class="status offline"><i class="fa fa-circle-o"></i></span><span>Daniel Freitz</span></li> -->
						</ul>
					</li>
					<li></li>
					<li></li>
				</ul>
				<i class="fa fa-cog"></i>
			</div>
		</div>
	</div>
	<div class="typed-cursor" style="text-align:center;, font: inherit; font-size:35px;margin-bottom:20px;color:#e74c3c">#QOTD</div>
	<div style="text-align:center;"><span class="ele" style="font: inherit; font-size:20px"></span></div>
	<!-- <div class="disqus-loader-bubble" style="height: 52px; width: 54px; margin: 0px auto; overflow: hidden; position: relative; box-sizing: border-box;"><div class="disqus-loader-spinner" style="box-sizing: border-box; width: 26px; height: 26px; position: absolute; top: 13px; left: 15px; border-width: 3px; border-style: solid; border-color: rgba(51, 54, 58, 0.4) transparent; border-radius: 13px; transform-origin: 50% 50% 0px;"></div></div> -->
	<!-- <div id="fileuploader">Upload</div> -->
</div>
    <script src="webrtc/js/pubnub-dev.js"></script>
	<script src="webrtc/js/webrtc.js"></script>
	<script src="webrtc/js/sound.js"></script>
	<script src="src/emojify.js"></script>
	<script src="jquery.timeago.js"></script>
    <script src="perfect-scrollbar.jquery.js"></script>
    <script src="typed.js"></script>
    <script src="noise.js"></script>

    <!-- // <script src="emogotchi/main.js"></script> -->
	<?php
		try {
		    echo '<script src="http://10.197.80.12:8080/socket.io/socket.io.js"></script>';
		    // Code following an exception is not executed.

		} catch (Exception $e) {
		    echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	?>
	<script src="main.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/emojify.js/0.9.5/emojify.min.js"></script> -->
	<script type="text/javascript">
		(function(){
			// var urlargs         = urlparams();


			var audio = $("#msc");
			// alert($.session.get('time'));
			// console.log(window.webkitNotifications);
			$("#file-input").change(function (){
			   var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
			   $(".chat-textarea").val(fileName);
			});

			var getNode = function(s){
				return document.querySelector(s);
			}
			// Get required nodes
			message = getNode('.chat-textarea');
			from = getNode('.chat-name');
			status = getNode('.chat-status');
			sess_id = "<?php echo $_SESSION['userid'] ?>";
			try{
				var socket = io.connect('http://10.197.80.12:8080');
				var phone = PHONE({
			        number        : "<?php echo $_SESSION['wrtcid'] ?>",
			        publish_key   : 'pub-c-672da981-e5a2-457a-ab66-a68331ff033d',
			        subscribe_key : 'sub-c-de9f796e-7ed9-11e5-92ab-0619f8945a4f',
			        media 		  : { audio : true, video : false },
			        ssl           : true
			    });

			    // $('#my_num').text(phone.number);
			    var sessions = [];
			    // As soon as the phone is ready we can make calls
				socket.io.on('connect_error', function(err) {
				  // handle server error here
				  $('.chat-status').text('Disconnected');
				  $('.chat-status').css('color','#e74c3c');
				  console.log('onerror');
				});

				// socket.io.on('connect', function(socket) {
				//   // handle server error here

				// });
			}catch(e){
				console.log(e);
			}

			socket.emit('login',{userId:'<?php echo $_SESSION["userid"]?>'});

			socket.on('user_notify',function(data){
				$('#notif').trigger('play');
				if ("<?php echo $_SESSION['userid'] ?>" != data[0]['id']) { spawnNotification('is now online','img/default.jpg',data[0]['display_name']); };
				phone.ready(function(){

			        // Dial a Number and get the Call Session
			        // For simplicity the phone number is the same for both caller/receiver.
			        // you should use different phone numbers for each user.


			        // var session = phone.dial('291');

			   //      if("<?php echo $_SESSION['wrtcid'] ?>" == 'kevin'){
			   //      	sessions.push(phone.dial('mangjuan'));
						// sessions.push(phone.dial('elvis'));
						// sessions.push(phone.dial('mac'));
						// sessions.push(phone.dial('jeff'));
			   //      }

			   //      if("<?php echo $_SESSION['wrtcid'] ?>" == 'jeff'){
			   //      	sessions.push(phone.dial('mangjuan'));
						// sessions.push(phone.dial('elvis'));
						// sessions.push(phone.dial('mac'));
						// sessions.push(phone.dial('kevin'));
			   //      }

			   //      if("<?php echo $_SESSION['wrtcid'] ?>" == 'mangjuan'){
			   //      	sessions.push(phone.dial('jeff'));
						// sessions.push(phone.dial('elvis'));
						// sessions.push(phone.dial('mac'));
						// sessions.push(phone.dial('kevin'));
			   //      }

			   //      if("<?php echo $_SESSION['wrtcid'] ?>" == 'elvis'){
			   //      	sessions.push(phone.dial('jeff'));
						// sessions.push(phone.dial('mangjuan'));
						// sessions.push(phone.dial('mac'));
						// sessions.push(phone.dial('kevin'));
			   //      }

			   //      if("<?php echo $_SESSION['wrtcid'] ?>" == 'mac'){
			   //      	sessions.push(phone.dial('jeff'));
						// sessions.push(phone.dial('mangjuan'));
						// sessions.push(phone.dial('elvis'));
						// sessions.push(phone.dial('kevin'));
			   //      }

			    sessions.push(phone.dial('jeff'));
					sessions.push(phone.dial('kevin'));
					sessions.push(phone.dial('mangjuan'));
					sessions.push(phone.dial('mac'));
					sessions.push(phone.dial('mark'));
					sessions.push(phone.dial('cats'));
					sessions.push(phone.dial('jr'));
					sessions.push(phone.dial('jer'));
					sessions.push(phone.dial('roy'));
					sessions.push(phone.dial('gen'));
					sessions.push(phone.dial('carnil'));
					sessions.push(phone.dial('vic'));
					sessions.push(phone.dial('ryan'));
					// sessions.push(phone.dial('friend-three'));
					// sessions.push(phone.dial('friend-four'));
					// sessions.push(phone.dial('friend-five'));

			    });

			    // When Call Comes In or is to be Connected
			    phone.receive(function(session){

			        // Display Your Friend's Live Video
			        // session.connected(function(session){
			        //     PUBNUB.$('video-out').appendChild(session.video);
			        // });

				    sessions.forEach(function(friend){
					    friend.connected(function(session){  });
					    // friend.ended(function(session){     /* call ended     */ });
					});

			    });
			});
			if(socket !== undefined){
				$('.chat-status').text('Connected');
				 $('.chat-status').css('color','#1abc9c');
				message.addEventListener('keydown', function(event){
					var msg = message.value,
					name = "<?php echo $_SESSION['userid'] ?>";
						// console.log(event.which);
						if(event.which === 13 && event.shiftKey === false){
							socket.emit('input', {
								from:name,
								to:$('#user-title').data('id'),
								message:msg,
								created_at:(new Date()),
								id:"<?php echo $_SESSION['userid'] ?>",
								display_name:"<?php echo $_SESSION['display_name'] ?>"
							});
							$('.chat-textarea').val('');
							$('.chat-textarea').focus();
							var objDiv = document.getElementById("chat-list");
							$('#chat-list').stop().animate({
							  scrollTop: $("#chat-list")[0].scrollHeight
							}, 500);
						}
				});

				socket.on('users', function(data){
					var cm = $('.conversation-list ul');
					var ml = $('.member-list');
					$('.team_users').remove();
					$('.contact_users').remove();
					// var cmp = $('.chat-list .chat-message');
					var list_users = '';
					var list_members = '';

					if(data.length){
						socket.on('discon_user',function(datas){
							console.log(datas);
						});
						from = "<?php echo $_SESSION['userid'] ?>";
						to = 0;
						list_members += '<li class="contact_users"><span class="status online"><i class="fa fa-circle"></i></span><span><a href="#" style="text-decoration:none;color:#1abc9c" onClick="testChat('+from+','+to+')">Public</a></span><span id="new-msg-0" style="color:#fff;font-size:8px;background-color:#e67e22;margin-left:3%;border-radius:100px;display:none"><b style="padding:4%">new</b></span></li>';
						for (var i = 0; i < data.length; i++) {
							if (data[i].id != "<?php echo $_SESSION['userid'] ?>") {
								stat = (data[i].status == 1) ? 'online' : 'offline';
								to = data[i].id;
								list_users += '<li class="team_users"><a href="#"><i class="fa fa-circle online"></i></i><span>'+data[i].display_name+'</span><i class="fa fa-times"></i></a></li>';
								list_members += '<li class="contact_users" id="'+data[i].id+'"><span class="status '+stat+'"><i class="fa fa-circle"></i></span><span><a style="text-decoration:none;color:#1abc9c" href="#" onClick="testChat('+from+','+to+')">'+data[i].display_name+'</a></span><span id="new-msg-'+data[i].id+'" style="color:#fff;font-size:8px;background-color:#e67e22;margin-left:3%;border-radius:100px;display:none"><b style="padding:4%">new</b></span></li>';
							}

						};

						// cm.append(list_users);
						ml.append(list_members);

					}
							// console.log(data);

				});

				socket.on('user_output',function(data){
					// console.log("<?php echo $_SESSION['userid'] ?>");
					var cm = $('.chat-list ul');
					var cmp = $('.chat-list .chat-message');
					 var list_msg = '';
					 if(data.length && (data[0].from == $('#user-title').data('myid') || $('#user-title').data('id') == data[0].from || data[0].to == 0)){
					 			console.log($('#user-title').data('myid'));
								if (data[0].id != "<?php echo $_SESSION['userid'] ?>" ){

									if(data[0]['message'].trim()=="" || data[0]['message'].trim()==":)"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/default.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="tb"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/tb.jpeg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="tbmom"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/tbmom.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="spanky"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/spanky.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()==">("){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/angry.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="jeff"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/my-pic.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="80"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/shock.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="zzz"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/sleepy.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()==":("){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/sad.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="ngelmis"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/ngelmis.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="roy catimbang"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/imgo.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="dudong longhair"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/dudonglh.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="jeremiah"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/jeremiah.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="joseph"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/joseph.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="mac"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/mac.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="gen"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/gen.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="starfish"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/starfish.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="kd"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p><img src="img/kd.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else{
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[0]['display_name']+'</p></div><div class="message"><p>'+data[0]['message']+'</p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}

								}else{

									if(data[0]['message'].trim()=="" || data[0]['message'].trim()==":)"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/default.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="tb"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/tb.jpeg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="tbmom"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/tbmom.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="spanky"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/spanky.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()==">("){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/angry.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="jeff"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/my-pic.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="zzz"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/sleepy.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="80"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/shock.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()==":("){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/sad.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="ngelmis"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/ngelmis.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="roy catimbang"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/imgo.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="dudong longhair"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/dudonglh.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="jeremiah"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/jeremiah.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="joseph"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/joseph.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="mac"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/mac.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="gen"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/gen.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="starfish"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/starfish.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else if(data[0]['message'].trim()=="kd"){
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/kd.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}else{
										list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p>'+data[0]['message']+'</p><span class="msg-time">'+jQuery.timeago(data[0].created_at)+'</span></div></li>';
									}
								}



						cm.append(list_msg);
						emojify.run(document.getElementById('chat-list'));
						var objDiv = document.getElementById("chat-list");
						$('#chat-list').stop().animate({
						  scrollTop: $("#chat-list")[0].scrollHeight
						}, 500);
					}
					if(data.length && (data[0].from != $('#user-title').data('id'))){
						if(data[0].to == 0 && data[0].from != $('#user-title').data('myid')){
							$('#new-msg-0').show();
						}else{
							$( "#chat-list" ).addClass('shake-crazy');

							setTimeout(function () {
			                     $( "#chat-list" ).removeClass('shake-crazy');
			                }, 300);

							$('#new-msg-'+data[0].from).show();
						}

					}

					if(data[0].to == "<?php echo $_SESSION['userid'] ?>" || (data[0].to == 0 && data[0].from != "<?php echo $_SESSION['userid'] ?>")){
						$('#buzzer').trigger('play');
					}

					if(data[0].to == 0 && data[0].from != "<?php echo $_SESSION['userid'] ?>"){
						$('#new-msg-0').show();
					}




				});

				socket.on('output', function(data){
					var cm = $('.chat-list ul');
					var cmp = $('.chat-list .chat-message');
					var list_msg = '';
					if(data.length){

						for (var i = 0; i < data.length; i++) {
							// console.log(data[i].id);
							if (data[i].id != "<?php echo $_SESSION['userid'] ?>" ){

								if(data[i]['message'].trim()=="" || data[i]['message'].trim()==":)"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/default.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="tb"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/tb.jpeg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="tbmom"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/tbmom.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="spanky"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/spanky.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()==">("){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/angry.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="jeff"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/my-pic.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="80"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/shock.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="zzz"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/sleepy.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()==":("){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/sad.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="ngelmis"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/ngelmis.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="roy catimbang"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/imgo.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="dudong longhair"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/dudonglh.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="jeremiah"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/jeremiah.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="joseph"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/joseph.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="mac"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/mac.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="gen"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/gen.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="starfish"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/starfish.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="kd"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p><img src="img/kd.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else{
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">'+data[i]['display_name']+'</p></div><div class="message"><p>'+data[i]['message']+'</p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}

							}else{

								if(data[i]['message'].trim()=="" || data[i]['message'].trim()==":)"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/default.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="tb"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/tb.jpeg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="tbmom"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/tbmom.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="spanky"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/spanky.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()==">("){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/angry.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="jeff"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/my-pic.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="zzz"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/sleepy.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="80"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/shock.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()==":("){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/sad.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="ngelmis"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/ngelmis.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="roy catimbang"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/imgo.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="dudong longhair"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p><img src="img/dudonglh.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="jeremiah"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/jeremiah.png" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="joseph"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/joseph.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="mac"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/mac.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="gen"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/gen.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="starfish"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/starfish.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else if(data[i]['message'].trim()=="kd"){
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#e67e22">me</p></div><div class="message"><p><img src="img/kd.jpg" style="width:50%"></p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}else{
									list_msg += '<li class="chat-message"><div class="name"><p style="color:#1abc9c">me</p></div><div class="message"><p>'+data[i]['message']+'</p><span class="msg-time">'+jQuery.timeago(data[i].created_at)+'</span></div></li>';
								}
							}

						};

						cm.append(list_msg);
						emojify.run(document.getElementById('chat-list'));
						var objDiv = document.getElementById("chat-list");
						$('#chat-list').scrollTop(0);

						$('#chat-list').stop().animate({
						  scrollTop: $("#chat-list")[0].scrollHeight
						}, 500);
					}
							// console.log(data);
						$('.chat-status').text('Connected');
						$('.chat-status').css('color','#1abc9c');
						$('.chat-textarea').focus();



				});

				socket.on('notify', function(data){

					if(data.length && (data[0].to == "<?php echo $_SESSION['userid'] ?>" || data[0].to == 0)){


							if ("<?php echo $_SESSION['userid'] ?>" != data[0]['from']) { spawnNotification(data[0]['message'],'img/spanky.jpg',data[0]['display_name']); };


					}

				});

				socket.on('change_msc',function(val){

						audio.attr("src", 'sound/'+val);


				    /****************/
				    audio[0].pause();
				    audio[0].load();//suspends and restores all audio element

				    //audio[0].play(); changed based on Sprachprofi's comment below
				    audio[0].oncanplaythrough = audio[0].play();
				});


				$('#chat-click').click(function(){
					var msg = message.value,
					name = "<?php echo $_SESSION['userid'] ?>";

					socket.emit('input', {
						from:name,
						message:msg,
						created_at:(new Date()),
						id:"<?php echo $_SESSION['userid'] ?>",
						display_name:"<?php echo $_SESSION['display_name'] ?>"
					});
					$('.chat-textarea').val('');
					$('.chat-textarea').focus();
					var objDiv = document.getElementById("chat-list");
					$('#chat-list').stop().animate({
					  scrollTop: $("#chat-list")[0].scrollHeight
					}, 500);
				});

				$('.pri-chat-user').click(function(){
					alert('asd');
				});
			}else{
				console.log('asd');
			}
		})();

		function change(){
			// var audio = $("#msc");
			// audio.attr("src", 'sound/fart.mp3');
		 //    /****************/
		 //    audio[0].pause();
		 //    audio[0].load();//suspends and restores all audio element

		 //    //audio[0].play(); changed based on Sprachprofi's comment below
		 //    audio[0].oncanplaythrough = audio[0].play();
		    /****************/
		    val = $('#songs').val();
		    try{
				var socket = io.connect('http://10.197.80.12:8080');

				socket.io.on('connect_error', function(err) {

				  console.log('connect_error');

				});

				// socket.io.on('connect', function(socket) {
				//   // handle server error here

				// });
			}catch(e){
				console.log('asdsadsa');
			}

			socket.emit('change',val);
		}

		// function urlparams() {
		//     var params = {};
		//     if (location.href.indexOf('?') < 0) return params;

		//     PUBNUB.each(
		//         location.href.split('?')[1].split('&'),
		//         function(data) { var d = data.split('='); params[d[0]] = d[1]; }
		//     );

		//     return params;
		// }
		// audio.addEventListener("ended", function(){
		// 		 this[0].pause();
		//      this.currentTime = 0;
		//      console.log("ended");
		// });
	</script>
</body>
</html>