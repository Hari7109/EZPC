<?php 
include 'php/connection.php'; 
?>

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
        <section id="header">
            <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

            <div>
                <ul id="navbar">
                    <li><a href="index.html">Home</a></li>
                    <li><a class="active" href="shop.html">Shop</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li id="lg-bag"><a href="cart.html"><i class='bx bx-shopping-bag' ></i></a></li>
                    <a href="#" id="close"><i class='bx bx-x'></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><i class='bx bx-shopping-bag' ></i></a>
                <i id="bar" class='bx bx-menu'></i>
            </div>
        </section>

        <section id="page-header">
            <h2>#stayhome</h2>
            <p>save more with coupons & up to 70% off!</p>
        </section> 

        <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
            $sql = "SELECT products.id, products.name, products.price, products.image, categories.name AS category FROM products INNER JOIN categories ON products.category_id = categories.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='pro'>";
                    echo "<img class='shirt' src='img/products/" . $row['image'] . "' alt=''>";
                    echo "<div class='des'>";
                    echo "<span>" . $row['category'] . "</span>";
                    echo "<h5>" . $row['name'] . "</h5>";
                    echo "<div class='star'>";
                    echo "<i class='bx bxs-star'></i>";
                    echo "<i class='bx bxs-star'></i>";
                    echo "<i class='bx bxs-star'></i>";
                    echo "<i class='bx bxs-star'></i>";
                    echo "<i class='bx bxs-star'></i>";
                    echo "</div>";
                    echo "<h4>₹" . $row['price'] . "</h4>";
                    echo "</div>";
                    echo "<a href='#'><i class='bx bx-cart cart'></i></a>";
                    echo "</div>";
                }
            } else {
                echo "No products found.";
            }
            $conn->close();
            ?>
        </div>
    </section>

        <section id="pagination" class="section-p1">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#"><i class='bx bx-right-arrow-alt'></i></a>
        </section>

        <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>Sign Up For Newsletters</h4>
                <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
            </div>
            <div class="form">
                <input type="text" placeholder="Your email address">
                <button class="normal">Sign Up</button>
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
                        <i class='bx bxl-twitter' ></i>
                        <i class='bx bxl-instagram' ></i>
                        <i class='bx bxl-pinterest-alt' ></i>
                        <i class='bx bxl-youtube' ></i>
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