<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #003399;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            height: 6vh;
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

        .search input {
            width: 40%;
            padding: 8px;
            border: none;
            border-radius: 5px;
            background-color: rgb(0, 51, 153, 0.5);
            border: 1px solid rgb(255,255,255, 0.4);
            height: 2vh;
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
            width: max;
            height: 60vh;
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

    </style>
</head>

<body>
    <div class="navbar">
        <a href="#" class="logo">E-Learn</a>
        <div class="search">
            <input type="text" placeholder="Search...">
        </div>
        <div class="actions">
            <a href="#">Beranda</a>
            <a href="#">Kelas</a>
            <div class="profile-dropdown">
                <a href="#">Profil</a>
                <div class="profile-dropdown-content">
                    <a href="#">My Profil</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="sambutan">
        <h1> Belajar 
            <strong>dengan cara yang sesuai dengan Anda,</strong> <br>
        <strong> di mana pun Anda berada</strong></h1>
    </div>
</body>

</html>
