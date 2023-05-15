<?php
include_once('page/head.php');
include_once('page/nav.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jenis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Jenis</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a href="form-jenis.php" class="btn btn-primary btn-sm rounded"> <i class="fas fa-table me-1"></i>Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT * FROM jenis_produk";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td>
                                    <a href="form-jenis.php?idedit=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php }
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "DELETE FROM jenis_produk WHERE id = :id";
                            $stmt = $dbh->prepare($sql);
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            echo "<script>alert('Data berhasil dihapus');location.href='jenis-produk.php';</script>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include_once('page/footer.php') ?>