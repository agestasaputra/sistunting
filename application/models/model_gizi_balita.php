<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_gizi_balita extends CI_Model
{
    public function get()
    {
        return $this->db->get('table_gizi_balita')->result_array();
    }
    public function get_detail($id)
    {
        return $this->db->get_where('table_gizi_balita', ['id_timbang' => $id])->row_array();
    }
    public function get_jumlah()
    {
        return $this->db->get('table_gizi_balita')->num_rows();
    }
    public function get_jumlah_tidakberesiko()
    {
        return $this->db->get_where('table_gizi_balita', ['status_gizi' => "Tidak Beresiko"])->num_rows();
    }
    public function get_jumlah_beresiko()
    {
        return $this->db->get_where('table_gizi_balita', ['status_gizi' => "Beresiko"])->num_rows();
    }
    public function get_jumlah_stunting()
    {
        return $this->db->get_where('table_gizi_balita', ['status_gizi' => "Stunting"])->num_rows();
    }
    public function get_jumlah_obesitas()
    {
        return $this->db->get_where('table_gizi_balita', ['status_gizi' => "Obesitas"])->num_rows();
    }
    public function ubah_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
 
    public function get_most_common_penyakit()
    {
        $this->db->select('status_gizi, COUNT(status_gizi) as total');
        $this->db->group_by('status_gizi');
        $this->db->order_by('total', 'DESC');
        return $this->db->get('table_gizi_balita')->result_array();
    }
}
