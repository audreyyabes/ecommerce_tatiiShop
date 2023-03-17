<?php
$active='Home';
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
    echo"<div class='carousel-item active'><img src='admin_area/slides_images/$slider_image' style='width:100%'></div>";
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


<section id="feature" class="section-p1">
    <div class="fe-box">
        <a href="#product1"><h4>Products</h4></a>
           </div>
           <div class="fe-box">
        <a href="#latestpro"><h4>New Products</h4></a>
           </div>
           <div class="fe-box">
        <a href="categories.php"><h4>Categories</h4></a>
           </div>
</section>


<section id="product1" class="section-p1"><!-- product1 begin --> 

  <h1>FEATURE PRODUCTS</h1>
  <div class="pro-container"><!-- pro-container begin -->   
    <?php
        getPro();
        ?>
  </div><!-- pro-container Finish --> 
</section><!-- product1 Finish --> 

<section id="product1" class="section-p1"><!-- product1 begin --> 

  <h1 class="text-warning">NEW PRODUCTS</h1>
  
  <a href="shop.php"><button href="shop.php" class="btn btn-warning btn-lg">Explore More</button></a>
  <div id="latestpro" class="pro-container"><!-- pro-container begin -->   
    <?php
        get_Latest_Pro();
        ?>
  </div><!-- pro-container Finish --> 
</section><!-- product1 Finish -->

 
<?php
include("includes/footer.php")
?>

<script src="js/script.js"></script>
