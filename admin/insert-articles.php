<?php
include("../Database/connect.php");
if (isset($_POST["insert_article"])) {
    $Article_title = $_POST["article_title"];
    $Article_description = $_POST["article_description"];
    $Article_keyword = $_POST["article_keyword"];
    $Article_authorname = $_POST["article_author_name"];
    $Article_status = "true";

    // For images
    $Article_authorimg = $_FILES["article_author_img"]['name'];
    $Article_imageone = $_FILES["article_imageone"]['name'];
    $Article_imagetwo = $_FILES["article_imagetwo"]['name'];
    $Article_imagethree = $_FILES["article_imagethree"]['name'];

    $tmp_authImg = $_FILES["article_author_img"]['tmp_name'];
    $tmp_imageone = $_FILES["article_imageone"]['tmp_name'];
    $tmp_imagetwo = $_FILES["article_imagetwo"]['tmp_name'];
    $tmp_imagethree = $_FILES["article_imagethree"]['tmp_name'];

    if ($Article_title == '' || $Article_description == '' || $Article_keyword == '' || $Article_authorname == '' || $Article_authorimg == '' || $Article_imageone == '' || $Article_imagetwo == '' || $Article_imagethree == '') {
        echo "<script>alert('Please fill in all the available fields');</script>";
    } else {
        move_uploaded_file($tmp_authImg, "./product_images/$Article_authorimg");
        move_uploaded_file($tmp_imageone, "./product_images/$Article_imageone");
        move_uploaded_file($tmp_imagetwo, "./product_images/$Article_imagetwo");
        move_uploaded_file($tmp_imagethree, "./product_images/$Article_imagethree");

        $Insert_Article = "INSERT INTO `article`(`article_name`, `article_description`, `article_keyword`, `article_author_name`, `article_author_img`, `article_imgone`, `article_imgtwo`, `article_imgthree`, `date`, `status`) VALUES('$Article_title', '$Article_description', '$Article_keyword', '$Article_authorname', '$Article_authorimg', '$Article_imageone', '$Article_imagetwo', '$Article_imagethree', NOW(), '$Article_status')";

        $product_Result = mysqli_query($connection, $Insert_Article);
        if ($product_Result) {
            echo "<script>alert('Product has been inserted successfully');</script>";
        } else {
            echo "<script>alert('An error occurred while inserting the product');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/Frame.svg">
    <title>Insert Articles</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <?php include('./components/AdminHeader.php') ?>
    <div class="admin--section insert-article">
        <h1 class="text-center">Insert Articles</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form--outline">
                <label for="article_title">Article Title</label>
                <input type="text" name="article_title" id="article_title" placeholder="Enter Article Title"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="article_description">Article Description</label>
                <textarea name="article_description" id="article_description" placeholder="Enter Article Description"
                    autocomplete="off" rows="5" cols="50"></textarea>
            </div>
            <div class="form--outline">
                <label for="article_keyword">Article Category</label>
                <select name="article_keyword" id="article_keyword" class="form-select">
                    <option value="">Select a KeyWords</option>
                    <?php
                    $selectArticleKeyword = "SELECT * FROM `article_keywords`";
                    $selectResult = mysqli_query($connection, $selectArticleKeyword);
                    while ($row = mysqli_fetch_assoc($selectResult)) {
                        $ArticleKeyword_id = $row['article_keyword_id'];
                        $Keyword_name = $row['article_keyword_name'];
                        echo '<option value="' . $ArticleKeyword_id . '">' . $Keyword_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form--outline">
                <label for="article_author_name">Article Author</label>
                <input type="text" name="article_author_name" id="article_author_name" placeholder="Enter Article Author"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="article_author_img">Article Author Image</label>
                <input type="file" name="article_author_img" id="article_author_img" placeholder="Enter Article Author Image"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="article_imageone">Article Image One</label>
                <input type="file" name="article_imageone" id="article_imageone" placeholder="Enter Article Image One"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="article_imagetwo">Article Image Two</label>
                <input type="file" name="article_imagetwo" id="article_imagetwo" placeholder="Enter Article Image Two"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="article_imagethree">Article Image Three</label>
                <input type="file" name="article_imagethree" id="article_imagethree"
                    placeholder="Enter Article Image Three" autocomplete="off">
            </div>
            <div class="form--outline">
                <input type="submit" value="Insert article" name="insert_article">
            </div>
        </form>
    </div>
    <?php include('./components/AdminFooter.php') ?>
</body>
</html>