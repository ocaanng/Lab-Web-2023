<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }

    require 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docsku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    nav {
        background-color: #272829dc; 
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        position: fixed;
        width: 100%;
    }
    .logo {
        margin-left: 70px;
        display: inline-block;
        color: #F1EFEF;
    }
    .search {
        display: inline-block;
        margin-right: 10px;
    }
    .search input {
        height: 40px;
        width: 500px;
        border-radius: 20px;
    }
    .search input:focus {
        border: 0;
        outline: none;
    }
    .logout-button {
        text-align: center;
        height: 40px;
        margin-right: 70px;
        background-color: #F1EFEF;
        color: #272829dc; 
        padding: 10px 20px;
        border-radius: 20px;
        border: 0;
    }
    .container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 90%;
        margin-top: 100px;
    }
    .container p {
        margin-top: 20px;
        color: rgba(0, 0, 0, 0.6);
    }
    .container button {
        cursor: pointer;
        color: white;
        font-weight: bold;
        background-color: green;
        border: 0;
        width: 120px;
        height: 30px;
        border-radius: 30px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: 400;
    }
    .container table {
        width: 100%;
    }
</style>
<body>
    <nav class="navbar">
        <div class="logo">
            <h1>Docsku.</h1>
        </div>
        <div>
            <a href="logout.php"><button class="logout-button">Log Out</button></a>
        </div>
    </nav>
    <div class="container" id="tabel">
        <h1> Selamat Datang</h1>
        <p>Selamat datang di Docsku. Docsku adalah sebuah platform yang akan membantu anda dalam megelola data yang ada pada database anda. Silahkan masuk sebagai admin untuk mendapat akses penuh ke data anda</p>
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT nama, nim, prodi FROM mahasiswa";
                    $result = $conn->query($sql);

                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['nama'] . '</td>';
                            echo '<td>' . $row['nim'] . '</td>';
                            echo '<td>' . $row['prodi'] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Terjadi kesalahan dalam mengambil data dari database.';
                    }
                ?>
            </tbody>
        </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>