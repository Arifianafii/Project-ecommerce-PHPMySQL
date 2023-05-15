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
                    $sql = "SELECT * FROM jenis_produk WHERE id = :id";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <form method="post">
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-4 col-form-label">Nama Jenis</label>
                            <div class="col-8">
                                <input id="nama" name="nama" value="<?= $row['nama'] ?>" type="text" class="form-control">
                                <input id="id" name="id" value="<?= $row['id'] ?>" type="hidden" class="form-control">
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
                            <label for="nama" class="col-4 col-form-label">Nama Jenis</label>
                            <div class="col-8">
                                <input id="nama" name="nama" type="text" class="form-control">
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
    $nama = $_POST['nama'];
    $sql = "INSERT INTO jenis_produk (nama) VALUES (:nama)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':nama', $nama);
    $stmt->execute();
    echo "<script>alert('Data berhasil ditambahkan');location.href='jenis-produk.php';</script>";
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $sql = "UPDATE jenis_produk SET nama = :nama WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "<script>alert('Data berhasil diedit');location.href='jenis-produk.php';</script>";
}
include_once('page/footer.php') ?>