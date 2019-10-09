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
        $this->load->view('supplier/s_header');
        $this->load->view('supplier/s_index', $data);
        $this->load->view('supplier/s_footer');

    }

    function add_cart($id){

        $barang = $this->m_product->find($id);
        $data = array(
            'id'      => $barang->input('id'),
            'qty'     => 1,
            'price'   => $barang->input('price'),
            'name'    => $barang->input('material'),
    );
    
    $this->cart->insert($data);
    }
}