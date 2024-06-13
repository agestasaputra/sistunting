<?php

class model_naive_bayes extends CI_Model
{


    //perhitungan naive bayes

    public function hitung_data_training()
    {
        $query1 = $this->db->query("SELECT * FROM table_data_training ");
        $total = $query1->num_rows();
        return $total;
    }

    public function hitung_data_kelas()
    {
        $query1 = $this->db->query("SELECT * FROM table_data_training WHERE status_gizi = 'Tidak Beresiko'");
        $total[1] = $query1->num_rows();
        $query2 = $this->db->query("SELECT * FROM table_data_training WHERE status_gizi = 'Beresiko'");
        $total[2] = $query2->num_rows();
        $query3 = $this->db->query("SELECT * FROM table_data_training WHERE status_gizi = 'Obesitas'");
        $total[3] = $query3->num_rows();
        $query4 = $this->db->query("SELECT * FROM table_data_training WHERE status_gizi = 'Stunting'");
        $total[4] = $query4->num_rows();
        return $total;
    }

    public function hitung_pb_kelas()
    {

        $jumlah_tidakberesiko = $this->hitung_data_kelas()[1];
        $jumlah_beresiko = $this->hitung_data_kelas()[2];
        $jumlah_obesitas = $this->hitung_data_kelas()[3];
        $jumlah_stunting = $this->hitung_data_kelas()[4];
        $jumlah_training = $this->hitung_data_training();

        $pb[1] = $jumlah_tidakberesiko / $jumlah_training;
        $pb[2] = $jumlah_beresiko / $jumlah_training;
        $pb[3] = $jumlah_obesitas / $jumlah_training;
        $pb[4] = $jumlah_stunting / $jumlah_training;
        return $pb;
    }

    public function pb_variabelkelas($nama_kolom, $nilai)
    {
        //deklarasi variabel jumlah tiap kelas
        $jumlah_tidakberesiko = $this->hitung_data_kelas()[1];
        $jumlah_beresiko = $this->hitung_data_kelas()[2];
        $jumlah_obesitas = $this->hitung_data_kelas()[3];
        $jumlah_stunting = $this->hitung_data_kelas()[4];

        //menghitung jumlah kelas Tidak Beresiko 
        $query1 = $this->db->query("SELECT * FROM table_data_training WHERE $nama_kolom = '$nilai' and status_gizi  = 'Tidak Beresiko'");
        $total1 = $query1->num_rows();
        if ($jumlah_tidakberesiko != 0) {
            $probabilitas_kelas[1] = $total1 / $jumlah_tidakberesiko;
        } else {
            $probabilitas_kelas[1] = 0;
        }

        //menghitung jumlah kelas Beresiko
        $query2 = $this->db->query("SELECT * FROM table_data_training WHERE $nama_kolom = '$nilai' and status_gizi  = 'Beresiko'");
        $total2 = $query2->num_rows();
        if ($jumlah_beresiko != 0) {
            $probabilitas_kelas[2] = $total2 / $jumlah_beresiko;
        } else {
            $probabilitas_kelas[2] = 0;
        }


        //menghitung jumlah kelas Obesitas
        $query3 = $this->db->query("SELECT * FROM table_data_training WHERE $nama_kolom = '$nilai' and status_gizi = 'Obesitas'");
        $total3 = $query3->num_rows();
        if ($jumlah_obesitas != 0) {
            $probabilitas_kelas[3] = $total3 / $jumlah_obesitas;
        } else {
            $probabilitas_kelas[3] = 0;
        }


        //menghitung jumlah kelas Stunting
        $query4 = $this->db->query("SELECT * FROM table_data_training WHERE $nama_kolom = '$nilai' and status_gizi = 'Stunting'");
        $total4 = $query4->num_rows();
        if ($jumlah_stunting != 0) {
            $probabilitas_kelas[4] = $total4 / $jumlah_stunting;
        } else {
            $probabilitas_kelas[4] = 0;
        }


        return $probabilitas_kelas;
    }

    public function hasil_klasifikasi($data)
    {
        $atribut['jenis_kelamin'] = $this->pb_variabelkelas('jenis_kelamin', $data['jenis_kelamin']);
        $atribut['kategori_usia'] = $this->pb_variabelkelas('kategori_usia', $data['kategori_usia']);
        $atribut['kategori_berat'] = $this->pb_variabelkelas('kategori_berat', $data['kategori_berat']);
        $atribut['kategori_tinggi'] = $this->pb_variabelkelas('kategori_tinggi', $data['kategori_tinggi']);

        $jumlah_tidakberesiko = $this->hitung_pb_kelas()[1];
        $jumlah_beresiko = $this->hitung_pb_kelas()[2];
        $jumlah_obesitas = $this->hitung_pb_kelas()[3];
        $jumlah_stunting = $this->hitung_pb_kelas()[4];

        $probabilitas[1] = $atribut['jenis_kelamin'][1] * $atribut['kategori_usia'][1] * $atribut['kategori_berat'][1]  * $atribut['kategori_tinggi'][1]*$jumlah_tidakberesiko ;

        $probabilitas[2] = $atribut['jenis_kelamin'][2] * $atribut['kategori_usia'][2]  * $atribut['kategori_berat'][2] * $atribut['kategori_tinggi'][2]*$jumlah_beresiko ;

        $probabilitas[3] = $atribut['jenis_kelamin'][3] * $atribut['kategori_usia'][3] * $atribut['kategori_berat'][3] * $atribut['kategori_tinggi'][3]*$jumlah_obesitas ;

        $probabilitas[4] = $atribut['jenis_kelamin'][4] * $atribut['kategori_usia'][4] * $atribut['kategori_berat'][4] * $atribut['kategori_tinggi'][4]*$jumlah_stunting ;

        $a = $probabilitas[1];
        $b = $probabilitas[2];
        $c = $probabilitas[3];
        $d = $probabilitas[4];

        if (($a > $b) && ($a > $c) && ($a > $d)) {
            return "Tidak Beresiko";
        } else if (($b > $a) && ($b > $c) && ($b > $d)) {
            return "Beresiko";
        } else if (($c > $a) && ($c > $b) && ($c > $d)) {
            return "Obesitas";
        } else if (($d > $a) && ($d > $b) && ($d > $c)) {
            return "Stunting";
        }
    }
}
