<?php
if (!$_GET['id']) {
  echo "Akses tidak sah.";
  exit;
}

$id = (int) $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "real_estate2");

if (!$conn) {
  echo "Gagal koneksi ke database.";
  exit;
}

$sql = "SELECT v.property_name, i.nama_pembeli, i.status, i.created_at
        FROM inquiries i
        LEFT JOIN properties v ON i.id_property = v.property_id
        WHERE i.id_inquiry = $id";

$hasil = mysqli_query($conn, $sql);

if ($baris = mysqli_fetch_assoc($hasil)) {
  $property = $baris['property_name'];
  $nama = $baris['nama_pembeli'];
  $status = $baris['status'];
  $waktu = $baris['created_at'];
} else {
  echo "Inquiry tidak ditemukan.";
  exit;
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
body {
  font-family: "poppins", sans-serif;
  background-color: #f9f9f9;
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h2 {
  font-size: 28px;
  color: #333;
  margin-bottom: 20px;
}

p {
  font-size: 16px;
  color: #555;
  margin-bottom: 10px;
}

strong {
  color: #333;
}

.status-menunggu {
  color: #e67e22; 
  font-weight: bold;
}

.status-berhasil {
  color: #27ae60; 
  font-weight: bold;
}

a {
  color: #800000;
  text-decoration: none;
  font-weight: bold;
}

a:hover {
  text-decoration: underline;
}
h3 {
  font-size: 20px;
  color: #333;
  margin-top: 20px;
  border-bottom: 2px solid #ddd;
  padding-bottom: 10px;
}

p a {
  padding: 10px 20px;
  background-color: #800000;
  color: white;
  border-radius: 5px;
  text-decoration: none;
  font-size: 16px;
  display: inline-block;
  transition: background-color 0.3s ease;
}

p a:hover {
  background-color: #800000;
}

  h2 {
    font-size: 24px;
  }

  p {
    font-size: 14px;
  }

  p a {
    padding: 8px 16px;
    font-size: 14px;
  }
  </style>
</head>
<body>
  <h2>Detail Inquiry</h2>
  <p><b>ID:</b> <?php echo $id; ?></p>
  <p><b>Property:</b> <?php echo $property; ?></p>
  <p><b>Nama Anda:</b> <?php echo $nama; ?></p>
  <p><b>Waktu:</b> <?php echo $waktu; ?></p>
  <p><b>Status:</b>
    <?php
    if ($status == 'menunggu') {
        echo "Menunggu persetujuan Admin";
    } else {
        echo "Disetujui Admin";
    }
    ?>
</p>

<?php
if ($status == 'menunggu') {
    echo "<h3>Instruksi Pembayaran</h3>";
    echo "<p>Silakan transfer ke …</p>";
} else {
    echo '<p><a href="receipt.php?id_inquiry=' . $id . '">View Receipt</a></p>';
}
?>
<p><a href="home.php">Kembali ke Beranda</a></p>

</body>
</html>