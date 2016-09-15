<?php
	ob_start();
	session_start();
	$db = new mysqli('localhost','root','root','phpdash');

	define('SITE_URL', '/phpdash');

	spl_autoload_register(function($class_name){
		include 'classes/' . $class_name . '.class.php';
	});

	$user = new User($db);
	$inkomsten = new Inkomsten($db);
	$uitgaven = new Uitgaven($db);
?>