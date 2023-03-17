<?php
include("includes/db.php");
?>

<footer class="section-p1">
    <div class="col">
        <a href="index.php"><img class="logo" src="images/mobile4.png" alt=""></a>
        <h4>Contact Us</h4>
        <p><strong>Hagonoy, Bulacan </strong> </p>
        <p><strong>0977-258-8141</strong></p>
        <p><strong>tatiikrminimart@gmail.com</strong></p>
        
    </div>
   

            <div class="col">
            <h4>About Us</h4>
            <a href="../about_us.php">About us</a>
            <a href="../delivery_information.php">Delivery Information</a>
            <a href="../privacy_p.php">Privacy Policy</a>
            <a href="../terms.php">Terms & Conditions</a>
            <a href="../feedback.php">Feedback</a>
        </div>

        <div class="col">
        <h4> Account</h4>
        <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo"<a href='checkout.php'>Login</a>";
                        }else{
                            echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                        }
                        ?>
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                         echo"<a href='customer_register.php'>Register</a>";
                     }else{
                         echo"<a href='customer/my_account.php?edit_account'>Edit account</a>";
                        }
                        ?>
        <a href="../cart.php">View Cart</a>
        <a href="../contact.php">Contact Us</a>
</div>

        <div class="follow">
            <h4>Follow us</h4>
                    <div class="button">
                    <a href=""><i class="fab fa-facebook-f"></i>&nbsp;</a>  
                        <a href=""><i class="fab fa-twitter"></i>&nbsp;</a>
                        <a href=""><i class="fab fa-instagram"></i>&nbsp;</a>
                    <a href=""><i class="fab fa-google"></i>&nbsp;</a>
                    </div>
                    <br>
                <!-- <div class="newsletter">    
                    <input type="text" placeholder="Your Email Address" class="form-control form-control-sm">
                    <button type="button" class="btn btn-outline-light text-dark btn-sm">Sign Up</button>
                </div> -->
                        
            
            <div class="copyright">
                        <p>&copy; 2021 Tatii KR Inc. All Rights Reserve</p>
                        <p>Developed by: <a href="#">Olive Green Inc.</a>
                        </p>
                    </div>
    
</footer>