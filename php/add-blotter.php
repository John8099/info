<?php
session_start();
include "server.php";

$name = $_POST["name"];
$respondent = $_POST["respondent"];
$witness = $_POST["witness"];
$complaint = $_POST["complaint"];

$q = mysqli_query($con, "INSERT INTO blotter(complainant, respondent, `witness`, complaint) VALUES('$name', '$respondent', '$witness', '$complaint')");

if ($q) {
    echo "<script>
        alert('Blotter successfully added.');
        window.location.href = '../views/add-blotter.php';
    </script>";
}
