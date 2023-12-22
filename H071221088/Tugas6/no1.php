<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task6</title>
    <link rel="stylesheet" href="no1.css">
</head>
<body>
    <div class="container">
        <h1 style="font-family: sans-serif">Welcome</h1>
        <form method="post">
            <input type="text" name="jenis_barang" placeholder="Masukkan jenis barang" required>
            <button type="submit">Cari</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jenis_barang_cari = $_POST["jenis_barang"];
            $data = [
                [
                    "nama_barang" => "HP",
                    "harga" => 3000000,
                    "stok" => 10,
                    "jenis" => "Elektronik"
                ],
                [
                    "nama_barang" => "Jeruk",
                    "harga" => 5000,
                    "stok" => 20,
                    "jenis" => "Buah"
                ],
                [
                    "nama_barang" => "Kemeja",
                    "harga" => 5000,
                    "stok" => 9,
                    "jenis" => "Pakaian"
                ],
                [
                    "nama_barang" => "Apel",
                    "harga" => 5000,
                    "stok" => 5,
                    "jenis" => "Buah"
                ],
                [
                    "nama_barang" => "Celana",
                    "harga" => 5000,
                    "stok" => 10,
                    "jenis" => "Pakaian"
                ],
                [
                    "nama_barang" => "Laptop",
                    "harga" => 50000,
                    "stok" => 30,
                    "jenis" => "Elektronik"
                ],
                [
                    "nama_barang" => "Semangka",
                    "harga" => 5000,
                    "stok" => 2,
                    "jenis" => "Buah"
                ],
                [
                    "nama_barang" => "Kaos",
                    "harga" => 5000,
                    "stok" => 1,
                    "jenis" => "Pakaian"
                ],
                [
                    "nama_barang" => "VGA",
                    "harga" => 2000000,
                    "stok" => 0,
                    "jenis" => "Elektronik"
                ]
            ];

            echo "<table border='1'>
                    <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    </tr>";
            foreach ($data as $barang) {
                if ($barang["jenis"] == $jenis_barang_cari) {
                    echo "<tr>";
                    echo "<td>" . $barang["nama_barang"] . "</td>";
                    echo "<td>" . $barang["harga"] . "</td>";
                    echo "<td>" . $barang["stok"] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>