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

    // OLD LOGIC
    // public function proses()
    // {
    //     //Mengambil data gejala dari pakar
    //     $data_gejala = $this->model_data_gejala->get();

    //     //mengambil inputan data gejala dari pengguna
    //     $inputan_gejala = $this->input->post('pilihan');
    //     $inputan_kode = $this->input->post('kode_gejala');

    //     $jenis_kelamin = $this->input->post('jenis_kelamin');
    //     $usia = $this->input->post('kategori_usia');
    //     $tinggi_badan = intval($this->input->post('tinggi_badan'));

    //     //memasukan inputan gejala ke dalam array data inputan.
    //     $data_indikator = $this->model_data_indikator->cari_data($usia, $jenis_kelamin);
    //     $data_inputan=array();
    //     foreach ($data_indikator as $a) {
    //         if ($tinggi_badan < $a['tinggi']) {
    //             $data_inputan[] = $a['nilai_cf'];
    //         }

    //     }
    //     if($data_inputan==NULL){
    //         $data_inputan[]=0;
    //     }
        
    //     foreach ($inputan_gejala as $index => $pilihan) {
    //         if ($pilihan == "Ya") {
    //             $data_inputan[] = $inputan_kode[$index];
    //         }
    //     }

    //     //Fungsi untuk menghitung kombinasi Certainty Factor
    //     function calculateCFCombine($cf1, $cf2)
    //     {
    //         return $cf1 + $cf2 * (1 - $cf1);
    //     }


    //     if ($data_inputan > 2) {
    //         // Inisialisasi nilai kombinasi Certainty Factor
        
    //         $nilai_cf1 = $data_inputan[0];
    //         $cek_gejala2 = $this->model_data_gejala->get_data($data_inputan[1]);
    //         $nilai_cf2 = $cek_gejala2['nilai_cf'];
    //         $cfCombine = calculateCFCombine($nilai_cf1, $nilai_cf2);
    //         $data_inputancombine = array_slice($data_inputan, 2);
    //         // Perhitungan kombinasi untuk gejala yang dialami oleh pengguna
    //         if (!empty($data_inputan)) {
    //             foreach ($data_inputancombine as $kode_gejala) {
    //                 $cari_gejala = $this->model_data_gejala->get_data($kode_gejala);

    //                 $nilai_cf = $cari_gejala['nilai_cf'];
    //                 $cfCombine = calculateCFCombine($cfCombine, $nilai_cf);
    //             }
    //         }
    //     }elseif ($data_inputan==2) {
    //         $nilai_cf1 = $data_inputan[0];
    //         $cek_gejala2 = $this->model_data_gejala->get_data($data_inputan[1]);
    //         $nilai_cf2 = $cek_gejala2['nilai_cf'];
    //         $cfCombine = calculateCFCombine($nilai_cf1, $nilai_cf2);
    //     }

    //     // Persentase Akhir
    //     $percentage = $cfCombine*100;

    //     $data_konsultasi=[
    //         'nama_balita'=>$this->input->post('nama_balita'),
    //         'jenis_kelamin'=>$jenis_kelamin,
    //         'usia'=>$this->input->post('usia'),
    //         'tinggi'=>$tinggi_badan,
    //         'hasil'=>$percentage

    //     ];
    //     $this->db->insert('table_data_konsultasi', $data_konsultasi);
    //     $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
    //     <b>Data konsultasi Berhasil Disimpan! </div>');
    //     redirect('data_konsultasi');
    // }

    // NEW LOGIC
    public function proses()
    {
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
        $inputan_nilai_cf = $this->input->post('nilai_cf');
        
        $cf_old = [];
        $cf_percentage = 0;
        $data = [
            'nama_balita' => $nama_balita,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'tinggi' => $tinggi_badan,
            'hasil' => $cf_percentage
        ];
            
        $inputan_nilai_cf_filter = array_values(array_filter($inputan_nilai_cf, function ($value) {
            return $value > 0;
        }));
        
        if (count($inputan_nilai_cf_filter) === 0) {
            print_r('masuk 1');
            print_r('<br>');
            $cf_percentage = 0;
        }
        if (count($inputan_nilai_cf_filter) === 1) {
            print_r('masuk 2');
            print_r('<br>');
            $cf_percentage = $inputan_nilai_cf_filter[0] * 100;
        }
        if (count($inputan_nilai_cf_filter) > 1) {
            print_r('masuk 3');
            print_r('<br>');
            $cf_old[] = cf_formula($inputan_nilai_cf_filter[0], $inputan_nilai_cf_filter[1]);
            if (count($inputan_nilai_cf_filter) > 2) {
                foreach ($inputan_nilai_cf_filter as $index => $pilihan) {
                    $kode_gejala = $inputan_gejala[$index];
                    $cf = $inputan_nilai_cf_filter[$index];
                    if ($index > 1) {
                        $cf_old[] = cf_formula($cf_old[count($cf_old) - 1], $cf);
                    }
                }
            }
            $cf_percentage = $cf_old[count($cf_old) - 1] * 100;
        }
        print_r('$inputan_nilai_cf_filter:');
        print_r('<br>');
        print_r($inputan_nilai_cf_filter);
        print_r('<br>');
        print_r('$cf_old:');
        print_r('<br>');
        print_r($cf_old);
        print_r('<br>');
        print_r('$cf_percentage:');
        print_r($cf_percentage);
        $data = [
            'nama_balita' => $nama_balita,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'tinggi' => $tinggi_badan,
            'hasil' => $cf_percentage
        ];
        $this->db->insert('table_data_konsultasi', $data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data Konsultasi Berhasil Ditambahkan! </div>');
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
