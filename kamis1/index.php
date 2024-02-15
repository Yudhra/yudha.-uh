<?php
include 'koneksi.php';

// Fungsi untuk menampilkan semua menu
function displayMenu() {
    global $conn;
    $sql = "SELECT * FROM list_makanan";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_makanan'] . "</td>";
            echo "<td>" . $row['nama_makanan'] . "</td>";
            echo "<td>" . $row['harga_makanan'] . "</td>";
            echo "<td>" . $row['deskripsi'] . "</td>";
            echo "<td><a href='edit.php?id=" . $row['id_makanan'] . "'>Edit</a> | <a href='delet.php?id=" . $row['id_makanan'] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "Belum ada menu.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Makan - Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="nanda.jpeg" alt="Profil" style="width: 40px; height: 40px; border-radius: 50%;"> Warung Makan</a>
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
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Daftar Menu</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Makanan</th>
                    <th scope="col">Harga Makanan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php displayMenu(); ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>





