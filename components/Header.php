<?php
// session_start();
require_once("./components/ProductPage/CommonFunction.php");
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid p-0">
        <a class="navbar-brand" href="index.php"><img src="./images/logo.png" alt="brand-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="article.php">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about.php">About Us</a>
                </li>
            </ul>
        </div>
        <div class="head-icon">
            <?php AddtoCart(); ?>
            <a href="cart.php"><img src="./images/bag-2.png" alt=""> <sup><?php Cart_item_list(); ?></sup></a>

            <div class="dropdown">
                <?php
                if (isset($_SESSION['user_name'])) {
                    $user = $_SESSION['user_name'];
                    echo "<a href=''><img src='./images/user.png' alt=''></a>
                            <div class='dropdown-content'>
                                <a href='sign-out.php'>
                                $user
                                <p>User</p>
                                </a>
                                <a href='sign-out.php'>
                                    <img src='./images/sign/retrench.png' alt=''>
                                    Logout
                                </a>
                            </div>";
                } else {
                    echo "<a href=''>
                                <img src='./images/user.png' alt='>
                            </a>
                            <div class='dropdown-content'>
                                <a href='sign-in.php'>Sign In</a>
                                <a href='sign-up.php'>Sign Up</a>
                            </div>";
                }
                ?>
                <!-- <a href=''>
                    <img src='./images/user.png' alt=''>
                </a>
                <div class=' dropdown-content'>
                    <a href='sign-in.php'>Sign In</a>
                    <a href='sign-up.php'>Sign Up</a>
                </div> -->
            </div>
        </div>
    </div>
</nav>
<style>
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        width: 160px;
        /* box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; */
        z-index: 1;
        left: -8.3em;
        /* top: 3em; */
        border: 1px solid #eee;
    }

    .dropdown-content a {
        color: black;
        padding: 10px;
        text-decoration: none;
        display: block;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        color: #151411;
        border-bottom: 1px solid #eee;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown-content a p {
        font-size: 14px;
        font-weight: 300;
        line-height: 28px;
        color: #AFADB5;
        margin-bottom: 0;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>