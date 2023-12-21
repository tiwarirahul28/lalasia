<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:sign-in.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lalasia</title>
    <link rel="icon" href="./images/Frame.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // session_start();
    // if (!isset($_SESSION['user_name'])){
    //     header('location:sign-in.php');
    // }
    include('./components/Header.php') ?>
    <div class="banner">
        <div class="container-fluid">
            <span class="arrow"><img src="./images/Sketch-annotation-element-stroke-line-arrow-spiral-down-5.png" alt="sketch--icon"></span>
            <span class="star--icon">
                <img src="./images/star--icon.png" alt="star--icon">
            </span>
            <h1>Discover Furniture With
                High Quality Wood</h1>
            <p>Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing
                mauris non. Purus parturient viverra nunc, tortor sit laoreet. Quam tincidunt aliquam adipiscing tempor.
            </p>
        </div>
    </div>
    <div class="banner-container">
        <div class="banner-form">
            <img src="./images/search-normal.png" alt="search-icon">
            <form action="product.php#top">
                <input type="search" placeholder="Search property" name="search_data" autocomplete="off">
                <input class="search-btn" type="submit" value="Find Now" name="search_product">
            </form>
        </div>
        <div class="banner-img">
            <img src="./images/banner.png" alt="banner-image">
        </div>
    </div>
    <?php include('./components/Homepage/Benefits.php') ?>
    <?php include('./components/Homepage/HomeProduct.php') ?>
    <?php include('./components/Homepage/Crafetd.php') ?>
    <?php include('./components/Homepage/Testimonial.php') ?>
    <?php include('./components/Homepage/HomeArticle.php') ?>
    <?php include('./components/Footer.php') ?>
    <?php include('./components/Scripts.php') ?>
</body>

</html>