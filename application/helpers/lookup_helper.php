<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
    function send_notice_view_title($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->send_notice_view_title($id);
    }


    function check_fl($id_ticket)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $CI->load->model('Dbase_lookup','lookup');
        return $item = $CI->lookup->check_fl($id_ticket);
    }


    function send_notice_view_note($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->send_notice_view_note($id);
    }


    function send_notice_view_title_schedule($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->send_notice_view_title_schedule($id);
    }


    function send_notice_view_note_schedule($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->send_notice_view_note_schedule($id);
    }


    function send_notice_view_date__schedule($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->send_notice_view_date__schedule($id);
    }

    

// START PHASE 3 
    function lookup_namecontroller()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_namecontroller();

    }

    function lookup_widget_digital_watch()
    {
        echo '
                <div class="input-group clockpicker" >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                    <span class="digital_watch"> </span> 
                    
                    
                </div>
                <br>
             ';
    }


    function lookup_calendar_view()
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentDate = date('d/m/Y');
        $currentDate = 'Today : '.$currentDate;

        echo "      

                    <div>
                          <a style='color:#b15151' href='".base_url()."Dashboard/calendar'>
                            <button class='btn btn-block btn-default'><i class='fa fa-chevron-circle-right '> </i> View Calendar </btn>
                          </a>
                    </div>
                    <br>

             ";
    }


    function lookup_knowledgebase_view()
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentDate = date('d/m/Y');
        $currentDate = 'Today : '.$currentDate;

        echo "      

                    <div>
                        <a style='color:#b15151' href='".base_url()."Knowledgebase/search'><button class='btn btn-block btn-default'><i class='fa fa-chevron-circle-right '> </i> Help Center </btn></a>
                    </div>
                    <br>

             ";
    }


    function search_ticket(){

        echo "      

                    <div>
                        <a style='color:#b15151' href='".base_url()."Ticket/Ticket_Search'><button class='btn btn-block btn-default'><i class='fa fa-chevron-circle-right '> </i> Search Ticket </btn></a>
                    </div>
                    <br>

             ";
    }


    function lookup_widget_time()
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentDate = date('d/m/Y');
        $currentDate = 'Today : '.$currentDate;

        echo "      

                    <div class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
                        <input id='datepicker' type='text' class='form-control' placeholder='".$currentDate."' >
                    </div>
                    <br>

             ";
    }

    /* START NAVBAR */
    function lookup_navbar()
    {
      
    }

    function lookup_navbar_v1()
    {
        $ci = & get_instance();
        $ci->load->library('session');
        $idModule = $ci->session->userdata('idModule');

        $segment = $ci->uri->segment('1');

        if(!empty($idModule)&& in_array('Admin',$idModule)){
          if($segment=='Admin'){
            $admin = '<li class="active"><a href="'.base_url().'menu/overview/admin"><font size="4px" class="font-small">Admin</font></a></li>';
          } else {
            $admin = '<li><a href="'.base_url().'menu/overview/admin"><font size="4px" class="font-small">Admin</font></a></li>';
          }
          
        } else {
          $admin = "";  
        }

        if(!empty($idModule)&& in_array('Customer',$idModule)){
          if($segment=='Customer'){
            $cust = '<li class="active"><a href="'.base_url().'menu/overview/customer"><font size="4px" class="font-small">Customer</font></a></li>';
          } else {
            $cust = '<li><a href="'.base_url().'menu/overview/customer"><font size="4px" class="font-small">Customer</font></a></li>';
          }
        } else {
          $cust = "";
        }


        if(!empty($idModule)&& in_array('Ticket',$idModule)){
          if($segment=='Ticket'){
            $ticket = '<li class="active"><a href="'.base_url().'menu/overview/ticket"><font size="4px" class="font-small">Ticket</font></a></li>';
          } else {
            $ticket = '<li><a href="'.base_url().'menu/overview/ticket"><font size="4px" class="font-small">Ticket</font></a></li>';
          }
        } else {
          $ticket = "";
        }

        if(!empty($idModule)&& in_array('Service',$idModule)){

          if($segment=='Service'){
            $service = '<li class="active"><a href="'.base_url().'menu/overview/service"><font size="4px" class="font-small">Service</font></a></li>';
          } else {
            $service = '<li><a href="'.base_url().'menu/overview/service"><font size="4px" class="font-small">Service</font></a></li>';
          }

          
        } else {
          $service = "";
        }

        if(!empty($idModule)&& in_array('CMDB',$idModule)){

          if($segment=='CMDB'){
            $cmdb = '<li class="active"><a href="'.base_url().'menu/overview/cmdb"><font size="4px" class="font-small">Asset / Inventory</font></a></li>';
          } else {
            $cmdb = '<li><a href="'.base_url().'menu/overview/cmdb"><font size="4px" class="font-small">Asset / Inventory</font></a></li>';
          }

          
        } else {
          $cmdb = "";
        }

        if(!empty($idModule)&& in_array('Report',$idModule)){
          

          if($segment=='Report'){
            $report = '<li class="active"><a href="'.base_url().'menu/overview/report"><font size="4px" class="font-small">Report</font></a></li>';
          } else {
            $report = '<li><a href="'.base_url().'menu/overview/report"><font size="4px" class="font-small">Report</font></a></li>';
          }

        } else {
          $report = "";
        }


        if($segment=='Knowledgebase'){
          $knowledgebase = '<li class="active"><a href="'.base_url().'Knowledgebase"><font size="4px" class="font-small">Knowledge Base</font></a></li>';
        } else {
          $knowledgebase = '<li><a href="'.base_url().'Knowledgebase"><font size="4px" class="font-small">Knowledge Base</font></a></li>';
        }

        echo '
                <nav class="navbar navbar-default hidden-xs">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><b> <font size="4px" class="font-small">NEX-DESK MODULE </font></b></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li class=""><a href="'.base_url().'menu/overview"><font size="4px" class="font-small"> Overview</font> <span class="sr-only">(current)</span></a></li>
                        <li><a href="'.base_url().'dashboard"><font size="4px" class="font-small">Dashboard</font></a></li>
                        '.$knowledgebase.'
                        '.$cust.'
                        '.$ticket.'
                        '.$service.'
                        '.$cmdb.'
                        '.$report.'
                        '.$admin.'
                      </ul>
                   
                      <!-- <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </li>
                      </ul> -->
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
             ';
    }
    function lookup_navbar_ticket()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $total = $CI->lookup->get_firstlevel($id);

        if($total>0){
          $btn_itsm = base_url().'Ticket/Ticket_Button_Add_ITSM/'.$id;
          $first_level = base_url().'Ticket/Ticket_Button_First_Level/'.$id;
          $btn_note = base_url().'Ticket/Ticket_Button_Note/'.$id;
          $pending = base_url().'Ticket/Ticket_PendingResume/'.$id;
          $owner = base_url().'Ticket/Ticket_Button_Owner/'.$id;
          $Responsible = base_url().'Ticket/Ticket_Button_Responsible/'.$id;
          $Customer = base_url().'Ticket/Ticket_Customer_User/'.$id;
          $btn_closed = base_url().'Ticket/Ticket_Btn_Closed/'.$id;
        } else {
          $rand1 = rand();
          $rand2 = rand();
          $rand3 = rand();
          $rand = $rand1.$rand2.$rand3;
          $error = '/fl/'.$rand.'/t/f/'.$rand;
          $btn_itsm = base_url().'Ticket/Ticket_Button_Add_ITSM/'.$id.$error;
          $first_level = base_url().'Ticket/Ticket_Button_First_Level/'.$id;
          $btn_note = base_url().'Ticket/Ticket_Button_First_Level/'.$id.$error;
          $pending = base_url().'Ticket/Ticket_Button_First_Level/'.$id.$error;
          $owner = base_url().'Ticket/Ticket_Button_First_Level/'.$id.$error;
          $Responsible = base_url().'Ticket/Ticket_Button_First_Level/'.$id.$error;
          $Customer = base_url().'Ticket/Ticket_Button_First_Level/'.$id.$error;
          $btn_closed = base_url().'Ticket/Ticket_Button_First_Level/'.$id.$error;
        }

        $status = $CI->lookup->get_status_single($id);


        $getEnv = $CI->lookup->getEnv($id);
        if($getEnv=='hospital'){
          $link_cust = '';
        } else {
          $link_cust = '<li><a href="'.$Customer.'">Customer</a></li>';
        }


        //var_dump($status); exit();
        if($status=='open')
        {
          echo '
                  <script>
                    $(document).ready(function(){
                      $("#status_ticket").html("Pending");
                    });
                  </script>
               ';
        } else if($status=='pending'){
          echo '
                  <script>
                    $(document).ready(function(){
                      $("#status_ticket").html("Resume");
                    });
                  </script>
               ';
        }


        $lock_by = lock_ticket_by_return($id);
        $first_name = $CI->session->userdata('first_name');


        if($lock_by==$first_name){

          $idt = "'".$id."'";
          echo '
                  <script>
                    function goBack() {
                        inactive_lock('.$idt.');
                        //window.history.back();
                        var link = "'.base_url().'Ticket/Ticket_StatusView";
                        window.location.href=link;
                    }
                  </script> 
               ';
            

        } else {

          echo '
                    <script>
                      function goBack() {
                          //window.history.back();
                          var link = "'.base_url().'Ticket/Ticket_StatusView";
                          window.location.href=link;
                      }
                    </script> 
                 ';

          

          // $status = status_lock_ticket_return($id);
          // if($status=='0'){
          //   echo '
          //           <script>
          //             function goBack() {
          //                 //window.history.back();
          //                 var link = "'.base_url().'Ticket/Ticket_StatusView";
          //                 window.location.href=link;
          //             }
          //           </script> 
          //        ';
          // } else {
          //   $idt = "'".$id."'";
          //   echo '
          //           <script>
          //             function goBack() {
          //                 inactive_lock('.$idt.');
          //                 //window.history.back();
          //                 var link = "'.base_url().'Ticket/Ticket_StatusView";
          //                 window.location.href=link;
          //             }
          //           </script> 
          //        ';
          // }
        
        }

        // $location = $CI->uri->segment('2');
        // if($location=='Ticket_DetailTicket'){

        //   $status = status_lock_ticket_return($id);
        //   if($status=='0'){
        //     echo '
        //             <script>
        //               function goBack() {
        //                   //window.history.back();
        //                   var link = "'.base_url().'Ticket/Ticket_StatusView";
        //                   window.location.href=link;
        //               }
        //             </script> 
        //          ';
        //   } else {
        //     $idt = "'".$id."'";
        //     echo '
        //             <script>
        //               function goBack() {
        //                   inactive_lock('.$idt.');
        //                   //window.history.back();
        //                   var link = "'.base_url().'Ticket/Ticket_StatusView";
        //                   window.location.href=link;
        //               }
        //             </script> 
        //          ';
        //   }

        // } else {

        //   echo '
        //             <script>
        //               function goBack() {
        //                   //window.history.back();
        //                   var link = "'.base_url().'Ticket/Ticket_StatusView";
        //                   window.location.href=link;
        //               }
        //             </script> 
        //          ';

        // }
        

        echo '  
                 

                <style> .xxx{background: #f8f8f8;} </style>
                <nav class="navbar navbar-default hidden-xs">
                  <div class="container-fluid xxx">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <!--<li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>-->
                        <li><a onclick="goBack();"><font size="4px" class="font-small"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back </font> </a></li>
                      


                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4px" class="font-small"> <i class="fa fa-print" aria-hidden="true"></i> Print </font></a>
                          <ul class="dropdown-menu">
                            <li onclick="print_ticket_single_word();"><a >Word</a></li>
                            <li onclick="print_ticket_single_pdf();"><a >Pdf</a></li>
                          </ul>
                        </li>


                        <li id="li_reopen" style="display:none"><a onclick="reopen();" ><font size="4px" class="font-small"> <i class="fa fa-recycle" aria-hidden="true"></i> Re-Open </font> </a></li>


                        <li id="li_itsm" style="display:none"><a href="'.$btn_itsm.'"><font size="4px" class="font-small"> <i class="fa fa-sitemap" aria-hidden="true"></i> Edit ITSM </font></a></li>
                        <li class="dropdown" id="li_communication" style="display:none">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4px" class="font-small"> <i class="fa fa-group" aria-hidden="true"></i> Communication </font></a>
                          <ul class="dropdown-menu">
                            <li><a href="'.$first_level.'">First Level</a></li>
                            <li><a href="'.$btn_note.'">Note</a></li>
                            <li><a href="'.$pending.'"><span id="status_ticket"> Pending </span></a></li>
                          </ul>
                        </li>
                        <li class="dropdown" id="li_people" style="display:none">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4px" class="font-small"> <i class="fa fa-user" aria-hidden="true"></i> People </font> </a>
                          <ul class="dropdown-menu">
                            <li><a href="'.$owner.'">Owner</a></li>
                            <li><a href="'.$Responsible.'">Responsible</a></li>
                            '.$link_cust.'
                          </ul>
                        </li>
                        <li id="li_closed" style="display:none"><a href="'.$btn_closed.'"><font size="4px" class="font-small"><i class="fa fa-history" aria-hidden="true"></i> Closed</font></a></li>
                      </ul>
                   
                      <!-- <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </li>
                      </ul> -->
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
             ';
    }

    function lookup_navbar_ticket_master()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $total = $CI->lookup->get_firstlevel_master($id);

        if($total>0){
          $btn_itsm = base_url().'Ticket/MS_Add_ITSM/'.$id;
          $first_level = base_url().'Ticket/MS_First_Level/'.$id;
          $btn_note = base_url().'Ticket/MS_Note/'.$id;
          $pending = base_url().'Ticket/MS_PendingResume/'.$id;
          $owner = base_url().'Ticket/MS_Owner/'.$id;
          $Responsible = base_url().'Ticket/MS_Responsibility/'.$id;
          //$Customer = base_url().'Ticket/Ticket_Customer_User/'.$id;
          $btn_closed = base_url().'Ticket/MS_Closed/'.$id;
        } else {
          $rand1 = rand();
          $rand2 = rand();
          $rand3 = rand();
          $rand = $rand1.$rand2.$rand3;
          $error = '/fl/'.$rand.'/t/f/'.$rand;
          $btn_itsm = base_url().'Ticket/MS_Add_ITSM/'.$id.$error;
          $first_level = base_url().'Ticket/MS_First_Level/'.$id;
          $btn_note = base_url().'Ticket/MS_First_Level/'.$id.$error;
          $pending = base_url().'Ticket/MS_First_Level/'.$id.$error;
          $owner = base_url().'Ticket/MS_First_Level/'.$id.$error;
          $Responsible = base_url().'Ticket/MS_First_Level/'.$id.$error;
          //$Customer = base_url().'Ticket/MS_First_Level/'.$id.$error;
          $btn_closed = base_url().'Ticket/MS_First_Level/'.$id.$error;
        }

        echo '  
                <script>
                  function goBack() {
                      window.history.back();
                  }
                </script>  

                <style> .xxx{background: #ffc107;} </style>
                <nav class="navbar navbar-default hidden-xs">
                  <div class="container-fluid xxx">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <!--<li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>-->
                        <li><a onclick="goBack();"><font size="4px" class="font-small"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back </font> </a></li>
                        
                        
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4px" class="font-small"> <i class="fa fa-print" aria-hidden="true"></i> Print </font></a>
                          <ul class="dropdown-menu">
                            <li onclick="print_ticket_master_word();"><a >Word</a></li>
                            <li onclick="print_ticket_master_pdf();"><a >Pdf</a></li>
                          </ul>
                        </li>


                        <li id="li_itsm" style="display:none"><a href="'.$btn_itsm.'"><font size="4px" class="font-small"> <i class="fa fa-sitemap" aria-hidden="true"></i> Edit ITSM </font></a></li>
                        <li class="dropdown" id="li_communication" style="display:none">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4px" class="font-small"> <i class="fa fa-group" aria-hidden="true"></i> Communication </font></a>
                          <ul class="dropdown-menu">
                            <li><a href="'.$first_level.'">First Level</a></li>
                            <li><a href="'.$btn_note.'">Note</a></li>
                            
                          </ul>
                        </li>
                        <li class="dropdown" id="li_people" style="display:none">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4px" class="font-small"> <i class="fa fa-user" aria-hidden="true"></i> People </font> </a>
                          <ul class="dropdown-menu">
                            <li><a href="'.$owner.'">Owner</a></li>
                            <li><a href="'.$Responsible.'">Responsible</a></li>
                          </ul>
                        </li>
                        <li id="li_closed" style="display:none"><a href="'.$btn_closed.'"><font size="4px" class="font-small"><i class="fa fa-history" aria-hidden="true"></i> Closed</font></a></li>
                      </ul>
                   
                      <!-- <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </li>
                      </ul> -->
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
             ';
    }
    /* END */

    /* START WIDGET */
    function lookup_widget_latest_ticket()
    {
        for($i=0; $i<5; $i++)
        {
            $item = '<li class="item">
              
                      <div class="">
                        <a href="javascript:void(0)" class="product-title">Hafizuddin@bit.com.my
                          <span class="label label-warning pull-right">21/01/2018 16:08</span>
                        <span class="product-description">
                              SOLAWID PRTG - Network Down | Batu Kurau
                            </span>
                        </a>
                      </div>
                    </li>
                    ';

        } 
        $item .= $item;

        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Latest Ticket Open
                      </h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_news()
    {
        $CI =& get_instance();
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_news();

        echo '
                    <div class="panel panel-default">
                      <div class="panel-heading"> 
                        <span class="glyphicon glyphicon-cd" aria-hidden="true"></span>
                        NEWS 2019 
                       </div>
                      <div class="panel-body">
                        
                        <marquee>
                            <font size="3px">
                            '.$item.'
                            </font>
                        </marquee>
                      </div>
                    </div>
             ';
    }

    function lookup_widget_branch()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $total = $ci->lookup->lookup_total_users();

        echo '
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Users</span>
                      <span class="info-box-number">'.$total.'</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
             ';
    }

    function lookup_widget_latest_open_ticket()
    {

        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $total = $ci->lookup->lookup_total_ticket();

        echo '
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-pricetags"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Ticket</span>
                      <span class="info-box-number">'.$total.'</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
             ';
    }

    function lookup_widget_system()
    {
        echo '
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-monitor"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">SYSTEM</span>
                      <span class="info-box-number">100%</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
             ';
    }


    function lookup_widget()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('1');
        
        lookup_widget_time();
        lookup_widget_digital_watch();
        lookup_calendar_view();
        lookup_widget_news();
        //lookup_widget_latest_ticket();
        if($id=='Ticket'){
            lookup_widget_activity_note();
        }
        
        lookup_widget_branch();
        lookup_widget_latest_open_ticket();
        lookup_widget_system();
    }

    function lookup_widget_master()
    {
        lookup_widget_time();
        lookup_widget_news();
        //lookup_widget_latest_ticket();
        lookup_widget_activity_note_master();
        lookup_widget_branch();
        lookup_widget_latest_open_ticket();
        lookup_widget_system();
    }
    /* END WIDGET */

    /* STart */
    function lookup_widget_ticket_info()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_info($id);


        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Ticket Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_ticket_info_pdf()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_info_pdf($id);


        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Ticket Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_ticket_info_master()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_info_master($id);


        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Ticket Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_ticket_info_master_pdf()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_info_master_pdf($id);


        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Ticket Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_ticket_closed()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_closed($id);

        if(!empty($item)){

          echo '
                      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Ticket Closed Information
                        </h3>

                        <div class="box-tools pull-right">
                          <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>-->
                          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                          '.$item.'
                          <!-- /.item -->
                         
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                      </div>
                      <!-- /.box-footer -->
                  </div>
               ';

          
        }
    }

    function lookup_widget_ticket_closed_master()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_closed_master($id);

        if(!empty($item)){

          echo '
                      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Ticket Closed Information
                        </h3>

                        <div class="box-tools pull-right">
                          <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>-->
                          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                          '.$item.'
                          <!-- /.item -->
                         
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                      </div>
                      <!-- /.box-footer -->
                  </div>
               ';

          
        }
    }

    function lookup_widget_ticket_closed_master_pdf()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_closed_master_pdf($id);

        if(!empty($item)){

          echo '
                      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Ticket Closed Information
                        </h3>

                        <div class="box-tools pull-right">
                          <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>-->
                          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                          '.$item.'
                          <!-- /.item -->
                         
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                      </div>
                      <!-- /.box-footer -->
                  </div>
               ';

          
        }
    }

    function lookup_widget_ticket_closed_pdf()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_closed_pdf($id);

        if(!empty($item)){

          echo '
                      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Ticket Closed Information
                        </h3>

                        <div class="box-tools pull-right">
                          <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>-->
                          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                          '.$item.'
                          <!-- /.item -->
                         
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                      </div>
                      <!-- /.box-footer -->
                  </div>
               ';

          
        }
    }

    function lookup_widget_ticket_master()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_master($id);

        if(!empty($item)){

          echo '
                      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">
                          <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Related Ticket
                        </h3>

                        <div class="box-tools pull-right">
                          <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>-->
                          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                          '.$item.'
                          <!-- /.item -->
                         
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                      </div>
                      <!-- /.box-footer -->
                  </div>
               ';

          
        }
    }


    function lookup_widget_ticket_master_pdf()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_master_pdf($id);

        if(!empty($item)){

          echo '
                      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">
                          <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Related Ticket
                        </h3>

                        <div class="box-tools pull-right">
                          <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>-->
                          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                          '.$item.'
                          <!-- /.item -->
                         
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                      </div>
                      <!-- /.box-footer -->
                  </div>
               ';

          
        }
    }

    function lookup_widget_ticket_master_edit()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_ticket_master_edit($id);

        if(!empty($item)){

          echo '
                      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">
                          <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Related Ticket
                        </h3>

                        <div class="box-tools pull-right">
                          <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>-->
                          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                          '.$item.'
                          <!-- /.item -->
                         
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                      </div>
                      <!-- /.box-footer -->
                  </div>
               ';

          
        }
    }

    function lookup_widget_customer_info()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_customer_info($id);


        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Customer Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_customer_info_pdf()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_customer_info_pdf($id);


        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Customer Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_cmdb_info()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_cmdb_info($id);

        

        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Asset / Inventory Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_cmdb_info_pdf()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_cmdb_info_pdf($id);



        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Asset/Inventory Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_agent_info()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_agent_info($id);



        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agent Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_agent_info_pdf()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_agent_info_pdf($id);



        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agent Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_agent_info_master()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_agent_info_master($id);



        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agent Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_agent_info_master_pdf()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_agent_info_master_pdf($id);



        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agent Information
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_chronolgy_of_ticket()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_chronolgy_of_ticket($id);



        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Chronology Ticket
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function lookup_widget_chronolgy_of_ticket_master_pdf()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_chronolgy_of_ticket_master_pdf($id);



        echo '
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Chronology Ticket
                      </h3>

                      <div class="box-tools pull-right">
                        <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>-->
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <ul class="products-list product-list-in-box">
                        '.$item.'
                        <!-- /.item -->
                       
                      </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <!-- <a href="javascript:void(0)" class="uppercase">View All Products</a> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
             ';
    }

    function widget_ticket()
    {
        
        lookup_widget_ticket_info();
        lookup_widget_ticket_closed();
        //lookup_widget_ticket_master();
        lookup_widget_customer_info();
        lookup_widget_cmdb_info();
        lookup_widget_agent_info();

    }

    function widget_ticket_pdf()
    {
        
        lookup_widget_ticket_info_pdf();
        lookup_widget_ticket_closed_pdf();
        //lookup_widget_ticket_master();
        lookup_widget_customer_info_pdf();
        lookup_widget_cmdb_info_pdf();
        lookup_widget_agent_info_pdf();
        lookup_widget_chronolgy_of_ticket();

    }



    function widget_ticket_master()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $url = $CI->uri->segment('2');


        
        lookup_widget_ticket_info_master();
        lookup_widget_ticket_closed_master();
        

        if($url=='MS_Add_ITSM'){
          lookup_widget_ticket_master_edit();
        } else {
          lookup_widget_ticket_master();
        }

        lookup_widget_agent_info_master();

    }

    function widget_ticket_master_pdf()
    {

        $CI =& get_instance();
        $CI->load->helper('url');
        $url = $CI->uri->segment('2');


        
        lookup_widget_ticket_info_master_pdf();
        lookup_widget_ticket_closed_master_pdf();
        

        lookup_widget_ticket_master_pdf();

        lookup_widget_agent_info_master_pdf();

        lookup_widget_chronolgy_of_ticket_master_pdf();
    }
    /* END */

    /* Start Time Ticket*/
    function time_ticket()
    {
      echo '
              <div class="col-md-3"> 
                <label> <font color="#607d8b">Ticket Open</font>  </label>
                <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-clock-o" aria-hidden="true"></i></span>
              <input type="text" disabled="disabled" class="start_ticket datepicker form-control" placeholder="" aria-describedby="basic-addon1">
            </div>
              </div>

              <div class="col-md-2"> 
                <label> <font color="#607d8b">Total Time</font>  </label>
                <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-clock-o" aria-hidden="true"></i></span>
              <input type="text" class="total_time datepicker form-control" placeholder="" aria-describedby="basic-addon1" disabled="disabled">
            </div>
              </div>

              <div class="form-group col-md-2"> 
                <label> <font color="#607d8b">Pending Time</font> </label>
                <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
              <input type="text" class="pending_date datepicker form-control" placeholder="" aria-describedby="basic-addon1" disabled="disabled">
              </div>
              </div>

              <div class="form-group col-md-2"> 
                <label> <font color="#607d8b">Working Hour</font> </label>
                <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
              <input type="text" class="working_date datepicker form-control" placeholder="" aria-describedby="basic-addon1" disabled="disabled">
              </div>
              </div>
              <div class="form-group col-md-3" id="maso_tutup_ticket_div"> 
                <label> <font color="#607d8b">Closed Ticket</font> </label>
                <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
              <input type="text" class="closed_date datepicker form-control" placeholder="" aria-describedby="basic-addon1" disabled="disabled">
              </div>
              </div>
           ';
    }
    /* END */


    function lookup_topic()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_topic();
    }

    function lookup_group()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_group();
    }

    function lookup_validity()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_validity();
    }

    function lookup_Criticality()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_Criticality();
    }

    function lookup_service()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_service();
    }

    function lookup_service_by_id()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_service_by_id();
    }
    
    function lookup_servicetype()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_servicetype();
    }


    function lookup_sla()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_sla();
    }

    function lookup_sla_by_id()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_sla_by_id();
    }

    function lookup_slatype()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_slatype();
    }
    

    function lookup_customerID()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_customerID();
    }

    function lookup_customerID_By_ID()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_customerID_By_ID();
    }


    function lookup_computer_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_computer_type();
    }

    function lookup_deployment_state()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_deployment_state();
    }

    function lookup_incident_state()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_incident_state();
    }

    function lookup_hardware_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_hardware_type();
    }

    function lookup_software_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_software();
    }
    
    function lookup_location_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_location();
    }

    function lookup_network_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_network();
    }

    function lookup_role()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_role();
    }

     function lookup_backup_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_backup_type();
    }

    function lookup_ticket_state()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_ticketState();
    }

    function lookup_ticket_state_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_ticket_state_type();
    }

    function lookup_ticket_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_ticket_type();
    }

    function lookup_priority_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_priority_type();
    }

    function lookup_main_line_status()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_main_line_status();
    }

    function lookup_agent()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_agent();
    }


    function lookup_filter_responsible()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_filter_responsible();
    }


    function lookup_network_id()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_network_id();
    }



    function lookup_table_location_network()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_table_location_network();
    }

    function lookup_table_location_computer()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_table_location_computer();
    }

    function lookup_table_location_hardware()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_table_location_hardware();
    }

    function lookup_table_location_software()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_table_location_software();
    }


    function lookup_table_sla()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_table_sla();
    }


    function lookup_title_module()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_title_module();
    }


    function subject_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->subject_note($id);
    } 

    function subject_note_master($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->subject_note_master($id);
    } 


    function pull_data_responsible_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_responsible_note($id);
    }

    function pull_data_state_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_state_note($id);
    }

    function pull_data_pendingdate_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_pendingdate_note($id);
    }

    function pull_data_impact_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_impact_note($id);
    }

    function pull_data_impact_note_master($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_impact_note_master($id);
    }

    function note_owner($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->note_owner($id);
    }

    function note_owner_master($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->note_owner_master($id);
    }

    function note_responsible($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->note_responsible($id);
    }
    
    function note_custID($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->note_custID($id);
    }
    


    function pull_data_priority_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_priority_note($id);
    }

    function pull_data_priority_note_master($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_priority_note_master($id);
    }


    function pull_data_bs_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_bs_note($id);
    }

    function pull_data_status_note($id)
    {
         
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_status_note($id);
    }

    function pull_data_bstatus_note($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_bstatus_note($id);

    }


    function pull_data_ticket_state()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_ticket_state($id);

    }

    function lookup_widget_activity_note()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_activity_note($id);

        $total = $CI->lookup->count_total_activities($id);

        echo '
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#collapse1_list"><i class="fa fa-history" aria-hidden="true"></i> Ticket Activities (<i>'.$total.' note</i>)</a>
                            </h4>
                          </div>
                          <div id="collapse1_list" class="panel-collapse collapse in">
                                  <ul class="list-group">
                                    '.$item.'
                                  </ul>
                              </div>
                            </div>
                          </div>
             ';
    }

    function lookup_widget_activity_note_master()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $id = $CI->uri->segment('3');

        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_widget_activity_note_master($id);

        $total = $CI->lookup->count_total_activities_master($id);

        echo '
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#collapse1_list"><i class="fa fa-history" aria-hidden="true"></i> Ticket Activities (<i>'.$total.' note</i>)</a>
                            </h4>
                          </div>
                          <div id="collapse1_list" class="panel-collapse collapse in">
                                  <ul class="list-group">
                                    '.$item.'
                                  </ul>
                              </div>
                            </div>
                          </div>
             ';
    }


    function lookup_queue()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_queue();
    }


    function pull_data_type($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_type($id);
    }


    function pull_data_itsm_to_queu($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_itsm_to_queu($id);
    }

    function pull_data_itsm_to_queu_master($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_itsm_to_queu_master($id);
    }


    function lookup_table_group()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_table_group();
    }


    function pull_data_FaultCategoryType()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_FaultCategoryType();

    }

    function pull_data_FaultCategoryPortion()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_FaultCategoryPortion();

    }

    function pull_data_ProblemDescription()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_ProblemDescription();

    }

    function pull_data_CauseOfFault()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_CauseOfFault();

    }

    function pull_data_Responsibilty($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_Responsibilty($id);

    }

    function pull_data_Responsibilty_master($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_Responsibilty_master($id);

    }

    function pull_data_provider_ref($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_provider_ref($id);
    }

    function pull_data_provider_ref_master($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_provider_ref_master($id);
    }

    function pull_data_owner($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_data_owner($id);
    }

    /* Start Menu */
    function agent_menu()
    {
      $icon_title = '<i class="fa fa-share-alt"></i>';
      $icon = '<i class="fa fa-arrow-right"></i>';

      $ci = & get_instance();
      $ci->load->library('session');
      $env = $ci->session->userdata('env');
      if($env=='hospital'){
        $netsend = '
                      <div class="col-md-4" class="hospital_features">
                          <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" href="#severitytype">'.$icon_title.' Net Send </a>
                              </h4>
                            </div>
                            <div id="severitytype" class="panel-collapse collapse in">
                              <ul class="list-group">
                                <a href="'.base_url().'Admin/Send_notice"><li class="list-group-item">'.$icon.' Send  Notice </li></a>
                              </ul>
                              <!-- <div class="panel-footer">Footer</div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                   ';
        $download_agent = '
                              <div class="col-md-4" class="hospital_features">
                                  <div class="panel-group">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#downloadAgent">'.$icon_title.' Download Agent </a>
                                      </h4>
                                    </div>
                                    <div id="downloadAgent" class="panel-collapse collapse in">
                                      <ul class="list-group">
                                        <a href="'.base_url().'download_agent/GT-Socket.zip" download><li class="list-group-item">'.$icon.' GT Socket </li></a>
                                      </ul>
                                      <!-- <div class="panel-footer">Footer</div> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                          ';


        $status_email = '
                              <div class="col-md-4" class="hospital_features">
                                  <div class="panel-group">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#downloadAgent">'.$icon_title.' Status Email </a>
                                      </h4>
                                    </div>
                                    <div id="downloadAgent" class="panel-collapse collapse in">
                                      <ul class="list-group">
                                        <a href="'.base_url().'Admin/ticket_status_email"><li class="list-group-item">'.$icon.' Status Email </li></a>
                                      </ul>
                                      <!-- <div class="panel-footer">Footer</div> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                          ';

      } else {
        $netsend = '';
        $download_agent = '';
        $status_email = '';
      }

      echo  ' 
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#agent1">'.$icon_title.' Agent</a>
                      </h4>
                    </div>
                    <div id="agent1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Add_Agent"><li class="list-group-item">'.$icon.' Add Agent</li></a>
                        <a href="'.base_url().'Admin/Agent_ViewList"><li class="list-group-item">'.$icon.' View Agent</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#agent1">'.$icon_title.' Role</a>
                      </h4>
                    </div>
                    <div id="agent1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Role_Add"><li class="list-group-item">'.$icon.' Add Role</li></a>
                        <a href="'.base_url().'Admin/Role_ViewList"><li class="list-group-item">'.$icon.' View Role</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#group1">'.$icon_title.' Group</a>
                      </h4>
                    </div>
                    <div id="group1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/GroupManagement"><li class="list-group-item">'.$icon.' Add Group</li></a>
                        <a href="'.base_url().'Admin/GM_ViewList"><li class="list-group-item">'.$icon.' View Group</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#service1">'.$icon_title.' Group Relations</a>
                      </h4>
                    </div>
                    <div id="service1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Admin_LinkModule"><li class="list-group-item">'.$icon.' Add Relation</li></a>
                        <a href="'.base_url().'Admin/Admin_ViewLink_Agent"><li class="list-group-item">'.$icon.' View Relation</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#service1">'.$icon_title.' Service</a>
                      </h4>
                    </div>
                    <div id="service1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/SM_AddService"><li class="list-group-item">'.$icon.' Add Service</li></a>
                        <a href="'.base_url().'Admin/SM_ViewList"><li class="list-group-item">'.$icon.' View Service</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#type1">'.$icon_title.' Service Type</a>
                      </h4>
                    </div>
                    <div id="type1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/ST_AddServiceType"><li class="list-group-item">'.$icon.' Add ServiceType</li></a>
                        <a href="'.base_url().'Admin/ST_ViewList"><li class="list-group-item">'.$icon.' View ServiceType</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#sla1">'.$icon_title.' Service Level Agreement</a>
                      </h4>
                    </div>
                    <div id="sla1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/SLA_AddService"><li class="list-group-item">'.$icon.' Add SLA</li></a>
                        <a href="'.base_url().'Admin/SLA_VIewList"><li class="list-group-item">'.$icon.' View SLA</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#slatype1">'.$icon_title.' SLA Type </a>
                      </h4>
                    </div>
                    <div id="slatype1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/SLA_AddType"><li class="list-group-item">'.$icon.' Add SLA Type</li></a>
                        <a href="'.base_url().'Admin/SLA_Type_ViewList"><li class="list-group-item">'.$icon.' View SLA Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#priority1">'.$icon_title.' Priority</a>
                      </h4>
                    </div>
                    <div id="priority1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Default_AddPriority"><li class="list-group-item">'.$icon.' Add Priority</li></a>
                        <a href="'.base_url().'Admin/Default_ListView"><li class="list-group-item">'.$icon.' View Priority</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#deployment1">'.$icon_title.' Deployment State</a>
                      </h4>
                    </div>
                    <div id="deployment1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Deployment_AddState"><li class="list-group-item">'.$icon.'Add Deployment State</li></a>
                        <a href="'.base_url().'Admin/Deployment_ViewList"><li class="list-group-item">'.$icon.'View Deployment State</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#incident1">'.$icon_title.' Incident State</a>
                      </h4>
                    </div>
                    <div id="incident1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Incident_AddState"><li class="list-group-item">'.$icon.' Add Incident State</li></a>
                        <a href="'.base_url().'Admin/Incident_ViewList"><li class="list-group-item">'.$icon.' View Incident State</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#validity1">'.$icon_title.' Validity Type</a>
                      </h4>
                    </div>
                    <div id="validity1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Validity_AddType"><li class="list-group-item">'.$icon.' Add Validity Type</li></a>
                        <a href="'.base_url().'Admin/Validity_ViewList"><li class="list-group-item">'.$icon.' View Validity Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#criticality1">'.$icon_title.' Criticality Type</a>
                      </h4>
                    </div>
                    <div id="criticality1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Criticality_AddType"><li class="list-group-item">'.$icon.' Add Criticality Type</li></a>
                        <a href="'.base_url().'Admin/Criticality_ViewList"><li class="list-group-item">'.$icon.' View Criticality Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computer2">'.$icon_title.' Asset/Inventory Computer</a>
                      </h4>
                    </div>
                    <div id="computer2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_computer_add"><li class="list-group-item">'.$icon.' Add Asset/Inventory Computer</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_computer_viewList"><li class="list-group-item">'.$icon.' View Asset/Inventory Computer</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#location2">'.$icon_title.' Asset/Inventory Location</a>
                      </h4>
                    </div>
                    <div id="location2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_location_add"><li class="list-group-item">'.$icon.' Add Asset/Inventory Location</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_location_viewList"><li class="list-group-item">'.$icon.' View Asset/Inventory Location</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#network2">'.$icon_title.' Asset/Inventory Network</a>
                      </h4>
                    </div>
                    <div id="network2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_network_add"><li class="list-group-item">'.$icon.' Add Asset/Inventory Network</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_network_viewList"><li class="list-group-item">'.$icon.' View Asset/Inventory Network</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#hardware2">'.$icon_title.' Asset/Inventory Hardware</a>
                      </h4>
                    </div>
                    <div id="hardware2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_hardware_add"><li class="list-group-item">'.$icon.' Add Asset/Inventory Hardware</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_hardware_viewList"><li class="list-group-item">'.$icon.' View Asset/Inventory Hardware</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#software2">'.$icon_title.' Asset/Inventory Software</a>
                      </h4>
                    </div>
                    <div id="software2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_software_add"><li class="list-group-item">'.$icon.' Add Asset/Inventory Software</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_software_viewList"><li class="list-group-item">'.$icon.' View Asset/Inventory Software</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#custuser2">'.$icon_title.' Customer User Management</a>
                      </h4>
                    </div>
                    <div id="custuser2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Admin_CM_customerUser"><li class="list-group-item">'.$icon.' Add Customer User</li></a>
                        <a href="'.base_url().'Admin/Admin_CM_CU_viewlist"><li class="list-group-item">'.$icon.' View Customer User</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#customer2">'.$icon_title.' Customer Management</a>
                      </h4>
                    </div>
                    <div id="customer2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Admin_CM_Customer"><li class="list-group-item">'.$icon.' Add Customer</li></a>
                        <a href="'.base_url().'Admin/Admin_CM_C_viewlist"><li class="list-group-item">'.$icon.' View Customer </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#hardwaretype2">'.$icon_title.' Asset/Inventory Hardware Type</a>
                      </h4>
                    </div>
                    <div id="hardwaretype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_hardwareType_add"><li class="list-group-item">'.$icon.' Add Hardware Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_hardwareType_viewlist"><li class="list-group-item">'.$icon.' View Hardware Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computertype2">'.$icon_title.' Asset/Inventory Computer Type</a>
                      </h4>
                    </div>
                    <div id="computertype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_computerType_add"><li class="list-group-item">'.$icon.' Add Computer Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_computerType_viewlist"><li class="list-group-item">'.$icon.' View Computer Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#softwaretype2">'.$icon_title.' Asset/Inventory Software Type</a>
                      </h4>
                    </div>
                    <div id="softwaretype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_softwareType_add"><li class="list-group-item">'.$icon.' Add Software Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_softwareType_viewlist"><li class="list-group-item">'.$icon.' View Software Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#networktype2">'.$icon_title.' Asset/Inventory Network Type</a>
                      </h4>
                    </div>
                    <div id="networktype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_networkType_add"><li class="list-group-item">'.$icon.' Add Network Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_networkType_viewlist"><li class="list-group-item">'.$icon.' View Network Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#locationtype2">'.$icon_title.' Asset/Inventory Location Type</a>
                      </h4>
                    </div>
                    <div id="locationtype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_locationType_add"><li class="list-group-item">'.$icon.' Add Location Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_locationType_viewlist"><li class="list-group-item">'.$icon.' View Location Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#tickettype2">'.$icon_title.' Ticket Type</a>
                      </h4>
                    </div>
                    <div id="tickettype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ticketType_add"><li class="list-group-item">'.$icon.' Add Ticket Type</li></a>
                        <a href="'.base_url().'Admin/TS_ticketType_viewlist"><li class="list-group-item">'.$icon.' View Ticket Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#backuptype2">'.$icon_title.' Back-Up Type</a>
                      </h4>
                    </div>
                    <div id="backuptype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_backupType_add"><li class="list-group-item">'.$icon.' Add Back-Up Type</li></a>
                        <a href="'.base_url().'Admin/TS_backupType_viewlist"><li class="list-group-item">'.$icon.' View Back-Up Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
               
               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#mainline2">'.$icon_title.' Main Line Status</a>
                      </h4>
                    </div>
                    <div id="mainline2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_mainLineStatus_add"><li class="list-group-item">'.$icon.' Add Main Line Status</li></a>
                        <a href="'.base_url().'Admin/TS_mainLineStatus_viewlist"><li class="list-group-item">'.$icon.' View main Line Status</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#ticketstate2">'.$icon_title.' Ticket State</a>
                      </h4>
                    </div>
                    <div id="ticketstate2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ticketState_add"><li class="list-group-item">'.$icon.' Add Ticket State</li></a>
                        <a href="'.base_url().'Admin/TS_ticketState_viewlist"><li class="list-group-item">'.$icon.' View Ticket State</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#ticketype2">'.$icon_title.' Ticket State Type</a>
                      </h4>
                    </div>
                    <div id="ticketype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ticketStateType_add"><li class="list-group-item">'.$icon.' Add Ticket State Type</li></a>
                        <a href="'.base_url().'Admin/TS_ticketStateType_viewlist"><li class="list-group-item">'.$icon.' View Ticket Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#postmaster2">'.$icon_title.' PostMaster mail account</a>
                      </h4>
                    </div>
                    <div id="postmaster2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_email_postmaster_add"><li class="list-group-item">'.$icon.' Add Post Master</li></a>
                        <a href="'.base_url().'Admin/A_email_postmaster_viewlist"><li class="list-group-item">'.$icon.' View Post Master</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#email2">'.$icon_title.' Email Address</a>
                      </h4>
                    </div>
                    <div id="email2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_email_emailAddress_add"><li class="list-group-item">'.$icon.' Add Email Address</li></a>
                        <a href="'.base_url().'Admin/A_email_emailAddress_viewlist"><li class="list-group-item">'.$icon.' View Email Address</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#queue2">'.$icon_title.' Queue</a>
                      </h4>
                    </div>
                    <div id="queue2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_queue_add"><li class="list-group-item">'.$icon.' Add Queue</li></a>
                        <a href="'.base_url().'Admin/TS_queue_viewlist"><li class="list-group-item">'.$icon.' View Queue</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#fault2">'.$icon_title.' Cause Of Fault</a>
                      </h4>
                    </div>
                    <div id="fault2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_CauseOfFault_add"><li class="list-group-item">'.$icon.' Add Cause Of Fault</li></a>
                        <a href="'.base_url().'Admin/TS_CauseOfFault_viewlist"><li class="list-group-item">'.$icon.' View Cause Of Fault</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#problem2">'.$icon_title.' Problem Description</a>
                      </h4>
                    </div>
                    <div id="problem2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ProblemDescription_add"><li class="list-group-item">'.$icon.' Add Problem Description</li></a>
                        <a href="'.base_url().'Admin/TS_ProblemDescription_viewlist"><li class="list-group-item">'.$icon.' View Problem Description </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#portion2">'.$icon_title.' Fault Category Portion</a>
                      </h4>
                    </div>
                    <div id="portion2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_FaultCategoryPortion_add"><li class="list-group-item">'.$icon.' Add Fault Category Portion</li></a>
                        <a href="'.base_url().'Admin/TS_FaultCategoryPortion_viewlist"><li class="list-group-item">'.$icon.' View Fault Category Portion</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#categorytype">'.$icon_title.' Fault Category Type</a>
                      </h4>
                    </div>
                    <div id="categorytype" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_FaultCategoryType_add"><li class="list-group-item">'.$icon.' Add Fault Category Type</li></a>
                        <a href="'.base_url().'Admin/TS_FaultCategoryType_viewlist"><li class="list-group-item">'.$icon.' View Fault Category Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4" style="display:none">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#severitytype">'.$icon_title.' Severity Type</a>
                      </h4>
                    </div>
                    <div id="severitytype" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Admin_Severity_Add"><li class="list-group-item">'.$icon.' Add Severity Type</li></a>
                        <a href="'.base_url().'Admin/Admin_Severity_ViewList"><li class="list-group-item">'.$icon.' View Severity Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              '.$netsend.'


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#upData">'.$icon_title.' Fault ITSM </a>
                      </h4>
                    </div>
                    <div id="upData" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Fault_ITSM_Add"><li class="list-group-item">'.$icon.' Add Fault ITSM </li></a>
                        <a href="'.base_url().'Admin/Fault_ITSM_View"><li class="list-group-item">'.$icon.' View Fault ITSM </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#upData">'.$icon_title.' Upload Data </a>
                      </h4>
                    </div>
                    <div id="upData" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'DataUpload"><li class="list-group-item">'.$icon.' Upload Data </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              '.$download_agent.'
              '.$status_email.'
              

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#announData">'.$icon_title.' Announcement </a>
                      </h4>
                    </div>
                    <div id="announData" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Announcement"><li class="list-group-item">'.$icon.' Create New </li></a>
                        <a href="'.base_url().'Admin/List_Announcement"><li class="list-group-item">'.$icon.' List Announcement </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#announData">'.$icon_title.' Calendar Activities </a>
                      </h4>
                    </div>
                    <div id="announData" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Calendar"><li class="list-group-item">'.$icon.' Add Calendar </li></a>
                        <a href="'.base_url().'Admin/List_Calendar"><li class="list-group-item">'.$icon.' List Calendar </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#announData">'.$icon_title.' Knowledgebase </a>
                      </h4>
                    </div>
                    <div id="announData" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Knowledgebase/library"><li class="list-group-item">'.$icon.' Add Knowledgebase </li></a>
                        <a href="'.base_url().'Knowledgebase/list_form"><li class="list-group-item">'.$icon.' List Knowledgebase </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


            ';
    }


    function ticket_menu()
    {
      $icon_title = '<i class="fa fa-share-alt"></i>';
      $icon = '<i class="fa fa-arrow-right"></i>';
      echo  ' 
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#agent1">'.$icon_title.' Ticket</a>
                      </h4>
                    </div>
                    <div id="agent1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Ticket/CreateTicket_Phone"><li class="list-group-item">'.$icon.' Add Ticket Phone</li></a>
                        <a href="'.base_url().'Ticket/CreateTicket_Email"><li class="list-group-item">'.$icon.' Add Ticket Email</li></a>
                        <a href="'.base_url().'Ticket/Ticket_StatusView"><li class="list-group-item">'.$icon.' View Open Ticket</li></a>
                        <a href="'.base_url().'Ticket/Ticket_ClosedTicket"><li class="list-group-item">'.$icon.' View Close Ticket</li></a>
                        <a href="'.base_url().'Ticket/Ticket_QueuView"><li class="list-group-item">'.$icon.' View By Queue Ticket</li></a>
                        <a href="'.base_url().'Ticket/Ticket_Search"><li class="list-group-item">'.$icon.' Search Ticket</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#agent1">'.$icon_title.' Master Ticket</a>
                      </h4>
                    </div>
                    <div id="agent1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Ticket/MS_New_Master_Ticket"><li class="list-group-item">'.$icon.' Add Master Ticket</li></a>
                        <a href="'.base_url().'Ticket/MS_Overview_Open"><li class="list-group-item">'.$icon.' View Open Ticket</li></a>
                        <a href="'.base_url().'Ticket/MS_Overview_Closed"><li class="list-group-item">'.$icon.' View Close Ticket</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>



            ';
    }

    function service_menu()
    {
      $icon_title = '<i class="fa fa-share-alt"></i>';
      $icon = '<i class="fa fa-arrow-right"></i>';
      echo  ' 
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#servis_1">'.$icon_title.' Service</a>
                      </h4>
                    </div>
                    <div id="servis_1" class="panel-collapse collapse in">
                      <ul class="list-group">

                         <a href="'.base_url().'Service/Service_ListView"><li class="list-group-item">'.$icon.' Overview Service</li></a>

                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#servis_2">'.$icon_title.' SLA</a>
                      </h4>
                    </div>
                    <div id="servis_2" class="panel-collapse collapse in">
                      <ul class="list-group">

                        <a href="'.base_url().'Service/SLA_ListView"><li class="list-group-item">'.$icon.' Overview SLA</li></a>
                        
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
            ';
    }

    function report_menu()
    {
      $icon_title = '<i class="fa fa-share-alt"></i>';
      $icon = '<i class="fa fa-arrow-right"></i>';
      echo  ' 
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#servis_1">'.$icon_title.' Report Noc</a>
                      </h4>
                    </div>
                    <div id="servis_1" class="panel-collapse collapse in">
                      <ul class="list-group">

                        <a href="'.base_url().'Report/Register_Report"><li class="list-group-item">'.$icon.' Create Report</li></a>
                        <a href="'.base_url().'Report/Report_Overview"><li class="list-group-item">'.$icon.' List RFO</li></a>
                        <a href="'.base_url().'Report/Report_Overview_Tracker"><li class="list-group-item">'.$icon.' List Tracker</li></a>
                        <a href="'.base_url().'Report/Report_Overview_Statistic"><li class="list-group-item">'.$icon.' List Data & Visual</li></a>
                        

                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
            ';
    }


    function report_menu_hospital()
    {
      $icon_title = '<i class="fa fa-share-alt"></i>';
      $icon = '<i class="fa fa-arrow-right"></i>';
      echo  ' 
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#servis_1">'.$icon_title.' Report Hospital</a>
                      </h4>
                    </div>
                    <div id="servis_1" class="panel-collapse collapse in">
                      <ul class="list-group">

                        <a  onclick="report_hospital_form(1);"><li class="list-group-item">'.$icon.' All Hardware Incident Log Report</li></a>

                        <a onclick="report_hospital_form(2);"><li class="list-group-item">'.$icon.' All HIS and Non HIS Incident Log Report</li></a>


                        <a onclick="report_hospital_form(3);"><li class="list-group-item">'.$icon.' All Network Log Report</li></a>


                        <a onclick="report_hospital_form(4);"><li class="list-group-item">'.$icon.' All Non HIS (PACS) Incident Log Report</li></a>
                        
                        <a onclick="report_hospital_form(5);"><li class="list-group-item">'.$icon.' All System Log Report</li></a>


                        <a onclick="report_hospital_form(6);"><li class="list-group-item">'.$icon.' Non Compliance SLA Incident Log Report</li></a>

                        <a onclick="report_hospital_form(7);"><li class="list-group-item">'.$icon.' Pending Incident Log Report</li></a>


                        <a onclick="report_hospital_form(8);"><li class="list-group-item">'.$icon.' Change Request</li></a>

                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#servis_2">'.$icon_title.' Search Report Hospital</a>
                      </h4>
                    </div>
                    <div id="servis_2" class="panel-collapse collapse in">
                      <ul class="list-group">

                        <a  href="'.base_url().'Report/Report_Search"><li class="list-group-item">'.$icon.' Search Report</li></a>

                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
            ';
    }


    function cmdb_menu()
    {
      $icon_title = '<i class="fa fa-share-alt"></i>';
      $icon = '<i class="fa fa-arrow-right"></i>';
      echo  ' 
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computer_1">'.$icon_title.' Computer</a>
                      </h4>
                    </div>
                    <div id="computer_1" class="panel-collapse collapse in">
                      <ul class="list-group">

                        <a href="'.base_url().'CMDB/cmdb_computer_ViewList"><li class="list-group-item">'.$icon.' View Details</li></a>

                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#hardware1">'.$icon_title.' Hardware</a>
                      </h4>
                    </div>
                    <div id="hardware1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'CMDB/CMDB_Hardware_ViewList"><li class="list-group-item">'.$icon.' View Details</li></a>

                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#network1">'.$icon_title.' Network</a>
                      </h4>
                    </div>
                    <div id="network1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'CMDB/CMDB_Network_ViewList"><li class="list-group-item">'.$icon.' View Details</li></a>
                
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#software1">'.$icon_title.' Software</a>
                      </h4>
                    </div>
                    <div id="software1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'CMDB/CMDB_Software_ViewList"><li class="list-group-item">'.$icon.' View Details</li></a>
                      
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#location1">'.$icon_title.' Location</a>
                      </h4>
                    </div>
                    <div id="location1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'CMDB/CMDB_Location_ViewList"><li class="list-group-item">'.$icon.' View Details</li></a>
                        
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#linkupdate1">'.$icon_title.' Asset Link</a>
                      </h4>
                    </div>
                    <div id="linkupdate1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'CMDB/CMDB_Link_Update"><li class="list-group-item">'.$icon.' List Asset Link</li></a>
                        <a href="'.base_url().'CMDB/CMDB_Link_Update_Form"><li class="list-group-item">'.$icon.' Add Asset Link</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#location1">Form PPM</a>
                      </h4>
                    </div>
                    <div id="location1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Form_PPM/List_Computer"><li class="list-group-item">'.$icon.' Computer</li></a>
                        <a href="'.base_url().'Form_PPM/List_Hardware"><li class="list-group-item">'.$icon.' Hardware</li></a>
                        
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

      
            ';
            
            //<a href="'.base_url().'CMDB/CMDB_Link_Update_Form"><li class="list-group-item">'.$icon.' Add CMDB Link</li></a>
    }

    function customer_menu()
    {
      $icon_title = '<i class="fa fa-share-alt"></i>';
      $icon = '<i class="fa fa-arrow-right"></i>';
      echo  ' 
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#ciu1">'.$icon_title.' Customer Information Centre</a>
                      </h4>
                    </div>
                    <div id="ciu1" class="panel-collapse collapse in">
                      <ul class="list-group">

                         <a href="'.base_url().'Customer/CMC_Customer"><li class="list-group-item">'.$icon.' Search Customer User</li></a>
                        <a href="'.base_url().'Customer/CMC_Customer"><li class="list-group-item">'.$icon.' Search Customer</li></a>


                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#cua1">'.$icon_title.' Customer User Administration</a>
                      </h4>
                    </div>
                    <div id="cua1" class="panel-collapse collapse in">
                      <ul class="list-group">

                         <a href="'.base_url().'Customer/CUA_FormCustomer"><li class="list-group-item">'.$icon.' Add Customer User</li></a>
                        <a href="'.base_url().'Customer/CUA_ViewList"><li class="list-group-item">'.$icon.' View Customer User</li></a>


                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#ca1">'.$icon_title.' Customer Administration</a>
                      </h4>
                    </div>
                    <div id="ca1" class="panel-collapse collapse in">
                      <ul class="list-group">

                         <a href="'.base_url().'Customer/CA_FormCustomer"><li class="list-group-item">'.$icon.' Add Customer</li></a>
                        <a href="'.base_url().'Customer/CA_ViewList"><li class="list-group-item">'.$icon.' View Customer</li></a>


                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#linklocation">'.$icon_title.' Link Location</a>
                      </h4>
                    </div>
                    <div id="linklocation" class="panel-collapse collapse in">
                      <ul class="list-group">

                         <a href="'.base_url().'Customer/CU_Link_Location"><li class="list-group-item">'.$icon.' Customer User Location</li></a>
                        


                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#manageservice">'.$icon_title.' Manage Service</a>
                      </h4>
                    </div>
                    <div id="manageservice" class="panel-collapse collapse in">
                      <ul class="list-group">

                         <a href="'.base_url().'Customer/CMC_Link_Service"><li class="list-group-item">'.$icon.' Manage Customer Service</li></a>
                    


                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>





            ';
    }

    function count_mobile_ticket()
    {
      $CI =& get_instance();
      $CI->load->model('Dbase_lookup','lookup');
      $item = $CI->lookup->count_mobile_ticket();
      return  $item;
    }

    function count_new_ticket()
    {
      $CI =& get_instance();
      $CI->load->model('Dbase_lookup','lookup');
      $item = $CI->lookup->count_new_ticket();
      return  $item;
    }

    function count_open_ticket()
    {
      $CI =& get_instance();
      $CI->load->model('Dbase_lookup','lookup');
      $item = $CI->lookup->count_open_ticket();
      return  $item;
    }

    function count_pending_ticket()
    {
      $CI =& get_instance();
      $CI->load->model('Dbase_lookup','lookup');
      $item = $CI->lookup->count_pending_ticket();
      return  $item;
    }

    function count_master_ticket()
    {
      $CI =& get_instance();
      $CI->load->model('Dbase_lookup','lookup');
      $item = $CI->lookup->count_master_ticket();
      return  $item;
    }


    function count_dashboard()
    {

      $CI =& get_instance();
      $CI->load->helper('url');
      $id = $CI->uri->segment('3');

      $CI->load->library('session');
      $env = $CI->session->userdata('env');


      if($env=='noc'){
        echo  '
                  <div class="row">
                    
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>'.count_new_ticket().'</h3>

                          <p>New Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-email-unread"></i>
                        </div>
                        <a href="'.base_url().'Ticket/Ticket_StatusView/new" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>'.count_open_ticket().'</h3>

                          <p>Open Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-android-unlock"></i>
                        </div>
                        <a href="'.base_url().'Ticket/Ticket_StatusView/open" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3>'.count_pending_ticket().'</h3>

                          <p>Pending Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-lock-combination"></i>
                        </div>
                        <a href="'.base_url().'Ticket/Ticket_StatusView/pending" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>'.count_master_ticket().'</h3>

                          <p>Master Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-key"></i>
                        </div>
                        <a href="'.base_url().'Ticket/MS_Overview_Open" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    
                    <!-- ./col -->
                  </div>
              ';
      } else {
        echo  '
                  <div class="row">
                    <style> 
                      .bg-purple {
                            background-color: #73725a !important;
                      }
                    </style>
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-purple">
                        <div class="inner">
                          <h3>'.count_mobile_ticket().'</h3>

                          <p>Order Mobile</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-android-hangout"></i>
                        </div>
                        <a href="'.base_url().'Ticket/Ticket_MobileView/new" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>'.count_new_ticket().'</h3>

                          <p>New Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-email-unread"></i>
                        </div>
                        <a href="'.base_url().'Ticket/Ticket_StatusView/new" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>'.count_open_ticket().'</h3>

                          <p>Open Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-android-unlock"></i>
                        </div>
                        <a href="'.base_url().'Ticket/Ticket_StatusView/open" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-2 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3>'.count_pending_ticket().'</h3>

                          <p>Pending Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-lock-combination"></i>
                        </div>
                        <a href="'.base_url().'Ticket/Ticket_StatusView/pending" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>'.count_master_ticket().'</h3>

                          <p>Master Ticket</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-key"></i>
                        </div>
                        <a href="'.base_url().'Ticket/MS_Overview_Open" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
              ';
      }
    }


    function report_type()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->report_type();
    }

    function report_customer()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->report_customer();
    }

    function report_location()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->report_location();
    }

    function report_title($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->report_title($id);
    }


    function statistic_load_canvas($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->statistic_load_canvas($id);
    }


    function statistic_backup_line_canvas($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->statistic_backup_line_canvas($id);
    }


    function number_of_occurrence_canvas($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->number_of_occurrence_canvas($id);
    }


    function statistic_total_hour_canvas($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->statistic_total_hour_canvas($id);
    }


    function analytic_all_ticket()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->analytic_all_ticket();
    }


    function lookup_severity()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_severity();
    }


    function lookup_fault_itsm_category()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_fault_itsm_category();
    }


    function lookup_problem_desc()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_problem_desc();
    }


    function pull_problem_desc($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->pull_problem_desc($id);
    }

    function lookup_agent_selected($first_name)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_agent_selected($first_name);
    }



    function all_services()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->all_services();
    }

    function all_sla()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->all_sla();
    }

    function lookup_sla_by_name()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->lookup_sla_by_name();
    }



    /* Latest Dashboard 2.0 */
    function today_ticket_application()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_application();
    }


    function today_ticket_network()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_network();
    }



    function today_ticket_hardware()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_hardware();
    }


    function today_ticket_software()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_software();
    }

    function today_ticket_helpdesk()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_helpdesk();
    }


    function today_ticket_new()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_new();
    }

    function today_ticket_open()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_open();
    }

    function today_ticket_pending()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_pending();
    }

    function today_ticket_closed()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->today_ticket_closed();
    }


    function t7_ticket_new()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->t7_ticket_new();
    }

    function t7_ticket_open()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->t7_ticket_open();
    }

    function t7_ticket_pending()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->t7_ticket_pending();
    }

    function t7_ticket_closed()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->t7_ticket_closed();
    }


    function list_ticket_new()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->list_ticket_new();
    }

    function list_ticket_open()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->list_ticket_open();
    }

    function list_ticket_closed()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->list_ticket_closed();
    }

    function list_top10_problem()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->list_top10_problem();
    }

    function datalist_knowledgebase()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->datalist_knowledgebase();
    }

    function category_knowledgebase()
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->category_knowledgebase();
    }

    function Knowledgebase_recommend($id)
    {
        $ci = & get_instance();
        $ci->load->model('Dbase_lookup','lookup');
        $ci->lookup->Knowledgebase_recommend($id);
    }
    
    function agent_management()
    {
        $icon_title = '<i class="fa fa-share-alt"></i>';
        $icon = '<i class="fa fa-arrow-right"></i>';

        $ci = & get_instance();
        $ci->load->library('session');

        echo '
                <div class="col-md-4">
                  <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#agent1">'.$icon_title.' Agent</a>
                      </h4>
                    </div>
                    <div id="agent1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Add_Agent"><li class="list-group-item">'.$icon.' Add Agent</li></a>
                        <a href="'.base_url().'Admin/Agent_ViewList"><li class="list-group-item">'.$icon.' View Agent</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                  </div>
                </div>


                <div class="col-md-4">
                    <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#agent1">'.$icon_title.' Role</a>
                        </h4>
                      </div>
                      <div id="agent1" class="panel-collapse collapse in">
                        <ul class="list-group">
                          <a href="'.base_url().'Admin/Role_Add"><li class="list-group-item">'.$icon.' Add Role</li></a>
                          <a href="'.base_url().'Admin/Role_ViewList"><li class="list-group-item">'.$icon.' View Role</li></a>
                        </ul>
                        <!-- <div class="panel-footer">Footer</div> -->
                      </div>
                    </div>
                  </div>
                </div>

                 <div class="col-md-4">
                    <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#group1">'.$icon_title.' Group</a>
                        </h4>
                      </div>
                      <div id="group1" class="panel-collapse collapse in">
                        <ul class="list-group">
                          <a href="'.base_url().'Admin/GroupManagement"><li class="list-group-item">'.$icon.' Add Group</li></a>
                          <a href="'.base_url().'Admin/GM_ViewList"><li class="list-group-item">'.$icon.' View Group</li></a>
                        </ul>
                        <!-- <div class="panel-footer">Footer</div> -->
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                    <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#service1">'.$icon_title.' Group Agent</a>
                        </h4>
                      </div>
                      <div id="service1" class="panel-collapse collapse in">
                        <ul class="list-group">
                          <a href="'.base_url().'Admin/Admin_LinkModule"><li class="list-group-item">'.$icon.' Add Agent</li></a>
                          <a href="'.base_url().'Admin/Admin_ViewLink_Agent"><li class="list-group-item">'.$icon.' View Agent</li></a>
                        </ul>
                        <!-- <div class="panel-footer">Footer</div> -->
                      </div>
                    </div>
                  </div>
                </div>
             ';
    }


    function service_management()
    {
        $icon_title = '<i class="fa fa-share-alt"></i>';
        $icon = '<i class="fa fa-arrow-right"></i>';

        $ci = & get_instance();
        $ci->load->library('session');

        echo '
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#service1">'.$icon_title.' Service</a>
                      </h4>
                    </div>
                    <div id="service1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/SM_AddService"><li class="list-group-item">'.$icon.' Add Service</li></a>
                        <a href="'.base_url().'Admin/SM_ViewList"><li class="list-group-item">'.$icon.' View Service</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#type1">'.$icon_title.' Service Type</a>
                      </h4>
                    </div>
                    <div id="type1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/ST_AddServiceType"><li class="list-group-item">'.$icon.' Add ServiceType</li></a>
                        <a href="'.base_url().'Admin/ST_ViewList"><li class="list-group-item">'.$icon.' View ServiceType</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#sla1">'.$icon_title.' Service Level Agreement</a>
                      </h4>
                    </div>
                    <div id="sla1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/SLA_AddService"><li class="list-group-item">'.$icon.' Add SLA</li></a>
                        <a href="'.base_url().'Admin/SLA_VIewList"><li class="list-group-item">'.$icon.' View SLA</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#slatype1">'.$icon_title.' SLA Type </a>
                      </h4>
                    </div>
                    <div id="slatype1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/SLA_AddType"><li class="list-group-item">'.$icon.' Add SLA Type</li></a>
                        <a href="'.base_url().'Admin/SLA_Type_ViewList"><li class="list-group-item">'.$icon.' View SLA Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#priority1">'.$icon_title.' Priority</a>
                      </h4>
                    </div>
                    <div id="priority1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Default_AddPriority"><li class="list-group-item">'.$icon.' Add Priority</li></a>
                        <a href="'.base_url().'Admin/Default_ListView"><li class="list-group-item">'.$icon.' View Priority</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#deployment1">'.$icon_title.' Deployment State</a>
                      </h4>
                    </div>
                    <div id="deployment1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Deployment_AddState"><li class="list-group-item">'.$icon.'Add Deployment State</li></a>
                        <a href="'.base_url().'Admin/Deployment_ViewList"><li class="list-group-item">'.$icon.'View Deployment State</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#incident1">'.$icon_title.' Incident State</a>
                        </h4>
                      </div>
                      <div id="incident1" class="panel-collapse collapse in">
                        <ul class="list-group">
                          <a href="'.base_url().'Admin/Incident_AddState"><li class="list-group-item">'.$icon.' Add Incident State</li></a>
                          <a href="'.base_url().'Admin/Incident_ViewList"><li class="list-group-item">'.$icon.' View Incident State</li></a>
                        </ul>
                        <!-- <div class="panel-footer">Footer</div> -->
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#validity1">'.$icon_title.' Validity Type</a>
                        </h4>
                      </div>
                      <div id="validity1" class="panel-collapse collapse in">
                        <ul class="list-group">
                          <a href="'.base_url().'Admin/Validity_AddType"><li class="list-group-item">'.$icon.' Add Validity Type</li></a>
                          <a href="'.base_url().'Admin/Validity_ViewList"><li class="list-group-item">'.$icon.' View Validity Type</li></a>
                        </ul>
                        <!-- <div class="panel-footer">Footer</div> -->
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#criticality1">'.$icon_title.' Criticality Type</a>
                        </h4>
                      </div>
                      <div id="criticality1" class="panel-collapse collapse in">
                        <ul class="list-group">
                          <a href="'.base_url().'Admin/Criticality_AddType"><li class="list-group-item">'.$icon.' Add Criticality Type</li></a>
                          <a href="'.base_url().'Admin/Criticality_ViewList"><li class="list-group-item">'.$icon.' View Criticality Type</li></a>
                        </ul>
                        <!-- <div class="panel-footer">Footer</div> -->
                      </div>
                    </div>
                  </div>
              </div>
             ';
    }


    function inventory_management()
    {
        $icon_title = '<i class="fa fa-share-alt"></i>';
        $icon = '<i class="fa fa-arrow-right"></i>';

        $ci = & get_instance();
        $ci->load->library('session');

        echo '
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computer10">'.$icon_title.' Set Incident</a>
                      </h4>
                    </div>
                    <div id="computer10" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Incident_AddState"><li class="list-group-item">'.$icon.' Add Incident </li></a>
                        <a href="'.base_url().'Admin/Incident_ViewList"><li class="list-group-item">'.$icon.' View Incident</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computer11">'.$icon_title.' Set Deployment</a>
                      </h4>
                    </div>
                    <div id="computer11" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Deployment_AddState"><li class="list-group-item">'.$icon.' Add Deployment </li></a>
                        <a href="'.base_url().'Admin/Deployment_ViewList"><li class="list-group-item">'.$icon.' View Deployment</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computer12">'.$icon_title.' Set Validity</a>
                      </h4>
                    </div>
                    <div id="computer12" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Validity_AddType"><li class="list-group-item">'.$icon.' Add Validity </li></a>
                        <a href="'.base_url().'Admin/Validity_ViewList"><li class="list-group-item">'.$icon.' View Validity</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computer2">'.$icon_title.' Asset Computer</a>
                      </h4>
                    </div>
                    <div id="computer2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_computer_add"><li class="list-group-item">'.$icon.' Add Asset Computer</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_computer_viewList"><li class="list-group-item">'.$icon.' View Computer</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#location2">'.$icon_title.' Asset Level Location</a>
                      </h4>
                    </div>
                    <div id="location2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_level_add"><li class="list-group-item">'.$icon.' Add Level</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_level_viewList"><li class="list-group-item">'.$icon.' View Level</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#location2">'.$icon_title.' Asset Department Location</a>
                      </h4>
                    </div>
                    <div id="location2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_department_add"><li class="list-group-item">'.$icon.' Add Department</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_department_viewList"><li class="list-group-item">'.$icon.' View Department</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#location2">'.$icon_title.' Asset Room Location</a>
                      </h4>
                    </div>
                    <div id="location2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_location_add"><li class="list-group-item">'.$icon.' Add Room</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_location_viewList"><li class="list-group-item">'.$icon.' View Room</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#network2">'.$icon_title.' Asset Network</a>
                      </h4>
                    </div>
                    <div id="network2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_network_add"><li class="list-group-item">'.$icon.' Add Asset Network</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_network_viewList"><li class="list-group-item">'.$icon.' View Network</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#hardware2">'.$icon_title.' Asset Hardware</a>
                      </h4>
                    </div>
                    <div id="hardware2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_hardware_add"><li class="list-group-item">'.$icon.' Add Asset Hardware</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_hardware_viewList"><li class="list-group-item">'.$icon.' View Hardware</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#software2">'.$icon_title.' Asset Software</a>
                      </h4>
                    </div>
                    <div id="software2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_software_add"><li class="list-group-item">'.$icon.' Add Asset Software</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_software_viewList"><li class="list-group-item">'.$icon.' View Software</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#hardwaretype2">'.$icon_title.' Asset Hardware Type</a>
                      </h4>
                    </div>
                    <div id="hardwaretype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_hardwareType_add"><li class="list-group-item">'.$icon.' Add Hardware Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_hardwareType_viewlist"><li class="list-group-item">'.$icon.' View Hardware Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#computertype2">'.$icon_title.' Asset Computer Type</a>
                      </h4>
                    </div>
                    <div id="computertype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_computerType_add"><li class="list-group-item">'.$icon.' Add Computer Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_computerType_viewlist"><li class="list-group-item">'.$icon.' View Computer Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#softwaretype2">'.$icon_title.' Asset Software Type</a>
                      </h4>
                    </div>
                    <div id="softwaretype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_softwareType_add"><li class="list-group-item">'.$icon.' Add Software Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_softwareType_viewlist"><li class="list-group-item">'.$icon.' View Software Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#networktype2">'.$icon_title.' Asset Network Type</a>
                      </h4>
                    </div>
                    <div id="networktype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_networkType_add"><li class="list-group-item">'.$icon.' Add Network Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_networkType_viewlist"><li class="list-group-item">'.$icon.' View Network Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#locationtype2">'.$icon_title.' Asset Location Type</a>
                      </h4>
                    </div>
                    <div id="locationtype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_cmdb_locationType_add"><li class="list-group-item">'.$icon.' Add Location Type</li></a>
                        <a href="'.base_url().'Admin/A_cmdb_locationType_viewlist"><li class="list-group-item">'.$icon.' View Location Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
             ';
    }

    function customer_management()
    {
        $icon_title = '<i class="fa fa-share-alt"></i>';
        $icon = '<i class="fa fa-arrow-right"></i>';

        $ci = & get_instance();
        $ci->load->library('session');

        echo '
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#custuser2">'.$icon_title.' Customer User Management</a>
                      </h4>
                    </div>
                    <div id="custuser2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Admin_CM_customerUser"><li class="list-group-item">'.$icon.' Add Customer User</li></a>
                        <a href="'.base_url().'Admin/Admin_CM_CU_viewlist"><li class="list-group-item">'.$icon.' View Customer User</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#customer2">'.$icon_title.' Customer Management</a>
                      </h4>
                    </div>
                    <div id="customer2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Admin_CM_Customer"><li class="list-group-item">'.$icon.' Add Customer</li></a>
                        <a href="'.base_url().'Admin/Admin_CM_C_viewlist"><li class="list-group-item">'.$icon.' View Customer </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
             ';
    }
    
    function ticket_management()
    {
        $icon_title = '<i class="fa fa-share-alt"></i>';
        $icon = '<i class="fa fa-arrow-right"></i>';

        $ci = & get_instance();
        $ci->load->library('session');
        $env = $ci->session->userdata('env');

        

        echo '
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#tickettype2">'.$icon_title.' Ticket Type</a>
                      </h4>
                    </div>
                    <div id="tickettype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ticketType_add"><li class="list-group-item">'.$icon.' Add Ticket Type</li></a>
                        <a href="'.base_url().'Admin/TS_ticketType_viewlist"><li class="list-group-item">'.$icon.' View Ticket Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#backuptype2">'.$icon_title.' Back-Up Type</a>
                      </h4>
                    </div>
                    <div id="backuptype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_backupType_add"><li class="list-group-item">'.$icon.' Add Back-Up Type</li></a>
                        <a href="'.base_url().'Admin/TS_backupType_viewlist"><li class="list-group-item">'.$icon.' View Back-Up Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
               
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#mainline2">'.$icon_title.' Main Line Status</a>
                      </h4>
                    </div>
                    <div id="mainline2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_mainLineStatus_add"><li class="list-group-item">'.$icon.' Add Main Line Status</li></a>
                        <a href="'.base_url().'Admin/TS_mainLineStatus_viewlist"><li class="list-group-item">'.$icon.' View main Line Status</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#ticketstate2">'.$icon_title.' Ticket State</a>
                      </h4>
                    </div>
                    <div id="ticketstate2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ticketState_add"><li class="list-group-item">'.$icon.' Add Ticket State</li></a>
                        <a href="'.base_url().'Admin/TS_ticketState_viewlist"><li class="list-group-item">'.$icon.' View Ticket State</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#ticketype2">'.$icon_title.' Ticket State Type</a>
                      </h4>
                    </div>
                    <div id="ticketype2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ticketStateType_add"><li class="list-group-item">'.$icon.' Add Ticket State Type</li></a>
                        <a href="'.base_url().'Admin/TS_ticketStateType_viewlist"><li class="list-group-item">'.$icon.' View Ticket Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#queue2">'.$icon_title.' Queue</a>
                      </h4>
                    </div>
                    <div id="queue2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_queue_add"><li class="list-group-item">'.$icon.' Add Queue</li></a>
                        <a href="'.base_url().'Admin/TS_queue_viewlist"><li class="list-group-item">'.$icon.' View Queue</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#fault2">'.$icon_title.' Cause Of Fault</a>
                      </h4>
                    </div>
                    <div id="fault2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_CauseOfFault_add"><li class="list-group-item">'.$icon.' Add Cause Of Fault</li></a>
                        <a href="'.base_url().'Admin/TS_CauseOfFault_viewlist"><li class="list-group-item">'.$icon.' View Cause Of Fault</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#problem2">'.$icon_title.' Problem Description</a>
                      </h4>
                    </div>
                    <div id="problem2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_ProblemDescription_add"><li class="list-group-item">'.$icon.' Add Problem Description</li></a>
                        <a href="'.base_url().'Admin/TS_ProblemDescription_viewlist"><li class="list-group-item">'.$icon.' View Problem Description </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#portion2">'.$icon_title.' Fault Category Portion</a>
                      </h4>
                    </div>
                    <div id="portion2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_FaultCategoryPortion_add"><li class="list-group-item">'.$icon.' Add Fault Category Portion</li></a>
                        <a href="'.base_url().'Admin/TS_FaultCategoryPortion_viewlist"><li class="list-group-item">'.$icon.' View Fault Category Portion</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#categorytype">'.$icon_title.' Fault Category Type</a>
                      </h4>
                    </div>
                    <div id="categorytype" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/TS_FaultCategoryType_add"><li class="list-group-item">'.$icon.' Add Fault Category Type</li></a>
                        <a href="'.base_url().'Admin/TS_FaultCategoryType_viewlist"><li class="list-group-item">'.$icon.' View Fault Category Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4" style="display:none">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#severitytype">'.$icon_title.' Severity Type</a>
                      </h4>
                    </div>
                    <div id="severitytype" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Admin_Severity_Add"><li class="list-group-item">'.$icon.' Add Severity Type</li></a>
                        <a href="'.base_url().'Admin/Admin_Severity_ViewList"><li class="list-group-item">'.$icon.' View Severity Type</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#upData">'.$icon_title.' Fault ITSM </a>
                      </h4>
                    </div>
                    <div id="upData" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/Fault_ITSM_Add"><li class="list-group-item">'.$icon.' Add Fault ITSM </li></a>
                        <a href="'.base_url().'Admin/Fault_ITSM_View"><li class="list-group-item">'.$icon.' View Fault ITSM </li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>

             ';
    }

    function email_management()
    {
        $icon_title = '<i class="fa fa-share-alt"></i>';
        $icon = '<i class="fa fa-arrow-right"></i>';

        $ci = & get_instance();
        $ci->load->library('session');

        echo '
              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#postmaster2">'.$icon_title.' Post Master mail account</a>
                      </h4>
                    </div>
                    <div id="postmaster2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_email_postmaster_add"><li class="list-group-item">'.$icon.' Add Post Master</li></a>
                        <a href="'.base_url().'Admin/A_email_postmaster_viewlist"><li class="list-group-item">'.$icon.' View Post Master</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#email2">'.$icon_title.' Email Address</a>
                      </h4>
                    </div>
                    <div id="email2" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <a href="'.base_url().'Admin/A_email_emailAddress_add"><li class="list-group-item">'.$icon.' Add Email Address</li></a>
                        <a href="'.base_url().'Admin/A_email_emailAddress_viewlist"><li class="list-group-item">'.$icon.' View Email Address</li></a>
                      </ul>
                      <!-- <div class="panel-footer">Footer</div> -->
                    </div>
                  </div>
                </div>
              </div>
             ';
    }

    function admin_management()
    {
        $icon_title = '<i class="fa fa-share-alt"></i>';
        $icon = '<i class="fa fa-arrow-right"></i>';

        $ci = & get_instance();
        $ci->load->library('session');

        $env = $ci->session->userdata('env');
        if($env=='hospital'){
          $netsend = '
                        <div class="col-md-4" class="hospital_features">
                            <div class="panel-group">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#severitytype">'.$icon_title.' Net Send </a>
                                </h4>
                              </div>
                              <div id="severitytype" class="panel-collapse collapse in">
                                <ul class="list-group">
                                  <a href="'.base_url().'Admin/Send_notice"><li class="list-group-item">'.$icon.' Send  Notice </li></a>
                                  <a href="'.base_url().'Admin/View_notice"><li class="list-group-item">'.$icon.' View  Notice </li></a>
                                  <a href="'.base_url().'Admin/View_notice_schedule"><li class="list-group-item">'.$icon.' Schedule  Notice </li></a>
                                </ul>
                                <!-- <div class="panel-footer">Footer</div> -->
                              </div>
                            </div>
                          </div>
                        </div>
                     ';
          $download_agent = '
                                <div class="col-md-4" class="hospital_features">
                                    <div class="panel-group">
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" href="#downloadAgent">'.$icon_title.' Download Agent </a>
                                        </h4>
                                      </div>
                                      <div id="downloadAgent" class="panel-collapse collapse in">
                                        <ul class="list-group">
                                          <a href="'.base_url().'download_agent/GT-Socket.zip" download><li class="list-group-item">'.$icon.' GT Socket </li></a>
                                        </ul>
                                        <!-- <div class="panel-footer">Footer</div> -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            ';


          $status_email = '
                                <div class="col-md-4" class="hospital_features">
                                    <div class="panel-group">
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" href="#downloadAgent">'.$icon_title.' Status Email </a>
                                        </h4>
                                      </div>
                                      <div id="downloadAgent" class="panel-collapse collapse in">
                                        <ul class="list-group">
                                          <a href="'.base_url().'Admin/ticket_status_email"><li class="list-group-item">'.$icon.' Status Email </li></a>
                                        </ul>
                                        <!-- <div class="panel-footer">Footer</div> -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            ';

        } else {
          $netsend = '';
          $download_agent = '';
          $status_email = '';
        }

          echo '  
                  <div class="row" style="padding-left:10px; padding-right:10px;">
                    '.$netsend.'
                    '.$download_agent.'
                    '.$status_email.'
                  </div>

                  <div class="row" style="padding-left:10px; padding-right:10px;">
                    <div class="col-md-4">
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#announData">'.$icon_title.' Announcement </a>
                            </h4>
                          </div>
                          <div id="announData" class="panel-collapse collapse in">
                            <ul class="list-group">
                              <a href="'.base_url().'Admin/Announcement"><li class="list-group-item">'.$icon.' Create New </li></a>
                              <a href="'.base_url().'Admin/List_Announcement"><li class="list-group-item">'.$icon.' List Announcement </li></a>
                            </ul>
                            <!-- <div class="panel-footer">Footer</div> -->
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-4" style="padding-left:10px; padding-right:10px;">
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#announData">'.$icon_title.' Calendar Activities </a>
                            </h4>
                          </div>
                          <div id="announData" class="panel-collapse collapse in">
                            <ul class="list-group">
                              <a href="'.base_url().'Admin/Calendar"><li class="list-group-item">'.$icon.' Add Calendar </li></a>
                              <a href="'.base_url().'Admin/List_Calendar"><li class="list-group-item">'.$icon.' List Calendar </li></a>
                            </ul>
                            <!-- <div class="panel-footer">Footer</div> -->
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-4" style="padding-left:10px; padding-right:10px;">
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#announData">'.$icon_title.' Knowledgebase </a>
                            </h4>
                          </div>
                          <div id="announData" class="panel-collapse collapse in">
                            <ul class="list-group">
                              <a href="'.base_url().'Knowledgebase/library"><li class="list-group-item">'.$icon.' Add Knowledgebase </li></a>
                              <a href="'.base_url().'Knowledgebase/list_form"><li class="list-group-item">'.$icon.' List Knowledgebase </li></a>
                            </ul>
                            <!-- <div class="panel-footer">Footer</div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding-left:10px; padding-right:10px;">
                    <div class="col-md-4">
                        <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#upData">'.$icon_title.' Upload Data </a>
                            </h4>
                          </div>
                          <div id="upData" class="panel-collapse collapse in">
                            <ul class="list-group">
                              <a href="'.base_url().'DataUpload"><li class="list-group-item">'.$icon.' Upload Data </li></a>
                            </ul>
                            <!-- <div class="panel-footer">Footer</div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

               ';
    }

    function lookup_user_datalist()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lookup_user_datalist();
    }

    function status_lock_ticket($id_ticket)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $id = $id_ticket;
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->status_lock_ticket($id);
    }

    function status_lock_ticket_return($id_ticket)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $id = $id_ticket;
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->status_lock_ticket_return($id);
    }


    function lock_ticket_by($id_ticket)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $id = $id_ticket;
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lock_ticket_by($id);
    }


    function lock_ticket_by_return($id_ticket)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $id = $id_ticket;
        $CI->load->model('Dbase_lookup','lookup');
        $item = $CI->lookup->lock_ticket_by_return($id);
    }


    function button_add_knowlegdebased()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$id = $CI->uri->segment('3');
        $fullname = $CI->session->userdata('first_name');
        $CI->load->model('Dbase_lookup','lookup');
        $check = $CI->lookup->button_add_knowlegdebased($fullname);

        if(($fullname=='Admin')||($fullname=='admin'))
        {
            echo '  
                    <div class="row">
                      <div class="col-md-6">
                        <br>
                        <a href="'.base_url().'/Knowledgebase/form/'.rand().'">
                          <button class="btn btn-success"> >> Add New Knowledge base</button>
                        </a>
                      </div>
                      <div class="col-md-6">
                        <br>
                        <a href="'.base_url().'/Knowledgebase/list_form">
                          <button class="btn btn-success"> >> List Knowledge base</button>
                        </a>
                      </div>
                    </div>
                 ';
        } else {

          if($check>0){
            echo '
                    <div class="row">
                      <div class="col-md-6">
                        <br>
                        <a href="'.base_url().'/Knowledgebase/form/'.rand().'">
                          <button class="btn btn-success"> >> Add New Knowledge base</button>
                        </a>
                      </div>
                      <div class="col-md-6">
                        <br>
                        <a href="'.base_url().'/Knowledgebase/list_form">
                          <button class="btn btn-success"> >> List Knowledge base</button>
                        </a>
                      </div>
                    </div>
                 ';
          }

        }


        

    }


    function qr_code($other_id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Dbase_lookup','lookup2');
        $CI->lookup2->qr_code($other_id);
    }

    function lookup_list_note_activities($id)
    { 
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Dbase_lookup','lookup2');
        $CI->lookup2->lookup_list_note_activities($id);
    }

    function time_start_ticket($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Ticket_model','lookup3');
        $data = $CI->lookup3->start_ticket($id);
        if(empty($data)){
          $data = 'No Record';
        }
    }

    function time_ticket_total($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Ticket_model','lookup3');
        $CI->lookup3->total_time_ticket2($id);
    }

    function time_pending_total($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Ticket_model','lookup3');
        $CI->lookup3->pending_ticket($id);
    }


    function time_working_total($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Ticket_model','lookup3');
        $CI->lookup3->total_time_ticket($id);
    }


    function time_close_total($id)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Ticket_model','lookup3');
        $CI->lookup3->get_closed_date($id);

    }





  function data_ticket($id)
  {
      $CI =& get_instance();
      $CI->load->helper('url');
      $CI->load->model('Dbase_lookup','lookup2');
      $CI->lookup2->data_ticket($id);
  }

  function data_customer($id)
  {
      $CI =& get_instance();
      $CI->load->helper('url');
      $CI->load->model('Dbase_lookup','lookup2');
      $CI->lookup2->data_customer($id);
  }

  function data_asset($id)
  {
      $CI =& get_instance();
      $CI->load->helper('url');
      $CI->load->model('Dbase_lookup','lookup2');
      $CI->lookup2->data_asset($id);
  }

  function data_agent($tid)
  {
      $CI =& get_instance();
      $CI->load->helper('url');
      $CI->load->model('Dbase_lookup','lookup2');
      $CI->lookup2->data_agent($tid);
  }


  function lock_by($id){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->model('Dbase_lookup','lookup2');
    $CI->lookup2->lock_by($id);
  }


  function view_case($id)
  {
      $CI =& get_instance();
      $CI->load->helper('url');
      $CI->load->model('Ticket_model','lookup3');
      $data = $CI->lookup3->view_case($id);
      if(empty($data)){
        $data = 'No Record';
      }
  }


  function get_menu(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->model('Architecture_UI','lookup4');
    $CI->lookup4->parent_menu_v2();
  }

  function myprofile()
  {
    $CI =& get_instance();
    $id = $CI->session->userdata('email');
    $CI->load->helper('url');
    $CI->load->model('Ticket_model','lookup3');
    $img = $CI->lookup3->MyImg($id);
    if(empty($img)){
      $img = base_url().'profile.png';
    }

    echo $img;
    /* END */
  }


  function my_profile_ticket()
  {
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->model('Ticket_model','lookup3');
    $data = $CI->lookup3->my_profile_ticket();
    if(empty($data)){
      $data = '
                <tr>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>
                        No Data
                    </td>
                </tr>
              ';
    }

    echo $data;
  }


  function yes_or_no()
  {
    echo '<option value="Yes">Yes</option><option value="No">No</option>';
  }


  function option_ward()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    $ci->lookup->option_ward();
  }


  function lookup_hostname_pc()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    $ci->lookup->lookup_hostname_pc();
  }


  function lookup_hostname_hardware()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    $ci->lookup->lookup_hostname_hardware();
  }


  function lookup_agent_datalist()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    $ci->lookup->lookup_agent_datalist();
  }


  function lookup_customer_user_datalist()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    $ci->lookup->lookup_customer_user_datalist();
  }


  function topic_chat($id)
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    $ci->lookup->topic_chat($id);
  }


  function count_close_ticket()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    return $ci->lookup->count_close_ticket();
  }


  function count_severity_high_ticket()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    return $ci->lookup->count_severity_high_ticket();
  }


  function count_all_ticket()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    return $ci->lookup->count_all_ticket();
  }


  function popular_problem()
  {
    $ci =& get_instance();
    $ci->load->helper('url');
    $ci->load->model('Dbase_lookup','lookup');
    return $ci->lookup->popular_problem();
  }



