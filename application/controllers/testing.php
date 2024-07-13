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
        $data['judul'] = 'Testing Stunting';
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
        // fungsi ini bertujuan untuk menghitung nilai cf_old
        function cf_formula($cf_variable_satu, $cf_variable_dua)
        {
            // kode ini adalah formula/rumus untuk menghitung nilai cf_old
            $formula = $cf_variable_satu + $cf_variable_dua * (1 - $cf_variable_satu);
            // round_value bertujuan untuk membulatkan nilai cf_old menjadi 3 angka dibelakang koma
            $round_value = round($formula, 3);
            return $round_value;
        }
        // fungsi ini adalah fungsi utama untuk memproses perhitungan nilai CF 
        function logic_proses_calculate_cf_percentage($hasil_cf_calculation)
        {
            $cf_old = 0;
            $cf_percentage = 0;
            
            // $hasil_cf_calculation_filter adalah value $hasil_cf_calculation yang lebih besar dari 0
            $hasil_cf_calculation_filter = array_values(array_filter($hasil_cf_calculation, function ($value) {
                return $value > 0;
            }));

            // untuk debugging
            // print_r('<b>$hasil_cf_calculation_filter:</b>');
            // print_r('<br>');
            // print_r($hasil_cf_calculation_filter);
            // print_r('<br>');
            
            // jika $hasil_cf_calculation_filter kosong, maka $cf_percentage = 0
            if (count($hasil_cf_calculation_filter) === 0) {
                // untuk debugging
                // print_r('#1');
                $cf_percentage = 0;
            }
            
            // jika $hasil_cf_calculation_filter hanya memiliki 1 value, maka $cf_percentage = $hasil_cf_calculation_filter[0] * 100
            if (count($hasil_cf_calculation_filter) === 1) {
                // untuk debugging
                // print_r('#2');
                $cf_percentage = $hasil_cf_calculation_filter[0] * 100;
            }
            
            // jika $hasil_cf_calculation_filter memiliki lebih dari 1 value, maka akan menghasilkan $cf_old dan $cf_percentage dengan menggunakan $cf_formula
            if (count($hasil_cf_calculation_filter) > 1) {
                // untuk debugging
                // print_r('#3');

                // menghasilkan $cf_old dengan menggunakan $cf_formula dari $hasil_cf_calculation_filter[0] dan $hasil_cf_calculation_filter[1]
                $cf_old = cf_formula($hasil_cf_calculation_filter[0], $hasil_cf_calculation_filter[1]);

                // jika $hasil_cf_calculation_filter memiliki lebih dari 2 value, maka akan dilakukan looping
                if (count($hasil_cf_calculation_filter) > 2) {
                    foreach ($hasil_cf_calculation_filter as $index => $pilihan) {
                        // $cf adalah nilai dari $hasil_cf_calculation_filter selanjutnya
                        $cf_next = $hasil_cf_calculation_filter[$index];

                        // jika $index lebih dari 1, maka $cf_old akan ditimpa dengan nilai baru hasil dari $cf_formula
                        if ($index > 1) {
                            $cf_old = cf_formula($cf_old, $cf_next);
                        }
                    }
                }
                
                // $cf_percentage adalah nilai dari $cf_old dikali 100
                $cf_percentage = $cf_old * 100;
            }
            return $cf_percentage;
        }
        function getKeterangan($cf_percentage)
        {
            $keterangan = '';
            if ($cf_percentage >= 0 && $cf_percentage < 55) {
                $keterangan = 'Tidak stunting';
            } else {
                $keterangan = 'Stunting';
            }
            return $keterangan;
        }

        // mengambil id_balita dari input_nama_balita dari halaman view dan menyimpannya ke dalam variabel
        $id_balita = $this->input->post('nama_balita');
        // Mengambil data detail balita dari db dan menyimpannya ke dalam variabel
        $data_detail_balita = $this->model_data_balita->get_detail($id_balita);

        // mengambil value dari seluruh form dari halaman view dan menyimpannya ke dalam variabel
        $nama_balita = $data_detail_balita['nama_balita'];
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $usia = $this->input->post('usia');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $dropdown_inputan_gejala = $this->input->post('pilihan');
        $data_gejala = $this->model_data_gejala->get();

        // untuk debugging
        // print_r('<b>$dropdown_inputan_gejala - json_encode</b>');
        // print_r('<br>');
        // print_r(json_encode($dropdown_inputan_gejala));
        // print_r(gettype($dropdown_inputan_gejala));
        // print_r('<br>');

        // mengambil nilai_cf dari $data_gejala dan menyimpannya ke dalam variabel
        // ex: [0.1, 0.2, 0.3, 0.4, 0.5]
        $data_gejala_string = array_map(function ($value) {
            return $value['nilai_cf'];
        }, $data_gejala);
        
        // untuk debugging
        // print_r('<b>$data_gejala_string - json_encode</b>');
        // print_r('<br>');
        // print_r(json_encode($data_gejala_string));
        // print_r(gettype($data_gejala_string));
        // print_r('<br>');
        
        // logic untuk menghitung nilai CF per gejala dengan cara mengalikan dropdown_inputan_gejala dengan data_gejala_string
        $hasil_cf_calculation = [];
        foreach ($dropdown_inputan_gejala as $index => $value) {
            $result = $value * $data_gejala_string[$index];
            $hasil_cf_calculation[] = round($result, 3);
        }

        // untuk debugging
        // print_r('<b>$hasil_cf_calculation - json_encode</b>');
        // print_r('<br>');
        // print_r($hasil_cf_calculation);
        // print_r(gettype($hasil_cf_calculation));
        // print_r('<br>');
        
        // logic untuk memproses kalkulasi dari nilai CF per gejala
        $cf_percentage = logic_proses_calculate_cf_percentage($hasil_cf_calculation);
        
        // untuk debugging
        // print_r('<b>$cf_percentage - json_encode</b>');
        // print_r('<br>');
        // print_r($cf_percentage);
        // print_r(gettype($cf_percentage));
        // print_r('<br>');
        
        // mengumpulkan data yang akan dimasukkan ke dalam table_data_konsultasi
        $data = [
            'nama_balita' => $nama_balita,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'tinggi' => $tinggi_badan,
            'diagnosa' => $cf_percentage,
            'keterangan' => getKeterangan($cf_percentage)
        ];
        // insert data ke table_data_konsultasi
        $this->db->insert('table_data_konsultasi', $data);
        // notifikasi flashdata
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data Konsultasi Berhasil Ditambahkan! </div>');
        // auto pindah halaman ke url '/data_konsultasi'
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
