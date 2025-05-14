<?php

// Database connection information
$servername = "localhost";
$username = "newroot";
$password = "Password!10";
$dbname = "cariepg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to delete entries older than 2 days
$sql = "DELETE FROM events WHERE ADDTIME(start_time, duration) < DATE_SUB(NOW(), INTERVAL 2 DAY)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Entries older than 2 days deleted successfully.";
} else {
    echo "Error deleting entries: " . $conn->error;
}

// Close the connection
$conn->close();

?>
