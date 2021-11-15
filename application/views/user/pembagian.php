<?php

$id_login = $login['id'];

$akses_hasil_bersih = "SELECT * FROM hasil_sawit WHERE id_login = $id_login ORDER BY id DESC LIMIT 1";
$hasil_bersih = $this->db->query($akses_hasil_bersih)->row_array();

$akses_kelompok = "SELECT * FROM kelompok WHERE id_login = $id_login ";
$kelompok = $this->db->query($akses_kelompok)->row_array();

$data_kelompok = $kelompok['id_kelompok'];

$akses_anggota = "SELECT * FROM anggota WHERE id_kelompok = $data_kelompok ";
$anggota = $this->db->query($akses_anggota)->result_array();

$lahan = "SELECT SUM(lahan) as total FROM anggota WHERE id_kelompok='$data_kelompok'";
$total_lahan = $this->db->query($lahan)->row();

echo $total_lahan->total;


$akses = "SELECT * 
            FROM pembagian_lahan JOIN anggota
            ON pembagian_lahan.id_anggota = anggota.id
            WHERE id_login = $id_login ";
$akhir = $this->db->query($akses)->result_array()


?>


<div class="container_fluid turun bawah">

  <script>
    function startCal() {
      interval = setInterval("cal()", 1);
    }

    function cal() {
      one = document.autoSumForm.hasil_bersih.value;
      two = document.autoSumForm.total_lokasi.value;
      three = document.autoSumForm.hasil_pembagi.value = (one * 1) / (two * 1);
      four = document.autoSumForm.lahan_anggota.value;
      document.autoSumForm.hasil_akhir.value = (three * 1) * (four * 1);
    }

    function stopCal() {
      clearInterval(interval);
    }
  </script>

  <script>
    function tampilkan() {
      var nama_kota = document.getElementById("autoSumForm").id_anggota.value;
      <?php foreach ($anggota as $m) : ?>
        if (nama_kota == "<?= $m['id']; ?>") {
          document.getElementById("lahan_anggota").innerHTML = "<option value='<?= $m['lahan']; ?>'><?= $m['nama']; ?> :<?= $m['lahan']; ?></option>"; //lahan
        }
      <?php endforeach; ?>
    }
  </script>


  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>

  <?= $this->session->flashdata('massage'); ?>


  <form name="autoSumForm" id="autoSumForm" action="<?= base_url('user/pembagian'); ?>" method="post">
    <div class="modal-body section">
      <div class="row">
        <div class="col-sm-6">

          <div class="form-group">
            <label for="">Transaksi</label>
            <input type="text" class="form-control" name="id_login" value="<?= $login['id']; ?>" hidden>
            <input type="text" class="form-control" name="transaksi" value="<?= $hasil_bersih['transaksi']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="">Hasil Bersih Penjualan Sawit</label>
            <input type="text" class="form-control" name="hasil_bersih" value="<?= $hasil_bersih['hasil_bersih']; ?>" readonly onFocus="startCal();" onBlur="stopCal();">
          </div>

        </div>
        <div class="col-sm-6">


          <div class="form-group">
            <input type="hidden" class="form-control" name="total_lokasi" placeholder="total lokasi" value="<?= $total_lahan->total; ?>" onFocus="startCal();" onBlur="stopCal();">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" value="0" name="hasil_pembagi" onFocus="startCal();" onBlur="stopCal();" readonly hidden onchange='tryNumberFormat(this.form.thirdBox);'>
          </div>
          <div class="form-group">
            <label for=""> * Pilih Nama Dan Lokasi Petani</label>
            <select class="form-control" name="id_anggota" id="id_anggota" onchange="tampilkan()" onFocus="startCal();" onBlur="stopCal();" required>
              <option><span>* Daftar Nama Petani...</span></option>
              <?php foreach ($anggota as $m) : ?>
                <option id="nama" value="<?= $m['id']; ?>">"<?= $m['nama']; ?>", ( jumlah lahan : <?= $m['lahan']; ?>)</option>
              <?php endforeach; ?>
            </select>
          </div>

          <select id="lahan_anggota" hidden name="lahan_anggota"></select>

        </div>
        <div class="col-sm-12 text-center">
          <div class="form-group">
            <label for="">Total Biaya</label>
            <input type="text" class="form-control" value="0" name="hasil_akhir" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </form>




  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables kelompok petani</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Transaksi</th>
              <th scope="col">Nama</th>
              <th scope="col">Lahan</th>
              <th scope="col">Hasil Akhir</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($akhir as $n) {
            ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $n['transaksi'] ?></td>
                <td><?= $n['nama'] ?></td>
                <td><?= $n['lahan'] ?></td>
                <td><b><?= number_format($n['hasil_akhir'], 0, ',', '.')  ?></b></td>
                <td>
                  <a href="<?= base_url('user/cetak_pembagian/' . $n['id_pembagian']); ?>" class="btn btn-sm btn-success" target="_BLANK">Cetak</a>
                  <a href="<?= base_url('user/hapus_pembagian/' . $n['id_pembagian']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
              </tr>
            <?php
              $no++;
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>









</div>