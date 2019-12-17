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
        $data['details'] = $this->m_data->get_data('tbl_warehouse_detail')->result();
        $data['goods'] = $this->m_data->get_data('tbl_goods')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_warehouse', $data);
        $this->load->view('dashboard/v_footer');
    }

    function detail(){
        $data['warehouse_detail'] = $this->db->query('select * from tbl_warehouse_detail a, tbl_goods b, tbl_warehouse c  where a.product_id=b.id_product and a.ware_use=c.ware_number order by ware_date desc')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_warehouse_1', $data);
        $this->load->view('dashboard/v_footer');
    }
    
    function insert(){
        $data['goods'] = $this->m_data->get_data('tbl_goods')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('warehouse/v_form_warehouse', $data);
        $this->load->view('dashboard/v_footer');
    }

    function add(){

        $this->form_validation->set_rules('ware_use', 'Ware_Use', 'required');
        $this->form_validation->set_rules('cluster', 'Cluster', 'required');
        $this->form_validation->set_rules('rack', 'Rack', 'required');
        $this->form_validation->set_rules('product_name', 'Product_Name', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('activity', 'Activity', 'required');

        if($this->form_validation->run() != false){

            $date           = date('Y-m-d');
            $warehouse      = $this->input->post('ware_use');
            $cluster        = $this->input->post('cluster');
            $rack           = $this->input->post('rack');
            $product        = $this->input->post('product_name');
            $quantity       = $this->input->post('quantity');
            $activity       = $this->input->post('activity');

            $data = array(
                'ware_use' => $warehouse,
                'ware_date' => $date,
                'ware_cluster' => $cluster,
                'ware_rack' => $rack,
                'product_id' => $product,
                'ware_qty' => $quantity,
                'ware_activity' => $activity
            );

            $this->m_data->insert_data($data, 'tbl_warehouse_detail');
            redirect('warehouse/detail');
        }

    }

}