<?php
session_start();
include "server.php";

$id = $_POST['id'];
$name = $_POST["name"];
$respondent = $_POST["respondent"];
$witness = $_POST["witness"];
$complaint = $_POST["complaint"];

$q = mysqli_query($con, "UPDATE blotter SET complainant='$name', respondent='$respondent', `witness`='$witness', complaint='$complaint' WHERE id=$id");
if ($q) {
    echo "<script>
        alert('Blotter successfully edited.');
        window.location.href = '../views/blotter.php';
    </script>";
}
