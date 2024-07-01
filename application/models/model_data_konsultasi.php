<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_data_konsultasi extends CI_Model
{
    public function post($data)
    {
        $this->db->insert('table_data_konsultasi', $data);
    }
    public function get()
    {
        return $this->db->get('table_data_konsultasi')->result_array();
    }
    public function get_detail($id)
    {
        return $this->db->get_where('table_data_konsultasi', ['id_konsultasi' => $id])->row_array();
    }
    public function get_jumlah()
    {
        return $this->db->get('table_data_konsultasi')->num_rows();
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
