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
				    				<label for="exampleInputEmail1">Type Device</label>
				    				<select class='form-control'>
				       				<option value=''>-- Select --</option>
				       				<option value="server_physical">Server(Physical)</option>    
		                  <option value="server_virtual">Server(Virtual)</option>
		                  <option value="storage">Storage</option>
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