<?php 
defined('BASEPATH') or exit('No direct script access allowed!');    

class Maintenance extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    function index(){
       // $id = $this->input->post('mach_id');
       // $where = array (
       //     'mach_id' => $id,
       // );
       // $data['maintenance'] = $this->m_data->edit_data($where,'tbl_machine')->result();
        $data['machine'] = $this->m_data->get_data("tbl_machine")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_machine', $data);
        $this->load->view('dashboard/v_footer');
    }

    function add(){
        $this->load->view('dashboard/v_header');
        $this->load->view('maintenance/v_form_maintenance');
        $this->load->view('dashboard/v_footer');
    }

    function action_add(){

        $this->form_validation->set_rules('machine', 'Machine', 'required');
        $this->form_validation->set_rules('start_date','Start_Date', 'required');

        if($this->form_validation->run() != false) {

            $machine    = $this->input->post('machine');
            $start      = $this->input->post('start_date');

            $data = array(
                'mach_number' => $machine,
                'mach_sd_date' => $start
            );

            $this->m_data->insert_data($data,'tbl_machine');

            redirect('maintenance/index');
        }else{
            $this->load->view('dashboard/v_header');
            $this->load->view('maintenance/v_form_maintenance');
            $this->load->view('dashboard/v_footer');
        }
    }

        function edit($id){
        $where = array (
            'mach_id' => $id,
        );
        $data['maintenance'] = $this->m_data->edit_data($where,'tbl_machine')->result();
        $this->load->view('dashboard/v_header');
       $this->load->view('maintenance/v_edit_maintenance', $data);
        $this->load->view('dashboard/v_footer');
    }


    function update(){
        
        $this->form_validation->set_rules('end_date', 'End_Date', 'required');
        $this->form_validation->set_rules('capacity', 'Capacity', 'required');

        if($this->form_validation->run() != false){

            $id         = $this->input->post('mach_id');
            $machine    = $this->input->post('mach_number');
            $start      = $this->input->post('start_date');
            $end        = $this->input->post('end_date');
            $capacity   = $this->input->post('capacity');

            $where = array(
                'mach_id' => $id
            );

            $data = array(
                'mach_number' => $machine,
                'mach_sd_date' => $start,
                'mach_su_date' => $end,
                'mach_m_duration' => ((abs(strtotime($end) - strtotime($start)))/(60*60*24)),
                'mach_capacity' => $capacity
            );

            $this->m_data->update_data($where, $data, 'tbl_machine');
            redirect('maintenance/index');
        }else{
            $id = $this->input->post('mach_id');
            $where = array (
            'mach_id' => $id);
            $data['maintenance'] = $this->m_data->edit_data($where,'tbl_machine')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('maintenance/v_edit_maintenance', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    function report(){

        require APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php' ;
        require APPPATH.'third_party/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php' ;

        $data = $this->m_data->get_data('tbl_machine')->result();

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("");
        $objPHPExcel->getProperties()->setLastModifiedBy("");
        $objPHPExcel->getProperties()->setTitle("");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'mach_id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'mach_number');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'mach_sd_date');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'mach_m_duration');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'mach_su_date');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'mach_capacity');
        

        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        $row  = 2;

        foreach($data as $dt){

            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $dt->mach_id);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $dt->mach_number);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $dt->mach_sd_date);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $dt->mach_m_duration);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $dt->mach_su_date);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $dt->mach_capacity);
            

            $row++;
            
        }

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