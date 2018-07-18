<?php $this->load->view("user/header"); ?>
			
		

		
<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
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
					<?php echo form_open("Cart/bayar") ?>
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input class="input" type="text" value="<?php echo $user->nama ?>" readonly>
							</div>
							<div class="form-group">
								<label>alamat</label>
								<input class="input" type="text" value="<?php echo $user->alamat ?>" readonly>
							</div>
							<div class="form-group">
								<label>no_hp</label>
								<input class="input" type="text" value="<?php echo $user->no_hp ?>" readonly>
							</div>
						</div>
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php foreach ($this->cart->contents() as $key => $value): ?>
									<div class="order-col">
									<div><?php echo $value['qty'] ?>x <?php echo $value['name'] ?></div>
									<div>Rp <?php echo $this->cart->format_number($value['price']) ?></div>
								</div>
								<?php endforeach ?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">Rp. <?php echo $this->cart->format_number($this->cart->total()) ?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1" value="BCA" checked>
								<label for="payment-1">
									<span></span>
									BCA
								</label>
								<div class="caption">
									<p>Nomor Rekening : 1213123123123213 <br>	
									Atas Nama : Putri</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2" value="BRI">
								<label for="payment-2">
									<span></span>
									BRI
								</label>
								<div class="caption">
									<p>Nomor Rekening : 1213123123123213 <br>	
									Atas Nama : Putri</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3" value="BNI">
								<label for="payment-3">
									<span></span>
									BNI
								</label>
								<div class="caption">
									<p>Nomor Rekening : 1213123123123213 <br>	
									Atas Nama : Putri</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<button type="submit" class="primary-btn order-submit btn-block">Bayar</button>
					</div>
					<!-- /Order Details -->
					<?php echo form_close(); ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		

		<?php $this->load->view('user/footer') ?>