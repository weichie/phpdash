<?php 
	$facturen = $inkomsten->getAll();
?>
<div class="page-title flexbox">
	<h1>Inkomsten</h1>
	<button class="btn btn-default" data-toggle="modal" data-target="#inputModel">toevoegen</button>
</div><!-- title -->
<div class="page-content">
	<table class="table table-striped doc-table">
		<thead>
			<tr>
				<th>#</th>
				<th>date</th>
				<th>Company</th>
				<th>Project</th>
				<th>Price</th>
				<th><i class="fa fa-file-text-o" aria-hidden="true"></i></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($facturen as $factuur):
			?>
			<tr>
				<td><?php echo $factuur['id']; ?></td>
				<td>
				<?php 
					$date = new DateTime($factuur['date']);
					echo $date->format('d/m/Y'); 
				?>
				</td>
				<td><?php echo $factuur['company']; ?></td>
				<td><?php echo $factuur['project']; ?></td>
				<td>€ <?php echo money_format("%.2n", $factuur['price']);?></td>
				<td><a href="#!">factuur</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>	
	</table>
</div><!-- ./page-content -->

<!-- MODAL
=========================== -->
<div class="modal fade" id="inputModel" tabindex="-1" role="dialog" aria-labelledby="invoerModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="invoerModal">Nieuw factuur invoegen</h4>
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
						<label for="company" class="col-sm-2 control-label">Company</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="company" placeholder="Company name" name="company" required>
						</div>
					</div><!-- ./form-group -->
					<div class="form-group">
						<label for="project" class="col-sm-2 control-label">Project</label>
						<div class="col-sm-10">
							<textarea type="text" rows="4" class="form-control" id="project" placeholder="Project description" name="project" required></textarea>
						</div>
					</div><!-- ./form-group -->
					<div class="form-group">
						<label for="price" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10">
							<input type="text" rows="4" class="form-control" id="price" placeholder="€ 0.00" name="price" required></textarea>
						</div>
					</div><!-- ./form-group -->
			</div><!-- ./model-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
				<button type="submit" name="add_invoice" class="btn btn-primary">add project</button>
				</form>
			</div><!-- ./modal-footer -->
		</div><!-- ./modal-content -->
	</div><!-- ./modal-dialog -->
</div><!-- ./modal -->