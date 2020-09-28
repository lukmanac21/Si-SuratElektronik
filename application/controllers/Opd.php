<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opd extends CI_Controller {
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
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
        $data['dinas'] 			= $this->main->get_data('mst_dinas'); 
		$this->load->view('opd/index',$data);
	}
	public function add_data(){
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
		$this->load->view('opd/tambah',$data);
	}
	public function save_data(){
		$data['nama_dinas'] 	= $this->input->post('nama_dinas');
		$data['alamat_dinas'] 	= $this->input->post('alamat_dinas');
		$data['telp_dinas'] 	= $this->input->post('telp_dinas');
		$this->main->insert_data('mst_dinas',$data);
		redirect('Opd/index');
	}
	public function edit_data($id_dinas){
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
		$where 					= ['id_dinas' => $id_dinas];
		$data['dinas'] 			= $this->main->get_data_where('mst_dinas',$where);
		$this->load->view('opd/ubah',$data);
	}
	public function update_data(){
		$where['id_dinas'] 		= $this->input->post('id_dinas');
		$data['nama_dinas'] 	= $this->input->post('nama_dinas');
		$data['alamat_dinas'] 	= $this->input->post('alamat_dinas');
		$data['telp_dinas'] 	= $this->input->post('telp_dinas');
		$this->main->update_data('mst_dinas',$data,$where);
		redirect('Opd/index');

	}
}
