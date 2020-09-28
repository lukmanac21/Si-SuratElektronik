<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$id_bagian			= $this->session->userdata('id_bagian');
		$id_dinas			= $this->session->userdata('id_dinas');
		$data['menu'] 		= $this->main->get_menu_selected($id_bagian);
		$data['surat']		= $this->main->get_surat_masuk_by_dinas($id_dinas);
		$this->load->view('dashboard',$data);
	}

}
