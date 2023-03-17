<?php
$active='account';
include("includes/header.php");

?>
<script>	
window.onload = function() {	

	// ---------------
	// basic usage
	// ---------------
	var $ = new City();
	$.showProvinces("#c_province");
	$.showCities("#c_city");

	// ------------------
	// additional methods 
	// -------------------

	// will return all provinces 
	console.log($.getProvinces());
	
	// will return all cities 
	console.log($.getAllCities());
	
	// will return all cities under specific province (e.g Batangas)
	console.log($.getCities("Batangas"));	
	
}
</script>


<br>
<br>

    <div class="container">
      <div class="box">
                      <h3 align="center" id="myAccount">Register Account</h3>                    
                      <hr>
                     
                            <form method="post" style="width:50%;" enctype="multipart/form-data">

                              <div class="form-group"><!--form-group Begin-->
                                <label>First Name</label>
                                <input type="text" class="form-control" name="c_fname" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="c_lname" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Contact</label>
                                <input type="text" class="form-control" name="c_contact" placeholder="09123456789 or +639123456789" maxlength="13"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43' required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Email</label>
                                <input type="text" class="form-control" name="c_email" required>
                              </div><!--form-group Finish-->
                              
                               <div class="form-group"><!--form-group Begin-->
                                <label>Password</label>
                                <input type="password" class="form-control" name="c_pass" id="myInput" required>
                                <input type="checkbox" onclick="showPass()"> Show Password
                              </div><!--form-group Finish-->
                                              
                
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


 
                              
                              <div class="form-group"><!--form-group Begin-->
                                <label>Province</label>
                                <select type="text" class="form-control" name="c_province" id="c_province" required></select>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>City</label>
                                <select class="form-control" name="c_city" id="c_city" required>
                                
    
</select>
                              </div><!--form-group Finish-->


                              <div class="form-group"><!--form-group Begin-->
                                <label>Home Address</label>
                                <input type="text" class="form-control" name="c_haddress" required>
                              </div><!--form-group Finish-->

                             


                                  
                              <div style="padding-top:50px; padding-bottom: 60px;" id="upd" class="text-center"><!--text-center Begin-->
                                <button type="submit" name="register" class="btn btn-success">
                                      Register
                                </button>
                              </div>
                              
                            </form>
</div>
</div>

                             

<?php
include("includes/footer.php")
?>

<script src="js/city.js"> </script>
<script src="js/city.min.js"> </script>

<?php
if(isset($_POST['register'])){
  $c_fname = $_POST['c_fname'];
  $c_lname = $_POST['c_lname'];
  $c_contact = $_POST['c_contact'];
  $c_email = $_POST['c_email'];
  $c_country = $_POST['c_province'];
  $c_city= $_POST['c_city'];
  $c_haddress = $_POST['c_haddress'];
  $c_pass = $_POST['c_pass'];


  $c_ip = getIpUser();


  $insert_customer = "insert into register_customer (customer_fname, customer_lname, customer_contact, customer_email, customer_country, customer_city, customer_haddress, customer_pass, customer_ip) values ('$c_fname','$c_lname','$c_contact','$c_email','$c_country','$c_city','$c_haddress','$c_pass','$c_ip')";

 echo $run_customer = mysqli_query($con,$insert_customer);


  $sel_cart = "select * from cart where ip_add='$c_ip' ";
  $run_scart = mysqli_query($con,$sel_cart);

  $check_cart = mysqli_num_rows($run_scart); 
  

  if($check_cart>0){ //if registered and have items in cart//
    $_SESSION['customer_email']=$c_email;
    echo"<script>alert('You have been Registered')</script>";
    echo"<script>window.open('checkout.php','_self')</script>";
  }else{
  $_SESSION['customer_email']=$c_email;//if registered with no items in cart//
  echo"<script>alert('You have been Registered Successfully')</script>";
  echo"<script>window.open('index.php','_self')</script>";
}
}
?>