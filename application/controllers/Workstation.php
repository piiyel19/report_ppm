<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Workstation extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('workstation_model','workstation_model'); 



		// $base_img = 'https://scanner.gadingtech.com/qr_code/nav/details_item/';

	}


	function index()
	{
    	$input = $this->input;
		$category = strval($input->post('ppm_device'));

	    switch ($category) {
	      	case 'Desktop':
	        	$this->computer($input);
	        	break;

	      	case 'notebook':
	        	$this->laptop($input);
	        	break;

	        case 'printer':
	        	$this->printer($input);
	        	break;

	        case 'scanner':
	        	$this->scanner($input);
	        	break;
	      
	      	default:
	        	return false;
	        	break;
	    }
	}


	function computer($input)
	{
	    // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

	    //QUERY DATA
	    $query = $this->workstation_model->computer_data($input)->result();
	    //

	    //CHECK IF QUERY RETURNS DATA
	    if(!$query){
	    	$_SESSION['error'] = 'No data for selected parameters! Try again!';
	    	redirect($_SERVER['HTTP_REFERER']);

	    }
	    //
	    
	    //STYLINGS
	    $style = [
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

	    $style2 = [
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

	    $style3 = [
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

	    $style4 = [
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

	    $style5 = [
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

	    $level_total = 0;
	    $dept_total = 0;
	    $level_total_loct = $dt_init_row;
	    $dept_total_loct = $dt_init_row+1;
	    $query_count = count($query);
	    $counter = 0;
	    $cur_col = 'X';
	    $dep_col = 'Y';

	    foreach ($query as $row) {

			if($lvl != $row->level){
				$dep_data = $this->workstation_model->count_data('Desktop',$lvl,NULL)->result();
				$sheet->setCellValue($dep_col.$level_total_loct,$dep_data[0]->counter);
				$sheet->setCellValue($cur_col.$level_total_loct,$level_total);
				$level_total = 0;
				$level_total_loct = $dt_curr_row;
				$sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$row->level);				
				$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
				$dt_curr_row++;

				if($dept != $row->department){
					$dept_data = $this->workstation_model->count_data('Desktop',$lvl,$dept)->result();
					$sheet->setCellValue($dep_col.$dept_total_loct,$dept_data[0]->counter);
					$sheet->setCellValue($cur_col.$dept_total_loct,$dept_total);
					$dept_total = 0;

					$dept = $row->department;
					$dept_total_loct = $dt_curr_row;
					$sheet->setCellValue('A'.$dt_curr_row,$dept);
					$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
					$dt_curr_row++;
				}
				$lvl = $row->level;

			}

			if($dept != $row->department){
				$dept_data = $this->workstation_model->count_data('Desktop',$lvl,$dept)->result();
				$sheet->setCellValue($dep_col.$dept_total_loct,$dept_data[0]->counter);
				$sheet->setCellValue($cur_col.$dept_total_loct,$dept_total);
				$dept_total = 0;

				$dept = $row->department;
				$dept_total_loct = $dt_curr_row;
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
					$row->comment,
					'1',
					'1'
				]
	      	);
			$sheet->fromArray($data,NULL,'A'.$dt_curr_row);

			$level_total++;
			$dept_total++;
			$counter++;
			if($counter == $query_count){
	      		$dep_data = $this->workstation_model->count_data('Desktop',$lvl,NULL)->result();
				$sheet->setCellValue($dep_col.$level_total_loct,$dep_data[0]->counter);
				$sheet->setCellValue($cur_col.$level_total_loct,$level_total);
				$dt_curr_row++;
				$dept_data = $this->workstation_model->count_data('Desktop',$lvl,$dept)->result();
				$sheet->setCellValue($dep_col.$dept_total_loct,$dept_data[0]->counter);
				$sheet->setCellValue($cur_col.$dept_total_loct,$dept_total);
	      	}
			$dt_curr_row++;
			
	    }
	    
	    //
	    
	    //SAVE-DOWNLOAD DOCUMENT
	    $writer = new Xlsx($spreadsheet);
	   
	    $filename = 'computer';
	   
	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	    header('Cache-Control: max-age=0');
	   
	    $writer->save('php://output'); // download file 
	    //
	}

	function laptop($input)
	{
	    // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/
	    
	    //STYLINGS
	    $style = [
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

	    $style2 = [
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

	    $style3 = [
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

	    $style4 = [
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

	    $style5 = [
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
	    $sheet->setCellValue('H1', 'Specification');
	    $sheet->setCellValue('K1', 'Windows Version');
	    $sheet->setCellValue('L1', 'Problem');
	    $sheet->setCellValue('M1', 'PPM#2');
	    $sheet->setCellValue('O1', 'Remarks');
	    $sheet->setCellValue('P1', 'Total');


	    //Row 2
	    $sheet->setCellValue('G2', 'Mac Address');
	    $sheet->setCellValue('H2', 'Processor');
	    $sheet->setCellValue('I2', 'Hard Disk');
	    $sheet->setCellValue('J2', 'RAM');
	    $sheet->setCellValue('L2', 'AV');
	    $sheet->setCellValue('M2', 'Date');
	    $sheet->setCellValue('N2', 'By');
	    $sheet->setCellValue('P2', 'Cur');
	    $sheet->setCellValue('Q2', 'Dep');

	    //Merge
	    $sheet->mergeCells('A1:A2');
	    $sheet->mergeCells('B1:B2');
	    $sheet->mergeCells('C1:C2');
	    $sheet->mergeCells('D1:D2');
	    $sheet->mergeCells('E1:E2');
	    $sheet->mergeCells('F1:F2');
	    $sheet->mergeCells('H1:J1');
	    $sheet->mergeCells('K1:K2');
	    $sheet->mergeCells('M1:N1');
	    $sheet->mergeCells('O1:O2');
	    $sheet->mergeCells('P1:Q1');


	    //Styling
	    $sheet->getStyle('A1:A2')->applyFromArray($style);
	    $sheet->getStyle('B1:B2')->applyFromArray($style);
	    $sheet->getStyle('C1:C2')->applyFromArray($style);
	    $sheet->getStyle('D1:D2')->applyFromArray($style);
	    $sheet->getStyle('E1:E2')->applyFromArray($style);
	    $sheet->getStyle('F1:F2')->applyFromArray($style);
	    $sheet->getStyle('G1')->applyFromArray($style);
	    $sheet->getStyle('G2')->applyFromArray($style);
	    $sheet->getStyle('H1:J1')->applyFromArray($style);
	    $sheet->getStyle('H2')->applyFromArray($style);
	    $sheet->getStyle('I2')->applyFromArray($style);
	    $sheet->getStyle('J2')->applyFromArray($style);
	    $sheet->getStyle('K1:K2')->applyFromArray($style3);
	    $sheet->getStyle('L1')->applyFromArray($style2);
	    $sheet->getStyle('L2')->applyFromArray($style2);
	    $sheet->getStyle('M1:N1')->applyFromArray($style);
	    $sheet->getStyle('M2')->applyFromArray($style);
	    $sheet->getStyle('N2')->applyFromArray($style);
	    $sheet->getStyle('O1:O2')->applyFromArray($style);
	    $sheet->getStyle('P1:Q1')->applyFromArray($style);
	    $sheet->getStyle('P2')->applyFromArray($style);
	    $sheet->getStyle('Q2')->applyFromArray($style);
	    

	    //QUERY DATA
	    $query = $this->workstation_model->laptop_data($input)->result();
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

	    $level_total = 0;
	    $dept_total = 0;
	    $level_total_loct = $dt_init_row;
	    $dept_total_loct = $dt_init_row+1;

	    foreach ($query as $row) {
			if($lvl != $row->level){
				$lvl = $row->level;
				$sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$lvl);
				$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
				$dt_curr_row++;
			}
			if($dept != $row->department){
				$dept = $row->department;
				$sheet->setCellValue('A'.$dt_curr_row,$dept);
				$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
				$dt_curr_row++;
			}
			$level_total++;
			$dept_total++;
			$data = array();
			array_push($data, 
				[
					$row->description,
					$row->model,
					$row->serial_number,
					$row->location,
					$row->room_name,
					$row->name,
					$row->mac_address,
					$row->processor_type,
					$row->capacity,
					$row->Ram,
					$row->win_update,
					$row->AV,
					$row->perform_date,
					$row->responsible,
					$row->comment 
				]
	      	);
			$sheet->fromArray($data,NULL,'A'.$dt_curr_row);
			$dt_curr_row++;
			$level_total++;
			$dept_total++;
	    }

	    //
	    
	    //SAVE-DOWNLOAD DOCUMENT
	    $writer = new Xlsx($spreadsheet);
	   
	    $filename = 'notebook';
	   
	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	    header('Cache-Control: max-age=0');
	   
	    $writer->save('php://output'); // download file 
	    //
	}

	function printer($input)
	{
	    // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/
	    
	    //STYLINGS
	    $style = [
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

	    $style2 = [
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

	    $style3 = [
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

	    $style4 = [
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

	    $style5 = [
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
	    $sheet->setCellValue('A1', ' ');
	    $sheet->setCellValue('B1', 'Serial Number');
	    $sheet->setCellValue('C1', 'Location Code');
	    $sheet->setCellValue('D1', 'Officer Room');
	    $sheet->setCellValue('E1', 'Hostname');
	    $sheet->setCellValue('F1', 'PC Hostname');
	    $sheet->setCellValue('G1', 'Networking');
	    $sheet->setCellValue('I1', 'PPM#2');
	    $sheet->setCellValue('K1', 'Remarks');
	    $sheet->setCellValue('L1', 'Total');


	    //Row 2
	    $sheet->setCellValue('G2', 'Nodes');
	    $sheet->setCellValue('H2', 'Static IP');
	    $sheet->setCellValue('I2', 'Date');
	    $sheet->setCellValue('J2', 'By');
	    $sheet->setCellValue('L2', 'Cur');
	    $sheet->setCellValue('M2', 'Dep');

	    //Merge
	    $sheet->mergeCells('A1:A2');
	    $sheet->mergeCells('B1:B2');
	    $sheet->mergeCells('C1:C2');
	    $sheet->mergeCells('D1:D2');
	    $sheet->mergeCells('E1:E2');
	    $sheet->mergeCells('F1:F2');
	    $sheet->mergeCells('G1:H1');
	    $sheet->mergeCells('I1:J1');
	    $sheet->mergeCells('K1:K2');
	    $sheet->mergeCells('L1:M1');


	    //Styling
	    $sheet->getStyle('A1:A2')->applyFromArray($style);
	    $sheet->getStyle('B1:B2')->applyFromArray($style);
	    $sheet->getStyle('C1:C2')->applyFromArray($style);
	    $sheet->getStyle('D1:D2')->applyFromArray($style);
	    $sheet->getStyle('E1:E2')->applyFromArray($style);
	    $sheet->getStyle('F1:F2')->applyFromArray($style);
	    $sheet->getStyle('G1:H1')->applyFromArray($style);
	    $sheet->getStyle('G2')->applyFromArray($style);
	    $sheet->getStyle('H2')->applyFromArray($style);
	    $sheet->getStyle('I1:J1')->applyFromArray($style);
	    $sheet->getStyle('I2')->applyFromArray($style);
	    $sheet->getStyle('J2')->applyFromArray($style);
	    $sheet->getStyle('K1:K2')->applyFromArray($style);
	    $sheet->getStyle('L1:M1')->applyFromArray($style);
	    $sheet->getStyle('L2')->applyFromArray($style);
	    $sheet->getStyle('M2')->applyFromArray($style);


	    //QUERY DATA
	    $query = $this->workstation_model->printer_data($input)->result();
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

	    $level_total = 0;
	    $dept_total = 0;
	    $level_total_loct = $dt_init_row;
	    $dept_total_loct = $dt_init_row+1;

	    foreach ($query as $row) {
			if($lvl != $row->level){
				$lvl = $row->level;
				$sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$lvl);
				$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
				$dt_curr_row++;
			}
			if($dept != $row->department){
				$dept = $row->department;
				$sheet->setCellValue('A'.$dt_curr_row,$dept);
				$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
				$dt_curr_row++;
			}
			$level_total++;
			$dept_total++;
			$data = array();
			array_push($data, 
				[
					$row->model,
					$row->serial_number,
					$row->location,
					$row->room_name,
					$row->name,
					' ',//PC HOSTNAME
					$row->network_port,
					$row->ip_address,
					$row->perform_date,
					$row->responsible,
					$row->comment 
				]
	      	);
			$sheet->fromArray($data,NULL,'A'.$dt_curr_row);
			$dt_curr_row++;
			$level_total++;
			$dept_total++;
	    }

	    //
	    
	    //SAVE-DOWNLOAD DOCUMENT
	    $writer = new Xlsx($spreadsheet);
	   
	    $filename = 'printer';
	   
	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	    header('Cache-Control: max-age=0');
	   
	    $writer->save('php://output'); // download file 
	    //
	}

	function scanner($input)
	{
	    // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/
	    
	    //STYLINGS
	    $style = [
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

	    $style2 = [
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

	    $style3 = [
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

	    $style4 = [
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

	    $style5 = [
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
	    $sheet->setCellValue('A1', ' ');
	    $sheet->setCellValue('B1', 'Serial Number');
	    $sheet->setCellValue('C1', 'Location Code');
	    $sheet->setCellValue('D1', 'Officer Room');
	    $sheet->setCellValue('E1', 'Hostname');
	    $sheet->setCellValue('F1', 'PC Hostname');
	    $sheet->setCellValue('G1', 'Networking');
	    $sheet->setCellValue('I1', 'PPM#2');
	    $sheet->setCellValue('K1', 'Remarks');
	    $sheet->setCellValue('L1', 'Total');


	    //Row 2
	    $sheet->setCellValue('G2', 'Nodes');
	    $sheet->setCellValue('H2', 'Static IP');
	    $sheet->setCellValue('I2', 'Date');
	    $sheet->setCellValue('J2', 'By');
	    $sheet->setCellValue('L2', 'Cur');
	    $sheet->setCellValue('M2', 'Dep');

	    //Merge
	    $sheet->mergeCells('A1:A2');
	    $sheet->mergeCells('B1:B2');
	    $sheet->mergeCells('C1:C2');
	    $sheet->mergeCells('D1:D2');
	    $sheet->mergeCells('E1:E2');
	    $sheet->mergeCells('F1:F2');
	    $sheet->mergeCells('G1:H1');
	    $sheet->mergeCells('I1:J1');
	    $sheet->mergeCells('K1:K2');
	    $sheet->mergeCells('L1:M1');


	    //Styling
	    $sheet->getStyle('A1:A2')->applyFromArray($style);
	    $sheet->getStyle('B1:B2')->applyFromArray($style);
	    $sheet->getStyle('C1:C2')->applyFromArray($style);
	    $sheet->getStyle('D1:D2')->applyFromArray($style);
	    $sheet->getStyle('E1:E2')->applyFromArray($style);
	    $sheet->getStyle('F1:F2')->applyFromArray($style);
	    $sheet->getStyle('G1:H1')->applyFromArray($style);
	    $sheet->getStyle('G2')->applyFromArray($style);
	    $sheet->getStyle('H2')->applyFromArray($style);
	    $sheet->getStyle('I1:J1')->applyFromArray($style);
	    $sheet->getStyle('I2')->applyFromArray($style);
	    $sheet->getStyle('J2')->applyFromArray($style);
	    $sheet->getStyle('K1:K2')->applyFromArray($style);
	    $sheet->getStyle('L1:M1')->applyFromArray($style);
	    $sheet->getStyle('L2')->applyFromArray($style);
	    $sheet->getStyle('M2')->applyFromArray($style);


	    //QUERY DATA
	    $query = $this->workstation_model->scanner_data($input)->result();
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

	    $level_total = 0;
	    $dept_total = 0;
	    $level_total_loct = $dt_init_row;
	    $dept_total_loct = $dt_init_row+1;

	    foreach ($query as $row) {
			if($lvl != $row->level){
				$lvl = $row->level;
				$sheet->setCellValue('A'.$dt_curr_row,'LEVEL '.$lvl);
				$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style4);
				$dt_curr_row++;
			}
			if($dept != $row->department){
				$dept = $row->department;
				$sheet->setCellValue('A'.$dt_curr_row,$dept);
				$sheet->getStyle('A'.$dt_curr_row.':'.$highestColumn.$dt_curr_row,$lvl)->applyFromArray($style5);
				$dt_curr_row++;
			}
			$level_total++;
			$dept_total++;
			$data = array();
			array_push($data, 
				[
					$row->model,
					$row->serial_number,
					$row->location,
					$row->room_name,
					$row->name,
					' ',//PC HOSTNAME
					$row->network_port,
					$row->ip_address,
					$row->perform_date,
					$row->responsible,
					$row->comment 
				]
	      	);
			$sheet->fromArray($data,NULL,'A'.$dt_curr_row);
			$dt_curr_row++;
			$level_total++;
			$dept_total++;
	    }

	    //
	    
	    //SAVE-DOWNLOAD DOCUMENT
	    $writer = new Xlsx($spreadsheet);
	   
	    $filename = 'scanner';
	   
	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	    header('Cache-Control: max-age=0');
	   
	    $writer->save('php://output'); // download file 
	    //
	}
}