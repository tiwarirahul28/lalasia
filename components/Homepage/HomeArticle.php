<?php
    include("./Database/connect.php");
    // include("ArticlePage/CommonFilter.php");
?>
<div class="homearticle">
    <div class="homearticle--slider">
        <p class="orange--heading">Articles</p>
        <h2 class="heading">The best furniture comes from Lalasia</h2>
        <p>Pellentesque etiam blandit in tincidunt at donec. </p>
        <div class="article--slider">
            <?php
                $All_Article = "SELECT * FROM `article` INNER JOIN `article_keywords` ON article.article_keyword = article_keywords.article_keyword_id LIMIT 3";
                // $All_Article = "SELECT * FROM `article` order by rand() limit 1";
                $Allatricle_results = mysqli_query($connection, $All_Article);
                while ($row = mysqli_fetch_assoc($Allatricle_results)) {
                    $All_Article_Id = $row["article_id"];
                    $All_Article_Name = $row["article_name"];
                    $All_Article_Descrip = $row["article_description"];
                    $All_Article_Keyword_Name = $row["article_keyword_name"];
                    $All_Article_Image = $row["article_imgone"];
                    $All_Article_Author_Name = $row["article_author_name"];
                    $All_Article_Author_Img = $row["article_author_img"];
                    $All_Article_Date = $row["date"];
                    $formatted_date = date("l, d F Y", strtotime($All_Article_Date));
                    echo"<div class='article--slider--card'>
                            <div class='card-img'>
                                <img src='./admin/product_images/$All_Article_Image' alt=''>
                            </div>
                            <div class='card-info'>
                                <span>$All_Article_Keyword_Name</span>
                                <h2>". substr($All_Article_Name, 0, 40) ."...</h2>
                                <p>". substr($All_Article_Descrip, 0, 30) ."...</p>
                                <a href='ArticleDetails.php?article_Id=$All_Article_Id'>Read More</a>
                            </div>
                        </div>";
                    }
            ?>
        </div>
    </div>
    <div class="homearticle--content">
        <?php
            $All_Article = "SELECT * FROM `article` INNER JOIN `article_keywords` ON article.article_keyword = article_keywords.article_keyword_id LIMIT 3";
            // $All_Article = "SELECT * FROM `article` order by rand() limit 1";
            $Allatricle_results = mysqli_query($connection, $All_Article);
            while ($row = mysqli_fetch_assoc($Allatricle_results)) {
                $All_Article_Id = $row["article_id"];
                $All_Article_Name = $row["article_name"];
                $All_Article_Descrip = $row["article_description"];
                $All_Article_Keyword_Name = $row["article_keyword_name"];
                $All_Article_Image = $row["article_imgone"];
                $All_Article_Author_Name = $row["article_author_name"];
                $All_Article_Author_Img = $row["article_author_img"];
                $All_Article_Date = $row["date"];
                $formatted_date = date("l, d F Y", strtotime($All_Article_Date));
                echo"<div class='trending--card'>
                        <div class='card-img'>
                            <img src='./admin/product_images/$All_Article_Image' alt=''>
                        </div>
                        <div class='card-info'>
                            <span>$All_Article_Keyword_Name</span>
                            <h2>". substr($All_Article_Name, 0, 50) ."...</h2>
                            <p>". substr($All_Article_Descrip, 0, 30) ."...</p>
                            <div class='cards-info-author'>
                                <div>
                                    <img src='./admin/product_images/$All_Article_Author_Img' alt=''>
                                    <p>By $All_Article_Author_Name</p>
                                </div>
                                <div class='date'>
                                    <p>$formatted_date</p>
                                </div>
                                <a href='ArticleDetails.php?article_Id=$All_Article_Id'>Read More</a>
                            </div>
                        </div>
                    </div>";
                }
        ?>
    </div>
</div>
<style>
    .homearticle{
        padding: 50px 100px;
        display: grid;
        grid-template-columns: 50% 50%;
        gap: 2em;
    }
    .homearticle--slider{
        width: 100%;
        background: linear-gradient(180deg, rgba(21, 20, 17, 0) 34.49%, #151411 166.09%);

    }
    .homearticle--slider .article--slider, .homearticle--slider .article--slider--card{
        width: 100%;
        /* height: 100%; */
    }
    .homearticle--slider .article--slider--card div{
        width: 100%;
        height: 580px;
        position: relative;
        background: linear-gradient(180deg, rgba(21, 20, 17, 0) 0%, #151411 120.09%);
    }
    .homearticle--slider .article--slider--card div img{
        width: 100%;
        height: 100%;
    }
    .homearticle--slider .article--slider--card .card-info{
        position: absolute;
        bottom: 0;
        height: auto;
        padding: 3em;
    }
    .article--slider{
        position: relative;
    }
    .article--slider .slick-prev{
        position: absolute;
        right: 8%;
        bottom: -1em;
        z-index: 1;
        /* transform: translateY(-50%); */
        color: transparent;
        background-color: #FFFFFF;
        box-shadow: 0px 4px 90px 0px #AFADB533;
        border: none;
        padding: 10px 30px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30px;
    }
    .article--slider .slick-prev::before{
        content: '' !important;
        position: absolute;
        background-image: url(./images/arrow-left.png);
        background-size: 20px;
        background-repeat: no-repeat;
        left: 25%;
        top: 25%;
        width: 20px;
        height: 20px;
    }
    .article--slider .slick-next{
        position: absolute;
        right: 0;
        bottom: -1em;
        /* transform: translateY(-50%); */
        color: transparent;
        background-color: #518581;
        box-shadow: 0px 4px 90px 0px #AFADB533;
        border: none;
        padding: 10px 30px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30px;
    }
    .article--slider .slick-next::before{
        content: '' !important;
        position: absolute;
        background-image: url(./images/arrow-right.png);
        background-size: 20px;
        background-repeat: no-repeat;
        left: 25%;
        top: 25%;
        width: 20px;
        height: 20px;
    }
    .homearticle--content{
        width: 100%;
    }
    .homearticle--content .trending--card{
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 2em;
    }
    .homearticle--content .trending--card .card-img{
        width: 350px;
        height: 250px;
    }
    .homearticle--content .trending--card .card-img img{
        width: 350px;
        height: 100%;
    }
    .homearticle--content .trending--card .card-info span, .homearticle--content .trending--card .card-info p, .homearticle--slider .article--slider--card .card-info span, .homearticle--slider .article--slider--card .card-info p{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        color: #AFADB5;
    }
    .homearticle--content .trending--card .card-info h2, .homearticle--slider .article--slider--card .card-info h2{
        font-size: 24px;
        line-height: 32.4px;
        font-weight: 600;
        color: #151411;
    }
    .homearticle--slider .article--slider--card .card-info h2{
        color: #fff;
    }
    .cards-info-author{
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }
    .cards-info-author div{
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .cards-info-author div img{
        width: 30px;
    }
    .homearticle--content .trending--card .card-info .cards-info-author div p{
        font-size: 14px;
        line-height: 18.4px;
        font-weight: 600;
        color: #151411;
        margin-bottom: 0;
    }
    .homearticle--content .trending--card .card-info .cards-info-author .date p{
        color: #AFADB5;
    }
</style>