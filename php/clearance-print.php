<?php
session_start();

if (isset($_GET['bldg_permit'])) {
    $file = file_get_contents("../clearance_template/bldg-permit.html");
} else if (isset($_GET['brgy_clearance'])) {
    $file = file_get_contents("../clearance_template/brgy-clearance.html");
} else if (isset($_GET['tricycle'])) {
    $file = file_get_contents("../clearance_template/tricycle.html");
    $file = str_replace("%unit%", $_POST['unit'], $file);
    $file = str_replace("%brand%", $_POST['brand'], $file);
    $file = str_replace("%chassis_num%", $_POST['chassis_num'], $file);
    $file = str_replace("%plate_num%", $_POST['plate_num'], $file);
    $file = str_replace("%operating_in%", $_POST['operating_in'], $file);
} else if (isset($_GET['good_moral'])) {
    $file = file_get_contents("../clearance_template/good-moral.html");
} else if (isset($_GET['elec_wiring'])) {
    $file = file_get_contents("../clearance_template/installation-of-electrical-wiring.html");
} else if (isset($_GET['firearms'])) {
    $file = file_get_contents("../clearance_template/renewal-of-firearm.html");
} else {
    echo '<script>alert("Error Printing.\nPlease try again");window.history.back()</script>';
}

$day = date("j") . "<sup>" . date("S") . "</sup>";
$month = date("F");
$year = date("Y");

$file = str_replace("%name%", "<strong>" . strtoupper($_POST['full_name']) . "</strong>", $file);
$file = str_replace("%civil_status%", $_POST['civil_stat'], $file);
$file = str_replace("%age%", $_POST['age'], $file);

$file = str_replace("%day%", $day, $file);
$file = str_replace("%month%", $month, $file);
$file = str_replace("%year%", $year, $file);

echo '<script>sessionStorage.setItem("isReady", true)</script>';
echo $file;


?>
<script>
    console.log(sessionStorage)
    if (sessionStorage.length > 0) {
        if (sessionStorage.getItem("isReady") == "true") {
            window.print();
            sessionStorage.clear();
            window.onafterprint = window.history.back();
        }
    }
</script>