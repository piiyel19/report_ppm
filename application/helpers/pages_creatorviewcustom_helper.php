 <?php

  function create_new_view($page_name, $nama_function, $controller_name,$page_content,$title){

  	// START ADD FUNCTION
  	$controller = fopen(APPPATH.'controllers/'.$controller_name.'.php', "a")
  	or die("Unable to open file!");

  	$log = 'logged_in';
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
					<div class="content-wrapper">
						<section class="content">
							<h3> {{ Nama Module }} </h3>
							<div class="row">

								<div class="col-md-2">
									<div class="form-group">
									<a href="<?=base_url()?>Admin/Role_ViewList"><button class="btn btn-success btn-block"> Go To Overview</button></a>
									</div>
								</div>

								<div class="col-md-10">

									<div class="box box-success">
							          <div class="box-header with-border">
							            <h3 class="box-title"> <b>'.$title.'</b> </h3>
							          </div>
							          <div class="box-body">
				 ';


	foreach ($page_content as $data) 
	{
				$label = $data->label;
				$type = $data->type;
				$code = $data->code;
				$id_field = $data->id_field;

				if($type=='text'){
					$code = '
									<div class="form-group">
					                  <label for="exampleInputEmail1">'.$label.'</label>
					                  '.$code.'
					                </div>
							';
				} else if($type=='dropdown'){
					$code = '
									<div class="form-group">
	                  					<label for="exampleInputEmail1">'.$label.'</label>
	                  					'.$code.'
					                </div>
							';
				} else if($type=='textarea'){
					$code = '
									<div class="form-group">
	                  					<label for="exampleInputEmail1">'.$label.'</label>
	                  					'.$code.'
					                </div>
							';
				} else if($type=='radio'){
					$code = '
								
					                  <div class="radio">
					                    <label>'.$code.''.$label.'</label>
					                  </div>
				                
							';
				} else if($type=='checkbox'){
					$code = '	
								
					                  <div class="checkbox">
					                    <label>'.$code.''.$label.'</label>
					                  </div>
				                
							';
				}

				$page_content .= $code;

				//js
				$variable .=	'var '.$id_field.' = $("#'.$id_field.'").val();';
				$array_data .=	'"'.$id_field.'" : '.$id_field.',';

	}


	$footer_box = '			
										<div class="form-group">
							            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
							            	<button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
							            </div>

									  </div>
									</div>
								</div>
							</div>
						</section>
					</div>
	 			  ';


	$header_js = '<script type="text/javascript">';
	$body_js = '
				function submit()
				{
					'.$variable.'
					var data = 	{
									'.$array_data.'
									
								}

					$.ajax({
			                    url: "<?= base_url() ?>'.$controller_name.'/namafucntion",
			                    type: "POST",
			                    dataType: "html",
			                    data: data,
			                    beforeSend: function() {

			                    },
			                    success: function(response){

			                    }
			            });

				}

				function cancel()
			 	{
			 		location.reload();
			 	}
			';
	$footer_js = '</script>';
	$js = $header_js.$body_js.$footer_js;

	$page_content = $heder_box.$page_content.$footer_box.$js;

	fwrite($page, "\n". $page_content);
	fclose($page);
	// END
  }
?>
