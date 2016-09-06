<?php
	include_once('header.php');
?>
<div class="container login-container">
	<img src="assets/imgs/logo-black.png" alt="WeichieProjects logo">
	<form action="" method="post">
		<input type="text" class="form-control" id="username" name="username" placeholder="Username">
		<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		<button type="submit" name="register" class="btn btn-default pull-right">Register</button>
	</form>
	<a href="?p=login">Already have an account?</a><br>
</div><!-- ./container -->