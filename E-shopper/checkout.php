<?php
include_once('page/head.php');
include_once('page/nav.php');
?>
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-12">
					<?php
					if (isset($_POST['kode'])) {
						$sql = "SELECT * FROM produk WHERE kode = '" . $_POST['kode'] . "'";
						$stmt = $dbh->prepare($sql);
						$stmt->execute();
						$data = $stmt->fetch();
					?>
						<div class="shopper-info">
							<p>Order Form</p>
							<form method="post">
								<label for="kode">Kode Produk: </label>
								<input type="text" value="<?= $data['kode'] ?>" readonly>
								<label for="nama">Nama Produk: </label>
								<input type="text" name="nama_produk" value="<?= $data['nama'] ?>" readonly>
								<label for="harga">Harga Satuan: </label>
								<input type="text" name="harga" value="<?= $data['harga'] ?>" readonly>
								<label for="qty">Qty: </label>
								<input type="number" name="qty" id="qty" value="<?= $_POST['qty'] ?>">
								<label for="nama_pemesan">Nama pemesan: </label>
								<input type="text" name="nama_pemesan" id="nama_pemesan" placeholder="Masukan Nama Pemesan">
								<label for="alamat_pemesan">Alamat pemesan: </label>
								<input type="text" name="alamat_pemesan" id="alamat_pemesan" placeholder="Masukan Alamat Pemesan">
								<input class="btn btn-primary" value="Order Now" type="submit" name="order">
							</form>
						</div>
						<br>
					<?php } elseif (isset($_POST['order'])) {
						// insert data ke tabel order
						$tanggal =  date('Y-m-d');
						$total = $_POST['harga'] * $_POST['qty'];
						$sql = "INSERT INTO `pesanan`(`nama_produk`, `qty`, `tanggal`, `total_harga`, `nama_pemesan`, `alamat_pemesan`) VALUES (:nama_produk, :qty, :tanggal, :total_harga, :nama_pemesan, :alamat_pemesan)";
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':nama_pemesan', $_POST['nama_pemesan']);
						$stmt->bindParam(':alamat_pemesan', $_POST['alamat_pemesan']);
						$stmt->bindParam(':nama_produk', $_POST['nama_produk']);
						$stmt->bindParam(':qty', $_POST['qty']);
						$stmt->bindParam(':tanggal', $tanggal);
						$stmt->bindParam(':total_harga', $total);
						$stmt->execute();
						// alert sukses
						echo "<script>alert('Order Berhasil!');</script>"; ?>

						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td>Tanggal</td>
										<td>Nama Pemesan</td>
										<td>Alamat Pemesan</td>
										<td>Nama Produk</td>
										<td>Harga</td>
										<td>QTY</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?= $tanggal ?></td>
										<td><?= $_POST['nama_pemesan'] ?></td>
										<td><?= $_POST['alamat_pemesan'] ?></td>
										<td><?= $_POST['nama_produk'] ?></td>
										<td>Rp.<?= number_format($_POST['harga']) ?></td>
										<td><?= $_POST['qty'] ?></td>
									</tr>
									<tr>
										<td colspan="4">&nbsp;</td>
										<td colspan="2">
											<table class="table table-condensed total-result">
												<tr class="shipping-cost">
													<td>Shipping Cost</td>
													<td>Free</td>
												</tr>
												<tr>
													<td>Total</td>
													<td><span>Rp. <?= number_format($total) ?></span></td>
												</tr>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

					<?php } else {
						echo "<script>alert('Anda harus memilih produk terlebih dahulu!');</script>";
						echo "<script>window.location='produk.php';</script>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section> <!--/#cart_items-->
<?php include_once('page/footer.php') ?>