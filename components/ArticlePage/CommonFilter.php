<?php 
include("./Database/connect.php");
function get_TrendingArtickle() {
    global $connection;
    if(!isset($_GET["keywords_Id"])) {
        $All_Article = "SELECT * FROM `article` INNER JOIN `article_keywords` ON article.article_keyword = article_keywords.article_keyword_id";
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
                        <h2> $All_Article_Name</h2>
                        <p>". substr($All_Article_Descrip, 0, 200) ."...</p>
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
    };
}

function get_filterTrendingArtickle() {
    global $connection;
    if(isset($_GET['keywords_Id'])) {
        $Keywords_ID = $_GET['keywords_Id'];
        // $All_Article = "SELECT * FROM `article` WHERE article_keyword = '$Keywords_ID'";
        $All_Article = "SELECT * FROM `article` INNER JOIN `article_keywords` ON article.article_keyword = article_keywords.article_keyword_id WHERE article.article_keyword = '$Keywords_ID'";
        $Allatricle_results = mysqli_query($connection, $All_Article);
        $ArticleResults = mysqli_num_rows($Allatricle_results);
        if($ArticleResults == 0){
            echo '<div><img src="./images/aayein.webp"></div>';
        }
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
                        <h2> $All_Article_Name</h2>
                        <p>". substr($All_Article_Descrip, 0, 200) ."...</p>
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
    }
}

function Get_filterKeywords(){
    global $connection;
    $Selct_keywords = "SELECT * FROM `article_keywords`";
    $keywords_Result = mysqli_query($connection, $Selct_keywords);
    while ($row = mysqli_fetch_assoc($keywords_Result)) {
        $keywords_ID = $row["article_keyword_id"];
        $keywords_name = $row["article_keyword_name"];
        echo "<li><a href='?keywords_Id=$keywords_ID'>$keywords_name</a></li>";
    }
}
?>