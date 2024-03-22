<?php
    session_start();
    require_once 'includes/config.php';

    if (isset($_SESSION['userID'])) 
    {
        $USER_ID = $_SESSION['userID'];
        $sql = "SELECT * FROM `tbl_user` WHERE EMAIL = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $id = $data['ID'];
?>
<!-- Container zone -->


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User</title>

  <link rel="stylesheet" href="assets/css/pay.css">

  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">

  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="dashboard.php"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
             
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo substr($data['PROFILE'], 5);?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="course.php" class="nav-link" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Course</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="pay_status.php" class="nav-link" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Payment Status</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="chatroom.php" class="nav-link" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Message</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="request.php" class="nav-link" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Request</span>
              <i class="menu-arrow"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../customer/index.php" aria-expanded="false" aria-controls="auth">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Exit</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo $data['FULL_NAME'];?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="body-wrapper">
            
            <div class="pay_title">
              <h2>Spend Amount</h2>
              <?php
                $pay = "SELECT tbl_course.DIS_PRICE AS PRICE1, SUM(tbl_course.DIS_PRICE) AS P1 FROM tbl_course_order, tbl_course, tbl_user WHERE tbl_course_order.COURSE_ID=tbl_course.ID AND tbl_course_order.USER_ID = tbl_user.ID AND tbl_user.ID = '$id'";
                $pay_exe = mysqli_query($conn, $pay);
                $ff = mysqli_fetch_assoc($pay_exe);

                $pay1 = "SELECT tbl_package.DIS_PRICE AS PRICE2, SUM(tbl_package.DIS_PRICE) AS P2 FROM tbl_package_order, tbl_package, tbl_user WHERE tbl_package_order.PACK_ID=tbl_package.ID AND tbl_package_order.USER_ID = tbl_user.ID AND tbl_user.ID = $id";
                $pay_exe1 = mysqli_query($conn, $pay1);
                $ff1 = mysqli_fetch_assoc($pay_exe1);
                
                $total = $ff['P1'] + $ff1['P2'];
              ?>
              <h3>₹ <?php echo $total;?></h3>
              <hr>
            </div>
            <br>
            <div class="tbl-course">
              <h3>Course Details</h3><br>
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>NAME</th>
                  <th>COMPANY NAME</th>
                  <th>PRICE</th>
                  <th>DATE&TIME</th>
                  <th>PURCHASED</th>
                </tr>
                <?php
                  $s = "SELECT tbl_course.TITLE AS NAME, tbl_companies.COMP_NAME AS COMPNAME, tbl_course.DIS_PRICE AS PRICE, tbl_course.LOGS AS TIMEZ, tbl_course.STATUS AS ACT FROM tbl_course,tbl_course_order,tbl_user,tbl_companies WHERE tbl_course_order.COURSE_ID=tbl_course.ID AND tbl_course_order.USER_ID=tbl_user.ID AND tbl_course_order.COMPY_ID=tbl_companies.ID  AND tbl_user.ID = '$id'";
                  $s_e = mysqli_query($conn, $s);
                  $sn = 1;
                  while ($r = mysqli_fetch_assoc($s_e)) 
                  {
                ?>
                    <tr>
                      <td><?php echo $sn;?></td>
                      <td><?php echo $r['NAME'];?></td>
                      <td><?php echo $r['COMPNAME'];?></td>
                      <td>₹ <?php echo $r['PRICE'];?></td>
                      <td><?php echo $r['TIMEZ'];?></td>
                      <td>
                        <?php 
                          if ($r['ACT'] == 1) 
                          {
                            echo "Purchased";
                          }
                          else
                          {
                            echo "Not Purchased";
                          }
                        ?>
                        </td>
                    </tr>
                <?php
                    $sn ++;
                  }
                ?>
              </table>
            </div>
            <br>
            <div class="tbl-course">
              <h3>Package Details</h3><br>
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>NAME</th>
                  <th>PRICE</th>
                  <th>DATE&TIME</th>
                  <th>PURCHASED</th>
                </tr>
                <?php
                  $s1 = "SELECT tbl_package.TITLE AS NAME, tbl_package.DIS_PRICE AS PRICE, tbl_package.LOGS AS TIMEZ, tbl_package.STATUS AS ACT FROM tbl_package,tbl_package_order,tbl_user WHERE tbl_package_order.PACK_ID=tbl_package.ID AND tbl_package_order.USER_ID=tbl_user.ID AND tbl_user.ID = '$id'";
                  $s_e1 = mysqli_query($conn, $s1);
                  $sn1 = 1;
                  while ($r1 = mysqli_fetch_assoc($s_e1)) 
                  {
                ?>
                    <tr>
                      <td><?php echo $sn1;?></td>
                      <td><?php echo $r1['NAME'];?></td>
                      <td>₹ <?php echo $r1['PRICE'];?></td>
                      <td><?php echo $r1['TIMEZ'];?></td>
                      <td>
                        <?php 
                          if ($r1['ACT'] == 1) 
                          {
                            echo "Download";
                          }
                          else
                          {
                            echo "Not Download";
                          }
                        ?>
                        </td>
                    </tr>
                <?php
                    $sn ++;
                  }
                ?>
              </table>
            </div>



          </div>
          
         
          
          
            
          
         
        <!-- content-wrapper ends -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <script src="vendors/js/vendor.bundle.base.js"></script>

  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>

  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>

</body>

</html>






<!-- Container zone ends -->
<?php
    }
    else
    {
        header('location:index.php');
    }
?>

