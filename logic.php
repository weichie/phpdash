<?php
	/* USER ACTIONS
	===================================== */
	if(isset($_POST['register'])){
		$user->register($_POST['username'], $_POST['email'], $_POST['password']);
	}
	if(isset($_POST['login'])){
		$user->login($_POST['email'], $_POST['password']);
	}
	if(isset($_GET['logout'])){
		$user->logout();
	}

	/* INKOMSTEN ACTIONS
	===================================== */
	if(isset($_POST['add_invoice'])){
		$inkomsten->newInvoice($_POST['date'], $_POST['company'], $_POST['project'], $_POST['price']);
	}

	/* UITGAVEN ACTIONS
	===================================== */
	if(isset($_POST['add_cost'])){
		$uitgaven->newCost($_POST['date'], $_POST['item'], $_POST['description'], $_POST['price']);
	}
?>