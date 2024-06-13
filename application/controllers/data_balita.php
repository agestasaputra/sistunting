<?php

class data_balita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data_balita');
        $this->load->model('user_model');
    }
    public function index()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Data Balita';
        $data['nama'] =  $this->session->userdata('nama');
        $data['data_balita'] = $this->model_data_balita->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_balita/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function form_tambah()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Tambah Data Balita';
        $data['nama'] = $this->session->userdata('nama');
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_balita/tambah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {


        $data_balita = [
            'id_balita' => $this->input->post('id_balita', true),
            'nik' =>  $this->input->post('nik', true),
            'nama_balita' =>  $this->input->post('nama_balita', true),
            'tgl_lahir' =>  $this->input->post('tgl_lahir', true),
            'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
            'nama_ibu' =>  $this->input->post('nama_ibu', true),
            'nama_ayah' =>  $this->input->post('nama_ayah', true),
            'bb_lahir' =>  $this->input->post('bb_lahir', true),
            'tb_lahir' =>  $this->input->post('tb_lahir', true),
            'alamat' =>  $this->input->post('alamat', true),

        ];
        $this->db->insert('table_data_balita', $data_balita);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
		<b>Data Balita Berhasil Ditambahkan! </div>');
        redirect('data_balita');
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
        $data['data_balita'] = $this->model_data_balita->get_detail($id);
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_balita/ubah', $data);
        $this->load->view('templates/footer', $data);
    }
    public function ubah()
    {

        $data_balita = [

            'nik' =>  $this->input->post('nik', true),
            'nama_balita' =>  $this->input->post('nama_balita', true),
            'tgl_lahir' =>  $this->input->post('tgl_lahir', true),
            'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
            'nama_ibu' =>  $this->input->post('nama_ibu', true),
            'nama_ayah' =>  $this->input->post('nama_ayah', true),
            'bb_lahir' =>  $this->input->post('bb_lahir', true),
            'tb_lahir' =>  $this->input->post('tb_lahir', true),
            'alamat' =>  $this->input->post('alamat', true),

        ];
        $where = array('id_balita' => $this->input->post('id_balita', true));
        $this->model_data_balita->ubah_data($where, $data_balita, 'table_data_balita');
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data Balita Berhasil Diubah! </div>');
        redirect('data_balita');
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
        $data['data_balita'] = $this->model_data_balita->get_detail($id);
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_balita/detail', $data);
        $this->load->view('templates/footer', $data);
    }
    public function hapus()
    {
        $where = array('id_balita' => $this->input->post('id_balita', true));
        $this->model_data_balita->hapus_data($where, 'table_data_balita');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
        <b>Data Balita Berhasil Dihapus! </div>');
        redirect('data_balita');
    }

    public function cetak()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Laporan Data Balita';
        $data['nama'] =  $this->session->userdata('nama');
        $data['data_balita'] = $this->model_data_balita->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_balita/cetak', $data);
        $this->load->view('templates/footer', $data);
    }
}
