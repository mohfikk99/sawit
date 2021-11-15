<div class="container-fluid">

  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($kelompok as $p): ?>

  <?= form_open_multipart('admin/update_kelompok');?>
  <form action="<?= base_url('admin/update_kelompok'); ?>" method="post">
  <div class="modal-body">
    <div class="form-group">
      <input type="hidden" name="id_kelompok" value="<?= $p->id_kelompok; ?>">
      <label for="">Nama Ketua Kelompok <span>(* silahkan Pilih Default jika tidak ingin mengubah)</span></label>
      <select class="form-control" name="id_login">
      <option value="<?= $p->id_login?>">default</option>
      <?php foreach ($pengguna as $guna) : ?>
      <option value="<?= $guna['id'];?>"><?= $guna['name'];?></option>
      <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Nama Kelompok</label>
      <input type="text" class="form-control" name="nama_kelompok" value="<?= $p->nama_kelompok; ?>" required>
    </div>
   </div>
  <div class="modal-footer">
    <a class="btn btn-sm btn-success" href="<?= base_url('admin/kelompok'); ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">edit</button>
  </div>
</form>
<?php endforeach; ?>
</div>
