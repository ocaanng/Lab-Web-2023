<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learn - Create Class</title>
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
    width: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #ffffff;
    height: 60vh;
    border-radius: 8px;
}

        form {
            width: 600px;
            box-shadow: 1px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 60vh;
            border-radius: 8px;
        }

        form h1 {
            color: #003399;
        }

        input, textarea {
            outline: 1px solid rgba(0, 51, 153, 0.3);
            border: 0;
            width: 100%;
            margin:0 30px 15px 30px;
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;

        }

        button {
            cursor: pointer;
            color: white;
            font-weight: bold;
            background-color: #003399;
            border: 0;
            width: 104%;
            height: 40px;
            font-size: 16px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ route('admin.kelas.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h1>Create Class</h1>

            <input type="text" name="nama" placeholder="Nama Kelas" required>

            <input type="text" name="pengajar" placeholder="Pengajar" required>

            <textarea name="deskripsi" placeholder="Deskripsi" required></textarea>

            <input type="text" name="materi" placeholder="Materi" required>

            <input type="file" name="thumbnail" accept="image/*" required>

            <input type="text" name="link" placeholder="Link" accept="image/*" required>

            <button type="submit">Create Class</button>
        </form>
    </div>
</body>
</html>
