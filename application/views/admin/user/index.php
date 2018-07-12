<?php $this->load->view('admin/layout/base_start') ?>


  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('user/create/') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <?php if (isset($user)) { ?>
      <tbody>
        <?php $number = 1; foreach($user as $row) { ?>
        <tr>
          <td><?php echo $number++; ?></td>
          <td><?php echo $row->nama ?></td>
          <td><?php echo $row->alamat ?></td>
          <td><?php echo $row->no_hp ?></td>
          <td><?php echo $row->username ?></td>
          <td><?php echo $row->password ?></td>
          <td><?php echo $row->level ?></td>
          <td>
            <?php echo form_open('user/destroy/'.$row->id_user); ?>
            <a class="btn btn-info" href="<?php echo site_url('user/edit/'.$row->id_user) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>

      </tbody>
    </table>    
    <?php }
        else { ?>
          <div>tidak ada data</div>
        <?php } ?>
  </div>
</div>

<?php $this->load->view('admin/layout/base_end') ?>