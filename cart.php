<?php
// Assuming a database connection $conn and the logged-in user ID in $UID
include 'nav.php';
// Fetch items from the cart for the current user
$sql = "SELECT i.* FROM cart c JOIN item i ON c.item_id = i.id WHERE c.uid = '$UID'";
$result = $conn->query($sql);
$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

// Function to compare item compatibility
function compareItems($items) {
    $incompatibilities = [];
    
    // Assuming the first item is the "base" for comparison
    if (count($items) > 1) {
        $base = $items[0];
        
        foreach ($items as $item) {
            if ($item['type'] != $base['type']) {
                $incompatibilities[] = "Type mismatch: " . $item['name'];
            }
            if ($item['socket'] != $base['socket']) {
                $incompatibilities[] = "Socket mismatch: " . $item['name'];
            }
            if ($item['ddr'] != $base['ddr']) {
                $incompatibilities[] = "DDR type mismatch: " . $item['name'];
            }
            // Add more checks for watt, RAM speed, etc., as needed
        }
    }
    return $incompatibilities;
}

$incompatibilities = compareItems($items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZPC - Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Type</td>
                    <td>Socket</td>
                    <td>DDR</td>
                </tr>
            </thead>
            <tbody>
                <?php if (count($items) > 0): ?>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><i class='bx bx-x-circle'></i></td>
                            <td><img src="./img/products/<?php echo $item['photo']; ?>" alt="<?php echo $item['name']; ?>"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['type']; ?></td>
                            <td><?php echo $item['socket']; ?></td>
                            <td><?php echo $item['ddr']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Your cart is empty.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <section id="compare" class="section-p1">
        <h3>Compatibility Check</h3>
        <table>
            <thead>
                <tr>
                    <td>Compatibility Issue</td>
                </tr>
            </thead>
            <tbody>
                <?php if (count($incompatibilities) > 0): ?>
                    <?php foreach ($incompatibilities as $issue): ?>
                        <tr>
                            <td><?php echo $issue; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td>All items are compatible!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</body>
</html>










<!-- <!DOCTYPE html>
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
    <?php include 'nav.php'; ?>


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
            // Database connection
            // $sql = "SELECT i.* FROM cart c JOIN item i ON c.item_id = i.id WHERE c.uid = '$UID'";
            // $result = $conn->query($sql);
            // if ($result->num_rows > 0) {
            //     while ($row = $result->fetch_assoc()) {
            //     }
            // }
            // ?>

            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><i class='bx bx-x-circle'></i></td>
                            <td><img src="./img/products/<?php echo $row['photo']; ?>"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>remo</td>
                        </tr>
                    <?php endwhile; ?>
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

            </table>
            <button class="normal">Proceed to shop</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="./img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> Ernakulam, Kerala, India</p>
            <p><strong>Phone:</strong> +91 8590 548 241 / +91 6282 130 150</p>
            <p><strong>Owner:</strong> Hari, Harish</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class='bx bxl-facebook'></i>
                    <i class='bx bxl-twitter'></i>
                    <i class='bx bxl-instagram'></i>
                    <i class='bx bxl-pinterest-alt'></i>
                    <i class='bx bxl-youtube'></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">My Wishlist</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">

        </div>

        <div class="copyright">

        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>

 -->


<!-- <div id="subtotal">
    <h3>compare compatibility</h3>
    <table>

    </table>
    <button class="normal">Proceed to shop</button>
</div> -->