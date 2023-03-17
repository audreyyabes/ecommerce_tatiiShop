<?php
$active='contact';
include("includes/header.php")
?>

<h1 align="center">Feedbacks</h1>
<hr width="100%">


<div class="row" ><!--row Begin-->
    
  <div class="container-fluid" ><!--col-sm-4 Begin-->
      <div class="container" id="feedbackform">
  <form action="feedback.php" method="post">
<h4 style="font-weight: bold;">Feel free to give us some Feedback</h4>
<br>
        <div class="form-group"><!--form-group Begin-->
                                <input type="text" class="form-control" name="feedback_name" placeholder="Nickname.." required>
                              </div><!--form-group Finish-->
 
<div class="form-group"><!--form-group Begin-->
    <textarea  id="subject" name="subject_f" class="form-control" placeholder="Website Expirence etc..." style="height:200px"></textarea> </div><!--form-group Finish-->

    <button class="form-control" type="submit" name="submit" class="btn btn-secondary">Submit Feedback</button>
    <br>
  </form>
</div>
  </div><!--col-sm-4 Finish-->
                 <?php
                    if(isset($_POST['submit'])){
                      $feedback_name = $_POST['feedback_name'];
                      $feedback_message = $_POST['subject_f'];
                      
                      $insert_feedback = "insert into feedback (feedback_name,feedback_message) values ('$feedback_name' ,'$feedback_message')";
                      $run_feedback = mysqli_query($con,$insert_feedback);
                      echo "<script>alert('Feedback Sent, Thank you')</script>";
                      
                    }
                    ?>
  
  <?php
  
            $get_feedback = "select * from feedback";
            $run_feedback = mysqli_query($con,$get_feedback);
            // $row_feedback = mysqli_fetch_array($run_feedback);
            while($row_feedback = mysqli_fetch_array($run_feedback)){
             $feedback_name = $row_feedback['feedback_name'];
            $feedback_message = $row_feedback['feedback_message'];
            ?>
  <div class="col-sm-4">
     
  <div class="container py-5 h-100" style="justify-content: flex-start;">
    
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <figure class="bg-white p-3 rounded" style="border-left: .20rem solid #a34e78;">
          <blockquote class="blockquote pb-2">
            <h6>
              <?php echo $feedback_message;?>
            </h6>
          </blockquote>
          <figcaption class="blockquote-footer mb-0 font-italic">
           <p><?php echo $feedback_name;?></p>
          </figcaption>
        </figure>  
      </div>
  
  </div>

  </div>
  <?php }?>
</div><!--row Finish-->




<?php 
include("includes/footer.php");
?>

