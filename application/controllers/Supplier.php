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

    public function supplier_action()
	{
        $this->form_validation->set_rules('supplier','Supplier','required');
        $this->form_validation->set_rules('material','Material','required');
        $this->form_validation->set_rules('stok','Stok','required');
        $this->form_validation->set_rules('price','Price','required');

		if($this->form_validation->run() != false){

            $tgl_pembuatan  = date('Y-m-d');
            $suplier        = $this->input->post('supplier');
            $material       = $this->input->post('material');
            $stok           = $this->input->post('stok');
            $price          = $this->input->post('price');
            $status         = $this->input->post('status');

			$data = array(
                'tgl_pembelian' => $tgl_pembuatan,
                'id_supplier'   => $suplier,
                'material'      => $material,
                'stok'          => $stok,
                'price'         => $price,
                'status'        => $status,
			);

			$this->m_data->insert_data($data,'tbl_pembelian');

			redirect(base_url().'transaction/invoice');
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('supplier/s_form_supplier');
			$this->load->view('dashboard/v_footer');
		}
	}

}