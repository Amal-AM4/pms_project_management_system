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
            <a href="course.php" class="nav-link" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Course Data</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="add_team.php" class="nav-link" href="#charts" aria-expanded="false" aria-controls="charts">
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
            <style type="text/css">
              .p {
                color: #908989;
                
              }

              .screen {
                width: 95%;
                height: 500px;
              }

              .screen .screen-left {
                float: left;
                width: 70%;
                height: 500px;
                border-radius: 10px 0px 0px 10px;
              }

              .screen .screen-right {
                float: right;
                width: 30%;
                height: 500px;
                border-radius: 10px;
                background: #fff;
                box-shadow: 0 10px 15px rgba(0,0,0,0.2);
              }

              .screen iframe {
                border: none;
              }


            </style>
            <h3>Playlist</h3>
            <?php
              $courseID = $_GET['courseID'];
              $cour_name = "SELECT ID, TITLE FROM `tbl_course` WHERE ID = '$courseID'";
              $c_exe = mysqli_query($conn, $cour_name);
              $cc = mysqli_fetch_assoc($c_exe);
            ?>
            <p class="p"><?php echo $cc['TITLE'];?></p>

            <div class="screen">
              <div class="screen-left">
                <?php
                  if (!isset($_GET['epID'])) 
                  {
                  ?>
                    <video width="100%" height="100%" autoplay loop style="border-radius: 10px;">
                        <source src="assets/video/intro.mp4" type="video/mp4">
                    </video>
                  <?php
                  }
                  else
                  {
                  ?>
                    <iframe src="play.php?courseID=<?php echo $courseID;?>&epID=<?php echo $_GET['epID'];?>" class="screen-box" width="100%" height="100%"></iframe>
                  <?php
                  }
                ?>
                
              </div>
              <div class="screen-right" style="overflow-y:scroll;">
                <h3 style="margin: 0; padding: 0; margin-top: 20px; margin-left: 15px;">Playlist</h3>
                <style type="text/css">
                  table {
                    width: 90%;
                    margin-left: 15px;
                    font-family: sans-serif;
                    border-collapse:separate;
                    border-spacing:0 15px;

                  }

                  table tr {
                    margin-bottom: 20px;
                    border-radius: 10px;
                    background-color: #454040;
                    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
                  }

                  table tr td {
                    padding: 10px;
                    color: #fff;
                  }

                  table tr td a {
                    color: #fff;
                  }

                  table tr td a:hover {
                    color: #4fb7f8;
                  }
                </style>
                <table>
                <?php
                  require_once 'includes/config.php';
                  $sn = 1;
                  $play = "SELECT * FROM `tbl_lesson` WHERE COURSE_ID = '$courseID'";
                    $play_exe = mysqli_query($conn, $play);
                    while ($row = mysqli_fetch_assoc($play_exe)) 
                    {
                ?>

                    <tr>
                      <td style="border-radius: 10px 0px 0px 10px;"><?php echo $sn;?></td>
                      <td><?php echo substr($row['EP_NAME'], 0,15);?>...</td>
                      <td style="border-radius: 0px 10px 10px 0px;">
                        <a href="video_process.php?cID=<?php echo $courseID;?>&epID=<?php echo $row['ID'];?>"><i class="far fa-play-circle"></i></a>
                      </td>
                      
                    </tr>

                <?php
                  $sn ++;
                    }
                ?>
                </table>
              </div>
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

