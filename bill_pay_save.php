<?php

require_once 'config_save.php';
if (isset($_POST['mbill_id'])) {


$paid =$_POST['ubill_paid_amount'];
$bnotes = $_POST['bnotes'];
$obill = $_POST['obill_id'];
$mbill = $_POST['mbill_id'];
$year = $_POST['year1'];
$month = $_POST['month1'];
$today = date("Y-m-d H:i:s");

//$account = mysqli_real_escape_string($conn, $_POST['accountnumber']);


//echo $paid."<br>";
//echo $bnotes."<br>";
//echo $label."<br>";
//echo $label2."<br>";
//echo $year."<br>";
//echo $month."<br>";
//echo $today."<br>";

mysqli_query($conn, "UPDATE history
SET bill_paid_date = '$today', bill_paid_amount = '$paid', bill_notes = '$bnotes'
WHERE b_id = '$mbill_id' AND Year = '$year ' AND Month  ='$month'");



    //Start the session if already not started.
    session_start();
    $_SESSION['success_message'] = "New bill saved successfully.";
  //  header("Location: pages/bill_report.php");
  print_r($conn);

    exit();
} else {
    echo "Failed to connect to database: " . mysqli_connect_error();
}

?>
