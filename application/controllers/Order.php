<?php 

defined('BASEPATH') or exit('No direct script access allowed!');    

class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
            
        }
    }

    function order(){
        
    }
}