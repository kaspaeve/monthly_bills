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
        <li class="nav-item dropdown dropdown-hover mx-2 ms-lg-6">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages2" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
            Pages
            <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
          </a>
          <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
            <div class="d-none d-lg-block">
  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
    Landing Pages
  </h6>
  <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
    <span>About Us</span>
  </a>
  <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
    <span>Contact Us</span>
  </a>
  <a href="./pages/author.html" class="dropdown-item border-radius-md">
    <span>Author</span>
  </a>
  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
    Account
  </h6>
  <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
    <span>Sign In</span>
  </a>
</div>

<div class="d-lg-none">
  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
    Landing Pages
  </h6>

  <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
    <span>About Us</span>
  </a>
  <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
    <span>Contact Us</span>
  </a>
  <a href="./pages/author.html" class="dropdown-item border-radius-md">
    <span>Author</span>
  </a>

  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
    Account
  </h6>
  <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
    <span>Sign In</span>
  </a>

</div>

          </div>
        </li>

        <li class="nav-item dropdown dropdown-hover mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-icons opacity-6 me-2 text-md">view_day</i>
            Sections
            <img src="./assets/img/down-arrow-white.svg" alt="down-arrow" class="arrow ms-auto ms-md-2 d-lg-block d-none">
            <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2 d-lg-none d-block">
          </a>
        </li>

        <li class="nav-item dropdown dropdown-hover mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-icons opacity-6 me-2 text-md">article</i>
            Docs
            <img src="./assets/img/down-arrow-white.svg" alt="down-arrow" class="arrow ms-auto ms-md-2 d-lg-block d-none">
            <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2 d-lg-none d-block">
          </a>
        </li>

<li class="nav-item ms-lg-auto my-auto ms-3 ms-lg-0 mt-2 mt-lg-0">
          <button type="button" class="btn btn-sm  bg-gradient-primary mb-0 me-1 mt-2 mt-md-0" data-bs-toggle="collapse" data-bs-target="#demo">Simple collapsible</button>
          <div id="demo" class="collapse">
            <form method="post" action="bill_report.php" onsubmit="return validate();">
                  <div class="row mt-4">
                    <div class="card">
                      <div class="card-body p-3">
                      <div class="row">
                        <div class="col-md">

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
