<?php
	/* USER ACTIONS
	===================================== */
	if(isset($_POST['register'])){
		$user->register($_POST['username'], $_POST['email'], $_POST['password']);
	}
	if(isset($_POST['login'])){
		$user->login($_POST['email'], $_POST['password']);
	}
?>