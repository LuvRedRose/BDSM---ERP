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

    public function index(){
        $data['barang'] = $this->m_data->get_data('tbl_supplier')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('supplier/s_index', $data);
        $this->load->view('dashboard/v_footer');

    }
}