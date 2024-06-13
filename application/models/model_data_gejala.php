<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_data_gejala extends CI_Model
{
    public function get()
    {
        return $this->db->get('table_data_gejala')->result_array();
    }
    public function get_detail($id)
    {
        return $this->db->get_where('table_data_gejala', ['id_gejala' => $id])->row_array();
    }
    public function get_data($kode_gejala)
    {
        return $this->db->get_where('table_data_gejala', ['kode_gejala' => $kode_gejala])->row_array();
    }
    public function get_jumlah()
    {
        return $this->db->get('table_data_gejala')->num_rows();
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
}
