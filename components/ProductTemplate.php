<?php
include("./Database/connect.php");
require_once("./components/ProductPage/CommonFunction.php");

if(isset($_GET['product_Id'])){
    $gotProductID = $_GET['product_Id'];
    $All_products = "SELECT * FROM `product` WHERE `product_Id` = '$gotProductID'";
    $AllProduct_results = mysqli_query($connection, $All_products);
    while ($row = mysqli_fetch_assoc($AllProduct_results)) {
        $All_products_Id = $row["product_id"];
        $All_products_Name = $row["product_title"];
        $All_products_Price = $row["product_price"];
        $All_products_Keyword = $row["product_keyword"];
        $All_products_Description = $row["product_description"];
        $All_products_ImageOne = $row["product_imageone"];
        $All_products_ImageTwo = $row["product_imagetwo"];
        $All_products_ImageThree = $row["product_imagethree"];
    }
}
?>
<div class="productdetail--section">
    <div class="productdetail--section--img">
        <img src="./admin/product_images/<?php echo $All_products_ImageOne;?>" alt="Product--Image">
    </div>
    <div class="productdetail--section--info">
        <h1><?php echo $All_products_Name;?></h1>
        <span><?php echo $All_products_Keyword;?></span>
        <p><?php echo $All_products_Description;?></p>
        <h5 class="price">Rs: <?php echo $All_products_Price;?></h5>
        <div class="productdetail--button">
            <a href="">Buy Now</a>
            <?php AddtoCart(); ?>
            <a href="?add-to-cart=<?php echo $All_products_Id;?>" class="atc">Add To Cart</a>
        </div>
    </div>
</div>
<div class="related--section">
    <h1 class="heading" c>Related Images</h1>
    <div class="related--image">
        <div>
            <img src="./admin/product_images/<?php echo $All_products_ImageTwo;?>" alt="Product--Image">
        </div>
        <div>
            <img src="./admin/product_images/<?php echo $All_products_ImageThree;?>" alt="Product--Image">
        </div>
    </div>
</div>
<style>
    .related--section{
        padding: 50px 100px;
    }
    .related--image{
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        margin-top: 2em;
    }
    .related--image div, .related--image div img{
        width: 100%;
        height: 400px;
    }
    .related--image div img{
        width: 100%;
        height: 100%;
    }
    .productdetail--section{
        padding: 150px 100px 50px;
        display: grid;
        grid-template-columns: 40% 55%;
        gap: 5%;
    }
    .productdetail--section .productdetail--section--img, .productdetail--section .productdetail--section--img img{
        width: 100%;
        height: 600px;
    }
    .productdetail--section .productdetail--section--info{
        padding: 20px 0;
    }
    .productdetail--section .productdetail--section--info h1{
        font-size: 44px;
        line-height: 57.2px;
        font-weight: 600;
        text-transform: capitalize;
        color: #151411;
    }
    .productdetail--section .productdetail--section--info span, .productdetail--section .productdetail--section--info p{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        text-transform: capitalize;
        color: #AFADB5;
        padding: 10px 0;
    }
    .productdetail--section .productdetail--section--info .price{
        font-size: 44px;
        line-height: 57.2px;
        font-weight: 600;
        text-transform: capitalize;
        color: #151411;
        padding-top: 30px;
    }
    .productdetail--button{
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 50px;
        padding-top: 50px;
    }
    .productdetail--button a{
        background-color: #518581;
        width: 100%;
        text-align: center;
        padding: 15px 0;
        text-decoration: none;
        color: #fff;
        font-size: 18px;
        line-height: 23.4px;
        font-weight: 600;
    }
    .productdetail--button .atc{
        background-color: #fff;
        border: 2px solid #F3F3F3;
        color: #151411;
    }
    @media screen and (max-width: 768px) {
        .related--section{
            padding: 50px 20px;
        }
        .related--image{
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 1em;
        }
        .related--image div{
            height: 200px;
        }
        .productdetail--section{
            padding: 100px 20px 30px;
            grid-template-columns: repeat(1, 1fr);
            gap: 0%;
        }
        .productdetail--section .productdetail--section--img, .productdetail--section .productdetail--section--img img{
            /* width: 100%; */
            height: 400px;
        }
        .productdetail--section .productdetail--section--info h1{
            font-size: 24px;
            line-height: 31.2px;
        }
        .productdetail--section .productdetail--section--info{
            padding: 20px 0;
        }
        .productdetail--section .productdetail--section--info span, .productdetail--section .productdetail--section--info p{
            font-size: 14px;
            line-height: 25.2px;
        }
        .productdetail--section .productdetail--section--info .price{
            font-size: 24px;
            line-height: 31.2px;
            padding-top: 0;
        }
        .productdetail--button{
            padding-top: 20px;
            gap: 20px;
            flex-direction: column;
        }
    }
</style>