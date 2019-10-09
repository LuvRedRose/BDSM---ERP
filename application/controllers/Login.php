<?php

defined('BASEPATH') OR exit("No direct script access allowed");

class Login extends CI_Controller{

    public function index(){
        $this->load->view('v_login');
    }

    public function aksi()
	{

		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != false){

			$nip = $this->input->post('nip');
			$password = $this->input->post('password');

			$where = array(
				'nip' => $nip,
				'password' => md5($password),
				'status' => 1
			);

			$this->load->model('m_data');

			
			$cek = $this->m_data->cek_login('tbl_user',$where)->num_rows();

			
			if($cek > 0){

				
				$data = $this->m_data->cek_login('tbl_user',$where)->row();

				
				$data_session = array(
					'id' => $data->id,
					'username' => $data->nip,
					'level' => $data->level,
					'status' => 'telah_login'
				);
				$this->session->set_userdata($data_session);

				

				redirect(base_url().'dashboard');
			}else{
				redirect(base_url().'login?alert=gagal');
			}

		}else{
			$this->load->view('v_login');
			
		}
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }

}