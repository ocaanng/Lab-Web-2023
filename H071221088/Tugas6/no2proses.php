<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halo</title>
    <link rel="stylesheet" href="tambahan.css">
</head>
<body>
    <div class="container">
        <h1>Halo!</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $usia = $_POST["usia"];
            $email = $_POST["email"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            $bahasa = $_POST["bahasa"];
            if (!empty($bahasa)) {
                $kalimat_perkenalan = "Nama saya $nama, sekarang saya berusia $usia tahun, alamat email saya $email, saya berjenis kelamin $jenis_kelamin dan bahasa yang saya kuasai " . implode(", ", $bahasa);
            } else {
                $kalimat_perkenalan = "Nama saya $nama, sekarang saya berusia $usia tahun, alamat email saya $email, saya berjenis kelamin $jenis_kelamin dan belum ada bahasa yang saya kuasai";
            }
            echo "<p>$kalimat_perkenalan</p>";
        }
        ?>
    </div>
</body>
</html>
