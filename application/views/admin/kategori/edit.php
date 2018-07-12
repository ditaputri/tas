<?php $this->load->view('admin/layout/base_start') ?>

<div class="container">
  <legend>Tambah Data kategori</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart(''); ?>
<?php echo validation_errors(); ?>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama_kategori" value="<?php echo $kategori->nama_kategori ?>" placeholder="Masukkan Nama">
    </div>
    <a class="btn btn-info" href="<?php echo site_url('kategori/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('admin/layout/base_end') ?>