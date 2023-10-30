<?php
include("../Database/connect.php");
if (isset($_POST["insert-category"])) {
    $category_name = $_POST["category-name"];

    $selectQuery = "SELECT * FROM `category` WHERE `category-name` = '$category_name'";
    $categoryResult = mysqli_query($connection, $selectQuery);
    $nameResult = mysqli_num_rows($categoryResult);
    if ($nameResult > 0) {
        echo "<script>alert('This already exists');</script>";
    } elseif ($category_name === '') {
        echo "<script>alert('Please fill in all the available fields');</script>";
    } else {
        $insertCategory = "INSERT INTO `category` (`category-name`) VALUES ('$category_name')";
        $insertResult = mysqli_query($connection, $insertCategory);
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
        <input type="text" class="form-control" name="category-name" placeholder="Insert Categories"
            aria-label="category" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <input class="p-2" type="submit" name="insert-category" value="Insert Categories">
    </div>
</form>