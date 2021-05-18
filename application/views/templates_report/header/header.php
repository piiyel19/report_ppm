<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Nex-Desk</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?= base_url()?>asset_template/beauty/css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="<?= base_url()?>asset_template/beauty/css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?= base_url()?>asset_template/beauty/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?= base_url()?>asset_admin/dist/css/AdminLTE.min.css">


        <!-- jQuery 3 -->
        <script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="<?= base_url()?>asset_admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url()?>asset_admin/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="<?= base_url()?>asset_admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url()?>asset_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="<?= base_url()?>asset_admin/plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url()?>asset_admin/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url()?>asset_admin/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url()?>asset_admin/dist/js/demo.js"></script>
        <!-- Page script -->

        <script src="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.full.js"></script>
        <script src="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.full.min.js"></script>
        <link rel="stylesheet" href="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.min.css">

        <link href="<?= base_url()?>asset_template/beauty/plugins/jquery-ricksaw-chart/css/rickshaw.css" rel="stylesheet">


        

        <!-- <script src="<?= base_url()?>asset_template/beauty/js/demo/dashboard-v2.js"></script> -->

        
        <script src="<?= base_url()?>asset_template/beauty/js/scripts.js"></script>

        <script src="<?= base_url()?>asset_template/beauty/plugins/screenfull/screenfull.js"></script>


        




        <script>
          $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
              {
                ranges   : {
                  'Today'       : [moment(), moment()],
                  'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                  'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                  'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
              },
              function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
              }
            )

            //Date picker
            $('.datepicker').datepicker({
              autoclose: true,
              format: 'dd/mm/yyyy'
            })

            $('#datepicker').datepicker({
              autoclose: true,
              format: 'dd/mm/yyyy'
            })


            
            

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
              checkboxClass: 'icheckbox_minimal-blue',
              radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
              checkboxClass: 'icheckbox_minimal-red',
              radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass   : 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
              showInputs: false
            })

            $(".time").datetimepicker({
              format: 'H:i:s',
              pickDate: false,
              datepicker: false,
            });

            $(".datetime").datetimepicker({
              format: 'Y-m-d H:i:s'

            });

            $(".datereport").datetimepicker({
              format: 'dd/mm/yyyy'

            });

          });

          $(document).ready(function (){
            //$('.sidebar-toggle').trigger('click');
            $("#cust").trigger('click');
          });
        </script>


    </head>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body onload="zoom()">

      <style type="text/css">
        .row{
          padding-left: 0px;
          padding-right: 0px;
        }
      </style>

      <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed" style="padding-top: 80px;">
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                            </li>

                            <li style="padding-top: 20px;">
                                <font color="#fff" size="3px;">Nex-Desk</font>
                            </li>
                            
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            <!--Profile toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                           

                            
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Profile toogle button-->
                            <!--User dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <?php $name = $this->session->userdata('first_name') ?>
                            
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right"> <img class="img-circle img-user media-object" src="<?= myprofile()?>" alt="Profile Picture"> </span>
                                    <div class="username hidden-xs"><?= $name ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        <li>
                                            <a href="<?=base_url()?>user/profile"> <i class="fa fa-user fa-fw"></i> Profile </a>
                                        </li><!-- 
                                        <li>
                                            <a href="#">  <i class="fa fa-envelope fa-fw"></i> Messages </a>
                                        </li>
                                        <li>
                                            <a href="#">  <i class="fa fa-gear fa-fw"></i> Settings </a>
                                        </li> -->
                                        <li>
                                            <a href="<?=base_url()?>login/logout"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>

            <div class="boxed">