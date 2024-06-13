<?php

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('model_data_gejala');
        $this->load->model('model_data_balita');
        $this->load->model('model_data_konsultasi');
    }

    public function index()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data = [
            'jumlah_data_balita' => $this->model_data_balita->get_jumlah(),
            'jumlah_data_gejala' => $this->model_data_gejala->get_jumlah(),
           'jumlah_data_konsultasi' => $this->model_data_konsultasi->get_jumlah(),
      
        ];
        $data['judul'] = 'Dashboard';
        $data['nama'] = $this->session->userdata('nama');
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function index2()
    {
        $data['penyakit_data'] = $this->Diagnosa_model->get_most_common_penyakit();

        $this->load->view('diagnosa_pie_chart', $data);
    }
}
