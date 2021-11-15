<?php

  $id_login = $login['id'];

  $akses = "SELECT * FROM kelompok WHERE id_login = $id_login ";

  $kelompok = $this->db->query($akses)->result_array()

?>


        <!-- Begin Page Content -->
        <div class="container-fluid turun">

        <?= $this->session->flashdata('massage'); ?>

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
                      <th scope="col">Aksi</th>
                      <th scope="col">Nama Kelompok</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach ($kelompok as $n) {
                   ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td>
                      <a href="<?= base_url('user/anggota/'. $n['id_kelompok']); ?>" class="btn btn-sm btn-success">Detail</a>
                    </td>
                    <td><?= $n['nama_kelompok']; ?></td>
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




