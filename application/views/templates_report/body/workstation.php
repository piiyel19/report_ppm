<div class="content-wrapper">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"> <b>Generate Report</b> </h3>
			</div>
			<div class="box-body">
				<form action="<?= base_url()?>Ui_generator/workstation">
					<div class="row">
						<div class="col-md-2">
							<label>PPM Category</label><br>
							<select class="form-control">
								<option>Server</option>
								<option>Network</option>
							</select>
						</div>
						<div class="col-md-2">
							<label>PPM Activity</label><br>
							<select class="form-control">
								<option>Val1</option>
								<option>Val2</option>
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
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<div class="col-md-2">
							<label>Department</label><br>
							<select class="form-control">
								<option>Val1</option>
								<option>Val2</option>
							</select>
						</div>
						<div class="col-md-2">
							<label>Type Device</label><br>
							<select class="form-control">
								<option>Val1</option>
								<option>Val2</option>
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