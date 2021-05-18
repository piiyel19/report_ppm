<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model
{
	  function __construct()
	  {
		    // Call the Model constructor
		    parent::__construct();
		    $this->db2 = $this->load->database('otrs', TRUE);
		    $this->datatables->set_database('otrs');
	  }

	/* Start AGENT */
	  function save_userdetails($data)
	  {
	  		$this->db2->insert("agent",$data);
	  }

	  function save_userlogin($data)
	  {
	  		$this->db2->insert("login_user",$data);	
	  }



	  

	  function check_username($am_uname)
	  {
		  	$where = "SELECT COUNT(*) AS TOTAL FROM login_user WHERE username='$am_uname'";
			$query = $this->db2->query($where);
			if ($query->num_rows() >0){ 
			    foreach ($query->result() as $data) {
			    	return $data->TOTAL;
			    }
			} else {
				return '0';
			}
	  }

	  function Dtable_knowlegdebase_user_access()
	  {
	  		$where = "id,name";

		  	$this->datatables->select($where);
			$this->datatables->from("knowledbased_access");	

			return $this->datatables->generate();
	  }

	  function Dtable_Agent_ViewList()
	  {
		  	$where = "userid,username,CONCAT(title_salutation,' ',first_name,' ',last_name) as first_name,email,last_login, changed, created";

		  	$this->datatables->select($where);
			$this->datatables->from("agent");	
			$this->datatables->where("validity !=","Deleted");	//filter by not = Deleted
			$this->db->order_by("userid", "desc");

			return $this->datatables->generate();
	  }

	  function agent_details($userid)
	  {
		  	$select="SELECT * FROM agent WHERE userid='$userid'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }




	  function update_agent_details($data,$userid)
	  {
		  	$this->db2->where('userid',$userid);
		  	$this->db2->update('agent',$data);
	  }

	  function saveLog($data)
	  {
			$this->db2->insert("log_activities",$data);
	  }

	  function update_login_table($data,$userid)
	  {
	  	
		  	$this->db2->where('userid',$userid);
		  	$this->db2->update('login_user',$data);
	  }
	/* END */


	/* Start GM */
	  function gm_add_group($data)
	  {
	  		$this->db2->insert("group",$data);
	  }

	  function Dtable_GM_ViewList()
	  {
	  		$where = "name,validity,comment,Changed,Created,id_group";

		  	$this->datatables->select($where);
			$this->datatables->from("group");
			$this->datatables->where("validity !=","Deleted");		
			$this->db->order_by("Created", "desc");
			$this->datatables->group_by("name");

			return $this->datatables->generate();
	  }

	  function gm_details($groupid)
	  {

	  		$select="SELECT * FROM `group` WHERE id_group='$groupid'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function gm_update($data,$groupid)
	  {
	  		$this->db2->where('id_group',$groupid);
		  	$this->db2->update('group',$data);
	  }
	/* END */


	/* START ROLE */
	  function save_add_role($data)
	  {
	  		$this->db2->insert('role',$data);
	  }

	  function Dtable_Role_ViewList()
	  {
	  		$where = "name,validity,group_name,comment,changed,created,id_role";

		  	$this->datatables->select($where);
			$this->datatables->from("role");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function role_details($roleid)
	  {
	  		$select="SELECT * FROM `role` WHERE id_role='$roleid'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function role_update_role($data,$roleid)
	  {
	  		$this->db2->where('id_role',$roleid);
		  	$this->db2->update('role',$data);
	  }
	/* END */


	/* START Service Management */
	  function sm_add_service($data)
	  {
	  		$this->db2->insert('service',$data);
	  }

	  function Dtable_SM_ViewList()
	  {
	  		$where = "service,service_type,sub_service,criticalty,validity,comment,changed,created,service_generated_id";

		  	$this->datatables->select($where);
			$this->datatables->from("service");
			$this->datatables->where("validity !=","Deleted");			
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }
	  
	  
	  function getname_service_by_id($id)
	  {
	      $getData = "SELECT 	DISTINCT customerID FROM customer WHERE other_id='$id' ";
	     // var_dump($getData);
			$query= $this->db->query($getData);
		    if ($query->num_rows() >0){ 
			    	//echo $id;
			        foreach ($query->result() as $data) {

			        	echo $data->customerID;

			        }
			}
	  }
	  

	  function sm_details($servicesid)
	  {
	  		$select="SELECT * FROM `service` WHERE 	service_generated_id='$servicesid'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function sm_update_service($data,$servicesid)
	  {
	  		$this->db2->where('service_generated_id',$servicesid);
		  	$this->db2->update('service',$data);
	  }
	/* END */


	/* Start SERVICE TYPE */
	  function st_add_service($data)
	  {
	  		$this->db2->insert('service_type',$data);
	  }

	  function Dtable_ST_ViewList()
	  {
	  		$where = "service_type,validity,changed,created,service_type_id";

		  	$this->datatables->select($where);
			$this->datatables->from("service_type");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function st_details($servicestypeid)
	  {
	  		$select="SELECT * FROM `service_type` WHERE service_type_id='$servicestypeid'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function st_update_service($data,$service_type_id)
	  {
	  		$this->db2->where('service_type_id',$service_type_id);
		  	$this->db2->update('service_type',$data);
	  }
	/* END */


	/* START SLA */
	  function sla_add_service($data)
	  {
	  		$this->db2->insert('sla',$data);
	  }

	  function Dtable_SLA_ViewList()
	  {
	  		$where = "	sla,service,validity,comment,changed,created,sla_id,type_of_sla";

		  	$this->datatables->select($where);
			$this->datatables->from("sla");		
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function sla_details($slaid)
	  {
	  		$select="SELECT * FROM `sla` WHERE sla_id='$slaid'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function sla_update_service($data,$sla_id)
	  {
	  		$this->db2->where('sla_id',$sla_id);
		  	$this->db2->update('sla',$data);
	  }

	  function sla_add_type($data)
	  {
	  		$this->db2->insert('sla_type',$data);
	  }

	  function Dtable_SLA_Type_ViewList()
	  {	
	  		$where = "	sla_type,validity,changed,created,type_id";

		  	$this->datatables->select($where);
			$this->datatables->from("sla_type");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function sla_type_details($slatypeid)
	  {
	  		$select="SELECT * FROM `sla_type` WHERE type_id='$slatypeid'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function sla_update_type($data,$slatypeid)
	  {
	  		$this->db2->where('type_id',$slatypeid);
		  	$this->db2->update('sla_type',$data);
	  }

	  function check_sla_type_name($sla_type_name)
	  {
	  		$where = "SELECT COUNT(*) AS TOTAL FROM sla_type WHERE sla_type='$sla_type_name'";
			$query = $this->db2->query($where);
			if ($query->num_rows() >0){ 
			    foreach ($query->result() as $data) {
			    	return $data->TOTAL;
			    }
			} else {
				return '0';
			}
	  }
	/* END */


	/* START Default */
	  function default_add_priority($data)
	  {
	  		$this->db2->insert('priority',$data);
	  }

	  function Dtable_Default_Priority_ViewList()
	  {
	  		$where = "	critical_type,validity,changed,created,	default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("priority");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function default_priority_details($default_id)
	  {
	  		$select="SELECT * FROM `priority` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function default_update_priority($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('priority',$data);
	  }
	/* END */


	/* START Deployment*/
	  function deployment_add_state($data)
	  {
	  		$this->db2->insert('deployment_state',$data);
	  }

	  function Dtable_Deployment_ViewList()
	  {
	  		$where = "	deployment_state,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("deployment_state");
			$this->datatables->where("validity !=","Deleted");			
			$this->db->order_by("created", "desc");
			$this->datatables->group_by($where);

			

			return $this->datatables->generate();
	  }

	  function deployment_details($default_id)
	  {
	  		$select="SELECT * FROM `deployment_state` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function deployment_update_state($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('deployment_state',$data);
	  }
	/* END */


	/* Start Incident */
	  function incident_add_state($data)
	  {
	  		$this->db2->insert('incident_state',$data);
	  }

	  function Dtable_Incident_ViewList()
	  {
	  		$where = "	incident_state,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("incident_state");	
			$this->datatables->where("validity !=","Deleted");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function incident_details($default_id)
	  {
	  		$select="SELECT * FROM `incident_state` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function incident_update_state($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('incident_state',$data);
	  }
	/* END */


	/* VALIDITY */
	  function validity_add($data)
	  {
	  		$this->db2->insert('validity_type',$data);
	  }

	  function Dtable_Validity_ViewList()
	  {
	  		$where = "	validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("validity_type");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function validity_details($default_id)
	  {
	  		$select="SELECT * FROM `validity_type` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function validity_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('validity_type',$data);
	  }
	/* END */


	/* CRITICALITY */
	  function Criticality_add($data)
	  {
	  		$this->db2->insert('criticality_type',$data);
	  }

	  function Dtable_Criticality_ViewList()
	  {
	  		$where = "	Criticality,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("criticality_type");		
			$this->db->order_by("created", "desc");
			$this->datatables->group_by("Criticality");

			return $this->datatables->generate();
	  }

	  function Criticality_details($default_id)
	  {
	  		$select="SELECT * FROM `criticality_type` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function Criticality_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('criticality_type',$data);
	  }
	/* END */


	/* DELETE DATA */
	  function delete_data($other_id,$nama_table,$where_column)
	  {
	  		// $this->db2->where($where_column,$other_id);
		  	// $this->db2->delete($nama_table);
	  	    $data = array("validity"=>"Deleted");
			$this->db2->where($where_column,$other_id);
			$this->db2->update($nama_table,$data);
	  }

	  function delete_data_trash($other_id,$nama_table,$where_column)
	  {
	  		$this->db2->where($where_column,$other_id);
		  	$this->db2->delete($nama_table);
	  }

	  

	  function gm_delete_data_join($other_id,$nama_table,$nama_table2,$where_column,$where_column2)
	  {	
		  	// $select="SELECT * FROM `group` WHERE id_group='$other_id'";
		  	// $query= $this->db->query($select);
		   //  if ($query->num_rows() >0){ 
		   //      foreach ($query->result() as $data) {
		   //      	echo $group_name = $data->name;

		   //      	$data = array("validity"=>"Invalid");
		   //      	$this->db2->where($where_column2,$group_name);
		  	// 		$this->db2->update($nama_table2,$data);
		   //      }
		   // 	}

		   // 	$this->db2->where($where_column,$other_id);
		  	// $this->db2->delete($nama_table);

				$data = array("validity"=>"Deleted");
				$this->db2->where($where_column,$other_id);
				$this->db2->update($nama_table,$data);

	  }

	  function sm_delete_data_join($other_id,$nama_table,$nama_table2,$where_column,$where_column2)
	  {	
		  	// $select="SELECT * FROM `service` WHERE service_generated_id='$other_id'";
		  	// $query= $this->db->query($select);
		   //  if ($query->num_rows() >0){ 
		   //      foreach ($query->result() as $data) {
		   //      	echo $group_name = $data->service;

		   //      	$data = array("validity"=>"Invalid");
		   //      	$this->db2->where($where_column2,$group_name);
		  	// 		$this->db2->update($nama_table2,$data);
		   //      }
		   // 	}

		   // 	$this->db2->where($where_column,$other_id);
		  	// $this->db2->delete($nama_table);  	

	  		$data = array("validity"=>"Deleted");
			$this->db2->where("service_generated_id",$other_id);
			$this->db2->update("service",$data);
	  }
	/* END */


	/* Start CM CUSTOMER USER */
	  	function SimpanData_CM_CustomerUser($data)
		{
		  	//code simpan 
		  	$this->db2->insert("customer_user",$data);
		}

		//fungsi update
		function UpdateDataCustomerUser($data,$other_id)
		{
			//code update 
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("customer_user",$data); // nama DB
		}

		function Dtable_CM_CustomerUser_ViewList()
		{
			$where ="username,first_name,email,customerID,changed,created,valid,other_id"; 
			// set column mana nak tarik
		  	$this->datatables->select($where);
			$this->datatables->from("customer_user"); //set database nama table
			$this->datatables->where("valid !=","Deleted");
			//$this->datatables->group_by("username");

			return $this->datatables->generate();
		}

		/* START DELETE */
		function Delete_CM_CustomerUser_ViewList($other_id)
		{	
			//code update 
			// $this->db->where("other_id",$other_id); //where id mana
		 //  	$this->db->delete("customer_user"); // nama DB


			$data = array("valid"=>"Deleted"); //kau nak update column mana dengan data apa
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("customer_user",$data); // nama DB bersama data yang nak update			

		} 
		/* END */

		function cm_customerUser_details($other_id)
		{
			$select="SELECT * FROM customer_user WHERE other_id='$other_id'";
		  	$query= $this->db2->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
		}
	/* END */


	/* Start CM CUSTOMER */
		function SimpanDataCustomer($data)
		{
		  	//code simpan 
		  	$this->db2->insert("customer",$data);
		}

		//fungsi update
		function UpdateDataCustomer($data,$other_id)
		{
			//code update 
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("customer",$data); // nama DB
		}

		function Dtable_CM_Customer_ViewList()
		{
			$where = "customerID,customer,comment,valid,changed,created,other_id"; // set column mana nak tarik
		  	$this->datatables->select($where);
			$this->datatables->from("customer"); //set database nama table
			$this->datatables->where("valid !=","Deleted");
            $this->datatables->group_by('customerID');
			return $this->datatables->generate();
		}

		/* START DELETE */
		function Delete_CM_Customer_ViewList($other_id)
		{	
			//code update 
			//$this->db->where("other_id",$other_id); //where id mana
		  	//$this->db->delete("customer"); // nama DB

			$data = array("valid"=>"Deleted"); //kau nak update column mana dengan data apa
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("customer",$data); // nama DB bersama data yang nak update		
		} 
		/* END */

		function cm_customer_details($other_id)
		{
			$select="SELECT * FROM customer WHERE other_id='$other_id'";
		  	$query= $this->db2->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
		}
	/* END */


	/* Start CMDB COMPUTER */
		function SimpanDataComputer($data)
		{
		  	//code simpan 
		  	$this->db2->insert("computer",$data);
		}

		function UpdateDataComputer_ByAgent($data,$COMP_Name)
		{
			$this->db2->where('name',$COMP_Name);
			$this->db2->update("computer",$data);
		}

		function checkName_Computer($COMP_Name)
		{
			$where = "	SELECT COUNT(*) AS TOTAL FROM computer 
						WHERE name='$COMP_Name' AND validity !='Deleted'
					 ";
			$query = $this->db2->query($where);
			if ($query->num_rows() >0){ 
			    foreach ($query->result() as $data) {
			    	return $data->TOTAL;
			    }
			} else {
				return '0';
			}
		}



		//fungsi update
		function UpdateDataComputer($data,$other_id)
		{
			//code update 
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("computer",$data); // nama DB
		}

		function SimpanData_CMDB_ComputerType($data)
		{
			//code simpan 
		  	$this->db2->insert("computer_type",$data);	
		}

		function Dtable_CMDB_Computer_ViewList()
		{
			$where = "name,deployment_state,incident_state,validity,created,changed,other_id,ip"; // set column mana nak tarik
		  	$this->datatables->select($where);
			$this->datatables->from("computer"); //set database nama table
			$this->datatables->where("validity !=","Deleted");
			$this->datatables->group_by("name");

			return $this->datatables->generate();
		}

		function Delete_CMDB_Computer_ViewList($other_id)
		{	
			//code update 
			//$this->db->where("other_id",$other_id); //where id mana
		  	//$this->db->delete("computer"); // nama DB

			$data = array("validity"=>"Deleted"); //kau nak update column mana dengan data apa
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("computer",$data); // nama DB bersama data yang nak update
		} 


		function cmdb_computer_details($other_id)
		{
			$select="SELECT * FROM computer WHERE other_id='$other_id'";
		  	$query= $this->db2->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
		}
	/* END */


	/* Start CMDB COMPUTER TYPE */
	  function A_cmdb_computerType_addData($data)
	  {
	  		$this->db2->insert('computer_type',$data);
	  }

	  function Dtable_cmdb_computerType_ViewList()
	  {
	  		$where = "	computer_type,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("computer_type");		
			$this->db->order_by("created", "desc");
			$this->datatables->group_by($where);


			return $this->datatables->generate();
	  }

	  function A_cmdb_computerType_details($other_id)
	  {
	  		$select="SELECT * FROM `computer_type` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function A_cmdb_computerType_update($data,$other_id)
	  {
	  		$this->db2->where("other_id",$other_id);
		  	$this->db2->update('computer_type',$data);
	  }
	/* END */


	/* Start CMDB HARDWARE */
		function SimpanDataHardware($data)
		{
		  	//code simpan 
		  	$this->db2->insert("hardware",$data);
		}
		//fungsi update
		function UpdateDataHardware($data,$other_id)
		{
			//code update 
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("hardware",$data); // nama DB
		}

		function SimpanData_CMDB_HardwareType($data)
		{
			//code simpan 
		  	$this->db2->insert("hardware_type",$data);	
		}

		function Dtable_CMDB_Hardware_ViewList()
		{
			$where = "name,deployment_state,incident_state,validity,created,changed,other_id"; // set column mana nak tarik
		  	$this->datatables->select($where);
			$this->datatables->from("hardware"); //set database nama table
			$this->datatables->where("validity !=","Deleted");
            $this->datatables->group_by("name");
			return $this->datatables->generate();
		}

		/* START DELETE */
		function Delete_CMDB_Hardware_ViewList($other_id)
		{	
			//code update 
			//$this->db->where("other_id",$other_id); //where id mana
		  	//$this->db->delete("hardware"); // nama DB

		  	$data = array("validity"=>"Deleted"); //kau nak update column mana dengan data apa
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("hardware",$data); // nama DB bersama data yang nak update
		} 
		/* END */

		function cmdb_hardware_details($other_id)
		{
				$select="SELECT * FROM hardware WHERE other_id='$other_id'";
			  	$query= $this->db2->query($select);
			    if ($query->num_rows() >0){ 
			        foreach ($query->result() as $data) {
			            # code...
			            $result[] = $data;

			        }
			    return $result; //hasil dari semua proses ada dimari
			    } 
		}
	/* END */


	/* Start CMDB HARDWARE TYPE */
	  function A_cmdb_hardwareType_addData($data)
	  {
	  		$this->db2->insert('hardware_type',$data);
	  }

	  function Dtable_cmdb_hardwareType_ViewList()
	  {
	  		$where = "	hardware_type,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("hardware_type");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function A_cmdb_hardwareType_details($other_id)
	  {
	  		$select="SELECT * FROM `hardware_type` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function A_cmdb_hardwareType_update($data,$other_id)
	  {
	  		$this->db2->where("other_id",$other_id);
		  	$this->db2->update('hardware_type',$data);
	  }
	/* END */


	/* Start CMDB NETWORK */
		function SimpanDataNetwork($data)
		 {
		  	//code simpan 
		  	$this->db2->insert("network",$data);
		 }

		//function update 
		function UpdateDataNetwork($data,$other_id)
		{
			//code simpan 
			$this->db2->where('other_id',$other_id); // merujuk kepada where 
		  	$this->db2->update("network",$data); // table
		}

		function SimpanData_CMDB_NetworkType($data)
		{
			//code simpan 
	  		$this->db2->insert("network_type",$data);	
		}

		function Dtable_CMDB_Network_ViewList()
		{
			$where = "name,deployment_state,incident_state,validity,created,changed,other_id,description"; // set column mana nak tarik
		  	$this->datatables->select($where);
			$this->datatables->from("network"); //set database nama table
			$this->datatables->where("validity !=","Deleted");

			return $this->datatables->generate();
		}

		/* START DELETE */
		function Delete_CMDB_Network_ViewList($other_id)
		{	
			//code update 
			//$this->db->where("other_id",$other_id); //where id mana
		  	//$this->db->delete("network"); // nama DB

		  	$data = array("validity"=>"Deleted"); //kau nak update column mana dengan data apa
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("network",$data); // nama DB bersama data yang nak update
		} 
		/* END */

		function cmdb_network_details($other_id)
		{
			$select="SELECT * FROM network WHERE other_id='$other_id'";
		  	$query= $this->db2->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
		}
	/* END */


	/* Start CMDB NETWORK TYPE */
	  function A_cmdb_networkType_addData($data)
	  {
	  		$this->db2->insert('network_type',$data);
	  }

	  function Dtable_cmdb_networkType_ViewList()
	  {
	  		$where = "network_type,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("network_type");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function A_cmdb_networkType_details($other_id)
	  {
	  		$select="SELECT * FROM `network_type` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function A_cmdb_networkType_update($data,$other_id)
	  {
	  		$this->db2->where("other_id",$other_id);
		  	$this->db2->update('network_type',$data);
	  }
	/* END */


	/* Start CMDB SOFTWARE */
		function SimpanDataSoftware($data)
		{
		  	//code simpan 
		  	$this->db2->insert("software",$data);
		}

		//fungsi update
		function UpdateDataSoftware($data,$other_id)
		{
			//code update 
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("software",$data); // nama DB
		}

		function SimpanData_CMDB_SoftwareType($data)
		{
			//code simpan 
		  	$this->db2->insert("software_type",$data);	
		}

		function Dtable_CMDB_Software_ViewList()
		{
			$where = "name,deployment_state,incident_state,validity,created,changed,other_id"; // set column mana nak tarik
		  	$this->datatables->select($where);
			$this->datatables->from("software"); //set database nama table
			$this->datatables->where("validity !=","Deleted");

			return $this->datatables->generate();
		}

		/* START DELETE */
		function Delete_CMDB_Software_ViewList($other_id)
		{	
			//code update 
			//$this->db->where("other_id",$other_id); //where id mana
		  	//$this->db->delete("software"); // nama DB

		  	$data = array("validity"=>"Deleted"); //kau nak update column mana dengan data apa
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("software",$data); // nama DB bersama data yang nak update
		} 
		/* END */

		function cmdb_software_details($other_id)
		{
			$select="SELECT * FROM software WHERE other_id='$other_id'";
		  	$query= $this->db2->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
		}
	/* END */


	/* Start CMDB SOFTWARE TYPE */
	  function A_cmdb_softwareType_addData($data)
	  {
	  		$this->db2->insert('software_type',$data);
	  }

	  function Dtable_cmdb_softwareType_ViewList()
	  {
	  		$where = "	software_type,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("software_type");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function A_cmdb_softwareType_details($other_id)
	  {
	  		$select="SELECT * FROM `software_type` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function A_cmdb_softwareType_update($data,$other_id)
	  {
	  		$this->db2->where("other_id",$other_id);
		  	$this->db2->update('software_type',$data);
	  }
	/* END */


	/* Start CMDB LOCATION */
		function SimpanDataLocation($data)
		{
			//code simpan 
			$this->db2->insert("location",$data);
		}

		//fungsi update
		function UpdateDataLocation($data,$other_id)
		{
			//code update 
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("location",$data); // nama DB
		}

		function SimpanData_CMDB_LocationType($data)
		{
			//code simpan 
		  	$this->db2->insert("location_type",$data);	
		}

		function Dtable_CMDB_Location_ViewList()
		{
			$where = "name,deployment_state,incident_state,validity,created,changed,other_id"; // set column mana nak tarik
		  	$this->datatables->select($where);
			$this->datatables->from("location"); //set database nama table
			$this->datatables->where("validity !=","Deleted");

			return $this->datatables->generate();
		}

		/* START DELETE */
		function Delete_CMDB_Location_ViewList($other_id)
		{	
			//code update 
			//$this->db->where("other_id",$other_id); //where id mana
		  	//$this->db->delete("location"); // nama DB

		  	$data = array("validity"=>"Deleted"); //kau nak update column mana dengan data apa
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("location",$data); // nama DB bersama data yang nak update
		} 
		/* END */

		function cmdb_location_details($other_id)
		{
			$select="SELECT * FROM location WHERE other_id='$other_id'";
		  	$query= $this->db2->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
		}
	/* END */


	/* Start CMDB LOCATION TYPE */
	  function A_cmdb_locationType_addData($data)
	  {
	  		$this->db2->insert('location_type',$data);
	  }

	  function Dtable_cmdb_locationType_ViewList()
	  {
	  		$where = "location_type,changed,created,other_id";

		  	$this->datatables->select($where);
			$this->datatables->from("location_type");		
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function A_cmdb_locationType_details($other_id)
	  {
	  		$select="SELECT * FROM `location_type` WHERE other_id='$other_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 

	  }

	  function A_cmdb_locationType_update($data,$other_id)
	  {
	  		$this->db2->where("other_id",$other_id);
		  	$this->db2->update('location_type',$data);
	  }
	/* END */


	/* START TICKET TYPE */
	  function TS_ticketType_addData($data)
	  {
	  		$this->db2->insert('ticket_type',$data);
	  }

	  function Dtable_ticketType_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("ticket_type");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_ticketType_details($default_id)
	  {
	  		$select="SELECT * FROM `ticket_type` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_ticketType_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('ticket_type',$data);
	  }
	/* END */
	

	/* START BACKUP TYPE */
	  function TS_backupType_addData($data)
	  {
	  		$this->db2->insert('backup_type',$data);
	  }

	  function Dtable_backupType_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("backup_type");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_backupType_details($default_id)
	  {
	  		$select="SELECT * FROM `backup_type` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_backupType_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('backup_type',$data);
	  }
	/* END */


	/* START MAIN LINE STATUS */
	  function TS_mainLineStatus_addData($data)
	  {
	  		$this->db2->insert('main_line_status',$data);
	  }

	  function Dtable_mainLineStatus_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("main_line_status");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_mainLineStatus_details($default_id)
	  {
	  		$select="SELECT * FROM `main_line_status` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_mainLineStatus_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('main_line_status',$data);
	  }
	/* END */


	/* START POSTMASTER MAIL ACCOUNT */
	  function A_email_postmaster_addData($data)
	  {
	  		$this->db2->insert('mail_account',$data);
	  }

	  function Dtable_email_postmaster_viewlist()
	  {
	  		$where = "username,type,comment,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("mail_account");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function A_email_postmaster_details($default_id)
	  {
	  		$select="SELECT * FROM `mail_account` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function A_email_postmaster_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('mail_account',$data);
	  }
	/* END */
	

	/* START TICKET STATE */
	  function TS_ticketState_addData($data)
	  {
	  		$this->db2->insert('ticket_state',$data);
	  }

	  function Dtable_ticketState_viewlist()
	  {
	  		$where = "state,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("ticket_state");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_ticketState_details($default_id)
	  {
	  		$select="SELECT * FROM `ticket_state` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_ticketState_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('ticket_state',$data);
	  }
	/* END */


	/* START TICKET STATE TYPE */
	  function TS_ticketStateType_addData($data)
	  {
	  		$this->db2->insert('ticket_state_type',$data);
	  }

	  function Dtable_ticketStateType_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("ticket_state_type");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_ticketStateType_details($default_id)
	  {
	  		$select="SELECT * FROM `ticket_state_type` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_ticketStateType_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('ticket_state_type',$data);
	  }
	/* END */


	/* START QUEUE */
	  function TS_queue_addData($data)
	  {
	  		$this->db2->insert('queue',$data);
	  }

	  function Dtable_queue_viewlist()
	  {
	  		$where = "name,group,validity,comment,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("queue");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_queue_details($default_id)
	  {
	  		$select="SELECT * FROM `queue` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_queue_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('queue',$data);
	  }
	/* END */


	function add_sm_sla($sm_sla,$other_id)
	{
		foreach ($sm_sla as $x) {
			$data = array("sla_id"=>$x,"service_id"=>$other_id,"Validity"=>"Valid");
			$this->db->insert('service_sla',$data);
		}
	}

	function update_sm_sla($sm_sla,$other_id)
	{
		$myArray = array();
		foreach ($sm_sla as $x) {
			$id = $x;
			// first add new if not exist
			$select = "SELECT COUNT(*) AS TOTAL FROM service_sla WHERE sla_id='$x' AND service_id='$other_id'";
			$query= $this->db->query($select);
	        if ($query->num_rows() >0){
	        	foreach ($query->result() as $data) {
	        		$total = $data->TOTAL;
	        		if($total>0){

	        		} else {
	        			$data = array("sla_id"=>$x,"service_id"=>$other_id,"Validity"=>"Valid");
						$this->db->insert('service_sla',$data);
	        		}
	        	}
	        }


			 $myArray[] = $x;
		}	
		$where_in = implode( ', ', $myArray );
		//exit();
		
		//second 
			$select = "SELECT sla_id FROM service_sla WHERE  sla_id NOT IN ($where_in) AND service_id='$other_id'";
			$query= $this->db->query($select);
	        if ($query->num_rows() >0){
	            foreach ($query->result() as $data) {
	            	$sla_not_in = $data->sla_id;
	            	$data = array("Validity"=>"Invalid");
	            	$where = $this->db->where("sla_id",$sla_not_in);
	            	$this->db->update("service_sla",$data);
	            }
	        } 
	    //update if not tick
	}


	function check_list_sla($service_id)
	{
		$getData = "SELECT sla_id FROM service_sla WHERE service_id='$service_id' AND Validity='Valid'";
		$query= $this->db->query($getData);
        if ($query->num_rows() >0){ 
        	//echo $id;
            foreach ($query->result() as $data) {
                # code...
                //echo $id;
                $result[] = $data;

            }
        //var_dump($result); exit();
        return $result; //hasil dari semua proses ada dimari
        } 
	}

	function check_customer_services($customerID)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM customer_services WHERE customerID='$customerID'";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}

	function customer_services_add($servicesid,$customerID)
	{	

		foreach ($servicesid as $x) {
			$data = array("CustomerID"=>$customerID,"ServiceID"=>$x,"Validity"=>"Valid");
			$this->db->insert("customer_services",$data);
		}
	}

	function customer_services_update($service_id,$customerID)
	{
		$myArray = array();
		foreach ($service_id as $x) {
			$id = $x;
			// first add new if not exist
			$select = "SELECT COUNT(*) AS TOTAL FROM customer_services WHERE ServiceID='$x' AND CustomerID='$customerID'";
			$query= $this->db->query($select);
	        if ($query->num_rows() >0){
	        	foreach ($query->result() as $data) {
	        		$total = $data->TOTAL;
	        		if($total>0){

	        		} else {
	        			$data = array("CustomerID"=>$customerID,"ServiceID"=>$x,"Validity"=>"Valid");
						$this->db->insert("customer_services",$data);
	        		}
	        	}
	        }


			 $myArray[] = $x;
		}	
		$where_in = implode( ', ', $myArray );
		//exit();
		
		//second 
			$select = "SELECT ServiceID FROM customer_services WHERE  ServiceID NOT IN ($where_in) AND CustomerID='$customerID'";
			$query= $this->db->query($select);
	        if ($query->num_rows() >0){
	            foreach ($query->result() as $data) {
	            	$sla_not_in = $data->ServiceID;
	            	$data = array("Validity"=>"Invalid");
	            	$where = $this->db->where("ServiceID",$sla_not_in);
	            	$this->db->update("customer_services",$data);
	            }
	        } 
	    //update if not tick
	}

	function check_list_cust_serv($custID)
	{
		$getData = "SELECT 	ServiceID FROM customer_services WHERE CustomerID='$custID' AND Validity='Valid'";
		$query= $this->db->query($getData);
        if ($query->num_rows() >0){ 
        	//echo $id;
            foreach ($query->result() as $data) {
                # code...
                //echo $id;
                $result[] = $data;

            }
        //var_dump($result); exit();
        return $result; //hasil dari semua proses ada dimari
        } 
	}


	function check_customeruser_location($customerUser)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM customeruser_location WHERE customerUser='$customerUser'";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}

	function customer_location_add($location_id,$customerUser)
	{	
		foreach ($location_id as $x) {
			$data = array("CustomerUser"=>$customerUser,"location_id"=>$x,"validity"=>"Valid");
			$this->db->insert("customeruser_location",$data);
		}
	}

	function customeruser_location_update($location_id,$customerUser)
	{

		if(!empty($location_id)){
			$myArray = array();
			foreach ($location_id as $x) {
				$id = $x;
				// first add new if not exist
				$select = "SELECT COUNT(*) AS TOTAL FROM customeruser_location WHERE location_id='$x' AND CustomerUser='$customerUser'";
				$query= $this->db->query($select);
		        if ($query->num_rows() >0){
		        	foreach ($query->result() as $data) {
		        		$total = $data->TOTAL;
		        		if($total>0){

		        		} else {
		        			$data = array("CustomerUser"=>$customerUser,"location_id"=>$x,"Validity"=>"Valid");
							$this->db->insert("customeruser_location",$data);
		        		}
		        	}
		        }


				 $myArray[] = $x;
			}	
			$where_in = implode( ', ', $myArray );
			//exit();
			
			//second 
				$select = "SELECT location_id FROM customeruser_location WHERE  location_id NOT IN ($where_in) AND CustomerUser='$customerUser'";
				$query= $this->db->query($select);
		        if ($query->num_rows() >0){
		            foreach ($query->result() as $data) {
		            	$sla_not_in = $data->location_id;
		            	$data = array("Validity"=>"Invalid");
		            	$where = $this->db->where("location_id",$sla_not_in);
		            	$this->db->update("customeruser_location",$data);
		            }
		        } 
		    //update if not tick
		} else {

				$data = array('Validity'=>'Invalid');
				$this->db->where('CustomerUser',$customerUser);
				$this->db->update('customeruser_location',$data);
		}
		
	}

	function check_list_cust_location($custID)
	{
		$getData = "SELECT 	location_id FROM customeruser_location WHERE CustomerUser='$custID' AND Validity='Valid'";
		$query= $this->db->query($getData);
        if ($query->num_rows() >0){ 
        	//echo $id;
            foreach ($query->result() as $data) {
                # code...
                //echo $id;
                $result[] = $data;

            }
        //var_dump($result); exit();
        return $result; //hasil dari semua proses ada dimari
        } 
	}


	function Dtable_SLA_ViewList_Valid()
	{
		$where = "sla,sla_id";

	  	$this->datatables->select($where);
		$this->datatables->from("sla");	
		$this->datatables->where("validity !=","Deleted");	//filter by not = Deleted
		$this->db->order_by("created", "desc");

		return $this->datatables->generate();
	}

	function Dtable_HideShow_ViewList($filter)
	{

		$this->datatables->set_database('default');

		$where = "a.title_form,a.controller,a.function,a.status_show,a.id";

	  	$this->datatables->select($where);
		$this->datatables->from("register_view a");
		$this->datatables->join('register_module b', 'b.name_register = a.controller', 'left');

		if(!empty($filter))
		{
			$this->datatables->where('a.controller',$filter);
		}

		return $this->datatables->generate();
	}		

	function update_title_view($id,$title)
	{
		$this->db4 = $this->load->database('default', TRUE);
		$this->db4->where('id',$id);
		$data = array('title_form'=>$title);
		$this->db4->update('register_view',$data);
	}

	function update_hideshow($id_view)
	{
		$this->db4 = $this->load->database('default', TRUE);
		$myArray = array();
		foreach ($id_view as $x) {
			$id = $x;
			// first add new if not exist
			$select = "	SELECT COUNT(*) AS TOTAL FROM register_view 
						WHERE id='$x' AND status_show='0'";
			$query= $this->db4->query($select);
	        if ($query->num_rows() >0){
	        	foreach ($query->result() as $data) {
	        		$total = $data->TOTAL;

	        		if($total>0){
	        			
	        			$data = array("status_show"=>"1");
	        			$this->db4->where("id",$id);
						$this->db4->update('register_view',$data);

	        		} else {
	        			
	        		}
	        	}
	        }


			 $myArray[] = $x;
		}	
		$where_in = implode( ', ', $myArray );
		//exit();
		
		//second 
			$select = "SELECT * FROM register_view WHERE id NOT IN ($where_in) ";
			$query= $this->db4->query($select);
	        if ($query->num_rows() >0){
	            foreach ($query->result() as $data) {
	            	$id = $data->id;
	            	$data = array("status_show"=>"0");
        			$this->db4->where("id",$id);
					$this->db4->update('register_view',$data);
	            }
	        } 
	    //update if not tick
	}

	function check_list_hideshow()
	{
		$this->db4 = $this->load->database('default', TRUE);
		$getData = "SELECT id FROM register_view WHERE status_show='1'";
		$query= $this->db4->query($getData);
        if ($query->num_rows() >0){ 
        	//echo $id;
            foreach ($query->result() as $data) {
                # code...
                //echo $id;
                $result[] = $data;

            }
        //var_dump($result); exit();
        return $result; //hasil dari semua proses ada dimari
        } 
	}
	

	/* START FAULT CATEGORY PORTION STATUS */
	  function TS_FaultCategoryPortion_addData($data)
	  {
	  		$this->db2->insert('faulty_category_portion',$data);
	  }

	  function Dtable_FaultCategoryPortion_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("faulty_category_portion");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_FaultCategoryPortion_details($default_id)
	  {
	  		$select="SELECT * FROM `faulty_category_portion` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_FaultCategoryPortion_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('faulty_category_portion',$data);
	  }
	/* END */



	/* START FAULT CATEGORY TYPE STATUS */
	  function TS_FaultCategoryType_addData($data)
	  {
	  		$this->db2->insert('faulty_category_type',$data);
	  }

	  function Dtable_FaultCategoryType_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("faulty_category_type");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_FaultCategoryType_details($default_id)
	  {
	  		$select="SELECT * FROM `faulty_category_type` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_FaultCategoryType_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('faulty_category_type',$data);
	  }
	/* END */



	/* START CAUSE  OF FAULT */
	  function TS_CauseOfFault_addData($data)
	  {
	  		$this->db2->insert('caused_of_fault',$data);
	  }

	  function Dtable_CauseOfFault_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";
            
		  	$this->datatables->select($where);
			$this->datatables->from("caused_of_fault");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");
			$this->datatables->group_by($where);

			return $this->datatables->generate();
	  }

	  function TS_CauseOfFault_details($default_id)
	  {
	  		$select="SELECT * FROM `caused_of_fault` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_CauseOfFault_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('caused_of_fault',$data);
	  }
	/* END */

	/* START PROBLEM DESCRIPTION */
	  function TS_ProblemDescription_addData($data)
	  {
	  		$this->db2->insert('problem_description',$data);
	  }

	  function Dtable_ProblemDescription_viewlist()
	  {
	  		$where = "name,validity,changed,created,default_id";

		  	$this->datatables->select($where);
			$this->datatables->from("problem_description");	
			$this->datatables->where("validity !=","Deleted");	
			$this->db->order_by("created", "desc");

			return $this->datatables->generate();
	  }

	  function TS_ProblemDescription_details($default_id)
	  {
	  		$select="SELECT * FROM `problem_description` WHERE default_id='$default_id'";
		  	$query= $this->db->query($select);
		    if ($query->num_rows() >0){ 
		        foreach ($query->result() as $data) {
		            # code...
		            $result[] = $data;

		        }
		    return $result; //hasil dari semua proses ada dimari
		    } 
	  }

	  function TS_ProblemDescription_update($data,$default_id)
	  {
	  		$this->db2->where('default_id',$default_id);
		  	$this->db2->update('problem_description',$data);
	  }
	/* END */


	/* Group Management Agent */
	  function Dtable_Agent_ViewList_By_Group($group)
	  {
		  	$where = "userid,username,CONCAT(title_salutation,' ',first_name,' ',last_name) as first_name,email,last_login, changed, created,group_name";

		  	$this->datatables->select($where);
			$this->datatables->from("agent");	
			$this->datatables->where("validity !=","Deleted");	//filter by not = Deleted
			if(!empty($group)){
				$this->datatables->where("group_name",$group);	
			}
			$this->db->order_by("userid", "desc");

			return $this->datatables->generate();
	  }

	  function Dtable_Agent_LinkModule($group)
	  {
	  		$where = "name,id_group as id_customer,id_group as id_ticket,id_group as id_service,id_group as id_cmdb,id_group as id_report,id_group as id_admin,id_group as id_ppm_team,id_group as id_ppm_verify,id_group as id_ppm_endorse ,id_group as id_ppm_verify_network_server";

	  		#var_dump($where); exit();

		  	$this->datatables->select($where);
			$this->datatables->from("group");	
			$this->datatables->where("validity !=","Deleted");	//filter by not = Deleted
			$this->datatables->where("name",$group);	//filter by not = Deleted
			return $this->datatables->generate();
	  }


	  function add_link_module_customer($group,$id_customer)
	  {	
	  		$module = 'Customer';
	  		$id = $id_customer;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }



      function add_link_module_ticket($group,$id_ticket)
      {	
	  		$module = 'Ticket';
	  		$id = $id_ticket;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }
      function add_link_module_service($group,$id_service)
      {	
	  		$module = 'Service';
	  		$id = $id_service;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }
      function add_link_module_cmdb($group,$id_cmdb)
      {	
	  		$module = 'CMDB';
	  		$id = $id_cmdb;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }
      function add_link_module_report($group,$id_report)
      {	
	  		$module = 'Report';
	  		$id = $id_report;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }
      function add_link_module_admin($group,$id_admin)
	  {	
	  		$module = 'Admin';
	  		$id = $id_admin;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }



	  function add_link_module_ppm_team($group,$id_admin)
	  {	
	  		$module = 'PPM_TEAM';
	  		$id = $id_admin;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }


	  function add_link_module_ppm_verify($group,$id_admin)
	  {	
	  		$module = 'PPM_Verify';
	  		$id = $id_admin;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }


	  function add_link_module_ppm_endorse($group,$id_admin)
	  {	
	  		$module = 'PPM_Endorse';
	  		$id = $id_admin;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }


	  function add_link_module_ppm_verify_network_server($group,$id_admin)
	  {	
	  		$module = 'PPM_Verify_Network_Server';
	  		$id = $id_admin;
		  	
		  	if(empty($id)){
		  		$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Invalid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	
				    }
				}
		  	} else {
			  	$where = "	SELECT COUNT(*) AS TOTAL 
			  					FROM agent_module 
			  					WHERE module='$module' AND group_agent='$group' AND agent='$id'";
				$query = $this->db->query($where);
				if ($query->num_rows() >0){ 
				    foreach ($query->result() as $data) {
				    	$total = $data->TOTAL;
				    }

				    if($total>0){
				    	$this->db->where("group_agent",$group);
				    	$this->db->where("module",$module);
				    	$data = array("validity"=>"Valid");
				    	$this->db->update("agent_module",$data);
				    } else {
				    	$data = array("group_agent"=>$group,"module"=>$module,"validity"=>"Valid","agent"=>$id);
					    $this->db->insert("agent_module",$data);
				    	echo "Disini";
				    }
				}
			}
		  	
	  }

	  function check_list_module($group,$module)
	  {
			$getData = "SELECT 	agent FROM agent_module WHERE group_agent='$group' AND module='$module' AND validity='Valid'";

			//var_dump($getData); exit();
			$query= $this->db->query($getData);
		    if ($query->num_rows() >0){ 
			    	//echo $id;
			        foreach ($query->result() as $data) {
			            # code...
			            //echo $id;
			            $result[] = $data;

			        }
			    //var_dump($result); exit();
			    return $result; //hasil dari semua proses ada dimari
		    } 
	 }
	/* END */

	function check_email_existing($email)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM email_address WHERE email='$email'";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}


	function A_email_emailAddress_addData($data){
		$this->db->insert('email_address',$data);
	}

	function Dtable_email_emailAddress_viewlist()
	{
		$where = "id,email,display_name,queue,validity,comment,changed,created,default_id"; // set column mana nak tarik
	  	$this->datatables->select($where);
		$this->datatables->from("email_address"); //set database nama table
		$this->datatables->where("validity !=","Deleted");

		return $this->datatables->generate();
	}

	function A_email_emailAddress_details($default_id)
	{
		$getData = "SELECT 	* FROM email_address WHERE default_id='$default_id' ";
			$query= $this->db->query($getData);
		    if ($query->num_rows() >0){ 
			    	//echo $id;
			        foreach ($query->result() as $data) {
			            # code...
			            //echo $id;
			            $result[] = $data;

			        }
			    //var_dump($result); exit();
			    return $result; //hasil dari semua proses ada dimari
		    } 
	}

	function A_email_emailAddress_update($data,$default_id)
	{
	  	$this->db2->where('default_id',$default_id);
	  	$this->db2->update('email_address',$data);
	}
	
	function getname_by_id($id)
	{
			$getData = "SELECT 	DISTINCT first_name FROM customer_user WHERE other_id='$id' ";
			$query= $this->db->query($getData);
		    if ($query->num_rows() >0){ 
			    	//echo $id;
			        foreach ($query->result() as $data) {

			        	echo $data->first_name;

			        }
			}
	}

	function Admin_Severity_Add_Type($data)
	{
		$this->db->insert('severity',$data);
	}


	function Dtable_Severity_ViewList()
	{
			$where = "sev_name,sev_time,validity,created,id,changed";

	  	$this->datatables->select($where);
		$this->datatables->from("severity");	
		$this->datatables->where("validity !=","Deleted");	
		$this->db->order_by("created", "desc");

		return $this->datatables->generate();
	}


	function severity_details($servicestypeid)
	{
		$select="SELECT * FROM `severity` WHERE id='$servicestypeid'";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}

	function Admin_Severity_Update_Type($data,$severity_type_id)
	{
		
		$this->db->where('id',$severity_type_id);
		$this->db->update('severity',$data);
	}

	function SendNotice_Add($data)
	{
		$this->db->insert('net_send',$data);
	}

	function SendNotice_Add_Schedule($data)
	{
		$this->db->insert('net_send_reschedule',$data);
	}

	function Dtable_SendNotice_ViewList()
	{
			$where = "title,note,datetime,id";

	  	$this->datatables->select($where);
		$this->datatables->from("net_send");	
		$this->datatables->where("validity !=","Deleted");	
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}


	function Dtable_SendNotice_ViewList_Schedule()
	{
			$where = "title,note,datetime,id,date_schedule";

	  	$this->datatables->select($where);
		$this->datatables->from("net_send_reschedule");	
		$this->datatables->where("validity",NULL);	
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}

	function register_net_send($data)
	{
		$this->db->insert('net_send_user',$data);
	}

	function net_send_user($data)
	{
		$this->db->update('net_send_user',$data);
	}


	function check_net_send_agent_notice($COMP_Name)
	{
		$where = "	SELECT COUNT(*) AS TOTAL FROM net_send_user 
					WHERE computer_name='$COMP_Name' AND status=0
				 ";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}


	function get_net_send_agent_notice($COMP_Name)
	{
		$getData = "SELECT 	* FROM net_send_user as a 
					LEFT JOIN net_send as b ON a.id_note = b.generated_id
					WHERE a.computer_name='$COMP_Name' AND a.status=1";
		$query= $this->db->query($getData);
	    if ($query->num_rows() >0){ 
		    	//echo $id;
		        foreach ($query->result() as $data) {

		        	$title = $data->title;
		        	$note = $data->note;

		        	if(!empty($title)){
		        		$title = '<h3>'.$title.'</h3>';
		        	} else {
		        		$title = '';
		        	}

		        	if(!empty($note)){
		        		$note = '<p>'.$note.'</p>';
		        	} else {
		        		$note = '';
		        	}

		        	echo $title.$note;

		        }
		}
	}


	function net_send_agent_read_notice($data,$COMP_Name)
	{
		$this->db->where('computer_name',$COMP_Name);
		$this->db->update('net_send_user',$data);
	}
	

	function add_severity_sla($data)
	{
		$this->db->insert('sla_severity',$data);
	}

	function list_severity_sla($generated_id)
	{
		$getData = "
						SELECT * FROM sla_severity WHERE sla_generated_id='$generated_id'
				   ";
		$query= $this->db->query($getData);
	    if ($query->num_rows() >0){ 
		    	//echo $id;
		        foreach ($query->result() as $data) {

		        	$id = $data->id;
		        	$title = $data->title;
		        	$minute = $data->minute;

		        	echo '
		        			<tr><td><center>'.$title.'</center></td><td><center>'.$minute.'</center></td><td><center><span class="glyphicon glyphicon-trash" onclick="delete_list('.$id.')"></span></center></td></tr><tr>
		        		 ';

		        }
		}
	}

	function delete_data_list($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('sla_severity');
	}

	function Fault_Itsm_Add_Data($data)
	{
		$this->db->insert('fault_itsm_category',$data);
	}

	function Dtable_Fault_ITSM_viewlist()
	{
		$where = "name,validity,changed,created,id";

	  	$this->datatables->select($where);
		$this->datatables->from("fault_itsm_category");	
		$this->datatables->where("validity !=","Deleted");	
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}

	function Fault_ITSM_Details($id)
	{
		$select="SELECT * FROM fault_itsm_category WHERE id='$id'";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


	function Fault_Itsm_Update_Data($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('fault_itsm_category',$data);
	}


	function update_location_agent($data,$name_pc)
	{
		$this->db->where('name',$name_pc);
		$this->db->update('computer',$data);
	}

	function check_location_agent($name_pc)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM computer WHERE name='$name_pc' AND location IS NULL";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}

	function remoteComputer($data)
	{
		$this->db->insert('remote_activity',$data);
	}

	function get_ip_remote($name)
	{
		// $getData = "
		// 				SELECT ip_remote FROM remote_activity WHERE name_remote='$name' AND status = '0'
		// 		   ";

		// $getData = "
		// 				SELECT ip_remote FROM remote_activity WHERE name_remote='$name' AND status = '0'
		// 		   ";

		$getData = "
						SELECT ip_remote FROM remote_activity WHERE name_remote='$name' 
				   ";

		$query= $this->db->query($getData);
	    if ($query->num_rows() >0){ 
		    	//echo $id;
	    		$ip_remote = '';
		        foreach ($query->result() as $data) {

		        	$ip_remote = $data->ip_remote;

		        }

		        echo $ip_remote;
		}
	}

	function update_remote($ip,$name)
	{
		$data = array("status"=>"1");
    	$where = $this->db->where("name_remote",$name);
    	$where = $this->db->where("ip_remote",$ip);
    	$this->db->update("remote_activity",$data);
	}

	function Add_Announcement($data)
	{
		$this->db->insert('announcement',$data);
	}


	function Dtable_Announcement()
	{
		$where = "
					id,
					announcement,
					datetime
				 ";

	  	$this->datatables->select($where);
		$this->datatables->from("announcement");	
		$this->datatables->where("status","Valid");
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}
	
	function delete_data2($other_id,$nama_table,$where_column)
	{
			// $this->db2->where($where_column,$other_id);
	  	// $this->db2->delete($nama_table);
	  	$data = array('status'=>'Deleted');
		$this->db2->where($where_column,$other_id);
		$this->db2->update($nama_table,$data);
	}

	function Add_Calendar($data)
	{
		$this->db->insert('calendar',$data);
	}

	function Dtable_Calendar()
	{
		$where = "
					id,
					start_calendar,
					end_calendar,
					description,
					datetime
				 ";

	  	$this->datatables->select($where);
		$this->datatables->from("calendar");	
		$this->datatables->where("status","Valid");
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}

	function knowledgebase_add_data($data)
	{
		$this->db->insert('knowledgebase',$data);
	}

	function Knowledgebase_details($id)
	{
		$select="SELECT * FROM knowledgebase WHERE id_kb='$id'";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    	return $result; //hasil dari semua proses ada dimari
	    } 
	}

	function knowledgebase_update_data($data,$id_kb)
	{
		$this->db->where('id_kb',$id_kb);
		$this->db->update('knowledgebase',$data);
	}

	function Dtable_knowlegdebase($headline,$category)
	{
		if(!empty($headline)){
			$this->db->where('headline',$headline);
		}

		if(!empty($category)){
			$this->db->where('category',$category);
		}

		$where = "id,headline,category,update_by,update_date,id_kb";

	  	$this->datatables->select($where);
		$this->datatables->from("knowledgebase");	
		$this->db->order_by("update_date", "desc");
		return $this->datatables->generate();
	}

	function count_knowledgebase_by_search($headline,$category)
	{
		if(!empty($headline)){
			$headline = "headline = '".$headline."'";
		} else {
			$headline='';
		}

		if(!empty($category)){
			$category = "headline = '".$category."'";
		} else {
			$category='';
		}

		if((!empty($headline))||(!empty($category))) 
		{
			$where = 'WHERE';
		} else {
			$where = '';
		}


		$where = "SELECT COUNT(*) AS TOTAL FROM knowledgebase $where $headline $category";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}


	}


	function Dtable_list_computer($type)
	{
			$where = "CONCAT(code_reference, id_reference) as code,hostname,ppm_device,location,created_date,DATE_FORMAT(changed_date, '%d/%m/%Y %H:%i:%s') as changed_date,quarter,year,ppm_type,id_number,status";
		

	  	$this->datatables->select($where);
		$this->datatables->from("ppm_register");	

		// $this->datatables->where('ppm_type','Computer & Notebook');
		// $this->datatables->or_where('ppm_type','Server & Storage');

		$lst = array('Computer & Notebook','Server & Storage');
		$this->datatables->where_in('ppm_type',$lst);

		if($type=='Verified'){
			$this->datatables->where('status','Need Verify');
			$this->datatables->where('acknowledge',$this->session->userdata('first_name'));
		} else if($type=='Endorse'){
			$this->datatables->where('status','Endorse');
			$this->datatables->where('endorse',$this->session->userdata('first_name'));
		} else {
			
		} 

		return $this->datatables->generate();
	}


	function Dtable_list_computer_only($type)
	{
			$where = "CONCAT(code_reference, id_reference) as code,hostname,ppm_device,location,created_date,DATE_FORMAT(changed_date, '%d/%m/%Y %H:%i:%s') as changed_date,quarter,year,ppm_type,id_number,status";


	  	$this->datatables->select($where);
		$this->datatables->from("ppm_register");	

		// $this->datatables->where('ppm_type','Computer & Notebook');
		// $this->datatables->or_where('ppm_type','Server & Storage');

		$lst = array('Computer & Notebook','Server & Storage');
		$this->datatables->where('ppm_type','Computer & Notebook');

		if($type=='Verified'){
			$this->datatables->where('status','Need Verify');
			$this->datatables->where('acknowledge',$this->session->userdata('first_name'));
		} else if($type=='Endorse'){
			$this->datatables->where('status','Endorse');
			$this->datatables->where('endorse',$this->session->userdata('first_name'));
		} else {
			
		} 

		return $this->datatables->generate();
	}


	function Dtable_list_server_only($type)
	{
			$where = "CONCAT(code_reference, id_reference) as code,hostname,ppm_device,location,created_date,DATE_FORMAT(changed_date, '%d/%m/%Y %H:%i:%s') as changed_date,quarter,year,ppm_type,id_number,status";


	  	$this->datatables->select($where);
		$this->datatables->from("ppm_register");	

		// $this->datatables->where('ppm_type','Computer & Notebook');
		// $this->datatables->or_where('ppm_type','Server & Storage');

		
		$lst = array('Computer & Notebook','Server & Storage');
		$this->datatables->where('ppm_type','Server & Storage');

		if($type=='Verified'){
			$this->datatables->where('status','Need Verify');
			$this->datatables->where('acknowledge',$this->session->userdata('first_name'));
		} else if($type=='Endorse'){
			$this->datatables->where('status','Endorse');
			$this->datatables->where('endorse',$this->session->userdata('first_name'));
		} else {
			
		} 

		return $this->datatables->generate();
	}


	function Dtable_list_hardware($type)
	{
			$where = "CONCAT(code_reference, id_reference) as code,hostname,ppm_device,location,created_date,DATE_FORMAT(changed_date, '%d/%m/%Y %H:%i:%s') as changed_date,quarter,year,ppm_type,id_number,status";

	  	$this->datatables->select($where);
		$this->datatables->from("ppm_register");	

		$lst = array('Network','Printer & Scanner');
		$this->datatables->where_in('ppm_type',$lst);

		if($type=='Verified'){
			$this->datatables->where('status','Need Verify');
			$this->datatables->where('acknowledge',$this->session->userdata('first_name'));
		} else if($type=='Endorse'){
			$this->datatables->where('status','Endorse');
			$this->datatables->where('endorse',$this->session->userdata('first_name'));
		} else {
			
		} 

		return $this->datatables->generate();
	}



	function Dtable_list_network_only($type)
	{
			$where = "CONCAT(code_reference, id_reference) as code,hostname,ppm_device,location,created_date,DATE_FORMAT(changed_date, '%d/%m/%Y %H:%i:%s') as changed_date,quarter,year,ppm_type,id_number,status";

	  	$this->datatables->select($where);
		$this->datatables->from("ppm_register");	

		$lst = array('Network');
		$this->datatables->where_in('ppm_type',$lst);

		if($type=='Verified'){
			$this->datatables->where('status','Need Verify');
			$this->datatables->where('acknowledge',$this->session->userdata('first_name'));
		} else if($type=='Endorse'){
			$this->datatables->where('status','Endorse');
			$this->datatables->where('endorse',$this->session->userdata('first_name'));
		} else {
			
		} 

		return $this->datatables->generate();
	}


	function Dtable_list_printer_only($type)
	{
			$where = "CONCAT(code_reference, id_reference) as code,hostname,ppm_device,location,created_date,DATE_FORMAT(changed_date, '%d/%m/%Y %H:%i:%s') as changed_date,quarter,year,ppm_type,id_number,status";

	  	$this->datatables->select($where);
		$this->datatables->from("ppm_register");	

		$lst = array('Printer & Scanner');
		$this->datatables->where_in('ppm_type',$lst);

		if($type=='Verified'){
			$this->datatables->where('status','Need Verify');
			$this->datatables->where('acknowledge',$this->session->userdata('first_name'));
		} else if($type=='Endorse'){
			$this->datatables->where('status','Endorse');
			$this->datatables->where('endorse',$this->session->userdata('first_name'));
		} else {
			
		} 

		return $this->datatables->generate();
	}

	function check_id_ppm($code)
	{
		$this->db->where('code_reference',$code);
		$query =  $this->db->get('ppm_register')->result();
		foreach ($query as $data) 
		{
			return $data->id_reference;
		}
	}

	function check_code_ppm($id)
	{
		$this->db->where('id_number',$id);
		$query =  $this->db->get('ppm_register')->result();
		foreach ($query as $data) 
		{
			return $data->code_reference;
		}
	}


	function detail_ppm($id)
	{
		$select="
					SELECT * FROM `ppm2_activity`
					WHERE id='$id'";
		//var_dump($select); exit();
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


	function comment_user($id)
	{
		$output = '';
		$this->db->where('id_number',$id);
	    $query3 =  $this->db->get('ppm_comment')->result();
		foreach ($query3 as $data3) 
		{
			$comment = $data3->comment;
			$created_by = $data3->created_by;


			$comment_acknowledge = $data3->comment_acknowledge;
			$created_by_acknowledge = $data3->created_by_acknowledge;
			if(!empty($created_by_acknowledge)){
				$created_by_acknowledge =$this->get_name_by_userid($created_by_acknowledge);
			}



			$comment_verifier = $data3->comment_verifier;
			$created_by_verifier = $data3->created_by_verifier;
			if(!empty($created_by_verifier)){
				$created_by_verifier =$this->get_name_by_userid($created_by_verifier);
			}


			$comment_endorse = $data3->comment_endorse;
			$created_by_endorse = $data3->created_by_endorse;
			if(!empty($created_by_endorse)){
				$created_by_endorse =$this->get_name_by_userid($created_by_endorse);
			}


			$created_by = $this->get_responsible($id);
			$created_by_acknowledge = $this->get_acknowledge($id);


			if(!empty($comment)){
				$o1 = '<tr>
							<td>'.$created_by.' : '.$comment.'</td>
						</tr>';
			} else {
				$o1='';
			}


			if(!empty($comment_acknowledge)){
				$o2 = '<tr>
							<td>'.$created_by_acknowledge.' : '.$comment_acknowledge.'</td>
						</tr>';
			} else {
				$o2='';
			}



			if(!empty($comment_verifier)){
				$o3 = '<tr>
							<td>'.$created_by_verifier.' :'.$comment_verifier.'</td>
						</tr>';
			} else {
				$o3='';
			}



			if(!empty($comment_endorse)){
				$o4 = '<tr>
							<td>'.$created_by_endorse.' :'.$comment_endorse.'</td>
						</tr>';
			} else {
				$o4='';
			}


			


			$output = $o1.$o2.$o3.$o4;
			
		}

		return $output;
	}


	function get_acknowledge($id)
	{
		$data = '';
		$this->db->where('id_number',$id);
	    $query3 =  $this->db->get('ppm_register')->result();
		foreach ($query3 as $data3) 
		{
			$data = $data3->acknowledge;
		}

		return $data;
	}



	function get_responsible($id)
	{
		$data = '';
		$this->db->where('id_number',$id);
	    $query3 =  $this->db->get('ppm_register')->result();
		foreach ($query3 as $data3) 
		{
			$data = $data3->responsible;
		}

		return $data;
	}


	function get_name_by_userid($userid)
	{
		$first_name = '';
		$this->db->where('userid',$userid);
	    $query3 =  $this->db->get('agent')->result();
		foreach ($query3 as $data3) 
		{
			$first_name = $data3->first_name;
		}

		return $first_name;
	}


	function detail_computer($id)
	{
		$select="
					SELECT * FROM `ppm_register`
					LEFT JOIN ppm_computer_device ON ppm_computer_device.id_number =  ppm_register.id_number
					LEFT JOIN ppm_computer_checklist ON ppm_computer_checklist.id_number =  ppm_register.id_number
					LEFT JOIN ppm_comment ON ppm_comment.id_number  =  ppm_register.id_number
					WHERE ppm_register.id_number='$id'";
		//var_dump($select); exit();
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}

	function detail_server($id)
	{
		$select="
					SELECT * FROM `ppm_register`
					LEFT JOIN ppm_computer_device ON ppm_computer_device.id_number =  ppm_register.id_number
					LEFT JOIN ppm_server_checklist ON ppm_server_checklist.id_number =  ppm_register.id_number
					LEFT JOIN ppm_comment ON ppm_comment.id_number  =  ppm_register.id_number
					WHERE ppm_register.id_number='$id'";

		//var_dump($select); exit(); 

	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


	function detail_network($id)
	{
		$select="
					SELECT * FROM `ppm_register`
					LEFT JOIN ppm_hardware_device ON ppm_hardware_device.id_number =  ppm_register.id_number
					LEFT JOIN ppm_hardware_checklist ON ppm_hardware_checklist.id_number =  ppm_register.id_number
					LEFT JOIN ppm_comment ON ppm_comment.id_number  =  ppm_register.id_number
					WHERE ppm_register.id_number='$id'";


	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


	function detail_printer($id)
	{
		$select="
					SELECT * FROM `ppm_register`
					LEFT JOIN ppm_printer_device ON ppm_printer_device.id_number =  ppm_register.id_number
					LEFT JOIN ppm_printer_checklist ON ppm_printer_checklist.id_number =  ppm_register.id_number
					LEFT JOIN ppm_comment ON ppm_comment.id_number  =  ppm_register.id_number
					WHERE ppm_register.id_number='$id'";


	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


	function Dtable_Chat_List()
	{
	  	$where = "a.group_name,a.id_chat,a.created_date,b.first_name,a.public_key";

	  	$this->datatables->where('close','0');
	  	$this->datatables->select($where);
		$this->datatables->from("group_chat_register a");	
		$this->datatables->join('agent b', 'b.userid = a.owner', 'left');
		return $this->datatables->generate();
	}


	function check_group($group_key,$id_chat)
	{
	  	$where = "SELECT COUNT(*) AS TOTAL FROM group_chat_register WHERE group_key='$group_key' AND id_chat='$id_chat'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}


	function chat_check_member($userid,$id_chat)
	{
	  	$where = "SELECT COUNT(*) AS TOTAL FROM group_member WHERE userid='$userid' AND id_chat='$id_chat'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}


	function get_key_group($id_chat)
	{
		$this->db->where('id_chat',$id_chat);
		$query =  $this->db->get('group_chat_register')->result();
		foreach ($query as $data) 
		{
			return $data->group_key;
		}
	}

	function owner_group($id_chat)
	{
		$this->db->where('id_chat',$id_chat);
		$query =  $this->db->get('group_chat_register')->result();
		foreach ($query as $data) 
		{
			return $data->owner;
		}
	}



	function Dtable_Level()
	{
		$where = "
					id,
					level_name,
					level_description
				 ";

	  	$this->datatables->select($where);
		$this->datatables->from("lookup_level");	
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}



	function Dtable_Department()
	{
		$where = "
					id,
					department_name,
					level_name,
					department_description
				 ";

	  	$this->datatables->select($where);
		$this->datatables->from("lookup_department");	
		$this->db->order_by("id", "desc");

		return $this->datatables->generate();
	}


	function Get_Department($level)
	{
		$this->db->where('level_name',$level);
		$query =  $this->db->get('lookup_department')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->department_name.'">'.$data->department_name.'</option>';
			echo $select;
		}
	}


	function List_activity_workstation_Data($rowno,$rowperpage,$search)
	{
		$this->db->where('type',1);
		$this->db->order_by('id','desc');

		$this->db->select('*');
	    $this->db->from('ppm2_activity');

	    if($search != ''){
	      
					$this->db->like('activitiy_name', $search);

			   
					$this->db->or_like('description_activity', $search);

			   
					$this->db->or_like('type_ppm', $search);

			   
					$this->db->or_like('start_date', $search);

			   
					$this->db->or_like('end_date', $search);

			   
	    }


	    $this->db->limit($rowperpage, $rowno); 
	    $query = $this->db->get();
	 
	    return $query->result_array();
	}


	public function List_activity_workstation_Count($search = '') {

		$this->db->where('type',1);
	    $this->db->select('count(*) as allcount');
	    $this->db->from('ppm2_activity');
	 
	    if($search != ''){
	      
					$this->db->like('activitiy_name', $search);

			   
					$this->db->or_like('description_activity', $search);

			   
					$this->db->or_like('type_ppm', $search);

			   
					$this->db->or_like('start_date', $search);

			   
					$this->db->or_like('end_date', $search);

			   
	    }


	    $query = $this->db->get();
	    $result = $query->result_array();
	 
	    return $result[0]['allcount'];
	}



	function List_activity_server_Data($rowno,$rowperpage,$search)
	{
		$this->db->where('type',2);
		$this->db->order_by('id','desc');

		$this->db->select('*');
	    $this->db->from('ppm2_activity');

	    if($search != ''){
	      
					$this->db->like('activitiy_name', $search);

			   
					$this->db->or_like('description_activity', $search);

			   
					$this->db->or_like('type_ppm', $search);

			   
					$this->db->or_like('start_date', $search);

			   
					$this->db->or_like('end_date', $search);

			   
	    }


	    $this->db->limit($rowperpage, $rowno); 
	    $query = $this->db->get();
	 
	    return $query->result_array();
	}


	public function List_activity_server_Count($search = '') {

		$this->db->where('type',2);
	    $this->db->select('count(*) as allcount');
	    $this->db->from('ppm2_activity');
	 
	    if($search != ''){
	      
					$this->db->like('activitiy_name', $search);

			   
					$this->db->or_like('description_activity', $search);

			   
					$this->db->or_like('type_ppm', $search);

			   
					$this->db->or_like('start_date', $search);

			   
					$this->db->or_like('end_date', $search);

			   
	    }


	    $query = $this->db->get();
	    $result = $query->result_array();
	 
	    return $result[0]['allcount'];
	}





	function List_activity_network_Data($rowno,$rowperpage,$search)
	{
		$this->db->where('type',3);
		$this->db->order_by('id','desc');

		$this->db->select('*');
	    $this->db->from('ppm2_activity');

	    if($search != ''){
	      
					$this->db->like('activitiy_name', $search);

			   
					$this->db->or_like('description_activity', $search);

			   
					$this->db->or_like('type_ppm', $search);

			   
					$this->db->or_like('start_date', $search);

			   
					$this->db->or_like('end_date', $search);

			   
	    }


	    $this->db->limit($rowperpage, $rowno); 
	    $query = $this->db->get();
	 
	    return $query->result_array();
	}


	public function List_activity_network_Count($search = '') {

		$this->db->where('type',3);
	    $this->db->select('count(*) as allcount');
	    $this->db->from('ppm2_activity');
	 
	    if($search != ''){
	      
					$this->db->like('activitiy_name', $search);

			   
					$this->db->or_like('description_activity', $search);

			   
					$this->db->or_like('type_ppm', $search);

			   
					$this->db->or_like('start_date', $search);

			   
					$this->db->or_like('end_date', $search);

			   
	    }


	    $query = $this->db->get();
	    $result = $query->result_array();
	 
	    return $result[0]['allcount'];
	}


	function List_activity_details($id)
	{
		$select='SELECT * FROM ppm2_activity WHERE id='.$id.'';
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            
	            $result[] = $data;

	        }
	    	return $result;
	    } 
	}


	function data_workstation($rowno,$rowperpage,$search,$type_devices_find,$department_find,$ppm_id_find)
	{
		// $this->db->group_by('a.name,b.name');
		// $this->db->select('*');
	 //    $this->db->from('computer as a,hardware as b');

	 //    // $this->db->where_in('a.type', ['20','15','22','42','86']);
	    
	 //    if($search != ''){
	      
		// 	$this->db->like('a.name', $search);
		// 	$this->db->or_like('b.name', $search);
		// }

	 //    //$this->db->limit(10);
	 //    $this->db->limit($rowperpage, $rowno); 
	 //    $query = $this->db->get();
	 
	 //    return $query->result_array();

		if((!empty($department_find))||(!empty($department_find))){
			
		}

		$this->db->select("a.name, a.description, a.type, a.location");
	    $this->db->distinct();
	    $this->db->from("computer as a");
	    // $this->db->where_in("id",$model_ids);

	    if($search != ''){
			$this->db->or_like('a.name', $search);
		}


		if($type_devices_find != ''){
			$this->db->or_like('a.type', $type_devices_find);
		}


		if($department_find != ''){
			$this->db->or_like('a.location', $department_find);
		}

	    $this->db->get(); 
	    $query1 = $this->db->last_query();

	    $this->db->select("name,description,type,location");
	    $this->db->distinct();
	    $this->db->from("hardware as b");
	    $this->db->limit($rowperpage, $rowno); 
	    // $this->db->where_in("id",$model_ids);

		if($search != ''){
			$this->db->or_like('b.name', $search);
		}


		if($type_devices_find != ''){
			$this->db->or_like('b.type', $type_devices_find);
		}


		if($department_find != ''){
			$this->db->or_like('b.location', $department_find);
		}

	    $this->db->get(); 
	    $query2 =  $this->db->last_query();
	    $query = $this->db->query($query1." UNION ".$query2);

	    


	    $return = $query->result_array();

	    return $return;
	}



	function count_workstation($search = '',$type_devices_find = '',$department_find='',$ppm_id_find='')
	{
		//$this->db->group_by('a.name');
		// $this->db->select('count(*) as allcount');
	 //    $this->db->from('computer as a,hardware as b');

	    

	    


	 //    $query = $this->db->get();
	 //    $result = $query->result_array();


		// $this->db->select('count(*) as allcount');
	 //    //$this->db->distinct();
	 //    $this->db->from("computer,hardware");
	 //    // $this->db->where_in("id",$model_ids);
	 //    $this->db->get(); 
	 //    $query1 = $this->db->last_query();

	 //    $query = $this->db->query($query1);
	 //    $result = $query->result_array();
	 //    $data = $result[0]['allcount'];

	    //var_dump($data); exit();
	    //var_dump($query); exit();
	    

	    // $this->db->select('count(*) as allcount');
	    // $this->db->distinct();
	    // $this->db->from("hardware");
	    // // $this->db->where_in("id",$model_ids);

	    // $this->db->get(); 
	    // $query2 =  $this->db->last_query();
	    // $query = $this->db->query($query1." UNION ".$query2);

	    // $result = $query->result_array();
	 
	    // return $result[0]['allcount'];





		$this->db->select('*');
		$this->db->from('computer');
		
		if($search != ''){

			$this->db->like('computer.name', $search);
		}

		if($type_devices_find != ''){
			$this->db->or_like('computer.type', $type_devices_find);
		}


		if($department_find != ''){
			$this->db->or_like('computer.location', $department_find);
		}

		$query1 = $this->db->get();
		$result1 = $query1->num_rows();

		$this->db->select('*');
		$this->db->from('hardware');

		if($search != ''){
			$this->db->or_like('hardware.name', $search);
		}


		if($type_devices_find != ''){
			$this->db->or_like('hardware.type', $type_devices_find);
		}


		if($department_find != ''){
			$this->db->or_like('hardware.location', $department_find);
		}
		
		$query2 = $this->db->get();
		$result2 = $query2->num_rows();

		$result = $result1+$result2;
		return $result;




	    //return $data;
	}



	function data_server($rowno,$rowperpage,$search)
	{

		if($search != ''){

			$this->db->like('computer.name', $search);
		}


		$this->db->select('*');
	    $this->db->from('computer');

	    $this->db->where_in('type', ['Server(Physical)','Server(Physical)','Storage']);

	    $this->db->limit($rowperpage, $rowno); 
	    //$this->db->limit($rowperpage, $rowno); 
	    $query = $this->db->get();
	 
	    return $query->result_array();
	}


	function count_server($search = '')
	{
		if($search != ''){

			$this->db->like('computer.name', $search);
		}


		$this->db->select('count(*) as allcount');
	    $this->db->from('computer');



	    $this->db->where_in('type', ['Server(Physical)','Server(Physical)','Storage']);

	    $query = $this->db->get();
	    $result = $query->result_array();
	 
	    return $result[0]['allcount'];
	}



	function data_network($rowno,$rowperpage,$search)
	{
		if($search != ''){

			$this->db->like('hardware.name', $search);
		}

		$this->db->select('*');
	    $this->db->from('hardware');

	    $this->db->where_not_in('type', ['Server(Physical)','Server(Physical)','Storage','Printer','Scanner']);

	    $this->db->limit($rowperpage, $rowno); 
	    //$this->db->limit($rowperpage, $rowno); 
	    $query = $this->db->get();
	 
	    return $query->result_array();
	}



	function count_network($search = '')
	{
		if($search != ''){

			$this->db->like('hardware.name', $search);
		}


		$this->db->select('count(*) as allcount');
	    $this->db->from('hardware');

	    $this->db->where_not_in('type', ['Server(Physical)','Server(Physical)','Storage','Printer','Scanner']);

	    $query = $this->db->get();
	    $result = $query->result_array();
	 
	    return $result[0]['allcount'];
	}



	function check_ppm_register($id,$name)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM ppm_register WHERE 	type_ppm_activity='$id' AND hostname='$name'";
		//var_dump($where); exit();
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}


	function get_id_number_ppm($id,$name)
	{
		$where = "SELECT id_number FROM ppm_register WHERE 	type_ppm_activity='$id' AND hostname='$name' ";
		$query = $this->db2->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->id_number;
		    }
		} else {
			return '';
		}
	}



	function user_data_workstation($rowno,$rowperpage,$search,$type_devices_find,$department_find,$ppm_id_find,$user,$type,$department,$status)
	{
		$this->db->select('*');
	    $this->db->from('ppm_register');

	    // $this->db->where_in('a.type', ['20','15','22','42','86']);
	    
	    if($search != ''){
	      
			$this->db->like('hostname', $search);
		}


		if($type != ''){

			$this->db->where('ppm_device', $type);
		}


		if($department != ''){

			$this->db->like('department', $department);
		}


		if($status != ''){
			$this->db->like('status_ppm', $status);
		}

		$this->db->where('status_ppm !=', 'Performed');


		// if($user != ''){
	 //      	$user = hex2bin($user);
		// 	$this->db->like('acknowledge', $user);
		// }


		// var_dump($user);exit();
		$user = hex2bin($user);
		//var_dump($ppm_id_find);exit();
		$this->db->where('acknowledge',$user);
		$this->db->where('type_ppm_activity',$ppm_id_find);

	    //$this->db->limit(10);
	    $this->db->limit($rowperpage, $rowno); 
	    $query = $this->db->get();
	 
	    return $query->result_array();
	}



	function user_count_workstation($search = '',$type_devices_find = '',$department_find='',$ppm_id_find='',$user='',$type='',$department='',$status='')
	{
		if($search != ''){

			$this->db->like('hostname', $search);
		}


		if($type != ''){

			$this->db->where('ppm_device', $type);
		}


		if($department != ''){
			$this->db->like('department', $department);
		}


		if($status != ''){
			$this->db->like('status_ppm', $status);
		}

		// if($user != ''){
	 //      	$user = hex2bin($user);
		// 	$this->db->like('acknowledge', $user);
		// }


		$this->db->where('status_ppm !=', 'Performed');


		$user = hex2bin($user);
		$this->db->where('acknowledge',$user);
		$this->db->where('type_ppm_activity',$ppm_id_find);

		$this->db->select('count(*) as allcount');
	    $this->db->from('ppm_register');

	    $query = $this->db->get();
	    $result = $query->result_array();
	 
	    return $result[0]['allcount'];
	}


	// Fetch records
	public function work_station_list_data_d($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find) {

			$this->db->select('*');
			$this->db->from('ppm_register');
			$this->db->order_by('id','desc');
			$this->db->where('type_ppm_activity',$ppm_id);

			if(!empty($search_text)){
				$this->db->like('hostname',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('ppm_device',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('department',$department_find);
			}

			if(!empty($status_find)){
				//var_dump($status_find); exit();
				$this->db->where('status_ppm',$status_find);
			}

			if(!empty($user_find)){
				//var_dump($status_find); exit();
				$this->db->like('acknowledge',$user_find);
			}





			//$this->db->group_by('parentsku');
			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			return $query->result_array();
	}

	// Select total records
	public function work_station_list_data_c($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find) {
		
		// $this->db->select('count(*) as allcount');
		// $this->db->from('product');
		// $this->db->group_by('categoryid');
		// $query = $this->db->get();
		// $result = $query->result_array();

		// return $result[0]['allcount'];

		if(!empty($search_text)){
			$this->db->like('hostname',$search_text);
		}


		if(!empty($type_devices_find)){
			$this->db->where('ppm_device',$type_devices_find);
		}

		if(!empty($department_find)){
			$this->db->where('department',$department_find);
		}
		


		if(!empty($status_find)){
			$this->db->where('status_ppm',$status_find);
		}


		if(!empty($user_find)){
			//var_dump($status_find); exit();
			$this->db->like('acknowledge',$user_find);
		}


		//$this->db->group_by('parentsku');
		$this->db->where('type_ppm_activity',$ppm_id);
		$query = $this->db->get('ppm_register');
		return  $query->num_rows();  //Return total no. of rows here
	}


	public function server_list_data_d($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find) {

			$this->db->select('*');
			$this->db->from('ppm_register');
			$this->db->order_by('id','desc');
			$this->db->where('type_ppm_activity',$ppm_id);

			if(!empty($search_text)){
				$this->db->like('hostname',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('ppm_device',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}

			if(!empty($status_find)){
				//var_dump($status_find); exit();
				$this->db->where('status_ppm',$status_find);
			}

			if(!empty($user_find)){
				//var_dump($status_find); exit();
				$this->db->like('acknowledge',$user_find);
			}


			//$this->db->group_by('parentsku');
			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			return $query->result_array();
	}

	// Select total records
	public function server_list_data_c($ppm_id,$search_text,$type_devices_find,$department_find,$status_find,$user_find) {
		
		// $this->db->select('count(*) as allcount');
		// $this->db->from('product');
		// $this->db->group_by('categoryid');
		// $query = $this->db->get();
		// $result = $query->result_array();

		// return $result[0]['allcount'];

		if(!empty($search_text)){
			$this->db->like('hostname',$search_text);
		}


		if(!empty($type_devices_find)){
			$this->db->where('ppm_device',$type_devices_find);
		}

		if(!empty($department_find)){
			$this->db->where('location',$department_find);
		}
		


		if(!empty($status_find)){
			$this->db->where('status_ppm',$status_find);
		}


		if(!empty($user_find)){
			//var_dump($status_find); exit();
			$this->db->like('acknowledge',$user_find);
		}


		//$this->db->group_by('parentsku');
		$this->db->where('type_ppm_activity',$ppm_id);
		$query = $this->db->get('ppm_register');
		return  $query->num_rows();  //Return total no. of rows here
	}

	

	public function work_station_list_data_d_asset($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find) {

		if($status_find=='Not Yet'){
			// get id_already register
			$group_id = '';
			$this->db->where('type_ppm_activity',$ppm_id);
			$query =  $this->db->get('ppm_register')->result();
			foreach ($query as $data) 
			{
				$hostname = $data->hostname;
				$group_id .= $hostname.',';
			} 

			$group_id = rtrim($group_id,',');
			
			$this->db->select('*');
			$this->db->from('ppm_worksation_asset');

			$name = array();
			$name = explode(',', $group_id);

			//var_dump($name);

			$this->db->where_not_in('name',$name);


			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('department',$department_find);
			}


			


			$this->db->group_by('name');
			$this->db->order_by('name','asc');

			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			return $query->result_array();


		} else {

			$this->db->select('*');
			$this->db->from('ppm_worksation_asset');
			$this->db->group_by('name');
			$this->db->order_by('name','asc');

			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('department',$department_find);
			}

			//$this->db->group_by('parentsku');
			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			// var_dump($query); exit();
			return $query->result_array();

			//var_dump($query->result_array()); exit();

		}
	}

	// Select total records
	public function work_station_list_data_c_asset($ppm_id,$search_text,$type_devices_find,$department_find,$status_find) {
		
		// $this->db->select('count(*) as allcount');
		// $this->db->from('product');
		// $this->db->group_by('categoryid');
		// $query = $this->db->get();
		// $result = $query->result_array();

		// return $result[0]['allcount'];

		//QUERY 
		/*
			SELECT a.name,a.description,a.type,a.location,b.department FROM computer as a
			LEFT JOIN location as b ON b.name=a.location
			WHERE a.type IN ('Desktop','Laptop')
			UNION
			SELECT a.name,a.description,a.type,a.location,b.department FROM hardware as a
			LEFT JOIN location as b ON b.name=a.location
			WHERE a.type IN ('Printer','Scanner')

			DROP TABLE ppm_worksation_asset;
			CREATE TABLE ppm_worksation_asset (
			    name VARCHAR(255)  NOT NULL,
			    description VARCHAR(255) NULL,
			    type VARCHAR(255)  NOT NULL,
			    location VARCHAR(255)  NOT NULL,
			    department VARCHAR(255) NULL
			);



			INSERT INTO ppm_worksation_asset
			SELECT a.name,a.description,a.type,a.location,b.department FROM computer as a
			LEFT JOIN location as b ON b.name=a.location
			WHERE a.type IN ('Desktop','Laptop')
			UNION
			SELECT a.name,a.description,a.type,a.location,b.department FROM hardware as a
			LEFT JOIN location as b ON b.name=a.location
			WHERE a.type IN ('Printer','Scanner')



			INSERT INTO ppm_worksation_asset
			SELECT a.name,a.description,a.type,a.location,b.department FROM hardware as a LEFT JOIN location as b ON b.name=a.location WHERE a.type IN ('Card Reader')

		*/
		//END


		if($status_find=='Not Yet'){
			// get id_already register
			$group_id = '';
			$this->db->where('type_ppm_activity',$ppm_id);
			$query =  $this->db->get('ppm_register')->result();
			foreach ($query as $data) 
			{
				$hostname = $data->hostname;
				$group_id .= $hostname.',';
			} 

			$group_id = rtrim($group_id,',');
			

			$name = array();
			$name = explode(',', $group_id);

			//var_dump($name);

			$this->db->where_not_in('name',$name);


			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}


			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('department',$department_find);
			}
			$this->db->group_by('name');
			$query = $this->db->get('ppm_worksation_asset');
			return  $query->num_rows();  //Return total no. of rows here


		} else {

			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}


			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('department',$department_find);
			}
			$this->db->group_by('name');
			$query = $this->db->get('ppm_worksation_asset');
			return  $query->num_rows();  //Return total no. of rows here

		}
	}



	public function work_server_list_data_d_asset($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find) {

		if($status_find=='Not Yet'){
			// get id_already register

			$group_id = '';
			$this->db->where('type_ppm_activity',$ppm_id);
			$query =  $this->db->get('ppm_register')->result();
			foreach ($query as $data) 
			{
				$hostname = $data->hostname;
				$group_id .= $hostname.',';
			} 

			$group_id = rtrim($group_id,',');
			
			$this->db->select('*');
			$this->db->from('ppm_server_asset');

			$name = array();
			$name = explode(',', $group_id);

			//var_dump($name); exit();

			$this->db->where_not_in('name',$name);


			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}


			$this->db->group_by('name');
			$this->db->order_by('name','asc');

			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			// print_r($this->db->last_query());     
			// exit();

			return $query->result_array();


		} else {

			$this->db->select('*');
			$this->db->from('ppm_server_asset');
			$this->db->group_by('name');
			$this->db->order_by('name','asc');

			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}

			//$this->db->group_by('parentsku');
			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			return $query->result_array();

		}
		
	}

	// Select total records
	public function work_server_list_data_c_asset($ppm_id,$search_text,$type_devices_find,$department_find,$status_find) {
		
		// $this->db->select('count(*) as allcount');
		// $this->db->from('product');
		// $this->db->group_by('categoryid');
		// $query = $this->db->get();
		// $result = $query->result_array();

		// return $result[0]['allcount'];

		//QUERY 
		/*
			SELECT `name`,`description`,`type`,location FROM `computer` WHERE `type` IN ('Server(Physical)','Server(Virtual)','Storage')

			DROP TABLE ppm_server_asset;
			CREATE TABLE ppm_server_asset (
			    name VARCHAR(128)  NOT NULL,
			    description VARCHAR(128)  NOT NULL,
			    type VARCHAR(128)  NOT NULL,
			    location VARCHAR(128)  NOT NULL,
			    department VARCHAR(128)  NOT NULL,
			);



			INSERT INTO ppm_server_asset
			SELECT a.name,a.description,a.type,a.location,b.department FROM computer as a
			LEFT JOIN location as b ON b.name=a.location
			WHERE a.type IN
			('Server(Physical)','Server(Virtual)','Storage')
		*/
		//END

		if($status_find=='Not Yet'){
			// get id_already register
			$group_id = '';
			$this->db->where('type_ppm_activity',$ppm_id);
			$query =  $this->db->get('ppm_register')->result();
			foreach ($query as $data) 
			{
				$hostname = $data->hostname;
				$group_id .= $hostname.',';
			} 

			$group_id = rtrim($group_id,',');
			

			$name = array();
			$name = explode(',', $group_id);

			//var_dump($name);

			$this->db->where_not_in('name',$name);


			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}


			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}
			$this->db->group_by('name');
			$query = $this->db->get('ppm_server_asset');
			return  $query->num_rows();  //Return total no. of rows here


		} else {

			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}


			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}
			$this->db->group_by('name');
			$query = $this->db->get('ppm_server_asset');
			return  $query->num_rows();  //Return total no. of rows here

		}
	}




	public function work_network_list_data_d_asset($rowno,$rowperpage,$ppm_id,$search_text,$type_devices_find,$department_find,$status_find) {


		if($status_find=='Not Yet'){
			// get id_already register
			$group_id = '';
			$this->db->where('type_ppm_activity',$ppm_id);
			$query =  $this->db->get('ppm_register')->result();
			foreach ($query as $data) 
			{
				$hostname = $data->hostname;
				$group_id .= $hostname.',';
			} 

			$group_id = rtrim($group_id,',');
			
			$this->db->select('*');
			$this->db->from('ppm_network_asset');

			$name = array();
			$name = explode(',', $group_id);

			//var_dump($name);

			$this->db->where_not_in('name',$name);


			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}


			$this->db->group_by('name');
			$this->db->order_by('name','asc');

			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			return $query->result_array();


		} else {

			$this->db->select('*');
			$this->db->from('ppm_network_asset');
			$this->db->group_by('name');
			$this->db->order_by('name','asc');

			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}

			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}

			//$this->db->group_by('parentsku');
			$this->db->limit($rowperpage, $rowno);  
			$query = $this->db->get();

			return $query->result_array();

		}
	}

	// Select total records
	public function work_network_list_data_c_asset($ppm_id,$search_text,$type_devices_find,$department_find,$status_find) {
		
		// $this->db->select('count(*) as allcount');
		// $this->db->from('product');
		// $this->db->group_by('categoryid');
		// $query = $this->db->get();
		// $result = $query->result_array();

		// return $result[0]['allcount'];

		//QUERY 
		/*

			DROP TABLE ppm_network_asset;
			CREATE TABLE ppm_network_asset (
			    name VARCHAR(128)  NOT NULL,
			    description VARCHAR(128)  NOT NULL,
			    type VARCHAR(128)  NOT NULL,
			    location VARCHAR(128)  NOT NULL,
			    department VARCHAR(128)  NOT NULL
			);



			INSERT INTO ppm_network_asset
			SELECT a.name,a.description,a.type,a.location,b.department FROM hardware as a
			LEFT JOIN location as b ON b.name=a.location
			WHERE a.type IN
			('Switch','Load Balancer','Access Point','Controller','Firewall','UPS')
		*/
		//END

		if($status_find=='Not Yet'){
			// get id_already register
			$group_id = '';
			$this->db->where('type_ppm_activity',$ppm_id);
			$query =  $this->db->get('ppm_register')->result();
			foreach ($query as $data) 
			{
				$hostname = $data->hostname;
				$group_id .= $hostname.',';
			} 

			$group_id = rtrim($group_id,',');
			

			$name = array();
			$name = explode(',', $group_id);

			//var_dump($name);

			$this->db->where_not_in('name',$name);


			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}


			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}
			$this->db->group_by('name');
			$query = $this->db->get('ppm_network_asset');
			return  $query->num_rows();  //Return total no. of rows here


		} else {

			if(!empty($search_text)){
				$this->db->like('name',$search_text);
			}


			if(!empty($type_devices_find)){
				$this->db->where('type',$type_devices_find);
			}

			if(!empty($department_find)){
				$this->db->where('location',$department_find);
			}
			$this->db->group_by('name');
			$query = $this->db->get('ppm_network_asset');
			return  $query->num_rows();  //Return total no. of rows here

		}
	}



	function list_comment($id_number)
	{
		$select="SELECT * FROM ppm_comment WHERE id_number='$id_number'";

		//var_dump($select); exit();
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}



	function get_name_user($id)
	{
		$select="SELECT * FROM agent WHERE userid='$id'";

		//var_dump($select); exit();
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}




	function list_checkbox($id_number)
	{
		$select="SELECT * FROM ppm_list_checkbox WHERE id_number='$id_number'";

		//var_dump($select); exit();
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


}
