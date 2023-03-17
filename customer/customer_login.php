
<div class="well">
<div class="box"><!--box Begin-->
    <div class="box-header"><!--box-header Begin-->
    <center>
        <h1>Login</h1>
        <p class="lead">Already have an account..?</p>

    </center>
    </div><!--box-header Finish-->

    <form method="post">
        <div class="form-group">
            <label>Email: </label>
                <input type="text" name="c_email" class="form-control" required>    
        </div>

        <div class="form-group">
            <label>Password: </label>
                <input type="password" name="c_pass" class="form-control" id="myInput" required>    
                <input type="checkbox" onclick="showPass()"> Show Password
                
            <script>
                function showPass() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
                }
                </script>
        </div>

        <div style="padding-top: 50px;" class="text-center">
            <button name="login"  class="btn btn-success">Login</button>
            
</div>
        </div>
    </form>
<div style="padding-top: 50px;">
    <center>
        <a href="customer_register.php">
            <h5>Don't have an account..? Register here </h5>
        </a>
    </center></div>
</div><!--box Finish-->
</div>



<?php
if(isset($_POST['login'])){
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];
   

    $select_customer = "select * from register_customer where customer_email='$customer_email' AND customer_pass='$customer_pass'"; 
    $run_customer = mysqli_query($con,$select_customer);
    $get_ip = getIpUser();
    $check_customer = mysqli_num_rows($run_customer); 

    $select_cart = "select * from cart where ip_add='$get_ip'";
    $run_cart = mysqli_query($con,$select_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer == 0){    
        echo "<script>alert('Your email or password is wrong')</script>";   
        exit();   
    }

    if($check_customer == 1 AND $check_cart == 0){ 
       $_SESSION['customer_email']=$customer_email;
       echo "<script>alert('You are Logged in')</script>"; 
       echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }else{ 
       $_SESSION['customer_email']=$customer_email;
     
    echo "<script>alert('You are already Logged in')</script>"; 
      echo "<script>window.open('index.php','_self')</script>"; 
     }
        ?> 

        
 
<?php } ?>
