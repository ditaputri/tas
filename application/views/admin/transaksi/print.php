<html><head>
<title>Report Table</title>
<style type="text/css">
  table{
    border-collapse: collapse;
    width: 100%;
    margin: 0 auto;
  }
  table th{
    border:1px solid #000;
    padding: 3px;
    font-weight: bold;
    text-align: center;
  }
  table td{
    border:1px solid #000;
    padding: 3px;
    vertical-align: top;
  }
</style></head>
<body>
<h2><center>Biodata Mahasiswa</center></h2>
<table>
<thead>
<tr>
 <th>Id</th>
        <th>Tanggal</th>
        <th>Pembayaran</th>
        <th>Nama</th>
        <th>Status</th>
        <th>List Barang</th>
        <th>Total</th>
</tr>
</thead>
<tbody>
<?php $no=1;
 foreach ($transaksi as $key) { ?>
<tr>
 <td><?php echo $no++; ?></td>
          <td><?php echo $key->tanggal ?></td>
          <td><?php echo $key->pembayaran ?></td>
          <td><?php echo $key->nama_user ?></td>
          <td><?php echo $key->status ?></td>
          <td><?php echo $key->list_barang ?></td>
          <td><?php echo $key->total ?></td>
</tr>
<?php $no++; } ?>
</tbody></table>
</body></html>
