<?php
include 'php/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    
    if ($action == 'add') {
        $name = $_POST['name'];
        $category_id = $_POST['category'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        $sql = "INSERT INTO products (name, category_id, description, price, image) VALUES ('$name', $category_id, '$description', $price, '$image')";
        $conn->query($sql);
        header('Location: admin.php');

    } elseif ($action == 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category_id = $_POST['category'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        $sql = "UPDATE products SET name='$name', category_id=$category_id, description='$description', price=$price, image='$image' WHERE id=$id";
        $conn->query($sql);

    } elseif ($action == 'delete') {
        $id = $_POST['id'];

        $sql = "DELETE FROM products WHERE id=$id";
        $conn->query($sql);
    }
}
$conn->close();
?>
