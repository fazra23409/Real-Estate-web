<?php
session_start();

if (!isset($_SESSION['users'])) {
    echo "Kamu harus login dulu.";
    exit;
}

$nama_pembeli = $_SESSION['users']['username'];
$email = $_SESSION['users']['email'];

if (isset($_SESSION['users']['phone'])) {
    $phone = $_SESSION['users']['phone'];
} else {
    $phone = "";
}
$id_property = 0;
if (isset($_POST['id_property'])) {
    $id_property = (int) $_POST['id_property'];
} else if (isset($_GET['id_property'])) {
    $id_property = (int) $_GET['id_property'];
} else {
    echo "ID properti tidak ditemukan.";
    exit;
}

if ($id_property <= 0) {
    echo "ID properti tidak valid.";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "real_estate2");

if (!$conn) {
    echo "Gagal koneksi ke database.";
    exit;
}

$property_name = "";
$kategori = "";

$sql = "SELECT property_name, category FROM properties WHERE property_id = $id_property";
$hasil = mysqli_query($conn, $sql);

if ($baris = mysqli_fetch_assoc($hasil)) {
    $property_name = $baris['property_name'];
    $kategori = $baris['category'];
} else {
    echo "Properti tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $phone = $_POST['phone'];
    $_SESSION['users']['phone'] = $phone;

    $sql = "INSERT INTO inquiries (nama_pembeli, email, phone, id_property)
            VALUES ('$nama_pembeli', '$email', '$phone', $id_property)";

    $hasil = mysqli_query($conn, $sql);

    if ($hasil) {
        $id_baru = mysqli_insert_id($conn);
    if ($kategori === 'villa_rent') {
        mysqli_query($conn, "UPDATE properties SET status = 'booked' WHERE property_id = $id_property");
    } else {
        mysqli_query($conn, "UPDATE properties SET status = 'sold' WHERE property_id = $id_property");
    }


        header("Location: thank_you.php?id=$id_baru");
        exit;
    } else {
        echo "Gagal menyimpan data inquiry.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Inquiry</title>
</head>
<body>

<h2>Form Inquiry <?php echo $kategori; ?>: <?php echo $property_name; ?></h2>

<form action="inquiry_form.php?id_property=<?php echo $id_property; ?>" method="POST">
    <input type="hidden" name="id_property" value="<?php echo $id_property; ?>">

    <p>Nama:</p>
    <input type="text" name="nama" value="<?php echo $nama_pembeli; ?>" readonly>

    <p>Email:</p>
    <input type="email" name="email" value="<?php echo $email; ?>" readonly>

    <p>Nomor Telepon:</p>
    <input type="text" name="phone" value="<?php echo $phone; ?>" required>

    <br><br>
    <button type="submit">Kirim Inquiry</button>
</form>

</body>
</html>
