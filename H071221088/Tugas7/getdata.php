<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "task7";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    if (isset($_GET['nim'])) {
        $nim = $_GET['nim'];

        $sql = "SELECT nama, nim, prodi FROM mahasiswa WHERE nim = '$nim'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            header('Content-Type: application/json');
            echo json_encode($row);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array('error' => 'Mahasiswa tidak ditemukan'));
        }
    } else {
        header("HTTP/1.0 400 Bad Request");
        echo json_encode(array('error' => 'NIM tidak diberikan'));
    }

    $conn->close();
?>
