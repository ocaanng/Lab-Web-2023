<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }
    require 'config.php';

    if (isset($_POST['add_data'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $prodi = $_POST['prodi'];

        $insertSql = "INSERT INTO mahasiswa (nama, nim, prodi) VALUES ('$nama', '$nim', '$prodi')";
        if ($conn->query($insertSql) === TRUE) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo 'Terjadi kesalahan dalam menambahkan data: ' . $conn->error;
        }
    }
    if (isset($_POST['edit_data'])) {
        $nama = $_POST['edit_nama'];
        $nim = $_POST['edit_nim'];
        $prodi = $_POST['edit_prodi'];
        $nim_edit = $_POST['edit_id'];

        $updateSql = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', prodi = '$prodi' WHERE nim = '$nim_edit'";
        if ($conn->query($updateSql) === TRUE) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo 'Terjadi kesalahan dalam mengedit data: ' . $conn->error;
        }
    }
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
        color: rgba(0, 0, 0, 0.8);
        background-color: #F1EFEF;
        border: 0;
        width: auto;
        height: 30px;
        border-radius: 30px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: 500;
    }
    .container table {
        width: 100%;
    }
    #form-add {
        width: 20%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        display: none;
    }
    #form-add form input{
       margin: 10px 0 10px 0;
       border: 1px solid rgba(0, 0, 0, 0.2);
       border-radius: 20px;
       width: 300px;
       height: 40px;
    }
    #form-add form input:focus{
        outline: 1px solid rgba(39, 40, 41, 0.2);
    }
    #form-edit {
        width: 20%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        display: none;
    }
    #form-edit form input{
       margin: 10px 0 10px 0;
       border: 1px solid rgba(0, 0, 0, 0.2);
       border-radius: 20px;
       width: 300px;
       height: 40px;
    }
    #form-edit form input:focus{
        outline: 1px solid rgba(39, 40, 41, 0.2);
    }
    .delete-btn {
        background-color: red;
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
        <button type="submit" name="add" id="add">Tambah Data</button> <br>
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Edit</th>
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
                            echo '<td><button class="edit-btn" data-nim="' . $row['nim'] . '">Edit</button> <button class="delete-btn" data-nim="' . $row['nim'] . '">Hapus</button></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Terjadi kesalahan dalam mengambil data dari database.';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container" id="form-add">
    <h1 style="margin-bottom: 20px">Masukkan Data</h1>
        <form method="POST">
            <input type="text" name="nama" placeholder="  Nama" required> <br>
            <input type="text" name="nim" placeholder="  NIM" required> <br>
            <input type="text" name="prodi" placeholder="  Prodi" required> <br>
            <button type="submit" name="add_data" style="margin-top: 20px;">Simpan Data</button>
            <a href="admin.php" style="margin-right: 400px;"><img src="back.png" width="8%"></a>
        </form>
    </div>
    <div class="container" id="form-edit" style="display: none;">
        <h1 style="margin-bottom: 20px">Edit Data</h1>
        <form method="POST">
            <input type="hidden" id="edit-id" name="edit_id" value="">
            <input type="text" id="edit-nama" name="edit_nama" placeholder="  Nama" required> <br>
            <input type="text" id="edit-nim" name="edit_nim" placeholder="  NIM" required> <br>
            <input type="text" id="edit-prodi" name="edit_prodi" placeholder="  Prodi" required> <br>
            <button type="submit" name="edit_data" style="margin-top: 20px;">Simpan Data</button>
        </form>
    </div>
    <script>
        document.getElementById("add").addEventListener("click", function () {
            document.getElementById("form-add").style.display = "block";
            document.getElementById("tabel").style.display = "none";
        });

        const editButtons = document.querySelectorAll('.edit-btn');
        const formEdit = document.getElementById('form-edit');
        const editId = document.getElementById('edit-id');
        const editNama = document.getElementById('edit-nama');
        const editNim = document.getElementById('edit-nim');
        const editProdi = document.getElementById('edit-prodi');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const nim = button.getAttribute('data-nim');
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "getdata.php?nim=" + nim, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var data = JSON.parse(xhr.responseText);
                        if (data) {
                            editId.value = nim;
                            editNama.value = data.nama;
                            editNim.value = nim;
                            editProdi.value = data.prodi;
                            formEdit.style.display = 'block';
                            document.getElementById('tabel').style.display = 'none';
                        } else {
                            console.log('Terjadi kesalahan dalam mengambil data untuk diedit.');
                        }
                    }
                };
                xhr.send();
            });
        });
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const nim = button.getAttribute('data-nim');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "deletedata.php?nim=" + nim, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            window.location.reload();
                        }
                    };
                    xhr.send();
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>