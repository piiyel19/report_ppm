<div class="content-wrapper">
	<section class="content">

		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Asset PPM</h5>


		<div class="col-md-12">
			<div class="box box-success">
	      <div class="box-header with-border">
	        <h3 class="box-title"> <b>Generate Report</b> </h3>
	      </div>
	          
	          <div class="box-body">
	          	<form action="<?= base_url()?>Server_generator/server">
	          		<div class="row">
									<div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">*PPM Category</label>
				    				<select class='form-control' name='PPM_Category' id='PPM_Category'>
				       				<option value='Workstation'>Workstation</option>
				       				<option selected>Server</option>
				       				<option value='Network'>Network</option>
		          			</select>
				    			</div>

									<div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">*PPM Activity</label>
				    				<select class='form-control'>
				       				<option value=''>-- Select Activity --</option>
		          				<?= lookup_option_ppm_act_name('Server'); ?>
		          			</select>
				    			</div>
	          		</div>

								<div class="row">
									<div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">Type Device</label>
				    				<select class='form-control'>
				       				<option value=''>-- Optional --</option>
				       				<option value="Access Point">Server(Physical)</option>    
		                  <option value="Controller">Server(Virtual)</option>
		                  <option value="Firewall">Storage</option>
		          			</select>
				    			</div>

									<div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">Quarter</label>
				    				<select class='form-control'>
				       				<option value=''>-- Optional --</option>
		          				<?= lookup_deployment_state(); ?>
		          			</select> 
				    			</div>

									<div class="form-group col-md-3">
				    				<label for="exampleInputEmail1">day</label>
				    				<select class='form-control'>
				       				<option value=''>-- Optional --</option>
		          				<?= lookup_deployment_state(); ?>
		          			</select>
				    			</div>
	          		</div>

	          		<div class="row">
									<div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Start From</label>
                    <input class='datetime form-control'></input>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">End From</label>
                    <input class='datetime form-control'></input>
                  </div>
	          		</div>


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