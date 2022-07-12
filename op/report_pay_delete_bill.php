<?php

require_once '../config_save.php';
if (isset($_POST['submit_bill'])) {
  $paid = $_POST['ubill_paid_amount'];
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
  $sql = "UPDATE history
  SET bill_paid_date = '$today', bill_paid_amount = '$$paid', bill_notes = '$bnotes'
  WHERE b_id = '$mbill' AND Year = '$year ' AND Month  ='$month'";
  mysqli_query($conn, $sql);
  $sql2 = "UPDATE default_bills
  SET bill_paid_date = '$today', bill_paid_amount = '$$paid', bill_notes = '$bnotes'
  WHERE id_bill = '$obill'";
  mysqli_query($conn, $sql2);
  //Start the session if already not started.
  session_start();
  $_SESSION['success_message'] = "Bill <strong>updated</strong> successfully.";
  header("Location: https://bills.theschellers.us/pages/bill_report.php?year=$year&month=$month");
  //print_r($conn);
  exit();
} elseif (isset($_POST['delete_bill'])){
  $mbill = $_POST['mbill_id'];
  $year = $_POST['year1'];
  $month = $_POST['month1'];
  $sql2 = "DELETE FROM history WHERE b_id='$mbill'";
  mysqli_query($conn, $sql2);

  session_start();
  $_SESSION['success_message'] = "Bill <strong>deleted</strong> successfully.";
  header("Location: https://bills.theschellers.us/pages/bill_report.php?year=$year&month=$month");

}
else{
  echo "Failed to connect to database: " . mysqli_connect_error();
}

?>
