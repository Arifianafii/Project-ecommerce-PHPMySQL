<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">rekomendasi produk</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <?php
                $sql2 = "SELECT * FROM produk ORDER BY rand() LIMIT 3";
                $stmt2 = $dbh->prepare($sql2);
                $stmt2->execute();
                $data2 = $stmt2->fetchAll();
                foreach ($data2 as $value) { ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend3.jpg" alt="" />
                                    <h2>Rp. <?= number_format($value['harga']) ?></h2>
                                    <p><?= $value['nama'] ?></p>
                                    <a href="produk-detail.php?kode=<?= $value['kode'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Check Detail</a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="item">
                <?php
                $sql2 = "SELECT * FROM produk ORDER BY rand() LIMIT 3";
                $stmt2 = $dbh->prepare($sql2);
                $stmt2->execute();
                $data2 = $stmt2->fetchAll();
                foreach ($data2 as $value) { ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend1.jpg" alt="" />
                                    <h2>Rp. <?= number_format($value['harga']) ?></h2>
                                    <p><?= $value['nama'] ?></p>
                                    <a href="produk-detail.php?kode=<?= $value['kode'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Check Detail</a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->