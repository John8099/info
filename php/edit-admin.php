<?php
session_start();
include "server.php";

$id = $_POST['id'];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$cnum = $_POST["cnum"];
$uname = $_POST["uname"];
$pass = $_POST["pass"];

$check = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname' and id != $_SESSION[id]");
if (mysqli_num_rows($check) > 0) {
    echo '
    <script>
    alert("Username \"' . $uname . '\" already taken.\nPlease try again.");
    window.location.href = "../views/edit-admin.php?id=' . $id . '";
    </script>
    ';
} else {
    $q;
    if ($pass != "") {
        $new_pass = password_hash($_POST["pass"], PASSWORD_ARGON2I);
        $q = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', cnum='$cnum', uname='$uname', `password`='$new_pass' WHERE id='$id' ");
    } else {
        $q = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', cnum='$cnum', uname='$uname' WHERE id='$id' ");
    }
    if ($q) {
        echo '
        <script>
        alert("Admin Updated Successfully.");
        window.location.href = "../views/admin.php";
        </script>
        ';
    }
}
