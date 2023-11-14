<?php
include("./Database/connect.php");
?>
<div class="sf--section">
    <div class="sf--search">
        <img src="./images/search-normal.png" alt="">
        <form action="">
            <input type="search" placeholder="Search property" name="search_data" autocomplete="off">
            <input class="search-btn" type="submit" value="Find Now" name="search_product">
        </form>
    </div>
    <div class="sf--filter">
        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expand ed="false">
            <img src="./images/productimages/filter.png" alt="">
            Filter
        </button>
        <ul class="dropdown-menu">
            <?php
                $Selct_category = "SELECT * FROM `category`";
                $category_Result = mysqli_query($connection, $Selct_category);
                while ($row = mysqli_fetch_assoc($category_Result)) {
                    $category_ID = $row["category_id"];
                    $category_name = $row["category-name"];
                    echo '<li><a href="product.php?category=' . $category_ID . '">' . $category_name . '</a></li>';
                }
            ?>
        </ul>
    </div>
</div>
<style>
    .sf--section {
        padding: 50px 100px;
        display: grid;
        grid-template-columns: 85% 15%;
        align-items: center;
        gap: 2em;
    }

    .sf--section .sf--search {
        display: flex;
        align-items: center;
        background: #fff;
        box-shadow: 0px 4px 120px 0px #AFADB526;
        padding: 20px;
        width: 100%;
    }

    .sf--section .sf--search img {
        width: 25px;
        height: 25px;
    }
    .sf--section .sf--search form {
        display: flex;
        width: 100%;
    }
    .sf--section .sf--search input {
        border: none;
        width: 100%;
        padding: 10px;
        color: #AFADB5;
        font-size: 18px;
        line-height: 28px;
        font-weight: 400;
    }

    .sf--section .sf--search input::placeholder {
        color: #AFADB5;
        font-size: 18px;
        line-height: 28px;
        font-weight: 300;
    }

    .sf--section .sf--search input:focus {
        outline: none;
        box-shadow: none;
    }

    .sf--section .sf--search input[type="submit"] {
        background-color: #518581;
        color: #fff;
        font-size: 18px;
        line-height: 28px;
        font-weight: 400;
        padding: 10px 40px;
        border-radius: 0;
        width: 20%;
    }

    .sf--filter {
        background: #fff;
        box-shadow: 0px 4px 120px 0px #AFADB526;
        padding: 20px;
    }

    .sf--filter button {
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

    .sf--filter ul.show {
        width: 203px;
        left: -20px !important;
        border: 1px solid #eee;
        padding: 10px;
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        top: 20px !important;
    }

    .sf--filter ul.show li {
        padding: 5px 10px;
    }

    .sf--filter ul.show li a {
        text-decoration: none;
        font-size: 18px;
        line-height: 28px;
        font-weight: 400;
        color: #518581;
    }

    @media screen and (max-width: 768px) {
        .sf--section {
            padding: 40px 20px;
            grid-template-columns: repeat(1, 1fr);
        }

        .sf--section .sf--search input {
            font-size: 14px;
            line-height: 20px;
        }

        .sf--section .sf--search input[type="submit"] {
            font-size: 14px;
            width: auto;
            line-height: 20px;
            padding: 10px 20px;
        }

        .sf--filter button {
            font-size: 16px;
        }

        .sf--filter ul.show {
            width: 90%;
            left: -10px !important;
            top: 10px !important;
        }

        .sf--filter {
            padding: 10px;
        }
    }
</style>