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
            $p_id = $_GET['add_cart'];
            $store = $_GET['store'];
            $product_qty = $_POST['product_qty'];
            $product_store = $_POST['product_store'];
            $product_version = $_POST['product_version'];
            
            $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
            $run_check = mysqli_query($db,$check_product);
                // may something error pa but move on//
            if(mysqli_num_rows($run_check)>0){
                echo "<script>alert('This Product(s) has already added in cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }else{

            $query = "insert into cart (p_id,ip_add,qty,store,version) values ('$p_id','$ip_add','$product_qty','$product_store','$product_version') ";
            $run_query = mysqli_query($db,$query);
                echo "<script>alert('This Product(s) is added in cart')</script>";
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
            echo"
            <div class='col-md-4 col-sm-5 single'>
            <div class='product'>
                <a href='details.php?pro_id=$pro_id'>
                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                </a>
                <div class='text'>
                <h3>
                <a href='details.php?pro_id=$pro_id'>
                 $pro_title</a>
                </h3>
                <center><p class='price' value='PHP'><span>&#8369;</span> $pro_price</p></center>
                <p class='button'>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                    <a href='details.php?pro_id=$pro_id 'class='btn btn-primary'><i class='fa fa-shopping-cart'></i></a>
                </p>
                    </div>
            </div></div>";
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
            $p_cat_desc = $row_p_cat['p_cat_desc'];
            
            $get_products = "select * from products where p_cat_id='$p_cat_id'";
            $run_products= mysqli_query($db,$get_products);
    
            $count = mysqli_num_rows($run_products);
            if($count==0){
                echo"<div class='box'>
                    <h1> No Products Found in this Product Categories</h1>
                </div>";
            }else{echo"<div class='box'>
                <h1> $p_cat_title</h1>
                <p>$p_cat_desc</p>
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
            $get_cat ="select * from categories where cat_id='$cat_id'";
            $run_cat = mysqli_query($db,$get_cat);
            $row_cat = mysqli_fetch_array($run_cat);
            $cat_title = $row_cat['cat_title'];
            $cat_desc = $row_cat['cat_desc'];
            $get_cat = "select * from products where cat_id='$cat_id'";
            $run_products= mysqli_query($db,$get_cat);
    
            $count = mysqli_num_rows($run_products);
            if($count==0){
                echo"<div class='box'>
                    <h1> No Products Found in this Categories</h1>
                </div>";
            }else{echo"<div class='box'>
                <h1> $cat_title</h1>
                <p>$cat_desc</p>
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
///totpl price Finish///



?>

