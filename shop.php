<?php
$active='shop';
include("includes/header.php");
?>
<section id="hero"> <!-- Carousel Begin-->
    
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
    
    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
    <?php
    
    $get_slider = "select * from slider LIMIT 0,1";
    $run_slider = mysqli_query($con,$get_slider);
    while($row_slider = mysqli_fetch_array($run_slider)){
        $slider_name = $row_slider['slide_name'];
        $slider_image = $row_slider['slide_image'];
        echo"<div class='carousel-item active'><img src='admin_area/slides_images/$slider_image' style='width:100%'>></div>";
    }
    $get_slider = "select * from slider LIMIT 1,3";
    $run_slider = mysqli_query($con,$get_slider);
    while($row_slider = mysqli_fetch_array($run_slider)){
        $slider_name = $row_slider['slide_name'];
        $slider_image = $row_slider['slide_image'];
        echo"<div class='carousel-item'><img src='admin_area/slides_images/$slider_image' style='width:100%'></div>";
    }
    
  
    ?>

    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
    </div>
    </section><!-- Carousel Finish-->

    <section id="product1" class="section-p1">
    <h1>Shop</h1>
            
                        <div class="cats">
                        <?php 
                        
                            $get_cat = "Select * from categories ";
                            $run_cat = mysqli_query($db,$get_cat);
                            while($row_categories  = mysqli_fetch_array($run_cat)){
                                $cat_id = $row_categories['cat_id'];
                                $cat_title = $row_categories['cat_title'];
                                echo"<a href='shop.php?cat=$cat_id'> $cat_title </a>
                                ";      
                        
                            }
                            ?>
                            
                            <a style="text-decoration:underline;" href="categories.php"> SEE MORE</a>
                        </div>

                        <?php
                        if(isset($_GET['cat'])){
                            $cat_id = $_GET['cat'];
                            $get_cat ="select * from categories where cat_id='$cat_id'";
                            $run_cat = mysqli_query($db,$get_cat);
                            $row_cat = mysqli_fetch_array($run_cat);
                            $cat_title = $row_cat['cat_title'];
                
                            $get_cat = "select * from products where cat_id='$cat_id'";
                            $run_products= mysqli_query($db,$get_cat);
                                echo"
                                <br>
                               <h3>$cat_title</h3>   
                            ";
                            }?>

                <div class="pro-container">
              
                <?php
                        
                            if (!isset($_GET['cat'])){
                                $per_page = 8;

                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }      
                                    else{
                                        $page = 1;

                                    }
                                    $start_from = ($page-1) * $per_page;
                                    $get_products = "select * from products order by rand() LIMIT $start_from,$per_page";
                                    $run_products = mysqli_query($con,$get_products);

                                    while($row_products = mysqli_fetch_array($run_products)){
                                    $pro_id = $row_products['product_id'];
                                    $pro_title = $row_products['product_title'];
                                    $pro_price = $row_products['product_price'];
                                    $pro_img1 = $row_products['product_img1'];
                                    $p_cat_id = $row_products['p_cat_id'];
                                    $cat_id = $row_products['cat_id'];

                                    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id' ";
                                    $run_p_cat = mysqli_query($db,$get_p_cat);
                                    $row_p_cat  = mysqli_fetch_array($run_p_cat);
                                    $p_cat_t = $row_p_cat['p_cat_title'];

                                    $get_cat = "select * from categories where cat_id='$cat_id' ";
                                    $run_cat = mysqli_query($db,$get_cat);
                                    $row_cat  = mysqli_fetch_array($run_cat);
                                    $cat_titlee = $row_cat['cat_title'];

                                    echo"
                                  
                                    <div class='pro'>
                                    <img src='admin_area/product_images/$pro_img1'>
                                    <div class='des'>  <!-- des begin -->
                                    <h6>$p_cat_t • <a href='shop.php?cat=$cat_id'>$cat_titlee</a></h6>
                                    
                                        <h5 id='title'>$pro_title</h5>
                                        <h5 class='price'><span>&#8369;</span> $pro_price</h5>   

                                        <center><a href='details.php?pro_id=$pro_id 'class='btn btn-outline-info'><i class='fa fa-cart-shopping'></i> Add to cart</a>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-outline-warning'><i class='fa-solid fa-info'></i></a>
                                        <br>
                                        </center>
                                        </div><!-- des Finish -->
                                    
                                    </div>
                                    
                                            ";
  
                                    }
                                
                    ?>  
                    
                  
                 
                    </section>
       
            
             
                 <section id="pagination" class="section-p1">
                 <?php
                 $query = "select * from products";
                 $result = mysqli_query($con,$query);
                 $total_records =mysqli_num_rows($result);
                 $total_pages = ceil($total_records / $per_page);
                 
                echo"
                 <a href='shop.php?page=1'><i class='fa-solid fa-arrow-left'></i></a>";
                 for($i=1; $i<=$total_pages; $i++){
                     echo"
                     <a href='shop.php?page=$i'>". $i."</a>";

                 };
                 echo"
                 <a href='shop.php?page=$total_pages'><i class='fa-solid fa-arrow-right'></i></a>";
                            
                        }
   
                    ?>
                     <?php get_cat_pro(); ?> 
                 </section>
                 </div>
           
            
             
        
        

<script src="js/script.js"></script>
<?php
include("includes/footer.php")
?>
