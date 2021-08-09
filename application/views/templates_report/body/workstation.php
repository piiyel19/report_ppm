<div class="content-wrapper">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"> <b>Generate Report</b> </h3>
			</div>
			<div class="box-body">
				<form action="<?= base_url()?>workstation" method="post">
					
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
						<div class="col-md-2">
							<label>PPM Activity</label><br>
							<select class="form-control" name="ppm_activity">
								<option value=''>-- Select Activity --</option>
								<option value="ALL">ALL</option>
		          				<?= lookup_option_ppm_act_name('workstation'); ?>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-9"><label>Time Range</label></div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
							<label>Start Date</label>
							<input type="text" class="form-control datepicker" name="datestart" placeholder="Select Start Date...">
						</div>
						<div class="col-md-3">
							<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
							<label>End Date</label>
							<input type="text" class="form-control datepicker" name="dateend" placeholder="Select End Date...">
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-2">
							<label>Level</label><br>
							<select class="form-control" name="level">
								<option selected=""> -- Select Level -- </option>
								<option value="ALL">ALL</option>
								<?= lookup_level(); ?>
							</select>
						</div>
						<div class="col-md-2">
							<label>Department</label><br>
							<select class="form-control" name="department">
								<option selected=""> -- Select Department -- </option>
								<option value="ALL">ALL</option>
								<?= lookup_department(); ?>
							</select>
						</div>
						<div class="col-md-2">
							<label>Type Device</label><br>
							<select class="form-control" name="ppm_device">
								<option selected=""> -- Select Device -- </option>
								<?= lookup_workstation_device_type(); ?>
							</select>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-9" style="align-content: center;">
							<button type="submit" class="btn btn-success">Generate Report</button>
							<button type="button" class="btn btn-primary">Back</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>