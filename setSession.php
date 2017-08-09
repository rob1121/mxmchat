<?php  
	session_start();
	foreach ($_POST['info'] as $key => $value) {
		$_SESSION['userid'] = $value['id'];
		$_SESSION['username'] = $value['user_name'];
		$_SESSION['display_name'] = $value['display_name'];
		$_SESSION['avatar'] = $value['avatar'];
		$_SESSION['wrtcid'] = $value['wrtcid'];
	}
	echo 'true';
?>