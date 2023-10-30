<?php
include("./Database/connect.php");
?>
<div class="product--section">
    <p class="orange--heading">Product</p>
    <h2 class="heading">Our popular product</h2>
    <p class="para pt-3">Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim <br>placerat nisi,
        adipiscing mauris non purus parturient.</p>
    <div class="product--slider">
        <?php
        $select_Product = "SELECT * FROM `product`";
        $Product_Result = mysqli_query($connection, $select_Product);
        while ($row = mysqli_fetch_assoc($Product_Result)) {
            $Product_ID = $row['product_id'];
            $Product_Title = $row['product_title'];
            $Product_Description = $row['product_description'];
            $Product_Keyword = $row['product_keyword'];
            $Product_Category = $row['product_category'];
            $Product_Image = $row['product_imageone'];
            $Product_Price = $row['product_price'];
            echo "<div class='product--card'>
                    <div class='procduct--card--img'>
                        <img src='./admin/product_images/$Product_Image'
                        alt=''>
                    </div>
                    <div class='product--card--info'>
                        <h3>" . substr($Product_Title, 0, 24) . "...</h3>
                        <span>$Product_Keyword</span>
                        <p class='price'>Rs: $Product_Price</p>
                    </div>
                </div>"
            ;
        }
        ?>
    </div>
</div>