<?php
session_start();
include_once '../config_save.php';

if(isset($_POST['save_multi']))
{
    $bill_list = $_POST['bill_list'];
    $bill_list2 = $_POST['lstBox2'];
    $year = ($_POST['year']);
    $month = ($_POST['month']);
    foreach($bill_list as $bills)
    {
      $sql2 = "SELECT * FROM default_bills WHERE id_bill = '".$bills."'";
      $result = $conn->query($sql2);
      while ($row = mysqli_fetch_assoc($result)) {
      $bill_id        = $row['id_bill'];
      $bill_name    = $row['bill_name'];
      $bill_account  = $row['bill_account'];
      $bill_due_date     = $row['bill_due_date'];
      $bill_user  = $row['bill_user'];
      $bill_website  = $row['bill_website'];
      $bill_paid_date  = $row['bill_paid_date'];
      $bill_paid_amount  = $row['bill_paid_amount'];
      $bill_notes  = $row['bill_notes'];

            $sql3 = "SELECT * FROM history WHERE Year = '".$year ."' AND Month  ='".$month."' AND id_bill  ='".$bills."'" ;
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_row();
             if($row3[0]) {
               $_SESSION['success_message_bill_add_monthly_failed'] = "$bill_name <strong>already exist</strong> in $month, $year monthly report.";
               header("Location: ../pages/bills_add_monthly.php");
                 $conn->close();
            } else {
              mysqli_query($conn, "INSERT INTO history(id_bill, bill_name, bill_date, bill_paid_date, bill_paid_amount, bill_notes, Year, Month) VALUES ('$bill_id','$bill_name','$bill_due_date','$bill_paid_date','$bill_paid_amount','$bill_notes','$year', '$month')");

              }
              //Start the session if already not started.
}

    }
    session_start();
    $_SESSION['success_message_bill_add_monthly'] = "New monthly report saved successfully.";
    header("Location: ../pages/bills_add_monthly.php");
    exit();

}
?>
