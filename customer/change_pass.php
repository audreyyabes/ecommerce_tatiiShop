
    <h3 id="myAccount">Change Password</h3>
<hr style="width:80%">

<form style="width:80%" method="post">
    <div class="form-group"><!--form-group Begin-->
        <label>Old Password</label>
        <input type="text" class="form-control" name="old_pass" required>
    </div><!--form-group Finish-->

    <div class="form-group"><!--form-group Begin-->
        <label>New Password</label>
        <input type="text" class="form-control" name="new_pass" required>
    </div><!--form-group Finish-->

    <div class="form-group"><!--form-group Begin-->
        <label>Confirm New Password</label>
        <input type="text" class="form-control" name="new_pass_again" required>
    </div><!--form-group Finish-->

    <div id="upd" class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
            Update Password
              </button>
     </div>

</form>

<?php 

if(isset($_POST['submit'])){  
    $c_email = $_SESSION['customer_email']; 
    $c_old_pass = $_POST['old_pass']; 
    $c_new_pass = $_POST['new_pass']; 
    $c_new_pass_again = $_POST['new_pass_again'];
    $sel_c_old_pass = "select * from register_customer where customer_pass='$c_old_pass'";
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){     
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";    
        exit();     
    } 
    if($c_new_pass!=$c_new_pass_again){   
        echo "<script>alert('Sorry, your new password did not match')</script>";    
        exit();     
    }  
    $update_c_pass = "update register_customer set customer_pass='$c_new_pass' where customer_email='$c_email'";  
    $run_c_pass = mysqli_query($con,$update_c_pass);  
    if($run_c_pass){      
        echo "<script>alert('Your password has been updated')</script>";     
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";      
    }   
}

?>