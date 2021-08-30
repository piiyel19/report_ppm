<div class="content-wrapper">
	<section class="content">
		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Asset PPM</h5>
		 <div class="col-md-12">
			<div class="box box-success">
	      <div class="box-header with-border">
	        <h3 class="box-title"> <b>Generate Report</b> </h3>
	      </div>
	          
	          <div class="box-body">
	          	<form action="<?= base_url()?>server" method="post">

				    			<?php
										if (isset($_SESSION['error']))
										{
						  				echo '<div class="alert alert-danger" role="alert">';
						  				echo '<br />Error: '.$_SESSION['error'].'<br/>';
						  				echo '</div>';
						  				unset($_SESSION['error']);
										}
									?>

									<div class="row">
									<div class="form-group col-md-3">
				    				<label>*PPM Activity</label>
				    				<select class='form-control' name="ppm_activity">
				       				<option value=''>-- Select Activity --</option>
		          				<?= lookup_option_ppm_act_name('Server'); ?>
		          			</select>
				    			</div>
	          		</div>

								<div class="row">

									<div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">Server Host</label>
				    				<select class='form-control' name='server_host'>
				       				<option selected="">-- Select --</option>
				       				<option value='host1'>Host 1</option>    
		                  <option value='host2'>Host 2</option>
		                  <option value='host3'>Host 3</option>
		                  <option value='host4'>Host 4</option>
		                  <option value='host5'>Host 5</option>
		                  <option value='host6'>Host 6</option>
		                  <option value='host7'>Host 7</option>
		                  <option value='host8'>Host 8</option>
		          			</select>
				    			</div>

									<div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">Type Device</label>
				    				<select class='form-control' name='ppm_device'>
				       				<option selected="">-- Select --</option>
				       				<option value="ALL">ALL</option>
				       				<!-- <option value='Server(Physical)'>Server(Physical)</option>    
		                  <option value='Server(Virtual)'>Server(Virtual)</option>
		                  <option value='Storage'>Storage</option> -->
		                  <?= lookup_server_device_type(); ?>
		          			</select>
				    			</div>

									<!-- <div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">Quarter</label>
				    				<select class='form-control'>
				       				<option value=''>-- Select --</option>
		          				<?= lookup_quarter(); ?>
		          			</select> 
				    			</div> -->

									<!-- <div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">day</label>
				    				<select class='form-control'>
				       				<option value=''>-- Optional --</option>
		          				<?= lookup_deployment_state(); ?>
		          			</select>
				    			</div> -->
	          		</div>

	          		<div class="row">
									<div class="col-md-9"><label>Time Range</label></div>
								</div>

	          		<div class="row">
									<div class="form-group col-md-3">
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <label>Start Date</label>
                    <input type="text" class="form-control datepicker" name="datestart" placeholder="Select Start Date...">
                  </div>

                  <div class="form-group col-md-3">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <label>End Date</label>
                    <input type="text" class="form-control datepicker" name="dateend" placeholder="Select End Date...">
                  </div>
	          		</div>
	          		<br>

	          		<div class="row">
									<div class="col-md-9" style="align-content: center;">
										<button type="submit" class="btn btn-success">Generate Report</button>
										<button type="button" class="btn btn-primary">Back</button>
									</div>
				  			</div>
				  		</form>
				  	</div>
			</div>
		</div>
	</section>
</div>