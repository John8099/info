<?php
session_start();
include "server.php";

if (isset($_GET["borrow"])) {
    $id = $_GET['id'];
    $q = mysqli_query($con, "DELETE FROM borrow WHERE id = $id");
    if ($q) {
        echo "<script>
            window.location.href = '../views/borrowed-items.php';
        </script>";
    }
} else if (isset($_GET["blotter"])) {
    $id = $_GET['id'];
    $q = mysqli_query($con, "DELETE FROM blotter WHERE id = $id");
    if ($q) {
        echo "<script>
            window.location.href = '../views/blotter.php';
        </script>";
    }
} else if (isset($_GET["admin"])) {
    $id = $_GET['id'];
    $q = mysqli_query($con, "DELETE FROM users WHERE id = $id");
    if ($q) {
        echo "<script>
            window.location.href = '../views/admin.php';
        </script>";
    }
}
