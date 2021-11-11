<div class="content-wrapper">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"> <b>Generate Report</b> </h3>
			</div>
			<div class="box-body">
				<form action="<?= base_url()?>progress_workstation" method="post">
					
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
						<div class="col-md-4">
							<label>PPM Activity</label><br>
							<select class="form-control" name="ppm_activity">
								<option value=''>-- Select Activity --</option>
		          				<?= lookup_option_ppm_act_name('workstation'); ?>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-2">
						  <label>Select Type Report:</label>
						</div>
						<br>
						<div class="col-md-4" style="align-content: center;">
						  <input type="radio" name="typereport" onChange="getValue(this)" value="daily" checked> Progress Report - Daily</input><br>
						  <input type="radio" name="typereport" onChange="getValue(this)" value="month"> Progress Report - Montly</input><br>
						  <input type="radio" name="typereport" onChange="getValue(this)" value="level"> Progress Report by Level</input>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label>Report Title:</label>
							<input type="text" class="form-control" name="title">
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-3">
						  <span class="glyphicon glyphicon-calendar date" aria-hidden="true"></span>
						  <label class="date">Start Month</label>
						  <input type="text" class="form-control datepicker date" name="datestart" placeholder="Select Start Date...">
						</div>
						<div class="col-md-3">
						  <span class="glyphicon glyphicon-calendar date" aria-hidden="true"></span>
						  <label class="date">End Month</label>
						  <input type="text" class="form-control datepicker date" name="dateend" placeholder="Select End Date...">
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-3">
						  <label class='level' id='level'>Level</label><br>
						  <select class="form-control level" name="level" id='level_select'>
						  	<option selected=""> -- Select Level -- </option>
							<option value="ALL">ALL</option>
							<?= lookup_level(); ?>
						  </select>
						</div>
						<div class="col-md-3">
						  <label>Type Device</label><br>
						  <select class="form-control" name="ppm_device">
							<option selected=""> -- Select Device -- </option>
							<option value="ALL">ALL</option>
							<?= lookup_workstation_device_type(); ?>
						  </select>
						</div>
					</div>
					<br>

					<div class="row">
					  <div class="col-md-9" style="align-content: center;">
					  	<button type="submit" class="btn btn-success">Generate Report</button>
						<button type="button" class="btn btn-primary">Back</button>
					  </div>
					</div>

					<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	      			<script type="text/javascript">
	      			 function getValue(x) 
	      			 {
	      			  if(x.value == 'month')
	      			   {
	      				$('.level').hide();
	      				$('.date').show();
	      			   }
	      			  
	      			  else if(x.value == 'level')
	      			   {
	      				$('.level').show();
	      				$('.date').hide();
	      			   }

	      			  else
	      			   {
	      			   	$('.level').show();
	      				$('.date').show();
	      			   }
	      			 }
	      			</script>
				</form>
			</div>
		</div>
	</section>
</div>