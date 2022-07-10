<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
  <div class="container">
    <a class="navbar-brand  text-white " href="#" rel="tooltip" title="Made w/ love for the wife" data-placement="bottom" target="_blank">
      Monthly Bills
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pages/dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pages/bill_add.php">Add Bill</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pages/bills_add_monthly.php">Add Monthly Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pages/bill_list.php">List Bills</a>
        </li>
<li class="nav-item ms-lg-auto my-auto ms-3 ms-lg-0 mt-2 mt-lg-0">
          <button type="button" class="btn btn-sm  bg-gradient-primary mb-0 me-1 mt-2 mt-md-0" data-bs-toggle="collapse" data-bs-target="#demo">View Report</button>
          <div id="demo" class="collapse">
            <form method="post" action="bill_report2.php" onsubmit="return validate();">
                  <div class="row mt-4">
                    <div class="card">
                      <div class="card-body p-3">
                      <div class="row">
                        <div class="col-md">
<?php $month = date('F'); ?>
                          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="month" name="month">
                          <option value = <?php echo $month ?>><?php echo $month ?></option>
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
                    <div class="col-md">
                      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="year" name="year">
                      <option selected value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      </select>
                    </div>
                      <div class="col-md">
                        <input type="submit" class="btn btn-primary" name="generatereport" value="View"/>
                    </div>
                    <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                            <div class="alert alert-success" role="alert"><?php echo $_SESSION['success_message']; ?></div>
                              <?php
                              unset($_SESSION['success_message']);
                          }
                          ?>
                  </div>
                </div>
                </div>
              </div>
            </form>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->