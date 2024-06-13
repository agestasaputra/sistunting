<?php

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Data User';
        $data['nama'] =  $this->session->userdata('nama');
        $data['user'] = $this->user_model->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index');
        $this->load->view('templates/footer', $data);
    }
    public function ubah()
    {
        $data_user = [
            'nama' => $this->input->post('nama', true),
            'username' =>  $this->input->post('username', true),
            'nohp' =>  $this->input->post('nohp', true),
            'password' => $this->input->post('password'),

        ];
        $where = array('id_user' => $this->input->post('id', true));
        $this->user_model->ubah_data($where, $data_user, 'table_user');
        redirect('auth');
    }
    public function hapus()
    {
        $where = array('id_user' => $this->input->post('id_user', true));
        $this->user_model->hapus_data($where, 'table_user');
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data User Berhasil Dihapus! </div>');
        redirect('user');
    }
}
