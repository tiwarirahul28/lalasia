<?php 
include("./Database/connect.php");

function get_AllProducts(){
    global $connection;
    if(!isset($_GET['category'])){
        if (!isset($_GET['search_product'])) {
            // $All_products = "SELECT * FROM `product` order by rand()";
            $All_products = "SELECT * FROM `product` INNER JOIN `category` ON product.product_category = category.category_id";
            $AllProduct_results = mysqli_query($connection, $All_products);
            while ($row = mysqli_fetch_assoc($AllProduct_results)) {
                $All_products_Id = $row["product_id"];
                $All_products_Name = $row["product_title"];
                $All_products_Price = $row["product_price"];
                $product_description = $row["product_description"];
                $Product_Category = $row["category-name"];
                $All_products_Image = $row["product_imageone"];
                echo "<div class='allproduct--card'>
                        <div class='allproduct--card--img'>
                            <img src='./admin/product_images/$All_products_Image' alt='Product--Image'>
                        </div>
                        <div class='allproduct--card--info'>
                            <span>$Product_Category</span>
                            <h3>" . substr($All_products_Name, 0, 24) . "...</h3>
                            <span>" . substr($product_description, 0, 40) . "..</span>
                            <div class='d-flex'>
                                <p class='price'>Rs: $All_products_Price</p>
                                <a href='ProductDetail.php?product_Id=$All_products_Id'>View More</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }
}

function getTotalProduct(){
    global $connection;
    if(!isset($_GET['category'])){
        if(!isset($_GET['search_product'])){
            $totalProduct = "SELECT COUNT(*) FROM `product`";
            $result = mysqli_query($connection, $totalProduct);
            $row = mysqli_fetch_assoc($result);
            echo '<sup>'.$row["COUNT(*)"].'</sup>';
        }
    }
}

function getfilterTotalProduct(){
    global $connection;
    if(isset($_GET['category'])){
        $CAT_Id = $_GET['category'];
        $All_products = "SELECT * FROM `product` where product_category = '$CAT_Id'";
        $AllProduct_results = mysqli_query($connection, $All_products);
        // $ProductResults = mysqli_num_rows($AllProduct_results);
        $length = $AllProduct_results->num_rows;
        echo '<sup>'.$length.'</sup>';
    }
}

function getSerachTotalProduct(){
    global $connection;
    if(isset($_GET['search_product'])){
        $p_search_product = $_GET['search_data'];
        $All_products = "SELECT * FROM `product` where product_title like '%$p_search_product%'";
        $AllProduct_results = mysqli_query($connection, $All_products);
        // $ProductResults = mysqli_num_rows($AllProduct_results);
        $length = $AllProduct_results->num_rows;
        echo '<sup>'.$length.'</sup>';
    }
}

function get_filter_products(){
    global $connection;
    if(isset($_GET['category'])){
        $CAT_Id = $_GET['category'];
        $All_products = "SELECT * FROM `product` where product_category = '$CAT_Id'";
        $AllProduct_results = mysqli_query($connection, $All_products);
        $ProductResults = mysqli_num_rows($AllProduct_results);
        if($ProductResults == 0){
            echo '<div><img src="./images/aayein.webp"></div>';
        }
        while ($row = mysqli_fetch_assoc($AllProduct_results)) {
            $All_products_Id = $row["product_id"];
            $All_products_Name = $row["product_title"];
            $All_products_Price = $row["product_price"];
            $All_products_Keyword = $row["product_keyword"];
            $All_products_Image = $row["product_imageone"];
            echo "<div class='allproduct--card'>
                    <div class='allproduct--card--img'>
                        <img src='./admin/product_images/$All_products_Image' alt='Product--Image'>
                    </div>
                    <div class='allproduct--card--info'>
                        <h3>" . substr($All_products_Name, 0, 24) . "...</h3>
                        <span>$All_products_Keyword</span>
                        <div class='d-flex'>
                            <p class='price'>Rs: $All_products_Price</p>
                            <a href='ProductDetail.php?product_Id=$All_products_Id'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}

function get_Search_Product(){
    global $connection;
    if(isset($_GET['search_product'])){
        $p_search_product = $_GET['search_data'];
        $All_products = "SELECT * FROM `product` where product_title like '%$p_search_product%'";
        $AllProduct_results = mysqli_query($connection, $All_products);
        $ProductResults = mysqli_num_rows($AllProduct_results);
        if($ProductResults == 0){
            echo '<div><img src="./images/aayein.webp"></div>';
        }
        while ($row = mysqli_fetch_assoc($AllProduct_results)) {
            $All_products_Id = $row["product_id"];
            $All_products_Name = $row["product_title"];
            $All_products_Price = $row["product_price"];
            $All_products_Keyword = $row["product_keyword"];
            $All_products_Image = $row["product_imageone"];
            echo "<div class='allproduct--card'>
                    <div class='allproduct--card--img'>
                        <img src='./admin/product_images/$All_products_Image' alt='Product--Image'>
                    </div>
                    <div class='allproduct--card--info'>
                        <h3>" . substr($All_products_Name, 0, 24) . "...</h3>
                        <span>$All_products_Keyword</span>
                        <div class='d-flex'>
                            <p class='price'>Rs: $All_products_Price</p>
                            <a href='ProductDetail.php?product_Id=$All_products_Id'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}

function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  
      
function AddtoCart() {
    if (isset($_GET['add-to-cart'])) {
        global $connection;
        $get_ip_address = getIPAddress();
        $get_addproduct_Id = $_GET['add-to-cart'];
        // Check if the item is already in the cart
        $select_Query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address' AND product_id = '$get_addproduct_Id'";
        $Query_Result = mysqli_query($connection, $select_Query);
        $num_of_cart_row = mysqli_num_rows($Query_Result);
        if ($num_of_cart_row > 0) {
            echo "<script>alert('This item is already in the cart')</script>";
            echo "<script>window.open('ProductDetail.php?product_Id=$get_addproduct_Id', '_self')</script>";
        } else {
            // Insert the item into the cart
            $insert_cart_item = "INSERT INTO `cart_details` (`product_id`, `ip_address`, `qunatity`, `time`) VALUES ('$get_addproduct_Id', '$get_ip_address', 0, NOW())";
            $insert_result = mysqli_query($connection, $insert_cart_item);
            if ($insert_result) {
                echo "<script>alert('Item added to cart')</script>";
            } else {
                echo "<script>alert('Failed to add item to cart')</script>";
            }
            echo "<script>window.open('ProductDetail.php?product_Id=$get_addproduct_Id', '_self')</script>";
        }
    }
}
    
function Cart_item_list() {
    if (isset($_GET['add-to-cart'])) {
        global $connection;
        $get_ip_address = getIPAddress();
        $select_Query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
        $Query_Result = mysqli_query($connection, $select_Query);
        $count_cart_items = mysqli_num_rows($Query_Result);
    }else {
        global $connection;
        $get_ip_address = getIPAddress();
        $select_Query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
        $Query_Result = mysqli_query($connection, $select_Query);
        $count_cart_items = mysqli_num_rows($Query_Result);
    }
    echo $count_cart_items;
}

function Total_Price() {
    global $connection;
    $get_ip_address = getIPAddress();
    $total_price = 0;
    $Total_Query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
    $Query_Result = mysqli_query($connection, $Total_Query);
    while ($row = mysqli_fetch_array($Query_Result)) {
        $Product_Id = $row['product_id'];
        $Product_Query = "SELECT * FROM `product` WHERE product_id = '$Product_Id'";
        $product_query_result = mysqli_query($connection, $Product_Query);
        while ($row_product_price = mysqli_fetch_array($product_query_result)) {
            // Remove commas from the product price and convert it to a numeric value
            $product_price = str_replace(',', '', $row_product_price['product_price']);
            $product_values = floatval($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

?>

