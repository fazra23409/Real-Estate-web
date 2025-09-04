<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['users'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['users'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $passwordInput = trim($_POST['password']);

    if (!empty($passwordInput)) {
        $query = "UPDATE users SET username = '$username', email = '$email', password = '$passwordInput' WHERE username = '{$user['username']}'";
    } else {
        $query = "UPDATE users SET username = '$username', email = '$email' WHERE username = '{$user['username']}'";
    }

    if (mysqli_query($conn, $query)) {
        $_SESSION['users']['username'] = $username;
        $_SESSION['users']['email'] = $email;

        echo "<script>alert('Profil berhasil diperbarui!'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui profil.');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .edit-profile-container {
            max-width: 400px;
            width: 90%;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border 0.3s;
        }

        input:focus {
            border-color: #8E1616;
            outline: none;
        }

        button {
            width: 100%;
            background: #8E1616;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #C00000;
        }

        .additional-info {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }

        .additional-info a {
            color: #8E1616;
            text-decoration: none;
            font-weight: 600;
        }

        .additional-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="edit-profile-container">
  <h2>Edit Profil</h2>
    <form action="" method="POST">
        <label>Nama Pengguna</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label>Password Baru (opsional)</label>
        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin ganti">

        <button type="submit">Perbarui Profil</button>
    </form>
</div>

</body>
</html>
