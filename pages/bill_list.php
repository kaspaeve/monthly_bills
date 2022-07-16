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
  <link href="../assets/css/material/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/material/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/material/material-kit.css?v=3.0.4" rel="stylesheet" />

  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
  <!--  Navbar -->
  <?php include_once '../include/navbar.php'; ?>
      <?php include_once '../op/functions.php'; ?>
  <!-- End Navbar -->
  <div class="page-header min-height-400" style="background-image: url(&#39;https://images.unsplash.com/photo-1520769945061-0a448c463865?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80&#39;);" loading="lazy">
    <span class="mask bg-gradient-dark opacity-8"></span>
    <div class="container">
      <div class="row">
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
            <li class="breadcrumb-item text-dark opacity-5"><a href="javascript">List Bills</a></li>
          </ol>
          <h6 class="font-weight-bolder mb-0">List Bills</h6>
        </nav>
      </div>
    </div>
    <!--end bread-->
    <div class="container-fluid py-4">
      <!--testing-->
      <div class="table-responsive-xl">
        <table id="sortTable" class="table table-striped table-hover" style="width:100%">
          <thead>
            <tr>
              <th></th>
              <th>Bill Name</th>
              <th>Bill Account #</th>
              <th>Bill User</th>
              <th>Bill Website</th>
              <th>Bill Date</th>
              <th>
                Last Paid Amount
              </th>
              <Th>
                Last Paid Date
              </Th>
              <th>
                Bill Notes
              </th>
              <th>Id</th>
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
                echo "<td><button type='button' class='btn bg-gradient-info w-auto me-2' data-bs-toggle='modal' data-bs-target='#editModal-".$bill_id."'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'><path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/></svg></a></td>";
                echo    "<td>".$bill_name."</td>";
                echo    "<td>".$bill_account."</td>";
                echo    "<td>".$bill_user."</td>";
                echo    "<td>".$bill_website."</td>";
                echo    "<td>".$bill_due_date."</td>";
                echo	 "<td>".$bill_paid_amount."</td>";
                echo	 "<td>".$bill_paid_date."</td>";
                echo    "<td>".$bill_notes."</td>";
                echo    "<td>".$bill_id."</td></tr>";
                ?>
                <!-- Modal -->
                <div class="modal fade" id="editModal-<?php echo $bill_id; // Displaying the increment ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $bill_name ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="../op/updates.php">
                          <div class="container">
                            <input type="hidden" id="bill_id" name="bill_id" value="<?php echo $bill_id; ?>">
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="input-group input-group-static mb-4">
                                  <label>Bill Name</label>
                                  <input class="form-control" name="bname" id="bname" value="<?php echo $row['bill_name'];?>" placeholder="Bill Name" type="text" >
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="input-group input-group-static mb-4">
                                  <label for="accountnumber">Account Number</label>
                                  <input type="text" class="form-control" name="accountnumber" value="<?php echo $row['bill_account'];?>" placeholder="Account Number">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="input-group input-group-static mb-4">
                                    <label for="buser">User Name</label>
                                    <input type="text" class="form-control" name="buser" value="<?php echo $row['bill_user'];?>" placeholder="User Name">
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="input-group input-group-static mb-4">
                                    <label for="bdate">Due Date</label>
                                    <select class="form-control " id="bdate" name="bdate">
                                      <option value selected = "<?php echo $row['bill_due_date'];?>"><?php echo $row['bill_due_date'];?></option>
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
                                    <input type="text" class="form-control" name="bwebsite" value="<?php echo $row['bill_website'];?>" placeholder=http://billwebsite.com>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-9">
                                  <div class="input-group input-group-static mb-4">
                                    <label for="bnotes">Notes</label>
                                    <textarea class="form-control" name="bnotes" v rows="3"><?php echo $row['bill_notes'];?></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <input type="submit" class="btn btn-danger w-auto me-2" name="delete_bill_list" value="Delete"/>
                            <button type="button" class="btn bg-gradient-dark  w-auto me-2" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn bg-gradient-primary-custom w-auto me-2" name="updatebill_list" value="Save changes"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!--end modal-->
            <?php
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
    <?php
    messageAlert("success", "update_success_message");
    messageAlert("danger", "delete_success_message"); ?>
  </div>
</div>
</div>
</div>
<!--end testing-->
</div>
</div>
</div>
</div>
<!--   Core JS Files   -->
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
<!--testin-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
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
