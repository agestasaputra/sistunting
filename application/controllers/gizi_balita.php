<?php

class gizi_balita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_gizi_balita');
		$this->load->model('user_model');
		$this->load->model('model_data_balita');
	}
	public function index()
	{
		if (!$this->user_model->cek_login()) {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
			redirect('auth');
		}
		$data['judul'] = 'Data Gizi Balita';
		$data['nama'] = $this->session->userdata('nama');
		$data['gizi_balita'] = $this->model_gizi_balita->get();
		$data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gizi_balita/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function form_tambah()
	{
		if (!$this->user_model->cek_login()) {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
			redirect('auth');
		}
		$data['judul'] = 'Data Gizi Balita';
		$data['nama'] = $this->session->userdata('nama');
		$data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
		$data['data_balita'] = $this->model_data_balita->get();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gizi_balita/tambah', $data);
		$this->load->view('templates/footer', $data);
	}
	public function tambah()
	{
		// mengambil id_balita dari input_nama_balita dari halaman view dan menyimpannya ke dalam variabel
		$id_balita = $this->input->post('nama_balita');
		// Mengambil data detail balita dari db dan menyimpannya ke dalam variabel
		$data_detail_balita = $this->model_data_balita->get_detail($id_balita);
		$nama_balita = $data_detail_balita['nama_balita'];

		// mengumpulkan data yang akan dimasukkan ke dalam table_gizi_balita
		$gizi_balita = [
			'id_balita' => $id_balita,
			'nama_balita' => $nama_balita,
			'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
			'usia' => $this->input->post('usia', true),
			'berat_badan' => $this->input->post('berat_badan', true),
			'tinggi_badan' => $this->input->post('tinggi_badan', true),
			// 'status_gizi' => $this->input->post('status_gizi', true),
		];
		$this->db->insert('table_gizi_balita', $gizi_balita);
		$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
		<b>Data Gizi Balita Berhasil Ditambahkan! </div>');
		redirect('gizi_balita');
	}
	public function detail_ubah($id)
	{
		if (!$this->user_model->cek_login()) {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
			redirect('auth');
		}
		
		// Mengambil data gizi_balita dari db dan menyimpannya ke dalam variabel
		$data_gizi_balita = $this->model_gizi_balita->get_detail($id);
		// Mengambil data detail_balita dari db dan menyimpannya ke dalam variabel
		$data_detail_balita = $this->model_data_balita->get_detail($data_gizi_balita['id_balita']);

		$data['judul'] = 'Ubah Data Gizi Balita';
		$data['nama'] = $this->session->userdata('nama');
		$data['data_gizi'] = $data_gizi_balita;
		$data['data_detail_balita'] = $data_detail_balita;
		$data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gizi_balita/ubah', $data);
		$this->load->view('templates/footer', $data);
	}
	public function ubah()
	{
		$gizi_balita = [
			'nama_balita' => $this->input->post('nama_balita', true),
			'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
			'usia' =>  $this->input->post('usia', true),
			'berat_badan' =>  $this->input->post('berat_badan', true),
			'tinggi_badan' =>  $this->input->post('tinggi_badan', true),
	
			// 'status_gizi' => $this->input->post('status_gizi', true),
		];
		$where = array('id_timbang' => $this->input->post('id_timbang', true));
		$this->model_gizi_balita->ubah_data($where, $gizi_balita, 'table_gizi_balita');
		$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
        <b>Data Gizi Balita Berhasil Diubah! </div>');
		redirect('gizi_balita');
	}
	public function hapus()
	{

		$where = array('id_timbang' => $this->input->post('id_timbang', true));
		$this->model_gizi_balita->hapus_data($where, 'table_gizi_balita');
		$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
        <b>Data Gizi Balita Berhasil Dihapus! </div>');
		redirect('gizi_balita');
	}

	public function cetak()
    {
        if (!$this->user_model->cek_login()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
            Ups..Silahkan Login Terlebih Dahulu yah, Terima kasih!!</div>');
            redirect('auth');
        }
        $data['judul'] = 'Laporan Data Detail Gizi Balita';
        $data['nama'] =  $this->session->userdata('nama');
        $data['gizi_balita'] = $this->model_gizi_balita->get();
        $data['data_user'] = $this->user_model->get_detail($this->session->userdata('nama'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gizi_balita/cetak', $data);
        $this->load->view('templates/footer', $data);
    }
}


