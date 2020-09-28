<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menusub extends CI_Controller {
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
		$data['user'] 		    = $this->session->userdata('nama_user');
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
        $data['sub_menu'] 	    = $this->main->get_data_join('mst_sub_menu','mst_menu','mst_sub_menu.id_menu = mst_menu.id_menu');

		$this->load->view('menusub/index',$data);
	}
	public function add_data(){
		$data['user'] 		    = $this->session->userdata('nama_user');
		$id_bagian            	= $this->session->userdata('id_bagian');
		$data['menu']       	= $this->main->get_menu_selected($id_bagian);
		$data['data_menu'] 		= $this->main->get_data('mst_menu');
		$this->load->view('menusub/tambah',$data);
	}
	public function save_data(){
        $data['id_menu'] 	    = $this->input->post('id_menu');
		$data['nama_sub_menu'] 	= $this->input->post('nama_sub_menu');
		$data['link_sub_menu']	= $this->input->post('link_sub_menu');

		$this->main->insert_data('mst_sub_menu',$data);
		redirect('Menusub/index');
	}
	public function edit_data($id_sub_menu){
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
		$where 				    = ['id_sub_menu' => $id_sub_menu];
		$data['sub_menu'] 	    = $this->main->get_data_where('mst_sub_menu',$where);

		$this->load->view('menusub/ubah',$data);
	}
	public function update_data(){
        $where['id_sub_menu'] 	= $this->input->post('id_sub_menu');
        $data['id_menu'] 	    = $this->input->post('id_menu');
		$data['nama_sub_menu'] 	= $this->input->post('nama_sub_menu');
		$data['link_sub_menu'] 	= $this->input->post('link_sub_menu');

		$this->main->update_data('mst_sub_menu',$data,$where);
		redirect('Menusub/index');
	}
	public function delete_data(){
		$where['id_sub_menu'] 	= $this->input->post('id_sub_menu');
		
		$this->main->delete_data('mst_sub_menu',$where);
		redirect('Menusub/index');
	}
}
