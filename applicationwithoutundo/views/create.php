<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet"> 
    <title>Customer Page</title>
  </head>
	<div class="container">
		
		<?php echo form_open('user/save',['class'=>'form-horizontal']); ?>
			<fieldset>
				<div class="container"></div>
				<legend>Create Customer</legend>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
				  		  <label for="inputEmail" class="col-lg-4 control-label">Customer Name</label>
				  		  <div class="col-lg-8">
				  			
				  			<?php echo form_input(['name'=>'customerName', 'class'=>'form-control', 'placeholder'=>'Customer Name', 'value'=>set_value('customerName')]); ?>
				  		  </div>
					    </div>
				    </div>
				
					<div class="col-lg-6">
						<?php echo form_error('customerName'); ?>
					</div>		
				</div>
				
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
				  		  <label for="inputEmail" class="col-lg-5 control-label">Phone</label>
				  		  <div class="col-lg-9">
				  			
				  			<?php echo form_input(['name'=>'phone', 'class'=>'form-control', 'placeholder'=>'Phone', 'value'=>set_value('phone')]); ?>
				  		  </div>
					    </div>
				    </div>
				
					<div class="col-lg-6">
						<?php echo form_error('phone'); ?>
					</div>		
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
				  		  <label for="inputEmail" class="col-lg-6 control-label">Address</label>
				  		  <div class="col-lg-10">
				  			
				  			<?php echo form_input(['name'=>'address', 'class'=>'form-control', 'placeholder'=>'Address', 'value'=>set_value('phone')]); ?>
				  		  </div>
					    </div>
				    </div>
				
					<div class="col-lg-6">
						<?php echo form_error('address'); ?>
					</div>		
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
				  		  <label for="inputEmail" class="col-lg-7 control-label">City</label>
				  		  <div class="col-lg-11">
				  			
				  			<?php echo form_input(['name'=>'city', 'class'=>'form-control', 'placeholder'=>'City', 'value'=>set_value('city')]); ?>
				  		  </div>
					    </div>
				    </div>
				
					<div class="col-lg-6">
						<?php echo form_error('city'); ?>
					</div>		
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
				  		  <label for="inputEmail" class="col-lg-8 control-label">Country</label>
				  			<div class="col-lg-12">
				  			
				  			<?php echo form_input(['name'=>'country', 'class'=>'form-control', 'placeholder'=>'Country', 'value'=>set_value('country')]); ?>
				  		  	</div>
					    </div>
				    </div>
				
					<div class="col-lg-6">
						<?php echo form_error('country'); ?>
					</div>		
				</div>

				
				<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">

				  	<?php echo form_submit(['value'=>'submit', 'class'=>'btn-btn-primary']); ?>
				  	<?php echo form_reset(['value'=>'Reset', 'class'=>'btn-btn-default']); ?>
				  	
				  </div>
				</div>
			</fieldset>
		<?php echo form_close(); ?>	
	</div>
</html>