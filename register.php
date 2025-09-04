<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number= $_POST['phone_number'];
    $password = $_POST['password'];
    $created_at = date('Y-m-d H:i:s'); 

    $sql = "INSERT INTO users (username, email, phone_number, password, created_at) 
            VALUES ('$username', '$email', '$phone_number', '$password', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;

        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;

        echo "<script>alert('Registrasi berhasil! Selamat datang, $username'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
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

        .register-container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transform: scale(1);
            transition: all 0.3s ease;
        }

        .register-container:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color:#8E1616; 
        }

        .register-form label {
            margin-top: 15px;
            display: block;
            color: #000;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .register-form input {
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
        .register-form i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #8E1616;
            font-size: 18px;
        }

        .register-form input:focus {
            border-color: #32cd32; 
            box-shadow: 0 4px 8px rgba(50, 205, 50, 0.1);
        }

        .register-form button {
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

        .register-form button:hover {
            background: linear-gradient(90deg, #8E1616 0%, #C00000 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .register-form .additional-info {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }

        .register-form .additional-info a {
            color: #3D0301; 
            text-decoration: none;
            font-weight: bold;
        }

        .register-form .additional-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Daftar Akun</h2>
        <form class="register-form" name="registerForm" action="" method="POST" >
            <label>Nama</label>
            <input type="text" name="username" required placeholder="Masukkan nama Anda" >

            <label>Email</label>
            <input type="email" name="email" required placeholder="Masukkan email">

            <label>Nomor HP</label>
            <input type="number" name="phone_number" required placeholder="Contoh: 08123456789">

            <label>Password</label>
            <input type="password" name="password" required placeholder="Buat password">

            <button type="submit">Daftar</button>

            <div class="info-tambahan">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </div>
        </form>
    </div>
</body>
</html>
