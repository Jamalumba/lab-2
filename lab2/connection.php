<?php
$conn = mysqli_connect('lab2', 'root', 'root', 'comments');

if (!$conn) {
    die("Error".mysqli_connect_error());
}
?>