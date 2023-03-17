<?php 
session_start();
include("includes/db.php");
include("functions/function.php");

 ?>


<?php
        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];
            $get_product = "select * from products where product_id='$product_id'";
            $run_product = mysqli_query($con,$get_product);
            $row_product = mysqli_fetch_array($run_product);
            $p_cat_id = $row_product['p_cat_id'];
            $pro_title= $row_product['product_title'];
            $pro_price = $row_product['product_price'];
            $pro_desc = $row_product['product_desc'];
            $pro_img1 = $row_product['product_img1'];
            $pro_img2 = $row_product['product_img2'];
            $pro_img3 = $row_product['product_img3'];
            $pro_img4 = $row_product['product_img4'];
            $cat_id = $row_product['cat_id'];
            $product_quantity = $row_product['product_qty'];

        
            $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($con,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];
        
            $get_cat = "select * from categories where cat_id='$cat_id'";
            $run_cat = mysqli_query($con,$get_cat);
            $row_cat = mysqli_fetch_array($run_cat);
            $cat_title = $row_cat['cat_title'];
        
        
        }
            
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tatii</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" type="text/css" href="styles/style.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<link rel='icon' href='images/mobile4.png'>
<!-- Chat Drift Begin -->
<!-- Start of Async Drift Code -->
<script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('fkmbtzv9vfi7');
</script>
<!-- End of Async Drift Code -->
<!-- Chat Drift Finish -->
</head>
<body>
  
<div id="top"><!-- Top Begin -->
       <div class="container"><!--Container Begin-->

      <!--  <div class="col-md-6 offer">col-md-6 offer Begin-->

            <!-- <a href="#">
                  <?php
    $customer_session = $_SESSION['customer_email'];
    $get_customer = "select * from register_customer where customer_email='$customer_session' ";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_image = $row_customer['customer_profilepic'];
    $customer_fname = $row_customer['customer_fname'];
    $customer_lname = $row_customer['customer_lname'];


    if(!isset($_SESSION['customer_email'])){

    }else{
        echo" 
        <br/>
        <h3 class='panell-title' align='center'>
        $customer_fname $customer_lname
        </h3>
        ";
    }
    ?>
            </a>
            <a href="checkout.php"><?php itemss();?> Items in your Cart|| Total Price: <?php total_price();?> </a>  -->

      <!--  </div> col-md-6 offer Finish --> 

        <div ><!--col-md-6 Begin-->
            <ul class="menu"><!--cmenu Begin-->
            <div class="col-3-sm row">
            <a href="#">
                <?php
                if(!isset($_SESSION['customer_email'])){                      
                    echo "";    
                }else{
                    echo "Welcome, " . $customer_fname . " !"; 
                }
                    ?>
                </a> 
           
               </div>
                        <li>
                <form method="POST" action="searchM.php">
                    <input id="search" type="text" name="searchMain" placeholder="Search.."></form></li>         
            
           
                <li><a href="checkout.php"><?php
                    if(!isset($_SESSION['customer_email'])){                      
                        echo "<a href='checkout.php'>Login</a>";    
                    }else{
                        echo "<a href='logout.php'>Logout</a>"; 
                    }
                ?></a></li>
                <li><a class="<?php if($active=='Home') echo"active"; ?>" href="index.php">Home</a></li>
                
                <li>
                    <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                </li>
            </ul><!-- cmenu Finish --> 

        </div><!-- col-md-6 Finish --> 

    </div><!-- Container Finish --> 

   </div><!-- TOP Finish -->  

<section id="header">
    <a href="index.php"><img src="images/Tatti_Logo.png" class="logo" alt=""></a>
    <!-- <a href="index.php"><img src="images/mobile4.png.png" class="visible-sm bg-danger" alt=""></a> -->
           

    <div>
        <ul id="navbar">
            
        <li><a class="<?php if($active=='Home') echo"active"; ?>" href="index.php">Home</a></li>
        <li><a class="<?php if($active=='shop') echo"active"; ?>" href="shop.php">Shop</a></li>
        <li><?php
                        if(!isset($_SESSION['customer_email'])){
                            echo"<a class='if($active=='account')active' href='cart.php'>My Account</a>";
                        }else{
                            echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                        }
                        ?></li>
        <li ><a class="<?php if($active=='contact') echo"active"; ?>" href="contact.php">Contact Us</a></li>
        <li><a class="<?php if($active=='cart') echo"active"; ?>" href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
        <button class="btn"  id="close"><i class="fas fa-times"></i></button>
       
    </ul> 
         
    </div>
    <div id="mobile" >   
       <button class="btn" id="bar"><i  class="fa-solid fa-bars"></i></button>
    </div>

</section>


<script src="js/script.js">
 
</script>
</body>
</html>