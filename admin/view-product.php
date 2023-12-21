<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body>
    <?php
    include("../Database/connect.php");
    $All_products = "SELECT * FROM `product` INNER JOIN `category` ON product.product_category = category.category_id";
    $AllProduct_results = mysqli_query($connection, $All_products);
    while ($row = mysqli_fetch_assoc($AllProduct_results)) {
        $All_products_Id = $row["product_id"];
        $All_products_Name = $row["product_title"];
        $product_description = $row["product_description"];
        $product_keyword = $row["product_keyword"];
        $product_category = $row["product_category"];
        $product_imageone = $row["product_imageone"];
        $product_price = $row["product_price"];
        $product_date = $row["date"];
    }
    ?>
    <?php include('./components/AdminHeader.php') ?>

    <div class="view--conatiner">
        <div class="view-row">
            <div class="heading-admin pb-3">
                <h1>View Products</h1>
                <div class="admin-btn">
                    <button>
                        <a href="insert-product.php" class="nav-link">+ Insert Product</a>
                    </button>
                </div>
            </div>
            <form action="" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <!-- <th>Descriptions</th> -->
                            <th>Keyword</th>
                            <th>Category</th>
                            <!-- <th>Image</th> -->
                            <!-- <th>Product Quantity</th> -->
                            <th>Price</th>
                            <th>Date</th>
                            <!-- <th>Remove</th> -->
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $All_products = "SELECT * FROM `product` INNER JOIN `category` ON product.product_category = category.category_id";
                        $AllProduct_results = mysqli_query($connection, $All_products);
                        $counter = 0;
                        while ($row = mysqli_fetch_assoc($AllProduct_results)) {
                            $All_products_Id = $row["product_id"];
                            $All_products_Name = $row["product_title"];
                            $product_description = $row["product_description"];
                            $product_keyword = $row["product_keyword"];
                            $product_category = $row["category-name"];
                            $product_imageone = $row["product_imageone"];
                            $product_price = $row["product_price"];
                            $product_date = $row["date"];
                            $formatted_date = date("M d, Y", strtotime($product_date));
                            $counter++;
                            echo "<tr>
                                <td>$counter</td>
                                <td>$All_products_Name</td>
                                <td>$product_keyword</td>
                                <td>$product_category</td>
                                <td>$product_price</td>
                                <td>$formatted_date</td>
                                <td>
                                    <div class='view-btn'>
                                        <a href='update-product.php?product_id=$All_products_Id' class='nav-link'>Edit</a> <pre>|</pre>
                                        <a href='view-product.php?product_id=$All_products_Id' class='nav-link'>Delete</a>
                                    </div>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
        <!-- <div class="view-box">

        </div> -->
    </div>
    <?php
    include("../Database/connect.php");
    if (isset($_GET['product_id'])) {
        // var_dump($remove_id);
        $remove_product = $_GET['product_id'];
        $Delete_Query = "DELETE FROM `product` WHERE product_id = $remove_product";
        $Delete__Result = mysqli_query($connection, $Delete_Query);
        echo "<script>window.open('view-product.php', '_self')</script>";
    }
    ?>

    <style>
        .heading-admin {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .view--conatiner {
            padding: 200px 100px 100px;
            max-width: 100%;
        }

        .view--conatiner .view-row form {
            width: 100%;
            /* display: unset; */
            grid-template-columns: unset;
            overflow-x: scroll;
        }

        .view--conatiner .view-row form::-webkit-scrollbar {
            display: none;
        }

        .view--conatiner table {
            width: 100%;
            text-align: center;
            border: 1px solid #eee;
        }

        .view--conatiner table thead tr th,
        .view--conatiner table tbody tr td {
            border: 1px solid #eee;
            padding: 15px;
            max-width: 300px;
        }

        form .quantity-num {
            text-align: center;
            border: 1px solid #eee;
            padding: 10px 0px;
            border-radius: 5px;
        }

        /* input[type=number]::-webkit-inner-spin-button {
            opacity: 1;
            height: 50px;
            padding: 0 2px;
        } */

        .view--conatiner table thead tr th {
            font-size: 20px;
            font-weight: 600;
            line-height: 34px;
            white-space: nowrap;
        }

        .view--conatiner table thead tr td {
            font-size: 18px;
            font-weight: 400;
            line-height: 26px;
        }

        .view--conatiner table tbody tr td:nth-child(1) {
            width: 5%;
        }

        .view--conatiner table tbody tr td img {
            width: 100px;
            height: 100px;
        }

        .view-btn {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: space-between;

        }

        .view-btn input,
        .view-btn a {
            margin-bottom: 0;
            display: inline;
            color: #518581;
            /* margin-inline: 10px; */
            background: transparent;
            border: none;
            text-decoration: underline;
        }

        pre {
            margin-bottom: 0;
        }

        .view-box {
            display: flex;
            justify-content: space-between;
            padding-top: 50px;
            align-items: center;
        }

        .checkout-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .view-box .subtotal h2 {
            margin-bottom: 0;
            font-size: 34px;
            line-height: 44px;
            font-weight: 400;
        }

        .checkout-btn a {
            background-color: #518581;
            text-align: center;
            padding: 15px 40px;
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            line-height: 23.4px;
            font-weight: 600;
        }

        .checkout-btn a.checkout-white-btn {
            background-color: #fff;
            border: 2px solid #F3F3F3;
            color: #151411;
        }

        @media screen and (max-width: 768px) {
            .view--conatiner {
                padding: 150px 20px 50px;
            }

            .view-row {
                overflow: scroll;
            }

            .view-row::-webkit-scrollbar {
                display: none;
            }

            .view-box {
                flex-direction: column;
                gap: 20px;
                align-items: unset;
            }

            .checkout-btn a {
                padding: 10px 20px;
                font-size: 14px;
                line-height: 18.4px;
            }

            .view-box .subtotal h2 {
                font-size: 24px;
                line-height: 34px;
            }

            .view--conatiner table thead tr th {
                font-size: 16px;
                line-height: 24px;
            }

            .view--conatiner table tbody tr td {
                font-size: 14px;
                line-height: 20px;
            }

            .view-btn input {
                margin: 10px 0;
            }
        }
    </style>
    <?php include('./components/AdminFooter.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>