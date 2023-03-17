<?php
$active='account';
include("includes/header.php");

?>

<div id="content"><!--content Begin-->
    <div class="row"><!--row Begin-->
            

            <div class="col-lg-4  mx-auto"><!--col-md-9 Begin-->

            <?php
            if(!isset($_SESSION['customer_email'])){
                include("customer/customer_login.php");
            }else{ 
                include("payment_option.php");
            }
            ?>
            </div><!--col-md-9 Finish-->


            </div><!--row Finish-->
</div><!--content Finish-->

<?php
include("includes/footer.php")
?>



