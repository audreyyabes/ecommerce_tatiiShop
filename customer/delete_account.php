<div class="container"></div>
    <h3 id="myAccount">Do you really want to delete your account?</h3>

<hr>
<form method="post">
    <input type="submit" name="Yes" value="Yes, I want to delete my account" class="btn btn-danger"><br><br>
    <input type="submit" name="No" value="No, I do not want to delete my account" class="btn btn-primary">
</form>
</div>
<?php
 $c_email = $_SESSION['customer_email'];

 if(isset($_POST['Yes'])){
     $delete_customer = "delete from register_customer where customer_email='$c_email' ";
     $run_delete_customer = mysqli_query($con,$delete_customer);

     if($run_delete_customer){
         session_destroy();
         echo "<script>alert('Your account has been deleted, Good bye')</script>";     
        echo "<script>window.open('../index.php','_self')</script>";     
     }
 }

 if(isset($_POST['No'])){
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";   
 }
?>