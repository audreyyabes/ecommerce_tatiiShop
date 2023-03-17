<?php
$db = mysqli_connect("localhost","u933381893_audreyyabes28","Yabesaudrey123!","u933381893_tatii_db");

if(!function_exists("getIpUser")){
    function getIpUser(){
    
        switch(true){
                
                case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
                case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
                case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
                
                default : return $_SERVER['REMOTE_ADDR'];
                
        }
        
    }

}
 

if(!function_exists("add_cart")){
    function add_cart(){
        global $db;
        if(isset($_GET['add_cart'])){
            $ip_add = getIpUser();
            $p_id = $_GET['add_cart']; //product id
            $product_qty = $_POST['product_qtyy'];
            $product_store = $_POST['product_store']; 
 
            $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
            $run_check = mysqli_query($db,$check_product);
            $row_check_qty  = mysqli_fetch_array($run_check);
            $qty = $row_check_qty['qty'];

            $check_pro = "select * from products where product_id='$p_id'";
            $run_check_pro = mysqli_query($db,$check_pro);
            $row_check_pro  = mysqli_fetch_array($run_check_pro);
            $pr_qty = $row_check_pro['product_qty'];

            if($pr_qty==0){
                echo "<script>alert('This Product is already Sold')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }
            // $qty_f = $p_qty - $product_qty;
                // !may something error pa but move on//
                $upd = $product_qty + $qty;         
            if(mysqli_num_rows($run_check)>0){     
                $checkK_product = "update cart set qty='$upd' where ip_add='$ip_add' AND p_id='$p_id'";        
                $run_query = mysqli_query($db,$checkK_product);    
                echo "<script>alert('This Product(s) has already added in cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }else{
                $invpr = $pr_qty - $product_qty;
                $upd_product = "update products set product_qty='$invpr' where product_id='$p_id'";        
                $run_q = mysqli_query($db,$upd_product);
                $query = "insert into cart (p_id,ip_add,qty,store) values ('$p_id','$ip_add','$product_qty','$product_store') ";
                $run_query = mysqli_query($db,$query);
               echo "<script>alert('Product(s) is added in cart')</script>";
              echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }
        
        }
    }
}


/// add cart funtion finish///

if(!function_exists("getPro")){
    function getPro(){
        global $db;
        $get_products = "Select * from products order by rand() LIMIT 0,8";
        $run_products = mysqli_query($db,$get_products);
    
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
            $cat_title = $row_cat['cat_title'];

            echo"
            <div class='pro'>
            <img src='admin_area/product_images/$pro_img1'>
            <div class='des'>  <!-- des begin -->
              <h6 href=''>$p_cat_t • <a href='shop.php?cat=$cat_id'>$cat_title</a></h6>
              
                <h5 id='title'>$pro_title</h5>
                <h5 class='price'><span>&#8369;</span> $pro_price</h5>   

                <center> <a href='details.php?pro_id=$pro_id 'class='btn btn-outline-info'><i class='fa fa-cart-shopping'></i> Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-warning'><i class='fa-solid fa-info'></i></a>
                <br>
                </center>
                </div><!-- des Finish -->
            
            </div>
            ";
    }
    }
}

if(!function_exists("get_Latest_Pro")){
    function get_Latest_Pro(){
        global $db;
        $get_products = "Select * from products order by 1 desc limit 0,8";
        $run_products = mysqli_query($db,$get_products);
    
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
            $cat_title = $row_cat['cat_title'];

            echo"
            <div class='pro'>
            <img src='admin_area/product_images/$pro_img1'>
            <div class='des'>  <!-- des begin -->
              <a href=''>$p_cat_t</a> •
              <a href=''>$cat_title</a>
                <h4 id='title'>$pro_title</h4>
                <h5 class='price'><span>&#8369;</span> $pro_price</h5>         
               <center> <a href='details.php?pro_id=$pro_id 'class='btn btn-outline-info'><i class='fa fa-cart-shopping'></i> Add to cart</a>
               <a href='details.php?pro_id=$pro_id' class='btn btn-outline-warning'><i class='fa-solid fa-info'></i></a>
                
            </center></div><!-- des Finish -->
            </div>
            ";
    }
    }
}

if(!function_exists("get_Cats")){
    function get_Cats(){
        global $db;
        $get_cat = "Select * from categories";
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
    }
}


if(!function_exists("get_Cat")){
    function get_Cat(){
        global $db;
        $get_cat = "Select * from categories order by 1 ASC LIMIT 0,4";
        $run_cat = mysqli_query($db,$get_cat);
        while($row_categories  = mysqli_fetch_array($run_cat)){
            $cat_id = $row_categories['cat_id'];
            $cat_title = $row_categories['cat_title'];
            echo"<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";      
    
        }
    }
}

