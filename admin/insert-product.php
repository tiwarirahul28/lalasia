<?php
$filedError = 0;
$success = 0;
include("../Database/connect.php");
if (isset($_POST["insert_product"])) {
    $product_title = $_POST["product_title"];
    $product_description = $_POST["product_description"];
    $short_description = $_POST["short_description"];
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

    if ($product_title == '' || $product_description == '' || $product_keyword == '' || $short_description == '' || $product_category == '' || $product_price == '' || $product_imageone == '' || $product_imagetwo == '' || $product_imagethree == '') {
        // echo "<script>alert('Please fill in all the available fields');</script>";
        $filedError = 1;
    } else {
        move_uploaded_file($tmp_imageone, "./product_images/$product_imageone");
        move_uploaded_file($tmp_imagetwo, "./product_images/$product_imagetwo");
        move_uploaded_file($tmp_imagethree, "./product_images/$product_imagethree");

        $Insert_product = "INSERT INTO `product` (`product_title`, `short_description`, `product_description`, `product_keyword`, `product_category`, `product_imageone`, `product_imagetwo`, `product_imagethree`, `product_price`, `date`, `status`) VALUES('$product_title', '$short_description', '$product_description', '$product_keyword', '$product_category', '$product_imageone', '$product_imagetwo', '$product_imagethree', '$product_price', NOW(), '$product_status')";

        $product_Result = mysqli_query($connection, $Insert_product);
        if ($product_Result) {
            // echo "<script>alert('Product has been inserted successfully');</script>";
            $success = 1;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminstyle.css">
    <style>
        .charalimit {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            flex-wrap: wrap;

        }

        .charalimit p {
            font-size: 14px;
            color: #AFADB5;
            margin-bottom: 0;
        }

        p#error1,
        p#error2,
        p#error3 {
            color: #518581 !important;
        }

        .filedMessage {
            position: fixed;
            top: 7rem;
            right: 0;
            z-index: 9;
        }

        .filedMessage.fade-out {
            opacity: 0;
        }
    </style>
    <script>
        // Add this JavaScript code to hide the alert after 5 seconds
        setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            var errorAlert = document.getElementById('errorAlert');

            if (successAlert) {
                successAlert.classList.add('fade-out');
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 500);
            }

            if (errorAlert) {
                errorAlert.classList.add('fade-out');
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 500);
            }
        }, 3000);
    </script>
</head>

<body>
    <?php
    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show filedMessage" role="alert" id="successAlert">
        Product has been inserted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <?php
    if ($filedError) {
        echo '<div class="alert alert-danger alert-dismissible fade show filedMessage" role="alert" id="errorAlert"> Please fill in all the available fields
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>
    <?php include('./components/AdminHeader.php') ?>
    <div class="admin--section insert-product">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form--outline">
                <label for="product_title">Product Title</label>
                <div class="charalimit">
                    <p>Character Count: <span id="charCount2">0</span> (limit: 100)</p>
                    <p id="error2" style="color: red;"></p>
                </div>
                <input type="text" name="product_title" id="product_title" placeholder="Enter Product Title" autocomplete="off" oninput="countCharacters('product_title', 'charCount2', 100, 'error2')">
            </div>
            <div class="form--outline">
                <label for="short_description">Short Description</label>
                <div class="charalimit">
                    <p>Character Count: <span id="charCount">0</span> (limit: 1000)</p>
                    <p id="error1" style="color: red;"></p>
                </div>
                <textarea name="short_description" id="short_description" placeholder="Enter Product Description" autocomplete="off" rows="5" cols="50" oninput="countCharacters('short_description', 'charCount', 1000, 'error1')"></textarea>
            </div>

            <div class="form--outline">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" id="product_description" placeholder="Enter Product Description" autocomplete="off" rows="5" cols="50"></textarea>
            </div>

            <div class="form--outline">
                <label for="product_keyword">Product Keyword</label>
                <div class="charalimit">
                    <p>Character Count: <span id="charCount3">0</span> (limit: 60)</p>
                    <p id="error3" style="color: red;"></p>
                </div>
                <input type="text" name="product_keyword" id="product_keyword" placeholder="Enter Product Keyword" autocomplete="off" oninput="countCharacters('product_keyword', 'charCount3',60, 'error3')">
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
                <input type="file" name="product_imageone" id="product_imageone" placeholder="Enter Product Image One" autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_imagetwo">Product Image Two</label>
                <input type="file" name="product_imagetwo" id="product_imagetwo" placeholder="Enter Product Image Two" autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_imagethree">Product Image Three</label>
                <input type="file" name="product_imagethree" id="product_imagethree" placeholder="Enter Product Image Three" autocomplete="off">
            </div>
            <div class="form--outline">
                <label for="product_price">Product Price</label>
                <input type="text" name="product_price" id="product_price" placeholder="Enter Product Price" autocomplete="off">
            </div>
            <div class="form--outline">
                <input type="submit" value="Insert Product" name="insert_product">
            </div>
        </form>
    </div>
    <?php include('./components/AdminFooter.php') ?>
    <script>
        function countCharacters(textareaId, charCountId, maxCharLimit, errorElementId) {
            var textarea = document.getElementById(textareaId);
            var charCountElement = document.getElementById(charCountId);
            var errorElement = document.getElementById(errorElementId);
            var text = textarea.value;

            if (text.length > maxCharLimit) {
                textarea.value = text.slice(0, maxCharLimit);
                errorElement.textContent = "Limit reached (" + maxCharLimit + " characters).";
                return;
            }

            errorElement.textContent = "";
            charCountElement.textContent = text.length;
        }
        console.log(countCharacters);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("product_description"), {
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', "imageEmbed", 'insertImage', 'blockQuote', 'insertTable', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            placeholder: 'Welcome to CKEditor 5!',
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            htmlEmbed: {
                showPreviews: true
            },
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            removePlugins: [
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType',
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced'
            ]
        });
    </script>
</body>

</html>