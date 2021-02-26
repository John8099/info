<?php
session_start();
include "server.php";

$uname = $_POST["uname"];
$pass = $_POST["pass"];

$q = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname'");
$user = mysqli_fetch_object($q);
if (mysqli_num_rows($q) > 0) {
    if (password_verify($pass, $user->password)) {
        $_SESSION['id'] = $user->id;
        echo "<script>
                alert('Welcome " . strtoupper("$user->fname $user->lname") . ".');
                window.location.href = '../views/borrowed-items.php';
            </script>";
    } else {
        echo '
        <script>
            alert("Password not match.\nPlease try again.");
            window.location.href = "../"
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Username not found.\nPlease try again.");
        window.location.href = "../"
    </script>
    ';
}
