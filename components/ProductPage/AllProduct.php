<?php
include("./Database/connect.php");
include("CommonFunction.php");
?>
<div class="allproduct--section">
    <div class="allproduct--toppart">
        <h2 class="heading">All Product</h2>
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
                    echo '<li><a href="?category=' . $category_ID . '">' . $category_name . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="allproduct--bottom">
        <?php
        getAllProducts();
        get_filter_products();
        get_Search_Product();
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
        position: relative;
    }
    .allproduct--bottom .allproduct--card .allproduct--card--info .d-flex {
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
    }
    .allproduct--bottom .allproduct--card .allproduct--card--info .d-flex a {
        text-decoration: none;
        color: #fff;
        background-color: #518581;
        padding: 10px 30px;
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
        margin-bottom: 0;
    }
    .allproduct--bottom div img{
        width: 100%;
    }

    @media screen and (max-width: 768px) {
        .allproduct--section {
            padding: 40px 20px;
        }

        .allproduct--toppart {
            grid-template-columns: repeat(1, 1fr);
        }
        .allproduct--bottom .allproduct--card{
            height: 300px;
        }
        .allproduct--bottom .allproduct--card .allproduct--card--img{
            height: 150px;
        }
        .allproduct--bottom {
            padding-top: 20px;
            grid-template-columns: repeat(2, 1fr);
            gap: 1em;
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
        .allproduct--bottom .allproduct--card .allproduct--card--info .d-flex{
            padding-top: 15px;
            position: absolute;
            width: 100%;
            bottom: 20px;
        }
        .allproduct--bottom .allproduct--card .allproduct--card--info .d-flex a{
            padding: 5px 10px;
            font-size: 14px;
        }

    }
</style>