<!-- adminkelasedit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learn - Edit Class</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #ecf0f5;
        }

        .form-container {
            width: 400px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #003399;
            margin-bottom: 20px;
        }

        input, textarea, select {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
            border-radius: 8px;
        }

        button {
            cursor: pointer;
            color: white;
            font-weight: bold;
            background-color: #003399;
            border: 0;
            width: 100%;
            height: 40px;
            font-size: 16px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk update -->

            <h1>Edit Class</h1>

            <input type="text" name="nama" placeholder="Nama Kelas" value="{{ $kelas->nama }}" required>

            <input type="text" name="pengajar" placeholder="Pengajar" value="{{ $kelas->pengajar }}" required>

            <textarea name="deskripsi" placeholder="Deskripsi" required>{{ $kelas->deskripsi }}</textarea>

            <input type="text" name="materi" placeholder="Materi" value="{{ $kelas->materi }}" required>

            <input type="file" name="thumbnail" accept="image/*">
            <img src="{{ asset('storage/' . $kelas->thumbnail) }}" alt="Thumbnail">

            <input type="text" name="link" placeholder="Link" value="{{ $kelas->link }}" required>

            <button type="submit">Update Class</button>
        </form>
    </div>
</body>
</html>
