 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>EZPC</title>
     <link rel="icon" type="image/x-icon" href="/img/icon1.png">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
     <link rel="stylesheet" href="style.css">
 </head>

 <body>
     <?php include 'nav.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rem"])) {
            $C_id = $_POST['C_id'];
            $sql_delete = "DELETE FROM cart WHERE uid=$UID AND C_id=$C_id";
            if (!$conn->query($sql_delete)) {
                echo "<script>alert('Error deleting data')</script>";
            }
            //  header("Location: cart.php");
            // exit();
        }
        function checkCompatibility($cartItems)
{
    $flags = [
        'cpu' => false,
        'motherboard' => false,
        'ram' => false,
        'case' => false,
        'psu' => false
    ];

    $errors = [];

    // Example check: CPU and Motherboard Socket Compatibility
    $cpu = null;
    $motherboard = null;
    $ram = null;
    $case = null;
    $psu = null;

    foreach ($cartItems as $item) {
        if ($item['type'] == 'cpu') {
            $cpu = $item;
        } elseif ($item['type'] == 'motherboard') {
            $motherboard = $item;
        } elseif ($item['type'] == 'ram') {
            $ram = $item;
        } elseif ($item['type'] == 'case') {
            $case = $item;
        } elseif ($item['type'] == 'psu') {
            $psu = $item;
        }
    }

    // Check CPU and motherboard compatibility
    if ($cpu && $motherboard) {
        if ($cpu['socket'] !== $motherboard['socket']) {
            $errors[] = "CPU socket {$cpu['socket']} is not compatible with motherboard socket {$motherboard['socket']}.";
            $flags['cpu'] = true;
            $flags['motherboard'] = true;
        }
    }

    // Check RAM and motherboard compatibility
    if ($motherboard && $ram) {
        if ($motherboard['ddr'] !== $ram['ddr']) {
            $errors[] = "Motherboard DDR type {$motherboard['ddr']} is not compatible with RAM DDR type {$ram['ddr']}.";
            $flags['motherboard'] = true;
            $flags['ram'] = true;
        }
    }

    // Check case and motherboard size compatibility
    if ($motherboard && $case) {
        if ($motherboard['mb_size'] !== $case['mb_size']) {
            $errors[] = "Motherboard MB size {$motherboard['mb_size']} is not compatible with case size {$case['mb_size']}.";
            $flags['motherboard'] = true;
            $flags['case'] = true;
        }
    }

    // Add more checks as needed

    return ['flags' => $flags, 'errors' => $errors];
}

        // Example usage


        ?>


     <section id="page-header" class="about-header">
         <h2>#let's_talk</h2>
         <p>LEAVE A MESSAGE, We love to hear from you!</p>
     </section>

     <section id="cart" class="section-p1">
         <table width="100%">
             <thead>
                 <tr>
                     <td>Remove</td>
                     <td>Image</td>
                     <td>Product</td>
                     <td>Shop</td>
                 </tr>
             </thead>
             <?php
                $sql = "SELECT c.C_id, i.*  FROM cart c  JOIN item i ON c.item_id = i.item_id  WHERE c.uid = '$UID'";

                $result = $conn->query($sql);

                ?>
<tbody>
    <?php if ($result->num_rows > 0):
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $compatibilityCheck = checkCompatibility($rows);
        $compatibilityFlags = $compatibilityCheck['flags'];
        $compatibilityErrors = $compatibilityCheck['errors'];

        foreach ($rows as $row):
            // Add class based on the compatibility flag for this item type
            $rowClass = '';
            if ($row['type'] == 'cpu' && $compatibilityFlags['cpu']) {
                $rowClass = 'error-row';
            } elseif ($row['type'] == 'motherboard' && $compatibilityFlags['motherboard']) {
                $rowClass = 'error-row';
            } elseif ($row['type'] == 'ram' && $compatibilityFlags['ram']) {
                $rowClass = 'error-row';
            } elseif ($row['type'] == 'case' && $compatibilityFlags['case']) {
                $rowClass = 'error-row';
            } elseif ($row['type'] == 'psu' && $compatibilityFlags['psu']) {
                $rowClass = 'error-row';
            }
            ?>
            <tr class="<?php echo $rowClass; ?>">
                <td>
                    <form method="post">
                        <input type="text" name="C_id" value="<?php echo $row['C_id']; ?>" hidden>
                        <button class="normal" type="submit" name="rem"><i class='bx bx-x-circle'></i></button>
                    </form>
                </td>
                <td><img src="./img/products/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>"></td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="<?php echo $row['pro_link_amz']; ?>" target="_blank">Amazon</a></td>
            </tr>
        <?php endforeach; ?>

        
    <?php else: ?>
        <tr>
            <td colspan="4">Your cart is empty.</td>
        </tr>
    <?php endif; ?>
</tbody>

         </table>
     </section>

     <section id="cart-add" class="section-p1">
         <div id="coupon">

         </div>

         <div id="subtotal">
             <h3>compare compatibility</h3>
             <table>
             <?php if (!empty($compatibilityErrors)): ?>
            <tr class="error-row-details">
                <td colspan="4">
                    <ul class="error-list">
                        <?php foreach ($compatibilityErrors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        <?php endif; ?>
             </table>
             
         </div>
     </section>

     <?php include'footer.php' ?>
     
     <script src="script.js"></script>
 </body>

 </html>