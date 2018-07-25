<?php $this->load->view('admin/layout/base_start') ?>




  <div class="row">
    <legend>Daftar Tas</legend>

  <?php echo form_open("tas/index");?>
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="nama_tas" name="nama_tas" placeholder="Masukkan Nama Barang..." type="text" value="<?php echo set_value('nama_tas'); ?>" />
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo site_url("tas/index"); ?>" class="btn btn-primary">Show All</a>
                </div>
            </div>
        <?php echo form_close(); ?>
        </div>


  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga Barang</th>
        <th>Keterangan</th>
        <th width="200">Foto</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('tas/create/') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <?php if ($tas) { ?>
      <tbody>
        <?php $number = 1; foreach($tas as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->nama ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->kategori ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->stok ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->harga ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->keterangan ?>
            </a>
          </td>
          <td>
              <img src="<?php echo base_url('assets/uploads/').$row->foto; ?>" style="display:block; width:100%;">
          </td>
          <td>
            <?php echo form_open('tas/destroy/'.$row->id_barang); ?>
            <a class="btn btn-info" href="<?php echo site_url('tas/edit/'.$row->id_barang) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>

      </tbody>
    </table>
    <?php echo $links ?>
    <?php }
        else { ?>
          <div>tidak ada data</div>
        <?php } ?>
  </div>
  </div>

<?php $this->load->view('admin/layout/base_end') ?>