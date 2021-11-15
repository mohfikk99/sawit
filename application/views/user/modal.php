<?php

  $id_login = $login['id'];

  $akses = "SELECT * FROM modal WHERE id_login = $id_login ";

  $modal = $this->db->query($akses)->result_array()

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
                      <th scope="col">Transaksi</th>
                      <th scope="col">Biaya Pupuk</th>
                      <th scope="col">Biaya Obat</th>
                      <th scope="col">Biaya Semprot</th>
                      <th scope="col">Biaya Pupuk Pekerja</th>
                      <th scope="col">Biaya Paras Pekerja</th>
                      <th scope="col">Biaya Lainnya</th>
                      <th scope="col">total</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no = 1;
                  foreach ($modal as $n) {
                   ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td>
                      <a href="<?= base_url('user/hapus_modal/'. $n['id']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td><?= $n['transaksi'] ?></td>
                    <td><?= $n['biaya_pupuk'] ?></td>
                    <td><?= $n['biaya_obat']  ?></td>
                    <td><?= $n['biaya_semprot']  ?></td>
                    <td><?= $n['biaya_pupuk_pekerja'] ?></td>
                    <td><?= $n['biaya_paras_pekerja']  ?></td>
                    <td><?= $n['biaya_lainnya']  ?></td>
                    <td><b><?= number_format($n['total'], 0,',','.')  ?></b></td>
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

        function startCalc(){
        interval = setInterval("calc()",1);}
        function calc(){
        one = document.autoSumForm.biaya_pupuk.value;
        two = document.autoSumForm.biaya_obat.value; 
        three = document.autoSumForm.biaya_semprot.value; 
        four = document.autoSumForm.biaya_pupuk_pekerja.value; 
        five = document.autoSumForm.biaya_paras_pekerja.value; 
        six = document.autoSumForm.biaya_lainnya.value; 
        document.autoSumForm.total.value = (one * 1) + (two * 1) + (three * 1) + (four * 1) + (five * 1) + (six * 1);}
        function stopCalc(){
        clearInterval(interval);}
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

        
        <form name="autoSumForm" action="<?= base_url('user/modal'); ?>" method="post">
        <div class="modal-body">
         <div class="form-group">
            <input type="text" class="form-control" name="id_login" value="<?= $login['id'];?>" hidden>
            <input type="text" class="form-control" name="transaksi" placeholder="Transaksi">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="biaya_pupuk" placeholder="Biaya Pupuk" onFocus="startCalc();" onBlur="stopCalc();" >
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="biaya_obat" placeholder="Biaya Obat" onFocus="startCalc();" onBlur="stopCalc();">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="biaya_semprot" placeholder="Biaya Semprot" onFocus="startCalc();" onBlur="stopCalc();">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="biaya_pupuk_pekerja" placeholder="Biaya Pupuk Pekerja" onFocus="startCalc();" onBlur="stopCalc();">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="biaya_paras_pekerja" placeholder="Biaya Paras Pekerja" onFocus="startCalc();" onBlur="stopCalc();">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="biaya_lainnya" placeholder="Biaya lainnya" onFocus="startCalc();" onBlur="stopCalc();">
          </div>
          <div class="form-group">
            <label for="">Total Biaya</label>
            <input type="text" class="form-control" value="0" name="total" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
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
