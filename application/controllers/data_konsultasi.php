<?php

class data_konsultasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data_konsultasi');
        $this->load->model('user_model');
    }
    public function index()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Data konsultasi';
        $data['nama'] =  $this->session->userdata('nama');
        $data['data_konsultasi'] = $this->model_data_konsultasi->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_konsultasi/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function form_tambah()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Tambah Data konsultasi';
        $data['nama'] = $this->session->userdata('nama');
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_konsultasi/tambah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {


        $data_konsultasi = [
            'id_konsultasi' => $this->input->post('id_konsultasi', true),
            'nik' =>  $this->input->post('nik', true),
            'nama_konsultasi' =>  $this->input->post('nama_konsultasi', true),
            'tgl_lahir' =>  $this->input->post('tgl_lahir', true),
            'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
            'nama_ibu' =>  $this->input->post('nama_ibu', true),
            'nama_ayah' =>  $this->input->post('nama_ayah', true),
            'bb_lahir' =>  $this->input->post('bb_lahir', true),
            'tb_lahir' =>  $this->input->post('tb_lahir', true),
            'alamat' =>  $this->input->post('alamat', true),

        ];
        $this->db->insert('table_data_konsultasi', $data_konsultasi);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
		<b>Data konsultasi Berhasil Ditambahkan! </div>');
        redirect('data_konsultasi');
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
        $data['data_konsultasi'] = $this->model_data_konsultasi->get_detail($id);
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_konsultasi/ubah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function ubah()
    {

        $data_konsultasi = [

            'nik' =>  $this->input->post('nik', true),
            'nama_konsultasi' =>  $this->input->post('nama_konsultasi', true),
            'tgl_lahir' =>  $this->input->post('tgl_lahir', true),
            'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
            'nama_ibu' =>  $this->input->post('nama_ibu', true),
            'nama_ayah' =>  $this->input->post('nama_ayah', true),
            'bb_lahir' =>  $this->input->post('bb_lahir', true),
            'tb_lahir' =>  $this->input->post('tb_lahir', true),
            'alamat' =>  $this->input->post('alamat', true),

        ];
        $where = array('id_konsultasi' => $this->input->post('id_konsultasi', true));
        $this->model_data_konsultasi->ubah_data($where, $data_konsultasi, 'table_data_konsultasi');
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data konsultasi Berhasil Diubah! </div>');
        redirect('data_konsultasi');
    }
    public function detail($id)
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Ubah Data Training';
        $data['nama'] = $this->session->userdata('nama');
        $data['data_konsultasi'] = $this->model_data_konsultasi->get_detail($id);
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_konsultasi/detail', $data);
        $this->load->view('templates/footer', $data);
    }
    public function hapus()
    {
        $where = array('id_konsultasi' => $this->input->post('id_konsultasi', true));
        $this->model_data_konsultasi->hapus_data($where, 'table_data_konsultasi');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
        <b>Data konsultasi Berhasil Dihapus! </div>');
        redirect('data_konsultasi');
    }

  
}
