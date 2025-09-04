<?php
if (!$_GET['id']) {
  echo "Akses tidak valid.";
  exit;
}

$id = (int) $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Terima Kasih</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<h1>Terima Kasih!</h1>
<p>Inquiry kamu sudah dikirim.</p>
<p><a href="user_dashboard.php?id=<?php echo $id; ?>">Lihat Status Inquiry</a></p>

<script>
  alert("Inquiry terkirim! Silakan tunggu persetujuan Admin.");

  window.location.href = "user_dashboard.php?id=<?php echo $id; ?>";
</script>

</body>
</html>
