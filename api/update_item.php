<?php
include 'db.php';

$id = $_GET['id'];

// Check if the item exists
$result = $conn->query("SELECT * FROM items WHERE id = $id");
if ($result->num_rows == 0) {
    die("Item not found.");
}
$item = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $stock = $_POST['stock'];
    $supplier = $_POST['supplier'];

    // Update query
    $sql = "UPDATE items SET item_name='$item_name', stock='$stock', supplier='$supplier' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php?msg=Item updated successfully!");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Edit Inventory Item</h1>
    <form method="POST" action="">
        <label>Item Name:</label>
        <input type="text" name="item_name" value="<?php echo $item['item_name']; ?>" required>

        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $item['stock']; ?>" required>

        <label>Supplier:</label>
        <input type="text" name="supplier" value="<?php echo $item['supplier']; ?>" required>

        <input type="submit" value="Update Item">
        <a href="../index.php" class="btn">Cancel</a>
    </form>
</div>

</body>
</html>
