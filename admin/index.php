<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.html');
    exit;
}



include 'connect.php';

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
    $sql = "DELETE FROM item WHERE id =$delete_id";
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
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center bg-white p-4 shadow-md rounded-md mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Admin Dashboard</h1>
            <a href="admin_logout.php" class="text-red-500 hover:text-red-700">Logout</a>
        </div>

        <!-- Add New Item Form -->
        <div class="bg-white p-6 shadow-md rounded-md mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Add New Item</h2>
            <form method="POST" action="" class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm text-gray-700">Name:</label>
                    <input type="text" name="name" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Type:</label>
                    <input type="text" name="type" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Socket:</label>
                    <input type="text" name="socket" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">MB Size:</label>
                    <input type="text" name="mb_size" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">DDR:</label>
                    <input type="text" name="ddr" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">RAM Speed:</label>
                    <input type="text" name="ram_speed" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">NVMe Slot:</label>
                    <input type="text" name="nvme_slot" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">RAM Slot:</label>
                    <input type="text" name="ram_slot" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Watt:</label>
                    <input type="text" name="watt" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">SATA:</label>
                    <input type="text" name="sata" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Photo URL:</label>
                    <input type="file" name="photo" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">SSD Type:</label>
                    <input type="text" name="ssd_type" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">SSD Size:</label>
                    <input type="text" name="ssd_size" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div class="flex justify-end">
                    <button type="submit" name="add_item" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Add Item</button>
                </div>
            </form>
        </div>

        <!-- Items List -->
        <div class="bg-white p-6 shadow-md rounded-md">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Items List</h2>
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Type</th>
                        <th class="px-4 py-2 border">Socket</th>
                        <th class="px-4 py-2 border">MB Size</th>
                        <th class="px-4 py-2 border">DDR</th>
                        <th class="px-4 py-2 border">RAM Speed</th>
                        <th class="px-4 py-2 border">NVMe Slot</th>
                        <th class="px-4 py-2 border">RAM Slot</th>
                        <th class="px-4 py-2 border">Watt</th>
                        <th class="px-4 py-2 border">SATA</th>
                        <th class="px-4 py-2 border">Photo</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="px-4 py-2 border"><?= $row['item_id'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['name'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['type'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['socket'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['mb_size'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['ddr'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['ram_speed'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['nvme_slot'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['ram_slot'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['watt'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['sata'] ?></td>
                                <td class="px-4 py-2 border">
                                    <img src="<?= $row['photo'] ?>" alt="photo" class="w-12 h-12 object-cover">
                                </td>
                                <td class="px-4 py-2 border">
                                    <a href="?delete_id=<?= $row['item_id'] ?>" class="text-red-500 hover:text-red-700">Delete</a>
                                    <form method="POST" action="" class="mt-2 grid grid-cols-1 gap-2">
                                        <input type="hidden" name="id" value="<?= $row['item_id'] ?>">
                                        <input type="text" name="name" value="<?= $row['name'] ?>" class="p-1 border rounded">
                                        <input type="text" name="type" value="<?= $row['type'] ?>" class="p-1 border rounded">
                                        <input type="text" name="socket" value="<?= $row['socket'] ?>" class="p-1 border rounded">
                                        <input type="text" name="mb_size" value="<?= $row['mb_size'] ?>" class="p-1 border rounded">
                                        <input type="text" name="ddr" value="<?= $row['ddr'] ?>" class="p-1 border rounded">
                                        <input type="text" name="ram_speed" value="<?= $row['ram_speed'] ?>" class="p-1 border rounded">
                                        <input type="text" name="nvme_slot" value="<?= $row['nvme_slot'] ?>" class="p-1 border rounded">
                                        <input type="text" name="ram_slot" value="<?= $row['ram_slot'] ?>" class="p-1 border rounded">
                                        <input type="text" name="watt" value="<?= $row['watt'] ?>" class="p-1 border rounded">
                                        <input type="text" name="sata" value="<?= $row['sata'] ?>" class="p-1 border rounded">
                                        <input type="text" name="photo" value="<?= $row['photo'] ?>" class="p-1 border rounded">
                                        <button type="submit" name="update_item" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="13" class="px-4 py-2 text-center">No items found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
