<?php
    session_start();
    require_once 'includes/config.php';

    if (isset($_SESSION['ID'])) 
    {
        $USER_ID = $_SESSION['ID'];
        $sql = "SELECT * FROM `tbl_freelancer` WHERE USER_NAME = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $fid = $data['ID'];
?>
<!-- Container zone -->


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User</title>

  <link rel="stylesheet" href="assets/css/all.css">
  <script type="text/javascript" src="assets/js/all.js"></script>

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
              <img src="images/user_icon.png" alt="profile"/>
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
            <a href="add_category.php" class="nav-link" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Add Category</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="add_package.php" class="nav-link" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Add package</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="view_pack.php" class="nav-link" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">View Package</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="pay_status.php" class="nav-link" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Payment Status</span>
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
                  <h3 class="font-weight-bold">Welcome <?php echo $data['NAME'];?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="body-wrapper">
            
            <div class="row">

              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Profile Details</h2><hr>
                    <?php
                      $sel = "SELECT * FROM `tbl_freelancer` WHERE ID = '$fid'";
                      $e = mysqli_query($conn,$sel);
                      $r1 = mysqli_fetch_assoc($e);
                    ?>
                    <h4>Name : <?php echo $r1['NAME']; ?></h4>
                    <h4>Status : Active</h4>
                    <h4>E-mail : <?php echo $r1['EMAIL']; ?></h4>
                    <h4>User ID : <?php echo $r1['USER_NAME']; ?></h4>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 grid-margin transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p>Total earning</p>
                        <?php
                          $sum = "SELECT SUM(tbl_package.DIS_PRICE) AS PRICE FROM tbl_package,tbl_package_order WHERE tbl_package.ID=tbl_package_order.PACK_ID AND tbl_package.F_ID = '$fid'";
                          $s = mysqli_query($conn,$sum);
                          $sz = mysqli_fetch_assoc($s);
                        ?>
                       <h2>₹ <?php 
                        if ($sz['PRICE']==0){
                          echo 0;
                        }else{
                          echo $sz['PRICE'];
                        }?></h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p>Avg earning</p>
                       <?php
                          $avg = "SELECT AVG(tbl_package.DIS_PRICE) AS PRICEZ FROM tbl_package,tbl_package_order WHERE tbl_package.ID=tbl_package_order.PACK_ID AND tbl_package.F_ID = '$fid'";
                          $a = mysqli_query($conn,$avg);
                          $az = mysqli_fetch_assoc($a);
                        ?>
                       <h2>₹ <?php 
                        if ($az['PRICEZ']==0){
                          echo 0;
                        }else{
                          echo $sz['PRICE'];
                        }?></h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 grid-margin transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p>Package</p>
                        <?php
                          $dow1 = "SELECT COUNT(ID) AS PACK FROM `tbl_package` WHERE F_ID = '$fid'";
                          $d1 = mysqli_query($conn,$dow1);
                          $dz1 = mysqli_fetch_assoc($d1);
                        ?>
                       <h2><i class="fas fa-box"></i> <?php echo $dz1['PACK'];?></h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p>Downloads</p>
                        <?php
                          $dow = "SELECT * FROM `tbl_package` WHERE F_ID = '$fid'";
                          $d = mysqli_query($conn,$dow);
                          $dz = mysqli_fetch_assoc($d);
                        ?>
                       <h2><i class="far fa-user"></i> <?php 
                        if ($dz['DOWNLOADS']==0){
                          echo 0;
                        }else{
                          echo $dz['DOWNLOADS'];
                        }?></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
          
         
          
          
            
          
         <br>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. <a href="dashboard.php" target="_blank">User dashboard template</a> from Computer Science. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i>&nbsp;&nbsp;by S6.</span>
          </div>
        </footer>
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

