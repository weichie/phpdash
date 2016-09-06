<?php
	include_once('header.php');
?>

<div class="container login-container">
	<img src="assets/imgs/logo-black.png" alt="WeichieProjects logo">
	<form action="" method="post">
		<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		<button type="submit" name="login" class="btn btn-default pull-right">Login</button>
	</form>
	<a href="#!">Forgot your password?</a><br>
	<a href="?p=register">Register now!</a>
</div><!-- ./container -->