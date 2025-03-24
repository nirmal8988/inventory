<?php
include 'api/db.php';

// Check for connection errors
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch Items
$result = $conn->query("SELECT * FROM items");

// Check if query returns an error
if (!$result) {
    die("Error fetching items: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>📦 Inventory Management System</h1>

    <div class="center">
        <a href="api/add_item.php" class="add-btn">➕ Add New Item</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>🔢 ID</th>
                <th>📦 Item Name</th>
                <th>📊 Stock</th>
                <th>🏢 Supplier</th>
                <th>⚙️ Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['item_name']."</td>
                            <td>".$row['stock']."</td>
                            <td>".$row['supplier']."</td>
                            <td>
                                <a class='action-link edit' href='api/update_item.php?id=".$row['id']."'>✏️ Edit</a>
                                <a class='action-link delete' href='api/delete_item.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>❌ Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='no-data'>No items found!</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="footer">
        © 2025 Inventory Management System. All Rights Reserved.
    </div>
</div>

</body>
</html>
