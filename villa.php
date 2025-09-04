<?php
include 'connection.php';

$query = "SELECT * FROM properties WHERE category = 'villa_rent'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Villa List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            padding: 30px;
        }
        .card {
            width: 300px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            overflow: hidden;
            position: relative;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .info {
            padding: 15px;
        }
        h3 {
            font-size: 16px;
            margin: 0 0 10px;
            color: black;
        }
        .icon-text {
            font-size: 14px;
            margin-right: 10px;
        }
        .icon-text i {
            margin-left: 5px;
            color: gray;
        }
        .price {
            font-weight: bold;
            color: green;
            margin-top: 10px;
        }
        .detail-button {
            display: inline-block;
            background: white;
            color: maroon;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
        }
        .detail-button:hover {
            background: #ffcccc;
        }
        .status-booked {
            position: absolute;
            top: 10px;
            left: 10px;
            background: red;
            color: white;
            padding: 5px 10px;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
        <?php while($villa_rent = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
            <?php if ($villa_rent['status'] == 'booked') { ?>
        <div class="status-booked">booked</div>
    <?php } ?>

    <?php if ($villa_rent['image'] != '') { ?>
        <img src="images/<?php echo $villa_rent['image']; ?>" alt="Villa Image">
    <?php } else { ?>
        <img src="default.jpg" alt="Villa Default">
    <?php } ?>
            <div class="info">
                <h3><?php echo $villa_rent['property_name']; ?></h3>
                <p><?php echo $villa_rent['description']; ?></p>
                <div class="price">
                    <i class="bi bi-cash"></i> IDR <?php echo number_format($villa_rent['price'], 0, ',', '.'); ?>
                </div>
                <?php if ($villa_rent['status'] != 'booked') { ?>
                    <a href="vrdetail.php?property_id=<?php echo $villa_rent['property_id']; ?>" class="detail-button">Lihat Detail</a>
                <?php } else { ?>
                    <span style="color: gray;">Tidak tersedia</span>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>
