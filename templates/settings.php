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