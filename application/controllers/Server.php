 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Server extends CI_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('server_model','server_model'); 

    }


    function index()
    {
        $input = $this->input;
        $category = strval($input->post('server_host'));

        switch ($category) {
            case 'host1':
                $this->host_1($input);
                break;

            case 'host2':
                $this->host_2($input);
                break;

            case 'host3':
                $this->host_3($input);
                break;

            case 'host4':
                $this->host_4($input);
                break;

            case 'host5':
                $this->host_5($input);
                break;

            case 'host6':
                $this->host_6($input);
                break;

            case 'host7':
                $this->host_7($input);
                break;

            case 'host8':
                $this->host_8($input);
                break;

            default:
                return false;
                break;
        }
    }

    function host_1($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host1_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_1';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function host_2($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host2_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_2';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function host_3($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host3_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_3';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function host_4($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host4_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_4';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function host_5($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host5_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_5';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function host_6($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host6_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_6';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function host_7($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host7_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_7';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }

    function host_8($input)
    {
        // https://arjunphp.com/generate-excel-phpspreadsheet-codeigniter-php/

        //QUERY DATA
        $query = $this->server_model->host8_data($input)->result();
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
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Prod IP Address');
        $sheet->setCellValue('D1', 'OS Version');
        $sheet->setCellValue('E1', "CPU (Core)");
        $sheet->setCellValue('F1', "Memory (GB)");
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
                    $row->name,
                    $row->description,
                    $row->ip,
                    $row->operating_system,
                    $row->cpu_core,
                    $row->capacity,
                    $row->comment 
                ]
            );
            $sheet->fromArray($data,NULL,'A'.$dt_curr_row);
            $dt_curr_row++;
        }
      
      
        //SAVE-DOWNLOAD DOCUMENT
        $writer = new Xlsx($spreadsheet);
       
        $filename = 'Host_8';
       
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        ob_end_clean();
        $writer->save('php://output'); // download file 
        //
    }
}