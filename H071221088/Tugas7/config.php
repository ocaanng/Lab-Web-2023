<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "task7";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
?>
