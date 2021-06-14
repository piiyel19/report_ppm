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

	function computer_data($param)
	{
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
				order by level,department asc";

  		$query= $this->db2->query($select);

		return $query;
	}


}