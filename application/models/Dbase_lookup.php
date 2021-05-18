<?php 
class Dbase_lookup extends CI_Model
{
	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	    $this->db = $this->load->database('otrs', TRUE);
	    $this->db2 = $this->load->database('default', TRUE);
	    $this->datatables->set_database('otrs');
	}


	function myrole($userid)
	{
		$this->db->where('userid',$userid);
		$query =  $this->db->get('login')->result();
		foreach ($query as $data) 
		{
			echo $data->role;
		}
	}

	function lookup_user_datalist()
	{
		$query =  $this->db->get('agent')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->first_name.'">';
			echo $select;
		}
	}

	function lookup_namecontroller()
	{
		$query =  $this->db2->get('register_module')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name_register.'">'.$data->name_register.'</option>';
			echo $select;
		}
	}

	function lookup_topic()
	{
		$this->db2->where("status","1");
		$query =  $this->db2->get('classroom_create_topic')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->id_topic.'">'.$data->title_topic.'</option>';
			echo $select;
		}
	}


	function lookup_group()
	{

		$this->db2 = $this->load->database('otrs', TRUE);
		
		$this->db2->where("validity","Valid");
		$this->db2->group_by("name");
		$query =  $this->db2->get('group')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}

	function lookup_validity()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('validity_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->validity.'">'.$data->validity.'</option>';
			echo $select;
		}
	}


	function lookup_Criticality()
	{
		$this->db->where("Criticality !=","Deleted");
		$query =  $this->db->get('criticality_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->Criticality.'">'.$data->Criticality.'</option>';
			echo $select;
		}
	}

	function lookup_servicetype()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('service_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->service_type.'">'.$data->service_type.'</option>';
			echo $select;
		}
	}

	function lookup_sla()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('sla')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->sla.'">'.$data->sla.'</option>';
			echo $select;
		}
	}

	function lookup_sla_by_id()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('sla')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->sla_id.'">'.$data->sla.'</option>';
			echo $select;
		}
	}

	function lookup_slatype()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('sla_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->sla_type.'">'.$data->sla_type.'</option>';
			echo $select;
		}
	}

	function lookup_service()
	{	
		$this->db->where('validity','Valid');
		$query =  $this->db->get('service')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->service.'">'.$data->service.'</option>';
			echo $select;
		}
	}


	function lookup_service_by_id()
	{	
		$this->db->where('validity','Valid');
		$query =  $this->db->get('service')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->service_generated_id.'">'.$data->service.'</option>';
			echo $select;
		}
	}

	
	function lookup_customerID()
	{   
	    $this->db->group_by('customerID');
		$query =  $this->db->get('customer')->result();
		
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->customerID.'">'.$data->customerID.'</option>';
			echo $select;
		}
	}

	function lookup_customerID_By_ID()
	{
		$this->db->group_by('customerID');
		$this->db->where('valid','Valid');
		$query =  $this->db->get('customer')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->other_id.'">'.$data->customerID.'</option>';
			echo $select;
		}
	}


	function lookup_computer_type()
	{
		$query =  $this->db->get('computer_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->computer_type.'">'.$data->computer_type.'</option>';
			echo $select;
		}
	}

	function lookup_deployment_state()
	{
		$this->db->where('validity','Valid');
		$this->db->group_by('deployment_state');
		$query =  $this->db->get('deployment_state')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->deployment_state.'">'.$data->deployment_state.'</option>';
			echo $select;
		}
	}

	
	function lookup_incident_state()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('incident_state')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->incident_state.'">'.$data->incident_state.'</option>';
			echo $select;
		}
	}

	function getAllLoc()
	{
			$select= 	"
							SELECT * FROM location where validity !='Deleted' ORDER BY name ASC
						";
			$query = $this->db->query($select);
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	            	$name = $data->name;
	            	echo '<option value="'.$name.'">'.$name.'</option>';
	            }
	        }
	}

	function lookup_hardware_type()
	{
		$query =  $this->db->get('hardware_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->hardware_type.'">'.$data->hardware_type.'</option>';
			echo $select;
		}
	}

	function lookup_software()
	{
		$query =  $this->db->get('software_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->software_type.'">'.$data->software_type.'</option>';
			echo $select;
		}
	}

	function lookup_location()
	{
		$query =  $this->db->get('location_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->location_type.'">'.$data->location_type.'</option>';
			echo $select;
		}
	}

	function lookup_network()
	{
		$query =  $this->db->get('network_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->network_type.'">'.$data->network_type.'</option>';
			echo $select;
		}
	}
	
	function lookup_role()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('role')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}

	function lookup_ticket_type()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('ticket_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}

	function lookup_ticketState()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('ticket_state')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->state.'">'.$data->state.'</option>';
			echo $select;
		}
	}


	function lookup_ticket_state_type()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('ticket_state_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}


	function lookup_backup_type()
	{	
		$this->db->where('validity','Valid');
		$query =  $this->db->get('backup_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}

	function lookup_priority_type()
	{	
		$this->db->where('validity','Valid');
		$query =  $this->db->get('priority')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
			echo $select;
		}
	}

	function lookup_main_line_status()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('main_line_status')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}

	function lookup_agent()
	{
		$this->db->where('validity','Valid');
		$this->db->order_by('first_name','asc');
		$query =  $this->db->get('agent')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
			echo $select;
		}
	}

	function lookup_agent_datalist()
	{
		$this->db->where('validity','Valid');
		$this->db->order_by('first_name','asc');
		$query =  $this->db->get('agent')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->first_name.'">';
			echo $select;
		}
	}


	function lookup_filter_responsible()
	{
		$select = "	SELECT DISTINCT group_name
    				FROM agent as a 
    				WHERE validity='Valid'
    				ORDER BY group_name ASC
    			  ";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$select = '<option value="'.$data->group_name.'">'.$data->group_name.'</option>';
				echo $select;
            }
        }
	}


	function lookup_table_location_network()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('network')->result();
		foreach ($query as $data) 
		{
			$select = '
						<tr>
							<td> '.$data->name.' </td>
				    		<td> '.$data->location.' </td>
				    		<td> 
				    			<center>
				    				<input type="checkbox" value="'.$data->other_id.'" name="Link_Location"> 
				    			</center>
				    		</td>
				    	</tr>
					  ';
			
			echo $select;
		}	
	}


	function lookup_table_location_computer()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$select = '
						<tr>
							<td> '.$data->name.' </td>
				    		<td> '.$data->location.' </td>
				    		<td> 
				    			<center>
				    				<input type="checkbox" value="'.$data->other_id.'" name="Link_Location" id="Link_Location"> 
				    			</center>
				    		</td>
				    	</tr>
					  ';
			
			echo $select;
		}	
	}



	function lookup_table_location_hardware()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$select = '
						<tr>
							<td> '.$data->name.' </td>
				    		<td> '.$data->location.' </td>
				    		<td> 
				    			<center>
				    				<input type="checkbox" value="'.$data->other_id.'" name="Link_Location" id="Link_Location"> 
				    			</center>
				    		</td>
				    	</tr>
					  ';
			
			echo $select;
		}	
	}



	function lookup_table_location_software()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('software')->result();
		foreach ($query as $data) 
		{
			$select = '
						<tr>
							<td> '.$data->name.' </td>
				    		<td> '.$data->location.' </td>
				    		<td> 
				    			<center>
				    				<input type="checkbox" value="'.$data->other_id.'" name="Link_Location" id="Link_Location"> 
				    			</center>
				    		</td>
				    	</tr>
					  ';
			
			echo $select;
		}	
	}

	function lookup_table_sla()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('sla')->result();
		foreach ($query as $data) 
		{
			$select = '
						<tr>
							<td> '.$data->sla.' </td>
				    		<td> 
				    			<center>
				    				<input type="checkbox" value="'.$data->sla_id.'" name="SLA_ID"> 
				    			</center>
				    		</td>
				    	</tr>
					  ';
			
			echo $select;
		}	
	}

	function cmdb_lookup_service($custId)
	{
		$select = "SELECT COUNT(*) AS TOTAL FROM customer_services WHERE CustomerID='$custId' AND Validity='Valid'";
		$query= $this->db->query($select);
        if ($query->num_rows() >0){
        	foreach ($query->result() as $data) {
        		$total = $data->TOTAL;
        		if($total>0){
	        		$this->db->distinct();
					$this->db->select('service.service as service, service.service_generated_id as id');
					$this->db->from('customer_services');
					$this->db->where('customer_services.CustomerID',$custId);
					$this->db->where('customer_services.Validity','Valid');
					$this->db->join('service', 'service.service_generated_id = customer_services.ServiceID', 'left');
					$query= $this->db->get();

			        if ($query->num_rows() >0){
			        	foreach ($query->result() as $data) {
							//var_dump($query);
							// $select = '
							// 			<script>
							// 				$("#Link_Service").prop("disabled",false);
							// 			</script>
							// 			<option value="'.$data->id.'">'.$data->service.'</option>
							// 		  ';
							// echo $select;

			        		echo $data->id;

						}
					}
				}
			}
		} else {
				
			$this->db->where('validity','Valid');
			$query =  $this->db->get('service')->result();
			foreach ($query as $data) 
			{
				$select = '
							<script>
							$("#Link_Service").prop("disabled",true);
							</script>
							<option value="'.$data->service_generated_id.'">'.$data->service.'</option>
						  ';
				echo $select;
			}

		} 
	}

	function cmdb_lookup_sla($service_id)
	{
		$select = " SELECT DISTINCT sla_id 
		            FROM service_sla 
		            WHERE service_id='$service_id' AND Validity='Valid'";
		
		$query= $this->db->query($select);
        if ($query->num_rows() >0){
        	$service_id = '';
        	foreach ($query->result() as $data) {
                
                $service_id = $data->sla_id;
                
       //          $select = "	SELECT *
    			// 	FROM service_sla as a 
    			// 	LEFT JOIN sla as b ON b.sla_id = a.sla_id
    			// 	WHERE a.sla_id='$service_id'";
       //      	$query = $this->db->query($select);
                
       //      	$id = '';

       //          if ($query->num_rows() >0){ 
       //              foreach ($query->result() as $data) {
       //                	$id = $data->sla_id;
       //                	$sla = $data->sla;
                      	
       //                	//echo '<option value="'.$data->sla_id.'">'.$data->sla.'</option>';

       //                	//$id =  $data->sla_id;
       //              }

                   
                    
       //              echo '
       //                      <script>
							// 	$("#Link_SLA").prop("disabled",false);
							// </script>
       //                   ';
                //}


				
			}

			echo $service_id;
		} else {
			
			$id = '';

			$this->db->where('validity','Valid');
			$query =  $this->db->get('sla')->result();
			foreach ($query as $data) 
			{
				// $select = '
				// 			<script>
				// 			$("#Link_SLA").prop("disabled",true);
				// 			</script>
				// 			<option value="'.$data->sla_id.'">'.$data->sla.'</option>
				// 		  ';
				// echo $select;
				$id =  $data->sla_id;
			}

			echo $id;

		} 
	}


	function lookup_title_module()
	{
		$this->db->distinct();
		$query =  $this->db2->get('register_module')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name_register.'">'.$data->name_register.'</option>';
			echo $select;
		}
	}


	function List_ref_no()
    {
    	//SELECT COALESCE(a.lv_no, a.ps_no) as list  FROM network as a
        // $select=  	"
        //       			SELECT a.lv_no as list
        //       			FROM network as a
        //       			UNION
        //       			SELECT a.ps_no as list
        //       			FROM network as a
        //       			UNION
        //       			SELECT a.bs_no as list
        //       			FROM network as a
        //       			UNION
        //       			SELECT a.dq_no as list
        //       			FROM network as a
        //       			UNION
        //       			SELECT a.service_number as list
        //       			FROM network as a
        //       			UNION
        //       			SELECT a.serial_number as list
        //       			FROM hardware as a
        //       			UNION
        //       			SELECT a.serial_number as list
        //       			FROM computer as a
        //       			UNION
        //       			SELECT a.serial_number as list
        //       			FROM software as a
              			
                
        //     		";
        // $query = $this->db->query($select);
        
        // if ($query->num_rows() >0){ 
        //     foreach ($query->result() as $data) {
        //       $name = $data->list;
        //       echo '<option value="'.$name.'">'.$name.'</option>';
        //     }
        // }


    	$select = "
    					SELECT
    					DISTINCT 
						c.lv_no, c.ps_no, c.bs_no,c.dq_no,c.service_number,
						d.serial_number as id_software,
						e.serial_number as id_hardware,
						f.serial_number as id_computer
						FROM `cmdb_register_link` as a 
						LEFT JOIN  cmdb_link_location_itsm as b ON a.RegisterID = b.Link_ID
						LEFT JOIN  network as c ON c.other_id = b.Location_ID
						LEFT JOIN  software as d ON d.other_id = b.Location_ID
						LEFT JOIN  hardware as e ON e.other_id = b.Location_ID
						LEFT JOIN  computer as f ON f.other_id = b.Location_ID
    			  ";

    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              $lv_no = $data->lv_no;
              $ps_no = $data->ps_no;
              $bs_no = $data->bs_no;
              $dq_no = $data->dq_no;
              $service_number = $data->service_number;
              
              $id_software = $data->id_software;
              $id_hardware = $data->id_hardware;
			  $id_computer = $data->id_computer;

			  if(empty($lv_no)){

			  } else {
			  	$name = $lv_no;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 

			  if(empty($ps_no)){

			  } else {
			  	$name = $ps_no;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 

			  if(empty($bs_no)){

			  } else {
			  	$name = $bs_no;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 

			  if(empty($dq_no)){

			  } else {
			  	$name = $dq_no;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 

			  if(empty($service_number)){

			  } else {
			  	$name = $service_number;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 

			  if(empty($id_software)){

			  } else {
			  	$name = $id_software;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 

			  if(empty($id_hardware)){

			  } else {
			  	$name = $id_hardware;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 

			  if(empty($id_computer)){

			  } else {
			  	$name = $id_computer;
              	echo '<option value="'.$name.'">'.$name.'</option>';
			  } 
              

            }
        }



    }

    function subject_note($id)
    {
    	$select = "SELECT title FROM td_parent_note WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              echo $title = $data->title;
            }
        }
    }

    function subject_note_master($id)
    {
    	$select = "SELECT subject as title FROM ms_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              echo $title = $data->title;
            }
        }
    }

    function pull_data_responsible_note($id)
    {
        $select = "SELECT ticket_responsibilty	 FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->ticket_responsibilty	;
            	
            	$this->db->where('first_name',$name);
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;


					$this->db->where('first_name !=',$name);
					$query =  $this->db->get('agent')->result();
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
						echo $select;
					}

				}

            }
        } else {
        	$this->db->where('validity','Valid');
			$query =  $this->db->get('agent')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
				echo $select;
			}
        }
    }

    function pull_data_state_note($id)
    {
     // 	$select = "SELECT status_ticket FROM td_register_ticket WHERE id_ticket='$id'";
    	// $query = $this->db->query($select);
        
        // if ($query->num_rows() >0){ 
        //     foreach ($query->result() as $data) {
        //       	$status = $data->status_ticket	;   

        //       	if($status=='first_level'){

        //       	} else {


        //       		$select = "SELECT state FROM ticket_state WHERE state='$status'";
			    	// $query = $this->db->query($select);
			        
			     //    if ($query->num_rows() >0){ 
			     //        foreach ($query->result() as $data) {
			     //          	$state = $data->state	;
			     //          	echo '<option value="'.$state.'"> '.$state.' </option>';
			     //        }


			     //        $select = "SELECT state FROM ticket_state WHERE state!='$status'";
				    // 	$query = $this->db->query($select);
				        
				    //     if ($query->num_rows() >0){ 
				    //         foreach ($query->result() as $data) {
				    //           	$state = $data->state	;
				    //           	echo '<option value="'.$state.'"> '.$state.' </option>';
				    //         }
				    //     }




			     //    }
              		

        //       	}
        //       	// if($status=='open'){
        //       	// 	echo '<option value="open"> Open </option><option value="closed"> Closed </option>';
        //       	// } else {
        //       	// 	echo '<option value="closed"> Closed </option><option value="open"> Open </option>';
        //       	// }
        //     }
        // } 

        $select = "SELECT state FROM ticket_state";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$state = $data->state;
              	echo '<option value="'.$state.'"> '.$state.' </option>';
            }
        }
    }

    function pull_data_pendingdate_note($id)
    {
        $select = "SELECT pending_date FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$date = $data->pending_date	;   
            	echo $date;
            }
        }
    }

    function pull_data_impact_note($id)
    {
    	$select = "SELECT impact FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->impact	;
              	
              	if(empty($name)){
              	    $this->db->where('validity','Valid');
					$query =  $this->db->get('priority')->result();
					echo $default = "<option value=''>--Select Type--</option>";
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
						echo $select;
					}
              	} else {
              	    $this->db->where('critical_type',$name);
    				$query =  $this->db->get('priority')->result();
    				foreach ($query as $data) 
    				{
    					$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
    					echo $select;
    
    					$this->db->where('validity','Valid');
    					$this->db->where('critical_type !=',$name);
    					$query =  $this->db->get('priority')->result();
    					foreach ($query as $data) 
    					{
    						$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
    						echo $select;
    					}
    				}
              	}


            }
        } else {

        	$this->db->where('validity','Valid');
			$query =  $this->db->get('priority')->result();
			echo '<option value=""> -- Please Select -- </option>';
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
				echo $select;
			}
        }
    }

    function pull_data_impact_note_master($id)
    {
    	$select = "SELECT impact FROM ms_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->impact	;

              	$this->db->where('critical_type',$name);
				$query =  $this->db->get('priority')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
					echo $select;

					$this->db->where('validity','Valid');
					$this->db->where('critical_type !=',$name);
					$query =  $this->db->get('priority')->result();
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
						echo $select;
					}
				}

            }
        } else {

        	$this->db->where('validity','Valid');
			$query =  $this->db->get('priority')->result();
			echo '<option value=""> -- Please Select -- </option>';
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
				echo $select;
			}
        }
    }

    function note_owner($id)
    {
    	$select = "	SELECT a.created_by, b.first_name, a.ticket_owner as owner
    				FROM td_register_ticket as a 
    				LEFT JOIN agent as b ON a.created_by = b.userid
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$id = $data->created_by;
              	$name = $data->first_name;
              	$owner = $data->owner;

              	echo "<option value'".$owner."'> ".$owner." </option>";


              	$this->db->where('validity','Valid');
              	$this->db->where('first_name !=',$owner);
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;
				}

            }
        } else {
        		$this->db->where('validity','Valid');
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;
				}
        }
    }

    function note_owner_master($id)
    {
    	$select = "	SELECT a.created_by, b.first_name, a.owner
    				FROM ms_register_ticket as a 
    				LEFT JOIN agent as b ON a.created_by = b.userid
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$id = $data->created_by;
              	$name = $data->first_name;
              	$owner = $data->owner;

              	echo "<option value'".$owner."'> ".$owner." </option>";


              	$this->db->where('validity','Valid');
              	$this->db->where('first_name !=',$owner);
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;
				}

            }
        } else {
        		$this->db->where('validity','Valid');
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;
				}
        }
    }


    function note_responsible($id)
    {
    	$select = "	SELECT a.ticket_responsibilty, b.first_name 
    				FROM td_register_ticket as a 
    				LEFT JOIN agent as b ON a.ticket_responsibilty = b.first_name
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$id = $data->ticket_responsibilty;
              	$name = $data->first_name;

              	echo "<option value'".$id."'> ".$name." </option>";


              	$this->db->where('validity','Valid');
              	$this->db->where('first_name !=',$id);
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;
				}

            }
        } else {
        		$this->db->where('validity','Valid');
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;
				}
        }
    }

    function note_custID($id)
    {
    	$select="SELECT custID FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->custID;
            	echo $name;
            } 
        }
    }

    function get_firstlevel($id)
    {
    	$select="SELECT count(*) as total FROM td_child_note WHERE type_note='first_level' AND id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
    }

    function button_add_knowlegdebased($fullname)
    {	

        $this->db->select('count(*) as total');
		$this->db->where('name',$fullname);
		$query =  $this->db->get('knowledbased_access')->result();
		$no='1';
		foreach ($query as $data) 
		{
			return $total = $data->total;
		}

    }


    function get_firstlevel_master($id)
    {
    	$select="SELECT count(*) as total FROM ms_child_note WHERE type_note='first_level' AND id_ticket_master='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
    }

    

    function pull_data_priority_note($id)
    {
    	$select="SELECT priority FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$priority = $data->priority;
            	
            	if(empty($priority)){
            	    
            	    $this->db->where('validity','Valid');
					$query =  $this->db->get('priority')->result();
					echo $default = "<option value=''>--Select Backup Status--</option>";
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
						echo $select;
					}
            	    
            	} else {
            	    $this->db->where('critical_type',$priority);
    				$query =  $this->db->get('priority')->result();
    				foreach ($query as $data) 
    				{
    					$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
    					echo $select;
    
    					$this->db->where('validity','Valid');
    					$this->db->where('critical_type !=',$priority);
    					$query =  $this->db->get('priority')->result();
    					foreach ($query as $data) 
    					{
    						$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
    						echo $select;
    					}
    				}
            	}
            	
              	

            } 
        } else {
        	$this->db->where('validity','Valid');
			$query =  $this->db->get('priority')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
				echo $select;
			}
        }
    }

    function pull_data_priority_note_master($id)
    {
    	$select="SELECT priority FROM ms_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$priority = $data->priority;
            	
              	$this->db->where('critical_type',$priority);
				$query =  $this->db->get('priority')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
					echo $select;

					$this->db->where('validity','Valid');
					$this->db->where('critical_type !=',$priority);
					$query =  $this->db->get('priority')->result();
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
						echo $select;
					}
				}

            } 
        } else {
        	$this->db->where('validity','Valid');
			$query =  $this->db->get('priority')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->critical_type.'">'.$data->critical_type.'</option>';
				echo $select;
			}
        }
    }

    function pull_data_bs_note($id)
    {
    	$select="SELECT backup_type FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$backup_type = $data->backup_type;
                
                if(empty($backup_type)){
                    
                    $this->db->where('validity','Valid');
					$query =  $this->db->get('backup_type')->result();
					echo $default = "<option value=''>--Select Backup Type--</option>";
					foreach ($query as $data) 
					{
					    
						echo $select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					}
                    
                } else {
                
                  	$this->db->where('name',$backup_type);
    				$query =  $this->db->get('backup_type')->result();
    				foreach ($query as $data) 
    				{
    					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
    					echo $select;
    				
    					$this->db->where('validity','Valid');
    					$this->db->where('name !=',$backup_type);
    					$query =  $this->db->get('backup_type')->result();
    					foreach ($query as $data) 
    					{
    						$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
    						echo $select;
    					}
    				}
    				
                }

            }
        }
    }

    function pull_data_status_note($id)
    {
     	$select="SELECT main_status FROM td_register_ticket WHERE id_ticket='$id'";
     	//echo $select;
    	
    	$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$main_status = $data->main_status;
              	
              	if(empty($main_status)){
              	    
              	    $this->db->where('validity','Valid');
        			$query =  $this->db->get('main_line_status')->result();
        			echo $default = "<option value=''>--Select Main Line Status--</option>";
        			foreach ($query as $data) 
        			{
        			    
        				echo $select = '<option value="'.$data->name.'">'.$data->name.'</option>';
        				
        			}
              	    
              	} else {
              	    
              	

                  	$this->db->where('name',$main_status);
    				$query =  $this->db->get('main_line_status')->result();
    				foreach ($query as $data) 
    				{
    					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
    					echo $select;
    
    					$this->db->where('validity','Valid');
    					$this->db->where('name !=',$main_status);
    					$query =  $this->db->get('main_line_status')->result();
    					foreach ($query as $data) 
    					{
    						$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
    						echo $select;
    					}
    				}
    				
              	}

            }
        } else {
        	$this->db->where('validity','Valid');
			$query =  $this->db->get('main_line_status')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
				echo $select;
			}
        }

    }

    function pull_data_bstatus_note($id)
    {
    	$select="SELECT backup_status FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$backup_status = $data->backup_status;
                
                if(empty($backup_status)){
                    
                    $this->db->where('validity','Valid');
					$query =  $this->db->get('main_line_status')->result();
					echo $default = "<option value=''>--Select Backup Status--</option>";

					foreach ($query as $data) 
					{
						echo $select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					}
                    
                } else {
                
                  	$this->db->where('name',$backup_status);
    				$query =  $this->db->get('main_line_status')->result();
    				foreach ($query as $data) 
    				{
    					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
    					echo $select;
    
    					$this->db->where('validity','Valid');
    					$this->db->where('name !=',$backup_status);
    					$query =  $this->db->get('main_line_status')->result();
    					foreach ($query as $data) 
    					{
    						$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
    						echo $select;
    					}
    
    				}
                }

            }
        } else {

        	$this->db->where('validity','Valid');
			$query =  $this->db->get('main_line_status')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
				echo $select;
			}
        }
    }


    function pull_data_ticket_state()
    {
    	$this->db->where('validity','Valid');
		$query =  $this->db->get('ticket_state')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->state.'">'.$data->state.'</option>';
			echo $select;
		}
    }

    function masterTT($id)
    {
    	$select = "	SELECT * 
    				FROM ms_link_ticket as a
    				WHERE a.id_ticket_single='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$nodata = 'Not Applicable';
              	$id_ticket_master = $data->id_ticket_master;
            }
            $icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            return  '
            			<a href="javascript:void(0)" class="product-title">
                        	Master TT :
                        	<span class="product-description">
                              '.$icon.' '.$id_ticket_master.'
                            </span>
                        </a>
            		';
        }
    }

    function lookup_widget_ticket_info($id)
    {
    	
    	$env_hospital = '';
    	$env_hospital_cat = '';
    	$env_hospital_problem_desc = '';

    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$nodata = 'Not Applicable';
              	
              	$type_ticket = $data->type_ticket;
              	if(empty($type_ticket)){ $type_ticket = $nodata;}

              	$main_line_status = $data->main_status;
              	if(empty($main_line_status)){ $main_line_status = $nodata;}

              	$backup_type = $data->backup_type;
              	if(empty($backup_type)){ $backup_type = $nodata;}

              	$backup_status = $data->backup_status;
              	if(empty($backup_status)){ $backup_status = $nodata;}

              	$pending_date = $data->pending_date; 
              	if(empty($pending_date)){ $pending_date = $nodata;}
              	
              	$impact = $data->impact;
              	if(empty($impact)){ $impact = $nodata;}

              	$priority = $data->priority;
              	if(empty($priority)){ $priority = $nodata;}

              	$itsm_category = $data->itsm_category;
              	if(empty($itsm_category)){ $itsm_category = $nodata;}

              	if($type_ticket=='email'){
              		$type_ticket='Email';
              	}

              	if($type_ticket=='phone'){
              		$type_ticket='Phone';
              	}


              	$type_enviroment = $data->type_enviroment;
              	$severity = $data->severity;
              	$ref_no = $data->ref_no;
              	$id_ticket = $data->id_ticket;
              	$fault_itsm_category = $data->fault_itsm_category;
              	$env_hospital_problem_desc = $data->problem_desc_itsm;
              	//if(empty($type_enviroment)){ $type_enviroment = $nodata;}

              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	if($type_enviroment=='hospital'){

              		$label_ref = 'Device No';

              		$env_noc =  '';

              		$env_hospital_cat = '
		            						<a href="javascript:void(0)" class="product-title">
					                        	Fault ITSM Category :
					                        	<span class="product-description">
					                              '.$icon.' '.$fault_itsm_category.'
					                            </span>
					                        </a>
		            					';


		            $env_hospital_problem_desc = '
													  	<a href="javascript:void(0)" class="product-title">
								                        	Problem Description :
								                        	<span class="product-description">
								                              '.$icon.' '.$env_hospital_problem_desc.' 
								                            </span>
								                        </a>
								                        
						            				';


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

				            $env_hospital = '
											  	<a href="javascript:void(0)" class="product-title">
						                        	Severity :
						                        	<span class="product-description">
						                              '.$icon.' '.$title.' - '.$minute.' minute
						                            </span>
						                        </a>
						                        
				            				';


				            



				        } else {
				        	$env_hospital = '';
				        	$env_hospital_cat = '';
				        	$env_hospital_problem_desc = '';
				        }
              		}

              	} else {

              		$label_ref = 'Reference Number';

              		$env_noc =  '
								  	<a href="javascript:void(0)" class="product-title">
			                        	Main Line Status :
			                        	<span class="product-description">
			                              '.$icon.' '.$main_line_status.'
			                            </span>
			                        </a>
			                        <a href="javascript:void(0)" class="product-title">
			                        	Backup Type :
			                        	<span class="product-description">
			                              '.$icon.' '.$backup_type.'
			                            </span>
			                        </a>
			                        <a href="javascript:void(0)" class="product-title">
			                        	Backup Status
			                        	<span class="product-description">
			                              '.$icon.' '.$backup_status.'
			                            </span>
			                        </a>
			                        <a href="javascript:void(0)" class="product-title">
			                        	Pending Date :
			                        	<span class="product-description">
			                              '.$icon.' '.$pending_date.'
			                            </span>
			                        </a>

              					';
              		$env_hospital = '';
              		$env_hospital_cat = '';
              		$env_hospital_problem_desc = '';
              	}


              	
              	


              	$master_tt = $this->masterTT($id);

              	return 
              	'
              		<li class="item">
              			<a href="javascript:void(0)" class="product-title">
                        	Ticket Number :
                        	<span class="product-description">
                              '.$icon.' '.$id_ticket.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	'.$label_ref.' :
                        	<span class="product-description">
                              '.$icon.' '.$ref_no.'
                            </span>
                        </a>
              			'.$master_tt.'
                        <a href="javascript:void(0)" class="product-title">
                        	Type :
                        	<span class="product-description">
                              '.$icon.' '.$type_ticket.'
                            </span>
                        </a>
                       '.$env_noc.'
                       '.$env_hospital.'
                       '.$env_hospital_cat.'
                       '.$env_hospital_problem_desc.'
                        <a href="javascript:void(0)" class="product-title">
                        	Impact :
                        	<span class="product-description">
                              '.$icon.' '.$impact.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Priority :
                        	<span class="product-description">
                              '.$icon.' '.$priority.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	ITSM Category :
                        	<span class="product-description">
                              '.$icon.' '.$itsm_category.'
                            </span>
                        </a>
                    </li>
                    
              	';
            }
        } 

    }

    function lookup_widget_ticket_info_pdf($id)
    {

    	$env_hospital = '';
    	$env_hospital_cat = '';
    	$label_ref = '';


    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$nodata = 'Not Applicable';
              	
              	$type_ticket = $data->type_ticket;
              	if(empty($type_ticket)){ $type_ticket = $nodata;}

              	$main_line_status = $data->main_status;
              	if(empty($main_line_status)){ $main_line_status = $nodata;}

              	$backup_type = $data->backup_type;
              	if(empty($backup_type)){ $backup_type = $nodata;}

              	$backup_status = $data->backup_status;
              	if(empty($backup_status)){ $backup_status = $nodata;}

              	$pending_date = $data->pending_date; 
              	if(empty($pending_date)){ $pending_date = $nodata;}
              	
              	$impact = $data->impact;
              	if(empty($impact)){ $impact = $nodata;}

              	$priority = $data->priority;
              	if(empty($priority)){ $priority = $nodata;}

              	$itsm_category = $data->itsm_category;
              	if(empty($itsm_category)){ $itsm_category = $nodata;}

              	if($type_ticket=='email'){
              		$type_ticket='Email';
              	}

              	if($type_ticket=='phone'){
              		$type_ticket='Phone';
              	}

              	$created_date = $data->created_date;
              	if(empty($created_date)){ $created_date = $nodata;}


              	$type_enviroment = $data->type_enviroment;
              	$severity = $data->severity;
              	$ref_no = $data->ref_no;
              	$id_ticket = $data->id_ticket;

              	$fault_itsm_category = $data->fault_itsm_category;
              	//if(empty($type_enviroment)){ $type_enviroment = $nodata;}

              	if($type_enviroment=='hospital'){

              		$label_ref = 'Device No';

              		$env_noc =  '';

              		$env_hospital_cat = '
					                        <tr>
										  		<td> Fault ITSM Category </td>
										  		<td> '.$fault_itsm_category.'</td>
										  	</tr>
		            					';

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

				            $env_hospital = '
				            					<tr>
											  		<td> Severity </td>
											  		<td> '.$title.' - '.$minute.' minute</td>
											  	</tr>
				            				';

				        } else {
				        	$env_hospital = '';
				        }
              		}

              	} else {

              		$label_ref = 'Reference Number';

              		$env_noc =  '
              						<tr>
								  		<td> Main Line Status </td>
								  		<td> '.$main_line_status.' </td>
								  	</tr>
								  	<tr>
								  		<td> Backup Type </td>
								  		<td> '.$backup_type.' </td>
								  	</tr>
								  	<tr>
								  		<td> Backup Status </td>
								  		<td> '.$backup_status.' </td>
								  	</tr>
								  	<tr>
								  		<td> Pending Date </td>
								  		<td> '.$pending_date.' </td>
								  	</tr>
              					';
              		$env_hospital = '';

              		$env_hospital_cat = '';
              	}

              	

              	
              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 	'
              				<table style="width:100%" border="1">
							  	<tr>
								    <th width="50%">Field</th>
								    <th width="50%">Data</th>
							  	</th>
							  	<tr>
							  		<td> Ticket Number </td>
							  		<td> '.$id_ticket.' </td>
							  	</tr>
							  	<tr>
							  		<td> '.$label_ref.' </td>
							  		<td> '.$ref_no.' </td>
							  	</tr>
							  	<tr>
							  		<td> Created Date </td>
							  		<td> '.$created_date.' </td>
							  	</tr>
							  	<tr>
							  		<td> Type </td>
							  		<td> '.$type_ticket.' </td>
							  	</tr>
							  	'.$env_noc.'
							  	'.$env_hospital.'
							  	'.$env_hospital_cat.'
							  	<tr>
							  		<td> Impact </td>
							  		<td> '.$impact.' </td>
							  	</tr>
							  	<tr>
							  		<td> Priority </td>
							  		<td> '.$priority.' </td>
							  	</tr>
							  	<tr>
							  		<td> ITSM Category </td>
							  		<td> '.$itsm_category.' </td>
							  	</tr>
							</table>

              			';
            }
        } 

    }

    function lookup_widget_ticket_info_master($id)
    {

    	$select = "	SELECT * 
    				FROM ms_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$nodata = 'Not Applicable';
              	
              	$subject = $data->subject;
              	if(empty($subject)){ $subject = $nodata;}

              	$provider_ref = $data->provider_ref;
              	if(empty($provider_ref)){ $provider_ref = $nodata;}

              	$type = $data->type;
              	if(empty($type)){ $type = $nodata;}

              	$queu = $data->queu;
              	if(empty($queu)){ $queu = $nodata;}

              	$pending_date = $data->pending_date; 
              	if(empty($pending_date)){ $pending_date = $nodata;}
              	
              	$impact = $data->impact;
              	if(empty($impact)){ $impact = $nodata;}

              	$priority = $data->priority;
              	if(empty($priority)){ $priority = $nodata;}

              	
              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
              		<li class="item">
              
                      <div class="">
                      	<a href="javascript:void(0)" class="product-title">
                        	Master TT :
                        	<span class="product-description">
                              '.$icon.' '.$id.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Subject :
                        	<span class="product-description">
                              '.$icon.' '.$subject.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Provider Reference :
                        	<span class="product-description">
                              '.$icon.' '.$provider_ref.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Type :
                        	<span class="product-description">
                              '.$icon.' '.$type.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Queue
                        	<span class="product-description">
                              '.$icon.' '.$queu.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Pending Date :
                        	<span class="product-description">
                              '.$icon.' '.$pending_date.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Impact :
                        	<span class="product-description">
                              '.$icon.' '.$impact.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Priority :
                        	<span class="product-description">
                              '.$icon.' '.$priority.'
                            </span>
                        </a>
                      </div>
                    </li>
                    
              	';
            }
        } 
        
    }


    function lookup_widget_ticket_info_master_pdf($id)
    {

    	$select = "	SELECT * 
    				FROM ms_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$nodata = 'Not Applicable';
              	
              	$subject = $data->subject;
              	if(empty($subject)){ $subject = $nodata;}

              	$provider_ref = $data->provider_ref;
              	if(empty($provider_ref)){ $provider_ref = $nodata;}

              	$type = $data->type;
              	if(empty($type)){ $type = $nodata;}

              	$queu = $data->queu;
              	if(empty($queu)){ $queu = $nodata;}

              	$pending_date = $data->pending_date; 
              	if(empty($pending_date)){ $pending_date = $nodata;}
              	
              	$impact = $data->impact;
              	if(empty($impact)){ $impact = $nodata;}

              	$priority = $data->priority;
              	if(empty($priority)){ $priority = $nodata;}

              	$created_date = $data->created_date;
              	if(empty($created_date)){ $created_date = $nodata;}

              	
              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return  '
                              <table style="width:100%" border="1">
                                <tr>
                                  <th width="50%">Field</th>
                                  <th width="50%">Data</th>
                                </th>
                                <tr>
                                  <td> Ticket Created </td>
                                  <td> '.$created_date.' </td>
                                </tr>
                                <tr>
                                  <td> Subject </td>
                                  <td> '.$subject.' </td>
                                </tr>
                                <tr>
                                  <td> Master TT </td>
                                  <td> '.$id.' </td>
                                </tr>
                                <tr>
                                  <td> Provider Reference </td>
                                  <td> '.$provider_ref.' </td>
                                </tr>
                                <tr>
                                  <td> Type </td>
                                  <td> '.$type.' </td>
                                </tr>
                                <tr>
                                  <td> Queue </td>
                                  <td> '.$queu.' </td>
                                </tr>
                                <tr>
                                  <td> Pending Date </td>
                                  <td> '.$pending_date.' </td>
                                </tr>
                                <tr>
                                  <td> Impact </td>
                                  <td> '.$impact.' </td>
                                </tr>
                                <tr>
                                  <td> Priority </td>
                                  <td> '.$priority.' </td>
                                </tr>
                              </table>
                        ';
            }
        } 
    }

    function lookup_widget_ticket_closed($id)
    {
    	$select = "	SELECT * 
    				FROM td_ticket_closed as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$nodata = 'Not Applicable';
            	
            	$responsibility = $data->responsibility;
              	if(empty($responsibility)){ $responsibility = $nodata;}

              	$tt_no = $data->tt_no;
              	if(empty($tt_no)){ $tt_no = $nodata;}

              	$cause_of_fault = $data->cause_of_fault;
              	if(empty($cause_of_fault)){ $cause_of_fault = $nodata;}

              	$action_taken = $data->action_taken;
              	if(empty($action_taken)){ $action_taken = $nodata;}

              	$close_type = $data->close_type;
              	if(empty($close_type)){ $close_type = $nodata;}

              	$Problem = $data->Problem;
              	if(empty($Problem)){ $Problem = $nodata;}

              	$Portion = $data->Portion;
              	if(empty($Portion)){ $Portion = $nodata;}

              	$Fault_Type = $data->Fault_Type;
              	if(empty($Fault_Type)){ $Fault_Type = $nodata;}

              	$total_time_closed = $data->total_time_closed;
              	if(empty($total_time_closed)){ $total_time_closed = $nodata;}

              	$pending_time_closed = $data->pending_time_closed;
              	if(empty($pending_time_closed)){ $pending_time_closed = $nodata;}

              	$working_time_closed = $data->working_time_closed;
              	if(empty($working_time_closed)){ $working_time_closed = $nodata;}

              	$Ticket_Validation_Outage = $data->Ticket_Validation_Outage;
              	if(empty($Ticket_Validation_Outage)){ $Ticket_Validation_Outage = $nodata;}

              	$date = $data->created_date;
              	if(empty($date)){ $date = $nodata;}

              	$validout = $data->Ticket_Validation_Outage;
              	if(empty($validout)){ $validout = $nodata;}


              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
              		<li class="item">
              
                      	<div class="">

	                        <a href="javascript:void(0)" class="product-title">
	                        	Closed Date :
	                        	<span class="product-description">
	                              '.$icon.' '.$date.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Total Time:
	                        	<span class="product-description">
	                              '.$icon.' '.$total_time_closed.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Pending Time :
	                        	<span class="product-description">
	                              '.$icon.' '.$pending_time_closed.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Working Hour :
	                        	<span class="product-description">
	                              '.$icon.' '.$working_time_closed.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Responsibility :
	                        	<span class="product-description">
	                              '.$icon.' '.$responsibility.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Provider Reference :
	                        	<span class="product-description">
	                              '.$icon.' '.$tt_no.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Problem Description :
	                        	<span class="product-description">
	                              '.$icon.' '.$Problem.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Cause Of Fault :
	                        	<span class="product-description">
	                              '.$icon.' '.$cause_of_fault.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Fault Category Portion :
	                        	<span class="product-description">
	                              '.$icon.' '.$Portion.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Fault Category Type :
	                        	<span class="product-description">
	                              '.$icon.' '.$Fault_Type.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Action Taken :
	                        	<span class="product-description">
	                              '.$icon.' '.$action_taken.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Closed Type :
	                        	<span class="product-description">
	                              '.$icon.' '.$close_type.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Validation Outage :
	                        	<span class="product-description">
	                              '.$icon.' '.$validout.'
	                            </span>
	                        </a>
                       	</div>

                   	</li>
                ';


            }
        }
    }

    function lookup_widget_ticket_closed_master($id)
    {
    	$select = "	SELECT * 
    				FROM ms_ticket_closed as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$nodata = 'Not Applicable';
            	
            	$responsibility = $data->responsibility;
              	if(empty($responsibility)){ $responsibility = $nodata;}

              	$tt_no = $data->tt_no;
              	if(empty($tt_no)){ $tt_no = $nodata;}

              	$cause_of_fault = $data->cause_of_fault;
              	if(empty($cause_of_fault)){ $cause_of_fault = $nodata;}

              	$action_taken = $data->action_taken;
              	if(empty($action_taken)){ $action_taken = $nodata;}

              	$close_type = $data->close_type;
              	if(empty($close_type)){ $close_type = $nodata;}

              	$Problem = $data->Problem;
              	if(empty($Problem)){ $Problem = $nodata;}

              	$Portion = $data->Portion;
              	if(empty($Portion)){ $Portion = $nodata;}

              	$Fault_Type = $data->Fault_Type;
              	if(empty($Fault_Type)){ $Fault_Type = $nodata;}

              	$total_time_closed = $data->total_time_closed;
              	if(empty($total_time_closed)){ $total_time_closed = $nodata;}

              	$pending_time_closed = $data->pending_time_closed;
              	if(empty($pending_time_closed)){ $pending_time_closed = $nodata;}

              	$working_time_closed = $data->working_time_closed;
              	if(empty($working_time_closed)){ $working_time_closed = $nodata;}

              	$Ticket_Validation_Outage = $data->Ticket_Validation_Outage;
              	if(empty($Ticket_Validation_Outage)){ $Ticket_Validation_Outage = $nodata;}

              	$date = $data->created_date;
              	if(empty($date)){ $date = $nodata;}

              	$validout = $data->Ticket_Validation_Outage;
              	if(empty($validout)){ $validout = $nodata;}


              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
              		<li class="item">
              
                      	<div class="">

	                        <a href="javascript:void(0)" class="product-title">
	                        	Closed Date :
	                        	<span class="product-description">
	                              '.$icon.' '.$date.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Total Time:
	                        	<span class="product-description">
	                              '.$icon.' '.$total_time_closed.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Pending Time :
	                        	<span class="product-description">
	                              '.$icon.' '.$pending_time_closed.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Working Hour :
	                        	<span class="product-description">
	                              '.$icon.' '.$working_time_closed.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Responsibility :
	                        	<span class="product-description">
	                              '.$icon.' '.$responsibility.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Provider Reference :
	                        	<span class="product-description">
	                              '.$icon.' '.$tt_no.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Problem Description :
	                        	<span class="product-description">
	                              '.$icon.' '.$Problem.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Cause Of Fault :
	                        	<span class="product-description">
	                              '.$icon.' '.$cause_of_fault.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Fault Category Portion :
	                        	<span class="product-description">
	                              '.$icon.' '.$Portion.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Fault Category Type :
	                        	<span class="product-description">
	                              '.$icon.' '.$Fault_Type.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Action Taken :
	                        	<span class="product-description">
	                              '.$icon.' '.$action_taken.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Closed Type :
	                        	<span class="product-description">
	                              '.$icon.' '.$close_type.'
	                            </span>
	                        </a>
	                        <a href="javascript:void(0)" class="product-title">
	                        	Validation Outage :
	                        	<span class="product-description">
	                              '.$icon.' '.$validout.'
	                            </span>
	                        </a>
                       	</div>

                   	</li>
                ';


            }
        }
    }

    function lookup_widget_ticket_closed_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM td_ticket_closed as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$nodata = 'Not Applicable';
            	
            	$responsibility = $data->responsibility;
              	if(empty($responsibility)){ $responsibility = $nodata;}

              	$tt_no = $data->tt_no;
              	if(empty($tt_no)){ $tt_no = $nodata;}

              	$cause_of_fault = $data->cause_of_fault;
              	if(empty($cause_of_fault)){ $cause_of_fault = $nodata;}

              	$action_taken = $data->action_taken;
              	if(empty($action_taken)){ $action_taken = $nodata;}

              	$close_type = $data->close_type;
              	if(empty($close_type)){ $close_type = $nodata;}

              	$Problem = $data->Problem;
              	if(empty($Problem)){ $Problem = $nodata;}

              	$Portion = $data->Portion;
              	if(empty($Portion)){ $Portion = $nodata;}

              	$Fault_Type = $data->Fault_Type;
              	if(empty($Fault_Type)){ $Fault_Type = $nodata;}

              	$total_time_closed = $data->total_time_closed;
              	if(empty($total_time_closed)){ $total_time_closed = $nodata;}

              	$pending_time_closed = $data->pending_time_closed;
              	if(empty($pending_time_closed)){ $pending_time_closed = $nodata;}

              	$working_time_closed = $data->working_time_closed;
              	if(empty($working_time_closed)){ $working_time_closed = $nodata;}

              	$Ticket_Validation_Outage = $data->Ticket_Validation_Outage;
              	if(empty($Ticket_Validation_Outage)){ $Ticket_Validation_Outage = $nodata;}

              	$date = $data->created_date;
              	if(empty($date)){ $date = $nodata;}

              	$validout = $data->Ticket_Validation_Outage;
              	if(empty($validout)){ $validout = $nodata;}


              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
              		<table style="width:100%" border="1">
	                  <tr>
	                    <th width="50%">Field</th>
	                    <th width="50%">Data</th>
	                  </th>
	                  <tr>
	                    <td> Closed Date </td>
	                    <td> '.$date.' </td>
	                  </tr>
	                  <tr>
	                    <td> Total Time </td>
	                    <td> '.$total_time_closed.' </td>
	                  </tr>
	                  <tr>
	                    <td> Pending Time </td>
	                    <td> '.$pending_time_closed.' </td>
	                  </tr>
	                  <tr>
	                    <td> Working Hour </td>
	                    <td> '.$working_time_closed.' </td>
	                  </tr>
	                  <tr>
	                    <td> Responsibility </td>
	                    <td> '.$responsibility.' </td>
	                  </tr>
	                  <tr>
	                    <td> Provider Reference </td>
	                    <td> '.$tt_no.' </td>
	                  </tr>
	                  <tr>
	                    <td> Problem Description </td>
	                    <td> '.$Problem.' </td>
	                  </tr>
	                  <tr>
	                    <td> Cause Of Fault </td>
	                    <td> '.$cause_of_fault.' </td>
	                  </tr>
	                  <tr>
	                    <td> Fault Category Portion </td>
	                    <td> '.$Portion.' </td>
	                  </tr>
	                  <tr>
	                    <td> Fault Category Type </td>
	                    <td> '.$Fault_Type.' </td>
	                  </tr>
	                  <tr>
	                    <td> Action Taken </td>
	                    <td> '.$action_taken.' </td>
	                  </tr>
	                  <tr>
	                    <td> Closed Type </td>
	                    <td> '.$close_type.' </td>
	                  </tr>
	                  <tr>
	                    <td> Validation Outage </td>
	                    <td> '.$validout.' </td>
	                  </tr>
	                </table>
                ';


            }
        }
    }


    function lookup_widget_ticket_closed_master_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM ms_ticket_closed as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$nodata = 'Not Applicable';
            	
            	$responsibility = $data->responsibility;
              	if(empty($responsibility)){ $responsibility = $nodata;}

              	$tt_no = $data->tt_no;
              	if(empty($tt_no)){ $tt_no = $nodata;}

              	$cause_of_fault = $data->cause_of_fault;
              	if(empty($cause_of_fault)){ $cause_of_fault = $nodata;}

              	$action_taken = $data->action_taken;
              	if(empty($action_taken)){ $action_taken = $nodata;}

              	$close_type = $data->close_type;
              	if(empty($close_type)){ $close_type = $nodata;}

              	$Problem = $data->Problem;
              	if(empty($Problem)){ $Problem = $nodata;}

              	$Portion = $data->Portion;
              	if(empty($Portion)){ $Portion = $nodata;}

              	$Fault_Type = $data->Fault_Type;
              	if(empty($Fault_Type)){ $Fault_Type = $nodata;}

              	$total_time_closed = $data->total_time_closed;
              	if(empty($total_time_closed)){ $total_time_closed = $nodata;}

              	$pending_time_closed = $data->pending_time_closed;
              	if(empty($pending_time_closed)){ $pending_time_closed = $nodata;}

              	$working_time_closed = $data->working_time_closed;
              	if(empty($working_time_closed)){ $working_time_closed = $nodata;}

              	$Ticket_Validation_Outage = $data->Ticket_Validation_Outage;
              	if(empty($Ticket_Validation_Outage)){ $Ticket_Validation_Outage = $nodata;}

              	$date = $data->created_date;
              	if(empty($date)){ $date = $nodata;}

              	$validout = $data->Ticket_Validation_Outage;
              	if(empty($validout)){ $validout = $nodata;}


              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
              		<table style="width:100%" border="1">
	                  <tr>
	                    <th width="50%">Field</th>
	                    <th width="50%">Data</th>
	                  </th>
	                  <tr>
	                    <td> Closed Date </td>
	                    <td> '.$date.' </td>
	                  </tr>
	                  <tr>
	                    <td> Total Time </td>
	                    <td> '.$total_time_closed.' </td>
	                  </tr>
	                  <tr>
	                    <td> Pending Time </td>
	                    <td> '.$pending_time_closed.' </td>
	                  </tr>
	                  <tr>
	                    <td> Working Hour </td>
	                    <td> '.$working_time_closed.' </td>
	                  </tr>
	                  <tr>
	                    <td> Responsibility </td>
	                    <td> '.$responsibility.' </td>
	                  </tr>
	                  <tr>
	                    <td> Provider Reference </td>
	                    <td> '.$tt_no.' </td>
	                  </tr>
	                  <tr>
	                    <td> Problem Description </td>
	                    <td> '.$Problem.' </td>
	                  </tr>
	                  <tr>
	                    <td> Cause Of Fault </td>
	                    <td> '.$cause_of_fault.' </td>
	                  </tr>
	                  <tr>
	                    <td> Fault Category Portion </td>
	                    <td> '.$Portion.' </td>
	                  </tr>
	                  <tr>
	                    <td> Fault Category Type </td>
	                    <td> '.$Fault_Type.' </td>
	                  </tr>
	                  <tr>
	                    <td> Action Taken </td>
	                    <td> '.$action_taken.' </td>
	                  </tr>
	                  <tr>
	                    <td> Closed Type </td>
	                    <td> '.$close_type.' </td>
	                  </tr>
	                  <tr>
	                    <td> Validation Outage </td>
	                    <td> '.$validout.' </td>
	                  </tr>
	                </table>
                ';


            }
        }
    }


    function lookup_widget_customer_info($id)
    {
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$cat = $data->category;

            	$nodata = 'Not Applicable';
            	$service = $data->service;
            	if(empty($service)){ $service = $nodata;}
            	$sla = $data->sla;
            	if(empty($sla)){ $sla = $nodata;}
            	$location = $data->location;
            	if(empty($location)){ $location = $nodata;}
            	$custID = $data->custID;
            	if(empty($custID)){ $custID = $nodata;}

            	$extension_no = $data->extension_no;
            	if(empty($extension_no)){ $extension_no = $nodata;}

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            	$select = "	SELECT DISTINCT b.first_name,b.title_salutation,b.mobile,a.custUser as custUser,b.phone
    				FROM td_child_custuser as a
    				LEFT JOIN customer_user as b ON a.custUser = b.other_id
    				WHERE a.id_ticket='$id' AND b.valid='Valid'";
            	$query = $this->db->query($select);
        	
        		$namo = '';
        		$phone = '';
		        if ($query->num_rows() >0){ 



		        	
		        	$t1 = '<a href="javascript:void(0)" class="product-title">
                        	Customer User :
                        	<span class="product-description">';
                            
		            foreach ($query->result() as $data) {
		            	$title = $data->title_salutation;
		            	$name = $data->first_name;
		            	$mobile = $data->mobile;
		            	$x = $data->custUser;

		            	$phone = $data->phone;
		            	if(empty($phone)){
		            		$phone='Not Applicable';
		            	}
		        		
		        		$link = base_url().'Customer/CMC_Form/'.$x;
		            

		            	if((empty($mobile))||($mobile=='0')){
		            		$mobile='';
		            	} else {
		            		$mobile='('.$mobile.')';
		            	}

		            	$name = $title.' '.$name;
		            	$namo .= '<a href="'.base_url().'/Customer/CMC_Form/'.$x.'">'.$icon.'<b><font color="orange">'.$name.'</font> </b></a> <br>';
		            }

		            $t2 = '  
	                            </span>
	                        </a>
	                      ';

	                $namo  = $t1.$namo.$t2;

		       	}


		       
		       	// get services link 
		       	$link_service = $this->get_services_link($service,$cat);

		       	// get sla link 
				$link_sla = $this->get_sla_link($sla);

				// get location link 
				$link_location = $this->get_location_link($location);

				// get custID link 
				$link_custID = $this->get_custID_link($custID);




              	return 
              	'
              		<li class="item">
              
                      <div class="">
                        <a href="'.$link_service.'" class="product-title">
                        	Service :
                        	<span class="product-description">
                              '.$icon.' <b><font color="orange">'.$service.'</font></b>
                            </span>
                        </a>
                        <a href="'.$link_sla.'" class="product-title">
                        	SLA :
                        	<span class="product-description">
                              '.$icon.' <b><font color="orange">'.$sla.'</font></b>
                            </span>
                        </a>
                        <a href="'.$link_location.'" class="product-title">
                        	Location :
                        	<span class="product-description">
                              '.$icon.' <b><font color="orange">'.$location.'</font></b>
                            </span>
                        </a>
                        <a href="'.$link_custID.'" class="product-title">
                        	Customer ID :
                        	<span class="product-description">
                              '.$icon.' 	 '.$custID.'</font></b>
                            </span>
                        </a>
                         '.$namo.'
                         <a href="'.$link_custID.'" class="product-title">
                        	Phone No. :
                        	<span class="product-description">
                              '.$icon.' 	 '.$phone.'</font></b>
                            </span>
                        </a>
                        <a href="'.$link_custID.'" class="product-title">
                        	Extension No. :
                        	<span class="product-description">
                              '.$icon.' 	 '.$extension_no.'</font></b>
                            </span>
                        </a>

                      </div>
                    </li>
                ';

            }
        }
    }

    function lookup_widget_customer_info_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$cat = $data->category;

            	$nodata = 'Not Applicable';
            	$service = $data->service;
            	if(empty($service)){ $service = $nodata;}
            	$sla = $data->sla;
            	if(empty($sla)){ $sla = $nodata;}
            	$location = $data->location;
            	if(empty($location)){ $location = $nodata;}
            	$custID = $data->custID;
            	if(empty($custID)){ $custID = $nodata;}

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            	$select = "	SELECT b.first_name,b.title_salutation,b.mobile,a.custUser as custUser
    				FROM td_child_custuser as a
    				LEFT JOIN customer_user as b ON a.custUser = b.other_id
    				WHERE a.id_ticket='$id'";
            	$query = $this->db->query($select);
        	
        		$namo = '';
		        if ($query->num_rows() >0){ 



		        	
		        	$t1 = '<a href="javascript:void(0)" class="product-title">
                        	Customer User :
                        	<span class="product-description">';
                            
		            foreach ($query->result() as $data) {
		            	$title = $data->title_salutation;
		            	$name = $data->first_name;
		            	$mobile = $data->mobile;
		            	$x = $data->custUser;
		        		
		        		$link = base_url().'Customer/CMC_Form/'.$x;
		            

		            	if((empty($mobile))||($mobile=='0')){
		            		$mobile='';
		            	} else {
		            		$mobile='('.$mobile.')';
		            	}

		            	$name = $title.' '.$name.'<br>';
		            	$namo .= '<a href="'.base_url().'/Customer/CMC_Form/'.$x.'">'.$icon.'<b><font color="orange">'.$name.'</font> </b></a> <br>';
		            }

		            $t2 = '  
	                            </span>
	                        </a>
	                      ';

	                $namo  = $t1.$namo.$t2;

		       	}


		       
		       	// get services link 
		       	$link_service = $this->get_services_link($service,$cat);

		       	// get sla link 
				$link_sla = $this->get_sla_link($sla);

				// get location link 
				$link_location = $this->get_location_link($location);

				// get custID link 
				$link_custID = $this->get_custID_link($custID);


				if(empty($service)){$service='NA';}
				if(empty($sla)){$sla='NA';}
				if(empty($location)){$location='NA';}
				if(empty($custID)){$custID='NA';}
				if(empty($name)){$name='NA';}

              	return 	'
              				<table style="width:100%" border="1">
			                  <tr>
			                    <th width="50%">Field</th>
			                    <th width="50%">Data</th>
			                  </th>
			                  <tr>
			                    <td> Service </td>
			                    <td> '.$service.' </td>
			                  </tr>
			                  <tr>
			                    <td> SLA </td>
			                    <td> '.$sla.' </td>
			                  </tr>
			                  <tr>
			                    <td> Location </td>
			                    <td> '.$location.' </td>
			                  </tr>
			                  <tr>
			                    <td> Customer ID </td>
			                    <td> '.$custID.' </td>
			                  </tr>
			                  <tr>
			                    <td> Customer User </td>
			                    <td> '.$name.' </td>
			                  </tr>
			                </table>
              			';

            }
        }
    }

    function get_services_link($service,$cat)
    {
    	//$service = preg_replace('/\s+/', '', $service);
    	$service = trim($service);
    	if($cat=='Network'){
    		$cat = "SELECT service_generated_id as other_id FROM service WHERE service='$service'";
    	} else if($cat=='Hardware'){
    		$cat = "SELECT service_generated_id as other_id FROM service WHERE service='$service'";
    	} else if($cat=='Computer'){
    		$cat = "SELECT service_generated_id as other_id FROM service WHERE service='$service'";
    	} else if($cat=='Software'){
    		$cat = "SELECT service_generated_id as other_id FROM service WHERE service='$service'";
    	} else {
    		$cat ='';
    	}

    	
    	//get id service 
    	if(!empty($cat)){
    		$select = $cat;
	    	$query = $this->db->query($select);
	        
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	            	$id = $data->other_id;

	            }
	            $service_link = base_url().'Service/Service_ViewDetails/'.$id;
	            return $service_link;
	        }	
    	} else {
    		$service_link = base_url().'Service/Service_ViewDetails';
    		return $service_link;
    	}
    }

    function get_sla_link($sla)
    {
    	$sla = trim($sla);
    	
    	
    	//get id service 
    	if(!empty($sla)){
    		$select = "SELECT sla_id as other_id FROM sla WHERE sla='$sla'";
	    	$query = $this->db->query($select);
	        
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	            	$id = $data->other_id;

	            }
	            $sla_link = base_url().'Service/SLA_ViewDetails/'.$id;
	            return $sla_link;
	        }	
    	} else {
    		$sla_link = base_url().'Service/SLA_ViewDetails';
    		return $sla_link;
    	}
    }

    function get_location_link($location)
    {
    	$location = trim($location);
    	
    	
    	//get id service 
    	if(!empty($location)){
    		$select = "SELECT other_id as other_id FROM location WHERE name='$location'";
	    	$query = $this->db->query($select);
	        
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	            	$id = $data->other_id;

	            }
	            $sla_link = base_url().'CMDB/CMDB_Location_EditDetails/'.$id;
	            return $sla_link;
	        }	
    	} else {
    		$sla_link = base_url().'CMDB/CMDB_Location_ViewList';
    		return $sla_link;
    	}
    }

    function get_custID_link($custID)
    {
    	$custID = trim($custID);
    	
    	
    	//get id service 
    	if(!empty($custID)){
    		$select = "SELECT other_id as other_id FROM customer WHERE customerID='$custID'";
	    	$query = $this->db->query($select);
	        
	        if ($query->num_rows() >0){ 
	            foreach ($query->result() as $data) {
	            	$id = $data->other_id;

	            }
	            $sla_link = base_url().'Customer/CMC_Form_Customer/'.$id;
	            return $sla_link;
	        }	
    	} else {
    		$sla_link = base_url().'Customer/CMC_Customer';
    		return $sla_link;
    	}
    }

    function lookup_widget_agent_info($id)
    {
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$owner = $data->ticket_owner;
            	$resp = $data->ticket_responsibilty;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
              		<li class="item">
              
                      <div class="">
                        <a href="javascript:void(0)" class="product-title">
                        	Owner :
                        	<span class="product-description">
                              '.$icon.' '.$owner.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Responsibility :
                        	<span class="product-description">
                              '.$icon.' '.$resp.'
                            </span>
                        </a>
                      </div>
                    </li>
                ';
           	}
        }
    }

    function lookup_widget_agent_info_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$owner = $data->ticket_owner;
            	$resp = $data->ticket_responsibilty;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
                    <table style="width:100%" border="1">
	                  <tr>
	                    <th width="50%">Field</th>
	                    <th width="50%">Data</th>
	                  </th>
	                  <tr>
	                    <td> Owner </td>
	                    <td> '.$owner.' </td>
	                  </tr>
	                  <tr>
	                    <td> Responsibility </td>
	                    <td> '.$resp.' </td>
	                  </tr>
	                </table>
                ';
           	}
        }
    }

    function lookup_widget_chronolgy_of_ticket($id)
    {
    	$select = "	SELECT * 
    				FROM td_child_note as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){

        	$head = '
        				<table style="width:100%" border="1">
			                  <tr>
			                  	<th width="30%">Date Time</th>
			                    <th width="20%">Field</th>
			                    <th width="50%">Data</th>
			                  </th>
        			';
        	$body = '';
        	$i = '1';
            foreach ($query->result() as $data) {

            	$type_state = $data->type_state;
            	$text_editor = $data->text_editor;
            	$created_date = $data->created_date;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	$body .=  
		              	'
		                    
			                  <tr>
			                  	<td> '.$created_date.' </td>
			                    <td> '.$i.') '.$type_state.' </td>
			                    <td> '.$text_editor.' </td>
			                  </tr>
			                
		                ';
		        $i++;
           	}

           	$footer = "</table>";

           	return $head.$body.$footer;
        }
    }

    function lookup_widget_chronolgy_of_ticket_master_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM ms_child_note as a
    				WHERE a.id_ticket_master='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){

        	$head = '
        				<table style="width:100%" border="1">
			                  <tr>
			                  	<th width="30%">Date Time</th>
			                    <th width="20%">Field</th>
			                    <th width="50%">Data</th>
			                  </th>
        			';
        	$body = '';
        	$i = '1';
            foreach ($query->result() as $data) {

            	$type_state = $data->type_state;
            	$text_editor = $data->text_editor;
            	$created_date = $data->created_date;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	$body .=  
		              	'
		                    
			                  <tr>
			                  	<td> '.$created_date.' </td>
			                    <td> '.$i.') '.$type_state.' </td>
			                    <td> '.$text_editor.' </td>
			                  </tr>
			                
		                ';
		        $i++;
           	}

           	$footer = "</table>";

           	return $head.$body.$footer;
        }
    }

    function lookup_widget_agent_info_master($id)
    {
    	$select = "	SELECT * 
    				FROM ms_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$owner = $data->owner;
            	$resp = $data->responsibilty;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
              		<li class="item">
              
                      <div class="">
                        <a href="javascript:void(0)" class="product-title">
                        	Owner :
                        	<span class="product-description">
                              '.$icon.' '.$owner.'
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="product-title">
                        	Responsibility :
                        	<span class="product-description">
                              '.$icon.' '.$resp.'
                            </span>
                        </a>
                      </div>
                    </li>
                ';
           	}
        }
    }

    function lookup_widget_agent_info_master_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM ms_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$owner = $data->owner;
            	$resp = $data->responsibilty;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	return 
              	'
                    <table style="width:100%" border="1">
	                  <tr>
	                    <th width="50%">Field</th>
	                    <th width="50%">Data</th>
	                  </th>
	                  <tr>
	                    <td> Owner </td>
	                    <td> '.$owner.' </td>
	                  </tr>
	                  <tr>
	                    <td> Responsibility </td>
	                    <td> '.$resp.' </td>
	                  </tr>
	                </table>
                ';
           	}
        }
    }

    function lookup_widget_ticket_master($id)
    {
    	$select = "	SELECT * 
    				FROM ms_link_ticket as a
    				LEFT JOIN td_parent_note as b ON a.id_ticket_single = b.id_ticket
    				WHERE a.id_ticket_master='$id'";
    	$query = $this->db->query($select);
        $body = '';
        if ($query->num_rows() >0){ 
        	$header = '
        				<li class="item">
                      		<div class="">
        		      ';
            foreach ($query->result() as $data) {

            	$id_ticket = $data->id_ticket;
            	$title = $data->title;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            	$id_ticket_go = "'".$id_ticket."'";
              	
              	$body .= '
              				<a onclick="go('.$id_ticket_go.')" class="product-title">
	                        	Ticket : <font color="black">'.$id_ticket.'</font> <br>
	                        	Subject : <font color="black">'.$title.'</font> <br>
	                        	<span class="product-description">
	                            </span>
	                        </a>
	                        <br>
              			 ';
           	}

           	$footer = '
	           				</div>
	                    </li>

	                    <script>
	                    	function go(id) {
	                    	  var url = "'.base_url().'Ticket/Ticket_DetailTicket/"+id;
							  var win = window.open(url, "_blank");
							  win.focus();
							}
	                    </script>
           			  ';

           	return $header.$body.$footer;
        }
    }

    function lookup_widget_ticket_master_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM ms_link_ticket as a
    				LEFT JOIN td_parent_note as b ON a.id_ticket_single = b.id_ticket
    				WHERE a.id_ticket_master='$id'";
    	$query = $this->db->query($select);
        $body = '';
        if ($query->num_rows() >0){ 
        	$header = '
        				<table style="width:100%" border="1">
		                  <tr>
		                    <th width="50%">Field</th>
		                    <th width="50%">Data</th>
		                  </th>
        		      ';
            foreach ($query->result() as $data) {

            	$id_ticket = $data->id_ticket;
            	$title = $data->title;

            	$id_ticket_go = "'".$id_ticket."'";
              	
              	$body .= '
	                        <tr>
			                    <td> Ticket </td>
			                    <td> '.$id_ticket.' </td>
			                </tr>
			                <tr>
			                	<td> Subject </td>
			                    <td> '.$title.' </td>
			                </tr>

              			 ';
           	}

           	$footer = '
	           			</table>
           			  ';

           	return $header.$body.$footer;
        }
    }

    function lookup_widget_ticket_master_edit($id)
    {
    	$select = "	SELECT b.id_ticket,b.title,a.id
    				FROM ms_link_ticket as a
    				LEFT JOIN td_parent_note as b ON a.id_ticket_single = b.id_ticket
    				WHERE a.id_ticket_master='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 

        	$head = '
        				<li class="item">
              
	                      <div class="table-responsive">
	                        <table class="table table-striped">
							  	<thead>
								    <tr>
									      <th scope="col">Related Ticket</th>
									      <th scope="col"><center>Action (<a onclick="add_ticket();"><i class="fa fa-plus" aria-hidden="true"> Add Ticket</i></a>)</center></th>
								    </tr>
							    </thead>
							    <tbody>

        			';
        	$body = '';
            foreach ($query->result() as $data) {

            	$id_ticket = $data->id_ticket;
            	$title = $data->title;
            	$id = $data->id;
            	$id_ticket_edit = $id_ticket;
            	$id_go = "'".$id."'";
            	$icon = '<i onclick="edit_itsm_master('.$id_go.')" class="fa fa-times" aria-hidden="true"></i>';

            	

            	$body .= '
			        				<tr>
							    		<td>'.$id_ticket.'<br>'.$title.'</td>
											<td><center>'.$icon.'</center></td>
							    	</tr>
            		    ';
              	
           	}


           	$foot = '
	           				</tbody>
							</table>
	                      </div>
	                    </li>
           			';

           	$data = $head.$body.$foot;
           	return $data;
        }
    }

    function lookup_widget_cmdb_info($id)
    {
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$loc = $data->category;
            	$cat = $data->category;
            	$ref = $data->ref_no;

            	$name_com = "'".$ref."'";

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            	if($cat=='Network'){
		    		$cat = "SELECT other_id as other_id FROM network 
		    				WHERE lv_no='$ref' OR ps_no='$ref' OR bs_no='$ref' OR dq_no='$ref' OR service_number='$ref'
		    			   ";
		    		$url = "CMDB/CMDB_Network_EditDetails/"; 	
		    		$remote = '';
		    	} else if($cat=='Hardware'){
		    		$cat = "SELECT other_id as other_id FROM hardware WHERE name='$ref'";
		    		$url = "CMDB/CMDB_Hardware_EditDetails/";
		    		$remote = '';
		    	} else if($cat=='Computer'){
		    		$cat = "SELECT other_id as other_id FROM computer WHERE name='$ref'";
		    		$url = "CMDB/CMDB_Computer_EditDetails/";
		    		$remote = $name_com;
		    	} else if($cat=='Software'){
		    		$cat = "SELECT other_id as other_id FROM software WHERE serial_number='$ref'";
		    		$url = "CMDB/CMDB_Software_EditDetails/";
		    		$remote = '';
		    	} else {
		    		$cat ='';
		    		$url ='';
		    		$remote = '';
		    	}



		    	if(!empty($cat))
		    	{
		    		$query = $this->db->query($cat);
        
			        if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {

			            	$other_id = $data->other_id;

			            	$link = $url.$other_id;

			            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';


			            	if(!empty($remote)){
			            		// $remote = '
					            //             <a href="'.$remote.'" class="product-title">
					            //             	Remote :
					            //             	<span class="product-description">
					            //                   '.$icon.' <b><font color="orange">Remote</font></b><br>
					            //                 </span>
					            //             </a>
			            		// 		  ';


			            		$remote = '
					                        <a onclick="remote('.$remote.')" class="product-title">
					                        	Remote :
					                        	<span class="product-description">
					                              '.$icon.' <b><font color="orange">Remote</font></b><br>
					                            </span>
					                        </a>
			            				  ';

			            	} else {
			            		$remote;
			            	}


			            	$env = $this->session->userdata('env');

			            	if($env=='hospital'){
			            		
			            	} else {
			            		$remote='';
			            	}


				              	return 
				              	'
				              		<li class="item">
				              
				                      <div class="">
				                        <a href="'.base_url().$link.'" class="product-title">
				                        	Asset / Inventory :
				                        	<span class="product-description">
				                              '.$icon.' <b><font color="orange">'.$loc.'</font></b><br>
				                            </span>
				                        </a>
				                        '.$remote.'
				                      </div>
				                    </li>
				                ';

				            

			            	

			            }
			        }
		    	}



            }
        }
    }

    function lookup_widget_cmdb_info_pdf($id)
    {
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$loc = $data->category;
            	$cat = $data->category;
            	$ref = $data->ref_no;

            	if($cat=='Network'){
		    		$cat = "SELECT other_id as other_id FROM network 
		    				WHERE lv_no='$ref' OR ps_no='$ref' OR bs_no='$ref' OR dq_no='$ref' OR service_number='$ref'
		    			   ";
		    		$url = "CMDB/CMDB_Network_EditDetails/"; 	
		    	} else if($cat=='Hardware'){
		    		$cat = "SELECT other_id as other_id FROM hardware WHERE serial_number='$ref'";
		    		$url = "CMDB/CMDB_Hardware_EditDetails/";
		    	} else if($cat=='Computer'){
		    		$cat = "SELECT other_id as other_id FROM computer WHERE serial_number='$ref'";
		    		$url = "CMDB/CMDB_Computer_EditDetails/";
		    	} else if($cat=='Software'){
		    		$cat = "SELECT other_id as other_id FROM software WHERE serial_number='$ref'";
		    		$url = "CMDB/CMDB_Software_EditDetails/";
		    	} else {
		    		$cat ='';
		    		$url ='';
		    	}


		    	if(!empty($cat))
		    	{
		    		$query = $this->db->query($cat);
        
			        if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {

			            	$other_id = $data->other_id;

			            	$link = $url.$other_id;

			            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

			              	return 
			              	'
			                    <table style="width:100%" border="1">
				                  <tr>
				                    <th width="50%">Field</th>
				                    <th width="50%">Data</th>
				                  </th>
				                  <tr>
				                    <td> Asset / Inventory </td>
				                    <td> '.$loc.' </td>
				                  </tr>
				                </table>
			                ';

			            	

			            }
			        }
		    	}



            }
        }
    }


    function lookup_widget_activity_note($id)
    {
    	$select = "	SELECT * 
    				FROM td_child_note as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 

        
        	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

        	$content = '';
            foreach ($query->result() as $data) {

            	$type_note = $data->type_state;
            	$created_date = $data->created_date;

            	// if($type_note=='open'){
            	// 	$type_note='<font color="blue"> Open </font>';
            	// } else if($type_note=='first_level')
            	// {
            	// 	$type_note='<font color="blue">First Level</font>';
            	// } else if($type_note=='note'){
            	// 	$type_note='<font color="blue">Note</font>';
            	// } else if($type_note=='pending'){
            	// 	$type_note='<font color="green">Pending</font>';
            	// } else if($type_note=='resume'){
            	// 	$type_note='<font color="red">Resume</font>';
            	// } else if($type_note=='closed'){
            	// 	$type_note='<font color="blue">Closed</font>';
            	// }


              	$content .= 
              	'

                        <li class="list-group-item"><b>'.$type_note.'</b> '.$icon.' '.$created_date.' </li>
                      
                ';


            }

            
           	return $content;
        }
    }

    function lookup_widget_activity_note_master($id)
    {
    	$select = "	SELECT * 
    				FROM ms_child_note as a
    				WHERE a.id_ticket_master='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 

        
        	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

        	$content = '';
            foreach ($query->result() as $data) {

            	$type_note = $data->type_state;
            	$created_date = $data->created_date;

            	// if($type_note=='open'){
            	// 	$type_note='<font color="blue"> Open </font>';
            	// } else if($type_note=='first_level')
            	// {
            	// 	$type_note='<font color="blue">First Level</font>';
            	// } else if($type_note=='note'){
            	// 	$type_note='<font color="blue">Note</font>';
            	// } else if($type_note=='pending'){
            	// 	$type_note='<font color="green">Pending</font>';
            	// } else if($type_note=='resume'){
            	// 	$type_note='<font color="red">Resume</font>';
            	// } else if($type_note=='closed'){
            	// 	$type_note='<font color="blue">Closed</font>';
            	// }


              	$content .= 
              	'

                        <li class="list-group-item"><b>'.$type_note.'</b> '.$icon.' '.$created_date.' </li>
                      
                ';


            }

            
           	return $content;
        }
    }


    function count_total_activities($id)
    {
    	$select = "	SELECT COUNT(*) AS TOTAL 
    				FROM td_child_note as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 

            foreach ($query->result() as $data) {

            	return $TOTAL = $data->TOTAL;

           	}
        }
    }

    function count_total_activities_master($id)
    {
    	$select = "	SELECT COUNT(*) AS TOTAL 
    				FROM ms_child_note as a
    				WHERE a.id_ticket_master='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 

            foreach ($query->result() as $data) {

            	return $TOTAL = $data->TOTAL;

           	}
        }
    }

    function lookup_queue()
	{
		$this->db->distinct(); 
		$this->db->where('validity','Valid');
		$query =  $this->db->get('queue')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}


	function pull_data_itsm_to_queu($id)
	{
		$select="SELECT queu FROM td_parent_note WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$queu = $data->queu;
            } 

            $this->db->where('name',$queu);
				$query =  $this->db->get('queue')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					
				}
				echo $select;
				$this->db->distinct(); 
				$this->db->where('validity','Valid');
				$this->db->where('name !=',$queu);
				$query =  $this->db->get('queue')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					echo $select;
				}

        } else {
        	$this->db->distinct(); 
			$this->db->where('validity','Valid');
			$query =  $this->db->get('queue')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
				echo $select;
			}
        }
	}

	function pull_data_itsm_to_queu_master($id)
	{
		$select="SELECT queu FROM ms_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$queu = $data->queu;
            } 

            $this->db->where('name',$queu);
				$query =  $this->db->get('queue')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					
				}
				echo $select;
				$this->db->distinct(); 
				$this->db->where('validity','Valid');
				$this->db->where('name !=',$queu);
				$query =  $this->db->get('queue')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					echo $select;
				}

        } else {
        	$this->db->distinct(); 
			$this->db->where('validity','Valid');
			$query =  $this->db->get('queue')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
				echo $select;
			}
        }
	}

	function lookup_table_group()
	{
		$this->db->where('validity','Valid');
		$query =  $this->db->get('group')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}


	function pull_data_FaultCategoryType()
    {
    	$this->db->where('validity','Valid');
		$query =  $this->db->get('faulty_category_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
    }

    function pull_data_FaultCategoryPortion()
    {
    	$this->db->where('validity','Valid');
		$query =  $this->db->get('faulty_category_portion')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
    }

    function pull_data_ProblemDescription()
    {
    	$this->db->where('validity','Valid');
		$query =  $this->db->get('problem_description')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
    }


    function pull_data_CauseOfFault()
    {
    	$this->db->where('validity','Valid');
		$query =  $this->db->get('caused_of_fault')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
    }

    function pull_data_Responsibilty($id)
    {
    	$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			echo $data->ticket_responsibilty;
		}
    }

    function pull_data_Responsibilty_master($id)
    {
    	$this->db->where('id_ticket',$id);
		$query =  $this->db->get('ms_register_ticket')->result();
		foreach ($query as $data) 
		{
			echo $data->responsibilty;
		}
    }


    function pull_data_provider_ref($id)
    {
    	$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			echo $data->provider_ref;
		}
    }

    function pull_data_provider_ref_master($id)
    {
    	$this->db->where('id_ticket',$id);
		$query =  $this->db->get('ms_register_ticket')->result();
		foreach ($query as $data) 
		{
			echo $data->provider_ref;
		}
    }

    function pull_data_owner($id)
    {
        $select = "SELECT owner	 FROM ms_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->owner	;
            	
            	$this->db->where('first_name',$name);
				$query =  $this->db->get('agent')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
					echo $select;


					$this->db->where('first_name !=',$name);
					$query =  $this->db->get('agent')->result();
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
						echo $select;
					}

				}

            }
        } else {
        	$this->db->where('validity','Valid');
			$query =  $this->db->get('agent')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
				echo $select;
			}
        }
    }

    function pull_data_type($id)
    {
    	$select = "SELECT type FROM ms_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$type = $data->type	;
            	
            	$this->db->where('name',$type);
				$query =  $this->db->get('ticket_type')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					echo $select;


					$this->db->where('validity','Valid');
					$this->db->where('name !=',$type);
					$query =  $this->db->get('ticket_type')->result();
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
						echo $select;
					}

				}

            }
        } else {
        	$this->db->where('validity','Valid');
			$query =  $this->db->get('agent')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
				echo $select;
			}
        }
    }

    function count_mobile_ticket()
    {
    	$select = "SELECT COUNT(*) AS TOTAL FROM ticket_mobile WHERE status='Order'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        } else {
        	return '0';
        }
    }


    function count_new_ticket()
    {
    	$select = "SELECT COUNT(*) AS TOTAL FROM td_register_ticket WHERE status_ticket='new'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        } else {
        	return '0';
        }
    }

    function count_open_ticket()
    {
    	$select = "SELECT COUNT(*) AS TOTAL FROM td_register_ticket WHERE status_ticket='open'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        } else {
        	return '0';
        }
    }

    function count_pending_ticket()
    {
    	$select = "SELECT COUNT(*) AS TOTAL FROM td_register_ticket WHERE status_ticket='pending'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        } else {
        	return '0';
        }
    }



    function count_close_ticket()
    {
    	$select = "SELECT COUNT(*) AS TOTAL FROM td_register_ticket WHERE current_state='Resolved'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        } else {
        	return '0';
        }
    }




    function count_all_ticket()
    {
    	$select = "SELECT COUNT(*) AS TOTAL FROM td_register_ticket";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        } else {
        	return '0';
        }
    }



    function count_severity_high_ticket()
    {
    	$select = "	SELECT COUNT(*) AS TOTAL FROM `td_register_ticket` as a 
					LEFT JOIN sla_severity as b ON b.id = a.severity
					LEFT JOIN severity as c ON b.minute = c.sev_time
					WHERE c.sev_name='High' OR c.sev_name='1 high'
    			  ";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        } else {
        	return '0';
        }
    }



    function count_master_ticket()
    {
    	$select = "SELECT COUNT(*) AS TOTAL FROM ms_register_ticket WHERE status_ticket!='closed'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$TOTAL = $data->TOTAL	;
            }

            return $TOTAL;
        }
    }
    

    function get_status_single($id)
    {
    	$select = "SELECT status_ticket FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$status_ticket = $data->status_ticket	;
            }

            return $status_ticket;
        }
    }

    function report_type()
    {
    	$query =  $this->db->get('report_type')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->id.'">'.$data->type.'</option>';
			echo $select;
		}
    }

    function report_customer()
    {
    	$this->db->distinct();
    	$this->db->select('customerID');
    	$query =  $this->db->get('customer_user')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->customerID.'">'.$data->customerID.'</option>';
			echo $select;
		}
    }

    function report_location()
    {
    	$this->db->distinct();
    	$this->db->select('name');
    	$query =  $this->db->get('location')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
    }

    function report_title($id)
    {	
    	$title = '';
    	$this->db->distinct();
    	$this->db->select('report_title');
    	$this->db->where('id',$id);
    	$query =  $this->db->get('report_register')->result();
		foreach ($query as $data) 
		{
			$title = $data->report_title;
		}
		echo $title;
    }
    

    function statistic_load_canvas($id)
    {


    	$select = "
					SELECT * FROM report_register WHERE report_id='$id'
				  ";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$start_date = $data->start_date;
              	$mula = date("d-m-Y", strtotime($start_date));
              	$end_date = $data->end_date;
              	$tamat = date("d-m-Y", strtotime($end_date));
            }
        }


    	$Fault_Type = "";
    	$Count_Fault_Type = "";


    	// $select = 	"
					// 			SELECT COUNT(Fault_Type) as Total FROM td_ticket_closed 
					// 			WHERE (created_date BETWEEN '$start_date' AND '$end_date')
				 //  			";

    	$select = 	"
								SELECT COUNT(a.cause_of_fault) as Total FROM td_ticket_closed  as a
								LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
								LEFT JOIN network as c ON b.ref_no = c.ps_no
								WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL

				  			";


		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$Total = $data->Total;
             }
        }


    	// $select = 	"
    	// 				SELECT Fault_Type, COUNT(Fault_Type) AS NILAI FROM td_ticket_closed
					// 	WHERE (created_date BETWEEN '$start_date' AND '$end_date')
					// 	GROUP BY Fault_Type

    	// 			";


        $select = 	"
    					SELECT a.cause_of_fault as Fault_Type, COUNT(a.cause_of_fault) AS NILAI FROM td_ticket_closed AS  a
						LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
						LEFT JOIN network as c ON b.ref_no = c.ps_no
						WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
						GROUP BY a.cause_of_fault

    				";
        //echo $select; exit();

		$query = $this->db->query($select);
    	
    	
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	
                $jum = $this->total_data_main_line($id);
              	$nilai = $data->NILAI;
              	$Value = $nilai * 100 / $jum;
              	$Value = round($Value, 1);

             	$Fault_Type .= '"'.$data->Fault_Type.'('.$Value.'%)",';
              	$Count_Fault_Type .= '"'.$nilai.'",';
            }
        }
        $Fault_Type = rtrim($Fault_Type,',');
        $Count_Fault_Type = rtrim($Count_Fault_Type,',');

    	echo 	'
    				var oilData = {
					    labels: [
					        '.$Fault_Type.'
					    ],

					    datasets: [
					        {   
					            data: ['.$Count_Fault_Type.'],
					            backgroundColor: [
					                "#FF6384",
					                "#63FF84",
					                "#84FF63",
					                "#8463FF",
					                "#6384FF"
					            ],
					        }],
					};
    			';
    }
    
    
    function total_data_main_line($Report_ID)
    {
            $select = "
                    SELECT * FROM report_register WHERE report_id='$Report_ID'
                  ";
                  
            //echo $select; exit();

            $query = $this->db->query($select);
        
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $start_date = $data->start_date;
                    $mula = date("d-m-Y", strtotime($start_date));
                    $end_date = $data->end_date;
                    $tamat = date("d-m-Y", strtotime($end_date));
                }
            }



            $select = "
                        SELECT distinct(a.name) FROM faulty_category_portion as a
                        LEFT JOIN td_ticket_closed as b ON a.name =  b.Portion
                        LEFT JOIN td_register_ticket as c ON b.id_ticket = c.id_ticket
                        LEFT JOIN network as d ON c.ref_no = d.ps_no
                        WHERE a.validity='valid' AND (b.created_date BETWEEN '$start_date' AND '$end_date') AND d.ps_no IS NOT NULL
                      ";
                      
            
    
            $query = $this->db->query($select);
            
            $Jum = 0;
            $Jum2 = 0;
            $Jum_x = 0;
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $name = $data->name;
                    //echo $name.'<br>';
                    $span = $this->get_rowspan($name);
                    //echo '<tr>';
                    //echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';
    
    
                    $select =   "
                                    SELECT COUNT(a.Fault_Type) as Total FROM td_ticket_closed  as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.ps_no
                                    WHERE (a.created_date BETWEEN '$start_date' AND '$end_date')  AND c.ps_no IS NOT NULL
                                ";
                                
                    
    
                    $query = $this->db->query($select);
                
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Total = $data->Total;
                         }
                    }
    
    
    
    
                    // total data
                    $select =   "
                                    SELECT DISTINCT(a.Fault_Type) FROM td_ticket_closed as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.ps_no 
                                    WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                                ";
                    
                    
                    $query = $this->db->query($select);
                    
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Fault_Type = $data->Fault_Type;
                            //echo $Fault_Type.' - ';
                            //echo '<td><center>'.$Fault_Type.'</center></td>';
    
                            $select =   "
                                            SELECT COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                            LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                            LEFT JOIN network as c ON b.ref_no = c.ps_no
                                            WHERE a.Fault_Type='$Fault_Type' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.ps_no IS NOT NULL
                                        "; 
                            //echo $select;
                            $query = $this->db->query($select);
                            
                            if ($query->num_rows() >0){ 
                                
                                foreach ($query->result() as $data) {
                                    $Total_Fault = $data->Total_Fault;
                                    
                                    //echo $Total_Fault.'-';
                                    //echo '<td><center>'.$Total_Fault.'</center></td>';
    
                                    //$Value = $Total_Fault * 100 / $Total;
                                    //$Value = round($Value, 2);
                                    //echo '<td><center>'.$Value.'</center></td>';
                                    //echo '<tr>';
                                    //echo $Value.'<br>';
                                    
                                    $Jum_x += $Total_Fault;
                                    
                                    //$Jum2 += $Value;
                                }
                                
                               // var_dump($Jum_x);
                                
                               
                            }
                            
                            
    
    
                        }
                    }
    
    
                }
                return $Jum_x;
            }
        
        
        
    }
    
    
    function total_data_backup_line($Report_ID)
    {
            $select = "
                    SELECT * FROM report_register WHERE report_id='$Report_ID'
                  ";
                  
            //echo $select; exit();

            $query = $this->db->query($select);
        
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $start_date = $data->start_date;
                    $mula = date("d-m-Y", strtotime($start_date));
                    $end_date = $data->end_date;
                    $tamat = date("d-m-Y", strtotime($end_date));
                }
            }



            $select = "
                        SELECT distinct(a.name) FROM faulty_category_portion as a
                        LEFT JOIN td_ticket_closed as b ON a.name =  b.Portion
                        LEFT JOIN td_register_ticket as c ON b.id_ticket = c.id_ticket
                        LEFT JOIN network as d ON c.ref_no = d.bs_no
                        WHERE a.validity='valid' AND (b.created_date BETWEEN '$start_date' AND '$end_date') AND d.bs_no IS NOT NULL
                      ";
                      
            
    
            $query = $this->db->query($select);
            
            $Jum = 0;
            $Jum2 = 0;
            $Jum_x = 0;
            if ($query->num_rows() >0){ 
                foreach ($query->result() as $data) {
                    $name = $data->name;
                    //echo $name.'<br>';
                    $span = $this->get_rowspan($name);
                    //echo '<tr>';
                    //echo '<td rowspan="'.$span.'"><center>'.$name.'</center></td>';
    
    
                    $select =   "
                                    SELECT COUNT(a.cause_of_fault) as Total FROM td_ticket_closed  as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.bs_no
                                    WHERE (a.created_date BETWEEN '$start_date' AND '$end_date')  AND c.bs_no IS NOT NULL
                                ";
                                
                    
    
                    $query = $this->db->query($select);
                
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Total = $data->Total;
                         }
                    }
    
    
    
    
                    // total data
                    $select =   "
                                    SELECT DISTINCT(a.cause_of_fault) FROM td_ticket_closed as a
                                    LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                    LEFT JOIN network as c ON b.ref_no = c.bs_no 
                                    WHERE a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                                ";
                    
                    
                    $query = $this->db->query($select);
                    
                    if ($query->num_rows() >0){ 
                        foreach ($query->result() as $data) {
                            $Fault_Type = $data->cause_of_fault;
                            //echo $Fault_Type.' - ';
                            //echo '<td><center>'.$Fault_Type.'</center></td>';
    
                            $select =   "
                                            SELECT COUNT(*) AS Total_Fault FROM td_ticket_closed as a
                                            LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
                                            LEFT JOIN network as c ON b.ref_no = c.bs_no
                                            WHERE a.cause_of_fault='$Fault_Type' AND a.Portion='$name' AND (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
                                        "; 
                            //echo $select;
                            $query = $this->db->query($select);
                            
                            if ($query->num_rows() >0){ 
                                
                                foreach ($query->result() as $data) {
                                    $Total_Fault = $data->Total_Fault;
                                    
                                    //echo $Total_Fault.'-';
                                    //echo '<td><center>'.$Total_Fault.'</center></td>';
    
                                    //$Value = $Total_Fault * 100 / $Total;
                                    //$Value = round($Value, 2);
                                    //echo '<td><center>'.$Value.'</center></td>';
                                    //echo '<tr>';
                                    //echo $Value.'<br>';
                                    
                                    $Jum_x += $Total_Fault;
                                    
                                    //$Jum2 += $Value;
                                }
                                
                               // var_dump($Jum_x);
                                
                               
                            }
                            
                            
    
    
                        }
                    }
    
    
                }
                return $Jum_x;
            }
        
        
        
    }
    
    
    function get_rowspan($name)
	{
		//$select = 	"
								//SELECT COUNT(Fault_Type) as Total FROM td_ticket_closed Where Portion='$name'
				  			//";
				  			
		$select = "SELECT * FROM td_ticket_closed Where Portion='$name' GROUP BY Fault_Type";
		
		//echo $select;

		$query = $this->db->query($select);
        $i = 0;
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	//return $Total = $data->Total;
              	$i++;
             }
             //var_dump($i);
             return $i;
        }
	}
    

    function statistic_backup_line_canvas($id){

        $id_ref = $id;
    	$select = "
					SELECT * FROM report_register WHERE report_id='$id'
				  ";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$start_date = $data->start_date;
              	$mula = date("d-m-Y", strtotime($start_date));
              	$end_date = $data->end_date;
              	$tamat = date("d-m-Y", strtotime($end_date));
            }
        }


    	$Fault_Type = "";
    	$Count_Fault_Type = "";


    	$select = 	"
								SELECT COUNT(a.cause_of_fault) as Total FROM td_ticket_closed AS a 
								LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
								LEFT JOIN network as c ON b.ref_no = c.ps_no
								WHERE (a.created_date BETWEEN '$start_date' AND '$end_date') AND c.bs_no IS NOT NULL
				  			";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$Total = $data->Total;
             }
        }


    	$select = 	"
    					SELECT a.cause_of_fault as Fault_Type, COUNT(a.cause_of_fault) AS NILAI FROM td_ticket_closed AS a
						LEFT JOIN td_register_ticket as b ON b.id_ticket = a.id_ticket
						LEFT JOIN network as c ON b.ref_no = c.bs_no
						WHERE (a.created_date BETWEEN '$start_date' AND '$end_date')
						AND c.bs_no IS NOT NULL
						GROUP BY a.cause_of_fault

    				";

		$query = $this->db->query($select);
    	
    	
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	
                $Jum = $this->total_data_backup_line($id_ref);
              	$nilai = $data->NILAI;
              	$Value = $nilai * 100 / $Jum;
              	$Value = round($Value, 1);

             	$Fault_Type .= '"'.$data->Fault_Type.'('.$Value.'%)",';
              	$Count_Fault_Type .= '"'.$nilai.'",';
            }
        }
        $Fault_Type = rtrim($Fault_Type,',');
        $Count_Fault_Type = rtrim($Count_Fault_Type,',');

    	echo 	'
    				var oilData = {
					    labels: [
					        '.$Fault_Type.'
					    ],

					    datasets: [
					        {   
					            data: ['.$Count_Fault_Type.'],
					            backgroundColor: [
					                "#FF6384",
					                "#63FF84",
					                "#84FF63",
					                "#8463FF",
					                "#6384FF"
					            ],
					        }],
					};
    			';
    }

    function number_of_occurrence_canvas($id)
    {
    	$select = "
					SELECT * FROM report_register WHERE report_id='$id'
				  ";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$start_date = $data->start_date;
              	$mula = date("d-m-Y", strtotime($start_date));
              	$end_date = $data->end_date;
              	$tamat = date("d-m-Y", strtotime($end_date));
            }
        }



        $select = 	"
						SELECT COUNT(*) AS Full_Total
						FROM `td_ticket_closed`
						WHERE Ticket_Validation_Outage ='Valid' 
						AND (created_date BETWEEN '$start_date' AND '$end_date')
					";
		
		$query = $this->db->query($select);
    	
        if ($query->num_rows() >0){ 
        	$count = 1;
            foreach ($query->result() as $data) {
              	$Full_Total = $data->Full_Total;
            }
        }

        $Fault_Type = '';	
		$Count_Fault_Type = '';
		$f = '';
		$n = '';

        $select = 	"
						SELECT DISTINCT Portion as Fault_Type,COUNT(Fault_Type) AS Total 
						FROM `td_ticket_closed`
						WHERE Ticket_Validation_Outage ='Valid' 
						AND (created_date BETWEEN '$start_date' AND '$end_date')
						GROUP BY Fault_Type
					";


		
		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
        	$count = 1;
            foreach ($query->result() as $data) {
              	$Fault_Type = $data->Fault_Type;
              	$Total = $data->Total;


              	$nilai = $data->Total;
              	$Value = $nilai * 100 / $Full_Total;
              	$Value = round($Value, 1);

              	$count++;

              	$f .= '"'.$Fault_Type.'('.$Value.')",';
              	$n .= $Value.',';
            }

            $f = rtrim($f,',');
        	$n = rtrim($n,',');

        	echo 	'
    				var oilData = {
					    labels: ['.$f.'],
					    datasets: [
					        {   
					            data: ['.$n.'],
					            backgroundColor: [
					                "#FF6384",
					                "#63FF84",
					                "#84FF63",
					                "#8463FF",
					                "#6384FF"
					            ],
					        }],
					};
    			';

        }


    }

    function statistic_total_hour_canvas($id)
    {

    	$Portion_X = '';
    	$Count_Portion_X = '';

    	$select = "
					SELECT * FROM report_register WHERE report_id='$id'
				  ";

		$query = $this->db->query($select);
    
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$start_date = $data->start_date;
              	$mula = date("d-m-Y", strtotime($start_date));
              	$end_date = $data->end_date;
              	$tamat = date("d-m-Y", strtotime($end_date));
            }
        }



        $select = 	"
						SELECT DISTINCT a.Portion ,
						a.working_time_closed , a.total_time_closed, a.created_date as end_date,
						b.created_date as first_date,b.id_ticket
						FROM `td_ticket_closed` as a
						LEFT JOIN td_register_ticket as b ON a.id_ticket = b.id_ticket 
						WHERE a.Ticket_Validation_Outage ='Valid' 
						AND (a.created_date BETWEEN '$start_date' AND '$end_date')
						GROUP BY a.Portion
					";

		//echo $select;

		
		$query = $this->db->query($select);
    	
		$maso = '';

        if ($query->num_rows() >0){ 
        	$count = 1;
            foreach ($query->result() as $data) {
              	
              	$Portion = $data->Portion;
              	$working_time_closed = $data->working_time_closed;
              	$total_time_closed = $data->total_time_closed;
              	$end = '"'.$data->end_date.'"';
              	$first = '"'.$data->first_date.'"';
              	$id_ticket = $data->id_ticket;
              	//$Full_Total = $data->Full_Total;


		        if($Portion=='BIT support'){
              		$time  = $total_time_closed;
              	} else {
              		$time  = $working_time_closed;
              	}


              	date_default_timezone_set("Asia/Kuala_Lumpur");
		        $timeReg =date("H:i:s");
		        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
		        $current = "'".$dateReg.' '.$timeReg."'"; //current date 


		        if(empty($end)){
		        	$select = "SELECT (UNIX_TIMESTAMP(".$current.") - UNIX_TIMESTAMP(".$first.")) AS minit";
		        } else {
		        	$select = "SELECT (UNIX_TIMESTAMP(".$end.") - UNIX_TIMESTAMP(".$first.")) AS minit";
		        }


		        $query = $this->db->query($select);
			    	
		        if ($query->num_rows() >0){ 
		        	
		            foreach ($query->result() as $data) {
		              	$minit = $data->minit;

		              	$minit = $minit/60;
		            	
		            	$Portion_X .= '"'.$Portion.'('.$time.')",';
              			$Count_Portion_X .= '"'.$minit.'",';
		            }
		        }

		        // $Portion .= '"'.$Portion.'('.$time.')",';
		        

              	
		    }

		    $Portion_X = rtrim($Portion_X,',');
        	$Count_Portion_X = rtrim($Count_Portion_X,',');

		}

		


		echo '
				labels: ['.$Portion_X.'],
			      datasets: [
			        {
			          label: "Population (millions)",
			          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
			          data: ['.$Count_Portion_X.']
			        }
			      ]
			 ';

    }

    function analytic_all_ticket()
    {

    	date_default_timezone_set("Asia/Kuala_Lumpur");
        $timeReg =date("H:i:s");
        $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");
        $datetime = $dateReg.' '.$timeReg; //current date 




        $label = '';
        $val_new = '';
        $val_open = '';
        $val_pending = '';
        $val_closed = '';
        $val_master = '';
        $combine = '';

        $datetime = date("Y-m-d H:i:s",strtotime("-210 minutes", strtotime($datetime)));

        for($i=0;$i<7;$i++){
        	$datetime = date("Y-m-d H:i:s",strtotime("+30 minutes", strtotime($datetime)));
        	$previous = date("Y-m-d H:i:s",strtotime("+30 minutes", strtotime($datetime)));
        	$time = substr($datetime, 11);

        	if($i==6){
        		$select = "SELECT COUNT(*) AS NEW FROM td_register_ticket WHERE status_ticket='new' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS NEW FROM td_register_ticket WHERE status_ticket='new' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}




	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$new = $data->NEW;
	            }

	            $val_new .= "'".$new."',";
	        }


	    	if($i==6){
        		$select = "SELECT COUNT(*) AS OPEN FROM td_register_ticket WHERE status_ticket='open' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS OPEN FROM td_register_ticket WHERE status_ticket='open' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}

	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$open = $data->OPEN;
	            }
	            $val_open .= "'".$open."',";
	        }

	        if($i==6){
        		$select = "SELECT COUNT(*) AS PENDING FROM td_register_ticket WHERE status_ticket='pending' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS PENDING FROM td_register_ticket WHERE status_ticket='pending' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}

	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$pending = $data->PENDING;
	            }
	            $val_pending .= "'".$pending."',";
	        }

	        if($i==6){
        		$select = "SELECT COUNT(*) AS CLOSED FROM td_register_ticket WHERE status_ticket='closed' AND created_date <= '$datetime'";
        	} else {
        		$select = "SELECT COUNT(*) AS CLOSED FROM td_register_ticket WHERE status_ticket='closed' AND (created_date >= '$datetime' AND created_date <= '$previous')";
        	}



	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$closed = $data->CLOSED;
	            }
	            $val_closed .= "'".$closed."',";
	        }



	        if($i==6){
        		$select = "SELECT COUNT(*) AS MASTER FROM ms_register_ticket WHERE created_date <= '$datetime' AND status_ticket !='closed'";
        	} else {
        		$select = "SELECT COUNT(*) AS MASTER FROM ms_register_ticket WHERE (created_date >= '$datetime' AND created_date <= '$previous') AND status_ticket !='closed'";
        	}



	    	$query = $this->db->query($select);
	    	
	        if ($query->num_rows() >0){ 
	        	foreach ($query->result() as $data) {
	            	$master = $data->MASTER;
	            }
	            $val_master .= "'".$master."',";
	        }


	        $label .= "'".$time."',";
        }

        $val_new_trim = rtrim($val_new,',');
        $val_open_trim = rtrim($val_open,',');
        $val_pending_trim = rtrim($val_pending,',');
        $val_closed_trim = rtrim($val_closed,',');
        $val_master_trim = rtrim($val_master,',');


    	$label_trim = rtrim($label,',');


        echo "
        		var dataFirst = {
				    label: 'New Ticket',
				    data: [".$val_new_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'red',
				    backgroundColor: 'red',
				    pointBorderColor: 'red',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2,
				    pointStyle: 'rect'
				  };

				var dataSecond = {
				    label: 'Open Ticket',
				    data: [".$val_open_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'orange',
				    backgroundColor: 'orange',
				    pointBorderColor: 'orange',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };

				var dataThird = {
				    label: 'Pending Ticket',
				    data: [".$val_pending_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'brown',
				    backgroundColor: 'brown',
				    pointBorderColor: 'brown',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };

				var dataFourth = {
				    label: 'Closed Ticket',
				    data: [".$val_closed_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'purple',
				    backgroundColor: 'purple',
				    pointBorderColor: 'purple',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };


				var dataFive = {
				    label: 'Master Ticket',
				    data: [".$val_master_trim."],
				    lineTension: 0.3,
				    fill: false,
				    borderColor: 'grey',
				    backgroundColor: 'grey',
				    pointBorderColor: 'grey',
				    pointBackgroundColor: 'lightgreen',
				    pointRadius: 5,
				    pointHoverRadius: 15,
				    pointHitRadius: 30,
				    pointBorderWidth: 2
				  };


				var xData = {
				  labels: [".$label_trim."],
				  datasets: [dataFirst, dataSecond,dataThird,dataFourth,dataFive]
				};

        	 ";

    }


    function lookup_severity()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('severity')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->id.'">'.$data->sev_name.'</option>';
			echo $select;
		}
	}

	function lookup_fault_itsm_category()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('fault_itsm_category')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}

	function lookup_problem_desc()
	{
		$this->db->where("validity !=","Deleted");
		$query =  $this->db->get('problem_description')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}

	function pull_problem_desc($id)
	{
		$select = "SELECT problem_desc_itsm	 FROM td_register_ticket WHERE id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$name = $data->problem_desc_itsm	;
            	
            	$this->db->where('name',$name);
				$query =  $this->db->get('problem_description')->result();
				foreach ($query as $data) 
				{
					$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
					echo $select;


					$this->db->where('name !=',$name);
					$query =  $this->db->get('problem_description')->result();
					foreach ($query as $data) 
					{
						$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
						echo $select;
					}

				}

            }
        } else {
        	$this->db->where('validity','Valid');
			$query =  $this->db->get('problem_description')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
				echo $select;
			}
        }
	}

	function lookup_agent_selected($first_name)
	{
		$this->db->where('first_name',$first_name);
		$query =  $this->db->get('agent')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
			echo $select;


			$this->db->where('first_name !=',$first_name);
			$query =  $this->db->get('agent')->result();
			foreach ($query as $data) 
			{
				$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
				echo $select;
			}

		}
	}


	function getEnv($id)
	{
		$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			return $data->type_enviroment;
		}
	}


	function all_services()
	{

		$query =  $this->db->get('service')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->service.'">'.$data->service.'</option>';
			echo $select;
		}
	}

	function all_sla()
	{

		$query =  $this->db->get('sla')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->sla.'">'.$data->sla.'</option>';
			echo $select;
		}
	}
	
	function lookup_sla_by_name()
	{
		
		$query =  $this->db->get('sla')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->sla.'">'.$data->sla.'</option>';
			echo $select;
		}
	}


	function lookup_total_users()
	{
		$select="SELECT count(*) as total FROM customer_user";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
	}

	function lookup_total_ticket()
	{
		$select="SELECT count(*) as total FROM td_register_ticket";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
	}

	function lookup_widget_news()
	{
		$item ='';
		$this->db->where('status','Valid');
		$query =  $this->db->get('announcement')->result();
		foreach ($query as $data) 
		{
			$item .= $data->announcement.' | ';
		}

		if(empty($item)){
			$item = 'Tiada Makluman Hebahan Buat Masa Sekarang..';
		}

		return $item;
	}


	function today_ticket_application()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a 
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE b.queu='Application' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}



	function today_ticket_network()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a 
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE b.queu='Network' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function today_ticket_hardware()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a 
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE b.queu='Hardware' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function today_ticket_software()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a 
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE b.queu='Software' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}


	function today_ticket_helpdesk()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a 
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE b.queu='Helpdesk' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}


	function today_ticket_new()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='new' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function today_ticket_open()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='open' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function today_ticket_pending()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='pending' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function today_ticket_closed()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='closed' AND DATE(a.created_date)=CURDATE()
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}


	function t7_ticket_new()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='new' AND a.created_date >= DATE(NOW()) - INTERVAL 7 DAY
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function t7_ticket_open()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='open' AND a.created_date >= DATE(NOW()) - INTERVAL 7 DAY
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function t7_ticket_pending()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='pending' AND a.created_date >= DATE(NOW()) - INTERVAL 7 DAY
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function t7_ticket_closed()
	{
		$select="	SELECT count(*) as total FROM td_register_ticket as a
					WHERE a.status_ticket='closed' AND a.created_date >= DATE(NOW()) - INTERVAL 7 DAY
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	echo $total;
            } 
        }
	}

	function list_ticket_new()
	{
		$select="	SELECT a.id_ticket,a.created_date,b.title FROM td_register_ticket as a
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE a.status_ticket='new'
					LIMIT 20
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$id_ticket = $data->id_ticket;
              	$created_date = $data->created_date;
              	$title = $data->title;
            	echo '
            			<tr>
		                  <td><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$id_ticket.'" title="'.$created_date.' -> '.$title.'" style="color:black">'.$id_ticket.'</a></td>
		                  <td style="padding-left: 100px;"><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$id_ticket.'" title="'.$created_date.' -> '.$title.'" style="color:black"><i class="fa fa-edit"> </i></a></td>
		                </tr>
            		 ';
            } 
        }
	}


	function list_ticket_open()
	{
		$select="	SELECT a.id_ticket,a.created_date,b.title FROM td_register_ticket as a
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE a.status_ticket='open'
					LIMIT 20
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$id_ticket = $data->id_ticket;
              	$created_date = $data->created_date;
              	$title = $data->title;
            	echo '
            			<tr>
		                  <td><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$id_ticket.'" title="'.$created_date.' -> '.$title.'" style="color:black">'.$id_ticket.'</a></td>
		                  <td style="padding-left: 100px;"><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$id_ticket.'" title="'.$created_date.' -> '.$title.'" style="color:black"><i class="fa fa-edit"> </i></a></td>
		                </tr>
            		 ';
            } 
        }
	}


	function list_ticket_closed()
	{
		$select="	SELECT a.id_ticket,a.created_date,b.title FROM td_register_ticket as a
					LEFT JOIN  td_parent_note as b ON a.id_ticket = b.id_ticket
					WHERE a.status_ticket='closed'
					LIMIT 20
				";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$id_ticket = $data->id_ticket;
              	$created_date = $data->created_date;
              	$title = $data->title;
            	echo '
            			<tr>
		                  <td><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$id_ticket.'" title="'.$created_date.' -> '.$title.'" style="color:black">'.$id_ticket.'</a></td>
		                  <td style="padding-left: 100px;"><a href="'.base_url().'Ticket/Ticket_DetailTicket/'.$id_ticket.'" title="'.$created_date.' -> '.$title.'" style="color:black"><i class="fa fa-edit"> </i></a></td>
		                </tr>
            		 ';
            } 
        }
	}

	function list_top10_problem()
	{
		$select="	
					SELECT problem_desc_itsm, count(*) as total
				    FROM td_register_ticket
				    GROUP BY problem_desc_itsm
				    ORDER BY count(*) DESC
				    LIMIT 5
				";
    	$query = $this->db->query($select);
        //echo '<ul class="list-group">';
        
    	echo '
    			<div class="panel-group">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" href="#collapse1">Top 5 Problem</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse in">
				      		<ul class="list-group">
    		 ';
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$item = $data->problem_desc_itsm;
            	$total = $data->total;

            	if($item==''){
            		$item = 'Not Declared';
            	}

            	echo '
            			<li class="list-group-item">'.$item.' <span class="badge">'.$total.'</span></li>
            		 ';
            }
        }
        //echo '</ul><br>';
        echo '
        					</ul>
        			</div>
        			</div>
  				</div>
        	 ';
	}

	function datalist_knowledgebase()
	{
		$query =  $this->db->get('knowledgebase')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->headline.'">'.$data->headline.'</option>';
			echo $select;
		}
	}

	function category_knowledgebase()
	{
		$query =  $this->db->get('knowledgebase')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->category.'">'.$data->category.'</option>';
			echo $select;
		}
	}

	function Knowledgebase_recommend($id){
		$this->db->where('id_kb !=',$id);
		$this->db->order_by('rand()');
		$this->db->limit('3');
		$query =  $this->db->get('knowledgebase')->result();
		foreach ($query as $data) 
		{
			$select = '<a href="'.base_url().'knowledgebase/topic/'.$data->id_kb.'"><li>'.$data->headline.'</li></a>';
			echo $select;
		}
	}


	function status_lock_ticket($id)
	{
		$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{	
			echo $data->status_lock;
		}
	}

	function status_lock_ticket_return($id)
	{
		$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			return $data->status_lock;
		}
	}

	function lock_ticket_by($id)
	{
		$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			echo $data->lock_by;
		}
	}

	function lock_ticket_by_return($id)
	{
		$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			return $data->lock_by;
		}
	}


	function send_notice_view_title($id)
	{
		$this->db->where('id',$id);
		$query =  $this->db->get('net_send')->result();
		foreach ($query as $data) 
		{
			echo $data->title;
		}
	}


	function send_notice_view_note($id)
	{
		$this->db->where('id',$id);
		$query =  $this->db->get('net_send')->result();
		foreach ($query as $data) 
		{
			echo $data->note;
		}
	}


	function send_notice_view_title_schedule($id)
	{
		$this->db->where('id',$id);
		$query =  $this->db->get('net_send_reschedule')->result();
		foreach ($query as $data) 
		{
			echo $data->title;
		}
	}


	function send_notice_view_note_schedule($id)
	{
		$this->db->where('id',$id);
		$query =  $this->db->get('net_send_reschedule')->result();
		foreach ($query as $data) 
		{
			echo $data->note;
		}
	}


	function send_notice_view_date__schedule($id)
	{
		$this->db->where('id',$id);
		$query =  $this->db->get('net_send_reschedule')->result();
		foreach ($query as $data) 
		{
			echo $data->date_schedule;
		}
	}
	

	function qr_code($other_id)
	{
		$qr_code = '';
		$id_qr_code = '';
		$config_id = '';
		$base = base_url().'qr_image/';

		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$config_id = $data->config_id;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('software')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$config_id = $data->config_id;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$config_id = $data->config_id;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}


		$this->db->where('other_id',$other_id);
		$query =  $this->db->get('network')->result();
		foreach ($query as $data) 
		{
			$id_qr_code = $data->qr_code;
			$qr_code = $data->qr_code;
			$config_id = $data->config_id;
			$qr_code = base_url().'qr_image/'.$qr_code;
		}

		if($qr_code==$base){
			$qr_code = '';
		}


		//var_dump($qr_code); exit();

		if(!empty($qr_code)){
			$id_qr_code = "'".$id_qr_code."'";
			echo '	<br><img src="'.$qr_code.'.png" class="img-responsive">
					<br><center><b>'.$config_id.'</b></center>
					<br><a onclick="print_qr('.$id_qr_code.');"><button class="btn btn-warning btn-block"> Print QR Code </button></a>

				 ';	
		}
		

	}

	function lookup_list_note_activities($id)
	{
		$this->db->select('a.id_ticket,a.type_state as type_note,a.id,a.created_date,b.first_name');
		$this->db->where('id_ticket',$id);
		$this->db->join('agent b', 'a.created_by = b.userid', 'left');
		$this->db->order_by("a.id", "desc");
		$query =  $this->db->get('td_child_note a')->result();
		foreach ($query as $data) 
		{
			
			$id_ticket = $data->id_ticket;
			$type_state = $data->type_note;
			$id = $data->id;
			$created_date = $data->created_date;
			$first_name = $data->first_name;

			echo '
					<div class="timeline-entry">
                        <div class="timeline-stat">
                            <div class="timeline-icon"></div>
                        </div>
                        <div class="timeline-label">
                            <h4 class="mar-no pad-btm"><a href="#" class="text-danger">'.$type_state.'</a></h4>
                            <p class="font-small">
                            	<i class="fa fa-user" aria-hidden="true"></i> '.$first_name.' <br>
                            	<i class="fa fa-clock-o" aria-hidden="true"></i> '.$created_date.'
                            </p>
                        </div>
                    </div>
				 ';

		}
	}


	function data_ticket($id)
	{
    	
    	$env_hospital = '';
    	$env_hospital_cat = '';
    	$env_hospital_problem_desc = '';

    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$nodata = 'Not Applicable';
              	
              	$type_ticket = $data->type_ticket;
              	if(empty($type_ticket)){ $type_ticket = $nodata;}

              	$main_line_status = $data->main_status;
              	if(empty($main_line_status)){ $main_line_status = $nodata;}

              	$backup_type = $data->backup_type;
              	if(empty($backup_type)){ $backup_type = $nodata;}

              	$backup_status = $data->backup_status;
              	if(empty($backup_status)){ $backup_status = $nodata;}

              	$pending_date = $data->pending_date; 
              	if(empty($pending_date)){ $pending_date = $nodata;}
              	
              	$impact = $data->impact;
              	if(empty($impact)){ $impact = $nodata;}

              	$priority = $data->priority;
              	if(empty($priority)){ $priority = $nodata;}

              	$itsm_category = $data->itsm_category;
              	if(empty($itsm_category)){ $itsm_category = $nodata;}

              	if($type_ticket=='email'){
              		$type_ticket='Email';
              	}

              	if($type_ticket=='phone'){
              		$type_ticket='Phone';
              	}


              	$type_enviroment = $data->type_enviroment;
              	$severity = $data->severity;
              	$ref_no = $data->ref_no;
              	$id_ticket = $data->id_ticket;
              	$fault_itsm_category = $data->fault_itsm_category;
              	$env_hospital_problem_desc = $data->problem_desc_itsm;
              	//if(empty($type_enviroment)){ $type_enviroment = $nodata;}

              	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

              	if($type_enviroment=='hospital'){

              		$label_ref = 'Device No';

              		$env_noc =  '';

		            $env_hospital_cat = $fault_itsm_category;




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

				  

				           	$env_hospital = '<div class="col-md-6" style="padding-left: 0px;"><p class="font-smaller">Severity :'.$icon.' '.$title.' - '.$minute.'minute</p></div>';
				            



				        } else {
				        	$env_hospital = '';
				        	$env_hospital_cat = '';
				        	$env_hospital_problem_desc = '';
				        }
              		}

              	} else {

              		$label_ref = 'Reference Number';

              		
              		$env_noc = '
              						<div class="col-md-6" style="padding-left: 0px;">
				                       <p class="font-smaller">Main Line Status : '.$main_line_status.'</p>
				                    </div>
				                    <div class="col-md-6" style="padding-left: 0px;">
				                       <p class="font-smaller">Backup Type : '.$backup_type.'</p>
				                    </div>
				                    <div class="col-md-6" style="padding-left: 0px;">
				                       <p class="font-smaller">Backup Status : '.$backup_status.'</p>
				                    </div>
				                    <div class="col-md-6" style="padding-left: 0px;">
				                       <p class="font-smaller">Pending Date : '.$pending_date.'</p>
				                    </div>
              				   ';


              		$env_hospital = '';
              		$env_hospital_cat = '';
              		$env_hospital_problem_desc = '';
              	}


              	
              	


              	$master_tt = $this->data_masterTT($id);

              	




              	echo 
              	'
              		  <div class="col-md-6" style="padding-left: 0px;">
                        <p class="font-smaller">Ticket Number : '.$id_ticket.'</p>
                      </div>
                      <div class="col-md-6" style="padding-left: 0px;">
                        <p class="font-smaller">Device No : '.$ref_no.'</p>
                      </div>
                      '.$master_tt.'
                      <div class="col-md-6" style="padding-left: 0px;">
                        <p class="font-smaller">Type : '.$type_ticket.'</p>
                      </div>
                      <div class="col-md-6" style="padding-left: 0px;">
                        <p class="font-smaller">Problem Description : '.$env_hospital_problem_desc.'</p>
                      </div>
                      '.$env_hospital.'
                      '.$env_noc.'
                      <div class="col-md-6" style="padding-left: 0px;">
                        <p class="font-smaller">Impact : '.$impact.'</p>
                      </div>
                      <div class="col-md-6" style="padding-left: 0px;">
                        <p class="font-smaller">Priority : '.$priority.'</p>
                      </div>
                      <div class="col-md-6" style="padding-left: 0px;">
                        <p class="font-smaller">ITSM Category : '.$itsm_category.'</p>
                      </div>


              	';


            }
        } 

    }

    function data_masterTT($id)
    {
    	$select = "	SELECT * 
    				FROM ms_link_ticket as a
    				WHERE a.id_ticket_single='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
            	$nodata = 'Not Applicable';
              	$id_ticket_master = $data->id_ticket_master;
            }
            $icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            return  '
            			<div class="col-md-6" style="padding-left: 0px;">
                        	<p class="font-smaller">Master TT : '.$id_ticket_master.'</p>
                        </div>
            		';
        }
    }

	function data_customer($id)
	{
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$cat = $data->category;

            	$nodata = 'Not Applicable';
            	$service = $data->service;
            	if(empty($service)){ $service = $nodata;}
            	$sla = $data->sla;
            	if(empty($sla)){ $sla = $nodata;}
            	$location = $data->location;
            	if(empty($location)){ $location = $nodata;}
            	$custID = $data->custID;
            	if(empty($custID)){ $custID = $nodata;}

            	$extension_no = $data->extension_no;
            	if(empty($extension_no)){ $extension_no = $nodata;}

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            	$select = "	SELECT DISTINCT b.first_name,b.title_salutation,b.mobile,a.custUser as custUser,b.phone
    				FROM td_child_custuser as a
    				LEFT JOIN customer_user as b ON a.custUser = b.other_id
    				WHERE a.id_ticket='$id' AND b.valid='Valid'";
            	$query = $this->db->query($select);
        	
        		$namo = '';
        		$phone = '';
		        if ($query->num_rows() >0){ 



		        	
		        	$t1 = '<div class="col-md-6" style="padding-left: 0px;">
		        			<p class="font-smaller">
                        	Customer User :';
                            
		            foreach ($query->result() as $data) {
		            	$title = $data->title_salutation;
		            	$name = $data->first_name;
		            	$mobile = $data->mobile;
		            	$x = $data->custUser;

		            	$phone = $data->phone;
		            	if(empty($phone)){
		            		$phone='Not Applicable';
		            	}
		        		
		        		$link = base_url().'Customer/CMC_Form/'.$x;
		            

		            	if((empty($mobile))||($mobile=='0')){
		            		$mobile='';
		            	} else {
		            		$mobile='('.$mobile.')';
		            	}

		            	$name = $title.' '.$name;
		            	$namo .= '<a href="'.base_url().'/Customer/CMC_Form/'.$x.'"><br><b><font color="orange">'.$name.'</font></b></a>';
		            }

		            $t2 = '  
	                            </p>
	                        </div>
	                      ';

	                $namo  = $t1.$namo.$t2;

		       	}


		       
		       	// get services link 
		       	$link_service = $this->get_services_link($service,$cat);

		       	// get sla link 
				$link_sla = $this->get_sla_link($sla);

				// get location link 
				$link_location = $this->get_location_link($location);

				// get custID link 
				$link_custID = $this->get_custID_link($custID);




              	echo '	
              			<a href="'.$link_service.'" class="product-title">
              			  <div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">Service : '.$service.'</p>
	                      </div>
	                    </a>
	                    <a href="'.$link_sla.'" class="product-title">
	                      <div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">SLA : '.$sla.'</p>
	                      </div>
	                    </a>
	                    <a href="'.$link_location.'" class="product-title">
	                      <div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">Location : '.$location.'</p>
	                      </div>
	                    </a>
	                    <a href="'.$link_custID.'" class="product-title">
	                      <div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">Customer ID : '.$custID.'</p>
	                      </div>
	                    </a>
	                      '.$namo.'
	                    <a href="'.$link_custID.'" class="product-title">
	                      <div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">Phone No : '.$phone.'</p>
	                      </div>
	                    </a>
	                    <a href="'.$link_custID.'" class="product-title">
	                      <div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">Extension No : '.$extension_no.'</p>
	                      </div>
	                    </a>
              		 ';

            }
        }
    }

	function data_asset($id)
	{
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$loc = $data->category;
            	$cat = $data->category;
            	$ref = $data->ref_no;

            	$name_com = "'".$ref."'";

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

            	if($cat=='Network'){
		    		$cat = "SELECT other_id as other_id FROM network 
		    				WHERE lv_no='$ref' OR ps_no='$ref' OR bs_no='$ref' OR dq_no='$ref' OR service_number='$ref'
		    			   ";
		    		$url = "CMDB/CMDB_Network_EditDetails/"; 	
		    		$remote = '';
		    	} else if($cat=='Hardware'){
		    		$cat = "SELECT other_id as other_id FROM hardware WHERE name='$ref'";
		    		$url = "CMDB/CMDB_Hardware_EditDetails/";
		    		$remote = '';
		    	} else if($cat=='Computer'){
		    		$cat = "SELECT other_id as other_id FROM computer WHERE name='$ref'";
		    		$url = "CMDB/CMDB_Computer_EditDetails/";
		    		$remote = $name_com;
		    	} else if($cat=='Software'){
		    		$cat = "SELECT other_id as other_id FROM software WHERE serial_number='$ref'";
		    		$url = "CMDB/CMDB_Software_EditDetails/";
		    		$remote = '';
		    	} else {
		    		$cat ='';
		    		$url ='';
		    		$remote = '';
		    	}



		    	if(!empty($cat))
		    	{
		    		$query = $this->db->query($cat);
        
			        if ($query->num_rows() >0){ 
			            foreach ($query->result() as $data) {

			            	$other_id = $data->other_id;

			            	$link = $url.$other_id;

			            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';


			            	if(!empty($remote)){
			            		// $remote = '
					            //             <a href="'.$remote.'" class="product-title">
					            //             	Remote :
					            //             	<span class="product-description">
					            //                   '.$icon.' <b><font color="orange">Remote</font></b><br>
					            //                 </span>
					            //             </a>
			            		// 		  ';


			            	

			            		$remote = '	
			            					<a onclick="remote('.$remote.')" class="product-title">
				            					<div class="col-md-6" style="padding-left: 0px;">
			                                        <p class="font-smaller">Connect To Remote</p>
			                                     </div>
			                                </a>
			            				  ';

			            	} else {
			            		$remote;
			            	}


			            	$env = $this->session->userdata('env');

			            	if($env=='hospital'){
			            		
			            	} else {
			            		$remote='';
			            	}


				              	echo 
				              	'
				              		

				                    <a href="'.base_url().$link.'" class="product-title">
				                    <div class="col-md-6" style="padding-left: 0px;">
	                                   <p class="font-smaller">Asset/Inventory : '.$loc.'</p>
	                                </div>
	                                </a>
				                    '.$remote.'
				                ';

				            

			            	

			            }
			        }
		    	}



            }
        }
    }

	function data_agent($id)
	{
    	$select = "	SELECT * 
    				FROM td_register_ticket as a
    				WHERE a.id_ticket='$id'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	$owner = $data->ticket_owner;
            	$resp = $data->ticket_responsibilty;

            	$icon = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';

             


                echo '
                		<div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">Owner : <br>'.$owner.'</p>
	                    </div>
	                    <div class="col-md-6" style="padding-left: 0px;">
	                        <p class="font-smaller">Responsibility : <br>'.$resp.'</p>
	                    </div>
                	 ';
           	}
        }
    }


    function lock_by($id)
    {
    	
    	//var_dump($id); exit();
    	$this->db->where('status_lock','1');
    	$this->db->where('lock_by !=','');
    	$this->db->where('id_ticket',$id);
		$query =  $this->db->get('td_register_ticket')->result();
		foreach ($query as $data) 
		{
			echo '<span class="font-small"><i class="fa fa-lock text-danger"></i> '.$data->lock_by.' </span>';
		} 

		if(empty($data)){
			echo '<span class="pull-right font-small"><a onclick="active_lock();" ><i class="fa fa-key" aria-hidden="true"></i> Lock Ticket</a></span><br>';
		}
    	
    }


    function option_ward()
    {
    	$this->db->order_by('name');
    	$query =  $this->db->get('location')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
    }


    function lookup_hostname_pc()
    {
    	$this->db->order_by('name');
    	$query =  $this->db->get('computer')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">';
			echo $select;
		}
    }


    function lookup_customer_user_datalist()
    {
    	$this->db->order_by('first_name');
    	$query =  $this->db->get('customer_user')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->first_name.'">';
			echo $select;
		}
    }

    function lookup_hostname_hardware()
    {
    	$this->db->order_by('name');
    	$query =  $this->db->get('hardware')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">';
			echo $select;
		}
    }


    function topic_chat($id)
    {
    	$this->db->where('id_chat',$id);
    	$query =  $this->db->get('group_chat_register')->result();
		foreach ($query as $data) 
		{
			echo $data->group_name;
		}
    }


    function popular_problem()
    {
    	$select="
    				SELECT count(*) as total,problem_desc_itsm FROM td_register_ticket
					GROUP BY problem_desc_itsm
					ORDER BY total DESC
					LIMIT 6

    			";
    	$query = $this->db->query($select);
        
        $result = '';
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$result .= '{label: "'.$data->problem_desc_itsm.'", value: '.$data->total.'},';
            } 

            echo $result;
        }
    }


    function popular_department()
    {
    	$select="
    				SELECT count(*) as total,fault_itsm_category FROM td_register_ticket
					GROUP BY fault_itsm_category
					ORDER BY total DESC
					LIMIT 4

    			";
    	$query = $this->db->query($select);
        
        $result = '';
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$result .= '{label: "'.$data->fault_itsm_category.'", value: '.$data->total.'},';
            } 

            echo $result;
        }
    }


    function data_date_ticket()
    {
    	$select="
    				SELECT COUNT(*) AS total,YEAR(created_date),MONTH(created_date) as Month
					FROM td_register_ticket
					where YEAR(created_date) = YEAR(CURDATE())
					GROUP BY YEAR(created_date), MONTH(created_date)
					ORDER BY created_date ASC

    			";
    	$query = $this->db->query($select);
        
        $result = '';
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	switch ($data->Month) {
            		case '1':
            			$month = 'Jan';
            			break;
            		case '2':
            			$month = 'Feb';
            			break;
            		case '3':
            			$month = 'Mac';
            			break;
            		case '4':
            			$month = 'Apr';
            			break;
            		case '5':
            			$month = 'May';
            			break;
            		case '6':
            			$month = 'Jun';
            			break;
            		case '7':
            			$month = 'Jul';
            			break;
            		case '8':
            			$month = 'Aug';
            			break;
            		case '9':
            			$month = 'Sep';
            			break;
            		case '10':
            			$month = 'Oct';
            			break;
            		case '11':
            			$month = 'Nov';
            			break;
            		case '12':
            			$month = 'Dec';
            			break;
            		
            		default:
            			# code...
            			break;
            	}

              	$result .= 	'
              					{
						            year: "'.$month.'",
						            value: '.$data->total.'
						        },
              				';

            } 

            echo $result;
        }
    }



    function check_fl($id_ticket)
    {
    	$select="SELECT count(*) as total FROM td_child_note WHERE type_note='first_level' AND id_ticket='$id_ticket'";
    	$query = $this->db->query($select);
        
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
              	$total = $data->total;
            	return $total;
            } 
        }
    }


    function lookup_level()
    {
    	$query =  $this->db->get('lookup_level')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->level_name.'">'.$data->level_name.'</option>';
			echo $select;
		}
    }


    function lookup_department()
    {
    	$this->db->group_by('department_name');
    	$query =  $this->db->get('lookup_department')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->department_name.'">'.$data->department_name.'</option>';
			echo $select;
		}
    }


    function ppm_2_ackowledge($ppm_id,$hostname)
    {
    	$this->db->where('hostname',$hostname);
    	$this->db->where('type_ppm_activity',$ppm_id);
    	$query =  $this->db->get('ppm_register')->result();
		$ack = '';
		foreach ($query as $data) 
		{
			$ack = $data->acknowledge;
		}

		return $ack;

    }


    function ppm_2_date($ppm_id,$hostname)
    {
    	//var_dump($ppm_id);
    	$this->db->where('hostname',$hostname);
    	$this->db->where('type_ppm_activity',$ppm_id);
    	$query =  $this->db->get('ppm_register')->result();
		$date = '';
		foreach ($query as $data) 
		{
			$date = $data->created_date;
			//$date = substr($data->created_date, 0, -9);
		}

		return $date;
    }

    function ppm_2_id_number($ppm_id,$hostname)
    {
    	$this->db->where('hostname',$hostname);
    	$this->db->where('type_ppm_activity',$ppm_id);
    	$query =  $this->db->get('ppm_register')->result();
		$date = '';
		foreach ($query as $data) 
		{
			$date = $data->id_number;
		}

		return $date;
    }


    function get_name_activity($ppm_id)
    {
    	$this->db->where('id',$ppm_id);
    	$query =  $this->db->get('ppm2_activity')->result();
		$activitiy_name = '';
		foreach ($query as $data) 
		{
			$activitiy_name = $data->activitiy_name;
		}

		return $activitiy_name;
    }

    function lookup_customer_user_option()
    {
    	$this->db->order_by('first_name');
    	$query =  $this->db->get('customer_user')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->first_name.'">'.$data->first_name.'</option>';
			echo $select;
		}
    }


    function ppm_2_status($ppm_id,$hostname)
    {
    	$this->db->where('hostname',$hostname);
    	$this->db->where('type_ppm_activity',$ppm_id);
    	$query =  $this->db->get('ppm_register')->result();
		$ppm_status = 'Not Yet';
		foreach ($query as $data) 
		{
			$ppm_status = $data->status_ppm;
		}

		return $ppm_status;
    }


    function check_endorse($group,$agent)
    {
  //   	$this->db->select('count(*) as total');
		// $this->db->where('group_agent',$group);
		// $this->db->where('module','PPM_Endorse');
		// $this->db->where('agent',$agent);
		// $query =  $this->db->get('agent_module')->result();
		// $no='1';
		// foreach ($query as $data) 
		// {
		// 	return $total = $data->total;
		// }


		// SELECT COUNT(*) As TOTAL 
		// FROM agent as a 
		// LEFT JOIN agent_module as b ON a.group_name = b.group_agent
		// WHERE b.module='PPM_Verify' and b.group_agent='PPM Verifier' and a.userid='13858'


		$select = "
						SELECT COUNT(*) As TOTAL 
						FROM agent as a 
						LEFT JOIN agent_module as b ON a.group_name = b.group_agent
						WHERE b.module='PPM_Endorse' and b.group_agent='$group' and a.userid='$agent' and b.validity='Valid'
				  ";

		//var_dump($select);
		$query= $this->db->query($select);
		$total = 0;
        if ($query->num_rows() >0){
        	foreach ($query->result() as $data) {
        		$total = $data->TOTAL;
        	}
        }

        return $total;
    }


    function check_verify($group,$agent)
    {
    	$select = "
						SELECT COUNT(*) As TOTAL 
						FROM agent as a 
						LEFT JOIN agent_module as b ON a.group_name = b.group_agent
						WHERE b.module='PPM_Verify' and b.group_agent='$group' and a.userid='$agent' and b.validity='Valid'
				  ";
		$query= $this->db->query($select);
		$total = 0;
        if ($query->num_rows() >0){
        	foreach ($query->result() as $data) {
        		$total = $data->TOTAL;
        	}
        }

        return $total;
    }


    function check_team($group,$agent)
    {
    	$select = "
						SELECT COUNT(*) As TOTAL 
						FROM agent as a 
						LEFT JOIN agent_module as b ON a.group_name = b.group_agent
						WHERE b.module='PPM_TEAM' and b.group_agent='$group' and a.userid='$agent' and b.validity='Valid'
				  ";
		$query= $this->db->query($select);
		$total = 0;
        if ($query->num_rows() >0){
        	foreach ($query->result() as $data) {
        		$total = $data->TOTAL;
        	}
        }

        return $total;
    }


    function check_PPM_Verify_Network_Server($group,$agent)
    {
    	$select = "
						SELECT COUNT(*) As TOTAL 
						FROM agent as a 
						LEFT JOIN agent_module as b ON a.group_name = b.group_agent
						WHERE b.module='PPM_Verify_Network_Server' and b.group_agent='$group' and a.userid='$agent' and b.validity='Valid'
				  ";
		$query= $this->db->query($select);
		$total = 0;
        if ($query->num_rows() >0){
        	foreach ($query->result() as $data) {
        		$total = $data->TOTAL;
        	}
        }

        return $total;
    }


    function status_ppm_register($hostname,$ppm_id)
    {
    	$hostname = hex2bin($hostname);
    	$ppm_id = hex2bin($ppm_id);
    	
    	$this->db->where('hostname',$hostname);
    	$this->db->where('type_ppm_activity',$ppm_id);
    	$query =  $this->db->get('ppm_register')->result();
		$ppm_status = 'Not Yet';
		foreach ($query as $data) 
		{
			$ppm_status = $data->status_ppm;
		}

		return $ppm_status;
    }


    function lookup_location_name()
	{
		$query =  $this->db->get('location')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->name.'">'.$data->name.'</option>';
			echo $select;
		}
	}


	function list_email_team_it()
	{
		$this->db->where('group_name','Endorser PPM');
		$query =  $this->db->get('agent')->result();
		foreach ($query as $data) 
		{
			$select = '<option value="'.$data->email.'">'.$data->first_name.'</option>';
			echo $select;
		}
	}
}