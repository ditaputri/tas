<?php $this->load->view('admin/layout/base_start') ?>

<?php echo form_open("kategori/search")?>
  <input class="form-control" type="text" name="search" value="" placeholder="Masukkan Nama Kategori. . .">
  <input type="submit" class="btn btn-primary" value="search">
  <a href="<?php echo site_url("kategori/index"); ?>" class="btn btn-primary">Show All</a>
<?php ?>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('kategori/create/') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($kategori as $row) { ?>
        <tr>
          <td><?php echo $number++; ?></td>
          <td><?php echo $row->nama_kategori ?></td>
          <td>
            <?php echo form_open('kategori/destroy/'.$row->id); ?>
            <a class="btn btn-info" href="<?php echo site_url('kategori/edit/'.$row->id) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>

      </tbody>
    </table>    

</div>

<?php $this->load->view('admin/layout/base_end') ?>