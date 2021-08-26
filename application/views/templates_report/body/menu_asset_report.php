<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> Asset / Preventive Maintenance</h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Dashboard"> Dashboard </a></li>
        </ol>
    </div>
</div>

<div class="panel">
    <!--Panel heading-->
    <div class="panel-heading ui-sortable-handle">
        <h3 class="panel-title">PPM Asset Report</h3>
    </div>
    <!--Panel body-->
    <div class="panel-body">


		<div class="col-md-3">
		 <div class="panel-group">
		  <div class="panel panel-default" style="border: transparent;">
		   <div id="test_v3" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">   
		    <center>
		     <a href="<?= base_url()?>ui_report\workstation" aria-expanded="true">
		      <font  color="#fff" class="font-small">Workstation <br><br></font>
		     </a>
		    </center>
		   </div>
		  </div>
		 </div>
	    </div>

        <div class="col-md-3">
		 <div class="panel-group">
		  <div class="panel panel-default" style="border: transparent;">
		   <div id="test_v3" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">   
		    <center>
		     <a href="<?= base_url()?>ui_report\server" aria-expanded="true">
		      <font  color="#fff" class="font-small">Server <br><br></font>
		     </a>
		    </center>
		   </div>
		  </div>
		 </div>
	    </div> 


		<div class="col-md-3">
		 <div class="panel-group">
		  <div class="panel panel-default" style="border: transparent;">
		   <div id="test_v3" class="panel-collapse collapse in" style="background-color:#5d95bdbf;">   
		    <center>
		     <a href="<?= base_url()?>network" aria-expanded="true">
		      <font  color="#fff" class="font-small">Network <br><br></font>
		     </a>
		    </center>
		   </div>
		  </div>
		 </div>
	    </div>
	</div>
</div>

<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(31, 112, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(222, 227, 228) 100%);
        margin: -20px -5px 22px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(232, 232, 232);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #122f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a82;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a82;
        text-transform: uppercase;
        font-weight: 200;
        display: inline-block;
    }


    .pageheader .breadcrumb li a {
        color: #165983;
    }

    .pageheader .breadcrumb li.active {
        color: #175b86;
    }

    .pageheader .breadcrumb-wrapper {
        position: absolute;
        top: 15px;
        right: 25px;
    }

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
        margin: -20px -5px 24px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
        padding-left: 30p;
    }
</style>