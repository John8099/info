<?php
include "server.php";
session_start();

$name = $_POST['name'];
$item = $_POST['item'];

$q = mysqli_query($con, "INSERT INTO borrow(`name`, item) VALUES('$name','$item')");
if ($q) {
    echo "<script>
        alert('Item successfully added.');
        window.location.href = '../views/borrow-item.php';
    </script>";
}
