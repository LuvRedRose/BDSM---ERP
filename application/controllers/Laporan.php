<?php 

defined('BASEPATH') OR exit("No direct script access allowed");

class Laporan extends CI_Controller{

    function __construct(){
        
        parent::__construct();
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    function warehouse_report(){

        require APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php' ;
        require APPPATH.'third_party/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php' ;

        $data = $this->m_data->get_data('tbl_warehouse_detail')->result();
        //$total = $this->db->query("SELECT COUNT(ware_activity) FROM tbl_warehouse_detail")->result();

        print_r($total);
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("");
        $objPHPExcel->getProperties()->setLastModifiedBy("");
        $objPHPExcel->getProperties()->setTitle("");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ware_id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'ware_use');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'ware_date');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'ware_cluster');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'ware_rack');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'product_id');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'ware_qty');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'ware_activity');
        

        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        $row  = 2;

        foreach($data as $dt){

            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $dt->ware_id);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $dt->ware_use);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $dt->ware_date);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $dt->ware_cluster);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $dt->ware_rack);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $dt->product_id);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $dt->ware_qty);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $dt->ware_activity);

            $row++;
            
        }

//        $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $total);

        $filename= "Warehouse Report".'.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Report View");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;

    }

    
}