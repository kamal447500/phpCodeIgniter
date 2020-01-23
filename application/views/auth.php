<?php include('header.php'); ?>

	<div class="container">
		<?php if( $error = $this->session->flashdata('required') ): ?>
			<div class="alert alert-dismissible alert-success">
				<?php echo $error; ?>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-12">
				<?php echo anchor("auth/create", 'Create', ['class'=>'btn btn-primary']); ?>
			</div>
		</div>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>CustomerName</th>
					<th>Phone</th>
					<th>Adress</th>
					<th>City</th>
					<th>Country</th>
					<th>Operations</th>
				</tr>
			</thead>

			<tbody>
				<?php if( count($records) ): ?>
					<?php foreach ($records as $record): ?>
						<tr>
							<td><?php echo $record->customerName; ?></td>
							<td><?php echo $record->phone; ?></td>
							<td><?php echo $record->address; ?></td>
							<td><?php echo $record->city; ?></td>
							<td><?php echo $record->country; ?></td>
<td><?php echo anchor("auth/edit/{$record->id}", 'Update', ['class'=>'btn btn-success']); ?></td>
<td><?php echo anchor("auth/delete/{$record->id}", 'Delete', ['class'=>'btn btn-success']); ?></td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>No Records Found...</tr>
				<?php endif; ?>	
			</tbody>
		</table>
	</div>

<?php include('footer.php'); ?>

