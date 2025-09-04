<?php
session_start();
include("connection.php");

$user = [
    'username' => 'Guest',
    'email' => '',
    'phone' => '',
    'created_at' => ''
];

if (isset($_SESSION['users'])) {
    $user = $_SESSION['users'];
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .kotak-profil {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }

        .kotak-profil img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
        }

        p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        button {
            background: #8E1616;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin: 5px;
        }

        button:hover {
            background: #C00000;
        }

        .logout {
            background: #b30000;
        }

        .logout:hover {
            background: #800000;
        }
    </style>
</head>
<body>

<div class="kotak-profil">
    <img src="images/mario.png" alt="Foto Profil">
    <h2>Halo, <?php echo $user['username']; ?>!</h2>
    <p><b>Email:</b> <?php echo $user['email'] ?: '-'; ?></p>
    <p><b>HP:</b> <?php echo $user['phone_number'] ?: '-'; ?></p>
    <p><b>Bergabung:</b> <?php echo $user['created_at'] ?: '-'; ?></p>

    <br>
    <a href="edit_profile.php"><button>Edit Profil</button></a>
    <a href="home.php"><button>Home</button></a>
    <a href="form_logout.php" onclick="return confirm('yakin mau logout?');">
        <button class="logout">Logout</button>
    </a>
    <!-- js jalan klo user klik link logout. confirm() bakal ngasih popup/alert -->
</div>

</body>
</html>
