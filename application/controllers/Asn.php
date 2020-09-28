<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asn extends CI_Controller {
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
        $id_dinas 					= $this->session->userdata('id_dinas');
        $data['menu'] 				= $this->main->get_menu_selected($id_bagian);
        $where                      = array('mst_bagian.id_dinas' => $id_dinas); 
        $data['asn'] 	            = $this->main->get_data_join_where('mst_user','mst_bagian','mst_user.id_bagian = mst_bagian.id_bagian',$where);

		$this->load->view('asn/index',$data);
	}
	public function add_data(){
        $id_bagian 					= $this->session->userdata('id_bagian');
        $id_dinas 					= $this->session->userdata('id_dinas');
        $where                      = array('id_dinas' => $id_dinas);
        $data['bagian']             = $this->main->get_data_where('mst_bagian',$where);
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 

		$this->load->view('asn/tambah',$data);
	}
	public function save_data(){
		$data['nama_asn'] 	    = $this->input->post('nama_asn');

		$this->main->insert_data('mst_user',$data);
		redirect('asn/index');
	}
	public function edit_data($id_user){
		$id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 
        $where 				        = ['id_user' => $id_user];
        $data['bagian']             = $this->main->get_data('mst_bagian');
		$data['asn'] 	            = $this->main->get_data_where('mst_user',$where);

		$this->load->view('asn/ubah',$data);
	}
	public function update_data(){
        $where['id_asn'] 	    = $this->input->post('id_asn');
		$data['nama_asn'] 	    = $this->input->post('nama_asn');

		$this->main->update_data('mst_user',$data,$where);
		redirect('asn/index');
	}
	public function delete_data(){
		$where['id_asn'] 	    = $this->input->post('id_asn');
		
		$this->main->delete_data('mst_user',$where);
		redirect('asn/index');
	}
}
