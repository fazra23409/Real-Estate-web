<?php
$conn = mysqli_connect("localhost", "root", "", "real_estate2");

if (!$conn) {
    echo "Gagal koneksi";
    exit;
}

$category = $_GET['category'] ?? '';
$min_price = $_GET['min-price'] ?? 0;
$max_price = $_GET['max-price'] ?? 1000000000;

$category = mysqli_real_escape_string($conn, $category);
$min_price = (int)$min_price;
$max_price = (int)$max_price;

$query = "SELECT * FROM properties WHERE price >= $min_price AND price <= $max_price";

if ($category != '') {
    $query .= " AND LOWER(category) = LOWER('$category')";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hasil Pencarian Properti</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: "poppins", sans-serif;
      padding: 40px;
      background: #f9f9f9;
    }
    h2 {
      margin-bottom: 20px;
    }
    .properties-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
    }
    .property-card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 12px;
      overflow: hidden;
      width: 280px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      transition: 0.3s;
    }
    .property-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    .property-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .property-card .info {
      padding: 15px;
    }
    .property-card h3 {
      margin: 0 0 10px;
      font-size: 18px;
    }
    .property-card p {
      margin: 5px 0;
      color: #555;
    }
  </style>
</head>
<body>

<h2>Temukan properti tipe <?= $category ?> antara Rp <?= $min_price ?> - Rp <?= $max_price ?></h2>

<div class="properties-wrapper">
<?php
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imagePath = 'images/' . $row['image'];

        echo "<div class='property-card'>
                <img src='$imagePath'>
                <div class='info'>
                  <h3>" . $row['property_name'] . "</h3>
                  <p>Tipe: " . $row['category'] . "</p>
                  <p>Harga: Rp " . $row['price'] . "</p>
                </div>
              </div>";
    }
} else {
    echo "Tidak ada properti.";
}
?>
</div>


</body>
</html>

<?php
mysqli_close($conn);
?>
