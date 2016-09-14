<?php
include_once('app.php');
include_once('logic.php');

if(isset($_SESSION['logged'])){
	include_once('templates/home.php');
}else{
	include_once('templates/login.php');
}

include_once('templates/footer.php');
?>