function popular_department()
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->popular_department();
}


function data_date_ticket()
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->data_date_ticket();
}


function lookup_level()
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->lookup_level();
}


function lookup_department()
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->lookup_department();
}


function lookup_year()
{
  $starting_year  =date('Y', strtotime('-20 year'));
  $ending_year = date('Y');
  //$ending_year = date('Y', strtotime('+10 year'));
  for($starting_year; $starting_year <= $ending_year; $starting_year++) {
     if(date('Y')==$starting_year) { //is the loop currently processing this year?
        $selected='selected'; //if so, save the word "selected" into a variable
     } else {  
        $selected='' ; //otherwise, ensure the variable is empty
     }
     //then include the variable inside the option element
     echo '<option '.$selected.' value="'.$starting_year.'">'.$starting_year.'</option>';
  }
}


function ppm_2_ackowledge($ppm_id,$hostname)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->ppm_2_ackowledge($ppm_id,$hostname);
}


function ppm_2_date($ppm_id,$hostname)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->ppm_2_date($ppm_id,$hostname);
}

function ppm_2_id_number($ppm_id,$hostname)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->ppm_2_id_number($ppm_id,$hostname);
}

function get_name_activity($ppm_id)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->get_name_activity($ppm_id);
}

function getAllLoc()
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->getAllLoc();
}


function lookup_customer_user_option()
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->lookup_customer_user_option();
}


function ppm_2_status($ppm_id,$hostname)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->ppm_2_status($ppm_id,$hostname);
}


function check_endorse($group,$agent)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->check_endorse($group,$agent);
}


function check_verify($group,$agent)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->check_verify($group,$agent);
}


function check_team($group,$agent)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->check_team($group,$agent);
}


function check_PPM_Verify_Network_Server($group,$agent)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->check_PPM_Verify_Network_Server($group,$agent);
}



function status_ppm_register($hostname,$ppm_id)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->status_ppm_register($hostname,$ppm_id);
}


function list_email_team_it()
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->list_email_team_it();
}



function myrole($user_id)
{
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('Dbase_lookup','lookup');
  return $ci->lookup->myrole($user_id);
}