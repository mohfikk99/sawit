<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->model('Admin_model');


    if ($this->Login_model->is_level() != "admin") {
      redirect("home/proses_login");
    }
  }

  public function index()
  {
    $data['title'] = 'Halaman data User';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    // $data['user'] = $this->Admin_model->getLogin();
    $data['user'] = $this->db->get('login')->result_array();

    $this->form_validation->set_rules('name', 'nama pengguna', 'required|trim|is_unique[login.name]', ['is_unique' => 'Nama ini sudah terdaftar!']);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_admin', $data);
      $this->load->view('templates/topbar_admin', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [

        'name' => $this->input->post('name'),
        'password' => $this->input->post('password'),
        'level' => $this->input->post('level'),
      ];

      $this->db->insert('login', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        Nama pengguna berhasil ditambahkan</div>');
      redirect('admin');
    }
  }


  public function edit_pengguna($id)
  {
    $data['title'] = 'Halaman Edit Pengguna';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $where = array('id' => $id);
    $data['pengguna'] = $this->Admin_model->edit_data($where, 'login')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_admin', $data);
    $this->load->view('templates/topbar_admin', $data);
    $this->load->view('admin/edit_pengguna', $data);
    $this->load->view('templates/footer');
  }

  public function update_pengguna()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $password = $this->input->post('password');
    $level = $this->input->post('level');


    $data = array(
      'name' => $name,
      'password' => $password,
      'level' => $level,

    );

    $where = array(
      'id' => $id
    );

    $this->Admin_model->update_data($where, $data, 'login');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Nama pengguna berhasil di edit</div>');
    redirect('admin');
  }

  public function hapus_pengguna($id)
  {

    $this->Admin_model->hapus_pengguna($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Nama pengguna berhasil di hapus</div>');
    redirect('admin');
  }


  public function harga_sawit()
  {
    $data['title'] = 'Halaman Harga Sawit';
    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $data['harga_sawit'] = $this->db->get('harga_sawit')->result_array();

    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
    $this->form_validation->set_rules('harga_sawit', 'harga_sawit', 'required|trim');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_admin', $data);
      $this->load->view('templates/topbar_admin', $data);
      $this->load->view('admin/harga_sawit', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'tanggal' => $this->input->post('tanggal'),
        'harga_sawit' => $this->input->post('harga_sawit'),
      ];

      $this->db->insert('harga_sawit', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
         berhasil ditambahkan</div>');
      redirect('admin/harga_sawit');
    }
  }


  public function edit_harga_sawit($id)
  {
    $data['title'] = 'Halaman Edit Harga Sawit';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $where = array('id' => $id);
    $data['harga_sawit'] = $this->Admin_model->edit_data($where, 'harga_sawit')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_admin', $data);
    $this->load->view('templates/topbar_admin', $data);
    $this->load->view('admin/edit_harga_sawit', $data);
    $this->load->view('templates/footer');
  }

  public function update_harga_sawit()
  {
    $id = $this->input->post('id');
    $tanggal = $this->input->post('tanggal');
    $harga_sawit = $this->input->post('harga_sawit');


    $data = array(
      'tanggal' => $tanggal,
      'harga_sawit' => $harga_sawit,
    );

    $where = array(
      'id' => $id
    );

    $this->Admin_model->update_data($where, $data, 'harga_sawit');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Nama pengguna berhasil di edit</div>');
    redirect('admin/harga_sawit');
  }

  public function hapus_harga_sawit($id)
  {

    $this->Admin_model->hapus_harga_sawit($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Harga Sawit berhasil di hapus</div>');
    redirect('admin/harga_sawit');
  }


  public function kelompok()
  {
    $data['title'] = 'Halaman Data Kelompok';
    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $data['pengguna'] = $this->Admin_model->getPengguna();
    $data['login'] = $this->Admin_model->getLogin();

    $this->form_validation->set_rules('nama_kelompok', 'nama kelompok', 'required|trim|is_unique[kelompok.nama_kelompok]', ['is_unique' => 'Nama Kelompok ini sudah terdaftar!']);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_admin', $data);
      $this->load->view('templates/topbar_admin', $data);
      $this->load->view('admin/kelompok', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'id_login' => $this->input->post('id_login'),
        'nama_kelompok' => $this->input->post('nama_kelompok'),

      ];

      $this->db->insert('kelompok', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
         berhasil ditambahkan</div>');
      redirect('admin/kelompok');
    }
  }

  public function edit_kelompok($id_kelompok)
  {
    $data['title'] = 'Halaman Edit kelompok';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $where = array('id_kelompok' => $id_kelompok);
    $data['kelompok'] = $this->Admin_model->edit_data($where, 'kelompok')->result();
    $data['pengguna'] = $this->Admin_model->getLogin();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_admin', $data);
    $this->load->view('templates/topbar_admin', $data);
    $this->load->view('admin/edit_kelompok', $data);
    $this->load->view('templates/footer');
  }

  public function update_kelompok()
  {

    $id_kelompok = $this->input->post('id_kelompok');
    $id_login = $this->input->post('id_login');
    $nama_kelompok = $this->input->post('nama_kelompok');

    $data = array(
      'id_login' => $id_login,
      'nama_kelompok' => $nama_kelompok,
    );

    $where = array(
      'id_kelompok' => $id_kelompok
    );

    $this->Admin_model->update_data($where, $data, 'kelompok');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Nama pengguna berhasil di edit</div>');
    redirect('admin/kelompok');
  }

  public function hapus_kelompok($id_kelompok)
  {

    $this->Admin_model->hapus_kelompok($id_kelompok);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Nama pengguna berhasil di hapus</div>');
    redirect('admin/kelompok');
  }


  public function total_timbangan_harga()
  {
    $data['title'] = 'Halaman Total Timbangan Harga';
    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $data['timbangan'] = $this->Admin_model->timbangan();
    $data['pengguna'] = $this->Admin_model->getPengguna();

    $this->form_validation->set_rules('jumlah_timbangan', 'Jumlah Timbangan', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_admin', $data);
      $this->load->view('templates/topbar_admin', $data);
      $this->load->view('admin/total_timbangan_harga', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'id_login' => $this->input->post('id_login'),
        'jumlah_timbangan' => $this->input->post('jumlah_timbangan'),
        'harga_total_sawit' => $this->input->post('harga_total_sawit'),

      ];

      $this->db->insert('hasil_timbangan', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
         berhasil ditambahkan</div>');
      redirect('admin/total_timbangan_harga');
    }
  }


  public function hapus_harga_timbangan($id_timbangan)
  {

    $this->Admin_model->hapus_timbangan($id_timbangan);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    berhasil di hapus</div>');
    redirect('admin/total_timbangan_harga');
  }
}

  /* End of file Admin.php */
