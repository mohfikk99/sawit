<?php

  $id_login = $login['id'];

  $akses = "SELECT * FROM kelompok WHERE id_login = $id_login ";

  $kelompok = $this->db->query($akses)->row_array()

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
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama anggota</th>
                      <th scope="col">lahan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                    
                  </thead>
                  
                  <tbody>
                  <?php
                  $no = 1;
                  foreach ($anggota as $n) {
                   ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $n->nama; ?></td>
                    <td><?= $n->lahan; ?> lokasi</td>
                    <td>
                      <a href="<?= base_url('user/hapus_anggota/'. $n->id); ?>" class="btn btn-sm btn-danger">hapus</a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                    }
                   ?>
                   <tr>
                    <td></td>
                    <td></td>
                    <?php
                      $sum=0;
                      foreach ($total_lahan as $total){
                      $total;
                      }
                      ?>
                      <td>Total Lahan : <?php echo $total?></td>
                    <td></td>
                   </tr>
                </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->






  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="files">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newModalLabel">Tambahkan Anggota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

       
        <form action="<?= base_url('user/proses_anggota'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="id_kelompok" value="<?= $kelompok['id_kelompok']; ?>"  hidden>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="nama" placeholder="nama anggota" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="lahan" placeholder="lahan anggota" required>
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
