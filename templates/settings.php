<div class="col-xs-12 user-settings">
	<h3>user settings</h3>

	<form class="form-horizontal" action="" method="post">
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="name" name="name" placeholder="Name">
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-4">
				<input type="email" class="form-control" id="email" name="email" placeholder="Email">
			</div>
		</div>
		<div class="form-group">
			<label for="company" class="col-sm-2 control-label">Company</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="company" name="company" placeholder="Company name">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
			<div class="col-sm-4">
				<input type="file" id="exampleInputFile">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-5 col-sm-4">
				<button type="submit" class="btn btn-default" name="update_user">Update</button>
			</div>
		</div>
	</form>
</div><!-- ./user-settings -->
<div class="col-xs-12 col-sm-12">
	<div class="panel">
		<div class="panel-heading green-bottom">
			<h3 class="panel-title">
				INCOME
				<ul>
					<li><span class="green"><?php echo money_format("%.2n", $inkomsten->getTotalIncome());?></span></li>
					<li><a href="#!" class="hide-panel"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
				</ul>
			</h3>
		</div>
		<div class="panel-body">
			<div class="item-title">
				<span class="date">date</span>
				<span class="title">company</span>
				<span class="budget">price</span>
			</div><!-- ./item -->

			<?php
				$recents = $inkomsten->getAll();
				foreach($recents as $recent):
			?>
				<div class="item">
					<span class="date">
					<?php
						$date = new DateTime($recent['date']);
						echo $date->format('d/m');
					?>
					</span>
					<span class="title"><?php echo $recent['company']; ?></span>
					<span class="budget">€ <?php echo money_format("%.2n", $recent['price']);?></span>
					<!--
					<span class="edit"><a href="#!"></a></span>
					<span class="remove"><a href="#!"><i class="fa fa-times"></i></a></span>
					-->
				</div><!-- ./item -->
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="col-xs-12 col-sm-12">
	<div class="panel">
		<div class="panel-heading red-bottom">
			<h3 class="panel-title">
				EXPENSES
				<ul>
					<li><span class="red"><?php echo money_format("%.2n", $uitgaven->getTotalExpenses());?></span></li>
					<li><a href="#!" class="hide-panel"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
				</ul>
			</h3>
		</div>
		<div class="panel-body">
			<div class="item-title">
				<span class="date">date</span>
				<span class="title">item</span>
				<span class="budget">price</span>
			</div><!-- ./item -->

			<?php
				$recents = $uitgaven->getAll();
				foreach($recents as $recent):
			?>
				<div class="item">
					<span class="date">
					<?php
						$date = new DateTime($recent['date']);
						echo $date->format('d/m');
					?>
					</span>
					<span class="title"><?php echo $recent['item']; ?></span>
					<span class="budget">€ <?php echo money_format("%.2n", $recent['price']);?></span>
					<!--
					<span class="edit"><a href="#!"></a></span>
					<span class="remove"><a href="#!"><i class="fa fa-times"></i></a></span>
					-->
				</div><!-- ./item -->
			<?php endforeach; ?>
		</div>
	</div>
</div>