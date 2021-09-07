<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class network_model extends CI_Model
{
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db2 = $this->load->database('otrs', TRUE);
		    //$this->datatables->set_database('otrs');
	  }


	  function datacenter_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));

		$select="SELECT
				pr.type_ppm_activity,
				pr.hostname,
				phd.model,
				phd.ip,
				phd.serial_number,
				phd.location,
				phc.port 
				from ppm_register pr 
				join ppm_hardware_device phd on pr.id_number = phd.id_number 
				join ppm_hardware_checklist phc on pr.id_number =  phc.id_number 
				where pr.location like 'DC%'";

		if($activity != 'ALL'){
			$select .=" and pr.type_ppm_activity = '".$activity."' ";
		}

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}

	function tcrroom_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));
		// $date_start = strval($input->post('datestart'));
		// $date_end = strval($input->post('dateend'));

		$select="SELECT
				pr.type_ppm_activity,
				pr.hostname,
				phd.model,
				phd.ip,
				phd.serial_number,
				pr.location,
				phc.port,
				pr.ppm_device
				from ppm_register pr 
				join ppm_hardware_device phd on pr.id_number = phd.id_number
				join ppm_hardware_checklist phc on pr.id_number = phc.id_number 
				where pr.location like 'TCR%'";

		if($activity != 'ALL'){
			$select .=" and pr.type_ppm_activity = '".$activity."' ";
		}

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}

	function backuproom_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));

		$select="SELECT
				pr.type_ppm_activity,
				pr.hostname,
				phd.model, 
				phd.ip,
				phd.serial_number,
				phd.location,
				phc.port 
				from ppm_register pr 
				join ppm_hardware_device phd on pr.id_number = phd.id_number 
				join ppm_hardware_checklist phc on pr.id_number =  phc.id_number 
				where pr.location = 'L6-IT-013A' 
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		if($activity != 'ALL'){
			$select .=" and pr.type_ppm_activity = '".$activity."' ";
		}

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}
}