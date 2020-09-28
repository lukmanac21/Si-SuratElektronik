<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('main');
		$this->load->library('session');
		$this->load->helper('main_helper');
		if(!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
    }
	public function index()
	{
		$id_bagian 				= $this->session->userdata('id_bagian');
		$id_dinas 				= $this->session->userdata('id_dinas');
		$where 				    = ['id_dinas' => $id_dinas];
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
        $data['bagian'] 	    = $this->main->get_data_where('mst_bagian',$where);

		$this->load->view('bagian/index',$data);
	}
	public function add_data(){
		$data['user'] 		    = $this->session->userdata('nama_user');
		$id_bagian            	= $this->session->userdata('id_bagian');
		$data['menu']       	= $this->main->get_menu_selected($id_bagian); 
		$this->load->view('bagian/tambah',$data);
	}
	public function save_data(){
		$data['id_dinas'] 		= $this->input->post('id_dinas');
		$data['nama_bagian'] 	= $this->input->post('nama_bagian');

		$this->main->insert_data('mst_bagian',$data);
		redirect('bagian/index');
	}
	public function bagian_access($id_bagians){
        $id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 
        $data['sub_menu'] 		    = $this->main->get_data('mst_sub_menu');
		$where 				        = ['id_bagian' => $id_bagians];
        $data['bagian']               = $this->db->get_where('mst_bagian',['id_bagian'=>$id_bagians])->row_array();
		$this->load->view('bagian/akses',$data);
    }
    public function change_access(){

        $id_sub_menu = $this->input->post('menuId');
        $id_bagian = $this->input->post('bagianId');

        $data = array(
            'id_sub_menu' => $id_sub_menu,
            'id_bagian' => $id_bagian
        );
        $result = $this->db->get_where('mst_user_access',$data);
        var_dump($result);
        if($result->num_rows() < 1){
            $this->db->insert('mst_user_access',$data);
        }else{
            $this->db->delete('mst_user_access',$data);
        }
    }
	public function edit_data($id_bagian_data){
		$id_bagian 				= $this->session->userdata('id_bagian');
		$data['menu'] 			= $this->main->get_menu_selected($id_bagian); 
		$where 				    = ['id_bagian' => $id_bagian_data];
		$data['bagian'] 	    = $this->main->get_data_where('mst_bagian',$where);

		$this->load->view('bagian/ubah',$data);
	}
	public function update_data(){
		$where['id_bagian']		= $this->input->post('id_bagian');
		$data['nama_bagian'] 	= $this->input->post('nama_bagian');

		$this->main->update_data('mst_bagian',$data,$where);
		redirect('bagian/index');
	}
	public function delete_data(){
		$where['id_bagian'] 	= $this->input->post('id_bagian');
		
		$this->main->delete_data('mst_bagian',$where);
		redirect('bagian/index');
	}
}
