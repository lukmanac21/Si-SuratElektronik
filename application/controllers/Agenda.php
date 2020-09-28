<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
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
        $data['agenda'] 	        = $this->main->get_data('mst_agenda');

		$this->load->view('agenda/index',$data);
	}
	public function master(){
		$id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 
		$data['agenda'] 	        = $this->main->get_data('mst_agenda');
		$this->load->view('agenda/list',$data);
	}
	public function load(){
		$event_data = $this->main->get_data('mst_agenda');
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id_agenda'		=>	$row['id_agenda'],
				'nama_agenda'	=>	$row['nama_agenda'],
				'ket_agenda'	=>	$row['ket_agenda'],
				'jam_agenda'	=>	$row['jam_agenda']
			);
		}
		echo json_encode($data);
	}
	public function add_data(){
		$id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 

		$this->load->view('agenda/tambah',$data);
	}
	public function save_data(){
		$data['nama_agenda'] 	    = $this->input->post('nama_agenda');
		$data['tgl_agenda'] 	    = $this->input->post('tgl_agenda');
		$data['jam_agenda'] 	    = $this->input->post('jam_agenda');
		$data['tempat_agenda'] 	    = $this->input->post('tempat_agenda');
		$data['ket_agenda'] 	    = $this->input->post('ket_agenda');

		$this->main->insert_data('mst_agenda',$data);
		redirect('agenda/index');
	}
	public function edit_data($id_agenda){
		$id_bagian 					= $this->session->userdata('id_bagian');
		$data['menu'] 				= $this->main->get_menu_selected($id_bagian); 
		$where 				        = ['id_agenda' => $id_agenda];
		$data['agenda'] 	        = $this->main->get_data_where('mst_agenda',$where);

		$this->load->view('agenda/ubah',$data);
	}
	public function update_data(){
        $where['id_agenda'] 	    = $this->input->post('id_agenda');
		$data['nama_agenda'] 	    = $this->input->post('nama_agenda');

		$this->main->update_data('mst_agenda',$data,$where);
		redirect('agenda/index');
	}
	public function delete_data(){
		$where['id_agenda'] 	    = $this->input->post('id_agenda');
		
		$this->main->delete_data('mst_agenda',$where);
		redirect('agenda/index');
	}
}
