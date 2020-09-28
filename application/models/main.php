<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_MODEL{
    function check_login($table,$where){
        $query =  $this->db->select('*')
        ->from($table)
        ->join('mst_bagian','mst_user.id_bagian = mst_bagian.id_bagian')
        ->where($where)
        ->get();
        return $query;
    }
    function get_data($table){
        $query = $this->db->get($table);
        return $query->result();
    }
    function get_data_where($table,$where){
        $query = $this->db->get_where($table,$where);
        return $query->result();
    }
    function get_data_where_dinas($table,$where){
        $query = $this->db->select('*')->from($table)->where($where)->get();
        return $query->result();
    }
    function get_data_join($table,$table_join,$where){
        $query = $this->db->select('*')->from($table)->join($table_join,$where)->get();
        return $query->result();
    }
    function get_data_two_join_where($table,$table_join,$where_join,$table_joins,$where_joins,$where){
        $query = $this->db->select('*')->from($table)->join($table_join,$where_join)->join($table_joins,$where_joins)->where($where)->get();
        return $query->result();
    }
    function get_data_join_where($table,$table_join,$where_join,$where){
        $query = $this->db->select('*')->from($table)->join($table_join,$where_join)->where($where)->get();
        return $query->result();
    }
    function get_data_join_by_dinas($table,$table_join,$where,$id_dinas){
        $query = $this->db->select('*')->from($table)->join($table_join,$where)->where('mst_user.id_bagian != 1 and mst_user.id_dinas =',$id_dinas)->get();
        return $query->result();
    }
    function get_data_two_join_by_dinas($table,$table_join,$where,$table_joins,$wheres,$id_dinas){
        $query = $this->db->select('*')->from($table)->join($table_join,$where)->join($table_joins,$wheres)->where('mst_user.id_bagian != 1 and mst_user.id_dinas =',$id_dinas)->get();
        return $query->result();
    }
    function get_surat_masuk_by_dinas($id_dinas){
        $query =    $this->db->select('mst_surat.id_surat, mst_surat.no_surat, mst_surat.terkirim_pada, mst_surat.no_surat,pengirim.nama_bagian as bagian_pengirim ,dinas_pengirim.nama_dinas as dinas_pengirim ,penerima.nama_bagian as bagian_penerima, mst_surat.isi_surat, mst_perihal.nama_perihal, mst_status.nama_status')
                    ->from('mst_surat')
                    ->join('mst_bagian as pengirim','pengirim.id_bagian = mst_surat.bagian_pengirim')
                    ->join('mst_dinas as dinas_pengirim','dinas_pengirim.id_dinas = pengirim.id_dinas')
                    ->join('mst_bagian as penerima ','penerima.id_bagian = mst_surat.bagian_penerima')
                    ->join('mst_perihal','mst_surat.id_perihal = mst_perihal.id_perihal')
                    ->join('mst_status','mst_status.id_status = mst_surat.status')
                    ->where('penerima.id_dinas =',$id_dinas)
                    ->order_by('mst_surat.id_surat','DESC')
                    ->get();
        return $query->result();
    }
    function get_surat_keluar_by_dinas($id_dinas){
        $query =    $this->db->select('mst_surat.id_surat, mst_surat.no_surat, mst_surat.terkirim_pada, mst_surat.no_surat,pengirim.nama_bagian as bagian_pengirim ,dinas_pengirim.nama_dinas as dinas_pengirim ,penerima.nama_bagian as bagian_penerima, mst_surat.isi_surat, mst_perihal.nama_perihal, mst_status.nama_status')
                    ->from('mst_surat')
                    ->join('mst_bagian as pengirim','pengirim.id_bagian = mst_surat.bagian_pengirim')
                    ->join('mst_dinas as dinas_pengirim','dinas_pengirim.id_dinas = pengirim.id_dinas')
                    ->join('mst_bagian as penerima ','penerima.id_bagian = mst_surat.bagian_penerima')
                    ->join('mst_perihal','mst_surat.id_perihal = mst_perihal.id_perihal')
                    ->join('mst_status','mst_status.id_status = mst_surat.status')
                    ->where('pengirim.id_dinas =',$id_dinas)
                    ->order_by('mst_surat.id_surat','DESC')
                    ->get();
        return $query->result();
    }
    function get_surat_by_id_surat($id_surat){
        $query =    $this->db->select('mst_surat.id_surat, mst_surat.no_surat, mst_surat.terkirim_pada, mst_surat.no_surat,pengirim.nama_bagian as bagian_pengirim ,dinas_pengirim.nama_dinas as dinas_pengirim ,penerima.nama_bagian as bagian_penerima, mst_surat.isi_surat, mst_perihal.nama_perihal')
                    ->from('mst_surat')
                    ->join('mst_bagian as pengirim','pengirim.id_bagian = mst_surat.bagian_pengirim')
                    ->join('mst_dinas as dinas_pengirim','dinas_pengirim.id_dinas = pengirim.id_dinas')
                    ->join('mst_bagian as penerima ','penerima.id_bagian = mst_surat.bagian_penerima')
                    ->join('mst_perihal','mst_surat.id_perihal = mst_perihal.id_perihal')
                    ->where('mst_surat.id_surat =',$id_surat)
                    ->get();
        return $query->result();
    }
    function get_menu_selected($bagian_id){
        $this->db->select('*')
        ->from('mst_user_access')
        ->join('mst_sub_menu','mst_user_access.id_sub_menu = mst_sub_menu.id_sub_menu')
        ->join('mst_menu','mst_menu.id_menu = mst_sub_menu.id_menu')
        ->where('mst_user_access.id_bagian =',$bagian_id )
        ->group_by('mst_menu.id_menu');
        $query = $this->db->get();
        return $query->result();
    }
    function get_fetch_state($id_dinas){
        $this->db->where('id_dinas', $id_dinas)
        ->where('id_bagian != 12')
        ->order_by('nama_bagian', 'ASC');
        $query = $this->db->get('mst_bagian');
        $output = '<option value="">--Pilih Penanggung Jawab--</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->id_bagian.'">'.$row->nama_bagian.'</option>';
        }
        return $output;

    }
    function insert_data($table,$data){
        $this->db->insert($table,$data);
    }
    function update_data($table,$data,$where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_data($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
    }

}
?>