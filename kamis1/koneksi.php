<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_makanan";

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
