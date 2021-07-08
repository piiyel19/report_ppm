<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Server_generator_model extends CI_Model
{
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db2 = $this->load->database('otrs', TRUE);
		    //$this->datatables->set_database('otrs');
	  }


	  function test_data($param)
	  {		
	  		if(!empty($param)){
	  			$select="SELECT hostname,responsible, perform_date, ppm_device, status FROM ppm_register WHERE hostname LIKE '%".$param."%' LIMIT 10";
	  		} else {
	  			$select="SELECT hostname,responsible, perform_date, ppm_device, status FROM ppm_register LIMIT 10";
	  		}
	  		
		  	$query= $this->db2->query($select);

		  	return $query;

	  }

	function server_data($param)
	{
		$select="SELECT
				pr.type_ppm_activity,
				cpt.name,
				cpt.description,
				cpt.ip,
				cpt.operating_system,
				cpt.Ram,
				pc.comment 
				from ppm_register pr 
				join computer cpt on pr.hostname = cpt.name
				join ppm_comment pc on pr.id_number = pc.id_number 
				where pr.ppm_device = ('Server(Physical)'and 'Server(Virtual)') and pr.type_ppm_activity = '41'
				";

  		$query= $this->db2->query($select);

		return $query;
	}

}