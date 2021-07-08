<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Server_generator extends CI_Controller {

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->model('UI_generator_model','Server_generator'); 



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
      
      //STYLINGS
      $style = $styleArray = [
        'font' => [
            'color' => array('rgb' => 'FFFFFF'),
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => '305496',
            ],
        ],
      ];

      $style2 = $styleArray = [
        'font' => [
            'color' => array('rgb' => 'FFFFFF'),
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => 'ED7D31',
            ],
        ],
      ];

      $style3 = $styleArray = [
        'font' => [
            'color' => array('rgb' => 'FFFFFF'),
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => '990000',
            ],
        ],
      ];

      $style4 = $styleArray = [
        'font' => [
            'color' => array('rgb' => '000000'),
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => '70AD47',
            ],
        ],
      ];

      $style5 = $styleArray = [
        'font' => [
            'size' => 9,
            'color' => array('rgb' => '000000'),
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'C6EFCE',
            ],
        ],
      ];
      //

      //INIT SPREADSHEET - one sheet document
      $spreadsheet = new Spreadsheet();
      $spreadsheet->getDefaultStyle()->getFont()->setSize(9);
      $sheet = $spreadsheet->getActiveSheet();
      //

      //CREATE CUSTOM HEADERS
      //Row 1
      $sheet->setCellValue('A1', 'Item Description');
      $sheet->setCellValue('B1', 'Model');
      $sheet->setCellValue('C1', 'Serial Number');
      $sheet->setCellValue('D1', 'Location Code');
      $sheet->setCellValue('E1', 'Room Name');
      $sheet->setCellValue('F1', 'Hostname');
      $sheet->setCellValue('G1', 'Networking');
      $sheet->setCellValue('J1', 'Specification');
      $sheet->setCellValue('M1', 'Monitor');
      $sheet->setCellValue('O1', 'UPS');
      $sheet->setCellValue('P1', 'Windows Version');
      $sheet->setCellValue('Q1', 'Software');
      $sheet->setCellValue('S1', 'Problem');
      $sheet->setCellValue('U1', 'PPM#2');
      $sheet->setCellValue('W1', 'Remarks');
      $sheet->setCellValue('X1', 'Total');

      //Row 2
      $sheet->setCellValue('G2', 'Nodes');
      $sheet->setCellValue('H2', 'Static IP');
      $sheet->setCellValue('I2', 'Mac Address');
      $sheet->setCellValue('J2', 'Processor');
      $sheet->setCellValue('K2', 'Hard Disk');
      $sheet->setCellValue('L2', 'RAM');
      $sheet->setCellValue('M2', 'Model');
      $sheet->setCellValue('N2', 'Serial Number');
      $sheet->setCellValue('Q2', 'OS');
      $sheet->setCellValue('R2', 'MO');
      $sheet->setCellValue('S2', 'AV');
      $sheet->setCellValue('T2', 'UPS');
      $sheet->setCellValue('U2', 'Date');
      $sheet->setCellValue('V2', 'By');
      $sheet->setCellValue('X2', 'Cur');
      $sheet->setCellValue('Y2', 'Dept');

      //Merge
      $sheet->mergeCells('A1:A2');
      $sheet->mergeCells('B1:B2');
      $sheet->mergeCells('C1:C2');
      $sheet->mergeCells('D1:D2');
      $sheet->mergeCells('E1:E2');
      $sheet->mergeCells('F1:F2');
      $sheet->mergeCells('G1:I1');
      $sheet->mergeCells('J1:L1');
      $sheet->mergeCells('M1:N1');
      $sheet->mergeCells('Q1:R1');
      $sheet->mergeCells('S1:T1');
      $sheet->mergeCells('U1:V1');
      $sheet->mergeCells('X1:Y1');

      //Styling
      $sheet->getStyle('A1:A2')->applyFromArray($style);
      $sheet->getStyle('B1:B2')->applyFromArray($style);
      $sheet->getStyle('C1:C2')->applyFromArray($style);
      $sheet->getStyle('D1:D2')->applyFromArray($style);
      $sheet->getStyle('E1:E2')->applyFromArray($style);
      $sheet->getStyle('F1:F2')->applyFromArray($style);
      $sheet->getStyle('G1:I1')->applyFromArray($style);
      $sheet->getStyle('G2')->applyFromArray($style);
      $sheet->getStyle('H2')->applyFromArray($style);
      $sheet->getStyle('I2')->applyFromArray($style);
      $sheet->getStyle('J1:L1')->applyFromArray($style);
      $sheet->getStyle('J2')->applyFromArray($style);
      $sheet->getStyle('K2')->applyFromArray($style);
      $sheet->getStyle('L2')->applyFromArray($style);
      $sheet->getStyle('M1:N1')->applyFromArray($style);
      $sheet->getStyle('M2')->applyFromArray($style);
      $sheet->getStyle('N2')->applyFromArray($style);
      $sheet->getStyle('O1')->applyFromArray($style);
      $sheet->getStyle('O2')->applyFromArray($style);
      $sheet->getStyle('P1')->applyFromArray($style3);
      $sheet->getStyle('P2')->applyFromArray($style3);
      $sheet->getStyle('Q1:R1')->applyFromArray($style);
      $sheet->getStyle('Q2')->applyFromArray($style);
      $sheet->getStyle('R2')->applyFromArray($style);
      $sheet->getStyle('S1:T1')->applyFromArray($style2);
      $sheet->getStyle('S2')->applyFromArray($style2);
      $sheet->getStyle('T2')->applyFromArray($style2);
      $sheet->getStyle('U1:V1')->applyFromArray($style);
      $sheet->getStyle('U2')->applyFromArray($style);
      $sheet->getStyle('V2')->applyFromArray($style);
      $sheet->getStyle('W1:W2')->applyFromArray($style);
      $sheet->getStyle('X1:Y1')->applyFromArray($style);
      $sheet->getStyle('X2')->applyFromArray($style);
      $sheet->getStyle('Y2')->applyFromArray($style);

      //QUERY DATA
      $query = $this->Ui_generator->computer_data("test")->result();
      //

      //DATA MASSAGE AND FILL
      $highestColumn = $sheet->getHighestColumn();
      $dt_init_row = 3;
      $dt_curr_row = $dt_init_row;
      

      $lvl = $query[0]->level;
      $sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$lvl);
      $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
      $dt_curr_row++;

      $dept = $query[0]->department;
      $sheet->setCellValue('A'.$dt_curr_row,$dept);
      $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
      $dt_curr_row++;

      foreach ($query as $row) {
        if($lvl != $row->level){
          $lvl = $row->level;
          $sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$lvl);;
          $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
          $dt_curr_row++;
        }
        if($dept != $row->department){
          $dept = $row->department;
          $sheet->setCellValue('A'.$dt_curr_row,$dept);
          $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
          $dt_curr_row++;
        }
        $data = array();
        array_push($data, 
          [
            $row->description,
            $row->model,
            $row->serial_number,
            $row->location,
            $row->room_name,
            $row->name,
            $row->network_port,
            $row->ip,
            $row->mac_address,
            $row->processor_type,
            $row->capacity,
            $row->Ram,
            $row->monitor_model,
            $row->monitor_serial_no,
            $row->ups_serial_no,
            $row->win_update,
            " ",//OS
            " ",//MO
            $row->AV,
            $row->UPS,
            $row->perform_date,
            $row->responsible,
            $row->comment 
          ]
        );
        $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
        $dt_curr_row++;
      }
      
      //
      
      //SAVE-DOWNLOAD DOCUMENT
      $writer = new Xlsx($spreadsheet);
     
      $filename = 'workstation';
     
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
      header('Cache-Control: max-age=0');
     
      $writer->save('php://output'); // download file 
      //

    }

    function server()
    {
      // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/
      
      //STYLINGS
      $style = $styleArray = [
        'font' => [
            'bold' => true,
            'size' => 9,
            'color' => array('rgb' => '000000'),222
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => 'B6D7A8',
            ],
        ],
      ];

      $style2 = $styleArray = [
        'font' => [
            'size' => 9,
            'color' => array('rgb' => 'FFFFFF'),
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => 'ED7D31',
            ],
        ],
      ];

      $style3 = $styleArray = [
        'font' => [
            'size' => 9,
            'color' => array('rgb' => 'FFFFFF'),
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => '990000',
            ],
        ],
      ];
      //

      //INIT SPREADSHEET - one sheet document
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      //

      //CREATE CUSTOM HEADERS
      //Row 1
      $sheet->setCellValue('A1', 'Hostname');
      $sheet->setCellValue('B1', 'Description');
      $sheet->setCellValue('C1', 'Prod IP Address');
      $sheet->setCellValue('D1', 'OS Version');
      $sheet->setCellValue('E1', 'CPU (Core)');
      $sheet->setCellValue('F1', 'Memory (GB)');
      $sheet->setCellValue('G1', 'Remarks');

      //Styling
      $sheet->getStyle('A1')->applyFromArray($style);
      $sheet->getStyle('B1')->applyFromArray($style);
      $sheet->getStyle('C1')->applyFromArray($style);
      $sheet->getStyle('D1')->applyFromArray($style);
      $sheet->getStyle('E1')->applyFromArray($style);
      $sheet->getStyle('F1')->applyFromArray($style);
      $sheet->getStyle('G1')->applyFromArray($style);

      //QUERY DATA
      $query = $this->Ui_generator->server_data("test")->result();
      //

      //DATA MASSAGE AND FILL
      $highestColumn = $sheet->getHighestColumn();
      $dt_init_row = 2;
      $dt_curr_row = $dt_init_row;
      

      // $lvl = $query[0]->level;
      // $sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$lvl);
      // $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
      // $dt_curr_row++;

      // $dept = $query[0]->department;
      // $sheet->setCellValue('A'.$dt_curr_row,$dept);
      // $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
      // $dt_curr_row++;

      foreach ($query as $row) {
        // if($lvl != $row->level){
        //   $lvl = $row->level;
        //   $sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$lvl);;
        //   $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
        //   $dt_curr_row++;
        // }
        // if($dept != $row->department){
        //   $dept = $row->department;
        //   $sheet->setCellValue('A'.$dt_curr_row,$dept);
        //   $sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
        //   $dt_curr_row++;
        // }
        $data = array();
        array_push($data, 
          [
            $row->name,
            $row->description,
            $row->ip,
            $row->operating_system,
            $row->cpu_core,
            $row->Ram,
            $row->comment 
          ]
        );
        $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
        $dt_curr_row++;
      }
      
      
      //SAVE-DOWNLOAD DOCUMENT
      $writer = new Xlsx($spreadsheet);
     
      $filename = 'server';
     
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
      header('Cache-Control: max-age=0');
     
      $writer->save('php://output'); // download file 
      //

    }

    function network()
    {
      // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/
      
      //STYLINGS
      $style = $styleArray = [
        'font' => [
            'size' => 9,
            'color' => array('rgb' => '000000'),222
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => 'B6D7A8',
            ],
        ],
      ];

      $style2 = $styleArray = [
        'font' => [
            'size' => 9,
            'color' => array('rgb' => 'FFFFFF'),
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => 'ED7D31',
            ],
        ],
      ];

      $style3 = $styleArray = [
        'font' => [
            'size' => 9,
            'color' => array('rgb' => 'FFFFFF'),
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                'argb' => '990000',
            ],
        ],
      ];
      //

      //INIT SPREADSHEET - one sheet document
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      //

      //CREATE CUSTOM HEADERS
      //Row 1
      $sheet->setCellValue('A1', 'Hostname');
      $sheet->setCellValue('B1', 'Description');
      $sheet->setCellValue('C1', 'Prod IP Address');
      $sheet->setCellValue('D1', 'OS Version');
      $sheet->setCellValue('E1', 'CPU (Core)');
      $sheet->setCellValue('F1', 'Memory (GB)');
      $sheet->setCellValue('G1', 'Remarks');

      //Styling
      $sheet->getStyle('A1')->applyFromArray($style);
      $sheet->getStyle('B1')->applyFromArray($style);
      $sheet->getStyle('C1')->applyFromArray($style);
      $sheet->getStyle('D1')->applyFromArray($style);
      $sheet->getStyle('E1')->applyFromArray($style);
      $sheet->getStyle('F1')->applyFromArray($style);
      $sheet->getStyle('G1')->applyFromArray($style);

      //DATA FILL
      //
      
      //SAVE-DOWNLOAD DOCUMENT
      $writer = new Xlsx($spreadsheet);
     
      $filename = 'network';
     
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
      header('Cache-Control: max-age=0');
     
      $writer->save('php://output'); // download file 
      //

    }
}