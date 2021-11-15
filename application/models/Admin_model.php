<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function getLogin()
  {
    $query = "SELECT * FROM login WHERE level = 'user'";

    return $this->db->query($query)->result_array();
  }

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function hapus_pengguna($id)
  {
    $query = $this->db->query("DELETE FROM login WHERE id = '$id'");
  }

  function hapus_harga_sawit($id)
  {
    $query = $this->db->query("DELETE FROM harga_sawit WHERE id = '$id'");
  }

  function hapus_timbangan($id_timbangan)
  {
    $query = $this->db->query("DELETE FROM hasil_timbangan WHERE id_timbangan = '$id_timbangan'");
  }

  function hapus_kelompok($id_kelompok)
  {
    $query = $this->db->query("DELETE FROM kelompok WHERE id_kelompok = '$id_kelompok'");
  }

  public function getPengguna()
  {
    $query = "SELECT *
              FROM `kelompok` JOIN `login`
              ON `kelompok`.`id_login` = `login`.`id`
              WHERE `login`.`level` = 'user'
            ";
    return $this->db->query($query)->result_array();
  }

  public function timbangan()
  {
    $query = "SELECT * 
              FROM `hasil_timbangan` INNER JOIN `kelompok`
              ON `hasil_timbangan`.`id_login` = `kelompok`.`id_login`
             ";
    return $this->db->query($query)->result_array();
  }
}

/* End of file Admin_model.php */
