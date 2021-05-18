 <?php

  function create_new_view($page_name, $nama_function, $controller_name,$page_content,$title){

  	// START ADD FUNCTION
  	$controller = fopen(APPPATH.'controllers/'.$controller_name.'.php', "a")
  	or die("Unable to open file!");

  	$controller_content ="

  		/* UNCOMMENT IF USED (Please insert in Class)*/
  		/*
		public function $nama_function()
		{

				\$this->data['site_title'] = '$page_name';
				\$this->load->view('template/header/header');
				\$this->load->view('template/body/$page_name/$page_name',\$this->data);
				\$this->load->view('template/footer/footer');

		}
		*/
		/* END */

 	";
 	fwrite($controller, "\n". $controller_content);
  	fclose($controller);
  	// END


   	// CREATE UI
	$path=APPPATH.'views/template/body/'.$page_name;
	if(!is_dir($path)) //create the folder if it's not already exists
	{
		mkdir($path,0755,TRUE);
	} 

	// Create Twig Page
	$page = fopen(APPPATH.'views/template/body/'.$page_name.'/'.$page_name.'.php', "a") or die("Unable to    
	open file!"); 

	$heder_box = '	
					<!-- DataTables -->
  					<link rel="stylesheet" href="'.base_url().'asset_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
					
					<div class="content-wrapper">
						<section class="content">
							<div class="row">
								<div class="col-md-12">

									<div class="box box-success">
							          <div class="box-header with-border">
							            <h3 class="box-title"> <b>'.$title.'</b></h3>
							          </div>
							          <div class="box-body">
							          	<table id="mytable2" class="table table-bordered table-striped">
							            	<thead>
							            		<tr>
				 ';


	foreach ($page_content as $data) 
	{
				$col = $data->column_name;

				$code = '
					    	<th>'.$col.'</th>        
						';

				$page_content .= $code;
	}


	$footer_box = '			
													</tr>
												</thead>
												<tbody id="dataList">	            
									            </tbody>
								        </table>
									  </div>
									</div>
								</div>
							</div>
						</section>
					</div>

					<script src="'.base_url().'asset_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
					<script src="'.base_url().'asset_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
					<script type="text/javascript">
						$(function () {
						    $("#mytable2").DataTable()
						})
					</script>
	 			  ';

	$page_content = $heder_box.$page_content.$footer_box;

	fwrite($page, "\n". $page_content);
	fclose($page);
	// END
  }
?>
