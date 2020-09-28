<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
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
		$data['data_menu'] 		= $this->main->get_data('mst_menu');

		$this->load->view('menu/index',$data);
	}
	public function add_data(){
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 

		$this->load->view('menu/tambah',$data);
	}
	public function save_data(){
		$data['nama_menu'] 		= $this->input->post('nama_menu');
		$data['icon_menu']		= $this->input->post('icon_menu');

		$this->main->insert_data('mst_menu',$data);
		redirect('Menu/index');
	}
	public function edit_data($id_menu){
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
		$where 					= ['id_menu' => $id_menu];
		$data['data_menu'] 		= $this->main->get_data_where('mst_menu',$where);

		$this->load->view('menu/ubah',$data);
	}
	public function update_data(){
		$where['id_menu'] 		= $this->input->post('id_menu');
		$data['nama_menu'] 		= $this->input->post('nama_menu');
		$data['icon_menu'] 		= $this->input->post('icon_menu');

		$this->main->update_data('mst_menu',$data,$where);
		redirect('Menu/index');
	}
	public function delete_data(){
		$where['id_menu'] 		= $this->input->post('id_menu');
		
		$this->main->delete_data('mst_menu',$where);
		redirect('Menu/index');
	}
}
