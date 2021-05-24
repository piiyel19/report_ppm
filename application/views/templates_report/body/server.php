<div class="content-wrapper">
	<section class="content">

		<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Asset PPM</h5>


		<div class="col-md-12">
			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Generate Report</b> </h3>
	          </div>
	          <div class="box-body">
	          	<div class="row">
					<div class="form-group col-md-3">
				    <label for="exampleInputEmail1">*PPM Category</label>
				    <select class='form-control' name='PPM_Category' id='PPM_Category'>
				       <option value=''>< Select Category></option>
		          	   <option value='Workstation'>Workstation</option>
				       <option value='Server'>Server</option>
				       <option value='Network'>Network</option>
		          	</select>
				    </div>

					<div class="form-group col-md-3">
				    <label for="exampleInputEmail1">*PPM Activity</label>
				    <select class='form-control' name='PPM' id='COMP_Deployment_State'>
				       <option value=''>< Select Activity ></option>
		          		<?= lookup_deployment_state(); ?>
		          	</select>
				    <span id="alert_COMP_Name"></span> 
				    </div>
	          	</div>

				<div class="row">
					<div class="form-group col-md-3">
				    <label for="exampleInputEmail1">Type Device</label>
				    <select class='form-control' name='PPM' id='COMP_Deployment_State'>
				       <option value=''>< Optional ></option>
		          		<?= lookup_deployment_state(); ?>
		          	</select>
				    <span id="alert_COMP_Name"></span> 
				    </div>

					<div class="form-group col-md-3">
				    <label for="exampleInputEmail1">Quarter</label>
				    <select class='form-control' name='PPM' id='COMP_Deployment_State'>
				       <option value=''>< Optional ></option>
		          		<?= lookup_deployment_state(); ?>
		          	</select>
				    <span id="alert_COMP_Name"></span> 
				    </div>

					<div class="form-group col-md-3">
				    <label for="exampleInputEmail1">Year</label>
				    <select class='form-control' name='PPM' id='COMP_Deployment_State'>
				       <option value=''>< Optional ></option>
		          		<?= lookup_deployment_state(); ?>
		          	</select>
				    <span id="alert_COMP_Name"></span> 
				    </div>
	          	</div>

	          	<div class="row">
					<div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Start From</label>
                      <input class='datetime form-control' name='SERasset_start_date' id='SERasset_start_date'></input>
                      </div>

                     <div class="form-group col-md-3">
                       <label for="exampleInputEmail1">End From</label>
                       <input class='datetime form-control' name='SERasset_end_date' id='SERasset_end_date'></input>
                       </div>
	          	</div>


	          	<div class="row">
			        <div class="form-group col-md-2">
				     <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
				     </div>
				     <div class="form-group col-md-2">
				     <button class="btn btn-primary btn-block" onclick="Generate();"> Generate </button>
				     </div>
				  </div>
	          </div>
	        </div>
	    </div>

	</section>
</div>