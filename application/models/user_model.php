<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

    public function cek_username($username)
    {
        $query = $this->db->get_where('table_user', ['username' => $username]);
        return $query->num_rows();
    }

    public function get_password($username)
    {
        $data = $this->db->get_where('table_user', ['username' => $username])->row_array();
        return $data['password'];
    }
    public function cek_login()
    {
        // Cek apakah session user_status sudah ada
        if (!$this->session->userdata('nama')) {
            return false;
        } else {
            return true;
        }
    }
    public function userdata($username)
    {
        return $this->db->get_where('table_user', ['username' => $username])->row_array();
    }
    public function get_detail($nama)
    {
        return $this->db->get_where('table_user', ['nama' => $nama])->row_array();
    }

    public function get()
    {
        return $this->db->get('table_user')->result_array();
    }
    public function get_jumlah()
    {
        return $this->db->get('table_user')->num_rows();
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
