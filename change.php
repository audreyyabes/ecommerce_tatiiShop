<?php
session_start();

$active='cart';
include("functions/function.php");
include("includes/db.php");

?> 

<?php 
$ip_add = getIpUser();

if(isset($_POST['id'])){

    $id = $_POST['id']; //product_id
    $qty = $_POST['quantity'];
    $update_qty = "update cart set qty='$qty' where p_id='$id' AND ip_add='$ip_add' ";

    $run_qty = mysqli_query($con,$update_qty);
}
?> 