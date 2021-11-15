<div class="container-fluid">

  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($pengguna as $p): ?>

  <?= form_open_multipart('admin/update_pengguna');?>
  <form action="<?= base_url('admin/update_pengguna'); ?>" method="post">
  <div class="modal-body">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $p->id; ?>">
      <input type="text" class="form-control" name="name" value="<?= $p->name; ?>">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="password" value="<?= $p->password; ?>">
    </div>
    <div class="form-group">
      <select class="form-control" name="level">
        <option value="<?= $p->level; ?>"><?= $p->level; ?></option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>
   </div>
  <div class="modal-footer">
    <a class="btn btn-sm btn-success" href="<?= base_url('admin'); ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">edit</button>
  </div>
</form>
<?php endforeach; ?>
</div>
