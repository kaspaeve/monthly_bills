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
  SET bill_name = '$name', bill_due_date ='$bdate', bill_website ='$website', bill_account ='$account', bill_user ='$user',
  bill_notes = '$notes'
  WHERE id_bill = '$bill_id'";

  mysqli_query($conn, $sql2);
//inject to history
$sql = "UPDATE history
SET bill_date = '$bdate', bill_name ='$name'
WHERE id_bill = '$bill_id'";

mysqli_query($conn, $sql);

session_start();
$_SESSION['success_message'] = "Bill <strong>updated</strong>updated successfully.";
header("Location: ../pages/bill_list.php");
exit();


    exit();
  } elseif (isset($_POST['delete_bill'])){
  $bill_id = $_POST['bill_id'];
  $sql2 = "DELETE FROM default_bills WHERE id_bill='$bill'";
  mysqli_query($conn, $sql2);

    session_start();
    $_SESSION['success_message'] = "Bill <strong>deleted</strong> successfully.";
    header("Location: ../pages/bill_list.php");

  }
  else{
  echo "Failed to connect to database: " . mysqli_connect_error();
  }


?>
