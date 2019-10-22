<?php 

defined('BASEPATH') or exit('No direct script access allowed!');	

class Transaction extends CI_Controller{

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
        }
    }

    function invoice(){
        $data['pembelian']= $this->db->query("SELECT id_invoice,supplier_name, a.material, b.price, b.tgl_pembelian, stok, (b.price * stok) as total_harga, status FROM tbl_supplier a, tbl_pembelian b WHERE a.id_supplier=b.id_supplier order by id_invoice desc")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_invoice', $data);
        $this->load->view('dashboard/v_footer');
    }

    function delete_invoice($id){

        $where = array(
            'id_invoice' => $id,
        );

        $this->m_data->delete_data($where, 'tbl_pembelian');
        redirect('production/invoice');
    }

    function update_invoice($id){
        $where = array(
            'id_invoice' => $id
        );
        $data['invoice'] = $this->m_data->edit_data($where,'tbl_pembelian')->result();
        $data['supplier'] = $this->m_data->get_data('tbl_supplier')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_edit_invoice', $data);
        $this->load->view('dashboard/v_footer');
    }

    function invoice_action(){
        
        $this->form_validation->set_rules('supplier','Supplier','required');
        $this->form_validation->set_rules('material','Material','required');
        $this->form_validation->set_rules('stok','Stok','required');
        $this->form_validation->set_rules('price','Price','required');

        if($this->form_validation->run() != false){
            $id             = $this->input->post('id');
            $suplier        = $this->input->post('supplier');
            $material       = $this->input->post('material');
            $stok           = $this->input->post('stok');
            $price          = $this->input->post('price');
            $status         = $this->input->post('status');

            $where = array (
                'id_invoice' =>  $id
            );
            
			$data = array(
                'id_supplier'   => $suplier,
                'material'      => $material,
                'stok'          => $stok,
                'price'         => $price,
                'status'        => $status,
            );
            
            $this->m_data->update_data($where, $data, 'tbl_pembelian');
            redirect('transaction/invoice');
        }else{
            $id = $this->input->post('id');
            
            $where = array(
            'id_invoice' => $id
        );

        $data['invoice'] = $this->m_data->edit_data($where,'tbl_pembelian')->result();
        $data['supplier'] = $this->m_data->get_data('tbl_supplier')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_edit_invoice', $data);
        $this->load->view('dashboard/v_footer');
        }
    }
}