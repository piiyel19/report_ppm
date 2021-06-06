<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ui_generator_model extends CI_Model
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


}