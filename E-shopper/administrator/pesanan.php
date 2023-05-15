<?php
include_once('page/head.php');
include_once('page/nav.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-table me-1"></i> Data Pesanan
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pemesan</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pemesan</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT * FROM pesanan";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['nama_pemesan'] ?></td>
                                <td><?= $row['alamat_pemesan'] ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['qty'] ?></td>
                                <td><?= $row['total_harga'] ?></td>
                                <td>
                                    <a href="?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php }
                        if (isset($_GET['id'])) {
                            $sql = "DELETE FROM pesanan WHERE id = '" . $_GET['id'] . "'";
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute();
                            echo "<script>alert('Data berhasil dihapus');location.href='pesanan.php';</script>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include_once('page/footer.php') ?>