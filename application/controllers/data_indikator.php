<?php

class data_indikator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data_indikator');
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
        $data['judul'] = 'Data indikator';
        $data['nama'] =  $this->session->userdata('nama');

        $data['data_indikator'] = $this->model_data_indikator->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_indikator/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function form_tambah()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Tambah Data Indikator Tinggi';
        $data['nama'] = $this->session->userdata('nama');
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $data['data_gejala'] = $this->model_data_gejala->get();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_indikator/tambah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
   
        $data_indikator = [
            'usia' =>  $this->input->post('usia', true),
            'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
            'tinggi' =>  $this->input->post('tinggi', true),
            'nilai_cf' =>  $this->input->post('nilai_cf', true),
        ];
        $this->db->insert('table_indikator_tinggi', $data_indikator);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
		<b>Data Indikator Tinggi Berhasil Ditambahkan! </div>');
        redirect('data_indikator/index_indikator');
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
        $data['data_indikator'] = $this->model_data_indikator->get_detail($id);
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_indikator/ubah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function ubah()
    {

        $data_indikator = [
            'usia' =>  $this->input->post('usia', true),
            'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
            'tinggi' =>  $this->input->post('tinggi', true),
            'nilai_cf' =>  $this->input->post('nilai_cf', true),
        ];
        $where = array('id_indikator' => $this->input->post('id_indikator', true));
        $this->model_data_indikator->ubah_data($where, $data_indikator, 'table_indikator_tinggi');
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data Indikator Berhasil Diubah! </div>');
        redirect('data_indikator/index_indikator');
    }

    public function hapus()
    {
        $where = array('id_indikator' => $this->input->post('id_indikator', true));
        $this->model_data_indikator->hapus_data($where, 'table_indikator_tinggi');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
        <b>Data Indikator Berhasil Dihapus! </div>');
        redirect('data_indikator/index_indikator');
    }
}
