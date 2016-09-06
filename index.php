<?php
include_once('app.php');
include_once('logic.php');

if(isset($_GET['p'])){
	if(file_exists('templates/'.$_GET['p'].'.php')){
		include('templates/'.$_GET['p'].'.php');
	}else{
	?>
		Whoops, page does not exist...
	<?php
	}
}else{
	if(isset($_SESSION['logged'])){
		include_once('templates/home.php');
	}else{
		include_once('templates/login.php');
	}
}

include_once('templates/footer.php');
?>