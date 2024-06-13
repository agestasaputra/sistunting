<?php

class data_gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data_gejala');
        $this->load->model('user_model');
    }
    public function index()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Data gejala';
        $data['nama'] =  $this->session->userdata('nama');
        $data['data_gejala'] = $this->model_data_gejala->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_gejala/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function form_tambah()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Tambah Data Gejala';
        $data['nama'] = $this->session->userdata('nama');
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_gejala/tambah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {

        $data_gejala = [
            'kode_gejala' =>  $this->input->post('kode_gejala', true),
            'nama_gejala' =>  $this->input->post('nama_gejala', true),
            'nilai_cf' =>  $this->input->post('nilai_cf', true),
        ];
        $this->db->insert('table_data_gejala', $data_gejala);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
		<b>Data gejala Berhasil Ditambahkan! </div>');
        redirect('data_gejala');
    }
    public function detail_ubah($id)
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Ubah Data Training';
        $data['nama'] = $this->session->userdata('nama');
        $data['data_gejala'] = $this->model_data_gejala->get_detail($id);
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_gejala/ubah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function ubah()
    {

        $data_gejala = [
            'kode_gejala' =>  $this->input->post('kode_gejala', true),
            'nama_gejala' =>  $this->input->post('nama_gejala', true),
            'nilai_cf' =>  $this->input->post('nilai_cf', true),
        ];
        $where = array('id_gejala' => $this->input->post('id_gejala', true));
        $this->model_data_gejala->ubah_data($where, $data_gejala, 'table_data_gejala');
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data gejala Berhasil Diubah! </div>');
        redirect('data_gejala');
    }

    public function hapus()
    {
        $where = array('id_gejala' => $this->input->post('id_gejala', true));
        $this->model_data_gejala->hapus_data($where, 'table_data_gejala');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
        <b>Data gejala Berhasil Dihapus! </div>');
        redirect('data_gejala');
    }
}
