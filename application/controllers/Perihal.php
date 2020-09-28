<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perihal extends CI_Controller {
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
		$id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 
        $data['perihal'] 	        = $this->main->get_data('mst_perihal');

		$this->load->view('perihal/index',$data);
	}
	public function add_data(){
		$id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 

		$this->load->view('perihal/tambah',$data);
	}
	public function save_data(){
		$data['nama_perihal'] 	    = $this->input->post('nama_perihal');

		$this->main->insert_data('mst_perihal',$data);
		redirect('perihal/index');
	}
	public function edit_data($id_perihal){
		$id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 
		$where 				        = ['id_perihal' => $id_perihal];
		$data['perihal'] 	        = $this->main->get_data_where('mst_perihal',$where);

		$this->load->view('perihal/ubah',$data);
	}
	public function update_data(){
        $where['id_perihal'] 	    = $this->input->post('id_perihal');
		$data['nama_perihal'] 	    = $this->input->post('nama_perihal');

		$this->main->update_data('mst_perihal',$data,$where);
		redirect('perihal/index');
	}
	public function delete_data(){
		$where['id_perihal'] 	    = $this->input->post('id_perihal');
		
		$this->main->delete_data('mst_perihal',$where);
		redirect('perihal/index');
	}
}
