<?php
include "server.php";
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$item = $_POST['item'];

$q = mysqli_query($con, "UPDATE borrow SET `name`='$name', item='$item' WHERE id = $id");
if ($q) {
    echo "<script>
        alert('Item successfully edited.');
        window.location.href = '../views/borrowed-items.php';
    </script>";
}
