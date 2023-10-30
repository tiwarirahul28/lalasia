<?php
$connection = mysqli_connect("localhost", "root", "root", "lalasia");

if (!$connection) {
    die(mysqli_error($connection));
}

?>