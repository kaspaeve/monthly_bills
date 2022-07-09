<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<?php
  session_start();
if (isset($_POST['generatereport'])) {

    $year = ($_POST['year']);
    $month = ($_POST['month']);

  } else {
    $year = ($_GET ['year']);
    $month = ($_GET ['month']);
  }
  ?>





<!--
Used basic html and bootstrap skeleton from the below link for style purpose which contains bootstrap.css,bootstrap.js,jquery.js
https://www.w3schools.com/bootstrap/bootstrap_get_started.asp
Used bootstrap form elements from below link.
https://www.w3schools.com/bootstrap/bootstrap_forms.asp-->
<!DOCTYPE html>

<html lang="en">
    <head>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">

        <title>
          Monthly Bills
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
        <!--extra-->



    <link href="../bootstrap/css/jumbotron.css" rel="stylesheet">
        <script src="../bootstrap/js/jquery-3.1.1.js"></script>

        <script src="../bootstrap/js/bootstrap.min.js"></script>

       <script src="../bootstrap/js/jquery.quicksearch.js"></script>

    </head>

    <body class="g-sidenav-show  bg-gray-100">
      <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href=" dashboard.php " target="_blank">
            <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Monthly Bill Dashboard</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link  " href="../pages/dashboard.php">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>shop </title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(0.000000, 148.000000)">
                            <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                            <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  " href="../pages/bill_add.php">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>office</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g id="office" transform="translate(153.000000, 2.000000)">
                            <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                            <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
                <span class="nav-link-text ms-1">Add Bill</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../pages/bills_add_monthly.php">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>office</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g id="office" transform="translate(153.000000, 2.000000)">
                            <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                            <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
                <span class="nav-link-text ms-1">Add Monthly Report</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/bill_list.php">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>office</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g id="office" transform="translate(153.000000, 2.000000)">
                            <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                            <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
                <span class="nav-link-text ms-1">List Bills</span>
              </a>
            </li>



            <li class="nav-item mt-3">
              <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
              <a class="nav-link  " href="../pages/profile.php">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>customer-support</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(1.000000, 0.000000)">
                            <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                            <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                            <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
              </a>
            </li>

          </ul>
        </div>


      </aside>
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
          <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo $year."";?></li>
              </ol>
              <h6 class="font-weight-bolder mb-0"><?php echo $month. ", "; echo $year."";?></h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" placeholder="Type here...">
                </div>
              </div>
              <ul class="navbar-nav  justify-content-end">

                <li class="nav-item d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign In</span>
                  </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                      <i class="sidenav-toggler-line"></i>
                      <i class="sidenav-toggler-line"></i>
                      <i class="sidenav-toggler-line"></i>
                    </div>
                  </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-body p-0">
                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                  </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell cursor-pointer"></i>
                  </a>
                  <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">


      </ul>
              </ul>


        </nav>
    <body>

<!--CONTENT -->





      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6><?php echo $month. ", "; echo $year." ";?>Bills</h6>
              </div>

    <div class="card-body px-1 pt-1 pb-2">




                            <div class="form-group input-group">

                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>

                              <input name="query" id="txt_query" placeholder="Search" type="text" class="form-control">

                            </div>


<div class="table-responsive-xl">
                            <table id="table" class="table table-hover">

                             <thead>

                                 <tr>

                                     <th>Id</th>
                                     <th>Bill Name</th>
                                <!--     <th>Bill Account #</th>
                                     <th>Bill User</th>
                                     <th>Bill Website</th> -->
                                     <th>Bill Due Date</th>
                                     <th>
                                       Last Paid Amount
                                     </th>
                                     <Th>
                                       Last Paid Date
                                     </Th>
                                 <th>
                                   Bill Notes
                                 </th>
                                 <th>
                                   Pay
                                 </th>


                                 </tr>

                             </thead>

                            <tbody><tr>
                              <?php

