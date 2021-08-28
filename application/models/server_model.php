<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class server_model extends CI_Model
{
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db2 = $this->load->database('otrs', TRUE);
		    //$this->datatables->set_database('otrs');
	  }


	function physical_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$date_start = strval($input->post('datestart'));
		$date_end = strval($input->post('dateend'));

		$select="SELECT
				pr.type_ppm_activity,
				cpt.name,
				cpt.description,
				cpt.ip,
				cpt.operating_system,
				cpt.cpu_core,
				cpt.Ram,
				pc.comment 
				from ppm_register pr 
				join computer cpt on pr.hostname = cpt.name
				join ppm_comment pc on pr.id_number = pc.id_number 
				where pr.ppm_device = 'Server(Physical)'
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

  		$query= $this->db2->query($select);

		return $query;
	}

}