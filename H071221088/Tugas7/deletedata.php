<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require 'config.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $deleteSql = "DELETE FROM mahasiswa WHERE nim = '$nim'";
    if ($conn->query($deleteSql) === TRUE) {
        echo 'Data berhasil dihapus.';
    } else {
        echo 'Terjadi kesalahan dalam menghapus data: ' . $conn->error;
    }
} else {
    echo 'NIM tidak ditemukan.';
}
?>
