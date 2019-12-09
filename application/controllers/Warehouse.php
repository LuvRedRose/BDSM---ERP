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
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_warehouse', $data);
        $this->load->view('dashboard/v_footer');
    }

    function detail(){
        $data['warehouse_detail'] = $this->db->query('select * from tbl_warehouse_detail, tbl_goods where product_id=id_product order by ware_date desc')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_warehouse_1', $data);
        $this->load->view('dashboard/v_footer');
    }

}