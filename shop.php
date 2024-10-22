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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_id = $_POST['item_id'];
        $sql_insert = "INSERT INTO cart (uid,item_id) VALUES($UID,$item_id)";
        if (!$conn->query($sql_insert)) {
            echo "<script>alert('Error inserting data')</script>";
        }
    }
    ?>

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>save more with coupons & up to 70% off!</p>
    </section>

    <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
            // $sql = "SELECT products.id, products.name, products.price, products.image, categories.name AS category FROM products INNER JOIN categories ON products.category_id = categories.id";
            $sql = "SELECT * from item";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // $name = $row['name'];
                    // $type = $row['type'];
                    // $socket = $row['socket'];
                    // $mb_size = $row['mb_size'];
                    // $drr = $row['drr'];
                    // $ram_speed = $row['ram_speed'];
                    // $nvme_slot = $row['nvme_slot'];
                    // $ram_slot = $row['ram_slot'];
                    // $watt = $row['watt'];
                    // $sata = $row['sata'];
                    // $photo = $row['photo'];
                    // $ssd_type = $row['ssd_type'];
                    // $ssd_size = $row['ssd_size'];
            ?>
                    <div class='pro'>
                        <?php if ($row['photo'] != "") { ?>
                            <img class='shirt' src='img/products/<?php echo $row['photo']; ?> ' alt="image">
                        <?php
                        } else { ?>
                            <img class='shirt' src='img/defaults/<?php echo $row['type']; ?> ' alt="image">
                        <?php } ?>
                        <div class='des'>
                        <h4><?php echo  $row['brand']; ?> </h4> <br>
                            <span><?php echo  $row['type']; ?> </span>
                            <h5> <?php echo  $row['name']; ?> </h5>
                            <!-- <div class='star'>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div> -->
                            <!-- <h4>₹ " <?php echo  $row['price']; ?> "</h4> -->
                            
                        </div>
                        <form method="POST">
                            <input type="text" name="item_id" value="<?php echo $row['item_id']; ?>" hidden>
                            <button type="submit" name="submit">
                                <i class='bx bx-cart cart'></i>
                            </button>


                        </form>
                    </div>
            <?php }
            } else {
                echo "No products found.";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <!-- <section id="pagination" class="section-p1">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#"><i class='bx bx-right-arrow-alt'></i></a>
        </section> -->

    <!-- <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section> -->

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
            <a href="signin.html">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>



        <div class="copyright">
            <p>&copy; 2024 All rights reserved | Design by <a href="#">Hari & Harish</a></p>
        </div>

    </footer>

    <script src="script.js"></script>
</body>

</html>