<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learn</title>
    <style>
        body {
            font-family:segoe UI, Arial;
            margin: 0;
            padding: 0;
        }
        .containerbody {
            width: 100vw; 
            height: 100vh;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
        .content {
            width: 50%;
            height: 100%;
            background-color: #003399;
            color: white;
            text-align: center; /* Memusatkan teks */
            display: flex;
            flex-direction: column;
            align-items: center; /* Memusatkan elemen-elemen anak */
            justify-content: center; /* Memusatkan elemen-elemen anak */
        }
        .formlogin {
            width: 50%;
            height: 100%;
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
        }
        .form {
            width: auto;
            height: auto;
            box-shadow: 1px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 50px;
            text-align: center; /* Memusatkan teks */
            display: flex;
            flex-direction: column;
            align-items: center; /* Memusatkan elemen-elemen anak */
            justify-content: center;
        }
        .content h1 {
            color:#b3d9ff;
            font-size: 48px;
        }
        .form h1 {
            color: #003399;
        }
        input {
            outline: 2px solid rgb(0, 51, 153, 0.3);
            border: 0;
            width: 450px;
            height: 60px;
            padding-left: 10px;
            color; black;
            font-size: 20px;
        }
        button {
            cursor: pointer;
            color: white;
            font-weight: bold;
            background-color:  #003399;
            border: 0;
            width: 465px;
            height: 60px;
            font-size: 20px;
        }
        select {
            outline: 2px solid rgb(0, 51, 153, 0.3);
            border: 0;
            width: 465px;
            height: 60px;
            padding-left: 10px;
            color; black;
            font-size: 20px;; /* Tambahkan margin bawah */
        }
    </style>
</head>
<body>
    <div class="containerbody">
        <div class="content">
            <h1>E-Learn</h1>
            <img src="{{ url('img/loginicon.png') }}" alt="icon" width="60%">
        </div>
        <div class="formlogin">
            <div class="form">
                <h1>Register</h1>
                <form action="{{ url('/register') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Username" required> <br> <br>
                    <input type="password" name="password" placeholder="Password" required> <br> <br>
                    <select name="role" id="role" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select> <br> <br>
                    <button type="submit">Register</button>
                </form>

            </div>
        </div>
        @if ($errors->any())
            <script>
                alert("Terjadi kesalahan:\n\n{{ implode('\n', $errors->all()) }}");
            </script>
        @endif
    </div>
</body>
</html>
