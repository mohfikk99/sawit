<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_model extends CI_Model
{

    public function total_modal()
    {
        $query = "SELECT * FROM `modal` ORDER BY id DESC LIMIT 1";

        return $this->db->query($query)->row_array();
    }

    public function harga_sawit()
    {
        $query = "SELECT * FROM `harga_sawit` ORDER BY id DESC LIMIT 1";

        return $this->db->query($query)->row_array();
    }

    public function pembagian_hasil()
    {
        $query = "SELECT * FROM `hasil_sawit` ORDER BY id DESC LIMIT 1";

        return $this->db->query($query)->row_array();
    }


    // public function getAnggota()
    // {
    //   $query = "SELECT `pembagian_lahan`.*, `anggota`.`lahan`
    //             FROM `pembagian_lahan` JOIN `anggota`
    //             ON `pembagian_lahan`.`lahan_anggota` = `anggota`.`lahan`
    //           ";
    //       return $this->db->query($query)->result_array();
    // }

    // public function total_sawit()
    // {
    //     $this->db->select('harga_total_sawit');
    //     $this->db->from('hasil_sawit');
    //     return $this->db->get()->row();
    // }


    // public function total_modal()
    // {
    //     $this->db->select('total');
    //     $this->db->from('modal');
    //     return $this->db->get()->row();
    // }

}



// foreach ($sqlmodal as $row) {

//     $hasil=$row->harga_total_sawit;

//     echo $hasil;

    

//     $query=$this->db->query("SELECT * FROM hasil_sawit WHERE harga_total_sawit='$hasil'");

//     $sqlmol=$this->db->query("SELECT * FROM modal GROUP BY total");

//     foreach ($sqlmol as $row) {
        
//         $hasil_modal=$row->total;

//         $coba = $hasil-$hasil_modal;

//         $query_tmp_penyakit=$this->db->query("INSERT INTO hasil_bersih(bersih) VALUES ('$coba')");

//     }

// }