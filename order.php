<?php 

include("includes/db.php");
include("functions/function.php");

 ?>

<?php

$today = date("dmy");
$rand = mt_rand(1,10000);

if(isset($_GET['c_id'])){

$customer_id = $_GET['c_id'];

}
$ip_add = getIpUser();
$status = "Pending";


$select_cart = "select * from cart where ip_add='$ip_add' ";
$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    $pro_id = $row_cart['p_id'];
    $pro_qty = $row_cart['qty'];
    $pro_store = $row_cart['store'];
    

    $get_products = "select * from products where product_id='$pro_id'";
    $run_products = mysqli_query($con,$get_products);
    while($row_products = mysqli_fetch_array($run_products)){
        $sub_total = $row_products['product_price']*$pro_qty;
        $invoice_no = $today.$rand;

        $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,store,order_date,order_status) 
        values ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_store',NOW(),'$status' )";
        $run_customer_order = mysqli_query($con,$insert_customer_order);

        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,store,order_status) 
        values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_store','$status' )";
        $run_pending_order = mysqli_query($con,$insert_pending_order);

        $delete_cart = "delete from cart where ip_add='$ip_add' ";
        $run_delete = mysqli_query($con,$delete_cart);

        echo"<script>alert('Order Submitted')</script>";
        echo"<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }


}
?>
