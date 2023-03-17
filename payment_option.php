<div class="well">
<div class="row"><!-- box Begin -->
<div class="container-fluid mt-3">
        <?php
        $session_email = $_SESSION['customer_email'];
        $select_customer = "select * from register_customer where customer_email='$session_email' ";
        $run_customer = mysqli_query($con,$select_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];
        $customer_fname = $row_customer['customer_fname'];
        ?>

 


    <h1 class="text-center">Online Payment Account</h1>  
     
     
     <div class="table-responsive"></div>
    <table class="table table-bordered table-hover table-stripped">
        <thead>
            <tr>
                <th>Gcash Name</th>
                <th>Gcash Number</th> 
                
            </tr>
        </thead>
        <tbody>
            <th>TATII KR.</th>
            <th>09123456789</th>
        </tbody>
    </table> 
    
    <a id="btn" class="btn btn-success btn-sm" role="button"  href="order.php?c_id=<?php echo $customer_id;?>"><p>PAY ONLINE</p></a>
    
    </div>
</div>
         
</div> 
    
    
</div><!-- box Finish -->