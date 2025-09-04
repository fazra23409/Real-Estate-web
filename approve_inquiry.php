<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    

    $conn = new mysqli("localhost", "root", "", "real_estate2");
    if (!$conn->connect_error) {
        $sql = "UPDATE inquiries SET status = 'berhasil' WHERE id_inquiry = $id";
        if ($conn->query($sql) === TRUE) {
            header("Location: admin_dashboard.php");
            exit;
        } else {
            echo "Gagal menyetujui inquiry.";
        }

        $conn->close();
    } else {
        echo "Koneksi gagal.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
