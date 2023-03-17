<?php
$active='account';

?>
<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{


include("includes/db.php");
include("functions/funtions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INDEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>


<link rel='icon' href='images/mobile4.png'>

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
            <div class="row">
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
                <li><a href="checkout.php"><?php
                    if(!isset($_SESSION['customer_email'])){                      
                        echo "<a href='checkout.php'>Login</a>";    
                    }else{
                        echo "<a href='logout.php'>Logout</a>"; 
                    }
                ?></a></li>
                <li><a class="<?php if($active=='Home') echo"active"; ?>" href="../index.php">Home</a></li>
                
                <li>
                    <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                </li>
            </ul><!-- cmenu Finish --> 

        </div><!-- col-md-6 Finish --> 

    </div><!-- Container Finish --> 

   </div><!-- TOP Finish -->  

<section id="header">
    <a href="index.php"><img src="images/Tatti_logo.png" class="logo" alt=""></a>
    <!-- <a href="index.php"><img src="images/mobile4.png.png" class="visible-sm bg-danger" alt=""></a> -->

    <div>
        <ul id="navbar">
        <li><a class="<?php if($active=='Home') echo"active"; ?>" href="../index.php">Home</a></li>
        <li><a class="<?php if($active=='shop') echo"active"; ?>" href="../shop.php">Shop</a></li>
        <li><?php
                        if(!isset($_SESSION['.'])){
                            echo"<a class='if($active=='account')active' href='../cart.php'>My Account</a>";
                        }else{
                            echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                        }
                        ?></li>
        <li class="<?php if($active=='contact') echo"active"; ?>" ><a href="../contact.php">Contact Us</a></li>
        <li><a class="<?php if($active=='cart') echo"active"; ?>" href="../cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
        <button class="btn"  id="close"><i class="fas fa-times"></i></button>
       
    </ul> 
         
    </div>
    <div id="mobile" >   
       <button class="btn" id="bar"><i  class="fa-solid fa-bars"></i></button>
    </div>

</section>

   
 

</div><!--navbar navbar-default Finish-->

<div id="content"><!--content Begin-->
    <div class="row"><!--container Begin-->

        
            <div class="col-sm-3"><!--col-md-3 Begin-->
                <?php
                  include("includes/sidebar.php")
                ?>
            </div><!--col-md-9 Finish-->

            <div class="col-md-9"><!--col-md-9 Begin-->
                <div class="box"><!--box Begin-->
                <?php
                if (isset($_GET['my_orders'])){
                        include("my_orders.php");
                }
                ?>
                                <?php
                if (isset($_GET['pay_online'])){
                        include("pay_online.php");
                }
                ?>

                <?php
                if (isset($_GET['edit_account'])){
                        include("edit_account.php");
                }
                ?>

                <?php
                if (isset($_GET['change_pass'])){
                        include("change_pass.php");
                }
                ?>

                <?php
                if (isset($_GET['delete_account'])){
                        include("delete_account.php");
                }
                ?>


                </div><!--box Finish-->
            </div><!--col-md-9 Finish-->

            
    </div><!--container Finish-->
</div><!--content Finish-->

<?php
include("includes/footer.php")
?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>
<?php } ?>