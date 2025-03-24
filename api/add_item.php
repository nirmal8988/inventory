<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $stock = $_POST['stock'];
    $supplier = $_POST['supplier'];

    $sql = "INSERT INTO items (item_name, stock, supplier) VALUES ('$item_name', '$stock', '$supplier')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php?msg=Item added successfully!");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Item</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Add New Inventory Item</h1>
    <form method="POST" action="">
        <label>Item Name:</label>
        <input type="text" name="item_name" required>

        <label>Stock:</label>
        <input type="number" name="stock" required>

        <label>Supplier:</label>
        <input type="text" name="supplier" required>

        <input type="submit" value="Add Item">
        <a href="../index.php" class="btn">Cancel</a>
    </form>
</div>

</body>
</html>
