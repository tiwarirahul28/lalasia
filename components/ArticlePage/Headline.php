<?php
    include("./Database/connect.php");
?>
<div class="headline--section">
    <p class="orange--heading">Daily News</p>
    <h2 class="heading">Today top headlines</h2>
    <div class="headline--cards">
        <?php 
        $All_Article = "SELECT * FROM `article` INNER JOIN `article_keywords` ON article.article_keyword = article_keywords.article_keyword_id ORDER BY rand() LIMIT 2";
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
                echo"<div class='cards'>
                        <img src='./admin/product_images/$All_Article_Image' alt=''>
                        <div class='cards-info'>
                            <span>$All_Article_Keyword_Name</span>
                            <h2>". substr($All_Article_Name, 0, 40) ."...</h2>
                            <p>". substr($All_Article_Descrip, 0, 100) ."...</p>
                            <div class='cards-info-author'>
                                <div>
                                    <img src='./admin/product_images/$All_Article_Author_Img' alt=''>
                                    <p>By $All_Article_Author_Name</p>
                                </div>
                                <div class='date'>
                                    <p>$formatted_date</p>
                                </div>
                            </div>
                            <a href='ArticleDetails.php?article_Id=$All_Article_Id'>Read More</a>
                        </div>
                    </div>";
                }
        ?>
    </div>
</div>

<style>
    .headline--section{
        padding: 100px;
    }
    .headline--section .headline--cards{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 50px;
        padding-top: 50px;
    }
    .headline--section .headline--cards .cards{
        width: 100%;
    }
    .headline--section .headline--cards .cards img{
        width: 100%;
        height: 350px;
    }
    .headline--section .headline--cards .cards .cards-info{
        padding-top: 20px;
    }
    .headline--section .headline--cards .cards .cards-info span{
        font-size: 18px;
        line-height: 32px;
        color: #AFADB5;
        font-weight: 400;
    }
    .headline--section .headline--cards .cards .cards-info h2{
        font-size: 26px;
        line-height: 36px;
        color: #151411;
        font-weight: 600;
        margin-bottom: 0;
    }
    .headline--section .headline--cards .cards .cards-info p{
        font-size: 18px;
        line-height: 32px;
        color: #AFADB5;
        font-weight: 400;
        margin-bottom: 0;
    }
    .headline--section .headline--cards .cards .cards-info a{
        text-decoration: none;
        background-color: #518581;
        padding: 15px 40px;
        color: #fff;
        font-size: 16px;
        font-weight: 400;
    }
    .headline--section .headline--cards .cards .cards-info-author{
        display: flex;
        align-items: center;
        gap: 30px;
        padding-top: 10px;
        margin-bottom: 2.5em;
    }
    .headline--section .headline--cards .cards .cards-info-author div{
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .headline--section .headline--cards .cards .cards-info-author div img{
        width: 40px;
        height: 40px;
    }
    .headline--section .headline--cards .cards .cards-info-author div p{
        margin-bottom: 0;
        font-size: 14px;
        line-height: 25px;
        color: #151411;
        font-weight: 600;
    }
    .headline--section .headline--cards .cards .cards-info-author div.date p{
        font-size: 14px;
        line-height: 25px;
        color: #AFADB5;
        font-weight: 400;   
    }
    @media screen and (max-width: 768px){
        .headline--section{
            padding: 50px 20px;
        }
        .headline--section .headline--cards{
            grid-template-columns: repeat(1, 1fr);
            gap: 50px;
            padding-top: 30px;
        }
        .headline--section .headline--cards .cards img{
            height: 250px;
        }
        .headline--section .headline--cards .cards .cards-info-author{
            margin-bottom: 1.5em;
        }
        .headline--section .headline--cards .cards .cards-info{
            padding-top: 10px;
        }
        .headline--section .headline--cards .cards .cards-info span, .headline--section .headline--cards .cards .cards-info p, .headline--section .headline--cards .cards .cards-info-author div p, .headline--section .headline--cards .cards .cards-info-author div.date p{
            font-size: 12px;
            line-height: 22px;
        }
        .headline--section .headline--cards .cards .cards-info h2{
            font-size: 14px;
            line-height: 18px;
        }
        .headline--section .headline--cards .cards .cards-info a{
            font-size: 12px;
            line-height: 22px;
        }
    }
</style>