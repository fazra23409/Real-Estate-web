<?php
$conn = new mysqli("localhost", "root", "", "real_estate2");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 
// klo gagal connect bakal ada tampilan eror

$sql = "
SELECT 
    i.id_inquiry,
    i.nama_pembeli,
    v.property_name,
    i.created_at,
    i.status
FROM inquiries i
LEFT JOIN properties v ON i.id_property = v.property_id
ORDER BY i.created_at DESC
";

// ambil data dr tabel inquiries gabungin properties
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <style>
     <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f9f9f9;
    }

    h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        /* garis border nya digabungin jd satu */
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #8E1616;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    /* buat ngasih warna bg ke table, baris genap */
    /* even itu genap */

    tr:hover {
        background-color: #e9f5ff;
    }

    a {
        color: #8E1616;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

    </style>
</head>
<body>
    <h2>Semua Inquiry</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pembeli</th>
                <th>Villa</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <!-- fetch assoc fungsi php buat ngambil 1 baris data dan hasilnya aray asosiatif -->
                    <tr>
                        <td><?php echo $row['id_inquiry']; ?></td>
                        <td><?php echo $row['nama_pembeli']; ?></td>
                        <td><?php echo $row['property_name']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <?php if ($row['status'] == 'menunggu'): ?>
                                <a href="approve_inquiry.php?id=<?php echo $row['id_inquiry']; ?>">Approve</a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6">Belum ada data.</td></tr>
                    <!-- biar tabel ga kosong melompong colspan 6 bakal nutupin data yang kosong melebar smpe 6 kolom-->
            <?php endif; ?>

        </tbody>
    </table>
</body>
</html>
<?php
$conn->close();
?>
