<div class="container-fluid">

  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($harga_sawit as $p): ?>

  <?= form_open_multipart('admin/update_harga_sawit');?>
  <form action="<?= base_url('admin/update_harga_sawit'); ?>" method="post">
  <div class="modal-body">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $p->id; ?>">
      <input type="date" class="form-control" name="tanggal" value="<?= $p->tanggal; ?>">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="harga_sawit" value="<?= $p->harga_sawit; ?>">
    </div>
   </div>
  <div class="modal-footer">
    <a class="btn btn-sm btn-success" href="<?= base_url('admin/harga_sawit'); ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">edit</button>
  </div>
</form>
<?php endforeach; ?>
</div>
