<div class="col-xs-12 col-sm-6">
	<div class="panel">
		<div class="panel-heading green-bottom">
			<h3 class="panel-title">
				Recent income
				<ul>
					<li><span class="green"><?php echo money_format("%.2n", $inkomsten->getLastFiveIncome());?></span></li>
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
				$recents = $inkomsten->getLastFive();
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
				</div><!-- ./item -->
			<?php endforeach; ?>
		</div>
		<div class="panel-footer align-right">
			<a href="?p=income">view all</a>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-6">
	<div class="panel">
		<div class="panel-heading red-bottom">
			<h3 class="panel-title">
				Recent expenses
				<ul>
					<li><span class="red">800,00</span></li>
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
				$recents = $uitgaven->getLastFive();
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
				</div><!-- ./item -->
			<?php endforeach; ?>
		</div>
		<div class="panel-footer align-right">
			<a href="?p=expenses">view all</a>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-7">
	<div class="panel">
		<div class="panel-heading purple-border">
			<h3 class="panel-title">
				Upcoming Projects
				<ul>
					<li><a href="#!" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
					<li><a href="#!" class="hide-panel"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
				</ul>
			</h3>
		</div>
		<div class="panel-body">
			<div class="item-title">
				<span class="date">vanaf</span>
				<span class="title">Projectnaam + info</span>
				<span class="budget">budget</span>
			</div><!-- ./item -->
			<div class="item">
				<span class="date">14/09</span>
				<span class="title">Website annemie, <em>persoonlijk portfolio</em></span>
				<span class="budget">€ 800,00</span>
			</div><!-- ./item -->
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-5">
	<div class="panel">
		<div class="panel-heading blue-border">
			<h3 class="panel-title">
				Todo List
				<ul>
					<li><a href="#!" class="plus" data-toggle="modal" data-target="#todoModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
					<li><a href="#!" class="hide-panel"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
				</ul>
			</h3>
		</div>
		<div class="panel-body">
			<ul class="todo-list">
				<?php
					$todos = $todo->getAll();
					foreach($todos as $todo):
				?>
					<li>
						<?php echo $todo['info']; ?>
						<a href="?p=homepage&delete_todo&id=<?php echo $todo['id']; ?>" class="done"><i class="fa fa-times"></i></a>
					</li>
				<?php endforeach; ?>
			</ul><!-- ./todo-list -->
		</div>
	</div>
</div>


<!-- TODO MODAL
============================== -->
<div class="modal fade" id="todoModal" tabindex="-1" role="dialog" aria-labelledby="invoerModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="invoerModal">Add new todo item</h4>
			</div><!-- ./modal-header -->
			<div class="modal-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label for="date" class="col-sm-2 control-label">Date</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="date" name="date" required>
						</div>
					</div><!-- ./form-group -->
					<div class="form-group">
						<label for="info" class="col-sm-2 control-label">Info</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="info" placeholder="Todo Item" name="info" required>
						</div>
					</div><!-- ./form-group -->
			</div><!-- ./model-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
				<button type="submit" name="add_todo" class="btn btn-primary">add todo</button>
				</form>
			</div><!-- ./modal-footer -->
		</div><!-- ./modal-content -->
	</div><!-- ./modal-dialog -->
</div><!-- ./modal -->