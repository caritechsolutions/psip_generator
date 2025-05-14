<?php
// Connect to your database
$host = 'localhost';
$db = 'cariepg';
$user = 'newroot';
$pass = 'Password!10';

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Fetch events data from the database
$stmt = $conn->query('SELECT * FROM events');
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>