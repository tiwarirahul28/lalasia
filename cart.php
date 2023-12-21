<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/Frame.svg">
    <title>Lalasia | Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .cart--conatiner {
            padding: 200px 100px 50px;
        }

        .cart--conatiner table {
            width: 100%;
            text-align: center;
            border: 1px solid #eee;
        }

        .cart--conatiner table thead tr th,
        .cart--conatiner table tbody tr td {
            border: 1px solid #eee;
            padding: 15px;
        }

        form .quantity-num{
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

        .cart--conatiner table thead tr th {
            font-size: 20px;
            font-weight: 600;
            line-height: 34px;
        }

        .cart--conatiner table thead tr td {
            font-size: 18px;
            font-weight: 400;
            line-height: 26px;
        }

        .cart--conatiner table tbody tr td:nth-child(1) {
            width: 20%;
        }

        .cart--conatiner table tbody tr td img {
            width: 100px;
            height: 100px;
        }

        .cart-btn input {
            margin-bottom: 0;
            display: inline;
            color: #518581;
            margin-inline: 10px;
            background: transparent;
            border: none;
            text-decoration: underline;
        }

        .cart-box {
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

        .cart-box .subtotal h2 {
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
            .cart--conatiner {
                padding: 150px 20px 50px;
            }

            .cart-row {
                overflow: scroll;
            }

            .cart-row::-webkit-scrollbar {
                display: none;
            }

            .cart-box {
                flex-direction: column;
                gap: 20px;
                align-items: unset;
            }

            .checkout-btn a {
                padding: 10px 20px;
                font-size: 14px;
                line-height: 18.4px;
            }

            .cart-box .subtotal h2 {
                font-size: 24px;
                line-height: 34px;
            }
            .cart--conatiner table thead tr th {
                font-size: 16px;
                line-height: 24px;
            }
            .cart--conatiner table tbody tr td{
                font-size: 14px;
                line-height: 20px;
            }
            .cart-btn input{
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>
    <?php include('./components/Header.php') ?>
    <div class="cart--conatiner">
        <div class="cart-row">
            <form action="" method="POST">
                <table>
                    <!-- <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Remove</th>
                            <th>Operations</th>
                        </tr>
                    </thead> -->
                    <tbody>
                        <?php
                        global $connection;
                        $get_ip_address = getIPAddress();
                        $grand_price = 0;
                        $Total_Query = "SELECT * FROM `cart_details` INNER JOIN `product` ON cart_details.product_id = product.product_id WHERE cart_details.ip_address = '$get_ip_address'";
                        $Query_Result = mysqli_query($connection, $Total_Query);
                        $cartcounts = mysqli_num_rows($Query_Result);
                        $counter = 0;
                        if($cartcounts > 0){
                            echo '<thead>
                                    <tr>
                                        <th>Product id</th>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Product Price</th>
                                        <th>Remove</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>';
                        while ($row = mysqli_fetch_array($Query_Result)) {
                            $cart_id = $row['cart_id'];
                            $cart_Product_quantity = $row['quantity'];
                            $cart_Product_title = $row['product_title'];
                            $cart_Product_Img = $row['product_imageone'];
                            $cart_Product_price = $row['product_price'];
                            // Remove commas from the product price and convert it to a numeric value
                            $product_price = str_replace(',', '', $row['product_price']);
                            $product_values = floatval($product_price);
                            $grand_price += $product_values * $cart_Product_quantity;
                            $counter++;
                        ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $cart_Product_title; ?></td>
                                <td><img src="./admin/product_images/<?php echo $cart_Product_Img; ?>" alt=""></td>
                                <td>
                                    <form method="post" action="">
                                        <input type="number" class="quantity-num" name="qty" value="<?php echo $cart_Product_quantity; ?>" autocomplete="off">
                                        <input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">
                                </td>
                                        <!-- <td><?php echo $cart_Product_quantity; ?></td> -->
                                        <td>₹: <?php echo $cart_Product_price; ?></td>
                                        <td><input type="checkbox" name="removeitem" value="<?php echo $cart_id; ?>"></td>
                                        <td class="cart-btn">
                                            <input type="submit" name="update_cart" value="Update">
                                            <input type="submit" name="delete_cart" value="Delete">
                                        </td>
                                    </form>
                            </tr>
                        <?php
                        }
                            // Check if the form is submitted
                            if (isset($_POST['update_cart'])) {
                                // Get the values from the form
                                $Quantity = $_POST['qty'];
                                $cart_id = $_POST['cart_id'];

                                // Update the cart using prepared statement
                                $Update__Cart = "UPDATE `cart_details` SET `quantity` = ? WHERE `ip_address` = ? AND `cart_id` = ?";
                                $Update_Cart_Result = mysqli_prepare($connection, $Update__Cart);

                                if ($Update_Cart_Result) {
                                    // Bind parameters
                                    mysqli_stmt_bind_param($Update_Cart_Result, "iss", $Quantity, $get_ip_address, $cart_id);

                                    // Execute the statement
                                    $update__Result = mysqli_stmt_execute($Update_Cart_Result);

                                    if ($update__Result) {
                                        // Refresh the page
                                        echo "<script>window.open('cart.php', '_self')</script>";
                                        // You might want to update other variables or perform additional calculations here
                                    } else {
                                        // Handle the case where the update query was not successful
                                        echo "Error updating cart: " . mysqli_error($connection);
                                    }

                                    // Close the statement
                                    mysqli_stmt_close($Update_Cart_Result);
                                }
                            }
                        }else{
                            echo '<h2 style="color:red; text-align:center">No Products in Cart!</h2>';
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="cart-box">
            <?php 
            $get_ip_address = getIPAddress();
            $Total_Query = "SELECT * FROM `cart_details` INNER JOIN `product` ON cart_details.product_id = product.product_id WHERE cart_details.ip_address = '$get_ip_address'";
            $Query_Result = mysqli_query($connection, $Total_Query);
            $cartcounts = mysqli_num_rows($Query_Result);
            if($cartcounts > 0){
                echo "<div class='subtotal'>
                        <h2>Total Paisa ₹: <strong>$grand_price/-</strong></h2>
                    </div>
                    <div class='checkout-btn'>
                        <a href='product.php#top'>Continue Shopping</a>
                        <a href='checkout.php' class='checkout-white-btn'>Checkout</a>
                    </div>";
            }else{
                echo '<div class="checkout-btn">
                        <a href="product.php#top">Continue Shopping</a>
                    </div>';
            }
            ?>
           
        </div>
    </div>
    <?php
    function remove_cart_item()
    {
        global $connection;
        if (isset($_POST['delete_cart'])) {
            if (isset($_POST['removeitem'])) {
                $remove_id = $_POST['removeitem'];
                // echo $remove_id;
                // var_dump($remove_id);
                $Delete_Query = "DELETE FROM `cart_details` WHERE cart_id = $remove_id";
                $Delete__Result = mysqli_query($connection, $Delete_Query);
                echo "<script>window.open('cart.php', '_self')</script>";
            }else{
                echo "<script>alert('Please check the Remove checkbox!')</script>";
            }
        }
    }
    echo $remove_item = remove_cart_item();
    ?>
    <?php include('./components/Footer.php') ?>
    <?php include('./components/Scripts.php') ?>
</body>

</html>