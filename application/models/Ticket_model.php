<?php if ( ! defined('BASEPATH')) exit('No direct script 
   access allowed');

	  class Ticket_model extends CI_Model
	  {
	  function __construct()
	  {
	    // Call the Model constructor
	    parent::__construct();
	  }

/* Start create new phone ticket */
		function CreateTicket_Phone_add($data)
		{
			//code simpan 
			$this->db2->insert("ticket_info",$data);
		}



		//fungsi update
		function UpdateDataTicket($data,$other_id)
		{
			//code update 
			$this->db->where("other_id",$other_id); //where id mana
		  	$this->db->update("ticket",$data); // nama DB
		}

		function update_status_mobile($id)
		{
			$data = array('status'=>'Pickup');
			//code update 
			$this->db->where("id",$id); //where id mana
		  	$this->db->update("ticket_mobile",$data); // nama DB
		}

		function SimpanData_CMDB_TicketType($data)
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


/* Start create new email ticket */
		function CreateEmail_Phone_add($data)
		{
			//code simpan 
			$this->db2->insert("ticket",$data);
		}

		//fungsi update
		function UpdateDataTicketEmail($data,$other_id)
		{
			//code update 
			$this->db2->where("other_id",$other_id); //where id mana
		  	$this->db2->update("ticket",$data); // nama DB
		}
/* END */
	
	function get_other_id($tp_ReferenceNo)
	{
		if(!empty($tp_ReferenceNo))
		{

			$id = '';

			// 
			$select = "
						SELECT a.lv_no as list,a.other_id as id
              			FROM network as a
    					WHERE a.lv_no = '$tp_ReferenceNo'
					  ";

			$query = $this->db->query($select);
        
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	              $id = $data->id;
	            }
	        }

	        

	        if(empty($id)){
				// 
				$select = "
							SELECT a.ps_no as list,a.other_id as id 
		              		FROM network as a 
		    				WHERE a.ps_no = '$tp_ReferenceNo'
						  ";

				$query = $this->db->query($select);
        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              $id = $data->id;
		            }
		        }
			}

			

			if(empty($id)){
				// 
				$select = "
							SELECT a.bs_no as list,a.other_id as id
		              		FROM network as a
		    				WHERE a.bs_no = '$tp_ReferenceNo'
						  ";

				$query = $this->db->query($select);
        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              $id = $data->id;
		            }
		        }
			}


			if(empty($id)){
				// 
				$select = "
							SELECT a.dq_no as list,a.other_id as id
		              		FROM network as a
		    				WHERE a.dq_no = '$tp_ReferenceNo'
						  ";

				$query = $this->db->query($select);
        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              $id = $data->id;
		            }
		        }
			}


			if(empty($id)){
				//
				$select = "
							SELECT a.service_number as list,a.other_id as id
		              		FROM network as a
		    				WHERE a.service_number = '$tp_ReferenceNo'
						  ";
			
				$query = $this->db->query($select);
        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              $id = $data->id;
		            }
		        }
			}


			if(empty($id)){
				//
				$select = "
							SELECT a.name as list,a.other_id as id
		              		FROM hardware as a
		    				WHERE a.name = '$tp_ReferenceNo'
						  ";
				
				$query = $this->db->query($select);
        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              $id = $data->id;
		            }
		        }
			}

			if(empty($id)){
				//
				$select = "
							SELECT a.name as list,a.other_id as id
		              		FROM computer as a
		    				WHERE a.name = '$tp_ReferenceNo'
						  ";


				$query = $this->db->query($select);
        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              $id = $data->id;
		            }
		        }

			}


			if(empty($id)){
				//
				$select = "
							SELECT a.serial_number as list,a.other_id as id
		              		FROM software as a
		    				WHERE a.serial_number = '$tp_ReferenceNo'
						  ";
			
			
				$query = $this->db->query($select);
        
		        if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              $id = $data->id;
		            }
		        }
			}


			echo $id;

		} 
	}

	function get_the_key($Location_ID)
	{
		$select="
					SELECT  
					DISTINCT a.CustomerID, a.SLA, a.Service,a.RegisterID,b.Location_ID, a.CAT
					FROM `cmdb_register_link` as a 
					LEFT JOIN cmdb_link_location as b ON b.RegisterID = a.RegisterID
					WHERE b.Location_ID = '$Location_ID'
				";

	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}

	function get_location($cat,$other_id)
	{
		if($cat=='Network'){
			$table = 'network';
		} else if($cat=='Software'){
			$table = 'software';
		} else if($cat=='Hardware'){
			$table = 'hardware';
		} else if($cat=='Computer'){
			$table = 'computer';
		}
		$select = 	"
						SELECT location FROM $table WHERE other_id='$other_id'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $location = $data->location;
              $location = trim($location, " ");
              echo $location;
            }
        }
	}

	function get_service($id)
	{
		$select = 	"
						SELECT service FROM service WHERE service_generated_id ='$id'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $service = $data->service;
              $service = trim($service, " ");
              echo $service;
            }
        }
	}

	function get_sla($id)
	{
		$select = 	"
						SELECT sla FROM sla WHERE sla_id ='$id'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $sla = $data->sla;
              $sla = trim($sla, " ");
              echo $sla;
            }
        }
	}

	//start 

	function get_location_user($ticket_id)
	{
		$select = 	"
						SELECT location FROM td_register_ticket WHERE id_ticket ='$ticket_id'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $location = $data->location;
              $location = trim($location, " ");
              echo $location;
            }
        }
	}
	

	function get_service_user($ticket_id)
	{
		$select = 	"
						SELECT service FROM td_register_ticket WHERE id_ticket ='$ticket_id'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $service = $data->service;
              $service = trim($service, " ");
              echo $service;
            }
        }
	}


	function get_sla_user($ticket_id)
	{
		$select = 	"
						SELECT sla FROM td_register_ticket WHERE id_ticket ='$ticket_id'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $sla = $data->sla;
              $sla = trim($sla, " ");
              echo $sla;
            }
        }
	}


	//end 

	function get_customer($id)
	{
		$select = 	"
						SELECT customerID FROM customer WHERE other_id ='$id' GROUP BY customerID
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $customerID = $data->customerID;
              $customerID = trim($customerID, " ");
              echo $customerID;
            }
        }
	}


	function get_customerID($id)
	{
		$select = 	"
						SELECT DISTINCT c.other_id,c.first_name FROM location as a 
                        LEFT JOIN customeruser_location as b ON b.location_id = a.other_id
                        LEFT JOIN customer_user as c ON c.other_id = b.CustomerUser
                        WHERE c.customerID = '$id' AND c.valid ='Valid'
                        GROUP BY a.name
						
					";
					
					//var_dump($select); exit();
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $customerID = $data->first_name;
              
               if(empty($customerID)){
                    
                 
                
               } else {
                  //$customerID = trim($customerID, " ");
                  $ID = $data->other_id;
                  echo '<option value="'.$ID.'">'.$customerID.'</option>';
                  
               }
              
              
              
            }
        } else {
            $select = 	"
    					SELECT DISTINCT c.other_id,c.first_name FROM location as a 
                        LEFT JOIN customeruser_location as b ON b.location_id = a.other_id
                        LEFT JOIN customer_user as c ON c.other_id = b.CustomerUser
                        WHERE c.valid ='Valid'
                        GROUP BY a.name
					
    				";
    				
                				//var_dump($select); exit();
        	$query = $this->db->query($select);
        	
        	if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                  $customerID = $data->first_name;
                  $ID = $data->other_id;
                  echo '<option value="'.$ID.'">'.$customerID.'</option>';
                }
    	
    	    } else {


    	    	$select = 	"
    					SELECT DISTINCT first_name,other_id FROM customer_user
                        WHERE valid ='Valid'
                        GROUP BY first_name
					
    				";
    				
                				//var_dump($select); exit();
	        	$query = $this->db->query($select);
	        	
	        	if ($query->num_rows() >0){ 
	                foreach ($query->result() as $data) {
	                  $other_id = $data->other_id;
	                  $first_name = $data->first_name;
	                  echo '<option value="'.$other_id.'">'.$first_name.'</option>';
	                }
	            }

    	    }
        }
	}

	function register_ticket($data)
	{
		$this->db->insert('td_register_ticket',$data);
	}

	function parent_note($data)
	{
		$this->db->insert('td_parent_note',$data);
	}

	function customerUser($data)
	{
		$this->db->insert('td_child_custuser',$data);
	}


	function customerUser2($custUser,$id_ticket)
	{
		//$this->db->insert('td_child_custuser',$data);
		$query = $this->db->query('INSERT td_child_custuser(custUser,id_ticket) VALUES ("'.$custUser.','.$id_ticket.'")');
	}

	function ticket_attachment($data)
	{
		$this->db->insert('td_child_attachment',$data);
	}


	/* Mobile */
	function Dtable_Ticket_Mobile()
	{
		$where = 'a.id,a.title,a.description,a.datetime,a.created_by,a.type_asset';
		$this->datatables->select($where);
		$this->datatables->from("ticket_mobile a");
		$this->db->order_by("a.id", "desc");
		return $this->datatables->generate();
	}

	function details_mobile($id)
	{
		$select="SELECT a.id,a.title,a.description,a.datetime,a.created_by,a.type_asset,b.first_name,b.email 
				 FROM ticket_mobile as  a 
				 LEFT JOIN customer_user as b ON a.created_by = b.username
				 WHERE a.id='$id'";
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
	/* End Mobile */

	function Dtable_Ticket($segment)
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

     //    CONCAT(
					// FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
					// MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
					// MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
					// as created_date,

		$where = "	a.status_lock,
					a.id_ticket as id_no ,
					b.title,a.status_ticket, a.current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket,a.ticket_responsibilty,a.fault_itsm_category as category";

	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');	
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');		
		$this->datatables->where('a.status_ticket !=',"closed");

		if(!empty($segment))
		{
			if($segment=='new')
			{
				$this->datatables->where('a.status_ticket',"new");
			}
			if($segment=='open')
			{
				$this->datatables->where('a.status_ticket',"open");
			}
			if($segment=='pending')
			{
				$this->datatables->where('a.status_ticket',"pending");
			}
		}

		$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function Dtable_Ticket_New()
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

     //    CONCAT(
					// FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
					// MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
					// MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
					// as created_date,

		$where = "	a.id_ticket as id_no ,
					b.title,a.status_ticket, a.current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket";

	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');	
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');		
		$this->datatables->where('a.status_ticket !=',"closed");
		$this->datatables->where('a.status_ticket',"new");
		$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function Dtable_Master_AllTicket()
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

     //    CONCAT(
					// FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
					// MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
					// MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
					// as created_date,

		$where = "	a.id_ticket as id_no ,
					b.title,a.status_ticket, a.current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket";

	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');	
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');		
		$this->datatables->where('a.status_ticket !=',"closed");
		$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function Dtable_Ticket_Queu($id_group)
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$where = "	a.status_lock,
					a.id_ticket as id_no ,
					b.title,a.status_ticket, 
					a.current_state,
					b.queu,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket,a.ticket_responsibilty,a.fault_itsm_category as category";

	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');	
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');	
		$this->datatables->where('b.queu !=',"");
		$this->datatables->where('a.status_ticket !=',"closed");
		if(!empty($id_group))
		{
			$this->datatables->where('b.queu',$id_group);
		}

		$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function Dtable_Ticket_Closed()
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$where = "	a.status_lock,
					a.id_ticket as id_no ,
					b.title,a.status_ticket, 
					a.current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					d.responsibility,
					a.id_ticket,a.fault_itsm_category as category";

	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');
		$this->datatables->join('td_ticket_closed d', 'a.id_ticket = d.id_ticket', 'left');		
		$this->datatables->where('a.status_ticket',"closed");	
		$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function check_ticket_note($type,$id_ticket)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM td_child_note WHERE id_ticket='$id_ticket' AND 	type_note='$type'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}

	function add_note($data)
	{
		$this->db->insert('td_child_note',$data);
	}

	function update_register_note($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update('td_register_ticket',$data);
	}

	function update_parent_note($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update('td_parent_note',$data);
	}

	function update_note_owner($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update('td_register_ticket',$data);
	}

	function update_note_responsible($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update('td_register_ticket',$data);
	}

	function getID_Customer($ticket_customer_id)
	{
		$select="SELECT other_id FROM customer WHERE customerID='$ticket_customer_id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$other_id = $data->other_id;
            	return $other_id;
            } 
        }
	}

	function add_custUser($data)
	{
		$this->db->insert("td_child_custuser",$data);
	}


	function list_custUser($id_ticket)
	{
		$select="	SELECT a.id,a.custUser,b.first_name
					FROM td_child_custuser as a
					LEFT JOIN customer_user as b ON b.other_id = a.custUser
					WHERE a.id_ticket='$id_ticket'
					GROUP BY a.id"
					;
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$id = $data->id;
              	$name = $data->first_name;
            	echo '
            			<tr>
			    			<td> '.$name.' </td>
			    			<td> <i class="fa fa-trash" aria-hidden="true" onclick="delete_custUser('.$id.');"></i> </td>
			    		</tr>
            		 ';
            } 
        }
	}


	function delete_custUser($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('td_child_custuser');
	}


	function ticket_closed($data)
	{
		$this->db->insert('td_ticket_closed',$data);
	}

	function start_ticket($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = 	"
						SELECT
						CONCAT(
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
						MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
						as created_date,
						created_date as time
						FROM td_register_ticket as a
						WHERE id_ticket='$id_ticket'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$created_date = $data->time;

              	$created_date = date("d-m-Y H:i:s", strtotime($created_date));
              	echo $created_date;
            }
        }
	}

	function start_ticket_master($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = 	"
						SELECT
						CONCAT(
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
						MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
						as created_date,
						created_date as time
						FROM ms_register_ticket as a
						WHERE id_ticket='$id_ticket'
					";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	echo $created_date = $data->time;

            }
        }
	}

	function total_time_ticket($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = 	"
						SELECT
						CONCAT(
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
						MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
						as created_date,
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24) AS HARI,
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24) AS JAM,
						MINUTE(TIMEDIFF(a.created_date, ".$current.")) AS MINIT,
						(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS minit
						FROM td_register_ticket as a
						WHERE id_ticket='$id_ticket'
					";
		$query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL_HARI = $data->HARI;
              	$TOTAL_JAM = $data->JAM;
              	$TOTAL_MINIT = $data->MINIT;


              	$seconds = $data->minit;
              	$hours = floor($seconds / 3600);
				$minutes = floor(($seconds / 60) % 60);
			    $seconds = $seconds % 60;

			    echo $hours.' : '.$minutes.' : '.$seconds;

            }
        } else {
        	echo '<span style="color:#18181840">No Record</span>';
        }
	}

	function total_time_ticket_master($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = 	"
						SELECT
						CONCAT(
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
						MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
						as created_date,
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24) AS HARI,
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24) AS JAM,
						MINUTE(TIMEDIFF(a.created_date, ".$current.")) AS MINIT,
						(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS minit
						FROM ms_register_ticket as a
						WHERE id_ticket='$id_ticket'
					";
		$query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL_HARI = $data->HARI;
              	$TOTAL_JAM = $data->JAM;
              	$TOTAL_MINIT = $data->MINIT;


              	$seconds = $data->minit;
              	$hours = floor($seconds / 3600);
				$minutes = floor(($seconds / 60) % 60);
			    $seconds = $seconds % 60;

			    echo $hours.' : '.$minutes.' : '.$seconds;

            }
        }
	}


	function pending_ticket($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = "SELECT COUNT(*) AS KIRA FROM td_count_pending WHERE id_ticket='$id_ticket'";
		$query = $this->db->query($select);
		if ($query->num_rows() >0){ 
        	$type_note = '';
        	$KIRA = '';
            foreach ($query->result() as $data) {
              	$KIRA = $data->KIRA;
            }
            if($KIRA>0){
          		
          		// get status now
          		$select = "SELECT status FROM td_count_pending WHERE id_ticket='$id_ticket'";
				$query = $this->db->query($select);
				if ($query->num_rows() >0){ 
		            foreach ($query->result() as $data) {
		              	$status = $data->status;
		            }

		            if($status=='pending'){
		            	//echo 'pending';
		            	if($KIRA=='1'){
		            		// check kalau takde lagi total time , amik date dekat 'td_count_pending'
		            		$select = "
		            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
		            					FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note='pending'
		            				  ";
							$query = $this->db->query($select);
							if ($query->num_rows() >0){ 
					            foreach ($query->result() as $data) {
					              	$minit = $data->minit;
					            }

					            $seconds = $minit;
				              	$hours = floor($seconds / 3600);
								$minutes = floor(($seconds / 60) % 60);
							    $seconds = $seconds % 60;

							    echo $hours.' : '.$minutes.' : '.$seconds;

					        }

		            	} else {
		            		// kalau pending amik total time + current date

		            		$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
		            		$query = $this->db->query($select);
							if ($query->num_rows() >0){ 
					            foreach ($query->result() as $data) {
					              	$minit_old = $data->total_minutes;
					            	
					            	$select = "
		            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
		            					FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note='pending'
		            				  ";
									$query = $this->db->query($select);
									if ($query->num_rows() >0){ 
							            foreach ($query->result() as $data) {
							              	$minit = $data->minit;
							            }

							            $total_minit =  $minit+$minit_old;
							            //echo $total_minit;
							            $seconds = $total_minit;
						              	$hours = floor($seconds / 3600);
										$minutes = floor(($seconds / 60) % 60);
									    $seconds = $seconds % 60;

									    echo $hours.' : '.$minutes.' : '.$seconds;
							        }
					            }
					        }
		            		
		            	}

		            } else if($status=='resume'){
		            	//echo 'resume';
		            	// kalau resume amik total time
		            	$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
		            		$query = $this->db->query($select);
						if ($query->num_rows() >0){ 
				            foreach ($query->result() as $data) {
				              	$minit_old = $data->total_minutes;
				            }
				            $seconds = $minit_old;
			              	$hours = floor($seconds / 3600);
							$minutes = floor(($seconds / 60) % 60);
						    $seconds = $seconds % 60;
				            echo $hours.' : '.$minutes.' : '.$seconds;
				        }

		            }
		        }

          	} else {
	        	echo '<span style="color:#18181840">No Record</span>';
	        }
        } 
	}

	function pending_ticket_master($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = "SELECT COUNT(*) AS KIRA FROM td_count_pending WHERE id_ticket='$id_ticket'";
		$query = $this->db->query($select);
		if ($query->num_rows() >0){ 
        	$type_note = '';
        	$KIRA = '';
            foreach ($query->result() as $data) {
              	$KIRA = $data->KIRA;
            }


            if($KIRA>0)
            {
              		
              		// get status now
              		$select = "SELECT status FROM td_count_pending WHERE id_ticket='$id_ticket'";
					$query = $this->db->query($select);
					if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              	$status = $data->status;
			            }

			            if($status=='pending'){
			            	//echo 'pending';
			            	if($KIRA=='1'){
			            		// check kalau takde lagi total time , amik date dekat 'td_count_pending'
			            		$select = "
			            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
			            					FROM ms_child_note WHERE id_ticket_master='$id_ticket' AND type_note='pending'
			            				  ";
								$query = $this->db->query($select);
								if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              	$minit = $data->minit;
						            }

						            $seconds = $minit;
					              	$hours = floor($seconds / 3600);
									$minutes = floor(($seconds / 60) % 60);
								    $seconds = $seconds % 60;

								    echo $hours.' : '.$minutes.' : '.$seconds;

						        }

			            	} else {
			            		// kalau pending amik total time + current date

			            		$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
			            		$query = $this->db->query($select);
								if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              	$minit_old = $data->total_minutes;
						            	
						            	$select = "
			            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
			            					FROM ms_child_note WHERE id_ticket_master='$id_ticket' AND type_note='pending'
			            				  ";
										$query = $this->db->query($select);
										if ($query->num_rows() >0){ 
								            foreach ($query->result() as $data) {
								              	$minit = $data->minit;
								            }

								            $total_minit =  $minit+$minit_old;
								            //echo $total_minit;
								            $seconds = $total_minit;
							              	$hours = floor($seconds / 3600);
											$minutes = floor(($seconds / 60) % 60);
										    $seconds = $seconds % 60;

										    echo $hours.' : '.$minutes.' : '.$seconds;
								        }
						            }
						        }
			            		
			            	}

			            } else if($status=='resume'){
			            	//echo 'resume';
			            	// kalau resume amik total time
			            	$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
			            		$query = $this->db->query($select);
							if ($query->num_rows() >0){ 
					            foreach ($query->result() as $data) {
					              	$minit_old = $data->total_minutes;
					              	$seconds = $minit_old;
					              	$hours = floor($seconds / 3600);
									$minutes = floor(($seconds / 60) % 60);
								    $seconds = $seconds % 60;

								    
					            }
					            echo $hours.' : '.$minutes.' : '.$seconds;
					        }

			            }
		        }

          	}

        }
	}

	function status_pendingresume($id_ticket)
	{

		$select = "SELECT type_note FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note !='first_level' AND type_note !='note' ORDER BY id ASC";
		//var_dump($select); exit();
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
        	$type_note = '';
            foreach ($query->result() as $data) {
              	$type_note = $data->type_note;
            }
            echo $type_note = trim($type_note);

        }
	}

	function add_activity_note($data)
	{
		$this->db->insert("td_pending_ticket",$data);
	}

	function add_register_pending($data)
	{
		$this->db->insert("td_total_pending",$data);
	}

	function check_total_pending($id_ticket)
	{
		$select = "SELECT total_minutes FROM td_total_pending WHERE id_ticket='$id_ticket'";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
        	$total_minutes = '0';
            foreach ($query->result() as $data) {
              	$total_minutes = $data->total_minutes;
            }
            return $total_minutes;
        }
	}

	function get_pending($id_ticket)
	{
		$select = "SELECT created_date FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note='pending'";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
        	$total_minutes = '0';
            foreach ($query->result() as $data) {
              	$created_date = $data->created_date;
            }
            return $created_date;
        }
	}

	function get_resume($id_ticket)
	{
		$select = "SELECT created_date FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note='resume'";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
        	$total_minutes = '0';
            foreach ($query->result() as $data) {
              	$created_date = $data->created_date;
            }
            return $created_date;
        }
	}


	function check_status_resume($id_ticket)
	{
		$select = "SELECT COUNT(*) AS TOTAL FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note='resume'";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
        	$TOTAL = '0';
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL;
            }
            return $TOTAL;
        }
	}

	function get_different_pending_resume($id_ticket,$get_pending,$get_resume)
	{

	}

	function update_total_pending($data,$id_ticket)
	{
		$this->db->where("id_ticket",$id_ticket);
		$this->db->update("td_total_pending",$data);
	}


	function count_pending_current_date($id_ticket)
	{

	}

	function Dtable_DetailTicket_ViewList($id_ticket)
	{
		$where = "a.id_ticket,a.type_state as type_note,a.id,a.created_date,b.first_name"; // set column mana nak tarik
	  	$this->datatables->select($where);
		$this->datatables->from("td_child_note a"); //set database nama table
		$this->datatables->join('agent b', 'a.created_by = b.userid', 'left');
		$this->datatables->where("id_ticket",$id_ticket);
		$this->db->order_by("a.id", "asc");
		return $this->datatables->generate();
	}

	function viewnote($id)
	{
		$select = "SELECT * FROM td_child_note WHERE id='$id'";
		$query = $this->db->query($select);
				        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	 
              	$text = $data->text_editor;
              	echo $editor = nl2br($text);
            }
        }
	}

	function view_all_state($id)
	{
		$total = 0;
		$select = "SELECT COUNT(*) AS TOTAL FROM td_child_note WHERE id_ticket='$id' ORDER BY id DESC";
		$query = $this->db->query($select);
		
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->TOTAL;
            }
        }	

		$select = "SELECT * FROM td_child_note WHERE id_ticket='$id' ORDER BY id DESC";
		$query = $this->db->query($select);
		
		$x = $total;
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$state = $data->type_state;
              	$date = $data->created_date;
              	$editor = $data->text_editor;
              	$editor = nl2br($editor);
              	
              	$id = $data->id;

              	echo '
              				<div class="panel-group">
							    <div class="panel panel-default">
							      <div class="panel-heading">
							        <h4 class="panel-title">
							          '.$x.') '.$state.'</a>
							          <span class="pull-right"> <i>'.$date.'</i> </span>
							        </h4>
							      </div>
							      <div id="collapse_'.$id.'" class="panel-collapse collapse in">
							        <div class="panel-body">
							        	'.$editor.'
							        </div>
							        
							      </div>
							    </div>
							</div>
              		 ';

              	$x--;
            }
        }
	}

	function pull_state($id)
	{
		$select = "SELECT * FROM td_register_ticket WHERE id_ticket='$id'";
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
        	$status_ticket ='';
            foreach ($query->result() as $data) {
              	$status_ticket = $data->status_ticket;
            }

            $select = "SELECT * FROM ticket_state WHERE state_type='$status_ticket'";
            $query = $this->db->query($select);
        	if ($query->num_rows() >0){ 
        		echo '<option value=""> -- Select State --</option>';
        		foreach ($query->result() as $data) {
	              	$state = $data->state;
	              	echo '<option value="'.$state.'"> '.$state.' </option>';
	            }
        	} 

        }
	}

	function pull_state_parameter($id)
	{
		$select = "SELECT * FROM ticket_state WHERE state_type='$id'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		echo '<option value=""> -- Select State --</option>';
    		foreach ($query->result() as $data) {
              	$state = $data->state;
              	echo '<option value="'.$state.'"> '.$state.' </option>';
            }
    	} 
	}

	function save_pending_time($data)
	{
		$this->db->insert("td_count_pending",$data);
	}

	function check_total_pending2($id_ticket)
	{
		$select = "SELECT COUNT(*) AS TOTAL FROM td_total_pending WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		foreach ($query->result() as $data) {
              	return $TOTAL = $data->TOTAL;
            }
    	}
	}

	function get_date_pending($id_ticket)
	{
		$select = "SELECT date FROM td_count_pending WHERE id_ticket='$id_ticket' AND status='pending'";
		$query = $this->db->query($select);
    	if ($query->num_rows() >0){
    		$date = ''; 
    		foreach ($query->result() as $data) {
              	$date = $data->date;
            }
            return $date;
    	}
	}

	function get_second_pending($date,$id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = 	"
						SELECT
						(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP('".$date."')) AS created_date
						FROM td_count_pending as a 
						WHERE id_ticket='$id_ticket'
					";

		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $created_date = $data->created_date;

            }
        }
	}

	function update_total_pending2($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update("td_total_pending",$data);
	}

	function add_total_pending($data)
	{
		$this->db->insert("td_total_pending",$data);
	}

	function get_ready_second($id_ticket)
	{
		$select = "SELECT total_minutes FROM td_total_pending WHERE id_ticket='$id_ticket'";
		$query = $this->db->query($select);
    	if ($query->num_rows() >0){
    		$date = ''; 
    		foreach ($query->result() as $data) {
              	$total_minutes = $data->total_minutes;
            }
            return $total_minutes;
    	}
	}


	function total_time_ticket2($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = 	"
						SELECT
						CONCAT(
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
						MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
						as created_date,
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24) AS HARI,
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24) AS JAM,
						MINUTE(TIMEDIFF(a.created_date, ".$current.")) AS MINIT,
						(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS minit
						FROM td_register_ticket as a
						WHERE id_ticket='$id_ticket'
					";
		$query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL_HARI = $data->HARI;
              	$TOTAL_JAM = $data->JAM;
              	$TOTAL_MINIT = $data->MINIT;


              	echo $seconds = round($data->minit, 2);
    //           	$hours = floor($seconds / 3600);
				// $minutes = floor(($seconds / 60) % 60);
			 //    $seconds = $seconds % 60;

			 //    echo $hours.' hours '.$minutes.' minutes ';

            }
        } else {
        	echo '<span style="color:#18181840">No Record</span>';
        }
	}

	function total_time_ticket2_master($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = 	"
						SELECT
						CONCAT(
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
						MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
						as created_date,
						FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24) AS HARI,
						MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24) AS JAM,
						MINUTE(TIMEDIFF(a.created_date, ".$current.")) AS MINIT,
						(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS minit
						FROM ms_register_ticket as a
						WHERE id_ticket='$id_ticket'
					";
		$query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL_HARI = $data->HARI;
              	$TOTAL_JAM = $data->JAM;
              	$TOTAL_MINIT = $data->MINIT;


              	
    //           	$hours = floor($seconds / 3600);
				// $minutes = floor(($seconds / 60) % 60);
			 //    $seconds = $seconds % 60;

			 //    echo $hours.' hours '.$minutes.' minutes ';

            }
            echo $seconds = $data->minit;
        }
	}


	function pending_ticket2($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = "SELECT COUNT(*) AS KIRA FROM td_count_pending WHERE id_ticket='$id_ticket'";
		$query = $this->db->query($select);
		if ($query->num_rows() >0){ 
        	$type_note = '';
            foreach ($query->result() as $data) {
              	$KIRA = $data->KIRA;

              	if($KIRA>0){
              		
              		// get status now
              		$select = "SELECT status FROM td_count_pending WHERE id_ticket='$id_ticket'";
					$query = $this->db->query($select);
					if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              	$status = $data->status;
			            }

			            if($status=='pending'){
			            	//echo 'pending';
			            	if($KIRA=='1'){
			            		// check kalau takde lagi total time , amik date dekat 'td_count_pending'
			            		$select = "
			            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
			            					FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note='pending'
			            				  ";
								$query = $this->db->query($select);
								if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              	$minit = $data->minit;
						            }

						            echo $seconds = $minit;
					    //           	$hours = floor($seconds / 3600);
									// $minutes = floor(($seconds / 60) % 60);
								 //    $seconds = $seconds % 60;

								 //    echo $hours.' hours '.$minutes.' minutes ';

						        }

			            	} else {
			            		// kalau pending amik total time + current date

			            		$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
			            		$query = $this->db->query($select);
								if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              	$minit_old = $data->total_minutes;
						            	
						            	$select = "
			            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
			            					FROM td_child_note WHERE id_ticket='$id_ticket' AND type_note='pending'
			            				  ";
										$query = $this->db->query($select);
										if ($query->num_rows() >0){ 
								            foreach ($query->result() as $data) {
								              	$minit = $data->minit;
								            }

								            $total_minit =  $minit+$minit_old;
								            //echo $total_minit;
								            echo $seconds = $total_minit;
							    //           	$hours = floor($seconds / 3600);
											// $minutes = floor(($seconds / 60) % 60);
										 //    $seconds = $seconds % 60;

										 //    echo $hours.' hours '.$minutes.' minutes ';
								        }
						            }
						        }
			            		
			            	}

			            } else if($status=='resume'){
			            	//echo 'resume';
			            	// kalau resume amik total time
			            	$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
			            		$query = $this->db->query($select);
							if ($query->num_rows() >0){ 
					            foreach ($query->result() as $data) {
					              	$minit_old = $data->total_minutes;
					              	echo $seconds = $minit_old;
					    //           	$hours = floor($seconds / 3600);
									// $minutes = floor(($seconds / 60) % 60);
								 //    $seconds = $seconds % 60;

								 //    echo $hours.' hours '.$minutes.' minutes ';
					            }
					        }

			            }
			        }

              	}
            }
        } else {
        	echo '<span style="color:#18181840">No Record</span>';
        }
	}

	function pending_ticket2_master($id_ticket)
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

		$select = "SELECT COUNT(*) AS KIRA FROM td_count_pending WHERE id_ticket='$id_ticket'";
		$query = $this->db->query($select);
		if ($query->num_rows() >0){ 
        	$type_note = '';
            foreach ($query->result() as $data) {
              	$KIRA = $data->KIRA;

              	if($KIRA>0){
              		
              		// get status now
              		$select = "SELECT status FROM td_count_pending WHERE id_ticket='$id_ticket'";
					$query = $this->db->query($select);
					if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              	$status = $data->status;
			            }

			            if($status=='pending'){
			            	//echo 'pending';
			            	if($KIRA=='1'){
			            		// check kalau takde lagi total time , amik date dekat 'td_count_pending'
			            		$select = "
			            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
			            					FROM ms_child_note WHERE id_ticket_master='$id_ticket' AND type_note='pending'
			            				  ";
								$query = $this->db->query($select);
								if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              	$minit = $data->minit;
						            }

						            echo $seconds = $minit;
					    //           	$hours = floor($seconds / 3600);
									// $minutes = floor(($seconds / 60) % 60);
								 //    $seconds = $seconds % 60;

								 //    echo $hours.' hours '.$minutes.' minutes ';

						        }

			            	} else {
			            		// kalau pending amik total time + current date

			            		$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
			            		$query = $this->db->query($select);
								if ($query->num_rows() >0){ 
						            foreach ($query->result() as $data) {
						              	$minit_old = $data->total_minutes;
						            	
						            	$select = "
			            					SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(created_date)) AS minit 
			            					FROM ms_child_note WHERE id_ticket_master='$id_ticket' AND type_note='pending'
			            				  ";
										$query = $this->db->query($select);
										if ($query->num_rows() >0){ 
								            foreach ($query->result() as $data) {
								              	$minit = $data->minit;
								            }

								            $total_minit =  $minit+$minit_old;
								            //echo $total_minit;
								            echo $seconds = $total_minit;
							    //           	$hours = floor($seconds / 3600);
											// $minutes = floor(($seconds / 60) % 60);
										 //    $seconds = $seconds % 60;

										 //    echo $hours.' hours '.$minutes.' minutes ';
								        }
						            }
						        }
			            		
			            	}

			            } else if($status=='resume'){
			            	//echo 'resume';
			            	// kalau resume amik total time
			            	$select = "SELECT * FROM  td_total_pending WHERE id_ticket='$id_ticket'";
			            		$query = $this->db->query($select);
							if ($query->num_rows() >0){ 
					            foreach ($query->result() as $data) {
					              	$minit_old = $data->total_minutes;
					    //           	$hours = floor($seconds / 3600);
									// $minutes = floor(($seconds / 60) % 60);
								 //    $seconds = $seconds % 60;

								 //    echo $hours.' hours '.$minutes.' minutes ';
					            }
					            echo $seconds = $minit_old;
					        }

			            }
			        }

              	}
            }
        }
	}

	function get_closed_date($id_ticket)
	{
		$select = "SELECT * FROM td_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$time = $data->created_date;
            }
            echo $time;
        } else {
        	echo '<span style="color:#18181840">No Record</span>';
        }
	}


	function get_closed_date_master($id_ticket)
	{
		$select = "SELECT * FROM ms_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$time = $data->created_date;
            }
            echo $time;
        }
	}


	function check_status($id_ticket)
	{
		$select = "SELECT COUNT(*) AS KIRA FROM td_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->KIRA;
            }
            echo $total;
        }
	}

	function check_status_master($id_ticket)
	{
		$select = "SELECT COUNT(*) AS KIRA FROM ms_ticket_closed WHERE id_ticket='$id_ticket'";
		//var_dump($select);
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->KIRA;
            }
            echo $total;
        }
	}

	function get_total_time($id_ticket)
	{
		$select = "SELECT total_time_closed as total FROM td_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->total;
            }
            echo $total;
        }
	}

	function get_total_time_master($id_ticket)
	{
		$select = "SELECT total_time_closed as total FROM ms_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->total;
            }
            echo $total;
        }
	}

	function get_pending_time($id_ticket)
	{
		$select = "SELECT pending_time_closed as total FROM td_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->total;
            }
            echo $total;
        }
	}

	function get_pending_time_master($id_ticket)
	{
		$select = "SELECT pending_time_closed as total FROM ms_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->total;
            }
            echo $total;
        }
	}

	function get_working_hour($id_ticket)
	{
		$select = "SELECT working_time_closed as total FROM td_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->total;
            }
            echo $total;
        }
	}

	function get_working_hour_master($id_ticket)
	{
		$select = "SELECT working_time_closed as total FROM ms_ticket_closed WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
    	if ($query->num_rows() >0){ 
    		$time = '';
    		foreach ($query->result() as $data) {
              	$total = $data->total;
            }
            echo $total;
        }
	}

	function ms_register_ticket($data)
	{
		$this->db->insert("ms_register_ticket",$data);
	}

	function ms_link_ticket($data)
	{
		$this->db->insert("ms_link_ticket",$data);
	}

	function Dtable_Ticket_Master()
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

     //    CONCAT(
					// FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
					// MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
					// MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
					// as created_date,

		$where = "	a.id_ticket as id_no ,
					a.subject as title,a.status_ticket, a.current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket";

	  	$this->datatables->select($where);
		$this->datatables->from("ms_register_ticket a");
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');		
		$this->datatables->where('a.status_ticket !=',"closed");
		$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function Dtable_Ticket_Master_Closed()
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

     //    CONCAT(
					// FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
					// MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
					// MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
					// as created_date,

		$where = "	a.id_ticket as id_no ,
					a.subject as title,a.status_ticket, a.type as current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket";

	  	$this->datatables->select($where);
		$this->datatables->from("ms_register_ticket a");
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');		
		$this->datatables->where('a.status_ticket',"closed");
		$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function ms_add_note($data)
	{
		$this->db->insert("ms_child_note",$data);
	}


	function Dtable_DetailTicket_ViewList_Master($id_ticket)
	{
		$where = "a.id_ticket_master as id_ticket,a.type_state as type_note,a.id,a.created_date,b.first_name"; // set column mana nak tarik
	  	$this->datatables->select($where);
		$this->datatables->from("ms_child_note a"); //set database nama table
		$this->datatables->join('agent b', 'a.created_by = b.userid', 'left');
		$this->datatables->where("id_ticket_master",$id_ticket);
		$this->db->order_by("a.id", "asc");
		return $this->datatables->generate();
	}

	function viewnote_master($id)
	{
		$select = "SELECT * FROM ms_child_note WHERE id='$id'";
		$query = $this->db->query($select);
				        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	echo $text = $data->text_editor;
            }
        }
	}

	function view_all_state_master($id)
	{
		$total = 0;
		$select = "SELECT COUNT(*) AS TOTAL FROM ms_child_note WHERE id_ticket_master='$id' ORDER BY id DESC";
		$query = $this->db->query($select);
		
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->TOTAL;
            }
        }	

		$select = "SELECT * FROM ms_child_note WHERE id_ticket_master='$id' ORDER BY id DESC";
		$query = $this->db->query($select);
		
		$x = $total;
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$state = $data->type_state;
              	$date = $data->created_date;
              	$editor = $data->text_editor;
              	$id = $data->id;

              	echo '
              				<div class="panel-group">
							    <div class="panel panel-default">
							      <div class="panel-heading">
							        <h4 class="panel-title">
							          '.$x.') '.$state.'</a>
							          <span class="pull-right"> <i>'.$date.'</i> </span>
							        </h4>
							      </div>
							      <div id="collapse_'.$id.'" class="panel-collapse collapse in">
							        <div class="panel-body">
							        	'.$editor.'
							        </div>
							        
							      </div>
							    </div>
							</div>
              		 ';

              	$x--;
            }
        }
	}


	function check_ticket_note_master($type,$id_ticket)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM ms_child_note WHERE id_ticket_master='$id_ticket' AND 	type_note='$type'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}

	function update_register_note_master($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update('ms_register_ticket',$data);
	}

	function pull_state_master($id)
	{
		$select = "SELECT * FROM ms_register_ticket WHERE id_ticket='$id'";
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
        	$status_ticket ='';
            foreach ($query->result() as $data) {
              	$status_ticket = $data->status_ticket;
            }

            $select = "SELECT * FROM ticket_state WHERE state_type='$status_ticket'";
            $query = $this->db->query($select);
        	if ($query->num_rows() >0){ 
        		echo '<option value=""> -- Select State --</option>';
        		foreach ($query->result() as $data) {
	              	$state = $data->state;
	              	echo '<option value="'.$state.'"> '.$state.' </option>';
	            }
        	} 

        }
	}


	function status_pendingresume_master($id_ticket)
	{

		$select = "SELECT type_note FROM ms_child_note WHERE id_ticket_master='$id_ticket' AND type_note !='first_level' ORDER BY id ASC";
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
        	$type_note = '';
            foreach ($query->result() as $data) {
              	$type_note = $data->type_note;
            }
            echo $type_note = trim($type_note);

        }
	}

	function update_note_owner_master($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update('ms_register_ticket',$data);
	}


	function update_note_responsible_master($data,$id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->update('ms_register_ticket',$data);
	}

	function ticket_closed_master($data)
	{
		$this->db->insert('ms_ticket_closed',$data);
	}


	function Add_ITSM_Master($data,$id_ticket)
	{
		//code update 
		$this->db->where("id_ticket",$id_ticket); //where id mana
	  	$this->db->update("ms_register_ticket",$data); // nama DB
	}

	function check_list_ticket($id)
	{
		$getData = "SELECT 	id_ticket_single FROM ms_link_ticket WHERE id_ticket_master='$id'";
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

	function add_link_master($id,$id_master)
	{
		foreach ($id as $id) 
		{

			$select = "SELECT COUNT(*) AS TOTAL FROM ms_link_ticket WHERE id_ticket_single='$id'";
			$query = $this->db->query($select);
	        if ($query->num_rows() >0){ 
	        	$status_ticket ='';
	            foreach ($query->result() as $data) {
	              	$total = $data->TOTAL;
	            }
	        } 
	        if($total>0){

	        } else {
	        	$data = array(
							"id_ticket_single"=>$id,
							"id_ticket_master"=>$id_master
						 );
				$this->db->insert("ms_link_ticket",$data);
	        }
			
		}
	}

	function delete_link_master($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("ms_link_ticket");
	}

	function add_all_note_single_ticket($html_link_content,$type,$datetime,$created_by,$id_noted,$type_state,$data2,$id_ticket)
	{
		$total ='';
		$select = "SELECT COUNT(*) AS TOTAL FROM ms_link_ticket WHERE id_ticket_master='$id_ticket'";
		$query = $this->db->query($select);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->TOTAL;
            }
        } 

        if($total>0)
        {

        	$select = "SELECT id_ticket_single FROM ms_link_ticket WHERE id_ticket_master='$id_ticket'";
			$query = $this->db->query($select);
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	              	$id_ticket_single = $data->id_ticket_single;

	              	$data = array
                    (
                        "id_ticket"=>$id_ticket_single,
                        "text_editor"=>$html_link_content,
                        "type_note"=>$type,
                        "created_date"=>$datetime,
                        "created_by"=>$created_by,
                        "id_noted"=>$id_noted,
                        "type_state"=>$type_state
                    );
	              	$add = $this->db->insert("td_child_note",$data);

	              	$this->db->where("id_ticket",$id_ticket_single);
	              	$add = $this->db->update("td_register_ticket",$data2);
	            }
	        } 

        } else {

        }
	}


	function Dtable_Ticket_Customer($input_1,$input_2)
	{

		$this->db2 = $this->load->database('otrs', TRUE);
		$this->datatables->set_database('otrs');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date  

		$where = "	
					SUM(CASE WHEN status_ticket = 'new' THEN 1 ELSE 0 END) as NEW_TICKET,
					SUM(CASE WHEN status_ticket = 'open' THEN 1 ELSE 0 END) as OPEN_TICKET,
					SUM(CASE WHEN status_ticket = 'pending' THEN 1 ELSE 0 END) as PENDING_TICKET,
					SUM(CASE WHEN status_ticket = 'closed' THEN 1 ELSE 0 END) as CLOSED_TICKET,
					custID
				 ";
		$this->db2->distinct();
	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		if(!empty($input_1)){
			$this->db->where('created_date <',$input_2);
			$this->db->where('created_date >',$input_1);
		}

		$this->datatables->group_by('custID');

		return $this->datatables->generate();
	}

	function Dtable_Ticket_Portion($input_1,$input_2)
	{

		$this->db2 = $this->load->database('otrs', TRUE);
		$this->datatables->set_database('otrs');

		$where = "	
					Portion, 
					COUNT(Portion) AS TOTAL
				 ";

	  	$this->datatables->select($where);
		$this->datatables->from("td_ticket_closed");
		if(!empty($input_1)){
			// $this->db->where('created_date <',$input_2);
			// $this->db->where('created_date >',$input_1);
			$where = "DATE(created_date) BETWEEN '$input_1' AND '$input_2'";

			$this->db->where($where);
		}
		$this->datatables->group_by('Portion');

		return $this->datatables->generate();
	}


	function count_less_1hour($input_1,$input_2)
	{
		$this->db2 = $this->load->database('otrs', TRUE);
		

		

		// SELECT 
		// COUNT(*) AS TOTAL
		// FROM td_register_ticket 
		// WHERE created_date Between 
		// subdate('2018-08-15 08:05:34', interval 1 hour) AND '2018-08-16 08:05:34'
		if($input_1){
			$select = "
							SELECT 
							COUNT(*) AS TOTAL
							FROM td_register_ticket 
							WHERE created_date Between 
							subdate('$input_2', interval 1 hour) AND '$input_2'
					  ";
		} else {
			$select = "
						SELECT 
						COUNT(*) AS TOTAL
						FROM td_register_ticket 
						WHERE created_date Between 
						subdate(current_timestamp, interval 1 hour) AND current_timestamp
					  ";
		}
		$query = $this->db2->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL;
              	echo "<tr><td> < 1 Hour </td> <td><center>".$TOTAL."</center></td> </tr>";
            }
        }
	}

	function count_1hour_4hour($input_1,$input_2)
	{
		// SELECT *
		// FROM td_register_ticket
		// WHERE created_date 
		// Between 
		// 	(now() - interval 4 hour) and (now() - interval 1 hour)
		$this->db2 = $this->load->database('otrs', TRUE);
		
		if($input_1){
			$select = "
							SELECT 
							COUNT(*) AS TOTAL
							FROM td_register_ticket 
							WHERE created_date Between 
							'$input_2' - INTERVAL 4 HOUR AND '$input_2' - INTERVAL 1 HOUR 
					  ";
		} else {

		$select = "
					SELECT 
					COUNT(*) AS TOTAL
					FROM td_register_ticket
					WHERE created_date 
					Between 
       				NOW() - INTERVAL 4 HOUR AND NOW() - INTERVAL 1 HOUR 

				  ";

		}

		$query = $this->db2->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL;
              	echo "<tr><td> 1 - 4 Hour </td> <td><center>".$TOTAL."</center></td> </tr>";
            }
        }

	}


	function count_4hour_24hour($input_1,$input_2)
	{
		$this->db2 = $this->load->database('otrs', TRUE);
		
		if($input_1){
			$select = "
							SELECT 
							COUNT(*) AS TOTAL
							FROM td_register_ticket 
							WHERE created_date Between 
							'$input_2' - INTERVAL 24 HOUR AND '$input_2' - INTERVAL 4 HOUR 
					  ";
		} else {

			$select = "
						SELECT 
						COUNT(*) AS TOTAL
						FROM td_register_ticket
						WHERE created_date 
						Between 
	       				NOW() - INTERVAL 24 HOUR AND NOW() - INTERVAL 4 HOUR


					  ";

		}

		$query = $this->db2->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL;
              	echo "<tr><td> 4 - 24 Hour </td> <td><center>".$TOTAL."</center></td> </tr>";
            }
        }
	}

	function count_more_24hour($input_1,$input_2)
	{
		$this->db2 = $this->load->database('otrs', TRUE);
		
		if($input_1){
			$select = "
							SELECT 
							COUNT(*) AS TOTAL
							FROM td_register_ticket 
							WHERE created_date > DATE_SUB('$input_2', INTERVAL 24 HOUR) 
					  ";
		} else {

			$select = "
						SELECT 
						COUNT(*) AS TOTAL
						FROM td_register_ticket 
						WHERE created_date > DATE_SUB(NOW(), INTERVAL 24 HOUR)
					  ";

		}

		$query = $this->db2->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL;
              	echo "<tr><td> > 24 Hour </td> <td><center>".$TOTAL."</center></td> </tr>";
            }
        }
	}


	function auto_ticket($data)
	{
		$this->db->insert('auto_email',$data);
	}
	
	function get_cust_user_link($id)
    {
        
    }
    
    
    function get_ref_num($get_ref_num)
    {
        $select = "SELECT * FROM td_register_ticket WHERE id_ticket='$get_ref_num'";
        $query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	echo $TOTAL = $data->ref_no;
              	
            }
        }
    }

    
    function checkSubject_Email($subject)
    {
        $where = "SELECT COUNT(*) AS TOTAL FROM td_parent_note WHERE title='$subject'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
    }
    
    
    function id_ticket_existing_by_subject($subject)
    {
        $select = "SELECT * FROM td_parent_note WHERE title='$subject'";
        $query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $data->id_ticket;
              	
            }
        }
    }
    
    function get_current_status($id_ticket)
    {
        $select = "SELECT * FROM td_register_ticket WHERE id_ticket='$id_ticket'";
        $query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	return $data->status_ticket;
              	
            }
        }
    }
	

	function get_lookup_severity($id)
	{
		$select = "SELECT * FROM sla as a  
				   LEFT JOIN sla_severity as b ON a.sla_generated_id = b.sla_generated_id
				   WHERE a.sla='$id'";
        $query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
			echo "<p class='font-small'>* Severity</p>
				  <select class='form-control' name='tp_severity' id='tp_severity' required='required'>
				  <option value=''>< Please Select ></option>";
            foreach ($query->result() as $data) {
              	
              	$id =  $data->id;
              	$title =  $data->title;
              	$minute =  $data->minute;

              	echo "<option value='".$id."'>".$title." - ".$minute." minute</option>";
              	
            }

            echo '</select>';
        }
	}


	function get_enviroment($get_ref_num)
	{
		$select = "SELECT * FROM td_register_ticket WHERE id_ticket='$get_ref_num'";
        $query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	echo $data->type_enviroment;
              	
            }
        }
	}

	function get_severity($id)
	{
		$select = "SELECT * FROM td_register_ticket WHERE id_ticket='$id'";
        $query = $this->db->query($select);
        
		if ($query->num_rows() >0){ 

			echo "<p class='font-small'>*Severity</p>
				  <select class='form-control' name='tp_severity' id='tp_severity' required='required'>
				  ";

            foreach ($query->result() as $data) {
              	$severity =  $data->severity;
              	
              	if(!empty($severity)){

              		$select = "SELECT * FROM sla_severity WHERE id='$severity'";
			        $query = $this->db->query($select);
			        
					if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {
			              	$id =  $data->id;
			              	$title =  $data->title;
			              	$minute =  $data->minute;
			              	$sla_generated_id = $data->sla_generated_id;
			            }

			            echo '<option value="'.$id.'">'.$title.' - '.$minute.' minute</option>';

			            $select = "SELECT * FROM sla_severity WHERE id != '$severity' AND sla_generated_id = '$sla_generated_id'";
				        $query = $this->db->query($select);
				        
						if ($query->num_rows() >0){ 
				            foreach ($query->result() as $data) {
				              	$id =  $data->id;
				              	$title =  $data->title;
				              	$minute =  $data->minute;
				              	$sla_generated_id = $data->sla_generated_id;

				              	echo '<option value="'.$id.'">'.$title.' - '.$minute.' minute</option>';

				            }
				        }


			        }

              	}

            }

            echo '</select>';
        }
	}


	function get_customerID_all()
	{
		$select = 	"
    					SELECT DISTINCT first_name,other_id FROM customer_user
                        WHERE valid ='Valid'
					
    				";
    				
                				//var_dump($select); exit();
    	$query = $this->db->query($select);
    	
    	if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $other_id = $data->other_id;
              $first_name = $data->first_name;
              echo '<option value="'.$first_name.'">'.$first_name.'</option>';
            }
        }
	}



	function get_customerID_name($id)
	{
		$select = 	"
						SELECT DISTINCT c.other_id,c.first_name FROM location as a 
                        LEFT JOIN customeruser_location as b ON b.location_id = a.other_id
                        LEFT JOIN customer_user as c ON c.other_id = b.CustomerUser
                        WHERE c.customerID = '$id' AND c.valid ='Valid'
                        GROUP BY a.name
						
					";
					
					//var_dump($select); exit();
		$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $customerID = $data->first_name;
              
               if(empty($customerID)){
                    
                 
                
               } else {
                  //$customerID = trim($customerID, " ");
                  $ID = $data->other_id;
                  echo '<option value="'.$customerID.'">'.$customerID.'</option>';
                  
               }
              
              
              
            }
        } else {
            $select = 	"
    					SELECT DISTINCT c.other_id,c.first_name FROM location as a 
                        LEFT JOIN customeruser_location as b ON b.location_id = a.other_id
                        LEFT JOIN customer_user as c ON c.other_id = b.CustomerUser
                        WHERE c.valid ='Valid'
                        GROUP BY a.name
					
    				";
    				
                				//var_dump($select); exit();
        	$query = $this->db->query($select);
        	
        	if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                  $customerID = $data->first_name;
                  $ID = $data->other_id;
                  echo '<option value="'.$customerID.'">'.$customerID.'</option>';
                }
    	
    	    } else {


    	    	$select = 	"
    					SELECT DISTINCT first_name,other_id FROM customer_user
                        WHERE valid ='Valid'
                        GROUP BY first_name
					
    				";
    				
                				//var_dump($select); exit();
	        	$query = $this->db->query($select);
	        	
	        	if ($query->num_rows() >0){ 
	                foreach ($query->result() as $data) {
	                  $other_id = $data->other_id;
	                  $first_name = $data->first_name;
	                  echo '<option value="'.$other_id.'">'.$first_name.'</option>';
	                }
	            }

    	    }
        }
	}

	function get_id_cu($tp_cu)
	{
		$select = 	'
    					SELECT DISTINCT first_name,other_id FROM customer_user
                        WHERE valid ="Valid" AND first_name="'.$tp_cu.'"
					
    				';
    				
                				//var_dump($select); exit();
    	$query = $this->db->query($select);
    	
    	if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              return $other_id = $data->other_id;
            }
        }
	}


	function pull_environment($id)
	{
		$select = 	"
    					SELECT type_enviroment FROM  td_register_ticket
                        WHERE id_ticket='$id'
					
    				";
    				
                				//var_dump($select); exit();
    	$query = $this->db->query($select);
    	
    	if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              echo $type_enviroment = $data->type_enviroment;
            }
        }
	}

	function deleteClosed($id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$this->db->delete('td_ticket_closed');
	}

	function get_sla_generated_id($sla)
	{
		$select = 	"
    					SELECT sla_generated_id FROM  sla
                        WHERE sla='$sla'
					
    				";
    				
                				//var_dump($select); exit();
    	$query = $this->db->query($select);
    	
    	if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              echo $sla_generated_id = $data->sla_generated_id;
            }
        }
	}

	function get_lookup_severity_by_gen_id($id_ticket)
	{

		$select = 	"
    					SELECT severity FROM  td_register_ticket
                        WHERE id_ticket='$id_ticket'
					
    				";
    				
                				//var_dump($select); exit();
    	$query = $this->db->query($select);
    	
    	if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $severity= $severity = $data->severity;
            }
        	
        	//echo 'x - '.$severity;

	        if(!empty($severity)){
	        	$this->db->where('id',$severity);
				$query =  $this->db->get('sla_severity')->result();
				foreach ($query as $data) 
				{
					$id =  $data->id;
		          	$title =  $data->title;
		          	$minute =  $data->minute;

		          	//echo "<option value='".$id."'>".$title." - ".$minute." minute</option>";

		          	echo $id;

					// $this->db->where('sla_generated_id !=',$id);
					// $query =  $this->db->get('sla_severity')->result();
					// foreach ($query as $data) 
					// {
					// 	$id =  $data->id;
			  //         	$title =  $data->title;
			  //         	$minute =  $data->minute;

			  //         	echo "<option value='".$id."'>".$title." - ".$minute." minute</option>";
					// }

				}
	        }

	    }

		
	}

	function get_all_severity_onchange($id)
	{
		$this->db->where('sla_generated_id',$id);
		$query =  $this->db->get('sla_severity')->result();
		echo '<option value="">-- Select Severity --</option>';
		foreach ($query as $data) 
		{
			$id =  $data->id;
          	$title =  $data->title;
          	$minute =  $data->minute;

          	echo "<option value='".$id."'>".$title." - ".$minute." minute</option>";

        }
	}

	function get_fault_itsm_cat($id_ticket)
	{
		$select = 	"
    					SELECT fault_itsm_category FROM  td_register_ticket
                        WHERE id_ticket='$id_ticket'
					
    				";
    				
                				//var_dump($select); exit();
    	$query = $this->db->query($select);
    	
    	if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              echo $data->fault_itsm_category;
            }
        }
	}


	function get_time_severity($severity)
	{
		$this->db->where('id',$severity);
		$query =  $this->db->get('sla_severity')->result();
		foreach ($query as $data) 
		{
			return $minute =  $data->minute;

		}
	}


	function get_start_ticket($id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			return $created_date =  $data->created_date;

		} 

		if(empty($data)){
			echo '<span style="color:#18181840">No Record</span>';
		}
	}

	function mail_type($id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$query =  $this->db->get('td_parent_note')->result();
		foreach ($query as $data) 
		{
			return $type =  $data->type;

		}
	}


	function mail_category($id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			return $problem_desc_itsm =  $data->problem_desc_itsm;

		}
	}


	function mail_subject($id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$query =  $this->db->get('td_parent_note')->result();
		foreach ($query as $data) 
		{
			return $title =  $data->title;

		}
	}

	function mail_responsible($Ticket_Closed_Responsible)
	{
		$this->db->where('first_name',$Ticket_Closed_Responsible);
		$query =  $this->db->get('agent')->result();
		foreach ($query as $data) 
		{
			return $email =  $data->email;

		}
	}

	function mail_customer_user($id_ticket)
	{
		$select = 	"
    					SELECT b.email FROM  td_child_custuser as a 
    					LEFT JOIN customer_user as b ON a.custUser = b.other_id
                        WHERE a.id_ticket='$id_ticket'
					
    				";
    				
                				//var_dump($select); exit();
    	$query = $this->db->query($select);
    	
    	if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              return $data->email;
            }
        }
	}


	function mail_location($id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			return $location =  $data->location;

		}
	}


	function mail_description($id_ticket)
	{
		$this->db->where('id_ticket',$id_ticket);
		$query =  $this->db->get('td_parent_note')->result();
		foreach ($query as $data) 
		{
			return $text_editor =  $data->text_editor;

		}
	}


	function email_status($data)
	{
		$this->db->insert("ticket_status_email",$data);
	}
	
	function Dtable_Ticket_Status_Email()
	{
		$where = 'a.datetime,a.status,a.subject,a.from_email,a.to_email,a.cc';
		$this->datatables->select($where);
		$this->datatables->from("ticket_status_email a");
		$this->db->order_by("a.id", "desc");
		return $this->datatables->generate();
	}


	function Dtable_Ticket_Search($ticket_number,$date1,$date2,$subject,$responsible,$current_state,$category)
	{

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date 

     //    CONCAT(
					// FLOOR(HOUR(TIMEDIFF(a.created_date, ".$current.")) / 24), ' days ',
					// MOD(HOUR(TIMEDIFF(a.created_date, ".$current.")), 24), ' hours ',
					// MINUTE(TIMEDIFF(a.created_date, ".$current.")), ' minutes')
					// as created_date,

		$where = "	a.id_ticket as id_no ,
					b.title,a.status_ticket, a.current_state,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.created_date)) AS created_date,
					(UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(a.updated_date))
					as updated_date,
					c.username as ticket_owner,
					a.id_ticket,a.ticket_responsibilty,a.fault_itsm_category as category";

	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');	
		$this->datatables->join('agent c', 'c.userid = a.created_by', 'left');		
		//$this->datatables->where('a.status_ticket !=',"closed");


		if(!empty($ticket_number))
		{
			$this->datatables->like('a.id_ticket',$ticket_number);
		}

		if(!empty($date1))
		{
			if(empty($date2)){
				$this->datatables->where('a.created_date',$date);
			} else {
				$this->datatables->where('a.created_date <',$date2);
				$this->datatables->where('a.created_date >',$date1);
			}
		}

		if(!empty($ticket_number))
		{
			$this->datatables->like('a.id_ticket',$ticket_number);
		}

		if(!empty($category))
		{
			$this->datatables->where('a.fault_itsm_category',$category);
		}


		if(!empty($responsible))
		{
			$this->datatables->where('a.ticket_responsibilty',$responsible);
		}

		if(!empty($current_state))
		{
			$this->datatables->where('a.current_state',$current_state);
		}

		if(!empty($subject))
		{
			$this->datatables->like('b.title',$subject);
		}

		//$this->db->order_by("a.id", "desc");

		return $this->datatables->generate();
	}

	function Get_Email($tp_cu)
	{
		$this->db->where('first_name',$tp_cu);
		$query =  $this->db->get('customer_user')->result();
		foreach ($query as $data) 
		{
			echo $email =  $data->email;

		}
	}

	function Get_Phone($tp_cu)
	{
		$this->db->where('first_name',$tp_cu);
		$query =  $this->db->get('customer_user')->result();
		foreach ($query as $data) 
		{
			echo $phone =  $data->phone;

		}
	}


	function update_email($tp_cu,$tp_email)
	{
		$data = array('email'=>$tp_email);
		$this->db->where("first_name",$tp_cu); //where id mana
		$this->db->update("customer_user",$data); // nama DB
	}

	function update_phone($tp_cu,$tp_phone)
	{
		$data = array('phone'=>$tp_phone);
		$this->db->where("first_name",$tp_cu); //where id mana
		$this->db->update("customer_user",$data); // nama DB
	}

	function calendar_data()
	{

		$where = "SELECT * FROM  nexticks_otrs.calendar WHERE status='Valid'";
		$query = $this->db->query($where);

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 

		echo "
					<script>
		    				$('#calendar').fullCalendar({
					          header: {
					            left: 'prev,next today',
					            center: 'title',
					            right: 'month,basicWeek,basicDay'
					          },
					          defaultDate: '".$datetime."',
					          navLinks: true, 
					          editable: true,
					          eventLimit: true, 
					          events: [
				 ";

		if ($query->num_rows() >0){ 

			

		    foreach ($query->result() as $character) {
		    		
		    		$id = $character->id;
		    		$title = $character->description;
		    		$start = $character->start_calendar;
		    		//$date = str_replace('/', '-', $var);
					//$start = date('Y-m-d', strtotime($date));

		    		$end = $character->end_calendar;
		    		//$date = str_replace('/', '-', $var);
					//$end = date('Y-m-d', strtotime($date));
		    		//$end = date("Y-m-d", strtotime($end) );

		    		echo "
		    				
					           {
						          title: '".$title."',
						          start: '".$start."',
						          end: '".$end."',
						          url: '".base_url()."dashboard/calendar_detail/".$id."'
						        },
		    			 ";	

		    }


		    
		}

		echo "
		    		]
					        });
					        </script>
		    	 ";
	}

	function detail_calendar($id)
	{
		$select="SELECT * FROM nexticks_otrs.calendar WHERE id='$id'";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


	//dashboard v2
	function Dashboardv2_Ticket_New($input_1,$input_2)
	{

		$this->db2 = $this->load->database('otrs', TRUE);
		$this->datatables->set_database('otrs');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date  


		// $where = "	
		// 			a.id_ticket,b.title,a.current_state,a.created_date
		// 		 ";

        $where = "	
					a.id_ticket,b.title
				 ";


	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');
		if(!empty($input_1)){
			$this->datatables->where('a.created_date <',$input_2);
			$this->datatables->where('a.created_date >',$input_1);
		}

		$this->datatables->where('a.status_ticket','new');

		$this->datatables->group_by('a.id_ticket');

		return $this->datatables->generate();
	}


	function Dashboardv2_Ticket_Open($input_1,$input_2)
	{

		$this->db2 = $this->load->database('otrs', TRUE);
		$this->datatables->set_database('otrs');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date  


		// $where = "	
		// 			a.id_ticket,b.title,a.current_state,a.created_date
		// 		 ";

        $where = "	
					a.id_ticket,b.title
				 ";


	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');
		if(!empty($input_1)){
			$this->datatables->where('a.created_date <',$input_2);
			$this->datatables->where('a.created_date >',$input_1);
		}

		$this->datatables->where('a.status_ticket','open');

		$this->datatables->group_by('a.id_ticket');

		return $this->datatables->generate();
	}

	function Dashboardv2_Ticket_Closed($input_1,$input_2)
	{

		$this->db2 = $this->load->database('otrs', TRUE);
		$this->datatables->set_database('otrs');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date  


		// $where = "	
		// 			a.id_ticket,b.title,a.current_state,a.created_date
		// 		 ";

        $where = "	
					a.id_ticket,b.title
				 ";


	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		$this->datatables->join('td_parent_note b', 'a.id_ticket = b.id_ticket', 'left');
		if(!empty($input_1)){
			$this->datatables->where('a.created_date <',$input_2);
			$this->datatables->where('a.created_date >',$input_1);
		}

		$this->datatables->where('a.status_ticket','closed');

		$this->datatables->group_by('a.id_ticket');

		return $this->datatables->generate();
	}

	function Dashboardv2_Ticket_Problem($input_1,$input_2)
	{

		$this->db2 = $this->load->database('otrs', TRUE);
		$this->datatables->set_database('otrs');

		date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $current = "'".$dateReg.' '.$timeReg."'"; //current date  


		// $where = "	
		// 			a.id_ticket,b.title,a.current_state,a.created_date
		// 		 ";

        $where = "	
					COUNT(a.problem_desc_itsm) AS total,a.problem_desc_itsm,a.created_date
				 ";

		
	  	$this->datatables->select($where);
		$this->datatables->from("td_register_ticket a");
		if(!empty($input_1)){
			$this->datatables->where('a.created_date <',$input_2);
			$this->datatables->where('a.created_date >',$input_1);
		}

		$this->datatables->group_by('a.problem_desc_itsm');

		return $this->datatables->generate();
	}
	//end

	function filter_responsible($group)
	{
		$this->db->where('validity','Valid');
		$this->db->where('group_name',$group);
		$this->db->order_by('first_name','asc');
		$query =  $this->db->get('agent')->result();
		echo '<option value="">< Please Select ></option>';
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
			echo $select;
		}
	}



	function view_case($id)
	{
		$total = 0;
		$select = "SELECT COUNT(*) AS TOTAL FROM td_child_note WHERE id_ticket='$id' ORDER BY id DESC";
		$query = $this->db->query($select);
		
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->TOTAL;
            }
        }	

		$select = "SELECT * FROM td_child_note WHERE id_ticket='$id' ORDER BY id DESC";
		$query = $this->db->query($select);
		
		$x = $total;
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$state = $data->type_state;
              	$date = $data->created_date;
              	$editor = $data->text_editor;
              	$editor = nl2br($editor);
              	
              	$id = $data->id;

              	$owner = $this->userById($data->created_by);

              	$user_profile = $this->Profile_Img($id);

              	if(empty($user_profile)){
              		$user_profile=base_url().'profile.png';
              	}

              	echo '	
              			<div class="timeline-entry">
                            <div class="timeline-stat">
                                <div class="timeline-icon bg-info"><img class="img-xs img-circle" src="'.$user_profile.'" alt="Profile picture"> </div>
                            </div>
                            <div class="timeline-label"> 
                            	<h4 class="mar-no pad-btm"><a href="#" class="text-danger">'.$state.'</a></h4>
                            	<a href="#" class="btn-link text-semibold">'.$owner.'</a> <span class="font-date"><i class="fa fa-clock-o" aria-hidden="true"></i> '.$date.' </span>
                            	<br>
                            	'.$editor.' 
                            </div>
                        </div>
              		 ';


              	$x--;
            }
        }
	}


	function userById($id)
	{
		$this->db->select('b.first_name');
		$this->db->where('a.userid',$id);
		$this->db->join('agent b', 'b.username = a.username', 'left');
		$query =  $this->db->get('login_user a')->result();
		foreach ($query as $data) 
		{
			return $data->first_name;
		}
	}


	function Profile_Img($id)
	{
		$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			return $data->user_img;
		}
	}


	function MyImg($id)
	{
		$this->db->where('email',$id);
		$query =  $this->db->get('agent')->result();
		foreach ($query as $data) 
		{
			return $data->user_img;
		}
	}


	function my_profile_ticket()
	{
		$this->db->limit('50');
		$this->db->where('ticket_responsibilty',$this->session->userdata('first_name'));

		//var_dump($this->session->userdata('fullname')); exit();
		$this->db->order_by('id','desc');
		$query =  $this->db->get('td_register_ticket')->result();
		$list = '';
		foreach ($query as $data) 
		{

			$date = $data->created_date;
			$date = date("d-m-Y H:i", strtotime($date));

			$list .='
					<tr>
                        <td><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$data->id_ticket.'"> <p class="font-smaller">#'.$data->id_ticket.' <br>('.$date.')</p></a></td>
                        <td><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$data->id_ticket.'"> <p class="font-smaller"><font color="#000">'.$data->problem_desc_itsm.'</font></p></a></td>
                        <td>
                            <a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$data->id_ticket.'"> <p class="font-smaller"><font color="#000">'.$data->current_state.'</font></p></a>
                        </td>
                    </tr>
				 ';
		}

		return $list;
	}


	function getDetails_byHostname($hostname)
	{
		$select="SELECT * FROM computer WHERE name='$hostname'";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}

	function getDetails_byHostname_hardware($hostname)
	{
		$select="SELECT * FROM Hardware WHERE name='$hostname'";
	  	$query= $this->db->query($select);
	    if ($query->num_rows() >0){ 
	        foreach ($query->result() as $data) {
	            # code...
	            $result[] = $data;

	        }
	    return $result; //hasil dari semua proses ada dimari
	    } 
	}


	function getLocationDetails($room_id)
	{
		$select="SELECT * FROM location WHERE name='$room_id'";
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
  