<?php

include 'php/connection.php';

// Insert Item
if (isset($_POST['add_item'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $socket = $_POST['socket'];
    $mb_size = $_POST['mb_size'];
    $ddr = $_POST['ddr'];
    $ram_speed = $_POST['ram_speed'];
    $nvme_slot = $_POST['nvme_slot'];
    $ram_slot = $_POST['ram_slot'];
    $watt = $_POST['watt'];
    $sata = $_POST['sata'];
    $photo = $_POST['photo'];
    $ssd_type = $_POST['ssd_type'];
    $ssd_size = $_POST['ssd_size'];

    $sql = "INSERT INTO item (name, type, socket, mb_size, ddr, ram_speed, nvme_slot, ram_slot, watt, sata, photo, ssd_type, ssd_size) 
            VALUES ('$name', '$type', '$socket', '$mb_size', '$ddr', '$ram_speed', '$nvme_slot', '$ram_slot', '$watt', '$sata', '$photo', '$ssd_type', '$ssd_size')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Item
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM item WHERE id=$delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Update Item
if (isset($_POST['update_item'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $socket = $_POST['socket'];
    $mb_size = $_POST['mb_size'];
    $ddr = $_POST['ddr'];
    $ram_speed = $_POST['ram_speed'];
    $nvme_slot = $_POST['nvme_slot'];
    $ram_slot = $_POST['ram_slot'];
    $watt = $_POST['watt'];
    $sata = $_POST['sata'];
    $photo = $_POST['photo'];
    $ssd_type = $_POST['ssd_type'];
    $ssd_size = $_POST['ssd_size'];

    $sql = "UPDATE item SET name='$name', type='$type', socket='$socket', mb_size='$mb_size', ddr='$ddr', ram_speed='$ram_speed', 
            nvme_slot='$nvme_slot', ram_slot='$ram_slot', watt='$watt', sata='$sata', photo='$photo', ssd_type='$ssd_type', ssd_size='$ssd_size' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve Items
$sql = "SELECT * FROM item";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Components CRUD</title>
</head>
<body>

<h2>Add New Item</h2>
<form method="POST" action="">
    Name: <input type="text" name="name"><br><br>
    Type: <input type="text" name="type"><br> <br>
    Socket: <input type="text" name="socket"><br> <br>
    MB Size: <input type="text" name="mb_size"><br> <br>
    DDR: <input type="text" name="ddr"><br> <br>
    RAM Speed: <input type="text" name="ram_speed"><br> <br>
    NVMe Slot: <input type="text" name="nvme_slot"><br> <br>
    RAM Slot: <input type="text" name="ram_slot"><br> <br>
    Watt: <input type="text" name="watt"><br> <br>
    SATA: <input type="text" name="sata"><br> <br>
    Photo URL: <input type="text" name="photo"><br> <br>
    ssd type : <input type="text" name="ssd_type"><br> <br>
    ssd size: <input type="text" name="ssd_size"><br> <br>
    <input type="submit" name="add_item" value="Add Item" > <br> <br>
</form>

<h2>Items List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Socket</th>
        <th>MB Size</th>
        <th>DDR</th>
        <th>RAM Speed</th>
        <th>NVMe Slot</th>
        <th>RAM Slot</th>
        <th>Watt</th>
        <th>SATA</th>
        <th>Photo</th>
        <th>Actions</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['item_id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['type'] ?></td>
                <td><?= $row['socket'] ?></td>
                <td><?= $row['mb_size'] ?></td>
                <td><?= $row['ddr'] ?></td>
                <td><?= $row['ram_speed'] ?></td>
                <td><?= $row['nvme_slot'] ?></td>
                <td><?= $row['ram_slot'] ?></td>
                <td><?= $row['watt'] ?></td>
                <td><?= $row['sata'] ?></td>
                <td><img src="<?= $row['photo'] ?>" alt="photo" width="50"></td>
                <td>
                    <a href="?delete_id=<?= $row['item_id'] ?>">Delete</a>
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?= $row['item_id'] ?>">
                        Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
                        Type: <input type="text" name="type" value="<?= $row['type'] ?>"><br>
                        Socket: <input type="text" name="socket" value="<?= $row['socket'] ?>"><br>
                        MB Size: <input type="text" name="mb_size" value="<?= $row['mb_size'] ?>"><br>
                        DDR: <input type="text" name="ddr" value="<?= $row['ddr'] ?>"><br>
                        RAM Speed: <input type="text" name="ram_speed" value="<?= $row['ram_speed'] ?>"><br>
                        NVMe Slot: <input type="text" name="nvme_slot" value="<?= $row['nvme_slot'] ?>"><br>
                        RAM Slot: <input type="text" name="ram_slot" value="<?= $row['ram_slot'] ?>"><br>
                        Watt: <input type="text" name="watt" value="<?= $row['watt'] ?>"><br>
                        SATA: <input type="text" name="sata" value="<?= $row['sata'] ?>"><br>
                        Photo URL: <input type="text" name="photo" value="<?= $row['photo'] ?>"><br>
                        <input type="submit" name="update_item" value="Update Item">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="13">No items found</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
