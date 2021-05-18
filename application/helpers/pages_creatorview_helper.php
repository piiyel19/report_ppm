 <?php

  function create_new_view($page_name, $select, $nama_function, $controller_name){

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

	if($select=='1'){ // form 
		$page_content ='

		  <div class="content-wrapper">
		    <section class="content">
		      <div class="row">

		        <div class="col-md-6">  
		          A
		        </div>  

		        <div class="col-md-6"> 
		          B
		        </div>
		          
		      </div>
		    </section>
		  </div>
		';
	} else { // datatables
		$page_content ='
		  <div class="content-wrapper">
		    <section class="content">
		      <div class="row">

		        <div class="col-md-6">  
		          A
		        </div>  

		        <div class="col-md-6"> 
		          B
		        </div>
		          
		      </div>
		    </section>
		  </div>
		';
	} 

	fwrite($page, "\n". $page_content);
	fclose($page);
	// END
  }
?>
