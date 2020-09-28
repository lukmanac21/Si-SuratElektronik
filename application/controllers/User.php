<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('main');
		$this->load->library('session');
		if(!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
    }
	public function index()
	{
        $id_role 				= $this->session->userdata('id_role');
        $id_dinas               = $this->session->userdata('id_dinas');
		$data['menu'] 			= $this->main->get_menu_selected($id_role); 
        $data['user'] 			= $this->main->get_data_two_join_by_dinas('tbl_user','tbl_role','tbl_user.id_role = tbl_role.id_role','tbl_bagian','tbl_user.id_bagian = tbl_bagian.id_bagian',$id_dinas); 
		$this->load->view('user',$data);
	}
	public function add_data(){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role); 
        $data['role']           = $this->main->get_data_where('tbl_role','id_role != 1');
		$this->load->view('user_tambah',$data);
	}
	public function save_data(){
        $data['id_role'] 	    = $this->input->post('id_role');
        $data['id_dinas'] 	    = $this->input->post('id_dinas');
        $data['nama_user'] 	    = $this->input->post('nama_user');
        $data['email_user'] 	= $this->input->post('email_user');
        $data['password_user'] 	= sha1($this->input->post('password_user',TRUE));
		
		$this->main->insert_data('tbl_user',$data);
		redirect('user/index');
	}
	public function edit_data($id_user){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role);
        $data['role']           = $this->main->get_data_where('tbl_role','id_role != 1 ');
		$where 					= ['id_user' => $id_user];
		$data['user'] 			= $this->main->get_data_where('tbl_user',$where);
		$this->load->view('user_ubah',$data);
	}
	public function update_data(){
		$where['id_user'] 		= $this->input->post('id_user');
        $data['id_role'] 	    = $this->input->post('id_role');
        $data['id_dinas'] 	    = $this->input->post('id_dinas');
        $data['nama_user'] 	    = $this->input->post('nama_user');
        $data['email_user'] 	= $this->input->post('email_user');
        $data['password_user'] 	= sha1($this->input->post('password_user',TRUE));
		$this->main->update_data('tbl_user',$data,$where);
		redirect('user/index');

	}
}
