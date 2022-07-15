<?php   session_start();
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
      <!--modal open over -->
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
                echo "<td><button type='button' class='btn bg-gradient-primary' data-bs-toggle='modal' data-bs-target='#payBill-".$obill_id."'>Pay</a></td>";
                echo    "<td>".$bill_name."</td>";
                echo    "<td>".$bill_due_date."</td>";
                echo	 "<td>".$bill_paid_amount."</td>";
                echo	 "<td>".$bill_paid_date."</td>";
                echo    "<td>".$bill_notes."</td>";
                echo    "<td>".$bill_id."</td></tr>";
                //  <!-- test-->
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
              <!--edit modal-->
              <div class="modal" id="edit_bill_id-<?php echo $bill_id; ?>" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="edit_bill" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit: <?php echo $bill_name; ?></h4>
                      <button type="submit" class="btn bg-gradient-danger w-auto me-2" name="delete_bill_report">
                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                      </div>
                      <div class="container">
                      </div>
                      <div class="modal-body">
                        <form method="post" action="../op/updates.php">
                          <input type="hidden" name="bname" value="<?php echo $bill_name; ?>">
                          <input type="hidden" name="year1" value="<?php echo $year; ?>">
                          <input type="hidden" name="month1" value="<?php echo $month; ?>">
                          <input type="hidden" name="mbill_id" value="<?php echo $obill_id;?>">
                          <div class="container">
                            <input type="hidden" id="bill_id" name="bill_id" value="<?php echo $bill_id; ?>">
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="input-group input-group-static mb-4">
                                  <label>Bill Name</label>
                                  <input class="form-control" name="bname" id="bname" value="<?php echo $bill_name;?>" placeholder="Bill Name" type="text" >
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="input-group input-group-static mb-4">
                                  <label for="accountnumber">Account Number</label>
                                  <input type="text" class="form-control" name="accountnumber" value="<?php echo $bill_account2;?>" placeholder="Account Number">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="input-group input-group-static mb-4">
                                    <label for="buser">User Name</label>
                                    <input type="text" class="form-control" name="buser" value="<?php echo $bill_user2;?>" placeholder="User Name">
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="input-group input-group-static mb-4">
                                    <label for="bdate">Due Date</label>
                                    <select class="form-control " id="bdate" name="bdate">
                                      <option value selected = "<?php echo $bill_due_date2;?>"><?php echo $bill_due_date2;?></option>
                                      <option value = "1st">1st</option>
                                      <option value = "2nd">2nd</option>
                                      <option value = "3rd">3rd</option>
                                      <option value = "4th">4th</option>
                                      <option value = "5th">5th</option>
                                      <option value = "6th">6th</option>
                                      <option value = "7th">7th</option>
                                      <option value = "8th">8th</option>
                                      <option value = "9th">9th</option>
                                      <option value = "10th">10th</option>
                                      <option value = "11th">11th</option>
                                      <option value = "12th">12th</option>
                                      <option value = "13th">13th</option>
                                      <option value = "14th">14th</option>
                                      <option value = "15th">15th</option>
                                      <option value = "16th">16th</option>
                                      <option value = "17th">17th</option>
                                      <option value = "18th">18th</option>
                                      <option value = "19th">19th</option>
                                      <option value = "20th">20th</option>
                                      <option value = "21st">21st</option>
                                      <option value = "22nd">22nd</option>
                                      <option value = "23rd">23rd</option>
                                      <option value = "24th">24th</option>
                                      <option value = "25th">25th</option>
                                      <option value = "26th">26th</option>
                                      <option value = "27th">27th</option>
                                      <option value = "28th">28th</option>
                                      <option value = "29th">29th</option>
                                      <option value = "30th">30th</option>
                                      <option value = "31st">32st</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-9">
                                  <div class="input-group input-group-static mb-4">
                                    <label for="bwebsite">Website Address</label>
                                    <input type="text" class="form-control" name="bwebsite" value="<?php echo $bill_website2;?>" placeholder=http://billwebsite.com>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-9">
                                  <div class="input-group input-group-static mb-4">
                                    <label for="bnotes">Notes</label>
                                    <textarea class="form-control" name="bnotes" v rows="3"><?php echo $bill_notes;?></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn bg-gradient-dark  w-auto me-2" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn bg-gradient-primary-custom w-auto me-2" name="updatebill_report" value="Save changes"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!--end-->
            <div class="modal" id="payBill-<?php echo $obill_id; // Displaying the increment ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pay <?php echo $bill_name; ?></h5>
                    <!--second modal button -->
                    <a data-bs-toggle="modal" href="#edit_bill_id-<?php echo $bill_id; ?>" class="btn bg-gradient-info w-auto me-2">
                      <!--  <button type="button" class="btn bg-gradient-info w-auto me-2"> -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                      </svg>
                    </a>                    
                    <!--end second modal button-->
                  </div>
                  <div class="modal-body">
                    <form method="post" action="../op/updates.php">
                      <input type="hidden" name="bname" value="<?php echo $bill_name; ?>">
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
                          <div class="col-sm">
                            <label>Amount Paid</label>
                            <div class="input-group input-group-outline">
                              <label class="form-label">$</label>
                              <input type="text" name ="ubill_paid_amount" class="form-control mb-sm-0">
                            </div>
                          </div>
                        </div>
                        <br />
                        <div class="modal-footer justify-content-between">
                          <input type="submit" class="btn btn-danger w-auto me-2" name="delete_bill_report" value="Delete"/>
                          <button type="button" class="btn bg-gradient-dark w-auto me-2" data-bs-dismiss="modal">Close</button>
                          <input type="submit" class="btn bg-gradient-primary-custom w-auto me-2" name="submit_bill_report" value="Save"/>
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
      <?php
      include_once '../op/functions.php';
      messageAlert("success", "bill_save_success_message");
      messageAlert("danger", "delete_bill_success_message");
      messageAlert("success", "report_update_success_message");
      messageAlert("danger", "report_delete_success_message");
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
