<?php
$active='shop';
include("includes/header.php");
?>

    <section id="product1" class="section-p1">
    <h1>Shop</h1>
                <div class="cats">
                        <?php 
                        
                            $get_cat = "Select * from categories ";
                            $run_cat = mysqli_query($db,$get_cat);
                            while($row_categories  = mysqli_fetch_array($run_cat)){
                                $cat_id = $row_categories['cat_id'];
                                $cat_title = $row_categories['cat_title'];
                                $cat_img = $row_categories['cat_img'];
                                echo"<a href='shop.php?cat=$cat_id'> $cat_title </a>
                                ";      
                        
                            }
                            ?>
                            
                            <a style="text-decoration:underline;" href="categories.php"> SEE MORE</a>
                        </div>
             <div class="pro-container" >
                    <?php
                     
                     if(isset($_POST['searchMain'])){
                         $searchKey = $_POST['searchMain'];
                         
                         $get_products = "select * from products WHERE product_title LIKE '%$searchKey%' ";
                     }else{
                     $get_products = "select * from products"; 
                     $searchKey = "";
                     }
                     $run_product = mysqli_query($con,$get_products);
                      while($row = mysqli_fetch_object($run_product)){                        
                                        $pro_id = $row->product_id;
                                        $pro_name = $row->product_title;
                                        
                                       ?> 
                                      
                                        <div class="pro" style="justify-content: flex-start;">
                                    <img src="admin_area/product_images/<?php echo $row->product_img1;?>">
                                    <div class="des">  <!-- des begin -->
                                    <!--<h6>$p_cat_t • <a href="shop.php?cat=$cat_id">$cat_titlee</a></h6>-->
                                    
                                        <h5 id="title"><?php echo $row->product_title;?></h5>
                                        <h5 class="price"><span>&#8369;</span> <?php echo $row->product_price;?></h5>   

                                        <center><a href="details.php?pro_id=<?php echo $pro_id;?> "class="btn btn-outline-info"><i class="fa fa-cart-shopping"></i> Add to cart</a>
                                        <a href="details.php?pro_id=<?php echo $pro_id;?>" class="btn btn-outline-warning"><i class="fa-solid fa-info"></i></a>
                                        <br>
                                        </center>
                                        </div><!-- des Finish -->
                                    
                                    </div>
                                    
                                           <?php } ?>
                                        
                                        </div>
                                     </section> 
                                     <?php  get_cat_pro(); ?>  

<script src="js/script.js"></script>
<?php
include("includes/footer.php")
?>
