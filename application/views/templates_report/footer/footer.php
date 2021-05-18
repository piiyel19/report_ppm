                <nav id="mainnav-container">
                              <!--Brand logo & name-->
                              <!--================================-->
                              <div class="navbar-header">
                                  <a href="index.html" class="navbar-brand">
                                      <i class="fa fa-forumbee brand-icon"></i>
                                      <div class="brand-title">
                                          <span class="brand-text">APPKU</span>
                                      </div>
                                  </a>
                              </div>
                              <!--================================-->
                              <!--End brand logo & name-->
                              <div id="mainnav">
                                  <!--Menu-->
                                  <!--================================-->
                                  <div id="mainnav-menu-wrap">
                                      <div class="nano">
                                          <div class="nano-content">
                                              <ul id="mainnav-menu" class="list-group left_menu">
                                                  <li>
                                                      <a href="<?= base_url()?>dashboard" data-original-title="" title=""  style="padding-left: 13px;">
                                                      <i class="fa fa-desktop"></i>
                                                      <span class="menu-title" style='font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;'>
                                                         Dashboard
                                                      </span>
                                                      <i class="arrow"></i>
                                                      </a>
                                                  </li>
                                              </ul>
                                              <!--Widget-->
                                              
                                          </div>
                                      </div>
                                  </div>
                                  <!--================================-->
                                  <!--End menu-->
                              </div>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
            </div>


    <!--   <footer id="footer"> -->
          <!-- Visible when footer positions are fixed -->
          <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          <!-- <div class="show-fixed pull-right">
              <ul class="footer-list list-inline">
                  <li>
                      <p class="text-sm">SEO Proggres</p>
                      <div class="progress progress-sm progress-light-base">
                          <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                      </div>
                  </li>
                  <li>
                      <p class="text-sm">Online Tutorial</p>
                      <div class="progress progress-sm progress-light-base">
                          <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                      </div>
                  </li>
                  <li>
                      <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                  </li>
              </ul>
          </div> -->
          <!-- Visible when footer positions are static -->
          <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          <!-- <div class="hide-fixed pull-right pad-rgt" style="font-size: 11px;font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;">Currently v3.0</div> -->
          <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
          <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          <!-- <p class="pad-lft" style="font-size: 11px;font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;">&#0169; 2020 Nex-Desk.Com</p>
      </footer> -->
      <!--===================================================-->
      <!-- END FOOTER -->
      <!-- SCROLL TOP BUTTON -->
      <!--===================================================-->
      <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
      <!--===================================================-->
  </div>






<style type="text/css">
  .modal-full {
      min-width: 100%;
      margin: 0;
  }
</style>

