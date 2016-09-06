<?php
	include_once('templates/header.php');
?>

<div class="col-xs-12 col-sm-2 sidebar">
	<?php include_once('templates/sidebar.php'); ?>
</div><!-- ./sidebar -->
<div class="col-xs-12 col-sm-offset-2 col-sm-10 page">
	<?php
		if(isset($_GET['p'])){
			if(file_exists('templates/'.$_GET['p'].'.php')){
				include('templates/'.$_GET['p'].'.php');
			}else{
			?>
				Whoops, page does not exist...
			<?php
			}
		}else{
			include_once('templates/homepage.php');
		}
	?>
</div>

<?php
	include_once('templates/footer.php');
?>