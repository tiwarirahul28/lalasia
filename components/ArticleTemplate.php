<?php
include("./Database/connect.php");

if(isset($_GET['article_Id'])){
    $gotArticleID = $_GET['article_Id'];
    $All_Article = "SELECT * FROM `article` INNER JOIN `article_keywords` ON article.article_keyword = article_keywords.article_keyword_id WHERE `article_id` = '$gotArticleID'";
    $AllProduct_results = mysqli_query($connection, $All_Article);
    while ($row = mysqli_fetch_assoc($AllProduct_results)) {
        $All_Article_Id = $row["article_id"];
        $All_Article_Name = $row["article_name"];
        $All_Article_Description = $row["article_description"];
        $All_Article_Keyword = $row["article_keyword_name"];
        $All_Article_author_name = $row["article_author_name"];
        $All_Article_author_img = $row["article_author_img"];
        $All_Article_Imageone = $row["article_imgone"];
        $All_Article_ImageTwo = $row["article_imgtwo"];
        $All_Article_ImageThree = $row["article_imgthree"];
        $All_Article_Date = $row["date"];
        $formatted_date = date("l, d F Y", strtotime($All_Article_Date));
    }
}
?>
<div class="article--template--section">
    <div class="banner--conatiner">
        <h1><?php echo $All_Article_Name ?></h1>
        <span><?php echo $All_Article_Keyword ?></span>
        <img src="./admin/product_images/<?php echo $All_Article_Imageone;?>" alt="">
        <div class="author">
            <div>
                <img src="./admin/product_images/<?php echo $All_Article_author_img;?>" alt="">
                <p><?php echo $All_Article_author_name ?></p>
            </div>
            <div>
                <p><?php echo $formatted_date ?></p>
            </div>
        </div>
    </div>
    <div class="article--template--info">
        <p><?php echo $All_Article_Description ?></p>
        <div class="article--extra--img">
            <div>
                <img src="./admin/product_images/<?php echo $All_Article_ImageTwo;?>" alt="">
            </div>
            <div>
                <img src="./admin/product_images/<?php echo $All_Article_ImageThree;?>" alt="">
            </div>
        </div>
    </div>
</div>
<style>
    .article--template--section{
        padding: 250px 100px 100px;
    }
    .article--template--section .banner--conatiner{
        text-align: center;
    }
    .article--template--section .banner--conatiner h1{
        font-size: 64px;
        line-height: 83.2px;
        font-weight: 600;
        color: #151411;
    }
    .article--template--section .banner--conatiner span{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        color: #AFADB5;
    }
    .article--template--section .banner--conatiner img{
        width: 100%;
        height: 600px;
        margin-top: 3em;
    }
    .article--template--section .banner--conatiner .author{
        margin: 20px 0;
    }
    .article--template--section .banner--conatiner .author, .article--template--section .banner--conatiner .author div{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .article--template--section .banner--conatiner .author div {
        gap: 20px;
    }
    .article--template--section .banner--conatiner .author div img{
        width: 40px;
        height: 40px;
        margin-top: 0;
    }
    .article--template--section .banner--conatiner .author div p{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        color: #AFADB5;
        margin-bottom: 0;
    }
    .article--template--section .article--template--info p{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        color: #AFADB5;
        margin-bottom: 0;
    }
    .article--template--section .article--template--info .article--extra--img{
        margin-top: 3em;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    .article--template--section .article--template--info .article--extra--img div{
        width: 100%;
        height: 500px;
    }
    .article--template--section .article--template--info .article--extra--img div img{
        width: 100%;
    }
    @media screen and (max-width: 768px){
        .article--template--section{
            padding: 150px 20px 50px;
        }
        .article--template--section .banner--conatiner h1{
            font-size: 26px;
            line-height: 33.8px;
        }
        .article--template--section .banner--conatiner span, .article--template--section .article--template--info p{
            font-size: 14px;
            line-height: 25.2px;
        }
        .article--template--section .banner--conatiner .author div{
            gap: 5px;
        }
        .article--template--section .banner--conatiner .author div p{
            font-size: 12px;
            line-height: 20.2px;
        }
        .article--template--section .banner--conatiner img, .article--template--section .article--template--info .article--extra--img div{
            height: auto;
            margin-top: 1em;
        }

    }
</style>