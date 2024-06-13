<?php

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->session->unset_userdata('nama');
        $this->load->view('templates/auth_header');
        $this->load->view('auth/index');
    }

    public function register()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('auth/register');
    }
    public function proses_login()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_user');
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $cek_username = $this->user_model->cek_username($username);
        if ($cek_username > 0) {
            $cek_password = $this->user_model->get_password($username);
            if ($password == $cek_password) {
                $data =   $this->db->get_where('table_user', ['username' => $username])->row();
                $this->session->set_userdata('nama', $data->nama);
                $this->session->set_userdata('id_user', $data->id_user);
                if (($data->status != 'Admin')) {
                    redirect('home', $data);
                } else {
                    redirect('dashboard', $data);
                }
            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
                    Password yang anda masukan salah! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
                    Username yang anda masukan belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function proses_register()
    {
        $data_user = [
            'nama' => $this->input->post('nama', true),
            'username' =>  $this->input->post('username', true),
            'nohp' =>  $this->input->post('nohp', true),
            'password' =>  $this->input->post('password'),
            'status' => "User"
        ];
        $this->db->insert('table_user', $data_user);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
            <b>Data Berhasil Didaftarkan! </div>');
        redirect('auth/register');
    }
}
