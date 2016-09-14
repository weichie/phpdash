<!DOCTYPE html>
<html lang="nl">
<head>
	<!-- Standardzz -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page</title>

	<!-- Stylezz - You need a sass-compiler -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<link rel="stylesheet" href="assets/css/backup-styles.css">

	<!-- Fontzz -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

</head>
<body>
	<header>
		<div class="color-line"></div>

		<?php 
			if(!empty($_SESSION['logged'])){
		?>
		<div class="navigation flexbox">
			<div class="logo"><a href="/">WeichieProjects</a></div>
			<div class="expenses">
				<ul>
					<li>Income: <span class="green"><?php echo money_format("%.2n", $inkomsten->getTotalIncome());?></span></li>
					<li>Expenses: <span class="red">400</span></li>
					<li>Profits: <span class="blue">800</span></li>
				</ul>
			</div><!-- ./expenses -->
			<div class="navbar-right">
				<ul>
					<li><a href="?logout=true" name="logout">logout <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
				</ul>
			</div><!-- ./navbar-right -->
		</div><!-- ./navigation -->
		<?php } ?>
	</header>