include_once '../config_save.php';








          $sql = "SELECT * FROM history WHERE Year = '".$year."' AND Month  ='".$month."'";
         $result = $conn->query($sql);
      //    while ($row = mysqli_fetch_assoc($result)) {


                        //      $result = mysqli_query($conn,"SELECT * FROM default_bills");
    //      $sql = "SELECT id_bill, bill_name, bill_due_date, bill_website, bill_account, bill_user, bill_notes, bill_paid_date, bill_paid_amount FROM default_bills";

          $result = $conn->query($sql);



          if ($result->num_rows > 0) {

              // output data of each row

              while($row = $result->fetch_assoc()) {

                                        $obill_id        = $row['b_id'];
                                        $bill_id        = $row['id_bill'];
                                        $bill_name    = $row['bill_name'];
                                      //  $bill_account  = $row['bill_account'];
                                        $bill_due_date     = $row['bill_date'];
                                      //  $bill_user  = $row['bill_user'];
                                      //  $bill_website        = $row['bill_website'];
                                        $bill_paid_date  = $row['bill_paid_date'];
                                        $bill_paid_amount  = $row['bill_paid_amount'];
                                        $bill_notes  = $row['bill_notes'];


                                        echo    "<th>".$bill_id."</th>";
                                        echo    "<td>".$bill_name."</td>";
                                  //      echo    "<td>".$bill_account."</td>";
                                    //    echo    "<td>".$bill_user."</td>";
                                    //    echo    "<td>".$bill_website."</td>";
                                        echo    "<td>".$bill_due_date."</td>";
                                        echo	 "<td>".$bill_paid_amount."</td>";
                                        echo	 "<td>".$bill_paid_date."</td>";
                                        echo    "<td>".$bill_notes."</td>";
                                      //  echo "<td><a href='myBtn".$bill_id."'class='btn btn-primary' role='button'>Pay</a></td></tr>";


                                        echo "<td><button data-toggle='modal' data-target='#myModal-".$obill_id."' class='btn btn-primary' role='button'>Pay</a></td></tr>";





//  <!-- test-->




                                $modal = array( 'modal1', 'modal2', 'modal3', 'modal4' );// Set the array
                                $i = $bill_id; // Set the increment variable


                                ?>



                                <!-- The Modal -->
<!--data-->
<?php
//get video info

    // sending query



$sql2 = "SELECT * FROM default_bills WHERE id_bill = '". $bill_id . "'";
$result2 = $conn->query($sql2);
if (!$result2) {
    echo "Could not successfully run query ($sql2) from DB: " . mysqli_errno();
    exit;
}

if (mysqli_num_rows($result2) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus
while ($row2 = mysqli_fetch_assoc($result2)) {




$bill_id2        = $row2['id_bill'];
$bill_name2    = $row2['bill_name'];
$bill_account2  = $row2['bill_account'];
$bill_due_date2     = $row2['bill_due_date'];
$bill_user2  = $row2['bill_user'];
$bill_website2        = $row2['bill_website'];
$bill_paid_date2  = $row2['bill_paid_date'];
$bill_paid_amount2  = $row2['bill_paid_amount'];
$bill_notes2  = $row2['bill_notes'];

}

?>
<!--old modal -->
                                <div class="modal" id="myModal-<?php echo $obill_id; // Displaying the increment ?>">
                                  <div class="modal-dialog">
                                    <div class="modal-content">

                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Pay <?php echo $bill_name2; ?></h4>
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                      </div>
<!--old modal-->


                                      <!-- Modal body -->
                                      <div class="modal-body">






                                        <div class="row">
                                          <div class="col-12">


                                                     <form method="post" action="../bill_pay_save.php">
                                                       <input type="hidden" name="year1" value="<?php echo $year; ?>">
                                                       <input type="hidden" name="month1" value="<?php echo $month; ?>">
                                                       <div class="container">
                                                         <div class="row">
                                                           <div class="col-sm">
                                                             <label for="obillname">Original Bill ID</label>
                                                             <p class="text-sm-start"><?php echo $bill_id; ?></p>
                                                             <input type="hidden" name="obill_id" value="<?php echo $bill_id; ?>">

                                                      </div>

                                                         <div class="col-sm">
                                                       <label for="accountnumber">Monthly Bill ID</label>
                                                          <p class="text-sm-start"><?php echo $obill_id;?></p>
                                                          <input type="hidden" name="mbill_id" value="<?php echo $obill_id;?>">

                                                      </div>
                                                      </div>





                                                         <div class="row">
                                                           <div class="col-sm">
                                                             <label for="buser">User Name</label>
                                                             <p class="text-sm-start"><?php echo $bill_user2;?></p>

                                                     </div>

                                                         <div class="col-sm">
                                                       <label for="accountnumber">Account Number</label>
                                                          <p class="text-sm-start" name="bill_account_label"><?php echo $bill_account2;?></p>

                                                     </div>
                                                     </div>

                                                     <div class="row">
                                                       <div class="col-sm">
                                                       <label for="buser">Last Paid Date</label>
                                                       <p class="text-sm-start"><?php echo $bill_paid_date2;?></p>

                                                     </div>

                                                     <div class="col-sm">
                                                     <label for="bdate">Due Date</label>
                                                     <p class="text-sm-start"><?php echo $bill_due_date2;?></p>

                                                     </div>
                                                     <div class="form-group">
                                                       <label for="bwebsite">Website Address</label><br>
                                                      <a href="<?php echo $bill_website2;?>" target="_blank" class="link-info"><?php echo $bill_website2;?></a>

                                                     </div>


                                                     <div class="form-group">
                                                       <label for="bnotess">Notes</label>
                                                       <textarea class="form-control" name="bnotes" v rows="3"><?php echo $bill_notes;?></textarea>
                                                     </div>

                                                     </div>
                                                     <div class="input-group mb-3">
                                                       <div class="input-group-prepend">
                                                         <span class="input-group-text">$</span>
                                                       </div>
                                                       <input type="text" name ="ubill_paid_amount" class="form-control" aria-label="Amount (to the nearest dollar)">

                                                     </div>





                                                 </div>



                                     </div>
                                   <!--end of content -->
                                   </div>




                                      </div>

                                      <!-- Modal footer -->
                                      <div class="modal-footer">



                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          <input type="submit" class="btn btn-primary" name="submit_bill" value="Save"/>
                                      </div>

                                    </div>
                                  </div>
                                </div>

</form>
                                <?php






                            }



                            $conn->close();
}
                            ?>

                             </tbody>

                            </table>
                            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                              <hr class="bg-primary border-2 border-top border-primary">


                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                      </symbol>
                                      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                      </symbol>
                                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                      </symbol>
                                    </svg>


                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                      <div>
                                        <?php echo $_SESSION['success_message']; ?>
                                      </div>
                                    </div>







                                      <?php
                                      unset($_SESSION['success_message']);
                                  }
                                  ?>





                </div>
            </div>
        </div>
