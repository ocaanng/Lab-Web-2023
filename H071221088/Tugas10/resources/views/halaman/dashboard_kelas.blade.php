<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    body {
        font-family: 'Segoe UI', Arial;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        background-color: #ecf0f5;
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

    .container {
        width: 100vw;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .konten {
    width: 90vw;
    padding: 20px;
    background-color: #ffffff;
    padding: 30px;
    margin-top: 100px; /* Adjusted margin-top to add space between navbar and content */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.kelas {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    margin: 40px -10px;
    margin-bottom: 20px;
}

.card {
    width: calc(20% - 20px);
    margin: 10px;
}

.card img {
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.search-input {
        width: 70vw;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 20px;
    }

    .search-input:focus {
        border: 1px solid #ccc;
    outline: none;
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
    <div class="container">
        <div class="konten">
            <div class="list-kelas">
                <h1>Kelas</h1>
                <!-- Add an ID to the container for easy access in JavaScript -->
                <input type="text" placeholder="Search..." class="search-input" oninput="filterClasses()">
                <div id="kelasContainer" class="kelas">
                    <!-- Loop through your classes and apply the filter dynamically -->
                    @foreach($kelasList as $kelas)
                        <div class="card">
                            <img src="{{ asset('storage/'. $kelas->thumbnail) }}" class="card-img-top" alt="{{$kelas->thumbnail}}">
                            <div class="card-body">
                                <h1 class="card-title">{{ $kelas->nama }}</h1>
                                <p class="card-text">{{ $kelas->materi }}</p>
                                <a href="{{ route('kelas.show', ['namaKelas' => $kelas->nama]) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 E-Learn. All rights reserved.</p>
    </div>
    <script>
        // Your existing JavaScript here

        function filterClasses() {
            var input, filter, kelasContainer, cards, card, title, i, txtValue;
            input = document.querySelector('.search-input');
            filter = input.value.toUpperCase();
            kelasContainer = document.getElementById('kelasContainer');
            cards = kelasContainer.getElementsByClassName('card');

            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                title = card.querySelector('.card-title');
                txtValue = title.textContent || title.innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
