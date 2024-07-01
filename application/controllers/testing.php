<?php

class testing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data_balita');
        $this->load->model('model_data_gejala');
        $this->load->model('model_data_indikator');
        $this->load->model('user_model');
    }

    public function index()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Tetsing Stunting';
        $data['nama'] =  $this->session->userdata('nama');
        $data['data_gejala'] = $this->model_data_gejala->get();
        $data['data_balita'] = $this->model_data_balita->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('testing/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function get_detail_balita($id)
    {
        //Mengambil data balita dari model_data_balita
        $data_detail_balita = $this->model_data_balita->get_detail_ajax($id);
        echo json_encode($data_detail_balita);
    }

    // NEW LOGIC
    public function proses()
    {
        // function for calculate CF
        function cf_formula($cf_current, $cf_next)
        {
            $formula = $cf_current + $cf_next * (1 - $cf_current);
            $round_value = round($formula, 3);
            return $round_value;
        }

        $id_balita = $this->input->post('nama_balita');

        // Mengambil data detail balita dari db
        $data_detail_balita = $this->model_data_balita->get_detail($id_balita[0]);

        //mengambil inputan data gejala dari pengguna
        $nama_balita = $data_detail_balita['nama_balita'];
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $usia = $this->input->post('usia');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $inputan_gejala = $this->input->post('pilihan');
        $inputan_nilai_cf = $this->input->post('nilai_cf_calculation');
        
        // variable for calculate CF
        $cf_old = [];
        $cf_percentage = 0;
            
        $inputan_nilai_cf_filter = array_values(array_filter($inputan_nilai_cf, function ($value) {
            return $value > 0;
        }));
        
        // if $inputan_nilai_cf_filter is empty, will set $cf_percentage to 0
        if (count($inputan_nilai_cf_filter) === 0) {
            print_r('masuk 1');
            print_r('<br>');
            $cf_percentage = 0;
        }
        // if $inputan_nilai_cf_filter has 1 value, will set $cf_percentage = $inputan_nilai_cf_filter[0] * 100
        if (count($inputan_nilai_cf_filter) === 1) {
            print_r('masuk 2');
            print_r('<br>');
            $cf_percentage = $inputan_nilai_cf_filter[0] * 100;
        }
        // if $inputan_nilai_cf_filter has more than 1 value, will generate $cf_old and $cf_percentage with $cf_formula
        if (count($inputan_nilai_cf_filter) > 1) {
            print_r('masuk 3');
            print_r('<br>');
            $cf_old[] = cf_formula($inputan_nilai_cf_filter[0], $inputan_nilai_cf_filter[1]);
            if (count($inputan_nilai_cf_filter) > 2) {
                foreach ($inputan_nilai_cf_filter as $index => $pilihan) {
                    $cf = $inputan_nilai_cf_filter[$index];
                    if ($index > 1) {
                        $cf_old[] = cf_formula($cf_old[count($cf_old) - 1], $cf);
                    }
                }
            }
            $cf_percentage = $cf_old[count($cf_old) - 1] * 100;
        }

        // collect data to be inserted into table_data_konsultasi
        $data = [
            'nama_balita' => $nama_balita,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'tinggi' => $tinggi_badan,
            'hasil' => $cf_percentage
        ];
        // insert data to table_data_konsultasi
        $this->db->insert('table_data_konsultasi', $data);
        // toast flashdata
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data Konsultasi Berhasil Ditambahkan! </div>');
        // redirect into page '/data_konsultasi'
        redirect('data_konsultasi');
        return;
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
        $data['data_gejala'] = $this->model_data_gejala->get_detail($id);
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_gejala/ubah', $data);
        $this->load->view('templates/footer', $data);
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
