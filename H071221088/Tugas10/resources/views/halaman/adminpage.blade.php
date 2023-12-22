<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Document</title>
</head>
<style> 
   /* styles.css */

body {
    font-family: 'Segoe UI', Arial;
    margin: 0;
    padding: 0;
    background-color: #ecf0f5;
    color: #333333;
}
.icon {
    width: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.navbar {
        background-color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 40px;
        height: 8vh;
        margin-bottom: 20px;
    }

    /* Add new style for the logout button */
    .logout-btn {
        background-color: #cc0000;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        font-size: 14px;
    }

    .logout-btn:hover {
        background-color: #990000;
    }


.icon img {
    width: 60%; /* Set the image width to 100% for responsiveness */
    border-radius: 50%;
}
.kelas {
    width: auto;
    display: flex;
    flex-direction: start;
}
.kelas_contain {
    margin-left: 40px;
}
.card {
    width: 10vw;
    height: 20vh;
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.card_contain {
    width: auto;
    display: flex;
    flex-direction: start;
}
.card p {
    margin: 0;
    color: rgba(0, 34, 102);
    font-size: 18px;
}

.card p:first-child {
    margin-bottom: 10px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

h1 {
    font-size: 36px;
    margin-bottom: 20px;
    color: rgba(0, 34, 102);
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

li {
    margin-bottom: 10px;
}

a {
    color: #cc0000;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.alert {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    margin-bottom: 20px;
    width: auto;
}

table {
    width: auto;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #ffff;
    color: rgba(0, 34, 102);
}

td {
    background-color: #ffff;
    color: rgba(0, 34, 102);
}

tbody tr:hover {
    background-color: #777777;
}

button {
    background-color: #cc0000;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    font-size: 14px;
}

button:hover {
    background-color: #990000;
}

.user-contain {
    margin-left: 40px;
}
.footer {
    background-color: #333333;
    color: white;
    padding: 20px 0;
    text-align: center;
    margin-top: 30px;
}

.footer p {
    margin: 0;
}

.footer a {
    color: #cc0000;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: underline;
}


</style>
<body>
    <div class="navbar">
        <h1>Admin</h1>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
</form>
</div>
    <div class="card_contain">
        <div class="card" style="margin-left: 40px;">
            <div class="icon">
                <img src="{{ url('img/logouser.png') }}" alt="icon" width="0%">
            </div>
            <p>Total User</p> <br>
            <p>{{ $totalUser }}</p>
        </div>
        <div class="card" style="margin-left: 20px;">
            <div class="icon">
                <img src="{{ url('img/logocourse.png') }}" alt="icon" width="40%">
            </div>
            <p>Total Kelas</p> <br>
            <p>{{ $totalKelas }}</p>
        </div>
    </div>
    <div class="kelas"> 
        <div class="kelas_contain">
            <h1>Kelas</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table>
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Pengajar</th>
                    <th>Materi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelasList as $kelas)
                    <tr>
                        <td>{{ $kelas->id }}</td>
                        <td>{{ $kelas->nama }}</td>
                        <td>{{ $kelas->pengajar }}</td>
                        <td>{{ $kelas->materi }}</td>
                        <td>
                            <a href="{{ route('admin.kelas.edit', $kelas->id) }}">Edit</a>
                            <form action="{{ route('admin.kelas.delete', $kelas->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No classes found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <br>
        <a href="{{ route('admin.kelas.create') }}">Tambah Kelas</a>

    </div>
    </div>

    <div class="user-contain">
    <h1>User</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="footer">
    <p>&copy; 2023 E-learn. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
</div>
</body>
</html>