<?php $this->load->view("user/header"); ?>
			
		

		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
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
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
					<div class="row">
        <?php foreach ($barang as $key => $value): ?>
        	
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="<?php echo base_url('assets/uploads/'.$value->foto)?>" alt="" style="max-height:350px;min-height:350px;">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $value->kategori?></p>
												<h3 class="product-name"><a href="#"><?php echo $value->nama?></a></h3>
												<h4 class="product-price">Rp. <?php echo $value->harga?></h4>
									</div>
									<div class="add-to-cart">
										<a href="<?php echo base_url('index.php/Home/product/'.$value->id_barang) ?>" class="add-to-cart-btn">Detail</a>
									</div>
								</div>
							</div>
        <?php endforeach ?>
        </div>
						<!-- <div class="row">
							<div class="products-tabs">
								
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										
                                        <?php foreach($barang as $key => $value): ?>
                                        <div class="product">
											<div class="product-img">
												<img src="<?php echo base_url('assets/uploads/'.$value->foto)?>" alt=""height=270 width=100>
												
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $value->kategori?></p>
												<h3 class="product-name"><a href="#"><?php echo $value->nama?></a></h3>
												<h4 class="product-price">Rp. <?php echo $value->harga?></h4>
											</div>
											<div class="add-to-cart">
												<a class="add-to-cart-btn" href="<?php echo base_url('index.php/Home/product/'.$value->id_barang) ?>">Detail</a>
											</div>
										</div>
        <?php endforeach; ?>

										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								
							</div>
						</div> -->
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
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		<?php $this->load->view('user/footer') ?>