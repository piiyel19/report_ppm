<div class="content-wrapper">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"> <b>Generate Report</b> </h3>
			</div>
			
			<div class="box-body">
				<form method="post" action="<?= base_url()?>network">
					<div class="row">
						<div class="col-md-3">
							<label>PPM Activity</label><br>
							<select class="form-control">
								<option value="">-- Select Activity --</option>
								<?= lookup_option_ppm_act_name('Network')?>
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
						<div class="col-md-3">
							<label>Location</label><br>
							<select class="form-control" name="location_net">
								<option value="">-- Location --</option> 
		                        <option value="datacenter">Datacenter</option>    
		                        <option value="tcr_room">TCR Room</option>
		                        <option value="backup_room">Backup Room</option> 
							</select>
						</div>

						<div class="col-md-3">
							<label>Type Device</label><br>
							<select class="form-control" name="ppm_device">
								<option value="">-- Type Devices --</option>
								<option value="ALL">ALL</option>
		                        <?= lookup_network_device_type(); ?>
							</select>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-9" style="align-content: center;">
							<button type="submit" class="btn btn-success">Generate Report</button>
							<button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url()?>dashboard'">Back</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>