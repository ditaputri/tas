<?php $this->load->view('admin/layout/base_start') ?>

<div class="container">
  <legend>Tambah Data User</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart(''); ?>
<?php echo validation_errors(); ?>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
      <label for="alamat">alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat">
    </div>
    <div class="form-group">
      <label for="no_hp">no_hp</label>
      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan no_hp">
    </div>
    <div class="form-group">
      <label for="username">username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
    </div>
    <div class="form-group">
      <label for="password">password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan password">
    </div>
    <div class="form-group">
      <label for="level">level</label>
      <select name="level" class="form-control">
        <option>admin</option>
        <option>user</option>
      </select>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('user/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('admin/layout/base_end') ?>