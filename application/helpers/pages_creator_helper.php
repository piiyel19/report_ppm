 <?php

  function create_new_page($page_name, $class_name, $controller_name){

  $model = $class_name.'_model';

  // Create Controller
  $controller = fopen(APPPATH.'controllers/'.$controller_name.'.php', "a")
  or die("Unable to open file!");

  $controller_content ="<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class $class_name extends CI_Controller  {

  public function __construct()
  {

    parent::__construct();
    \$this->load->database();
    \$this->load->library('session');
    \$this->load->library('datatables');
    \$this->load->model('$model','$class_name');
   }
  public function index()
   {
    \$this->data['site_title'] = '$page_name';
    \$this->load->view('template/header/header');
    \$this->load->view('template/body/$page_name/$page_name',\$this->data);
    \$this->load->view('template/footer/footer');
   }

   }";
  fwrite($controller, "\n". $controller_content);
  fclose($controller);

  // Create Model
  $model = fopen(APPPATH.'models/'.$class_name.'_model'.'.php', "a") 
  or die("Unable to open file!");

   $model_content ="<?php if ( ! defined('BASEPATH')) exit('No direct script 
   access allowed');

   class ".$class_name."_model"." extends CI_Model
  {
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
  }

  }
  ";
  fwrite($model, "\n". $model_content);
  fclose($model);


  // Create Folder View
  // $userid=1;
  // chmod('../application/view/template/body/', 0777);
  // $path   = '../application/view/template/body/'.$userid;
  // mkdir($path, 0755, TRUE);
  // if (!is_dir($path)) { //create the folder if it's not already exists
  //     mkdir($path, 0755, TRUE);
  // }

  //$path = "../application/view/template/body/test";
  $path=APPPATH.'views/template/body/'.$page_name;
  if(!is_dir($path)) //create the folder if it's not already exists
  {
    mkdir($path,0755,TRUE);
  } 

  // Create Twig Page
  $page = fopen(APPPATH.'views/template/body/'.$page_name.'/'.$page_name.'.php', "a") or die("Unable to    
  open file!"); 

  $page_content ='

      <div class="content-wrapper">
        <section class="content">
          <div class="row">

            <div class="col-md-6">  
              A
            </div>  

            <div class="col-md-6"> 
              B
            </div>
              
          </div>
        </section>
      </div>




  ';
  fwrite($page, "\n". $page_content);
  fclose($page);
   }