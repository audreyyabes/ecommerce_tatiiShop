<?php

$active='cart';
include("includes/header.php");
?>

<br/>
<br/>
<h1 align="center">SHOPPING CART</h1>
<?php
                    $ip_add = getIpUser();
                    $select_cart= "select * from cart where ip_add = '$ip_add' ";
                    $run_cart = mysqli_query($con,$select_cart) ;

                    $count = mysqli_num_rows($run_cart);
                    ?>
<section id="cart" class="section-p1">
<form method="post" enctype="multipart/form-data">
<div class="table-responsive">
<table class="table">
        <thead>
            <tr>
                <td id="col1" >Remove</td>
                <td id="col2" >Image</td>
                <td id="col3" >Product Name</td>
                <!-- <td id="col4" span="1">Store</td> -->
                <td id="col5">Price</td>
                <td id="col6">Quantity</td>
                <td id="col7">Sub Total</td>
            </tr>
        </thead>
        <tbody>
        <?php 
                                $total = 0;
                                while($row_cart = mysqli_fetch_array($run_cart)){
                                     $pro_id = $row_cart['p_id'];
                                     $pro_qty = $row_cart['qty'];
                                     $pro_store = $row_cart['store'];
                                     
                                    
                                     $get_products = "select * from products where product_id='$pro_id' ";
                                     $run_products = mysqli_query($con,$get_products);
                                     while($row_products = mysqli_fetch_array($run_products)){
                                         $product_title = $row_products['product_title'];
                                         $product_img1 = $row_products['product_img1'];
                                         $only_price = $row_products['product_price'];
                                         $sub_total = $row_products['product_price']*$pro_qty;
                                         $_SESSION['pro_qty'] = $pro_qty;

                                         $get_manuf = "select * from manufacturer where manufacturer_id='$pro_store'";
                                        $run_manuf = mysqli_query($con,$get_manuf);
                                        $row_manuf = mysqli_fetch_array($run_manuf);
                                       // $manufacturer_name = $row_manuf['manufacturer_name'];
 
                                         $total += $sub_total;
                                     
                                ?>

            <tr>
                <td>
                <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                </td>
                <td>
                <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="<?php echo $product_title; ?>">
                </td>
                <td><?php echo $product_title;?></td>
                <!-- <td><?php echo $manufacturer_name;?></td> -->
                <td><?php echo $only_price;?></td>
                <td>
                   <input data-product_id="<?php echo $pro_id;?>" class="quantity form-control" 
                   name="quantity" type="number" value="<?php echo  $_SESSION['pro_qty']; ?>">
                   


                </td>
                <td><?php echo $sub_total;?></td>
            </tr>
            
            <?php }}
            ?>
        </tbody>
        
    </table>
</div>
    <button type="submit" name="update" value="Update Cart" class="btn btn-default">
          <i class="fa fa-refresh"> </i>  Update Cart
                                    </button>
</form>
</section>
                                    


                <?php
                function update_cart(){
                    global $con;
                    if(isset($_POST['update'])){
                        foreach($_POST['remove'] as $remove_id){
                            $delete_product = "delete from cart where p_id='$remove_id' ";
                            $run_delete = mysqli_query($con,$delete_product);
                            if($run_delete){
                                echo "<script>window.open('cart.php','_self')</script>";
    
                            }
                        }
                    }
                }
                echo @$up_cart = update_cart();
                ?>
           

<section id="cart-add" class="section-p1">
    <div id="coupon">
    

    </div>

    <div id="subtotal">
    <h3>Cart Totals</h3>
    <table>
        <tr>
             <td>Cart Subtotal</td>
             <td><span>&#8369;</span> <?php echo $total; ?></td>
        </tr>
        <tr>
        <?php
                    $shipping_fee = $total + 200;
                   
                    ?>
             <td>Shipping</td>
             <td><span>&#8369;</span> 200</td>
        </tr> 
        <tr>
             <td><strong>Total</strong></td>
             <td><strong><span>&#8369;</span> <?php echo $shipping_fee; ?></strong></td>
        </tr>
    </table>
      </table>
      <a href="checkout.php"><button class="btn btn-outline-primary">Proceed To Check out</button></a>
    </div>
</section>










<?php
include("includes/footer.php");
?>

<script src="js/script.js">
 
</script>

<script>

    $(document).ready(function(data){
        $(document).on('keyup','.quantity',function(){

        var id = $ (this).data("product_id");
        var quantity = $(this).val();

        if(quantity !=''){
            $.ajax({
                url: "change.php",
                method: "POST",
                data:{id:id, quantity:quantity},

                success:function(){
                    $("body").load("cart_body.php");
                }
            });
        }
    });
    });
</script>
</body>
</html>

