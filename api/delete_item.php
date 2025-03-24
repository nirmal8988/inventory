<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM items WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
