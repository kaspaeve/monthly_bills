<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>

  <title>Monthly Bill</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Material Kit CSS -->
  <link href="../assets/css/material/material-kit.css?v=3.0.0" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/material/material-kit.css?v=3.0.4" rel="stylesheet" />
  <script src="../bootstrap/js/jquery-3.1.1.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
 <script src="../bootstrap/js/jquery.quicksearch.js"></script>
  <!--verify -->
  <script type="text/javascript">
  function validate()
  {
    var error="";
    var name = document.getElementById( "month" );
    if( name.value == "month" )
    {
      error = "<div class='alert alert-danger' role='alert'>Error: No Month Selected.</div>";
      document.getElementById( "error_para" ).innerHTML = error;
      return false;
    }
    else
    {
      return true;
    }
  }

</script>

<!--end verify-->
</head>
<body>
  <?php include_once '../include/navbar.php'; ?>

  <!--CONTENT -->
  <div class="page-header min-height-200" style="background-image: url('https://images.unsplash.com/photo-1630752708689-02c8636b9141?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2490&q=80')">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
        </div>
      </div>
    </div>
  </div>
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <!--bread-->
    <div class="container py-6 mt-2">
      <div class="row">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-dark opacity-5"><a href="../pages/dashboard.php">Home</a></li>
            <li class="breadcrumb-item text-dark opacity-5"><a href="javascript">Add Monthly Bill</a></li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Add Monthly Report</h6>
        </nav>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">

            <div class="card-body px-1 pt-1 pb-2">
              <div class="input-group input-group-outline">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="query" id="txt_query" placeholder="Search" type="text" class="form-control mb-sm-0">
              </div>
              <form method="post" action="../op/bills_add_monthly_submit.php" onsubmit="return validate();">
                <table id="table" class="table table-hover table-stripe">
                  <thead>
                    <tr>
                      <th>
                        Add
                      </th>
                      <th>Bill Name</th>
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
                    </tr>
                  </thead>
                  <tbody><tr>
                    <?php
                    include_once '../config_save.php';

                    //      $result = mysqli_query($conn,"SELECT * FROM default_bills");
                    $sql = "SELECT id_bill, bill_name, bill_due_date, bill_website, bill_account, bill_user, bill_notes, bill_paid_date, bill_paid_amount FROM default_bills";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        $bill_id        = $row['id_bill'];
                        $bill_name    = $row['bill_name'];
                        $bill_account  = $row['bill_account'];
                        $bill_due_date     = $row['bill_due_date'];
                        $bill_user  = $row['bill_user'];
                        $bill_website        = $row['bill_website'];
                        $bill_paid_date  = $row['bill_paid_date'];
                        $bill_paid_amount  = $row['bill_paid_amount'];
                        $bill_notes  = $row['bill_notes'];

                        echo "<td><input class='form-check-input' type='checkbox' name='bill_list[]' value='".$bill_id."'/></td>";
                        echo    "<td>".$bill_name."</td>";
                        echo    "<td>".$bill_due_date."</td>";
                        echo	 "<td>".$bill_paid_amount."</td>";
                        echo	 "<td>".$bill_paid_date."</td>";
                        echo    "<td>".$bill_notes."</td></tr>";
                      }
                    } else {
                      echo "0 results";
                    }
                    $conn->close();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
<hr class='bg-primary border-2 border-top border-primary'>
            <section class="my-5 pt-5">
          <div class="container-fluid py-4">
            <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="col-lg-3 me-auto">
                  <p class="lead text-dark pt-1 mb-0">Year/Month</p>
                </div>
                <div class="col-sm">
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="year" name="year">


                    <option selected value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                  </select>
                </div>
                <div class="col-sm">
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="month" name="month">
                    <option>month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select>
                </div>
                <div class="col-sm">

                  <div class="form-group">
                    <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', '1');
                    include_once '../op/functions.php';
                    messageAlert("success", "success_message_bill_add_monthly");
                    messageAlert("danger", "success_message_bill_add_monthly_failed");


  ?>

                    <input type="submit" class="btn btn-primary" name="save_multi" value="Create"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
        <!--END CONTENT -->

    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <?php include_once '../include/footer.php' ?>
    <!--   Core JS Files   -->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="../assets/js/plugins/countup.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="../assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
    <script>
    // get the element to animate
    var element = document.getElementById('count-stats');
    var elementHeight = element.clientHeight;
    // listen for scroll event and call animate function
    document.addEventListener('scroll', animate);
    // check if element is in view
    function inView() {
      // get window height
      var windowHeight = window.innerHeight;
      // get number of pixels that the document is scrolled
      var scrollY = window.scrollY || window.pageYOffset;
      // get current scroll position (distance from the top of the page to the bottom of the current viewport)
      var scrollPosition = scrollY + windowHeight;
      // get element position (distance from the top of the page to the bottom of the element)
      var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;
      // is scroll position greater than element position? (is element in view?)
      if (scrollPosition > elementPosition) {
        return true;
      }
      return false;
    }
    var animateComplete = true;
    // animate element when it is in view
    function animate() {
      // is element in view?
      if (inView()) {
        if (animateComplete) {
          if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
              countUp.start();
            } else {
              console.error(countUp.error);
            }
          }
          if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
              countUp1.start();
            } else {
              console.error(countUp1.error);
            }
          }
          if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
              countUp2.start();
            } else {
              console.error(countUp2.error);
            };
          }
          animateComplete = false;
        }
      }
    }
    if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 90,
        backSpeed: 90,
        backDelay: 200,
        startDelay: 500,
        loop: true
      });
    }
    </script>
    <script>
    if (document.getElementsByClassName('page-header')) {
      window.onscroll = debounce(function() {
        var scrollPosition = window.pageYOffset;
        var bgParallax = document.querySelector('.page-header');
        var oVal = (window.scrollY / 3);
        bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
      }, 6);
    }
    </script>
    <script>
    $('#sortTable').DataTable();
    </script>
    <script>
    $(document).ready(function() {
      setTimeout(function() {
        $(".alert").alert('close');
      }, 10000);
    });
    </script>


    <!--- script for the sexy search --->
    <script>

    $('input#txt_query').quicksearch('table#table tbody tr');

    </script>
  </body>
  </html>
