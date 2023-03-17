<?php 
$customer_session = $_SESSION['customer_email'];
$get_customer = "select * from register_customer where customer_email='$customer_session' ";
$run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
    $customer_fname = $row_customer['customer_fname'];
    $customer_lname = $row_customer['customer_lname'];
    $customer_contact = $row_customer['customer_contact'];
    $customer_email= $row_customer['customer_email'];
    $customer_country = $row_customer['customer_country'];
    $customer_city = $row_customer['customer_city'];
    $customer_haddress = $row_customer['customer_haddress'];
    $customer_pass = $row_customer['customer_pass'];

    $customer_image = $row_customer['customer_profilepic'];

?>


    <h3  id="myAccount">Edit Account</h3>                    
<hr>
<form method="post" style="width:80%" enctype="multipart/form-data">

                                <div class="form-group"><!--form-group Begin-->
                                <label>First Name</label>
                                <input type="text" class="form-control" name="c_fname" value="<?php echo $customer_fname; ?>" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="c_lname" value="<?php echo $customer_lname; ?>" required>
                              </div><!--form-group Finish-->

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="c_email" value="<?php echo $customer_email; ?>" disabled required>
                                </div>
                                 <div class="form-group"><!--form-group Begin-->
                                <label>Country</label>
                                <input type="text" class="form-control" name="c_country" value="<?php echo $customer_country; ?>" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>City</label>
                                <input type="text" class="form-control" name="c_city" value="<?php echo $customer_city; ?>" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Home Address</label>
                                <input type="text" class="form-control" name="c_address" value="<?php echo $customer_haddress; ?>" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Contact</label>
                                <input type="text" value="<?php echo $customer_contact; ?>" class="form-control" name="c_contact" placeholder="09123456789 or +639123456789" maxlength="13" pattern="[0-9]{11}"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43' required>
                              </div><!--form-group Finish-->


                              <div id="upd" class="text-center">
                                  <button  name="update" class="btn btn-primary">
                                      <i class="fa fa-user"> </i>Update now
                                  </button>
                                </div>

</form>
<?php
if(isset($_POST['update'])){
  $update_id = $customer_id;
  $c_fname = $_POST['c_fname'];
  $c_lname = $_POST['c_lname'];
  $c_contact = $_POST['c_contact'];
  $c_country = $_POST['c_country'];
  $c_city= $_POST['c_city'];
  $c_address = $_POST['c_address'];
  
  $update_customer = "update register_customer set customer_fname='$c_fname', customer_lname='$c_lname', customer_contact='$c_contact',  customer_country='$c_country', 
  customer_city='$c_city', customer_haddress='$c_address' where customer_id='$update_id' ";
  $run_customer = mysqli_query($con,$update_customer);

  if($run_customer){
    echo "<script>alert('your account has been edited, please relogin')</script>";
    echo  "<script>window.open('logout.php'.'_self')</script>";
    }
}
?>