<?php 
include 'php/connection.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
</head>
<body>
    <h1>Product Management</h1>
    <form action="product_actions.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="category">Category:</label><br>
        <select id="category" name="category">
            <?php
            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <input type="submit" value="Add Product">
    </form>

    <h2>Update or Delete a Product</h2>
    <form action="product_actions.php" method="post">
        <input type="hidden" name="action" value="update">
        <label for="id">Product ID:</label><br>
        <input type="text" id="id" name="id"><br><br>
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="category">Category:</label><br>
        <select id="category" name="category">
            <?php
            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br><br>
        <label for="image">Image:</label><br>
        <input type="text" id="image" name="image"><br><br>
        <input type="submit" value="Update Product">
    </form>

    <form action="product_actions.php" method="post">
        <input type="hidden" name="action" value="delete">
        <label for="id">Product ID to Delete:</label><br>
        <input type="text" id="id" name="id"><br><br>
        <input type="submit" value="Delete Product">
    </form>
</body>
</html>
