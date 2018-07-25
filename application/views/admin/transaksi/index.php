<?php $this->load->view('admin/layout/base_start') ?>


  <div class="col-xs-12 col-sm-12 col-md-12">
  <a href="<?php echo base_url('index.php/Transaksi/print') ?>" class="btn btn-primary">Print</a>
    <table class="table table-striped">
      <thead>
        <th>Id</th>
        <th>Tanggal</th>
        <th>Pembayaran</th>
        <th>Nama</th>
        <th>Status</th>
        <th>List Barang</th>
        <th>Total</th>
      </thead>
      <?php if (isset($transaksi)) { ?>
      <tbody>
        <?php $number = 1; foreach($transaksi as $row) { ?>
        <tr>
          <td><?php echo $number++; ?></td>
          <td><?php echo $row->tanggal ?></td>
          <td><?php echo $row->pembayaran ?></td>
          <td><?php echo $row->nama_user ?></td>
          <td><?php echo $row->status ?></td>
          <td><?php echo $row->list_barang ?></td>
          <td><?php echo $row->total ?></td>
          <td>
            
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