</div>




        <!--END CONTENT -->
        <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  made with <i class="fa fa-heart"></i> by
                  <a href="https://schellschockmedia.com" class="font-weight-bold" target="_blank">SchellSchock Media</a>
                  for a better web.
                </div>
              </div>

            </div>
          </div>
        </footer>
      </div>
    </main>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
      </a>
      <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Monthly Bill Configurator</h5>
            <p>See our dashboard options.</p>
          </div>
          <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
              <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          </div>
          <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="mt-3">
            <h6 class="mb-0">Navbar Fixed</h6>
          </div>
          <div class="form-check form-switch ps-0">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
          <hr class="horizontal dark my-sm-4">

          </div>
        </div>
      </div>
    </div>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
          var win = navigator.platform.indexOf('Win') > -1;
          if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
              damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
          }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>



<!--- script for the sexy search --->
        <script>

  $('input#txt_query').quicksearch('table#table tbody tr');

</script>
<script>
var formatter = new Intl.NumberFormat('en-US', {
style: 'currency',
currency: 'USD',
});

document.querySelector('#ubill_paid_amount').addEventListener('change', (e)=>{
if(isNaN(e.target.value)){
    e.target.value = ''
}else{
  e.target.value = formatter.format(e.target.value);
}
})
</script>

<script>
$(document).ready(function() {
    setTimeout(function() {
        $(".alert").alert('close');
    }, 4000);
});
</script>
    </body>
</html>
