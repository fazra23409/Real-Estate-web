<?php
session_start();
include('connection.php');

$inquiry = null;

if (isset($_GET['id_inquiry']) && is_numeric($_GET['id_inquiry'])) {
    $id_inquiry = $_GET['id_inquiry'];

    $query = "SELECT i.*, v.property_name, v.price
              FROM inquiries i
              LEFT JOIN properties v ON i.id_property = v.property_id
              WHERE i.id_inquiry = $id_inquiry";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $inquiry = mysqli_fetch_assoc($result);
        $inquiry['property_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt Inquiry #<?php echo $inquiry ? $inquiry['id_inquiry'] : ''; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #800000;
            margin-bottom: 30px;
        }

        p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }

        strong {
            color: #555;
        }

        .receipt-info {
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .status-menunggu {
            color: #e67e22; 
            font-weight: bold;
        }

        .status-berhasil {
            color: #27ae60; 
            font-weight: bold;
        }

        .print-button {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 12px;
            background-color: #800000;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .print-button:hover {
            background-color: #a00000;
        }
            p {
                font-size: 14px;
            }

            .print-button {
                width: 100%;
                font-size: 14px;
            }
            button{
                 display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 12px;
            background-color: #800000;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
            }
    </style>
</head>
<body>

<div class="container">
    <h2>Receipt</h2>

  <?php if ($inquiry): ?>
    <div>
        <p><b>Inquiry ID:</b> <?php echo $inquiry['id_inquiry']; ?></p>
        <p><b>Property:</b> <?php echo $inquiry['property_name']; ?></p>
        <p><b>Price:</b> <?php echo $inquiry['price']; ?></p>
        <p><b>Name:</b> <?php echo $inquiry['nama_pembeli']; ?></p>
        <p><b>Email:</b> <?php echo $inquiry['email']; ?></p>
        <p><b>Status:</b> 
        <?php
            if ($inquiry['status'] == 'menunggu') {
                echo "Menunggu persetujuan Admin";
            } else {
                echo "Disetujui Admin";
            }
            ?>
        </p>
        <p><b>Date:</b> <?php echo $inquiry['created_at']; ?></p>
    </div>
        <button onclick="window.print()">Print</button>
        <?php else: ?>
            <p>Data inquiry tidak ditemukan.</p>
        <?php endif; ?>

</div>

</body>
</html>
