<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{
include("includes/db.php");
include("functions/funtions.php");

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id']; 
    $get_info = "select * from customer_orders where order_id='$order_id' ";
    $run_info = mysqli_query($con,$get_info);
    $row_info = mysqli_fetch_array($run_info);
    $invoice_no = $row_info['invoice_no'];
    $due_amount = $row_info['due_amount'];
}


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
                <li><a class="<?php if($active=='Home') echo"active"; ?>" href="index.php">Home</a></li>
                
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
                        if(!isset($_SESSION['customer_email'])){
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



        
<div id="content"><!--content Begin-->
    <div class="row"><!--container Begin-->

        
            <div class="col-sm-3"><!--col-md-3 Begin-->
                <?php
                  include("includes/sidebar.php")
                ?>
            </div><!--col-md-9 Finish-->
   

   <div style="align-items:flex" class="col-md-9">
   <div class="box">
                    <h2 id="myAccount">Please Confirm your payment</h2>
                    <h5 class="text-muted">This will also serve as your Order Details</h5>
                    <hr>
                    <form style="width:80%;" action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group"><!--form-group Begin-->
                            <label for="">Invoice No: </label>
                            <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no; ?>" required>
                        </div><!--form-group Finish-->

                        <div class="form-group"><!--form-group Begin-->
                            <label for="">Amount Sent: </label>
                            <input type="text" class="form-control" name="amount_sent" value="<?php echo $due_amount; ?>" required>
                        </div><!--form-group Finish-->

                        <div class="form-group"><!--form-group Begin-->
                            <label for="">Select Payment Method: </label>
                            <select name="payment_method" class="form-control" required>
                            <option>Gcash1 Tatii(09123456789)</option>
                            <option>Gcash2 Tatii(09123456789)</option>
                            <option>Gcash3 Tatii(09123456789)</option>
                            </select>
                        </div><!--form-group Finish-->
                        <div class="form-group"><!--form-group Begin-->
                            <label for="">Sender Name: </label>
                            
                            <input type="text" class="form-control" name="sender_name" required>
                            </div><!--form-group Finish-->

                            <div class="form-group"><!--form-group Begin-->
                            <label for="">Delivery Address Name: </label>
                            <input type="text" class="form-control" name="res_name" required>
                            </div><!--form-group Finish-->

                            <div class="form-group"><!--form-group Begin-->
                            <label for="">Contact Number: </label>
                            <input type="text" inputmode="numeric" class="form-control" name="contact_no" required>
                            </div><!--form-group Finish-->
                            
                        <div class="form-group"><!--form-group Begin-->
                                <label>Proof of payment: <h6 class="text-muted">screenshot of the reciept !IMPORTANT</h6></label>
                                <input type="file" class="form-control form-height-custom" name="proofofpayment" required>
                        </div><!--form-group Finish-->

                        <div class="form-group"><!--form-group Begin-->
                            <label for="">Reference No: </label>
                            <input type="text" class="form-control" name="ref_no" required>
                        </div><!--form-group Finish-->

                        <div class="form-group"><!--form-group Begin-->
                            <label for="">Payment Date: </label>
                            <input type="date" class="form-control" name="date" required>
                        </div><!--form-group Finish-->

                        <div class="form-group"><!--form-group Begin-->
                            <label for="">Delivery Address: </label>
                            <textarea type="text" class="form-control" name="del_address" required></textarea>
                            </div><!--form-group Finish-->
                        

                        <div id="upd"  class="text-center">
                            <button name="confirm_payment"  class="btn btn-warning btn-lg">Confirm Payment</button>
                        </div>

                    </form>
</div>
    </div>
</div>
</div>
                    <?php
                    if(isset($_POST['confirm_payment'])){
                        $update_id = $_GET['update_id'];

                        $invoice_no = $_POST['invoice_no'];
                        $amount_sent = $_POST['amount_sent'];
                        $payment_method = $_POST['payment_method'];
                        $sender_name = $_POST['sender_name'];
                        $res_name = $_POST['res_name'];
                        $del_address = $_POST['del_address'];
                        $contact_no = $_POST['contact_no'];
                        $ref_no = $_POST['ref_no'];
                        $date = $_POST['date'];
                                      
                        $proofofpayment = $_FILES['proofofpayment']['name'];
                        $temp_name = $_FILES['proofofpayment']['tmp_name'];               
                        move_uploaded_file($temp_name,"../admin_area/proof_of_payments/$proofofpayment");
                    
                        $complete = "Complete";

                        $insert_payment = "insert into payments (invoice_no,amount_sent,payment_method,ref_no,payment_date,proofofpayment,sender_name,reciever_name,del_address,contact_no) 
                        values ('$invoice_no','$amount_sent','$payment_method','$ref_no','$date','$proofofpayment','$sender_name','$res_name','$del_address','$contact_no')";
                        $run_payment = mysqli_query($con,$insert_payment);

                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id' ";
                        $run_customer_order = mysqli_query($con,$update_customer_order);

                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id' ";
                        $run_pending_order = mysqli_query($con,$update_pending_order);

                        if($run_pending_order){
                            echo "<script>alert('Thankyou for purchasing, your orders will be completed within 2-4days')</script>";     
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                        }
                    }
                    ?>
   

            



<?php
include("includes/footer.php")
?>

<script src="js/script.js"></script>
</body>
</html>
<?php } ?>