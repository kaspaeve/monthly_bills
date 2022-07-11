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
  <link href="../assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />



</head>

<body>
  <!--  Navbar -->
<?php include_once '../include/navbar.php'; ?>

  <!-- End Navbar -->


  <div class="page-header min-vh-80" style="background-image: url(&#39;https://images.unsplash.com/photo-1520769945061-0a448c463865?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80&#39;);" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
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
      <div class="row">
        <div class="col-12">






<!--testing-->


                          <table id="sortTable" class="table table-hover table-striped table-sm tasks-table" style="width:50%" >

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


                                    echo "<td><a href='bill_update.php?bill_id=".$bill_id."'class='btn btn-primary' role='button'>edit</a></td>";
                                    echo    "<td>".$bill_name."</td>";
                                    echo    "<td>".$bill_account."</td>";
                                    echo    "<td>".$bill_user."</td>";
                                    echo    "<td>".$bill_website."</td>";
                                    echo    "<td>".$bill_due_date."</td>";
                                    echo	 "<td>".$bill_paid_amount."</td>";
                                    echo	 "<td>".$bill_paid_date."</td>";
                                    echo    "<td>".$bill_notes."</td>";

                                    echo    "<td>".$bill_id."</td></tr>";
                            }

                        } else {

                            echo "0 results";

                        }



                        $conn->close();

                        ?>

                         </tbody>

                        </table>
                        <hr class="bg-primary border-2 border-top border-primary">
                        <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>



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




<!--end testing-->
</div>
</div>
    </div>
  </div>
  <!--   Core JS Files   -->


<?php include_once 'include/footer.php' ?>
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
$('#sortTable').DataTable();
</script>

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
</body>

</html>
