<?php
$active='cart';
include("includes/header.php");

?>

<section id="prodetails" class="section-p1">
    <div class="single-pro-image"><!-- single-pro-image begin -->
        <img src="admin_area/product_images/<?php echo $pro_img1; ?>" width="100%" id="MainImg" alt="<?php echo $pro_title; ?>">

            <div class="small-img-group"> <!-- small-img-group begin -->

                <div class="small-img-col">
                <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="small-img" width="100%" height="100%"  id="small-img" alt="<?php echo $pro_title; ?>">
                </div>
                
                <div class="small-img-col">
                <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="small-img" width="100%" height="100%"  id="small-img" alt="<?php echo $pro_title; ?>">
                </div>

                <div class="small-img-col">
                <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="small-img" width="100%" height="100%" id="small-img" alt="<?php echo $pro_title; ?>">
                </div>

                <div class="small-img-col">
                <img src="admin_area/product_images/<?php echo $pro_img4; ?>" class="small-img" width="100%" height="100%"  id="small-img" alt="<?php echo $pro_title; ?>">
                </div>
        </div><!-- small-img-group Finish -->
    </div><!-- single-pro-image Finish -->
 
    
    <div class="single-pro-details">
   
    <?php add_cart()?>
        <form action="details.php?add_cart=<?php echo $product_id;?>" class="form-horizontal" method="post">
        <h6><?php echo $p_cat_title; ?> / <?php echo $cat_title; ?></h6>
        <h3> <?php echo $pro_title; ?> </h3>

        <h3><span>&#8369; <?php echo $pro_price; ?></span></h3>
        <p class="text-muted" id="sold">Stocks: <?php 
        if($product_quantity<=0){ ?>
        SOLD
        <select disabled name="product_store" class="form-control" oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must select store for the product')" required>
        <option  selected required>Select Store</option> 
          
        <!-- <option>YG Select</option>
        <option>KTOWN4U</option>
        <option>Weverse</option>
        <option>Others</option> -->
        </select>
       
        
        <h6 class="text-muted">•If none put Others.</h6>
        
        <input id="product_qty" name="product_qtyy" min="1" type="number" value="1" required disabled>
        <button id="myBtn" class="btn btn-outline-info btn-lg" disabled><i class="fa-solid fa-cart-plus" ></i> SOLD</button>

        
         <?php }else{
        echo $product_quantity; 
        ?>
        </p>
        
        <select name="product_store" class="form-control" oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must select store for the product')" required>
        <option disabled selected>Select Store</option>
        <?php
       $get_manuf = "select * from manufacturer ";
       $run_manuf = mysqli_query($con,$get_manuf);
      while ($row_manuf = mysqli_fetch_array($run_manuf)){
        $proo_id=$row_manuf['product_id']; 
       $manufacturer_id = $row_manuf['manufacturer_id'];
        $manufacturer_name = $row_manuf['manufacturer_name'];
        $manuf_price = $row_manuf['price'];
        
         echo"
          <option value='$manufacturer_name'>$manufacturer_name</option>";
                                       }
                                       ?>  
          
        <!-- <option>YG Select</option>
        <option>KTOWN4U</option>
        <option>Weverse</option>
        <option>Others</option> -->
        </select>
       
        
        <h6 class="text-muted">•If none put Others.</h6>
        
        <input id="product_qty" name="product_qtyy" min="1" type="number" value="1" required>
        <button id="myBtn" class="btn btn-outline-info btn-lg" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-cart-plus"></i> Add to cart</button>
                                       <?php }?> 
                                       <br><br>
        <h4>DESCRIPTION:</h4>
        <p><?php echo $pro_desc; ?></p>
    </div>
   
    </form> 
    
</section>
 
<section id="product1" class="section-p1"><!-- product1 begin --> 

  <h1 class="text-warning">FEATURE PRODUCTS</h1>
  <div id="latestpro" class="pro-container"><!-- pro-container begin -->   
  <?php
                    $get_product = "select * from products order by rand() LIMIT 0,4";
                    $run_product = mysqli_query($con,$get_product);
                    while($row_product = mysqli_fetch_array($run_product)){
                    $pro_id = $row_product['product_id'];
                    $pro_title = $row_product['product_title'];
                    $pro_img1 = $row_product['product_img1'];
                    $pro_price = $row_product['product_price'];
                   
                      
                        echo "

                        <div class='pro'>
                        <a href='details.php?pro_id=$pro_id' >
                        <img src='admin_area/product_images/$pro_img1'></a> 
                        <div class='des'>  <!-- des begin -->
                        <a href='details.php?pro_id=$pro_id'><h4 id='title'>$pro_title</h4></a>
                        <h5 class='price'><span>&#8369;</span> $pro_price</h5>      
                        <center> <a href='details.php?pro_id=$pro_id 'class='btn btn-outline-info'><i class='fa fa-cart-shopping'></i> Add to cart</a>
               <a href='details.php?pro_id=$pro_id' class='btn btn-outline-warning'><i class='fa-solid fa-info'></i></a>
                        </center>
                        </div>
                        </div>
                            
                        ";
                    }
                    ?>
  </div><!-- pro-container Finish --> 
</section><!-- product1 Finish -->

                        
<script>
  var MainImg = document.getElementById("MainImg");
  var smallimg = document.getElementsByClassName ("small-img");

  smallimg[0].onclick = function(){
    MainImg.src = smallimg[0].src;
  }
  smallimg[1].onclick = function(){
    MainImg.src = smallimg[1].src;
  }
  smallimg[2].onclick = function(){
    MainImg.src = smallimg[2].src;
  }
  smallimg[3].onclick = function(){
    MainImg.src = smallimg[3].src;
  }
  smallimg[4].onclick = function(){
    MainImg.src = smallimg[4].src;
  }

</script>


<?php
include("includes/footer.php")
?>

<!-- <div class="modal" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-body">
        product added to cart
      </div>


    </div>
  </div>
</div> -->
<script src="js/script.js"></script>
</body>
</html>