<?php
include_once('page/head.php');
include_once('page/nav.php');

?>
<section>
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Produk</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Semua Produk <?php if (isset($_GET['jenis_produk'])) {
                                                                    echo $_GET['jenis_produk'];
                                                                } ?></h2>
                    <!-- produk terbaru limit 8 -->
                    <?php
                    if (isset($_GET['jenis_produk'])) {
                        $sql = "SELECT * FROM produk WHERE jenis_produk = '" . $_GET['jenis_produk'] . "'";
                    } else {
                        $sql = "SELECT * FROM produk ";
                    }
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
            </div>
        </div>
    </div>
</section>
<?php include_once('page/footer.php') ?>