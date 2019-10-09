<?php 

defined('BASEPATH') or exit('No direct script access allowed!');	

class Transaction extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    public function invoice(){
        $data['pembelian']= $this->db->query("SELECT supplier_name, a.material, b.price, b.tgl_pembelian, stok FROM tbl_supplier a, tbl_pembelian b WHERE a.id_supplier=b.id_supplier order by id_invoice desc")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_invoice', $data);
        $this->load->view('dashboard/v_footer');
    }
}