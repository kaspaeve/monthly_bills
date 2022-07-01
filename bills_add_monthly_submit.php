<?php
session_start();
include_once 'config_save.php';

if(isset($_POST['save_multi']))
{


    $bill_list = $_POST['bill_list'];
    $bill_list2 = $_POST['lstBox2'];
    $year = ($_POST['year']);
    $month = ($_POST['month']);


    foreach($bill_list as $bills)
    {
      $sql2 = "SELECT * FROM default_bills WHERE bill_name = '".$bills."'";
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

//         echo $bills."<br>";
//         echo $year."<br>";
//         echo $month."<br>";
//        echo $bill_account. "<br>";
//         echo $bill_website. "<br>";
//         echo $bill_notes. "<br>";
//         echo $bill_due_date. "<br>";
//         echo $bill_user. "<br>";
//         echo "<br>";



            $sql3 = "SELECT * FROM history WHERE Year = '".$year ."' AND Month  ='".$month."' AND bill_name  ='".$bills."'" ;
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_row();

             if($row3[0]) {
               $_SESSION['success_message'] = "Failed to save monthly report.";
               header("Location: pages/bills_add_monthly.php");
                 $conn->close();

            } else {
              mysqli_query($conn, "INSERT INTO history(id_bill, bill_name, bill_date, bill_paid_date, bill_paid_amount, bill_notes, Year, Month) VALUES ('$bill_id','$bill_name','$bill_due_date','$bill_paid_date','$bill_paid_amount','$bill_notes','$year', '$month')");

      //        echo $bills."<br>";
      //        echo $year."<br>";
      //        echo $month."<br>";
      //       echo $bill_account. "<br>";
      //        echo $bill_website. "<br>";
      //        echo $bill_notes. "<br>";
      //        echo $bill_due_date. "<br>";
      //        echo $bill_user. "<br>";
      //        echo "<br>";



              }
              //Start the session if already not started.


}


    }
    session_start();
    $_SESSION['success_message'] = "New monthly report saved successfully.";
    header("Location: pages/bills_add_monthly.php");
    exit();

}
?>
