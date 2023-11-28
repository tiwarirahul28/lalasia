<?php
include("../Database/connect.php");
if (isset($_POST["insert-keyword"])) {
    $Keyword_name = $_POST["article_keyword_name"];

    $selectQuery = "SELECT * FROM `article_keywords` WHERE `article_keyword_name` = '$Keyword_name'";
    $KeywordResult = mysqli_query($connection, $selectQuery);
    $nameResult = mysqli_num_rows($KeywordResult);
    if ($nameResult > 0) {
        echo "<script>alert('This already exists');</script>";
    } elseif ($Keyword_name === '') {
        echo "<script>alert('Please fill in all the available fields');</script>";
    } else {
        $insertKeyword = "INSERT INTO `article_keywords` (`article_keyword_name`) VALUES ('$Keyword_name')";
        $insertResult = mysqli_query($connection, $insertKeyword);
        if ($insertResult) {
            echo "<script>alert('Categories have been updated successfully');</script>";
        } else {
            echo "<script>alert('An error occurred while inserting the category');</script>";
        }
    }
}

?>
<form action="" method="POST">
    <div class="input-group">
        <input type="text" class="form-control" name="article_keyword_name" placeholder="Insert KeyWords"
            aria-label="category" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <input class="p-2" type="submit" name="insert-keyword" value="Insert KeyWords">
    </div>
</form>