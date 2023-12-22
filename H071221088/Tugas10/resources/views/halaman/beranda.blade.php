<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Segoe UI', Arial;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #ecf0f5;
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

        .sambutan {
            background: linear-gradient(rgba(0, 34, 102, 0.5), rgba(0, 34, 102, 0.8)), url('{{ url('img/homebg.png') }}');
            background-size: cover;
            background-position: center;
            width: auto;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .sambutan h1 {
            font-weight: 400;
            font-size: 48px;
            margin-bottom: 10px;
        }

        .sambutan p {
            font-size: 20px;
            margin: 5px 0;
        }

        .populer {
            width: auto;
            text-align: center;
            margin-top: 40px;
        }

        .kelas {
            width: auto;
            display: flex;
            margin: 40px;
        }
        .logout-btn {
            background-color: #d9534f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }

        .populer h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: rgba(0, 34, 102);

        }
        
        .footer {
        background-color: rgba(0, 34, 102);;
        color: white;
        padding: 20px;
        width: 100vw;
        text-align: center;
        margin-top: 30px;
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
    <div class="sambutan">
        <h1> Belajar 
            <strong>dengan cara yang sesuai dengan Anda,</strong> <br>
        <strong> di mana pun Anda berada</strong></h1>
    </div>
<!-- Inside your dashboard.blade.php file -->

    <div>
        <div class="populer">
            <h1><strong>Populer</strong></h1>
        </div>
        <div class="kelas">
        @foreach($kelasList->take(5) as $kelas)
            <div class="card" style="width: 20rem; margin-left: 40px;">
                <img src="{{ asset('storage/'. $kelas->thumbnail) }}" class="card-img-top" alt="{{$kelas->thumbnail}}" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h1 class="card-title">{{ $kelas->nama }}</h1>
                    <p class="card-text">{{ $kelas->materi }}</p>
                    <a href="{{ route('kelas.show', ['namaKelas' => $kelas->nama]) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 E-Learn. All rights reserved.</p>
    </div>
</body>
</html>
