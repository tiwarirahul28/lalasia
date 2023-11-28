<?php
include("./Database/connect.php");
?>
<div class="product--section">
    <p class="orange--heading">Product</p>
    <h2 class="heading">Our popular product</h2>
    <p class="para pt-3">Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi,
        adipiscing mauris non purus parturient.</p>
    <div class="product--slider">
        <?php
        $select_Product = "SELECT * FROM `product` INNER JOIN `category` ON product.product_category = category.category_id ORDER BY rand() LIMIT 6";
        $Product_Result = mysqli_query($connection, $select_Product);
        while ($row = mysqli_fetch_assoc($Product_Result)) {
            $Product_ID = $row['product_id'];
            $Product_Title = $row['product_title'];
            $Product_Description = $row['product_description'];
            $Product_Keyword = $row['product_keyword'];
            $Product_Category = $row['category-name'];
            $Product_Image = $row['product_imageone'];
            $Product_Price = $row['product_price'];
            echo "<div class='product--card'>
                    <div class='procduct--card--img'>
                        <img src='./admin/product_images/$Product_Image'
                        alt=''>
                    </div>
                    <div class='product--card--info'>
                        <span>$Product_Category</span>
                        <h3>" . substr($Product_Title, 0, 24) . "...</h3>
                        <span>$Product_Keyword</span>
                        <div class='d-flex'>
                            <p class='price'>Rs: $Product_Price</p>
                            <a href='ProductDetail.php?product_Id=$Product_ID'>View More</a>
                        </div>
                    </div>
                </div>"
            ;
        }
        ?>
    </div>
</div>