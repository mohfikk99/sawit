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


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Akses Ketua Kelompok</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Nama</th>
              <th scope="col">password</th>
              <th scope="col">level</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($user as $p) {
          ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td>
            <a href="<?= base_url('admin/edit_pengguna/'. $p['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="<?= base_url('admin/hapus_pengguna/'. $p['id']); ?>" class="btn btn-sm btn-danger">hapus</a>
            </td>
            <td><?= $p['name']; ?></td>
            <td><?= $p['password']; ?></td>
            <td><?= $p['level']; ?></td>
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


<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="files">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newModalLabel">Tambahkan Akses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

       
        <form action="<?= base_url('admin'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nama Pengguna" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <select class="form-control" name="level" >
              <option>* Pilih Hak Akses</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
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



