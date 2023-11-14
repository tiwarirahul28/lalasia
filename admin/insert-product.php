<?php
include("../Database/connect.php");
if (isset($_POST["insert_product"])) {
    $product_title = $_POST["product_title"];
    $product_description = $_POST["product_description"];
    $product_keyword = $_POST["product_keyword"];
    $product_category = $_POST["product_category"];
    $product_price = $_POST["product_price"];
    $product_status = "true";

    // For images
    $product_imageone = $_FILES["product_imageone"]['name'];
    $product_imagetwo = $_FILES["product_imagetwo"]['name'];
    $product_imagethree = $_FILES["product_imagethree"]['name'];

    $tmp_imageone = $_FILES["product_imageone"]['tmp_name'];
    $tmp_imagetwo = $_FILES["product_imagetwo"]['tmp_name'];
    $tmp_imagethree = $_FILES["product_imagethree"]['tmp_name'];

    if ($product_title == '' || $product_description == '' || $product_keyword == '' || $product_category == '' || $product_price == '' || $product_imageone == '' || $product_imagetwo == '' || $product_imagethree == '') {
        echo "<script>alert('Please fill in all the available fields');</script>";
    } else {
        move_uploaded_file($tmp_imageone, "./product_images/$product_imageone");
        move_uploaded_file($tmp_imagetwo, "./product_images/$product_imagetwo");
        move_uploaded_file($tmp_imagethree, "./product_images/$product_imagethree");

        $Insert_product = "INSERT INTO `product` (`product_title`, `product_description`, `product_keyword`, `product_category`, `product_imageone`, `product_imagetwo`, `product_imagethree`, `product_price`, `date`, `status`) VALUES('$product_title', '$product_description', '$product_keyword', '$product_category', '$product_imageone', '$product_imagetwo', '$product_imagethree', '$product_price', NOW(), '$product_status')";

        $product_Result = mysqli_query($connection, $Insert_product);
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
    <title>Admin Insert Product</title>
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
    <div class="admin--section insert-product">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form--outline">
                <label for="product_title">Product Title</label>
                <input type="text" name="product_title" id="product_title" placeholder="Enter Product Title"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" id="product_description" placeholder="Enter Product Description"
                    autocomplete="off" rows="5" cols="50"></textarea>
            </div>
            <div class="form--outline">
                <label for="product_keyword">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" placeholder="Enter Product Keyword"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_category">Product Category</label>
                <select name="product_category" id="product_category" class="form-select">
                    <option value="">Select a Categories</option>
                    <?php
                    $selectCategory = "SELECT * FROM `category`";
                    $selectResult = mysqli_query($connection, $selectCategory);
                    while ($row = mysqli_fetch_assoc($selectResult)) {
                        $category_id = $row['category_id'];
                        $category_name = $row['category-name'];
                        echo '<option value="' . $category_id . '">' . $category_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form--outline">
                <label for="product_imageone">Product Image One</label>
                <input type="file" name="product_imageone" id="product_imageone" placeholder="Enter Product Image One"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_imagetwo">Product Image Two</label>
                <input type="file" name="product_imagetwo" id="product_imagetwo" placeholder="Enter Product Image Two"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_imagethree">Product Image Three</label>
                <input type="file" name="product_imagethree" id="product_imagethree"
                    placeholder="Enter Product Image Three" autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_price">Product Price</label>
                <input type="text" name="product_price" id="product_price" placeholder="Enter Product Price"
                    autocomplete="off">
            </div>
            <div class="form--outline">
                <input type="submit" value="Insert Product" name="insert_product">
            </div>
        </form>
    </div>
    <?php include('./components/AdminFooter.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>