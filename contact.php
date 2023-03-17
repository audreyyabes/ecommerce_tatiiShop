<?php
$active='contact';
include("includes/header.php");

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  
<div style="align-items: absolute; margin-top: 100px; margin-bottom: 60px;" class="container"><!--content Begin-->
    <div class="row"><!--container Begin-->



                  <div class="col-sm-6"><!--col-md-9 Begin-->
                    
                        <Center>
                          <h3>Feel Free to Contact Us</h3>
                          <p class="text-muted">If you have any questions, feel free to contact us.</p>
                        </Center>

                            <form action="contact.php" method="post">

                              <div class="form-group"><!--form-group Begin-->
                                <label>Name</label>
                                <input type="text" class="form-control" name="Name" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" required>
                              </div><!--form-group Finish-->

                              <div class="form-group"><!--form-group Begin-->
                                <label>Message</label>
                                <textarea name="message" id="" cols="30" rows="5" class="form-control" required></textarea>
                              </div><!--form-group Finish-->
                                  
                              <div style="padding-top: 20px;" class="text-center"><!--text-center Begin-->
                                <button  type="submit" name="submit" class="btn btn-primary">
                                       Send Message
                                </button>
                              </div><!--text-center Finish-->

                            </form>
                            

                    <?php
                    if(isset($_POST['submit'])){
                      $sender_name = $_POST['Name'];
                      $sender_email = $_POST['email'];
                      $sender_subject = $_POST['subject'];
                      $sender_message = $_POST['message'];

                      $run_send = "insert into contact_us (c_name,c_email,c_subject,c_message) values ('$sender_name ','$sender_email','$sender_subject','$sender_message')";
                      $run_query = mysqli_query($con,$run_send);
                      echo "<script>alert('Message Sent, Thank you')</script>";
                      
                    }
                    ?>
                      

                  </div><!--box-header Finish-->
<div style="position: right; margin-bottom: 60px;" class="col-sm-6">
<Center>
 <h3> We are located at</h3>
  </Center>
  <div class="well">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.2762495462116!2d120.76430434976795!3d14.865823474457933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33965119783cc5a1%3A0x187101a9f3f2717d!2sBulacan%20State%20University%20-%20Hagonoy%20Campus!5e0!3m2!1sen!2sph!4v1649622907700!5m2!1sen!2sph" width="470" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div> 

</div>


            </div><!--container Finish-->
</div><!--content Finish-->


<?php
include("includes/footer.php")
?>
</body>
</html>