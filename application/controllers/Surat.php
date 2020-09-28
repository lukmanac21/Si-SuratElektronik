<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
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
		$id_bagian 			        = $this->session->userdata('id_bagian');
		$data['menu'] 		        = $this->main->get_menu_selected($id_bagian); 
        $data['dinas']              = $this->main->get_data('mst_dinas');
        $data['perihal']            = $this->main->get_data('mst_perihal'); 
		$this->load->view('surat/tambah',$data);
    }
    public function fetch_user(){
        if($this->input->post('id_dinas'))
        {
        echo $this->main->get_fetch_state($this->input->post('id_dinas'));
        }
    }
    public function surat_masuk(){
        $id_bagian                  = $this->session->userdata('id_bagian');
        $id_dinas			        = $this->session->userdata('id_dinas');
        $data['menu']               = $this->main->get_menu_selected($id_bagian);
        $data['surat']		        = $this->main->get_surat_masuk_by_dinas($id_dinas);
        $this->load->view('surat/suratmasuk',$data);
    }
    public function read_surat($id_surat){
        $id_bagian                  = $this->session->userdata('id_bagian');
        $data['menu']               = $this->main->get_menu_selected($id_bagian);
        $data['surat']		        = $this->main->get_surat_by_id_surat($id_surat);
		$this->load->view('surat/bacasurat',$data);
    }
    public function surat_keluar(){
        $id_bagian                  = $this->session->userdata('id_bagian');
        $id_dinas			        = $this->session->userdata('id_dinas');
        $data['menu']               = $this->main->get_menu_selected($id_bagian);
        $data['surat']		        = $this->main->get_surat_keluar_by_dinas($id_dinas);
		$this->load->view('surat/suratkeluar',$data);
    }
    public function save_data(){
        date_default_timezone_set('Asia/Jakarta');
        $data['bagian_pengirim'] 	= $this->input->post('bagian_pengirim');
        $data['bagian_penerima'] 	= $this->input->post('bagian_penerima');
        $data['id_perihal'] 		= $this->input->post('id_perihal');
        $data['no_surat'] 		    = $this->input->post('no_surat');
        $data['terkirim_pada']      = date('Y-m-d H:i:s');
        $data['isi_surat'] 		    = $this->input->post('isi_surat'); 
        $data['status'] 		= $this->input->post('status_surat');

        $this->main->insert_data('mst_surat',$data);
        redirect('Surat/index');
    }
}
