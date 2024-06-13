<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_data_balita extends CI_Model
{
    public function get()
    {
        return $this->db->get('table_data_balita')->result_array();
    }
    public function get_detail($id)
    {
        return $this->db->get_where('table_data_balita', ['id_balita' => $id])->row_array();
    }
    public function get_jumlah()
    {
        return $this->db->get('table_data_balita')->num_rows();
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
