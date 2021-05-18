<?php
defined('BASEPATH') OR exit('No direct script access allowed');//ob_clean();
class Login extends CI_Controller  {
  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('datatables');
    $this->load->model('Login_model','login');
    $this->load->helper('Lookup_helper'); //helpers
    $this->load->model('Dbase_lookup','lookup');
    $this->load->model('Admin_model','Admin'); 
  }

  // public function index()
  // {
  //   if((!empty($this->session->userdata('logged_in'))))
  //   {
  //     redirect('menu');
  //   } else { 
  //     $this->load->view('login');
  //   }
  // }

  public function index()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      redirect('dashboard');
    } else { 
      $this->load->view('templates_report/body/login');
    }
  }

  function verify()
  {
    $uname = $this->input->post('uname');
    $pwd = $this->input->post('pwd');
    //$pwd =  hash('sha256',$pwd);

    // count 
    $count = $this->login->count($uname,$pwd);
    if($count>0){
      
      $userid = $this->login->get_id($uname,$pwd);
      $this->login->set_session($userid);


      $updateBy = $this->session->userdata('userid');
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $timeReg =date("h:i:s");
      $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
      $datetime = $dateReg.' '.$timeReg;

      $data = array(
                      "type_activities"=>"Login System ",
                      "created_by"=>$updateBy,
                      "userid"=>$updateBy
                    );

      $this->Admin->saveLog($data);

      $this->session->set_flashdata('voice_1', 'success');
      redirect('dashboard');
      
      //get details from file json
      // $data = file_get_contents (''.base_url().'json/agent.json');
      // $characters = json_decode($data); // decode the JSON feed

      // //echo $characters[0]->userid;

      // foreach ($characters as $character) {
        
      //   $id=$character->userid;
        
      //   if($id==$userid){
          
      //     $id = $character->userid;
      //     $first_name = $character->first_name;
      //     $last_name = $character->last_name;
      //     $group_name = $character->group_name;
      //     $role_name = $character->role_name;
      //     $email = $character->email;
      //     $mobile = $character->mobile;
      //     $validity = $character->validity;

      //     //assign session
      //     $data = array(  'id'=>$id,
      //                     'first_name'=>$first_name,
      //                     'last_name'=>$last_name,
      //                     'group_name'=>$group_name,
      //                     'role_name'=>$role_name,
      //                     'email'=>$email,
      //                     'mobile'=>$mobile,
      //                     'validity'=>$validity,
      //                     'logged_in'=>TRUE
      //                   );
      //     $this->session->set_userdata($data);

      //     redirect('dashboard');

      //   }
      // }
     // var_dump($json);

    } else {
      $this->session->set_flashdata('voice_1', 'unsuccess');
      redirect('login');
    }

  }

  function logout()
  {

    $userid = $this->session->userdata('userid');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("h:i:s");
    $dateReg =date("d/m/Y");//$dateReg =date("d/m/Y");
    $datetime = $dateReg.' '.$timeReg;


    // add log activities
    if(!empty($userid)){
      $data = array(
                            "type_activities"=>"Logout System",
                            "created_by"=>$userid,
                            "userid"=>$userid
                         );

      $this->login->saveLog($data);


      //update details
      $data = array(
                            "last_login"=>$datetime
                         );

      $this->login->agentLogout($data,$userid);
    }
    
    $this->session->sess_destroy();
    redirect('login/kill');
  }

  function kill()
  {
    $this->session->set_flashdata("logout_system","logout_system");
    redirect('login');
  }


  function update_status_user()
  {
    $other_id = $this->input->post('other_id');
    $this->login->update_status_user($other_id);
  }
  

  function newpassword()
  {
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    
    $to_email = $this->login->get_email($username);
    
    // sent email
    $from_email = "admin@nexticks.com";
    //$to_email = "sufianmohdhassan19@gmail.com";
    //Load email library
    $this->load->library('email');
    $this->email->from($from_email, 'NexDesk : Request New Password');
    $this->email->to($to_email);
    $this->email->subject('System Generated New Password');
    $html = 'You have been changed passwod. Your New Password is : P@ssword1234';
    $this->email->message($html);
    //Send mail
    if($this->email->send())
    {
        $new_pwd = 'P@ssword1234';
       // $new_pwd =  hash('sha256',$new_pwd);
        $data = array("password"=>$new_pwd);
        $this->login->Update_Password($data,$email,$username);


        $this->session->set_flashdata("email_sent","<br>New Password have been success sent ! Please check your email");
    } else {
        $this->session->set_flashdata("email_sent","<br>You have encountered an error, please contact administrator +603-83-200-100");
    }
    
    $rand = rand();
    $url = 'login/reqpasword/cpwd/true/'.$rand.'/req/false/'.$rand.'/forced/';
    redirect($url);
  }

  function reqpasword()
  {
    if((!empty($this->session->userdata('logged_in'))))
    {
      //redirect('menu');
    } else { 
      $this->load->view('templates_report/body/login');
    }
  }


  function sendMail()
  {
      $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'hafizmooqe92@gmail.com', // change it to yours
        'smtp_pass' => 'Z011992rf5l', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
      );

      $message = '';
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('hafizmooqe92@gmail.com'); // change it to yours
      $this->email->to('hafizuddin.shahipurullah@gmail.com');// change it to yours
      $this->email->subject('Resume from JobsBuddy for your Job posting');
      $this->email->message($message);
      if($this->email->send())
      {
        echo 'Email sent.';
      }
      else
      {
       show_error($this->email->print_debugger());
      }
  }




}