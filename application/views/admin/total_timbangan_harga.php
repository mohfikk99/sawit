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
                            <th scope="col">Nama Kelompok</th>
                            <th scope="col">Jumalah Timbangan</th>
                            <th scope="col">Harga Total Sawit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($timbangan as $p) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td>
                                    <a href="<?= base_url('admin/hapus_harga_timbangan/' . $p['id_timbangan']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                <td><?= $p['nama_kelompok']; ?></td>
                                <td><?= $p['jumlah_timbangan']; ?></td>
                                <td><?= $p['harga_total_sawit']; ?></td>
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

            <?= form_open_multipart('admin/total_timbangan_harga'); ?>
            <form action="<?= base_url('admin/total_timbangan_harga'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" name="id_login">
                            <option value="0">Pilih Nama Kelompok...</option>
                            <?php foreach ($pengguna as $log) : ?>
                                <option value="<?= $log['id']; ?>"><?= $log['nama_kelompok']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="jumlah_timbangan" placeholder="Jumlah Timbangan">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="harga_total_sawit" placeholder="Harga Total Sawit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>