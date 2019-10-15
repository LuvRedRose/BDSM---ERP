<?php 

defined('BASEPATH') OR exit("No direct script access allowed");


class Supplier extends CI_Controller{


    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        $this->load->library('cart');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    function index(){
        $data['barang'] = $this->m_data->get_data('tbl_supplier')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('supplier/s_index', $data);
        $this->load->view('dashboard/v_footer');

    }

    function form_supplier(){

        $data['supplier'] = $this->m_data->get_data('tbl_supplier')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('supplier/s_form_supplier', $data);
        $this->load->view('dashboard/v_footer');
    }

    function get_data(){
    $id_material = $this->input->post('id_supplier');
    $data = $this->m_data->get_data_bykode($id_material);
    echo json_encode($data);
    }
}