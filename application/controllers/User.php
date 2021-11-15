<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->model('user_model');
    $this->load->model('hasil_model');

    //cek session dan level user
    if ($this->Login_model->is_level() != "user") {
      redirect("home/proses_login");
    }
  }

  public function index()
  {
    $data['title'] = 'Halaman Penyewaan';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $this->load->view('templates/header_user', $data);
    $this->load->view('user/utama', $data);
  }

  public function kelompok()
  {
    $data['title'] = 'Kelompok';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $this->load->view('templates/header_user', $data);
    $this->load->view('user/kelompok', $data);
    $this->load->view('templates/footer_user');
  }


  public function proses_anggota()
  {

    $data['kelompok'] = $this->db->get('kelompok')->result_array();

    $data = [
      'id_kelompok' => $this->input->post('id_kelompok'),
      'nama' => $this->input->post('nama'),
      'lahan' => $this->input->post('lahan'),
    ];

    $this->db->insert('anggota', $data);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    berhasil ditambahkan</div>');
    redirect('user/kelompok');
  }


  public function anggota($id_kelompok)
  {
    $data['title'] = 'anggota';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $data['anggota'] = $this->user_model->detail_kelompok($id_kelompok);
    $data['total_lahan'] = $this->user_model->total_lahan($id_kelompok)->row();

    $this->load->view('templates/header_user', $data);
    $this->load->view('user/anggota', $data);
    $this->load->view('templates/footer_user');
  }

  public function hapus_anggota($id)
  {

    $this->user_model->hapus_anggota($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Nama pengguna berhasil di hapus</div>');
    redirect('user/kelompok');
  }




  public function modal()
  {
    $data['title'] = 'Pesanan Anda';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $this->form_validation->set_rules('transaksi', 'transaksi', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header_user', $data);
      $this->load->view('user/modal', $data);
      $this->load->view('templates/footer_user');
    } else {
      $data = [
        'id_login' => $this->input->post('id_login'),
        'transaksi' => $this->input->post('transaksi'),
        'biaya_pupuk' => $this->input->post('biaya_pupuk'),
        'biaya_obat' => $this->input->post('biaya_obat'),
        'biaya_semprot' => $this->input->post('biaya_semprot'),
        'biaya_pupuk_pekerja' => $this->input->post('biaya_pupuk_pekerja'),
        'biaya_paras_pekerja' => $this->input->post("biaya_paras_pekerja"),
        'biaya_lainnya' => $this->input->post("biaya_lainnya"),
        'total' => $this->input->post('total'),

      ];

      $this->db->insert('modal', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      berhasil ditambahkan</div>');
      redirect('user/modal');
    }
  }

  public function hapus_modal($id)
  {

    $this->user_model->hapus_modal($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
  Nama pengguna berhasil di hapus</div>');
    redirect('user/modal');
  }


  public function hasil()
  {
    $data['title'] = 'selamat';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    // $data['harga'] = $this->db->get('harga_sawit')->row_array();
    $data['harga'] = $this->hasil_model->harga_sawit();
    $data['total_modal'] = $this->hasil_model->total_modal();



    $this->form_validation->set_rules('timbangan', 'timbangan', 'required|trim');
    $this->form_validation->set_rules('harga_total_sawit', 'harga_total_sawit', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header_user', $data);
      $this->load->view('user/hasil', $data);
      $this->load->view('templates/footer_user');
    } else {
      $data = [
        'id_login' => $this->input->post('id_login'),
        'transaksi' => $this->input->post('transaksi'),
        'timbangan' => $this->input->post('timbangan'),
        'harga_total_sawit' => $this->input->post('harga_total_sawit'),
        'total_modal' => $this->input->post('total_modal'),
        'hasil_bersih' => $this->input->post('hasil_bersih'),
      ];

      $this->db->insert('hasil_sawit', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      berhasil ditambahkan</div>');
      redirect('user/hasil');
    }
  }

  public function hapus_hasil($id)
  {

    $this->user_model->hapus_hasil($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
  Nama pengguna berhasil di hapus</div>');
    redirect('user/hasil');
  }



  public function pembagian()
  {
    $data['title'] = 'selamat';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();


    // $data['hasil_bersih'] = $this->hasil_model->pembagian_hasil();
    // $data['anggota'] = $this->db->get('anggota')->result_array();
    // $data['akhir'] = $this->db->get('pembagian_lahan')->result_array();
    // $data['lahan'] = $this->hasil_model->getAnggota();

    $this->form_validation->set_rules('id_anggota', 'id_anggota', 'required|trim');
    $this->form_validation->set_rules('total_lokasi', 'total_lokasi', 'required|trim');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header_user', $data);
      $this->load->view('user/pembagian', $data);
      $this->load->view('templates/footer_user');
    } else {
      $data = [
        'id_login' => $this->input->post('id_login'),
        'id_anggota' => $this->input->post('id_anggota'),
        'transaksi' => $this->input->post('transaksi'),
        'hasil_bersih' => $this->input->post('hasil_bersih'),
        'total_lokasi' => $this->input->post('total_lokasi'),
        'hasil_pembagi' => $this->input->post('hasil_pembagi'),
        'hasil_akhir' => $this->input->post('hasil_akhir'),
      ];

      $this->db->insert('pembagian_lahan', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      berhasil ditambahkan</div>');
      redirect('user/pembagian');
    }
  }


  public function hapus_pembagian($id_pembagian)
  {

    $this->user_model->hapus_pembagian($id_pembagian);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
  anggota kelompok berhasil di hapus</div>');
    redirect('user/pembagian');
  }

  public function cetak_pembagian($id_pembagian)
  {
    $data['title'] = 'selamat';

    $data['login'] = $this->db->get_where('login', ['name' => $this->session->userdata('name')])->row_array();

    $data['nama'] = $this->db->get_where('pembagian_lahan', ['id_pembagian' => $id_pembagian])->row_array();

    $this->load->view('templates/header_user', $data);
    $this->load->view('user/cetak_pembagian', $data);
    $this->load->view('templates/footer_user');
  }
}

  /* End of file User.php */
