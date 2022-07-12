<?php   session_start(); ?>
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
  <!--  Navbar -->
  <?php include_once '../include/navbar.php';
  if (isset($_POST['generatereport'])) {
    $year = ($_POST['year']);
    $month = ($_POST['month']);
  } else {
    $year = ($_GET ['year']);
    $month = ($_GET ['month']);
  }
  ?>
  <!-- End Navbar -->
  <div class="page-header min-height-400" style="background-image: url('https://images.unsplash.com/photo-1630752708689-02c8636b9141?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2490&q=80')">
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
            <li class="breadcrumb-item text-dark opacity-5"><a href="javascript">Bill Reports</a></li>
            <li class="breadcrumb-item text-dark opacity-5"><a href="javascript"><?php echo $year."";?></a></li>
            <li class="breadcrumb-item text-dark opacity-5"><a href="#"><?php echo $month."";?></a></li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?php echo $month. ", "; echo $year."";?> Bills</h6>
        </nav>
      </div>
    </div>
    <!--end bread-->
    <div class="container">
      <!--testing-->
      <div class="table-responsive-xl">
        <table id="sortTable" class="table table-hover" style="width:100%">
          <thead>
            <tr>
              <th></th>
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
              <th>
                ID
              </th>
            </tr>
          </thead>
          <tbody><tr>
            <?php
            include_once '../config_save.php';
            $sql = "SELECT * FROM history WHERE Year = '".$year."' AND Month  ='".$month."'";
            $result = $conn->query($sql);
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $obill_id        = $row['b_id'];
                $bill_id        = $row['id_bill'];
                $bill_name    = $row['bill_name'];
                $bill_due_date     = $row['bill_date'];
                $bill_paid_date  = $row['bill_paid_date'];
                $bill_paid_amount  = $row['bill_paid_amount'];
                $bill_notes  = $row['bill_notes'];
                echo "<td><button type='button' class='btn bg-gradient-primary' data-bs-toggle='modal' data-bs-target='#myModal-".$obill_id."'>Pay</a></td>";
                echo    "<td>".$bill_name."</td>";
                echo    "<td>".$bill_due_date."</td>";
                echo	 "<td>".$bill_paid_amount."</td>";
                echo	 "<td>".$bill_paid_date."</td>";
                echo    "<td>".$bill_notes."</td>";
                echo    "<td>".$bill_id."</td></tr>";
                //  <!-- test-->
                $modal = array( 'modal1', 'modal2', 'modal3', 'modal4' );// Set the array
                $i = $bill_id; // Set the increment variable
                ?>
                <!-- The Modal -->
                <!--data-->
                <?php
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
              </div>
              <div class="modal fade" id="myModal-<?php echo $obill_id; // Displaying the increment ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pay <?php echo $bill_name2; ?></h5>
                      <button type="button" class="btn bg-gradient-info w-auto me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="../op/report_pay_delete_bill.php">
                          <input type="hidden" name="bname" value="<?php echo $bill_name2; ?>">
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
                              <div class="input-group mb-4 input-group-static">
                                <label>Notes</label>
                                <textarea name="bnotes" class="form-control" id="message" rows="2"><?php echo $bill_notes;?></textarea>
                              </div>
                              <div class="col-8">
                                <div class="input-group input-group-outline">
                                  <label class="form-label">$</label>
                                  <input type="text" name ="ubill_paid_amount" class="form-control mb-sm-0">
                                </div>
                              </div>
                            </div>
                            <br />
                            <div class="modal-footer justify-content-between">
                              <input type="submit" class="btn btn-danger w-auto me-2" name="delete_bill" value="Delete"/>
                              <button type="button" class="btn bg-gradient-dark w-auto me-2" data-bs-dismiss="modal">Close</button>
                              <input type="submit" class="btn bg-gradient-primary-custom w-auto me-2" name="submit_bill" value="Save"/>
                            </div>
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
          <?php if (isset($_SESSION['bill_save_success_message']) && !empty($_SESSION['bill_save_success_message'])) { ?>
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
            <div class="alert alert-success text-white alert-dismissible d-flex align-items-center fade show" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                <?php echo $_SESSION['bill_save_success_message']; ?>
                <button type="button" class="btn-close text-white" data-bs-dismiss="alert"></button>
              </div>
            </div>
            <?php
            unset($_SESSION['bill_save_success_message']);
          }
          ?>
          <!--delete alert -->
          <?php if (isset($_SESSION['delete_bill_success_message']) && !empty($_SESSION['delete_bill_success_message'])) { ?>
            <hr class="bg-primary border-2 border-top border-primary">
            <div class="alert alert-danger text-white alert-dismissible d-flex align-items-center fade show" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>
                <?php echo $_SESSION['delete_bill_success_message']; ?>
                <button type="button" class="btn-close text-white" data-bs-dismiss="alert"></button>
              </div>
            </div>
            <?php
            unset($_SESSION['delete_bill_success_message']);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!--end testing-->
</div>
</div>
</div>
</div>
<?php include_once '../include/footer.php' ?>
<!--   Core JS Files   -->
<script src="../assets/js/core/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>

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
</body>

</html>
