<?php
include("./Database/connect.php");
?>
<div class="allproduct--section">
    <div class="allproduct--toppart">
        <h2 class="heading">Total Product</h2>
        <div class="sf--filter">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expand ed="false">
                <img src="./images/productimages/filter.png" alt="">
                Sort
            </button>
            <ul class="dropdown-menu">
                <?php
                $Selct_category = "SELECT * FROM `category`";
                $category_Result = mysqli_query($connection, $Selct_category);
                while ($row = mysqli_fetch_assoc($category_Result)) {
                    $category_ID = $row["category_id"];
                    $category_name = $row["category-name"];
                    echo '<li><a href="product.php?category=' . $category_ID . '">' . $category_name . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="allproduct--bottom">
        <?php
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
                        <p class='price'>Rs: $All_products_Price</p>
                    </div>
                </div>";
        }
        ?>
    </div>
</div>
<style>
    .allproduct--section {
        padding: 50px 100px 50px
    }

    .allproduct--toppart {
        display: grid;
        grid-template-columns: 85% 15%;
        align-items: center;
        gap: 2em;
    }

    .allproduct--bottom {
        padding-top: 50px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2em;
    }

    .allproduct--bottom .allproduct--card {
        width: 100%;
        height: 500px;
    }

    .allproduct--bottom .allproduct--card .allproduct--card--img {
        width: 100%;
        height: 350px;
    }

    .allproduct--bottom .allproduct--card .allproduct--card--img img {
        width: 100%;
        height: 100%;
    }

    .allproduct--bottom .allproduct--card .allproduct--card--info {
        height: 150px;
        padding: 10px 0px;

    }

    .allproduct--bottom .allproduct--card .allproduct--card--info h3 {
        font-size: 26px;
        line-height: 33.8px;
        font-weight: 600;
        color: #151411;
        margin: 0;
    }

    .allproduct--bottom .allproduct--card .allproduct--card--info span {
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        color: #AFADB5;
    }

    .allproduct--bottom .allproduct--card .allproduct--card--info .price {
        font-size: 24px;
        line-height: 31.2px;
        font-weight: 600;
        color: #151411;
    }

    @media screen and (max-width: 768px) {
        .allproduct--section {
            padding: 40px 20px;
        }

        .allproduct--toppart {
            grid-template-columns: repeat(1, 1fr);
        }

        .allproduct--bottom {
            padding-top: 20px;
            grid-template-columns: repeat(1, 1fr);
        }

        .allproduct--bottom .allproduct--card .allproduct--card--info h3 {
            font-size: 14px;
            line-height: 18.2px;
        }

        .allproduct--bottom .allproduct--card .allproduct--card--info span {
            font-size: 12px;
            line-height: 21.6px;
        }

        .allproduct--bottom .allproduct--card .allproduct--card--info .price {
            font-size: 14px;
            line-height: 18.2px;
        }

    }
</style>