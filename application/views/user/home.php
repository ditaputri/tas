<?php $this->load->view("user/header"); ?>


<div class="section">
	<div class="container">
		<?php if ($barang) { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Products</h3>

						<?php if ($this->input->post('search') != null): ?>
						<h4>Search key = <?php echo $this->input->post('search') ?></h4>
					<?php endif ?>
					<div class="section-nav">

						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">

							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
							<?php foreach ($barang as $key => $value): ?>
							<div class="col-md-3 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="<?php echo base_url('assets/uploads/'.$value->foto)?>" alt="" style="max-height:250px;min-height:250px;">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $value->kategori?></p>
										<h3 class="product-name"><?php echo $value->nama?></a></h3>
										<h4 class="product-price">Rp. <?php echo $value->harga?></h4>
									</div>
									<div class="add-to-cart">
										<a href="<?php echo base_url('index.php/Home/product/'.$value->id_barang) ?>" class="add-to-cart-btn">Detail</a>
									</div>
								</div>
							</div>
						<?php endforeach ?>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>

			
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		
	</div>
	<div id="slick-nav-2" class="products-slick-nav"></div>
</div>
<?php echo $links ?>
<?php } else { ?>
	<div class="alert alert-danger"> Data Tidak Ditemukan </div>
	<?php } ?>
	<?php $this->load->view('user/footer') ?>