<?php 
include "server.php";
session_start();

$id = $_GET['id'];

$q = mysqli_query($con, "UPDATE borrow SET date_returned=NOW() WHERE id = $id");

if ($q) {
    header("Location: ../views/borrowed-items.php");
}
