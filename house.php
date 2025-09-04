<?php
include 'connection.php';

$query = "SELECT * FROM properties WHERE category = 'house'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    padding: 30px;
}

.card {
    background: white;
    width: 300px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
    margin: 0;
    color: #008000;
}

.details {
    display: flex;
    justify-content: space-between;
    margin: 10px;
    align-items: right;
    text-align: right;
   
}

.price {
    font-weight: bold;
    color: green;
}

.idr {
    color: #008000;
}

.usd {
    color: #008000;
}

.special-offer .ribbon {
    position: absolute;
    top: 25px;
    right: -30px;
    background: red;
    color: white;
    padding: 5px 15px;
    transform: rotate(38deg);
}
footer {
    background-color: #800000; 
    color: white;
    padding: 40px 0;
    font-family: "poppins", sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    max-width: 1100px;
    margin: auto;
    padding: 0 20px;
}

.footer-column {
    width: 30%;
}

.footer-column h3 {
    font-size: 20px;
    margin-bottom: 10px;
    text-align: left;
}

.footer-column p, .footer-column ul {
    font-size: 17px;
    line-height: 1.6;
    text-align: left;
}

.footer-column ul {
    list-style: none;
    padding: 0;
}

.footer-column ul li {
    margin-bottom: 8px;
    text-align: left;
}

.subscribe-form {
    display: flex;
    margin-top: 10px;
}

.subscribe-form input {
    flex: 1;
    padding: 8px;
    border: none;
    border-radius: 4px 0 0 4px;
}

.subscribe-form button {
    background-color: #800000;
    color: white;
    border: none;
    padding: 8px 15px;
    cursor: pointer;
    border-radius: 0 4px 4px 0;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

.subscribe-form button:hover {
    background-color: #E52020;
}

/* Footer Bottom */
.footer-bottom {
    text-align: center;
    margin-top: 30px;
    padding-top: 10px;
    border-top: 1px solid #005500;
}

.social-icons {
    margin-top: 10px;
}

.social-icons i {
    font-size: 20px;
    margin: 0 10px;
    cursor: pointer;
}
.icon-text {
    display: inline-flex;
    align-items: center;
    color: black;
    font-size: 15px;
    font-weight: normal;
    margin-right: 10px; 
}

.icon-text i {
    margin-left: 5px;
    color: #B2B2B2; 
    font-size: 15px;
}
.info {
    padding-top: 10px;
}
h3 {
    display: flex;
    align-items: center;
    gap: 45px; 
    font-weight: bold;
    font-size: 15px;
    color: black;
}
.detail-button {
        display: inline-block;
        background-color: white;
        color: #800000;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 15px;
    }
    .detail-button:hover{
        background-color: #ffcccc;
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
        <?php while($house = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
            <?php if ($house['status'] == 'sold') { ?>
        <div class="status-booked">SOLD</div>
    <?php } ?>

    <?php if ($house['image'] != '') { ?>
        <img src="images/<?php echo $house['image']; ?>" alt="House Image">
    <?php } else { ?>
        <img src="default.jpg" alt="House Default">
    <?php } ?>
            <div class="info">
                <h3><?php echo $house['property_name']; ?></h3>
                <div>
                    <span class="icon-text">1 <i class="fas fa-bed"></i></span>
                    <span class="icon-text">2 <i class="fas fa-bath"></i></span>
                    <span class="icon-text">Yes <i class="fas fa-person-swimming"></i></span>
                </div>
                <p><?php echo $house['description']; ?></p>
                <div class="price">
                    <i class="bi bi-cash"></i> IDR <?php echo number_format($house['price'], 0, ',', '.'); ?>
                </div>
                <?php if ($house['status'] != 'sold') { ?>
                    <a href="hs_detail.php?property_id=<?php echo $house['property_id']; ?>" class="detail-button">Lihat Detail</a>
                <?php } else { ?>
                    <span style="color: gray;">Tidak tersedia</span>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>