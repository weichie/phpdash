<?php
include_once('app.php');
include_once('logic.php');

if(isset($_SESSION['logged'])){
	include_once('templates/home.php');
}else{
	if($_GET['p'] == register){
		include_once('templates/register.php');
	}else{
		include_once('templates/login.php');
	}
}

include_once('templates/footer.php');
?>