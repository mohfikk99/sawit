<?php

$id_login = $login['id'];

$akses = "SELECT * FROM hasil_sawit WHERE id_login = $id_login ";

$hasil = $this->db->query($akses)->result_array();

$hasil_timbangan = "SELECT * FROM hasil_timbangan WHERE id_login = $id_login ORDER BY id_timbangan DESC LIMIT 1";

$tim = $this->db->query($hasil_timbangan)->row_array();

?>
<!-- Begin Page Content -->
<div class="container-fluid turun">

  <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#newModal">Tambahkan</a>

  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>

  <?= $this->session->flashdata('massage'); ?>








  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables kelompok petani</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Transaksi</th>
              <th scope="col">Timbangan</th>
              <th scope="col">Harga Total Sawit</th>
              <th scope="col">Harga Total Modal</th>
              <th scope="col">Hasil Bersih</th>
            </tr>
          </thead>
          <tbody>
            <?php

            // $sawit = $total_sawit->harga_total_sawit;

            // $biaya = $total_modal->total;

            // $hasil_bersih = $sawit - $biaya;

            $no = 1;
            foreach ($hasil as $n) {
            ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td>
                  <a href="<?= base_url('user/hapus_hasil/' . $n['id']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
                <td><?= $n['transaksi']; ?></td>
                <td><?= $n['timbangan']; ?></td>
                <td><?= number_format($n['harga_total_sawit'], 0, ',', '.')  ?></td>
                <td><?= number_format($n['total_modal'], 0, ',', '.')  ?></td>
                <td><?= number_format($n['hasil_bersih'], 0, ',', '.')  ?></td>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script>
  function startCalc() {
    interval = setInterval("calc()", 1);
  }

  function calc() {
    one = document.autoSumForm.harga_total_sawit.value;
    two = document.autoSumForm.total_modal.value;
    document.autoSumForm.hasil_bersih.value = (one * 1) - (two * 1);
  }

  function stopCalc() {
    clearInterval(interval);
  }
</script>




<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="files">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form name="autoSumForm" action="<?= base_url('user/hasil'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <span class="badge badge-pill badge-success">Harga Sawit Terbaru Rp. <?= number_format($harga['harga_sawit'], 0, ',', '.')  ?></span>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="id_login" value="<?= $login['id'];  ?>" hidden>
            <input type="text" class="form-control" name="transaksi" placeholder="Transaksi" value="<?= $total_modal['transaksi'];  ?>" readonly>
          </div>
          <div class="form-group">
            <label for="">Jumlah Timbangan</label>
            <input type="text" class="form-control" name="timbangan" value="<?= $tim['jumlah_timbangan']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="">Total Timbangan Harga Sawit</label>
            <input type="text" class="form-control" name="harga_total_sawit" value="<?= $tim['harga_total_sawit']; ?>" onFocus="startCalc();" onBlur="stopCalc();" readonly>
          </div>
          <div class="form-group">
            <label for="">Total Modal</label>
            <input type="text" class="form-control" name="total_modal" placeholder="Total Modal" value="<?= $total_modal['total'];  ?>" readonly onFocus="startCalc();" onBlur="stopCalc();">
          </div>
          <div class="form-group">
            <label for="">Hasil Bersih Penjualan</label>
            <input type="text" class="form-control" value="0" name="hasil_bersih" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>