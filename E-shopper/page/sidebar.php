<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Jenis Produk</h2>
        <div class="panel-group category-products" id="accordian">
            <?php
            $sql99 = "SELECT * FROM jenis_produk";
            $stmt99 = $dbh->prepare($sql99);
            $stmt99->execute();
            $data99 = $stmt99->fetchAll();
            foreach ($data99 as $key => $value99) {
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="produk.php?jenis_produk=<?php echo $value99['nama']; ?>"><?php echo $value99['nama']; ?></a></h4>
                    </div>
                </div>
            <?php
            }

            ?>
        </div><!--/category-products-->

        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="60000000" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                <b class="pull-left">Rp 0</b> <b class="pull-right">Rp 6.000.0000</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>