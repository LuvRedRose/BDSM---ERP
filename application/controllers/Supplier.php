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

    function supplier_action(){

        $this->form_validation->set_rules('Supplier', 'supplier', 'required');
        $this->form_validation->set_rules('Material', 'material', 'required');
        $this->form_validation->set_rules('Quantity', 'quantity', 'required');
        $this->form_validation->set_rules('Price', 'price', 'required');

        if($this->form_validation->run() != false){

            $tgl_pembuatan  = date('Y-m-d');
            $supplier       = $this->input->post('supplier');
            $material       = $this->input->post('material');
            $quantity       = $this->input->post('quantity');
            $price          = $this->input->post('price');
            $status         = $this->input->post('status');

            $data = array (
                'id_supplier'       => $supplier,
                'material'          => $material,
                'stok'              => $quantity,
                'price'             => $price,
                'status'            => $status,
            );

            $this->m_data->insert_data($data, 'tbl_invoice');
            redirect('transaction/invoice');
        }else{

            $data['supplier'] = $this->m_data->get_data('tbl_supplier')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('supplier/s_form_supplier', $data);
            $this->load->view('dashboard/v_footer');
                
        }
    }
}