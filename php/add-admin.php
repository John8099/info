<?php
session_start();
include "server.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$cnum = $_POST["cnum"];
$uname = $_POST["uname"];
$pass = password_hash($_POST["pass"], PASSWORD_ARGON2I);

$check = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname'");
if (mysqli_num_rows($check) > 0) {
    echo '
    <script>
    alert("Username \"' . $uname . '\" already taken.\nPlease try again.");
    window.location.href = "../views/add-admin.php";
    </script>
    ';
} else {
    $q = mysqli_query($con, "INSERT INTO users(fname, lname, cnum, uname, `password`) VALUES('$fname', '$lname', '$cnum', '$uname', '$pass')");
    if ($q) {
        echo "<script>
            alert('Admin successfully added.');
            window.location.href = '../views/add-admin.php';
        </script>";
    }
}
