<div class="logo">
	<a href="?p=homepage">
		<img src="assets/imgs/logo-black.png" alt="Weichieprojects Logo">
	</a>
</div><!-- ./logo -->

<div class="menu">
	<ul>
		<li><a href="?p=homepage" class="<?php if($_GET['p'] == 'homepage' || $_GET['p'] == ''){ echo 'active-page'; }?>">dashboard<i class="fa fa-tachometer"></i></a></li>
		<li><a href="?p=income" class="<?php if($_GET['p'] == 'income'){ echo 'active-page'; }?>">income<i class="fa fa-line-chart"></i></a></li>
		<li><a href="?p=expenses" class="<?php if($_GET['p'] == 'expenses'){ echo 'active-page'; }?>">expenses<i class="fa fa-credit-card"></i></a></li>
		<li><a href="?p=documents" class="<?php if($_GET['p'] == 'documents'){ echo 'active-page'; }?>">documents<i class="fa fa-file-text"></i></a></li>
		<li><a href="?p=analytics" class="<?php if($_GET['p'] == 'analytics'){ echo 'active-page'; }?>">analytics<i class="fa fa-pie-chart"></i></a></li>
		<li><a href="?p=investments" class="<?php if($_GET['p'] == 'investments'){ echo 'active-page'; }?>">investments<i class="fa fa-gavel"></i></a></li>
		<li><a href="?p=settings" class="<?php if($_GET['p'] == 'settings'){ echo 'active-page'; }?>">settings<i class="fa fa-cog"></i></a></li>
	</ul>
</div><!-- ./menu -->

<div class="copy">
	<p>&copy; 2016 <a href="http://weichieprojects.com" target="_blank">Weichie</a>, All Rights Reserved.</p>
	<p>Build with <i class="fa fa-heart-o"></i> in Belgium</p>
</div><!-- ./copy -->