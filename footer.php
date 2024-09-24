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
        <?php if (!empty($_SESSION['UID'])) { ?>
            <a href="signout.php">Sign Out</a>
        <?php } else { ?>
            <a href="signin.php">Sign In</a>
        <?php } ?>
        <a href="#">My Wishlist</a>
        <a href="#">Help</a>
    </div>

    <div class="col install">

    </div>

    <div class="copyright">

    </div>
</footer>