<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $harga = $_POST['harga_makanan'];
    $deskripsi = $_POST['deskripsi'];
    
    $sql = "UPDATE list_makanan SET nama_makanan='$nama_makanan', harga_makanan='$harga', deskripsi='$deskripsi' WHERE id_makanan=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id_makanan'])) {
    $id = $_GET['id_makanan'];
    $sql = "SELECT * FROM list_makanan WHERE id_makanan = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Menu tidak ditemukan.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Warung Makan - Edit Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Warung Makan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Tambah Menu</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Edit Menu</h2>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="nama_makanan">Nama Makanan:</label>
                <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" value="<?php echo $row['nama_makanan']; ?>">
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $row['deskripsi']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"
