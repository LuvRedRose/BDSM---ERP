<?php

defined('BASEPATH') or exit('No direct script access allowed!'); 

class Shipment extends CI_controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    function index(){
        $data['shipment'] = $this->m_data->get_data("tbl_shipment")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_shipment', $data);
        $this->load->view('dashboard/v_footer');
    }


    function add(){
        $this->load->view('dashboard/v_header');
        $this->load->view('shipment/v_form_shipment');
        $this->load->view('dashboard/v_footer');
    }

    function action_shipment(){

        
        $this->form_validation->set_rules('shipment_name', 'Shipment_Name', 'required');
        $this->form_validation->set_rules('departure', 'Departure', 'required');
        $this->form_validation->set_rules('destination', 'Destination', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');

        if($this->form_validation->run() != false){

            $tanggal        = $this->input->post('shipment_date');
            $name           = $this->input->post('shipment_name');
            $departure      = $this->input->post('departure');
            $destination    = $this->input->post('destination');
            $quantity       = $this->input->post('quantity');
            $duration       = $this->input->post('duration');

            $data = array (
                'ship_date'         => $tanggal,
                'ship_name'         => $name,
                'ship_depart'       => $departure,
                'ship_destination'  => $destination,
                'ship_duration'     => $duration,
                'ship_qty'          => $quantity
            );

            $this->m_data->insert_data($data, 'tbl_shipment');

            redirect('shipment/index');
        }else{
            $this->load->view('dashboard/v_header');
            $this->load->view('shipment/v_form_shipment');
            $this->load->view('dashboard/v_footer');
        }
    }

    function edit($id){

        $where = array(
            'ship_id' => $id,
        );

        $data['shipment'] = $this->m_data->edit_data($where, 'tbl_shipment')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('shipment/v_edit_shipment', $data);
        $this->load->view('dashboard/v_footer');
    }

    function update(){

        $this->form_validation->set_rules('shipment_date', 'Shipment_Date', 'required');
        $this->form_validation->set_rules('shipment_name', 'Shipment_Name', 'required');
        $this->form_validation->set_rules('departure', 'Departure', 'required');
        $this->form_validation->set_rules('destination', 'Destination', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');

        if($this->form_validation->run() != false){

            $id             = $this->input->post('ship_id');
            $tanggal        = $this->input->post('shipment_date');
            $name           = $this->input->post('shipment_name');
            $departure      = $this->input->post('departure');
            $destination    = $this->input->post('destination');
            $quantity       = $this->input->post('quantity');
            $duration       = $this->input->post('duration');

            $where = array(
                'ship_id' => $id
            );

            $data = array (
                'ship_date'         => $tanggal,
                'ship_name'         => $name,
                'ship_depart'       => $departure,
                'ship_destination'  => $destination,
                'ship_duration'     => $duration,
                'ship_qty'          => $quantity
            );

            $this->m_data->update_data($where, $data, 'tbl_shipment');
            redirect('shipment/index');
    }else{
        $id = $this->input->post('ship_id');
        $where = array (
            'ship_id' => $id,
        );

        $data['shipment'] = $this->m_data->edit_data($where, 'tbl_shipment')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('shipment/v_edit_shipment', $data);
        $this->load->view('dashboard/v_footer');
    }
}

}