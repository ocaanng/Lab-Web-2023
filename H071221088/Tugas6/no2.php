<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link rel="stylesheet" href="no2.css">
</head>
<body>
    <div class="container">
        <h1 style="text-align:center;">Formulir</h1>
        <form method="post" action="no2proses.php">
            <label for="nama">Nama Lengkap</label> <br><br>
            <input type="text" name="nama" required style="width: 440px; height: 30px;"> <br><br>

            <label for="usia">Usia</label> <br><br>
            <input type="number" name="usia" required style="width: 440px; height: 30px;"> <br><br>

            <label for="email">Email</label> <br><br>
            <input type="email" name="email" required style="width: 440px; height: 30px;"> <br><br>

            <label for="tgl_lahir">Tanggal Lahir</label> <br><br>
            <input type="date" name="tgl_lahir" required style="width: 440px; height: 25px; padding: 5px;"> <br><br>

            <label>Jenis Kelamin</label> <br><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan <br><br>

            <label>Bahasa yang dikuasai</label> <br><br>
            <input type="checkbox" name="bahasa[]" value="Python"> Python
            <input type="checkbox" name="bahasa[]" value="Java"> Java
            <input type="checkbox" name="bahasa[]" value="HTML"> HTML
            <input type="checkbox" name="bahasa[]" value="CSS"> CSS
            <input type="checkbox" name="bahasa[]" value="JavaScript"> JavaScript
            <input type="checkbox" name="bahasa[]" value="PHP"> PHP <br><br><br>

            <button type="submit">SUBMIT</button>
        </form>
        <!-- <?php
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     $nama = $_POST["nama"];
        //     $usia = $_POST["usia"];
        //     $email = $_POST["email"];
        //     $tgl_lahir = $_POST["tgl_lahir"];
        //     $jenis_kelamin = $_POST["jenis_kelamin"];
        //     $bahasa = $_POST["bahasa"];
        //     $kalimat_perkenalan = "Nama saya $nama, sekarang saya berusia $usia tahun, alamat email saya $email, saya berjenis kelamin $jenis_kelamin dan bahasa yang saya kuasai " . implode(", ", $bahasa);

        //     echo "<script>alert('$kalimat_perkenalan');</script>";
        // }
        ?> -->
    </div>
</body>
</html>