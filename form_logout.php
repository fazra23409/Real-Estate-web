<?php
session_start();
$_SESSION['logout_success'] = "Anda berhasil logout."; 

session_destroy(); 
header("Location: login.php"); 
exit();
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Logout</title>
    <style>
        body {
            font-family: "poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <form id="logoutForm" action="home2.php" method="POST">
        <button type="submit">Logout</button>
    </form>

    <script>
        // get element by id itu, sistem ngambil data user dari id di database. 
        // addEvent dijalankan pas form dikirim
        document.getElementById('logoutForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            if (confirm('Apakah Anda yakin ingin logout?')) {
                this.submit();
            }
        });
    </script>
</body>
</html>

 