<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Network extends CI_Controller {

	public function __construct()
    {

        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('network_model','network_model'); 

    }


    function index()
    {
        $input = $this->input;
        $category = strval($input->post('location_net'));

        switch ($category) {
            case 'datacenter':
                $this->datacenter($input);
                break;

            case 'tcr_room':
                $this->tcrroom($input);
                break;

            case 'backup_room':
                $this->backuproom($input);
                break;

            default:
                return false;
                break;
        }
    }

    function datacenter($input)
	{
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->network_model->datacenter_data($input)->result();
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
                'color' => array('rgb' => '000000')
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
        //
        
        //INIT SPREADSHEET - one sheet document
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getDefaultStyle()->getFont()->setSize(9);
        $sheet = $spreadsheet->getActiveSheet();
        //

        //CREATE CUSTOM HEADERS
        //Row 1
        $sheet->setCellValue('A1', 'Hostname');
        $sheet->setCellValue('B1', 'Model');
        $sheet->setCellValue('C1', 'IP Address');
        $sheet->setCellValue('D1', 'Serial Number');
        $sheet->setCellValue('E1', 'Location');
        $sheet->setCellValue('F1', 'Port Available');

        //Styling
        $sheet->getStyle('A1')->applyFromArray($style);
        $sheet->getStyle('B1')->applyFromArray($style);
        $sheet->getStyle('C1')->applyFromArray($style);
        $sheet->getStyle('D1')->applyFromArray($style);
        $sheet->getStyle('E1')->applyFromArray($style);
        $sheet->getStyle('F1')->applyFromArray($style);

        //QUERY DATA
        // $query = $this->server_model->physical_data()->result();
        //

        //DATA MASSAGE AND FILL
        $highestColumn = $sheet->getHighestColumn();
        $dt_init_row = 2;
        $dt_curr_row = $dt_init_row;

        foreach ($query as $row) {
            $data = array();
            array_push($data, 
                [
                    $row->type_ppm_activity,
                    $row->hostname,
                    $row->model,
                    $row->ip,
                    $row->serial_number,
                    $row->location,
                    $row->port 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Datacenter';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        // ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function tcrroom($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->network_model->tcrroom_data($input)->result();
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
                'color' => array('rgb' => '000000')
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
        //
        
        //INIT SPREADSHEET - one sheet document
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getDefaultStyle()->getFont()->setSize(9);
        $sheet = $spreadsheet->getActiveSheet();
        //

        //CREATE CUSTOM HEADERS
        //Row 1
        $sheet->setCellValue('A1', 'Activity No');
        $sheet->setCellValue('B1', 'Hostname');
        $sheet->setCellValue('C1', 'Model');
        $sheet->setCellValue('D1', 'IP Address');
        $sheet->setCellValue('E1', 'Serial Number');
        $sheet->setCellValue('F1', 'Location');
        $sheet->setCellValue('G1', 'Port Available');

        //Styling
        $sheet->getStyle('A1')->applyFromArray($style);
        $sheet->getStyle('B1')->applyFromArray($style);
        $sheet->getStyle('C1')->applyFromArray($style);
        $sheet->getStyle('D1')->applyFromArray($style);
        $sheet->getStyle('E1')->applyFromArray($style);
        $sheet->getStyle('F1')->applyFromArray($style);
        $sheet->getStyle('G1')->applyFromArray($style);

        //QUERY DATA
        // $query = $this->server_model->physical_data()->result();
        //

        //DATA MASSAGE AND FILL
        $highestColumn = $sheet->getHighestColumn();
        $dt_init_row = 2;
        $dt_curr_row = $dt_init_row;

        foreach ($query as $row) {
            $data = array();
            array_push($data, 
                [
                    $row->type_ppm_activity,
                    $row->hostname,
                    $row->model,
                    $row->ip,
                    $row->serial_number,
                    $row->location,
                    $row->port 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'TCR';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        // ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function backuproom($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->network_model->backuproom_data($input)->result();
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
                'color' => array('rgb' => '000000')
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
        //
        
        //INIT SPREADSHEET - one sheet document
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getDefaultStyle()->getFont()->setSize(9);
        $sheet = $spreadsheet->getActiveSheet();
        //

        //CREATE CUSTOM HEADERS
        //Row 1
        $sheet->setCellValue('A1', 'Hostname');
        $sheet->setCellValue('B1', 'Model');
        $sheet->setCellValue('C1', 'IP Address');
        $sheet->setCellValue('D1', 'Serial Number');
        $sheet->setCellValue('E1', 'Location');
        $sheet->setCellValue('F1', 'Port Available');

        //Styling
        $sheet->getStyle('A1')->applyFromArray($style);
        $sheet->getStyle('B1')->applyFromArray($style);
        $sheet->getStyle('C1')->applyFromArray($style);
        $sheet->getStyle('D1')->applyFromArray($style);
        $sheet->getStyle('E1')->applyFromArray($style);
        $sheet->getStyle('F1')->applyFromArray($style);

        //QUERY DATA
        // $query = $this->server_model->physical_data()->result();
        //

        //DATA MASSAGE AND FILL
        $highestColumn = $sheet->getHighestColumn();
        $dt_init_row = 2;
        $dt_curr_row = $dt_init_row;

        foreach ($query as $row) {
            $data = array();
            array_push($data, 
                [
                    $row->type_ppm_activity,
                    $row->hostname,
                    $row->model,
                    $row->ip,
                    $row->serial_number,
                    $row->location,
                    $row->port
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Backup Room';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        // ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }
}