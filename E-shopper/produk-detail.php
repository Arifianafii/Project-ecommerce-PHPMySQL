<?php
include_once('page/head.php');
include_once('page/nav.php');
if (isset($_GET['kode'])) {
	$sql = "SELECT * FROM produk WHERE kode = '" . $_GET['kode'] . "'";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetch();

?>
	<section>
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="produk.php">Produk</a></li>
					<li class="active">Detail</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="row">
				<?php include_once('page/sidebar.php') ?>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/product-details/1.jpg" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									<div class="item active">
										<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
									</div>
									<div class="item">
										<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
									</div>
									<div class="item">
										<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
									</div>

								</div>

								<!-- Controls -->
								<a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?= $data['nama'] ?></h2>
								<p>Kode ID: <?= $data['kode'] ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<form action="checkout.php" method="post">
									<span>
										<span><?= number_format($data['harga']) ?></span>
										<label>Quantity:</label>
										<input type="number" min="1" value="1" name="qty" required/>
										<input type="hidden" value="<?= $data['kode'] ?>" name="kode" />
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</span>
								</form>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Stok:</b> <?= $data['stok'] ?></p>
								<p><b>Jenis Produk:</b> <?= $data['jenis_produk'] ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Deskripsi</a></li>
							</ul>
						</div>
						<div class="tab-content">

							<div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p><?= $data['deskripsi'] ?></p>
								</div>
							</div>

						</div>
					</div><!--/category-tab-->
					<?php include_once('page/rekomendasi.php') ?>
				</div>
			</div>
		</div>
	</section>
<?php }
include_once('page/footer.php') ?>