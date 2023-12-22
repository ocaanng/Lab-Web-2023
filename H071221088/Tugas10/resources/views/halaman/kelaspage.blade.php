<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Kelas: {{ $kelas->nama }}</title>

    <style>
        body {
            font-family: 'Segoe UI', Arial;
            margin: 0;
            padding: 0;
            background-color: #ecf0f5;
            color: #333333;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }


        .contain {
            margin-top: 30px;
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh; /* Ensure the container takes at least the full viewport height */
        }

        .konten {
            width: 100%;
            max-width: 1500px; /* Adjust the max-width as needed */
            background-color: #ffffff;
            padding: 30px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .komentar {
            width: 100%;
            max-width: 1520px; /* Adjust the max-width as needed */
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Add margin to the bottom */

        }

        .comment-section {
            margin-top: 20px; /* Adjust the margin as needed */
        }

        /* Update the style for the comment form */
        .komentar form {
            margin-top: 20px; /* Adjust the margin as needed */
            display: flex;
            flex-direction: column;
        }

        .komentar label {
            margin-bottom: 5px;
        }

        .komentar textarea,
        .komentar input {
            margin-bottom: 10px;
        }

        .user-comment {
            align-items: center;
            margin-bottom: 10px; /* Add margin to separate comments */
        }

        button {
            cursor: pointer;
            color: white;
            height: 40px;
            background-color: #003399;
            border: 0;
        }
        input {
            height: 30px;
        }

        input,
        textarea {
            outline: 2px solid rgb(0, 51, 153, 0.3);
            border: 0;
            color: black;
        }

        .footer {
            background-color: rgba(0, 34, 102);
            color: white;
            padding: 20px;
            width: 100vw;
            text-align: center;
            margin-top: auto; /* Align at the bottom */
        }
        .navbar {
            background-color: rgba(0, 34, 102);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            height: 6vh
            postion: absolute;
        }

        .logo {
            color: white;
            font-size: 36px;
            font-weight: bold;
            text-decoration: none;
        }

        .search {
            flex-grow: 1;
            text-align: center;
        }
        .logo {
            margin-left: 100px;
        }

        .actions {
            display: flex;
            align-items: center;
            margin-right: 150px;
            padding: 0 15px 0 15px;
        }

        .profile-dropdown {
            position: relative;
            display: inline-block;
            margin-left: 10px;
        }

        .profile-dropdown-content {
            display: none;
            position: absolute;
            background-color: rgba(0, 34, 102);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            margin: 0;
            padding: 0;
        }

        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }

        .profile-dropdown-content a {
            color: black;
            padding: 20 0 20px 0;
            text-decoration: none;
            display: block;
        }

        .profile-dropdown-content a:hover {
            background-color:rgb(0, 60, 179);
        }

        .profile-dropdown-content button.logout-btn {
        background-color: #d9534f;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .profile-dropdown-content button.logout-btn:hover {
        background-color: #c9302c;
    }

    .actions a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    font-size: 20px;
}

.logout-btn {
    background-color: #d9534f;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 20px; /* Add margin to the left */
}
.logout-btn:hover {
            background-color: #c9302c;
        }

    </style>
</head>

<body>
<div class="navbar">
        <a href="#" class="logo">E-Learn</a>
        <div class="actions">
        <a href="{{ route('homepage') }}">Home</a>
            <a href="{{ route('konten.kelas') }}">Kelas</a>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
</div>
    </div>

    <div class="contain">
        <div class="konten">
            <!-- Content here -->
            <h1>Selamat datang di kelas {{ $kelas->nama }}</h1>
            <div style="aspect-ratio: 16/9; width: 100%;">
                <iframe style="width: 100%; height: 100%;" src="{{$kelas->link}}?autoplay=1" frameborder="0"
                    allowfullscreen></iframe>
            </div>
            <p>Pengajar: {{ $kelas->pengajar }}</p>
            Materi: {{ $kelas->materi }}
            <p>Deskripsi: {{ $kelas->deskripsi }}
            </p>
        </div>

        <div class="komentar">
            <!-- Comments here -->
            <h2>Komentar</h2>

            @if ($kelas->comments && count($kelas->comments) > 0)
            @foreach($kelas->comments as $comment)
            <div class="user-comment">
                <strong>{{ $comment->user_name }} :</strong>
                <p> {{ $comment->comment_text }}</p>
            </div>
            @endforeach
            @else
            <p>No comments available.</p>
            @endif

            <h2>Tambah Komentar</h2>

            <form action="{{ route('kelas.addComment', $kelas) }}" method="post">
                @csrf
                <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                <label for="user_name">Nama:</label>
                <input type="text" name="user_name" required>

                <label for="comment_text">Komentar:</label>
                <textarea name="comment_text" rows="4" required></textarea>

                <button type="submit">Tambah Komentar</button>
            </form>
        </div>
    </div>

    </div>

    <div class="footer">
        <p>&copy; 2023 E-Learn. All rights reserved.</p>
    </div>
</body>

</html>
