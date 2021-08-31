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


	// function physical_data($input)
	// {
	// 	$activity = strval($input->post('ppm_activity'));
	// 	//$type_ppm  = strval($input->post('ppm_device'));
	// 	$host = strval($input->post('server_host'));
	// 	$date_start = strval($input->post('datestart'));
	// 	$date_end = strval($input->post('dateend'));

	// 	$select="SELECT
	// 			pr.type_ppm_activity,
	// 			cpt.name,
	// 			cpt.description,
	// 			cpt.ip,
	// 			cpt.operating_system,
	// 			cpt.cpu_core,
	// 			cpt.Ram,
	// 			pc.comment 
	// 			from ppm_register pr 
	// 			join computer cpt on pr.hostname = cpt.name
	// 			join ppm_comment pc on pr.id_number = pc.id_number 
	// 			where pr.ppm_device = 'Server(Physical)'
	// 			and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

	// 	// if($type_ppm != 'ALL'){
	// 	// 	$select .=" pr.ppm_device = '".$type_ppm."' ";
	// 	// }

	// 	if($type_ppm != 'ALL'){
	// 		$select .=" pr.ppm_device = '".$type_ppm."' ";
	// 	}

 //  		$query= $this->db2->query($select);

	// 	return $query;
	// }

	// function virtual_data($input)
	// {
	// 	$activity = strval($input->post('ppm_activity'));
	// 	//$type_ppm  = strval($input->post('ppm_device'));
	// 	$date_start = strval($input->post('datestart'));
	// 	$date_end = strval($input->post('dateend'));

	// 	$select="SELECT
	// 			pr.type_ppm_activity,
	// 			cpt.name,
	// 			cpt.description,
	// 			cpt.ip,
	// 			cpt.operating_system,
	// 			cpt.cpu_core,
	// 			cpt.Ram,
	// 			pc.comment 
	// 			from ppm_register pr 
	// 			join computer cpt on pr.hostname = cpt.name
	// 			join ppm_comment pc on pr.id_number = pc.id_number 
	// 			where pr.ppm_device = 'Server(Virtual)'
	// 			and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

	// 	// if($type_ppm != 'ALL'){
	// 	// 	$select .=" pr.ppm_device = '".$type_ppm."' ";
	// 	// }

 //  		$query= $this->db2->query($select);

	// 	return $query;
	// }

	// function storage_data($input)
	// {
	// 	$activity = strval($input->post('ppm_activity'));
	// 	// $type_ppm  = strval($input->post('ppm_device'));
	// 	$date_start = strval($input->post('datestart'));
	// 	$date_end = strval($input->post('dateend'));

	// 	$select="SELECT
	// 			pr.type_ppm_activity,
	// 			cpt.name,
	// 			cpt.description,
	// 			cpt.ip,
	// 			cpt.operating_system,
	// 			cpt.cpu_core,
	// 			cpt.Ram,
	// 			pc.comment  
	// 			from ppm_register pr 
	// 			join computer cpt on pr.hostname = cpt.name
	// 			join ppm_comment pc on pr.id_number = pc.id_number 
	// 			where pr.ppm_device = 'Storage'
	// 			and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

	// 	// if($type_ppm != 'ALL'){
	// 	// 	$select .=" pr.ppm_device = '".$type_ppm."' ";
	// 	// }

 //  		$query= $this->db2->query($select);

	// 	return $query;
	// }

	  function accesspoint_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		// $type_device  = strval($input->post('ppm_device'));
		$date_start = strval($input->post('datestart'));
		$date_end = strval($input->post('dateend'));

		$select="SELECT
				pr.hostname,
				phd.model,
				phd.ip,
				phd.serial_number,
				pr.location,
				phc.port 
				from ppm_register pr 
				join ppm_hardware_device phd on pr.id_number = phd.id_number 
				join ppm_hardware_checklist phc on pr.id_number =  phc.id_number 
				where pr.ppm_device ='Access Point'
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		// if($type_device != 'ALL'){
		//  	$select .=" and pr.ppm_device = '".$type_device."' ";
		//  }

  		$query= $this->db2->query($select);

		return $query;
	}

	function controller_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));
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
				where pr.hostname like 'WIHST02%'
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}

	function firewall_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));
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
				where pr.hostname like 'WIHST03%'
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}

	function ups_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));
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
				where pr.hostname like 'WIHST04%'
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}

	function loadbalancer_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));
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
				where pr.hostname like 'WIHST05%'
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}

	function switch_data($input)
	{
		$activity = strval($input->post('ppm_activity'));
		$type_ppm  = strval($input->post('ppm_device'));
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
				where pr.hostname like 'WIHST06%'
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		if($type_ppm != 'ALL'){
		 	$select .=" and pr.ppm_device = '".$type_ppm."' ";
		 }

  		$query= $this->db2->query($select);

		return $query;
	}

}