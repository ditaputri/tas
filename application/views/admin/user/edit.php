<?php $this->load->view('admin/layout/base_start') ?>

<div class="container">
  <legend>Tambah Data User</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart(''); ?>
<?php echo validation_errors(); ?>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama ?>" placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
      <label for="alamat">alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user->alamat ?>" placeholder="Masukkan alamat">
    </div>
    <div class="form-group">
      <label for="no_hp">no_hp</label>
      <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $user->no_hp ?>" placeholder="Masukkan no_hp">
    </div>
    <div class="form-group">
      <label for="username">username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username ?>" placeholder="Masukkan username">
    </div>
    <div class="form-group">
      <label for="password">password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="<?php echo $user->password ?>">
    </div>
    <div class="form-group">
      <label for="level">level</label>
      <select name="level" class="form-control">
        <option>admin</option>
        <option>user</option>
      </select>
      <script type="text/javascript">$("select[name='level']").val("<?php echo $user->level ?>")</script>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('user/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('admin/layout/base_end') ?>