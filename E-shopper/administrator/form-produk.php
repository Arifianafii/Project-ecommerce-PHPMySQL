<?php
include_once('page/head.php');
include_once('page/nav.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Form</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Form</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                Form Jenis Produk
            </div>
            <div class="card-body">
                <?php if (isset($_GET['idedit'])) {
                    // select pdo form idedit
                    $id = $_GET['idedit'];
                    $sql = "SELECT * FROM produk WHERE id = :id";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <form method="post">
                        <div class="form-group row mb-3">
                            <label for="kode" class="col-4 col-form-label">Kode Produk</label>
                            <div class="col-8">
                                <input id="kode" name="kode" value="<?= $row['kode'] ?>" type="text" class="form-control">
                                <input id="id" name="id" value="<?= $row['id'] ?>" type="hidden" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-4 col-form-label">Nama Produk</label>
                            <div class="col-8">
                                <input id="nama" name="nama" value="<?= $row['nama'] ?>" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="harga" class="col-4 col-form-label">Harga Produk</label>
                            <div class="col-8">
                                <input id="harga" name="harga" value="<?= $row['harga'] ?>" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="stok" class="col-4 col-form-label">Stok Produk</label>
                            <div class="col-8">
                                <input id="stok" name="stok" value="<?= $row['stok'] ?>" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jenis_produk" class="col-4 col-form-label">Jenis Produk</label>
                            <div class="col-8">
                                <select id="jenis_produk" name="jenis_produk" class="form-control">
                                    <option value="<?= $row['jenis_produk'] ?>"><?= $row['jenis_produk'] ?></option>
                                    <?php
                                    $sql2 = "SELECT * FROM jenis_produk";
                                    $stmt2 = $dbh->prepare($sql2);
                                    $stmt2->execute();
                                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?= $row2['nama'] ?>"><?= $row2['nama'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deskripsi" class="col-4 col-form-label">Deskripsi Produk</label>
                            <div class="col-8">
                                <textarea id="deskripsi" name="deskripsi" value="<?= $row['deskripsi'] ?>" class="form-control"><?= $row['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="update" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form method="post">

                        <div class="form-group row mb-3">
                            <label for="kode" class="col-4 col-form-label">Kode Produk</label>
                            <div class="col-8">
                                <input id="kode" name="kode" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-4 col-form-label">Nama Produk</label>
                            <div class="col-8">
                                <input id="nama" name="nama" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="harga" class="col-4 col-form-label">Harga Produk</label>
                            <div class="col-8">
                                <input id="harga" name="harga" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="stok" class="col-4 col-form-label">Stok Produk</label>
                            <div class="col-8">
                                <input id="stok" name="stok" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jenis_produk" class="col-4 col-form-label">Jenis Produk</label>
                            <div class="col-8">
                                <select id="jenis_produk" name="jenis_produk" class="form-control">
                                    <?php
                                    $sql2 = "SELECT * FROM jenis_produk";
                                    $stmt2 = $dbh->prepare($sql2);
                                    $stmt2->execute();
                                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?= $row2['nama'] ?>"><?= $row2['nama'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deskripsi" class="col-4 col-form-label">Deskripsi Produk</label>
                            <div class="col-8">
                                <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="insert" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php
if (isset($_POST['insert'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $jenis_produk = $_POST['jenis_produk'];
    $deskripsi = $_POST['deskripsi'];
    $sql = "INSERT INTO produk (kode, nama, harga, stok, jenis_produk, deskripsi) VALUES (:kode, :nama, :harga, :stok, :jenis_produk, :deskripsi)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':kode', $kode);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':stok', $stok);
    $stmt->bindParam(':jenis_produk', $jenis_produk);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->execute();
    echo "<script>alert('Data berhasil ditambahkan');location.href='produk.php';</script>";
}
if (isset($_POST['update'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $jenis_produk = $_POST['jenis_produk'];
    $deskripsi = $_POST['deskripsi'];
    $sql = "UPDATE produk SET kode=:kode, nama=:nama, harga=:harga, stok=:stok, jenis_produk=:jenis_produk, deskripsi=:deskripsi WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':kode', $kode);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':stok', $stok);
    $stmt->bindParam(':jenis_produk', $jenis_produk);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "<script>alert('Data berhasil diupdate');location.href='produk.php';</script>";
}
include_once('page/footer.php') ?>