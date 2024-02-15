<?php
include 'koneksi.php';

if (isset($_GET['id_makanan'])) {
    $id = $_GET['id_makanan'];
    $sql = "DELETE FROM list_makanan WHERE id_makanan = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
