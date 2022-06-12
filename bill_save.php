<?php

require_once 'config_save.php';
if (isset($_POST['bname'])) {
    $name = mysqli_real_escape_string($conn, $_POST['bname']);
    $account = mysqli_real_escape_string($conn, $_POST['accountnumber']);
    $user = mysqli_real_escape_string($conn, $_POST['buser']);
    $due = mysqli_real_escape_string($conn, $_POST['bdate']);
    $website = mysqli_real_escape_string($conn, $_POST['bwebsite']);
    $notes = mysqli_real_escape_string($conn, $_POST['bnotes']);
    mysqli_query($conn, "INSERT INTO default_bills(bill_name, bill_due_date, bill_website, bill_account, bill_user, bill_notes, bill_paid_date) VALUES ('$name','$due','$website','$account','$user','$notes','19000101')");

    //Start the session if already not started.
    session_start();
    $_SESSION['success_message'] = "New bill saved successfully.";
    header("Location: pages/bill_add.php");
    exit();
} else {
    echo "Failed to connect to database: " . mysqli_connect_error();
}
?>
