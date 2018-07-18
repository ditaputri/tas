<?php $this->load->view("user/header"); ?>
			
		

		
<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Headphones</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<div class="col-md-3">
						
					</div>
					<div class="col-md-6">
						<h1 class="text-center">Transaksi Berhasil</h1>
						<table class="table">
							<tr>
								<td>id_transaksi</td>
								<td> : </td>
								<td><?php echo $transaksi->id_transaksi ?></td>
							</tr>
							<tr>
								<td>pembayaran</td>
								<td> : </td>
								<td><?php echo $transaksi->pembayaran ?></td>
							</tr>
							<tr>
								<td>tanggal</td>
								<td> : </td>
								<td><?php echo $transaksi->tanggal ?></td>
							</tr>
							<tr>
								<td>nama_user</td>
								<td> : </td>
								<td><?php echo $transaksi->nama_user ?></td>
							</tr>
						</table>
						<br>
						<table class="table table-stripped table-hover">
							<thead>
								<tr>
								<th>Id</th>
								<th>Nama Barang</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Sub Total</th>
							</tr>
							</thead>
							<tbody>
							<?php $total = 0; ?>
								<?php foreach ($detail as $key => $value): ?>
									<tr>
										<td><?php echo $key++; ?></td>
										<td><?php echo $value->nama_barang ?></td>
										<td><?php echo $value->jumlah ?></td>
										<td><?php echo $value->harga_barang ?></td>
										<td><?php echo $value->jumlah * $value->harga_barang ?></td>
									</tr>
									<?php $total += $value->jumlah * $value->harga_barang ?>
								<?php endforeach ?>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="3"></td>
								<td>Total</td>
								<td><?php echo $total ?></td>
							</tr>
						</tfoot>
						</table>

					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		<?php $this->load->view('user/footer') ?>