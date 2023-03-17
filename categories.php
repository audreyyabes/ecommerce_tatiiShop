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
                        
                       
                        
                        
                <div class="pro-container"><!-- pro-container begin -->   
                
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
                                    $get_cat = "select * from categories order by cat_title ASC LIMIT $start_from,$per_page";
                                    $run_cat = mysqli_query($db,$get_cat);
                                    while($row_categories  = mysqli_fetch_array($run_cat)){
                                        $cat_id = $row_categories['cat_id'];
                                        $cat_title = $row_categories['cat_title']; 
                                        $cat_img = $row_categories['cat_img'];
                                                                echo"
                                    
                                                                <div id='cats' class='pro'>
                                                                <img src='admin_area/category_images/$cat_img'>
                                                                <div class='des'>  <!-- des begin -->
                                                
                                                                    <h4 id='title'>$cat_title</h4>    
                                                                    <center><a href='shop.php?cat=$cat_id' class='btn btn-outline-warning'>View Details</a>
                                                
                                                                </center></div><!-- des Finish -->
                                                            </div>
                                    
                                            ";
  
                                    }
                                
                    ?>
                    </div><!--row Finish-->
       
            
             
                 <section id="pagination" class="section-p1">
                 <?php
                 $query = "select * from categories";
                 $result = mysqli_query($con,$query);
                 $total_records = mysqli_num_rows($result);
                 $total_pages = ceil($total_records / $per_page);
                 
                echo"
                 <a href='categories.php?page=1'><i class='fa-solid fa-arrow-left'></i></a>";
                 for($i=1; $i<=$total_pages; $i++){
                     echo"
                     <a href='categories.php?page=$i'>". $i."</a>";

                 };
                 echo"
                 <a href='categories.php?page=$total_pages'><i class='fa-solid fa-arrow-right'></i></a>";
                            
                        }
   
                    ?>
                 </section> <!--PAGINATION FINISH-->
            </center> 
          
           
        
           
                </div><!-- pro-container Finish --> 
                 </section><!-- product1 Finish --> 

           
                <?php  get_cat_pro(); ?>  
       
            


<?php
include("includes/footer.php")
?>




