<?php
include_once('page/head.php');
include_once('page/nav.php');
?>
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>Ayo segera belanja di kami!</h2>
								<p>Temukan gaya fashion terbaru dan terkini hanya di E-SHOPPER! Nikmati pengalaman berbelanja yang menyenangkan dengan koleksi pakaian, sepatu, dan aksesori yang trendy dan berkualitas!</p>
								<button type="button" class="btn btn-default get">Get it now</button>
							</div>
							<div class="col-sm-6">
								<img src="images/home/shopping.png" class="girl img-responsive" alt="" />
								<img src="images/home/pricing.png" class="pricing" alt="" />
							</div>
						</div>
						<div class="item">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>Menggoda dengan Gaya Fashion Terbaru dan Harga Terjangkau</h2>
								<p>Bersiaplah mempercantik penampilanmu dengan koleksi fashion terbaru dari E-SHOPPER! Temukan pilihan pakaian, aksesoris, dan tas yang sesuai dengan gayamu. Dengan kualitas terbaik dan harga yang terjangkau, E-SHOPPER siap memenuhi kebutuhan fashionmu. </p>
								<button type="button" class="btn btn-default get">Get it now</button>

								<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Halaman</a>
							</div>
							<div class="col-sm-6">
								<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
								<img src="images/home/pricing.png" class="pricing" alt="" />
							</div>
						</div>

						<div class="item">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>Temukan Gaya Fashion yang Sempurna dengan Pilihan Terlengkap</h2>
								<p>Ingin menemukan gaya fashion yang tepat untukmu? Cari tahu di E-SHOPPER! Kami menyediakan pilihan terlengkap pakaian, aksesoris, dan tas yang akan memenuhi semua kebutuhan fashionmu. </p>
								<button type="button" class="btn btn-default get">Get it now</button>
							</div>
							<div class="col-sm-6">
								<img src="images/home/shopping2.png" class="girl img-responsive" alt="" />
								<img src="images/home/pricing.png" class="pricing" alt="" />
							</div>
						</div>

					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section><!--/slider-->

<section>
	<div class="container">
		<div class="row">
			<?php include_once('page/sidebar.php') ?>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Produk Baru</h2>
					<!-- produk terbaru limit 8 -->
					<?php
					$sql = "SELECT * FROM produk ORDER BY id DESC LIMIT 8";
					$stmt = $dbh->prepare($sql);
					$stmt->execute();
					$data = $stmt->fetchAll();
					foreach ($data as $value) { ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/girl2.jpg" alt="" />
										<h2>Rp. <?= number_format($value['harga']) ?></h2>
										<p><?= $value['nama'] ?></p>
										<a href="produk-detail.php?kode=<?= $value['kode'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Check Detail</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp. <?= number_format($value['harga']) ?></h2>
											<p><?= $value['nama'] ?></p>
											<a href="produk-detail.php?kode=<?= $value['kode'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Check Detail</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div><!--features_items-->

				<div class="category-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<?php
							$sql = "SELECT * FROM jenis_produk";
							$stmt = $dbh->prepare($sql);
							$stmt->execute();
							$data = $stmt->fetchAll();
							foreach ($data as $row) {
							?>
								<li class="<?php if (strtolower($row['nama']) == "pakaian") {
												echo "active";
											} ?>"><a href="#<?= strtolower($row['nama']) ?>" data-toggle="tab"><?= $row['nama'] ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="tab-content">
						<?php
						$sql = "SELECT * FROM jenis_produk";
						$stmt = $dbh->prepare($sql);
						$stmt->execute();
						$data = $stmt->fetchAll();
						foreach ($data as $row) { ?>
							<div class="tab-pane fade <?php if (strtolower($row['nama']) == "pakaian") {
															echo "active in";
														} ?>" id="<?= strtolower($row['nama']) ?>">
								<?php
								$sql2 = "SELECT * FROM produk WHERE jenis_produk = :jenis_produk LIMIT 8";
								$stmt2 = $dbh->prepare($sql2);
								$stmt2->bindParam(':jenis_produk', $row['nama']);
								$stmt2->execute();
								$data2 = $stmt2->fetchAll();
								foreach ($data2 as $value) { ?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/girl1.jpg" alt="" />
													<h2>Rp. <?= number_format($value['harga']) ?></h2>
													<p><?= $value['nama'] ?></p>
													<a href="produk-detail.php?kode=<?= $value['kode'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Check Detail</a>
												</div>

											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div><!--/category-tab-->
				<?php include_once('page/rekomendasi.php') ?>
				
			</div>
		</div>
	</div>
</section>
<?php include_once('page/footer.php') ?>