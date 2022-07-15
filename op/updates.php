<?php

require_once '../config_save.php';
if(isset($_POST['updatebill_list'])){
  //bill_list.php
  $bill_id = $_POST['bill_id'];
  $name = $_POST['bname'];
  $account = $_POST['accountnumber'];
  $user = $_POST['buser'];
  $due = $_POST['bdate'];
  $website = $_POST['bwebsite'];
  $notes = $_POST['bnotes'];
  $bdate = $_POST['bdate'];
  //inject to default_bills
  $sql2 = "UPDATE default_bills
  SET bill_name = '$name', bill_due_date ='$bdate', bill_website ='$website', bill_account ='$account', bill_user ='$user', bill_notes = '$notes' WHERE id_bill = '$bill_id'";
  mysqli_query($conn, $sql2);
  //inject to history
  $sql = "UPDATE history
  SET bill_date = '$bdate', bill_name ='$name'
  WHERE id_bill = '$bill_id'";
  mysqli_query($conn, $sql);
  session_start();
  $_SESSION['update_success_message'] = "<strong>Success!</strong> $name has been <strong>updated</strong>.";
  header("Location: https://bills.theschellers.us/pages/bill_list.php");
  exit();
} elseif (isset($_POST['delete_bill_list'])){
    //bill_list.php
  $bill_id = $_POST['bill_id'];
  $name = $_POST['bname'];
  $sql2 = "DELETE FROM default_bills WHERE id_bill='$bill_id'";
  mysqli_query($conn, $sql2);
  session_start();
  $_SESSION['delete_success_message'] = "$name <strong>DELETED</strong> successfully.";
  header("Location: ../pages/bill_list.php");
}
elseif(isset($_POST['updatebill_report'])){
  $bill_id = $_POST['bill_id'];
  $name = $_POST['bname'];
  $account = $_POST['accountnumber'];
  $user = $_POST['buser'];
  $due = $_POST['bdate'];
  $website = $_POST['bwebsite'];
  $notes = $_POST['bnotes'];
  $bdate = $_POST['bdate'];
  $year = $_POST['year1'];
  $month = $_POST['month1'];
  //inject to default_bills
  $sql2 = "UPDATE default_bills
  SET bill_name = '$name', bill_due_date ='$bdate', bill_website ='$website', bill_account ='$account', bill_user ='$user', bill_notes = '$notes' WHERE id_bill = '$bill_id'";
  mysqli_query($conn, $sql2);
  //inject to history
  $sql = "UPDATE history
  SET bill_date = '$bdate', bill_name ='$name'
  WHERE id_bill = '$bill_id'";
  mysqli_query($conn, $sql);
  session_start();
  $_SESSION['report_update_success_message'] = "<strong>Success!</strong> $name has been <strong>updated</strong>.";
  header("Location: https://bills.theschellers.us/pages/bill_report.php?year=$year&month=$month");
  exit();
} elseif (isset($_POST['delete_bill_report'])){
  $bname = $_POST['bname'];
  $mbill = $_POST['mbill_id'];
  $year = $_POST['year1'];
  $month = $_POST['month1'];
  $sql2 = "DELETE FROM history WHERE b_id='$mbill'";
  mysqli_query($conn, $sql2);
  session_start();
  $_SESSION['delete_bill_success_message'] = "$bname <strong>deleted</strong> successfully.";
  header("Location: https://bills.theschellers.us/pages/bill_report.php?year=$year&month=$month");
}

elseif (isset($_POST['submit_bill_report'])) {
  $paid = $_POST['ubill_paid_amount'];
  $bnotes = $_POST['bnotes'];
  $obill = $_POST['obill_id'];
  $mbill = $_POST['mbill_id'];
  $year = $_POST['year1'];
  $month = $_POST['month1'];
  $today = date("Y-m-d H:i:s");
  $bname = $_POST['bname'];
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
  $_SESSION['bill_save_success_message'] = "$bname <strong>updated</strong> successfully.";
  header("Location: https://bills.theschellers.us/pages/bill_report.php?year=$year&month=$month");
  //print_r($conn);
  exit();
}
else{
  echo "Failed to connect to database: " . mysqli_connect_error();
  exit();
}


?>
