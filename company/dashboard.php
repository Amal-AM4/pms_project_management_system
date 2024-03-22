<?php
    session_start();
    require_once 'includes/config.php';

    if (isset($_SESSION['CID'])) 
    {
        $USER_ID = $_SESSION['CID'];
        $sql = "SELECT * FROM `tbl_companies` WHERE USER_ID = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $c_id = $data['ID'];
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
              <img src="<?php echo substr($data['COMP_LOGO'], 8);?>" alt="profile"/>
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
            <a href="members.php" class="nav-link" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Members</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="course.php" class="nav-link"  aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Course Data</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="add_team.php" class="nav-link"  aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Add Members</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="order.php" class="nav-link"  aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Order Details</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="gallery.php" class="nav-link"  aria-expanded="false" aria-controls="tables">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Gallery</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Profile</span>
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
                  <h3 class="font-weight-bold">Welcome <?php echo $data['MANAGER_NAME'];?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="body-wrapper">
            
            <div class="card">
              <div class="card-body">
                <h3 class="card-title"><a href="profile.php" class="btn btn-outline-primary btn-fw">Update</a></h3>
                <p class="card-description">Please update your company profile for activation process. Otherword if you do not update the profile. Company details should not visible to user. So, kindly update the profile for max usage.</p>
              </div>
            </div>
            <br>

            <div class="row">

              <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                    <p>Total earning</p>
                    <?php
                $pay = "SELECT tbl_course.DIS_PRICE AS PRICE1, SUM(tbl_course.DIS_PRICE) AS P1 FROM tbl_course_order, tbl_course WHERE tbl_course_order.COURSE_ID=tbl_course.ID AND  tbl_course_order.COMPY_ID= '$c_id'";

                $pay_exe = mysqli_query($conn, $pay);
                $ff = mysqli_fetch_assoc($pay_exe);
                $total = $ff['P1'];
              ?>
                    <h2>₹ <?php if($total==0) {
                        echo 0;
                    }else{
                      echo $total;
                    }?></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p>Team Members</p>
                    <?php
                      $count = "SELECT COUNT(ID) AS INCC FROM tbl_team WHERE tbl_team.COMP_ID='$c_id'";
                      $cz = mysqli_query($conn,$count);
                      $c = mysqli_fetch_assoc($cz);
                    ?>
                    <h2><i class="far fa-user"></i> <?php if($c['INCC']==0) {
                        echo 0;
                    }else{
                      echo $c['INCC'];
                    }?></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-light-blue">
                  <div class="card-body">
                    <p>Total Course</p>
                    <?php
                      $count = "SELECT COUNT(ID) AS INZC FROM tbl_course WHERE tbl_course.COMP_ID='$c_id'";
                      $cz1 = mysqli_query($conn,$count);
                      $c1 = mysqli_fetch_assoc($cz1);
                    ?>
                    <h2><i class="fas fa-box"></i> <?php if($c1['INZC']==0) {
                        echo 0;
                    }else{
                      echo $c1['INZC'];
                    }?></h2>
                  </div>
                </div>
              </div>

            </div>





          </div>
          
         
        
            
          <br>
          <br>
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

