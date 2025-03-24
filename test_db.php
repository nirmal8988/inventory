<?php
include 'api/db.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database connection successful!";
}
?>
