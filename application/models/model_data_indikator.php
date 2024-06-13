<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_data_indikator extends CI_Model
{
    public function get()
    {
        $query = $this->db->query("SELECT * FROM table_indikator_tinggi");
        $data = $query->result_array();
        return $data;
    }
    public function get_detail($id)
    {
        return $this->db->get_where('table_indikator_tinggi', ['id_indikator' => $id])->row_array();
    }
    public function get_jumlah()
    {
        return $this->db->get('table_indikator_tinggi')->num_rows();
    }
    public function cari_data($usia,$jenis_kelamin)
    {
        $query = $this->db->query("SELECT * FROM table_indikator_tinggi WHERE usia ='$usia' AND jenis_kelamin = '$jenis_kelamin'");
        $data = $query->result_array();
        return $data;
    }
    public function cari_tinggi($jenis_kelamin)
    {
        $query = $this->db->query("SELECT * FROM table_indikator_tinggi WHERE  tinggi = $jenis_kelamin");
        $data = $query->result_array();
        return $data;
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