if(!function_exists("get_p_Cat")){
    function get_p_Cat(){
        global $db;
        $get_p_cat = "Select * from product_categories order by 1 ASC LIMIT 0,4";
        $run_p_cat = mysqli_query($db,$get_p_cat);
        while($row_p_categories  = mysqli_fetch_array($run_p_cat)){
            $p_cat_id = $row_p_categories['p_cat_id'];
            $p_cat_title = $row_p_categories['p_cat_title'];
            echo"<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";      
    
        }
    }
}

if(!function_exists("get_p_cat_pro")){
    function get_p_cat_pro(){
        global $db;
        if(isset($_GET['p_cat'])){
            $p_cat_id = $_GET['p_cat'];
            $get_p_cat ="select * from product_categories where p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($db,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];
            
            
            $get_products = "select * from products where p_cat_id='$p_cat_id'";
            $run_products= mysqli_query($db,$get_products);
    
            $count = mysqli_num_rows($run_products);
            if($count==0){
                echo"<div class='box'>
                    <h1> No Products Found in this Product Categories</h1>
                </div>";
            }else{echo"<div class='box'>
                <h1> $p_cat_title</h1>
                
            </div>";
    
            }
            while($row_products = mysqli_fetch_array($run_products)){
                $pro_id = $row_products['product_id'];
                $pro_title = $row_products['product_title'];
                $pro_price = $row_products['product_price'];
                $pro_img1 = $row_products['product_img1'];
                echo"
                
                <div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                    </a>
                    <div class='text'>
                    <h3>
                    <a href='details.php?pro_id=$pro_id'>
                     $pro_title</a>
                    </h3>
                    <center><p class='price' value='PHP'> $pro_price</p></center>
                    <p class='button'>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                        <a href='details.php?pro_id=$pro_id 'class='btn btn-primary'><i class='fa fa-shopping-cart'></i></a>
                    </p>
                        </div>
                </div></div>"
                ;
    
            }
    
        }
    
    }
}


if(!function_exists("get_cat_pro")){
    function get_cat_pro(){
        global $db;
        if(isset($_GET['cat'])){
            $cat_id = $_GET['cat'];
            $get_cat ="select * from categories where cat_id='$cat_id' ";
            $run_cat = mysqli_query($db,$get_cat);
            $row_cat = mysqli_fetch_array($run_cat);
            $cat_title = $row_cat['cat_title'];

            $get_cat = "select * from products where cat_id='$cat_id'";
            $run_products= mysqli_query($db,$get_cat);

            $count = mysqli_num_rows($run_products);
            if($count==0){
                echo"
                    <h4> No Products Found in this Categories</h4>
                ";
            }else{
            //     echo"
            //    <h3>$cat_title</h3>   
            // ";
    
            }
            while($row_products = mysqli_fetch_array($run_products)){
                $pro_id = $row_products['product_id'];
                $p_cat_id = $row_products['p_cat_id'];
                $pro_title = $row_products['product_title'];
                $pro_price = $row_products['product_price'];
                $pro_img1 = $row_products['product_img1'];

                $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
                $run_p_cat = mysqli_query($db,$get_p_cat);
                $row_p_cat  = mysqli_fetch_array($run_p_cat);
                $p_cat_t = $row_p_cat['p_cat_title'];
                
                echo"
                
                <div class='pro'>
                <img src='admin_area/product_images/$pro_img1'>
                <div class='des'>  <!-- des begin -->
                <h6 href=''>$p_cat_t • <a href='shop.php?cat=$cat_id'>$cat_title</a></h6>
                                    
                <h5 id='title'>$pro_title</h5>
                <h5 class='price'><span>&#8369;</span> $pro_price</h5>   

                <center><a href='details.php?pro_id=$pro_id' class='btn btn-outline-warning'>View Details</a>
                <a href='details.php?pro_id=$pro_id 'class='btn btn-outline-danger'><i class='fa fa-cart-shopping'></i></a>
                <br>
                </center>
                </div><!-- des Finish -->
        
                </div>
                
                
                
                ";
    
            }
    
        }
    
    }
}

///cart begin///
if(!function_exists("itemss")){
    function itemss(){
        global $db;
        $ip_add = getIpUser();
        $get_items = "select * from cart where ip_add='$ip_add' ";
        $run_items = mysqli_query($db,$get_items);
        $count_items = mysqli_num_rows($run_items);
    
        echo $count_items;
    
    }
}

///cart Finish///


///totpl price begin///
if(!function_exists("total_price")){
    function total_price(){
        global $db;
        $ip_add = getIpUser();

        $total = 0;
        $select_cart = "select * from cart where ip_add='$ip_add' ";
        $run_cart = mysqli_query($db,$select_cart);

       while($record=mysqli_fetch_array($run_cart)){
           $pro_id = $record['p_id'];
           $pro_qty = $record['qty'];
           $get_price = "select * from products where product_id='$pro_id' ";
           $run_price = mysqli_query($db,$get_price);

           while($row_price=mysqli_fetch_array($run_price)){
               $sub_total = $row_price['product_price'] * $pro_qty;
               $total += $sub_total; 
           }
       }
    
        echo "<span>&#8369;</span>" .$total;
    
    }
}
///totpl price begin///



?>

