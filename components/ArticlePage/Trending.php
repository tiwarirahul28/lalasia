<?php
    include("./Database/connect.php");
    include("CommonFilter.php")
?>
<div class="headline--section">
    <p class="orange--heading">Trending Topics</p>
    <h2 class="heading">Popular last week</h2>
    <div class="filter--container">
        <div class="checkbox--content">
            <ul>
                <li>
                    <a href="article.php" class="active">All</a>
                </li>
                <?php
                    $Selct_keywords = "SELECT * FROM `article_keywords`";
                    $keywords_Result = mysqli_query($connection, $Selct_keywords);
                    while ($row = mysqli_fetch_assoc($keywords_Result)) {
                        $keywords_ID = $row["article_keyword_id"];
                        $keywords_name = $row["article_keyword_name"];
                        echo "<li><a href='?keywords_Id=$keywords_ID#section'>$keywords_name</a></li>";
                    }
                ?>
            </ul>
        </div>
        <div class="filter--content">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expand ed="false">
                <img src="./images/productimages/filter.png" alt="">
                Filter
            </button>
            <ul class="dropdown-menu">
                <?php
                    Get_filterKeywords();
                ?>
            </ul>
        </div>
    </div>
    <div class="trending--conatiner" id="section">
        <?php 
            get_TrendingArtickle();
            get_filterTrendingArtickle();
        ?>
    </div>
</div>
<div class="services--interested">
    <div class="interested-text">
        <h2>Subscribe our newsletter</h2>
        <a href="">Let’s Talk</a>
    </div>
</div>

<style>
    .filter--container{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1em;
    }
    .filter--container .checkbox--content ul{
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        margin-bottom: 0;
    }
    .filter--container .checkbox--content ul li a{
        padding: 10px 30px;
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        color: #AFADB5;
        text-decoration: none;
        letter-spacing: 0.5px;
    }
    .filter--container .checkbox--content ul li a.active{
        font-weight: 600;
        color: #151411;
        box-shadow: 0px 4px 120px 0px #AFADB526;
        background-color: #F9F9F9;
    }
    .filter--content{
        background: #fff;
        box-shadow: 0px 4px 120px 0px #AFADB526;
        padding: 20px;
    }
    .filter--content button{
        background: #fff;
        color: #151411;
        font-size: 18px;
        line-height: 32px;
        font-weight: 400;
        border: none;
        padding: 10px;
        text-align: center;
        width: 100%;
    }
    .filter--content ul.show{
        width: 203px;
        left: -20px !important;
        border: 1px solid #eee;
        padding: 10px;
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        top: 20px !important;
    }
    .filter--content ul.show li {
        padding: 5px 10px;
    }
    .filter--content ul.show li a {
        text-decoration: none;
        font-size: 18px;
        line-height: 28px;
        font-weight: 400;
        color: #518581;
    }
    .trending--conatiner{
        width: 100%;
        margin-top: 2em;
    }
    .trending--conatiner .trending--card{
        display: flex;
        align-items: self-start;
        margin-bottom: 2em;
        gap: 40px;
    }
    .trending--conatiner .trending--card .card-img{
        width: 350px;
        height: 200px;
    }
    .trending--conatiner .trending--card .card-img img{
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    .trending--conatiner .trending--card .card-info span, .trending--conatiner .trending--card .card-info p{
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 400;
        color: #AFADB5;
    }
    .trending--conatiner .trending--card .card-info h2{
        font-size: 26px;
        line-height: 33.8px;
        font-weight: 600;
        color: #151411;
    }
    .trending--conatiner .trending--card .card-info .cards-info-author{
        display: flex;
        gap: 20px;
        align-items: center;
    }
    .trending--conatiner .trending--card .card-info .cards-info-author div{
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .trending--conatiner .trending--card .card-info .cards-info-author div p{
        margin: 0;
        color: #151411;
        font-size: 18px;
        line-height: 32.4px;
        font-weight: 600;
    }
    .trending--conatiner .trending--card .card-info .cards-info-author div.date p{
        font-size: 14px;
        line-height: 24px;
        font-weight: 400;
        color: #AFADB5;
    }
    .trending--conatiner .trending--card .card-info .cards-info-author a{
        color: #518581;
    }
    .services--interested{
        padding: 50px 100px;
    }
    .services--interested .interested-text{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .services--interested .interested-text h2{
        font-size: 44px;
        line-height: 57.2px;
        font-weight: 600;
        color: #151411;
    }
    .services--interested .interested-text a{
        font-size: 18px;
        line-height: 23px;
        font-weight: 600;
        color: #fff;
        background-color: #518581;
        padding: 15px 40px;
        text-decoration: none;
    }
    .cards-info-author div img{
        width: 40px;
    }
    @media screen and (max-width: 768px){
        .services--interested{
            padding: 20px;
        }
        .services--interested .interested-text{
            flex-direction: column;
            align-items: self-start;
            gap: 20px;
        }
        .services--interested .interested-text h2{
            font-size: 24px;
            line-height: 31.2px;
        }
        .services--interested .interested-text a{
            font-size: 14px;
            line-height: 23px;
            padding: 15px 40px;
            width: unset;
        }
    }
    @media screen and (max-width: 768px){
        .filter--content{
            display: none;
        }
        .filter--container{
            margin-top: 1em;
            overflow-x: scroll;
        }
        .filter--container::-webkit-scrollbar {
            display: none;
        }
        .filter--container .checkbox--content ul{
            flex-wrap: nowrap;
        }
        .filter--container .checkbox--content ul li a{
            white-space: nowrap;
        }
        .trending--conatiner .trending--card{
            gap: 15px;
            flex-direction: column;
        }
        .trending--conatiner .trending--card .card-info span, .trending--conatiner .trending--card .card-info p, .trending--conatiner .trending--card .card-info .cards-info-author div p, .trending--conatiner .trending--card .card-info .cards-info-author a{
            font-size: 12px;
            line-height: 21.4px;
        }
        .trending--conatiner .trending--card .card-info h2{
            font-size: 16px;
            line-height: 20.8px;
        }
        .trending--conatiner .trending--card .card-info .cards-info-author div.date{
            display: none;
        }
        .trending--conatiner .trending--card .card-info .cards-info-author div{
            gap: 10px;
        }
        .trending--conatiner .trending--card .card-info .cards-info-author{
            justify-content: space-between;
        }
    }
</style>