<?php 

defined('BASEPATH') or exit('No direct script access allowed!');    

class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    public function index(){
        $data['total_product']      = $this->m_data->get_data('tbl_goods')->num_rows();  
        $data['total_shipment']     = $this->m_data->get_data('tbl_shipment')->num_rows();
        $data['total_warehouse']    = $this->m_data->get_data('tbl_warehouse_detail')->num_rows();
        $data['total_maintenance']  = $this->m_data->get_data('tbl_machine')->num_rows();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_index', $data);
        $this->load->view('dashboard/v_footer');
    }

    
}