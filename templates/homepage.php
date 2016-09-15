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
	</div>
</div>
<div class="col-xs-12 col-sm-6">
	<div class="panel">
		<div class="panel-heading red-bottom">
			<h3 class="panel-title">
				Recent expenses
				<ul>
					<li><span class="red">800,00</span></li>
					<li><a href="#!" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
			<div class="item">
				<span class="date">06/09</span>
				<span class="title">FAR</span>
				<span class="budget">€ 625,00</span>
			</div><!-- ./item -->
			<div class="item">
				<span class="date">06/09</span>
				<span class="title">FAR</span>
				<span class="budget">€ 625,00</span>
			</div><!-- ./item -->
			<div class="item">
				<span class="date">06/09</span>
				<span class="title">FAR</span>
				<span class="budget">€ 625,00</span>
			</div><!-- ./item -->
			<div class="item">
				<span class="date">06/09</span>
				<span class="title">FAR</span>
				<span class="budget">€ 625,00</span>
			</div><!-- ./item -->
			<div class="item">
				<span class="date">06/09</span>
				<span class="title">FAR</span>
				<span class="budget">€ 625,00</span>
			</div><!-- ./item -->
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
					<li><a href="#!" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
					<li><a href="#!" class="hide-panel"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
				</ul>
			</h3>
		</div>
		<div class="panel-body">
			<ul class="todo-list">
				<li>Craniovision update list + spam <a href="#!" class="done"><i class="fa fa-times"></i></a></li>
				<li>Craniovision update list + spam <a href="#!" class="done"><i class="fa fa-times"></i></a></li>
				<li>Craniovision update list + spam <a href="#!" class="done"><i class="fa fa-times"></i></a></li>
				<li>Craniovision update list + spam <a href="#!" class="done"><i class="fa fa-times"></i></a></li>
			</ul><!-- ./todo-list -->
		</div>
	</div>
</div>