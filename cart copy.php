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
                }
                if ($item['type'] == 'motherboard') {
                    $motherboard = $item;
                }
                if ($item['type'] == 'ram') {
                    $ram = $item;
                }
                if ($item['type'] == 'case') {
                    $case = $item;
                }
                if ($item['type'] == 'psu') {
                    $psu = $item;
                }
            }

            if ($cpu && $motherboard) {
                if ($cpu['socket'] !== $motherboard['socket']) {
                    $errors[] = "CPU socket {$cpu['socket']} is not compatible with motherboard socket {$motherboard['socket']}.";
                }
            }
            if ($motherboard && $ram) {
                if ($motherboard['ddr'] !== $ram['ddr']) {
                    $errors[] = "Motherboard DDR type {$motherboard['ddr']} is not compatible with RAM DDR type {$ram['ddr']}.";
                }
            }
            if ($motherboard && $case) {
                if ($motherboard['mb_size'] !== $case['mb_size']) {
                    $errors[] = "Motherboard MB size {$motherboard['mb_size']} is not compatible with case size {$case['mb_size']}.";
                }
            }

            // Add more checks as needed

            return $errors;
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
                       
                        foreach ($rows as $row): 
                            $compatibilityErrors = checkCompatibility($rows);
                            if (!empty($compatibilityErrors)) {
                                foreach ($compatibilityErrors as $error) {
                                    echo "<p>Error: $error</p>";
                                }
                            } else {
                                echo "<p> no Error:</p>";
                            }?>
                        
                         <tr>
                             <td>
                                 <form method="post">
                                     <input type="text" name="C_id" value="<?php echo $row['C_id']; ?>" hidden>
                                     <button class="normal" type="submit" name="rem"><i class='bx bx-x-circle'></i></button>
                                 </form>
                             </td>
                             <td><img src="./img/products/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>"></td>
                             <td><?php echo $row['name']; ?></td>
                             <!-- <td>amazon</td> -->
                             <td>
                                 <a href="<?php echo $row['pro_link_amz']; ?>" target="_blank">Amazon</a>

                             </td>

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



 <!--  -->

 <tbody>
                 <?php if ($result->num_rows > 0):
                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($rows as $row):
                            $compatibilityErrors = checkCompatibility($rows);

                            // Add a CSS class to the row if there are compatibility errors
                            $rowClass = !empty($compatibilityErrors) ? 'error-row' : '';

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
                             <td>
                                 <a href="<?php echo $row['pro_link_amz']; ?>" target="_blank">Amazon</a>
                             </td>
                         </tr>

                         <?php if (!empty($compatibilityErrors)): ?>
                             <tr class="error-row-details">
                                 <td colspan="4">
                                     <ul>
                                         <?php foreach ($compatibilityErrors as $error): ?>
                                             <span><?php echo $error; ?></span>
                                         <?php endforeach; ?>
                                     </ul>
                                 </td>
                             </tr>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 <?php else: ?>
                     <tr>
                         <td colspan="4">Your cart is empty.</td>
                     </tr>
                 <?php endif; ?>
             </tbody>
