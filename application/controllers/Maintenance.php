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
        $id = $this->input->post('mach_id');
        $where = array (
            'mach_id' => $id,
        );
        $data['maintenance'] = $this->m_data->edit_data($where,'tbl_machine')->result();
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

   // function edit($id){
    //    $where = array (
    //        'mach_id' => $id,
    //    );
    //    $data['maintenance'] = $this->m_data->edit_data($where,'tbl_machine')->result();
    //    $this->load->view('dashboard/v_header');
     //   $this->load->view('maintenance/v_edit_maintenance', $data);
     //   $this->load->view('dashboard/v_footer');
   // }
}