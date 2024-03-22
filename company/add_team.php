<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>
<?php
    require_once 'includes/config.php';

    if (isset($_SESSION['CID'])) 
    {
        $USER_ID = $_SESSION['CID'];
        $sql = "SELECT * FROM `tbl_companies` WHERE USER_ID = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $c_id = $data['ID'];
        $ui = $data['USER_ID'];
        $up = $data['PASSWORD'];
?>
<!-- Container zone -->

<?php

    $val = "SELECT * FROM `tbl_access` WHERE COMP_ID = '$c_id'";
    $exe = mysqli_query($conn,$val);
    // $a = mysqli_fetch_assoc($exe);
    //     $acces_id = $a['USER_ID'];
    //     $pass = $a['PASSWORD'];

    if ($exe) {
      if (mysqli_num_rows($exe) > 0) {

        $a = mysqli_fetch_assoc($exe);
        $acces_id = $a['USER_ID'];
        $pass = $a['PASSWORD'];

      } else {
        $new_table = "INSERT INTO `tbl_access`(`COMP_ID`, `USER_ID`, `PASSWORD`, `LOGS`, `STATUS`) VALUES ('$c_id','$ui','$up',now(),1)";
        mysqli_query($conn, $new_table);
      }
    }

    

    
?>
<?php
if(isset($_POST['submit']))
{
    $name = ucwords($_POST['name']);
    $email = $_POST['email'];
    $dept = ucwords($_POST['dept']);

    if(empty($name)) {
        $_SESSION['ErrorMessage'] = "All field must be fill out";
        Redirect_To('add_team.php');
    }
    if(empty($email)) {
        $_SESSION['ErrorMessage'] = "Fill email field";
        Redirect_To('add_team.php');
    }
     if(empty($dept)) {
        $_SESSION['ErrorMessage'] = "Fill Specialize field";
        Redirect_To('add_team.php');
    }

    if (!empty($name)) {
        $insert = "INSERT INTO `tbl_team`(`COMP_ID`, `NAME`, `EMAIL`, `DEPT`, `LOGS`, `STATUS`, `ACCESS_CONTROL`,`USER_ID`, `PASSWORD`, `ABOUT`) VALUES ('$c_id','$name','$email','$dept',now(),1,1,'$acces_id','$pass','Update please')";
          if (mysqli_query($conn,$insert)) {
             $_SESSION['SuccessMessage'] = "Data is successfully uploaded";
             Redirect_To('add_team.php');
          }
          else {
            $_SESSION['ErrorMessage'] = "Something went worng.";
            Redirect_To('add_team.php');
          }
    }

}
?>


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

          <div class="body-wrapper">
            
            <div class="content">
                  <h2>Add Members</h2>
                  
                  <form class="form-wrapper" method="post" action="">
                      <div>
                          <?php 
                              echo Message();
                              echo SuccessMessage();
                          ?>
                      </div>
                      <div class="form-group">
                          <span>Full Name</span>
                          <input type="text" class="form-control" id="" name="name">
                      </div>
                      <div class="form-group">
                          <span>Email ID</span>
                          <input type="email" class="form-control" id="" name="email">
                      </div>
                      <div class="form-group">
                          <span>Specialized</span>
                          <input type="text" class="form-control" id="" name="dept">
                      </div>
                      <div class="form-group">
                          <span>Access ID</span>
                          <input type="text" class="form-control" id="" name="userid" value="<?php echo $acces_id;?>" disabled>
                      </div>
                      <div class="form-group">
                          <span>Password</span>
                          <input type="password" class="form-control" id="" name="passwod" value="<?php echo $pass;?>" disabled>
                      </div>
                      <button type="submit" name="submit" class="btn btn-block btn-success">Add Member</button>
                  </form>

              </div>

          </div>
          
         
          
          
            
          
         
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
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

