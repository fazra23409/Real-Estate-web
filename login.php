<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password harus diisi!'); window.location='login.php';</script>";
        exit();
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 0) {
        echo "<script>alert('Akun tidak ditemukan! Silakan register terlebih dahulu.'); window.location='register.php';</script>";
        exit();
    }

    $user = mysqli_fetch_assoc($result);

    if ($password === $user['password']) {
        session_regenerate_id(true);
        $_SESSION['users'] = $user;
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }
}

if (isset($_SESSION['logout_success'])) {
    echo "<script>alert('" . $_SESSION['logout_success'] . "');</script>";
    unset($_SESSION['logout_success']);
}
?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Document</title>
        <style>
      
      * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transform: scale(1);
            transition: all 0.3s ease;
        }

        .login-container:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color:#8E1616; 
        }

        .login-form label {
            margin-top: 15px;
            display: block;
            color: #000;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 1rem;
            color: #333;
        }
        .login-form i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #8E1616;
            font-size: 18px;
        }

        .login-form input:focus {
            border-color: #32cd32; 
            box-shadow: 0 4px 8px rgba(50, 205, 50, 0.1);
        }

        .login-form button {
            width: 100%;
            padding: 14px;
            margin-top: 25px;
            background: linear-gradient(90deg, #C00000 0%, #8E1616 100%);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .login-form button:hover {
            background: linear-gradient(90deg, #8E1616 0%, #C00000 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .login-form .additional-info {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }

        .login-form .additional-info a {
            color: #3D0301; 
            text-decoration: none;
            font-weight: bold;
        }

        .login-form .additional-info a:hover {
            text-decoration: underline;
        }
    </style>
    </head>
    <body>
    <div class="login-container">
    <h2>Form Login</h2>
    <!-- untuk memvalidasi. user uudh pernh login atau blm -->
    <form class="login-form" action="login.php" method="POST" onsubmit="return validateForm()"> 
    <input type="text" id="username" name="username" placeholder="Masukkan username anda...">
    <br>
    <input type="password" id="password" name="password" placeholder="Masukkan password anda...">
    <button type="submit">Login Here</button> 
    
    <div class="additional-info">
        Dont Have an Account? <a href="register.php">Register</a>
    </div>
</form>

           
</div>
<script>
   
//    untuk memvalidasi data user. apakah user sudah mengisi semua kolom atau belum. kalau belum, user akan mendapat alert pop-up
   function validateForm() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === "" || password === "") {
        alert("Mohon isi semua kolom sebelum login.");
        return false; 
    }
    return true; 
}

</script>
    </body>
    </html>
    