<style type="text/css">
  .sticklr, .sticklr * {
    font : inherit;
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    line-height: 18px;
    color: #000;
    vertical-align: baseline;
    background: #cccccc;
    font-style: oblique;
    border-left: 1px dashed;

  }

  .sticklr, .sticklr > li > ul {list-style-type: none;}

  .sticklr {
       right: 0;
    left: auto;
    position: fixed;
    top: 380px;

      background-color: #f7f7f7;
      /*border: 1px solid #b7b7b7;*/
      /*border-left: none;*/
      border-top: 1px dashed;
      border-top-right-radius: 2px;
      border-bottom-right-radius: 2px;
      width: 25px;
      /*overflow: visible;*/
      z-index: 90;

  }

  .sticklr-right {
      left: auto;
      right: 0;
      border-right: none;
      border-left: 1px solid #b7b7b7;
  }

  .sticklr > li {position: relative;}

  .sticklr > li > a {
      position : relative;
      display: block;
      width: 25px;
      height: 100px;
      background-color: #f0f0f0;
      background-position: 4px 4px;
      background-repeat: no-repeat; 
      border-left: 2px;
  }

  .sticklr > li {
      border-bottom: 1px solid #f7f7f7;
      border-right: 1px solid #f7f7f7;    
      border-top: 1px solid #ccc;
  }

  .sticklr > li:first-child {border-top: 1px solid #f7f7f7;}

  .sticklr > li:last-child {border-bottom: 1px solid #f7f7f7;}

  .sticklr > li > a:hover {background-color: #eaeaea;}

  .sticklr > li > ul {
      display: none;
      position: absolute;
      left: 25px;
      top: -2px;
      width: 180px;
      overflow: hidden;
      background-color: #f7f7f7;
      border: 1px solid #b7b7b7;
      border-radius: 2px;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      z-index: 9999;
  }

  .sticklr-right > li > ul {
      left: auto;
      right: 25px;
  }

  .sticklr > li > ul:nth-child(3) {
      left: 206px;
  }

  .sticklr > li > ul:nth-child(4) {
      left: 387px;
  }

  .sticklr > li > ul:nth-child(5) {
      left: 568px;
  }

  .sticklr > li > ul:nth-child(6) {
      left: 749px;
  }

  .sticklr > li > ul:nth-child(7) {
      left: 930px;
  }

  .sticklr-right > li > ul:nth-child(3) {
      left: auto;
      right: 206px;
  }

  .sticklr-right > li > ul:nth-child(4) {
      left: auto;
      right: 387px;
  }

  .sticklr-right > li > ul:nth-child(5) {
      left: auto;
      right: 568px;
  }

  .sticklr-right > li > ul:nth-child(6) {
      left: auto;
      right: 749px;
  }

  .sticklr-right > li > ul:nth-child(7) {
      left: auto;
      right: 930px;
  }

  .sticklr > li:hover > ul {
      display: block;
      float: left;
  }

  .sticklr.sticklr-js > li:hover > ul {
      display: none;
  }

  .sticklr > li > ul > li {
      border-bottom: 1px solid #f7f7f7;
      border-right: 1px solid #f7f7f7;    
      border-top: 1px solid #ccc;
      min-width: 180px;
      text-shadow: 1px 1px 1px #fff;
  }

  .sticklr > li > ul > li:first-child {border-top: 1px solid #f7f7f7;}

  .sticklr > li > ul > li:last-child {border-bottom: 1px solid #f7f7f7;}

  .sticklr > li > ul > li {border: none !ie;}

  .sticklr > li > ul > li > a {
      display: block;
      padding: 8px 10px 8px 32px;
      background-color: #f0f0f0;
      background-position: 10px;
      background-repeat: no-repeat;
      color: #555;
      min-height: 20px;
      text-decoration: none;
      white-space: nowrap;
      background-color: transparent !ie;
  }

  .sticklr > li > ul > li > a:hover {background-color: #eaeaea;}

  .sticklr > li > ul > li.sticklr-title > a {
      padding-left: 10px;
      background-color: #e6e6e6;
      cursor: default;
      font-weight: bold;
      background-color: transparent !ie;
  }

  .sticklr > li > ul > li.sticklr-title > a:hover {
      background-color: #e6e6e6;
      background-color: transparent !ie;
  }

  .sticklr > li > ul > li > table {border-collapse:collapse;border-spacing: 0;}

  .sticklr > li > ul > li > form {padding: 8px 10px;}

  .sticklr > li > ul > li input,
  .sticklr > li > ul > li select, 
  .sticklr > li > ul > li textarea,
  .sticklr > li > ul > li button  {
      margin: 4px 0;
      padding: 4px;
  }

  .sticklr-arrow {
      position: absolute;
      left: 25px;
      top: 36px;
      width: 0;
      height: 0;
      border-top: 5px solid transparent;
      border-bottom: 5px solid transparent;
      border-left: 5px solid #b7b7b7;
      border-right: none;
  }

  .sticklr-right .sticklr-arrow {
      left: auto;
      right: 25px;
      border-right: 5px solid #b7b7b7;
      border-left: none;
  }

  .sticklr-themes-1{background-image: url('../../../images/sticklr/theme_1.png');}

  .sticklr-themes-2{background-image: url('../../../images/sticklr/theme_2.png');}

  .sticklr-lang-my{background-image: url('../../../images/sticklr/lang_my.png');}

  .sticklr-lang-en{background-image: url('../../../images/sticklr/lang_en.png');}

  .sticklr-big-title{ 
      text-align: center;
      display: block;
      overflow : hidden;
      -ms-transform: rotate(-90deg);  
      -webkit-transform: rotate(-90deg);
      transform: rotate(-90deg);
      width : 100px;
      height : 25px;
      line-height : 25px;
      left : -38px;
      top : 37px;
      position : absolute;
  }

  

  @media screen and (min-width: 768px) {
    #container{
      padding-top: 100px; 
      padding-left: 200px; 
      padding-right: 30px;
    }
  }
</style>


<script type="text/javascript">
  function print_ticket_master_word()
  {
      $("#master_submit_word").trigger('click');
  }

  function print_ticket_master_pdf()
  {
      $("#master_submit_pdf").trigger('click');
  }


  function print_ticket_single_word()
  {
      $("#single_submit_word").trigger('click');
  }

  function print_ticket_single_pdf()
  {
      $("#single_submit_pdf").trigger('click');
  }
</script>


<form action="<?= base_url()?>Ticket/Print_Single/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
  <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
  <button type="submit" class="form-control" id="single_submit"> Submit </button>
</form>

<form action="<?= base_url()?>Ticket/Print_Master/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
  <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
  <button type="submit" class="form-control" id="master_submit"> Submit </button>
</form>


<!-- SINGLE -->
  <form action="<?= base_url()?>Ticket/Print_Single_Word/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="single_submit_word"> Submit </button>
  </form>

  <form action="<?= base_url()?>Ticket/Print_Single_PDF/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="single_submit_pdf"> Submit </button>
  </form>
<!-- END -->

<!-- MASTER -->
  <form action="<?= base_url()?>Ticket/Print_Master_Word/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="master_submit_word"> Submit </button>
  </form>
  <form action="<?= base_url()?>Ticket/Print_Master_PDF/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="master_submit_pdf"> Submit </button>
  </form>
<!-- END -->





<!-- Modal Confirmation -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> 
            <i class="fa fa-warning" style="color:red"></i> 
              <span id="modal_title"> Modal Header </span>
          </h4>
        </div>
        <div class="modal-body">
          <p><span id="modal_contain"> Contain </span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Close</button>
          <button type="button" class="btn btn-danger" id="confirm"> <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>  Confirm</button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .modal {
    background: #00800000;
    position: absolute;
    float: left;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    height: 80%;
  }
</style>
<!-- END -->





<link href='https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css' rel='stylesheet' type="text/css" />

<script>
    $("#datepicker").datepicker({format: 'dd/mm/yyyy'});
</script>





<style type="text/css">
  .title_nexdesk{
    font-size: 20px;
    font-style: normal;
    /*color: #e2d7d7;*/
    color: #fff;
    float: left;
    background-color: transparent;
    background-image: none;
    padding: 15px 15px;
    font-family: fontAwesome;
    /*padding-right: 220px;*/
  }
</style>


<script type='text/javascript'>
  var $document = $(document);
  (function () { 
    var clock = function () {
        clearTimeout(timer);
      
        date = new Date();    
        //alert(date);
        hours = date.getHours();
        minutes = date.getMinutes();
        seconds = date.getSeconds();
        dd = (hours >= 12) ? 'PM' : 'AM';
        
      hours = (hours > 12) ? (hours - 12) : hours
        
        var timer = setTimeout(clock, 1000);
      
      // if(hours<9){ hours = '0'+hours;}
      // if(hours<9){ minutes = '0'+minutes;}
      // if(hours<9){ seconds = '0'+seconds;}

      // $('.hours_digital').html('<p>' + Math.floor(hours) + ' : </p>');
      // $('.minutes_digital').html('<p>' + Math.floor(minutes) + ' : </p>');
      // $('.seconds_digital').html('<p>' + Math.floor(seconds) + ' </p>');
      //   $('.twelvehr_digital').html('<p>' + dd + '</p>');

      var jam = Math.floor(hours)+' : '+Math.floor(minutes)+' : '+Math.floor(seconds)+' '+dd;
      //alert(jam);
      $('.digital_watch').html('<input type="text" class="form-control"  disabled="disabled" value="'+jam+'">');
    };
    clock();
  })();

  (function () {
    $document.bind('contextmenu', function (e) {
      //e.preventDefault();
    });  
  })();



  function report_hospital_form(id)
  {
    $("#report_form").modal('show');

    $("#id_report_hosp").val(id);

    switch(id) {
      case 1: $("#modal_title_report_form").html('All Hardware Incident Log Report');
              $("#id_title_hosp").val('All Hardware Incident Log Report');
      break;
      case 2: $("#modal_title_report_form").html('All HIS and Non HIS Incident Log Report');
              $("#id_title_hosp").val('All HIS and Non HIS Incident Log Report');
      break;
      case 3: $("#modal_title_report_form").html('All Network Log Report');
              $("#id_title_hosp").val('All Network Log Report');
      break;
      case 4: $("#modal_title_report_form").html('All Non HIS (PACS) Incident Log Report');
              $("#id_title_hosp").val('All Non HIS (PACS) Incident Log Report');
      break;
      case 5: $("#modal_title_report_form").html('All System Log Report');
              $("#id_title_hosp").val('All System Log Report');
      break;
      case 6: $("#modal_title_report_form").html('Non Compliance SLA Incident Log Report');
              $("#id_title_hosp").val('Non Compliance SLA Incident Log Repor');
      break;
      case 7: $("#modal_title_report_form").html('Pending Incident Log Report');
              $("#id_title_hosp").val('Pending Incident Log Report');
      break;
      case 8: $("#modal_title_report_form").html('Change Request');
              $("#id_title_hosp").val('Pending Incident Log Report');
      break;
      default:
        // code block
    }

  }


  function cancel_report(){
    $("#report_form").modal('hide');
  }

</script>


<!-- Modal Confirmation -->
<div class="modal fade" id="report_form" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> 
            <i class="fa fa-file-excel-o" style="color:green"></i> 
              <span id="modal_title_report_form"> Modal Header </span>
          </h4>
        </div>
        <div class="modal-body">

        
        <form action="<?=base_url()?>report/hospital" method="post" autocomplete="off">   
        
          <input type="hidden" name="id_report_hosp" id="id_report_hosp">

          <div class="row">
            <div class="col-md-4"><label>* Title</label></div>
            <div class="col-md-8"><input type="type" class="form-control" name="id_title_hosp" id="id_title_hosp" required="required"> </div>
          </div>
          <br>
          <div class="row">

            <div class="col-md-4"><label>* Start Date</label></div>
            <div class="col-md-8"><input type="text" class="form-control datetime" name="start_report_hosp" id="start_report_hosp" required="required"> </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4"><label>* End Date</label></div>
            <div class="col-md-8"><input type="text" class="form-control datetime" name="end_report_hosp" id="end_report_hosp" required="required"> </div>
          </div>
          <br>

          <font color="brown"><i>Noted : Start date must previous than End date<br>Example : 2018-12-01 00:00:00 - 2019-01-01 00:00:00 </i></font>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Cancel</button>
          <button onclick="cancel_report();" type="submit" class="btn btn-danger" id="confirm"> <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>  Generate</button>
        </div>


        </form>

      </div>
    </div>
</div>


<style type="text/css">
  h5  
  {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
  }

  h3  
  {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
  }

  label 
  {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
  }

  .label-title
  {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
  }
  
  .panel-title{
      font-family: Arial, Helvetica, sans-serif;
      font-size: 13px;
  }

  


<?php if(($this->uri->segment(2)=='Ticket_StatusView')||($this->uri->segment(2)=='Ticket_Search_Result')||($this->uri->segment(2)=='Ticket_QueuView')||($this->uri->segment(2)=='Ticket_ClosedTicket')){ ?>
  .box-body {
     /* background: #dae48d;*/
      background:#f8f9f7;
  }

  .box-header.with-border {
      border-bottom: 1px solid #458dbc2b;
  }


  .box-header {
      background: #458dbc2b;
  }

  .box.box-success {
      border-top-color: #daebf3a8;
  }

  .panel-body {
      background: #458dbc2b;
  }
<?php } ?>







<?php if($this->uri->segment(1)=='menu'){ ?>
  .nav-tabs-custom>.tab-content {
      /*background: #a8ff74;*/
      background: #ffeb3b2b;
      
  }

  .box-header {
      background: #b9ffb9;
  }
  .list-group-item {
      /*background: #d6ecd8;*/
      background: #b8fcb9;
      
  }
<?php } ?>


<?php if($this->uri->segment(1)=='dashboard'){ ?>

  .list-group-item {
      position: relative;
      display: block;
      padding: .75rem 1.25rem;
      margin-bottom: -1px;
      background-color: #54ce6c4f;
      border: 1px solid #ddd;
  }


  .bg-yellow {
      background-color: #ad4343 !important;
  }

<?php } ?>

</style>

<style type="text/css">
  .title_nexdesk{
     font-family: Arial, Helvetica, sans-serif;
  }

  .skin-blue .main-header .navbar {
      background-color: #294960;
  }

  b, strong {
      font-weight: bolder;
      font-family: initial;
  }




</style>

<?php if($this->uri->segment(1)!='Ticket'){ ?>
<style type="text/css">
  @media (min-width: 576px)
  .jumbotron {
      /* padding: 4rem 2rem; */
  }

  .box-title{
    color:#fff;
  }
  

  .box-body {
      background:#ffffffd6;
  }

  .box-header.with-border {
      border-bottom: 1px solid #bdffca;
  }


  .box-header {
      background: #356399;
  }

  .box.box-success {
      border-top-color: #bdffca00;
  }

  

  

  .box {
      position: relative;
      border-radius: 3px;
      background: #ffffff00;
      border-top: 3px solid #d2d6de;
      margin-bottom: 20px;
      width: 100%;
      box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  }

  .list-group-item {
      /* background: #d6ecd8; */
      background: #f7f7f7;
  }

  .panel-default>.panel-heading {
      color: #333;
      background-color: #eaeaea;
      border-color: #c1c1c1;
  }

  .panel-body {
      background: #ffffff;
  }
</style>
<?php } ?>

<?php if($this->uri->segment(1)=='Report'){ ?>
<style type="text/css">
  .panel-danger>.panel-heading {
      color: #f1f1f1;
      background-color: #036473c2;
      border-color: #036473c2;
  }

  .panel-danger>.panel-heading+.panel-collapse>.panel-body {
      border-top-color: #3f8994;
  }

  .panel-bluedark {
      border-color: #3f8994;
  }

  .panel {
      margin-bottom: 20px;
      background-color: #3f8994;
      border: 1px solid transparent;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
  }
</style>
<?php } ?>

<?php if($this->uri->segment(2)=='Ticket_Search'){ ?>
<style type="text/css">
  .panel-danger>.panel-heading {
      color: #f1f1f1;
      background-color: #036473c2;
      border-color: #036473c2;
  }

  .panel-danger>.panel-heading+.panel-collapse>.panel-body {
      border-top-color: #3f8994;
  }

  .panel-bluedark {
      border-color: #3f8994;
  }

  .panel {
      margin-bottom: 20px;
      background-color: #3f8994;
      border: 1px solid transparent;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
  }
</style>
<?php } ?>


<style type="text/css">
  .loading {
    position: fixed;
    top: 0; right: 0;
    bottom: 0; left: 0;
    background: #fff;
}
.loader {
    left: 50%;
    margin-left: -4em;
    font-size: 10px;
    border: .8em solid rgba(218, 219, 223, 1);
    border-left: .8em solid rgba(58, 166, 165, 1);
    animation: spin 1.1s infinite linear;
}
.loader, .loader:after {
    border-radius: 50%;
    width: 8em;
    height: 8em;
    display: block;
    position: absolute;
    top: 50%;
    margin-top: -4.05em;
}

@keyframes spin {
  0% {
    transform: rotate(360deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
</style>


<script type="text/javascript">
  $(document).ready(function (){
    document.body.style.zoom="110%";
  });
</script>




<style type="text/css">
    /* style for selected */
    .datatablerowhighlight {
        background-color: #ECFFB3 !important;
    }

    .inner_visual  {
      width: 100%;
      overflow-x: scroll;
      overflow-y: hidden;
      background: #ccc;
  }
</style>




<div class="modal fade modal-fullscreen" id="re_open_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation Ticket</h4>
      </div>
      <div class="modal-body">
          Are your sure to Re-Open this ticket ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="submit();">Sure</button>
      </div>
    </div>
  </div>
</div>


<script src='<?=base_url()?>asset_talk2speak/voice.js'></script>

<input style="display: none" id="voice_1" onclick='responsiveVoice.speak("Welcome To Nex-Desk ", "UK English Male");' type='button' value='🔊 Play' />

<script type="text/javascript">
  <?php if($this->session->flashdata('voice_1')=='success'){ ?>
    $(document).ready(function (){
      //$("#voice_1").trigger('click');
    });
  <?php } ?>
</script>




<style type="text/css">
@media only screen and (max-width: 760px) {
  .content {
      min-height: 250px;
      padding: 30px;
      margin-right: auto;
      margin-left: auto;
      padding-left: 15px;
      padding-right: 15px;
  }
}

/*p{
  font-size: 15px;
  

}*/


p{
  font-size: 11px;
}



label{
  font-size: 10px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

.btn-primary {
  font-size: 10px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

.menu-title{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

th{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

td{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

li{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

a{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}


h4,h3,h2,h1{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

h5{
  font-size: 15px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

.nav-tabs-custom>.nav-tabs>li.header {
    line-height: 35px;
    padding: 0 10px;
    font-size: 11px;
    font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
    color: #444;
}


.pad-lft,.pad-rgt,{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}


.box-header .box-title {
    display: inline-block;
    font-size: 11px;
    font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
    margin: 0;
    line-height: 1;
}

.btn-success,.btn-danger,.btn-warning,.btn-primary,.btn-default{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}


.form-control {
    display: block;
    width: 100%;
    height: 27px;
    padding: 6px 12px;
    font-size: 9px;
    font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
}



.btn-success {
    background-color: #0863d4;
    border-color: #008d4c;
}


.font-small,.dataTables_info{
  font-size: 13px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

.font-smaller{
  font-size: 10px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
  font-weight: 400;
}


.modal {
  /*top: 20%;*/
}


/*.panel-heading{
  font-size: 11px;
  font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
  height: 20px;
  padding-left: 10px;
  padding-top: 10px;
  padding-bottom: 20px;
}*/



</style>



<script type="text/javascript">
  const mq = window.matchMedia( "(min-width: 768px)" );

  if (mq.matches) {
    // window width is at least 500px
    //alert('Desktop');
    
    $('.mainnav-toggle').click(function (){
      var element = document.getElementById("container");
      var check = element.className;
      if(check=='effect mainnav-lg navbar-fixed mainnav-fixed'){

        element.className = element.className.replace('effect mainnav-lg navbar-fixed mainnav-fixed', "effect mainnav-sm navbar-fixed mainnav-fixed");

        document.getElementById("container").style.paddingLeft = "70px";

      } else {

        element.className = element.className.replace('effect mainnav-sm navbar-fixed mainnav-fixed', "effect mainnav-lg navbar-fixed mainnav-fixed");

        document.getElementById("container").style.paddingLeft = "200px";

      }
    });


  } else {
    // window width is less than 500px
    //alert('Mobile');

    $('.mainnav-toggle').click(function (){
      var element = document.getElementById("container");
      var check = element.className;
      if(check=='effect mainnav-lg navbar-fixed mainnav-fixed'){

        element.className = element.className.replace('effect mainnav-lg navbar-fixed mainnav-fixed', "effect navbar-fixed mainnav-fixed mainnav-in");

        //document.getElementById("container").style.paddingLeft = "70px";

      } else {

        element.className = element.className.replace('effect navbar-fixed mainnav-fixed mainnav-in', "effect mainnav-lg navbar-fixed mainnav-fixed");

        //document.getElementById("container").style.paddingLeft = "200px";

      }
    });

  }


  function ticket_tab()
  {
    var check = $("#ticket_tab_v").val();
    if(check==''){
      $("#ticket_tab_v").val('1');
      $("div#ticket_tab_data").show();
    } else {
      $("#ticket_tab_v").val('');
      $("div#ticket_tab_data").hide();
    }
    
  }

  function customer_tab()
  {
    var check = $("#customer_tab_v").val();
    if(check==''){
      $("#customer_tab_v").val('1');
      $("div#customer_tab_data").show();
    } else {
      $("#customer_tab_v").val('');
      $("div#customer_tab_data").hide();
    }
    
  }


  function report_tab()
  {
    var check = $("#report_tab_v").val();
    if(check==''){
      $("#report_tab_v").val('1');
      $("div#report_tab_data").show();
    } else {
      $("#report_tab_v").val('');
      $("div#report_tab_data").hide();
    }
    
  }


  function services_tab()
  {
    var check = $("#services_tab_v").val();
    if(check==''){
      $("#services_tab_v").val('1');
      $("div#services_tab_data").show();
    } else {
      $("#services_tab_v").val('');
      $("div#services_tab_data").hide();
    }
    
  }

</script>

<input type="hidden" id="ticket_tab_v">
<input type="hidden" id="customer_tab_v">
<input type="hidden" id="report_tab_v">
<input type="hidden" id="services_tab_v">



<style type="text/css">
  .text{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
  }

  .numberCircle {
      border-radius: 50px;
      width: 36px;
      height: 36px;
      padding: 8px;

      background: #fff;
      border: 2px solid #666;
      color: #666;
      text-align: center;

      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
  }

  .white{
    background-color: white;
  }

  .box-body {
    /* background: #dae48d; */
      background: #ffffff;
  }

  .content {
      min-height: 250px;
      padding: 0px;
      margin-right: auto;
      margin-left: auto;
      padding-left: 15px;
      padding-right: 15px;
  }


  .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    line-height: 1.428571429;
    border-radius: 15px;
  }
  .btn-circle.btn-lg {
    width: 50px;
    height: 50px;
    padding: 10px 16px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    line-height: 1.33;
    border-radius: 25px;
  }
  .btn-circle.btn-xl {
    width: 50px;
    height: 50px;
   /* padding: 10px 16px;*/
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    line-height: 1.33;
    border-radius: 35px;
  }


  .btn-primary {
      background-color: #135178;
      border-color: #135178;
  }

</style>


<script type="text/javascript">
  function print_ticket_master_word()
  {
      $("#master_submit_word").trigger('click');
  }

  function print_ticket_master_pdf()
  {
      $("#master_submit_pdf").trigger('click');
  }


  function print_ticket_single_word()
  {
      $("#single_submit_word").trigger('click');
  }

  function print_ticket_single_pdf()
  {
      $("#single_submit_pdf").trigger('click');
  }
</script>


<form action="<?=base_url()?>Ticket/Print_Single/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
  <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
  <button type="submit" class="form-control" id="single_submit"> Submit </button>
</form>

<form action="<?=base_url()?>Ticket/Print_Master/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
  <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
  <button type="submit" class="form-control" id="master_submit"> Submit </button>
</form>


<!-- SINGLE -->
  <form action="<?=base_url()?>Ticket/Print_Single_Word/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="single_submit_word"> Submit </button>
  </form>

  <form action="<?=base_url()?>Ticket/Print_Single_PDF/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="single_submit_pdf"> Submit </button>
  </form>
<!-- END -->

<!-- MASTER -->
  <form action="<?=base_url()?>Ticket/Print_Master_Word/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="master_submit_word"> Submit </button>
  </form>
  <form action="<?=base_url()?>Ticket/Print_Master_PDF/<?= $this->uri->segment(3)?>" method="POST" style="display: none">
    <input type="hidden" name="id_ticket" value="<?= $this->uri->segment(3)?>">
    <button type="submit" class="form-control" id="master_submit_pdf"> Submit </button>
  </form>
<!-- END -->



<!-- 
<div class="loader"></div>
<style type="text/css">
  .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style> -->


<?php if(($this->uri->segment(1)=='Admin')||($this->uri->segment(1)=='admin')||($this->uri->segment(1)=='CMDB')||($this->uri->segment(1)=='cmdb')){ ?>

  <style type="text/css">
    .box.box-success{
      padding-bottom: 30px;
    }
  </style>

<?php } ?>

<style type="text/css">
  .jumbotron {
       padding: 0px; 
      background-color: #f7f7f8;
  }

  @media screen and (min-width: 768px)
  .jumbotron {
       padding-top: 0px; 
      padding-bottom: 48px;
  }
</style>

<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
</script>


<style type="text/css">
  html {
    zoom: 0.9;
    
}
</style>

<script type="text/javascript">
  function type_device()
  {
    var type_device = $("#type_device").val();
    if(type_device=='Access Point'){
      window.location.href="<?=base_url()?>Form_PPM/Access_point";
    } else if(type_device=='Firewall'){
      window.location.href="<?=base_url()?>Form_PPM/Firewall";
    } else if(type_device=='Load Balance'){
      window.location.href="<?=base_url()?>Form_PPM/Load_balance";
    } else if(type_device=='Switch'){
      window.location.href="<?=base_url()?>Form_PPM/Switch_PPM";
    } else if(type_device=='UPS'){
      window.location.href="<?=base_url()?>Form_PPM/UPS";
    } else {
      
    }
  }

  function type_device_network()
  {
    var type_device = $("#type_device").val();
    if(type_device=='Printer'){
      window.location.href="<?=base_url()?>Form_PPM/Printer";
    } else if(type_device=='Scanner'){
      window.location.href="<?=base_url()?>Form_PPM/Scanner";
    } else {

    }
  }


  function type_device_computer()
  {
    var type_device = $("#type_device").val();
    if(type_device=='Computer'){
      window.location.href="<?=base_url()?>Form_PPM/Computer";
    } else if(type_device=='Notebook'){
      window.location.href="<?=base_url()?>Form_PPM/Notebook";
    } else {

    }
  }

</script>

<style type="text/css">
  .font_class{
    font-size: 11px;
  }

  .font-small{
    font-size: 13px;
  }

  .panel-title{
    font-size: 14px;
  }

  a {
      font-size: 14px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
  }

  label{
    font-size: 13px;
  }

  .form-control {
      display: block;
      width: 100%;
      height: 30px;
      padding: 6px 12px;
      font-size: 12px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
      line-height: 1.42857143;
      color: #555;
      background-color: #fff;
      background-image: none;
      border: 1px solid #ccc;
  }

  .box-header .box-title {
      display: inline-block;
      font-size: 14px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
      margin: 0;
      line-height: 1;
  }


  th {
      font-size: 13px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
  }

  td {
      font-size: 12px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
  }

  /*.panel-heading {
      font-size: 14px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
      height: 20px;
      padding-left: 10px;
      padding-top: 10px;
      padding-bottom: 20px;
  }
*/
  legend {
    font-size: 14px;
  }

  .list-group-item{
    font-size: 13px;
  }

  .font-smaller {
      font-size: 13px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
      font-weight: 400;
  }


  li {
      font-size: 14px;
      font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
  }

  .label {
    font-size: 12px;
  }

  /*.navbar-content {
    background: linear-gradient(to right, rgb(60, 230, 144) 10%, rgb(31, 114, 162) 100%);
  }*/
</style>


<style type="text/css">
  .box2 {
    float: left;
    height: 20px;
    width: 80px;
    margin-bottom: 15px;
    border: 0px solid black;

    padding-left: 10px;
    padding-right: 10px;
    color: #fff;
    /*border-radius: 25px;*/
  }

  .red2 {
    background-color: red;
  }

  .green2 {
    background-color: green;
  }

  .blue2 {
    background-color: blue;
  }
</style>