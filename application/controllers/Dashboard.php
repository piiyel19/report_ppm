<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('datatables');
		$this->load->model('Login_model','login');
		$this->load->helper('Lookup_helper'); //helpers
		$this->load->model('Dbase_lookup','lookup');
		$this->load->model('Admin_model','Admin'); 
	}

	function index(){
		if((!empty($this->session->userdata('logged_in'))))
		{
			$this->load->view('templates_report/header/header');
			$this->load->view('templates_report/body/dashboard_v2');
			$this->load->view('templates_report/footer/footer');
		} else {
	      redirect('login');
	    }
	}

	function menu_asset_report(){
		if((!empty($this->session->userdata('logged_in'))))
		{
			$this->load->view('templates_report/header/header');
			$this->load->view('templates_report/body/menu_asset_report');
			$this->load->view('templates_report/footer/footer');
		} else {
	      redirect('login');
	    }
	}

	function menu_progress_report(){
		if((!empty($this->session->userdata('logged_in'))))
		{
			$this->load->view('templates_report/header/header');
			$this->load->view('templates_report/body/menu_progress_report');
			$this->load->view('templates_report/footer/footer');
		} else {
	      redirect('login');
	    }
	}

}