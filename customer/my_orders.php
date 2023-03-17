<?php
$active='account';

?>
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

