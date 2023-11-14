<?php 
include("./Database/connect.php");
function getAllProducts(){
    global $connection;
    if(!isset($_GET['category'])){
        if (!isset($_GET['search_product'])) {
            $All_products = "SELECT * FROM `product` order by rand()";
            $AllProduct_results = mysqli_query($connection, $All_products);
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
}
// function getProductDetail(){
//     global $connection;
//     if(isset($_GET['product_Id'])){
//         $All_products = "SELECT * FROM `product` order by rand()";
//         $AllProduct_results = mysqli_query($connection, $All_products);
//         while ($row = mysqli_fetch_assoc($AllProduct_results)) {
//             $All_products_Id = $row["product_id"];
//             $All_products_Name = $row["product_title"];
//             $All_products_Price = $row["product_price"];
//             $All_products_Keyword = $row["product_keyword"];
//             $All_products_Image = $row["product_imageone"];
//             echo "<div class='allproduct--card'>
//                     <div class='allproduct--card--img'>
//                         <img src='./admin/product_images/$All_products_Image' alt='Product--Image'>
//                     </div>
//                     <div class='allproduct--card--info'>
//                         <h3>" . substr($All_products_Name, 0, 24) . "...</h3>
//                         <span>$All_products_Keyword</span>
//                         <div class='d-flex'>
//                             <p class='price'>Rs: $All_products_Price</p>
//                             <a href='ProductDetail.php?product_Id=$All_products_Id'>View More</a>
//                         </div>
//                     </div>
//                 </div>";
//         }
//     } 
// }
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
?>

