<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body>
    <?php include('./components/AdminHeader.php') ?>
    <div class="admin--section">
        <div class="container-fluid">
            <h1 class="text-center">Manage Details</h1>
            <div class="row">
                <div class="col-md-12 admin-btn">
                    <button>
                        <a href="insert-product.php" class="nav-link">Insert Product</a>
                    </button>
                    <button>
                        <a href="" class="nav-link">View Product</a>
                    </button>
                    <button>
                        <a href="index.php?insert-category" class="nav-link">Insert Categories</a>
                    </button>
                    <button>
                        <a href="" class="nav-link">View Categories</a>
                    </button>
                    <button>
                        <a href="" class="nav-link">Insert Brands</a>
                    </button>
                    <button>
                        <a href="" class="nav-link">View Brands</a>
                    </button>
                    <button>
                        <a href="" class="nav-link">All Orders</a>
                    </button>
                    <button>
                        <a href="" class="nav-link">All Payment</a>
                    </button>
                    <button>
                        <a href="" class="nav-link">List User</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            if (isset($_GET['insert-category'])) {
                include('insert-category.php');
            }
            ?>
        </div>
    </div>
    <?php include('./components/AdminFooter.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>