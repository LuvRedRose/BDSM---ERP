<?php 
defined('BASEPATH') or exit('No direct script access allowed!');    

class Warehouse extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    function index(){
        $data['warehouse'] = $this->m_data->get_data("tbl_warehouse")->result();
        $data['details'] = $this->m_data->get_data('tbl_warehouse_detail')->result();
        $data['goods'] = $this->m_data->get_data('tbl_goods')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_warehouse', $data);
        $this->load->view('dashboard/v_footer');
    }

    function detail(){
        $data['warehouse_detail'] = $this->db->query('select * from tbl_warehouse_detail a, tbl_goods b, tbl_warehouse c  where a.product_id=b.id_product and a.ware_use=c.ware_number order by ware_date desc')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_warehouse_1', $data);
        $this->load->view('dashboard/v_footer');
    }
    
    function insert(){
        $data['goods'] = $this->m_data->get_data('tbl_goods')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('warehouse/v_form_warehouse', $data);
        $this->load->view('dashboard/v_footer');
    }

    function add(){

        $this->form_validation->set_rules('ware_use', 'Ware_Use', 'required');
        $this->form_validation->set_rules('cluster', 'Cluster', 'required');
        $this->form_validation->set_rules('rack', 'Rack', 'required');
        $this->form_validation->set_rules('product_name', 'Product_Name', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('activity', 'Activity', 'required');

        if($this->form_validation->run() != false){

            $date           = date('Y-m-d');
            $warehouse      = $this->input->post('ware_use');
            $cluster        = $this->input->post('cluster');
            $rack           = $this->input->post('rack');
            $product        = $this->input->post('product_name');
            $quantity       = $this->input->post('quantity');
            $activity       = $this->input->post('activity');

            $data = array(
                'ware_use' => $warehouse,
                'ware_date' => $date,
                'ware_cluster' => $cluster,
                'ware_rack' => $rack,
                'product_id' => $product,
                'ware_qty' => $quantity,
                'ware_activity' => $activity
            );

            $this->m_data->insert_data($data, 'tbl_warehouse_detail');
            redirect('warehouse/detail');
        }

    }

    function report(){

        require APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php' ;
        require APPPATH.'third_party/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php' ;
    
        $data = $this->m_data->get_data('tbl_warehouse_detail')->result();
        //$in = $this->db->query("SELECT count(ware_activity) FROM tbl_warehouse_detail WHERE ware_activity='In'")->result();
    
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
            $objPHPExcel->getActiveSheet()->setcellValue('E'.$row, 'Total IN');
            $objPHPExcel->getActiveSheet()->setcellValue('F'.$row, '64748');
            $objPHPExcel->getActiveSheet()->setcellValue('G'.$row, 'Total OUT');
            $objPHPExcel->getActiveSheet()->setcellValue('H'.$row, '64749');

    
        $filename= "Report".'.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Report View");
    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
    
        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
        
    }

}