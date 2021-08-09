<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class workstation_model extends CI_Model
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

	function computer_data($input)
	{	$activity = strval($input->post('ppm_activity'));
		$level = strval($input->post('level'));
		$dept = strval($input->post('department'));
		$date_start = strval($input->post('datestart'));
		$date_end = strval($input->post('dateend'));

		$select="SELECT
				pr.type_ppm_activity,
				lct.level,
				lct.department,
				cpt.description,
				cpt.model,
				cpt.serial_number,
				cpt.location,
				lct.room_name,
				cpt.name,
				cpt.network_port,
				cpt.ip,
				cpt.mac_address,
				cpt.processor_type,
				cpt.capacity,
				cpt.`Ram`,
				cpt.monitor_model,
				cpt.monitor_serial_no,
				cpt.ups_serial_no,
				pcc.win_update,
				(case when pcc.checklist_6 = 'Yes' and pcc.checklist_7 ='Yes' then 1 else 0 end) as AV,
				(case when pcc.checklist_9 = 'Yes' then 1 else 0 end) as UPS,
				pr.perform_date,
				pr.responsible,
				pc.comment 
				from ppm_register pr
				join computer cpt on pr.hostname = cpt.name  
				join location lct on cpt.location = lct.name
				join ppm_computer_checklist pcc on pr.id_number = pcc.id_number 
				join ppm_comment pc on pr.id_number = pc.id_number 
				where pr.ppm_device = 'Computer' 
				and STR_TO_DATE(pr.perform_date,'%d/%m/%Y') between STR_TO_DATE('".$date_start."','%d/%m/%Y') and STR_TO_DATE('".$date_end."','%d/%m/%Y') ";

		if($activity != 'ALL'){
			$select .=" and pr.type_ppm_activity = '".$activity."' ";
		}

		if($level != 'ALL'){
			$select .=" and lct.level = '".$level."' ";
		}

		if($dept != 'ALL'){
			$select .=" and lct.department = '".$dept."' ";
		}			
				

		$select .= " order by cast(level as int),department asc ";

  		$query= $this->db2->query($select);

		return $query;
	}

	function laptop_data($param)
	{
		$select="select
				pr.type_ppm_activity,
				lct.level,
				lct.department,
				cpt.description,
				cpt.model,
				cpt.serial_number,
				cpt.location,
				lct.room_name,
				cpt.name,
				cpt.mac_address,
				cpt.processor_type,
				cpt.capacity,
				cpt.`Ram`,
				pcc.win_update,
				(case when pcc.checklist_6 = 'Yes' and pcc.checklist_7 ='Yes' then 1 else 0 end) as AV,
				pr.perform_date,
				pr.responsible,
				pc.comment 
				from ppm_register pr
				join computer cpt on pr.hostname = cpt.name  
				join location lct on cpt.location = lct.name
				join ppm_computer_checklist pcc on pr.id_number = pcc.id_number 
				join ppm_comment pc on pr.id_number = pc.id_number 
				where pr.ppm_device = 'Notebook'
				order by level,department asc";

  		$query= $this->db2->query($select);

		return $query;
	}

	function printer_data($param)
	{
		$select="select
				pr.type_ppm_activity,
				lct.level,
				lct.department,
				hardware .model,
				hardware.serial_number,
				hardware.location,
				lct.room_name,
				hardware.name,
				hardware.network_port,
				hardware.ip_address,
				pr.perform_date,
				pr.responsible,
				pc.comment 
				from ppm_register pr
				join hardware hardware on pr.hostname = hardware.name 
				join location lct on hardware.location = lct.name
				join ppm_comment pc on pr.id_number = pc.id_number
				where pr.ppm_device = 'Printer'
				order by cast(level as int),department asc";

  		$query= $this->db2->query($select);

		return $query;
	}

	function scanner_data($param)
	{
		$select="select
				pr.type_ppm_activity,
				lct.level,
				lct.department,
				hardware .model,
				hardware.serial_number,
				hardware.location,
				lct.room_name,
				hardware.name,
				hardware.network_port,
				hardware.ip_address,
				pr.perform_date,
				pr.responsible,
				pc.comment 
				from ppm_register pr
				join hardware hardware on pr.hostname = hardware.name 
				join location lct on hardware.location = lct.name
				join ppm_comment pc on pr.id_number = pc.id_number
				where pr.ppm_device = 'Scanner'
				order by cast(level as int),department asc";

  		$query= $this->db2->query($select);

		return $query;
	}

	function count_data($type,$lvl,$dept){
		$select= "select COUNT(*) as counter 
				from ppm_worksation_asset pwa 
				join location lc on pwa.location = lc.name
				where pwa.`type` = '".$type."'";

		if($lvl){
			$select.=" and lc.`level` = '".$lvl."' ";
		}

		if($dept){
			$select.=" and lc.`department` = '".$dept."' ";
		}

		$select.=" limit 1";

		$query= $this->db2->query($select);

		return $query;
	}


}