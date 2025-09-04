<?php
$conn = new mysqli("localhost", "root", "", "real_estate2");
$email = $_POST['email'];
$username = $_POST['username'];
$message = $_POST['message'];

$conn->query("INSERT INTO contact_messages (email, username, message) VALUES ('$email', '$username', '$message')");
header("Location: thank_you.html");
?>