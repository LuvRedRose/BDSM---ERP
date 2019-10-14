<?php 

defined('BASEPATH') or exit('No direct script access allowed!');

class Production extends CI_Controller{

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().
            'login?alert=belum_login');
            
        }
    }

    function index(){
        $data['produksi'] = $this->db->query('SELECT * FROM tbl_produksi , tbl_raw where material_use=id_material order by id_production desc')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_history_production', $data);
        $this->load->view('dashboard/v_footer');
    }

    function product(){
        $data['raw'] = $this->m_data->get_data('tbl_raw')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_production', $data);
        $this->load->view('dashboard/v_footer');
    }

    function product_action(){

        $this->form_validation->set_rules('material', 'Material', 'required');
        $this->form_validation->set_rules('stok_in', 'Stok_in', 'required');
        $this->form_validation->set_rules('stok_finish', 'Stok_Finish', 'required');

        if($this->form_validation->ru() != false){

            $tanggal    = date('Y-m-d');
            $material   = $this->input->post('material_use');
            $stok       = $this->input->post('stok_in');
            $finish     = $this->input->post('stok_finish');

            $data = array(
                'tgl_pembuatan' => $tanggal,
                'material_use'  => $material,
                'stok_in'       => $stok,
                'stok_finish'   => $finish,
            );

            $this->m_data->insert_data($data,'tbl_produksi');

            redirect('production/index');
        }else{
            $data['raw'] = $this->m_data->get_data('tbl_raw')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_production', $data);
            $this->load->view('dashboard/v_footer');    
        }
    }

    function raw_material(){

        $data['raw']= $this->m_data->get_data('tbl_raw')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_raw_material', $data);
        $this->load->view('dashboard/v_footer');
    }

    function goods(){

        $data['goods'] = $this->m_data->get_data('tbl_goods')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_goods', $data);
        $this->load->view('dashboard/v_footer');
    }

    function form_raw(){
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_form_raw');
        $this->load->view('dashboard/v_footer');
    }

    function action_raw(){

        $this->form_validation->set_rules('material', 'Material', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');

        if($this->form_validation->run() != false){

            $material   = $this->input->post('material');
            $stok       = $this->input->post('stok');

            $data = array(
                'material'  => $material,
                'stok'      => $stok 
            );

            $this->m_data->insert_data($data,'tbl_raw');

            redirect('production/raw_material');
        }else{
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_form_raw');
            $this->load->view('dashboard/v_footer');
        }
    }


    function delete_raw($id){

        $where = array(
            'id_material' => $id,
        );

        $this->m_data->delete_data($where, 'tbl_raw');
        redirect(base_url().'production/raw_material');
    }

    function edit_raw($id){
     
        $where = array(
            'id_material' => $id,
        );
        $data['raws'] = $this->m_data->edit_data($where,'tbl_raw')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_edit_raw', $data);
        $this->load->view('dashboard/v_footer');

        }

    function update_raw(){

        $this->form_validation->set_rules('material', 'Material', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() != false){

            $id         = $this->input->post('id_material');
            $material   = $this->input->post('material');
            $stok       = $this->input->post('stok');

            $where = array(
                'id_material' => $id
            );

            $data = array(
                'material' => $material,
                'stok'  =>  $stok
            );

            $this->m_data->update_data($where, $data, 'tbl_raw');
            redirect('production/raw_material');
        }else{
            $id = $this->input->post('id_material');
            $where = array(
                'id_material' => $id
            );
            $data['raws'] = $this->m_data->edit_data($where,'tbl_raw')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_edit_raw', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    function form_goods(){
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_form_goods');
        $this->load->view('dashboard/v_footer');
    }

    function action_goods(){

        $this->form_validation->set_rules('product_name', 'Product_Name', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if($this->form_validation->run() != false){

            $product_name   = $this->input->post('product_name');
            $stok           = $this->input->post('stok');
            $price          = $this->input->post('price');

            $data = array (
                'product_name'  => $product_name,
                'stok'          => $stok,
                'price'         => $price,
            );

            $this->m_data->insert_data($data, 'tbl_goods');

            redirect('production/goods');
        }else{
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_form_goods');
            $this->load->view('dashboard/v_footer');
        }
    }   

    function delete_goods($id){

        $where = array(
            'id_product' => $id,
        );

        $this->m_data->delete_data($where, 'tbl_goods');
        redirect(base_url().'production/goods');
    }

    function edit_goods($id_product){
     
        $where = array(
            'id_product' => $id_product,
        );
        $data['goods'] = $this->m_data->edit_data($where,'tbl_goods')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_edit_goods', $data);
        $this->load->view('dashboard/v_footer');

        }

    function update_goods(){
            
        $this->form_validation->set_rules('product_name','Product_Name','required');
        $this->form_validation->set_rules('stok','Stok','required');
        $this->form_validation->set_rules('price','Price','required');

        if($this->form_validation->run() != false){
    
                $id             = $this->input->post('id_product');
                $product_name   = $this->input->post('product_name');
                $stok           = $this->input->post('stok');
                $price          = $this->input->post('price');
    
                $where = array(
                    'id_product' => $id
                );
    
                $data = array(
                    'product_name'  => $product_name,
                    'stok'          => $stok,
                    'price'         => $price,
                );
    
                $this->m_data->update_data($where, $data,'tbl_goods');
    
                redirect('production/goods');
                
            }else{
                $id_product = $this->input->post('id_product');
                $where = array(
                    'id_product' => $id_product,
                );
                $data['goods'] = $this->m_data->edit_data($where,'tbl_goods')->result();
                $this->load->view('dashboard/v_header');
                $this->load->view('dashboard/v_edit_goods',$data);
                $this->load->view('dashboard/v_footer');
            }
        }
    
        


}