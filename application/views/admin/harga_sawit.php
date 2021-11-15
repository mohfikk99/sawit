

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

            <a href="#" class="btn btn-success mb-3 mt-5" data-toggle="modal" data-target="#newModal">Tambahkan</a>

            <?php if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
            <?php endif; ?>

            <?= $this->session->flashdata('massage'); ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables harga sawit</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Aksi</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach ($harga_sawit as $p) {
                   ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td>
                      <a href="<?= base_url('admin/edit_harga_sawit/'. $p['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="<?= base_url('admin/hapus_harga_sawit/'. $p['id']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td><?= $p['tanggal']; ?></td>
                    <td><?= $p['harga_sawit']; ?></td>
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






  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="files">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newModalLabel">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?= form_open_multipart('admin/harga_sawit');?>
        <form action="<?= base_url('admin/harga_sawit'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder=" tanggal">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="harga_sawit" name="harga_sawit" placeholder="harga awit">
          </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">upload</button>
        </div>
      </form>
      </div>
    </div>
  </div>
