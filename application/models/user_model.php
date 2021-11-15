<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

  public function getkelompok()
  {
    $query = "SELECT `anggota`.*, `kelompok`.`nama_kelompok`
                FROM `anggota` JOIN `kelompok`
                ON `anggota`.`id_kelompok` = `kelompok`.`id_kelompok`
              ";
    return $this->db->query($query)->result_array();
  }

  public function detail_kelompok($id_kelompok)
  {
    $this->db->select('*');
    $this->db->from('anggota');
    $this->db->join('kelompok', 'kelompok.id_kelompok = anggota.id_kelompok', 'left');
    $this->db->where('kelompok.id_kelompok', $id_kelompok);
    return $this->db->get()->result();
  }

  public function total_lahan($id)
  {

    return $this->db->query("SELECT SUM(lahan) as total FROM anggota WHERE id_kelompok='$id'");
  }

  function hapus_anggota($id)
  {
    $query = $this->db->query("DELETE FROM anggota WHERE id = '$id'");
  }

  function hapus_modal($id)
  {
    $query = $this->db->query("DELETE FROM modal WHERE id = '$id'");
  }


  function hapus_hasil($id)
  {
    $query = $this->db->query("DELETE FROM hasil_sawit WHERE id = '$id'");
  }

  function hapus_pembagian($id_pembagian)
  {
    $query = $this->db->query("DELETE FROM pembagian_lahan WHERE id_pembagian = '$id_pembagian'");
  }

  // SELECT SUM(stok) AS total_stok FROM tb_barang WHERE kategori='Game';


}
