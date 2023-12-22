<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docsku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,600&family=Poppins:wght@500&display=swap" rel="stylesheet">
  <style>
    body {
        background-color: #272829dc;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }
    .home-login {
        width: 1500px;
        height: 600px;
        background-color: #272829;
        text-align: center;
        border-radius: 40px;
        margin-top: 20px;
        display: flex;
    }
    .Text {
        width: 750px;
        height: 600px;
        color: #F1EFEF;
        display: flex;
        flex-direction: column;
        margin-left: 50px;
        margin-top: 50px;
    }
    .Text h1 {
        align-self: flex-start;
    }
    #last-text {
        margin-bottom: 40px;
    }
    .Text p {
        align-self: flex-start;
        color: #f1efef7a;
        margin: 0 0;
    }
    .Text h6 {
        font-weight: 600;
        margin-top: 40px;
        align-self: flex-start;
    }
    .Text li {
        font-weight: 600;
        margin-top: 20px;
        text-align: left;
    }
    .login-contain {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 750px;
        height: 600px;
        background-color: #F1EFEF;
        border-radius: 40px;
    }

    .ui-login {
        width: 400px;
        text-align: center;
    }

    .garis {
        margin: 20px 0px 50px 0;
        border: 1px solid rgba(39, 40, 41, 0.863); 
    }
    input {
        border: 1px;
        width: 400px;
        height: 50px;
        padding-left: 10px;
        border-radius: 20px;
    }
    input:focus {
        outline: 2px solid rgba(39, 40, 41, 0.6);
        outline-offset: 2px;
    }
    button {
        cursor: pointer;
        margin: 5px;
        font-family: sans-serif;
        color: white;
        font-weight: bold;
        background-color: #272829;
        border: 0;
        width: 115px;
        height: 50px;
        border-radius: 30px;
        margin-bottom: 30px;
    }
    .register-button {
        margin-top: 40px;
        color: #272829dc;
    }

  </style>
  </head>
  <body>
    <div class="home-login">
        <div class="Text">
            <h1 style="font-size: 80px;">Selamat Datang</h1>
            <h1 style="font-size: 80px;" id="last-text">di Docsku.</h1>
            <p>Terimakasi telah memilih kami untuk membantu anda dalam mengolah data anda.</p>
            <p>Kami siap membantu anda dalam mengolah data anda</p>
            <h6>Kenapa harus Docsku.?</h6>
            <li>Mudah</li>
            <li>Aman</li>
            <li>Cepat</li>
        </div>
        <div class="login-contain">
            <div class="ui-login">
                <h1 style="font-weight: 0100px;">Sign In</h1>
                <div class="garis"></div>
                <form method="POST">
                    <input type="text" name="username" id="username" placeholder="Username" required> <br> <br>
                    <input type="password" name="password" id="password" placeholder="Password" onfocus="showPassword()" onblur="hidePassword()" required> <br> <br>
                    <button type="submit" name="login" id="login" style="margin-top: 30px;">Sign In</button> <br>
                    <?php
                        require 'config.php';

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            if ($username === 'admin' && $password === '123admin') {
                                session_start();
                                $_SESSION['username'] = $username;
                                header('Location: admin.php');
                                exit;
                            }

                            $sql = "SELECT user, katasandi FROM akun WHERE user = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $username);
                            $stmt->execute();
                            $stmt->bind_result($username, $hashed_password);
                            $stmt->fetch();

                            if (password_verify($password, $hashed_password)) {
                                session_start();
                                $_SESSION['username'] = $username;
                                header('Location: home.php');
                                exit;
                            } else {
                                echo "<script>alert('Login gagal, periksa username atau password anda.');</script>";
                            }

                            $stmt->close();
                        }
                    ?>
                </form>
                <a class="register-button" href="register.php" style="padding-top: 50px;">Sign Up</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function showPassword() {
            document.getElementById("password").type = "text";
        }

        function hidePassword() {
            document.getElementById("password").type = "password";
        }
    </script>
  </body>
</html>