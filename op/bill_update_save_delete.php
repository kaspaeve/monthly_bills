<?php

require_once '../config_save.php';
if(isset($_POST['updatebill'])){
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

  header("Location: ../pages/bill_list.php");
  exit();
  //  echo $bill_id."<br>";
  //  echo $name."<br>";
  //  echo $bill_id2."<br>";
  //  echo $notes."<br>";
  //  echo $bdate."<br>";

} elseif (isset($_POST['delete_bill'])){
  $bill_id = $_POST['bill_id'];
  $name = $_POST['bname'];
  //  echo $bill_id."br";
  //  echo $name."br";
  $sql2 = "DELETE FROM default_bills WHERE id_bill='$bill_id'";
  mysqli_query($conn, $sql2);

  session_start();
  $_SESSION['delete_success_message'] = "$name <strong>DELETED</strong> successfully.";
  header("Location: ../pages/bill_list.php");

}
else{
  echo "Failed to connect to database: " . mysqli_connect_error();
  exit();
}


?>
