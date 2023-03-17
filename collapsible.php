
<?php
$active ='account';
include("includes/header.php")
?>


<div class="container">

 

<table class="table">
<thead>
            <tr> 
                <th style="width: 60%;">#</th>
                <th  >Due Amount</th>
                <th>Invoice Number</th>
 
   
            </tr>

        </thead>
		<?php
        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from register_customer where customer_email='$customer_session'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];

        $get_orders = "select * from customer_orders where customer_id='$customer_id'";
        $run_orders = mysqli_query($con,$get_orders);
        $row_orders = mysqli_fetch_array($run_orders);
        $invoice_no_c = $row_orders['invoice_no'];

        $get_items = "select * from pending_orders where customer_id='$customer_id' AND invoice_no='$invoice_no_c'";
        $run_items = mysqli_query($con,$get_items);
        $row_items = mysqli_fetch_array($run_items);
        $prod_id = $row_items['product_id'];

        $get_prod = "select * from products where product_id='$prod_id'";
        $run_prod = mysqli_query($con,$get_prod);
        $row_prod = mysqli_fetch_array($run_prod);
        $prod_name = $row_prod['product_title'];

        $i=0;

        while($row_orders = mysqli_fetch_array($run_orders)){ 
            $order_id = $row_orders['order_id'];
            $due_amount = $row_orders['due_amount'];
            $invoice_no = $row_orders['invoice_no'];
            $qty = $row_orders['qty'];
            $order_date = substr($row_orders['order_date'],0,11);
            $order_status = $row_orders['order_status'];

				$row = $order_id + $invoice_no;
            $i++;
            if($order_status == 'Pending'){
                $order_status = 'Unpaid';
            }
            else{
                $order_status = 'Paid';
            }
        ?>
<?php echo "#$invoice_no";?>
<thead class="thead" data-toggle="collapse" href="<?php echo "#$invoice_no";?>" aria-expanded="false" aria-controls="<?php echo $invoice_no;?>">
    <tr>
      <th><?php echo $i;?></th>
      <th><?php echo $due_amount;?></th>
      <th><?php echo $invoice_no;?></th>
	</tr>
  </thead>
  <tbody class="collapse" id="<?php echo $invoice_no;?>">
    <tr>
      <th scope="row"> <?php echo $prod_name;?></th>
      <td class="text-center"><i class="material-icons">done</i></td>
      <td class="text-center"><i class="material-icons">done</i></td>
    </tr>  
  </tbody>
</table>
<!-- table 2 -->
<table class="table">
  <thead class="thead" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <tr>
      <th style="width: 40%; font-weight:500;">+ Web and mobile versions of Office apps</th>
      <th style="width: 20%; text-align: center;"><i class="material-icons">done</i></th>
      <th style="width: 20%; text-align: center;"><i class="material-icons">done</i></th>
      <th style="width: 20%; text-align: center;"><i class="material-icons">done</i></th>
            
    </tr>
  </thead>
  <tbody class="collapse" id="collapseExample">
    <tr>
      <th scope="row">Web versions of Word, Excel, PowerPoint, and OneNote</th>
      <td class="text-center"><i class="material-icons">done</i><br>Plus a web version of Outlook</td>
      <td class="text-center"><i class="material-icons">done</i><br>Plus a web version of Outlook</td>
      <td class="text-center"><i class="material-icons">done</i><br>Plus a web version of Outlook</td>
    </tr>
    
  </tbody>

</table>
 <?php } ?>

<!-- TABLE -->




    
</div>



<div class="container">

    <h3 id="myAccount">My Orders</h3>

<hr>

<div class="table-responsive"><!--"table-responsive Begin"-->
    <table align="center" style="width:80%" class="table table-bordered table-hover"><!--"table table-bordered table-hover Begin"-->
        <thead>
            <tr> 
                <th>#</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Paid/Unpaid</th>
                <th>Status</th>
            </tr>
        </thead>

        <?php
        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from register_customer where customer_email='$customer_session'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];
        $get_orders = "select * from customer_orders where customer_id='$customer_id'";
        $run_orders = mysqli_query($con,$get_orders);

        $i=0;

        while($row_orders = mysqli_fetch_array($run_orders)){ 
            $order_id = $row_orders['order_id'];
            $due_amount = $row_orders['due_amount'];
            $invoice_no = $row_orders['invoice_no'];
            $qty = $row_orders['qty'];
            $order_date = substr($row_orders['order_date'],0,11);
            $order_status = $row_orders['order_status'];

            $i++;
            if($order_status == 'Pending'){
                $order_status = 'Unpaid';
            }
            else{
                $order_status = 'Paid';
            }
        ?>

            <tr><!--"tr Begin"-->
                <th><?php echo $i; ?></th>
                <td><span>&#8369;</span> <?php echo $due_amount; ?></td>
                <td># <?php echo $invoice_no; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo  $order_status; ?></td>
                <td><a href="confirm.php?order_id=<?php echo $order_id;?>" class="btn btn-primary btn-sm" target="_blank">Confirm</a>
                    
                </td>    
            </tr><!--"tr Finish"-->

            <?php } ?>
                    

    </table><!--"table table-bordered table-hover Finish"-->
</div><!--"table-responsive Finish"-->
</div>


</body>
</html>
