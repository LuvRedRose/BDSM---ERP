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

    function invoice(){
        $data['pembelian']= $this->db->query("SELECT id_invoice,supplier_name, a.material, b.price, b.tgl_pembelian, stok, (b.price * stok) as total_harga FROM tbl_supplier a, tbl_pembelian b WHERE a.id_supplier=b.id_supplier order by id_invoice desc")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_invoice', $data);
        $this->load->view('dashboard/v_footer');
    }

    function update($id){
        $where = array (
            'id_invoice' => $id,
        );
        $data['pembelian']= $this->m_data->edit_data($where, 'tbl_pembelian')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_edit_transaction', $data);
        $this->load->view('dashboard/v_footer');
    }

    function update_invoice($id){
        $where = array(
            'id_invoice' => $id
        );
        $data['invoice'] = $this->m_data->edit_data($where,'tbl_pembelian')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_edit_invoice', $data);
        $this->load->view('dashboard/v_footer');
    }

    function update_action(){

        
    }

}