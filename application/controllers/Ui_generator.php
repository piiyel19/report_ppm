<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Ui_generator extends CI_Controller {

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->model('Ui_generator_model','Ui_generator'); 



    // $base_img = 'https://scanner.gadingtech.com/qr_code/nav/details_item/';

  }


	function index()
	{
		echo 'Hello';
	}


	function din()
	{
		
	}


	function computer()
	{
  	  // contoh guna method post 
  	  $param = $this->input->post('param'); // sambut param field 

	    // import library 
      $this->load->library("excel");
      $object = new PHPExcel();
      $object->setActiveSheetIndex(0);


      //start dari sini nak buat HEADER
      // bila sebut array dia akan bermula dengan 0
      $table_columns = array("Hostname", "Responsible", "Perform Date", "Ppm Device", "Status");

      $column = 0;

      //paparkan - panggil tables columns
      // dia kenal dalam table column ada 4 kalau lebih 4 dia xbuat kira done
      foreach($table_columns as $field)
      {
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
         // columns ada nya field 
         // 0 table_columns[0] merujuk kepada Name 
         // dia ganti table_columns[1] merujuk kepad Address
         $column++; //tambah 1
         // dia akan auto tambah selepas dia operate 0 tadi 
         // papar 

         // column tadi tambah 1 
      }

      // END 



      // DATA NAK PAPAR
      // $excel_row = 2;

      // $data = 'No Data';
      // $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $data);
      // $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $data);
      // $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $data);
      // $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $data);
      // $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $data);


      $query = $this->Ui_generator->test_data($param);

      // sama mcm foreach 
      if ($query->num_rows() >0){ 
      	$excel_row = 2;
        foreach ($query->result() as $data) {

    	    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $data->hostname);
	        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $data->responsible);
	        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $data->perform_date);
	        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $data->ppm_device);
	        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $data->status);


        	$excel_row++; // dia akan tambah 1
        }
      }


      $rand = rand();

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="tracker_'.$rand.'.xls"');
      //ob_end_clean();
      //ob_start();
      $object_writer->save('php://output'); // generate excel
    }


    function sample_ui()
    {
    	$this->load->view('sample_ui');
    }

    function workstation()
    {
      // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/
      
      $style = $styleArray = [
        'font' => [
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'FFA0A0A0',
            ],
        ],
      ];

      $style2 = $styleArray = [
        'font' => [
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'FFFF0000',
            ],
        ],
      ];

      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Item Description');
      $sheet->setCellValue('B1', 'Model');
      $sheet->setCellValue('C1', 'Serial Number');
      $sheet->getStyle('A1:C1')->applyFromArray($style);
      $sheet->getStyle('C2')->applyFromArray($style2);
      $sheet->getStyle('D2')->applyFromArray($style2);
      $sheet->setCellValue('C2', 'AV');
      $sheet->setCellValue('D2', 'UPS');
      $sheet->mergeCells('C1:D1');
      $sheet->mergeCells('A1:A2');
      $sheet->mergeCells('B1:B2');
     
      $writer = new Xlsx($spreadsheet);
     
      $filename = 'workstation';
     
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
      header('Cache-Control: max-age=0');
     
      $writer->save('php://output'); // download file 
    }

    function server()
    {
      // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/
      
      $style = $styleArray = [
        'font' => [
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'FFA0A0A0',
            ],
        ],
      ];

      $style2 = $styleArray = [
        'font' => [
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'FFFF0000',
            ],
        ],
      ];

      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Item Description');
      $sheet->setCellValue('B1', 'Model');
      $sheet->setCellValue('C1', 'Serial Number');
      $sheet->getStyle('A1:C1')->applyFromArray($style);
      $sheet->getStyle('C2')->applyFromArray($style2);
      $sheet->getStyle('D2')->applyFromArray($style2);
      $sheet->setCellValue('C2', 'AV');
      $sheet->setCellValue('D2', 'UPS');
      $sheet->mergeCells('C1:D1');
      $sheet->mergeCells('A1:A2');
      $sheet->mergeCells('B1:B2');
     
      $writer = new Xlsx($spreadsheet);
     
      $filename = 'server';
     
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
      header('Cache-Control: max-age=0');
     
      $writer->save('php://output'); // download file 
    }
}