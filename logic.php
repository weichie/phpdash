<?php
	/* USER ACTIONS
	===================================== */
	if(isset($_POST['register'])){
		$user->register($_POST['username'], $_POST['email'], $_POST['password']);
	}
	if(isset($_POST['login'])){
		$user->login($_POST['email'], $_POST['password']);
	}
	if(isset($_POST['update_user'])){
		$user->updateUser($_POST['name'], $_POST['username'], $_POST['email'], $_POST['company']);
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

	/* TODO ACTIONS
	===================================== */
	if(isset($_POST['add_todo'])){
		$todo->addTodo($_POST['date'], $_POST['info']);
	}
	if(isset($_GET['delete_todo'])){
		$todo->deleteTodo();
	}

	/* UPCOMING ACTIONS
	===================================== */
	if(isset($_POST['add_upcoming'])){
		$upcoming->newUpcoming($_POST['date'], $_POST['info'], $_POST['budget']);
	}
	if(isset($_GET['delete_upcoming'])){
		$upcoming->deleteProject();
	}
?>