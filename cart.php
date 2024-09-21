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

                    <td>Remove</td>
                </tr>
            </thead>
            <?php
            // Database connection
            $sql = "SELECT i.* FROM cart c JOIN item i ON c.item_id = i.id WHERE c.uid = '$UID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                }
            }
            ?>

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
            <!-- <h3>Apply Coupon</h3>
                <div>
                    <input type="text" placeholder="Enter Your Coupon">
                    <button class="normal">Apply</button>
                </div> -->
        </div>

        <div id="subtotal">
            <h3>Cart Total</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>₹7399</td>
                </tr>

                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>₹7399</strong></td>
                </tr>
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

<!-- <tbody>
                    <tr>
                        <td><i class='bx bx-x-circle'></i></td>
                        <td><img src="./img/products/
                        //<?php //echo $row['photo']; 
                            ?>
                        " alt=""></td>
                        <td>Lorem, ipsum dolor.</td>
                        <td>
                            <a href="#"><button class="normal" >shop1</button></a>
                            <a href="#"><button class="normal" >shop2</button></a>
                           
                        </td>
                        <td><input type="number" value="1"></td>
                        
                        <td>remo</td>
                    </tr>
                   
                </tbody> -->