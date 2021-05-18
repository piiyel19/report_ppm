<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->db2 = $this->load->database('otrs', TRUE);
	}

	function count($uname,$pwd)
	{
		$where = "	SELECT COUNT(*) AS TOTAL FROM login_user as a  
					LEFT JOIN agent as b ON b.userid = a.userid
					WHERE a.username='$uname' AND a.password='$pwd' AND b.validity='Valid' AND a.status='active'";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}

	function get_id($uname,$pwd)
	{
		$where = "SELECT userid FROM login_user WHERE username='$uname' AND password='$pwd'";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->userid;
		    }
		} else {
			
		}
	}
	
	function get_email($username)
	{
	    $where = "SELECT email FROM agent WHERE username='$username'";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->email;
		    }
		} else {
			
		}
	}

	function set_session($userid)
	{
		$where = "SELECT * FROM agent WHERE userid='$userid'";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $character) {
		    	
				    $id = $character->userid;
				    $first_name = $character->first_name;
				    $last_name = $character->last_name;
				    $group_name = $character->group_name;
				    $role_name = $character->role_name;
				    $email = $character->email;
				    $mobile = $character->mobile;
				    $validity = $character->validity;
				    $group_name = $character->group_name;

				    $env = $character->env;

				    //assign session
				    $data = array(  'userid'=>$userid,
				                    'first_name'=>$first_name,
				                    'last_name'=>$last_name,
				                    'group_name'=>$group_name,
				                    'role_name'=>$role_name,
				                    'email'=>$email,
				                    'mobile'=>$mobile,
				                    'validity'=>$validity,
				                    'logged_in'=>TRUE,
				                    'env'=>$env
				                  );
				    $this->session->set_userdata($data);


				    $this->db2->distinct();
				    $this->db2->select("module");
					$this->db2->from("agent_module");
					// check if set by where or not 
					$this->db2->where("group_agent",$group_name); 
					$this->db2->where("validity","Valid");
					$Module = $this->db2->get()->result();
					
					foreach($Module as $key=>$value){
						$idModule[] = $Module[$key]->module;
						//echo $idJawatan;
						//echo $jawatan;
						$this->session->set_userdata('idModule',$idModule);
					}

					$role=$this->session->userdata('idModule');
				    

		    }
		    
		} else {
			echo '0';
		}
	}


	function saveLog($data)
	{
		$this->db2->insert("log_activities",$data);
	}

	function agentLogout($data,$userid)
	{
		$this->db2->where('userid',$userid);
	  	$this->db2->update('agent',$data);
	}


	function update_status_user($other_id)
	{
		$data = array("status"=>"inactive");
		$this->db2->where('userid',$other_id);
	  	$this->db2->update('login_user',$data);
	}


	function Update_Password($data,$email,$username)
	{	
		if(!empty($email))
		{
			$this->db2->where("email",$email);
		} else if(!empty($username)){
			$this->db2->where("username",$username);
		}

		$this->db2->update("agent",$data);
		$this->db2->update("login_user",$data);
	}
	
}