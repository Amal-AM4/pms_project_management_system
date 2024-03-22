<?php
    require_once 'includes/functions.php';
    require_once 'includes/sessions.php';
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
<?php
if(isset($_POST['submit']))
{
    //$email = $_POST['email'];
    $number= $_POST['phone'];
    $addrs = $_POST['addrs'];
    $content = $_POST['post_content'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];

    $fileName = $_FILES['pack_file']['name'];
    $fileName = date('mjYHis').$fileName;
    $fileName = preg_replace("/\s+/", "_", $fileName);
    $fileTmpName = $_FILES['pack_file']['tmp_name'];
    $fileSize = $_FILES['pack_file']['size'];
    $fileError = $_FILES['pack_file']['error'];
    $fileType = $_FILES['pack_file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png','jpeg','jpg');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError == 0) {
            if ($fileSize < 20020367790) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDes = 'company/comp_logo/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDes);
            } else {
                $_SESSION['ErrorMessage'] = "To big";
                Redirect_To('edit-profile.php');
            }
        }
    } else {
        $_SESSION['ErrorMessage'] = "You canot upload files of this type!";
        Redirect_To('edit-profile.php');
    }

    if(empty($content)) {
        $_SESSION['ErrorMessage'] = "Fill the content field";
        Redirect_To('edit-profile.php');
    }
    if(empty($addrs)) {
        $_SESSION['ErrorMessage'] = "Fill the address field";
        Redirect_To('edit-profile.php');
    }
    if(empty($longitude)) {
        $_SESSION['ErrorMessage'] = "Point out the direction";
        Redirect_To('edit-profile.php');
    }
    if(empty($latitude)) {
        $_SESSION['ErrorMessage'] = "Point out the direction";
        Redirect_To('edit-profile.php');
    }
    if (!empty($c_id)) 
    {
        $update = "UPDATE `tbl_companies` SET `COMP_LOGO`='$fileDes',`ADDRESS`='$addrs',`PHONE`='$number',`DESCRIPTION`='$content',`LOGS`=now(), `LONGITUDE`='$longitude',`LATITUDE`='$latitude', `ACTIVATION`=1 WHERE USER_ID = '$USER_ID'";
        if (mysqli_query($conn,$update)) {
             $_SESSION['SuccessMessage'] = "Data is successfully updated";
             Redirect_To('edit-profile.php');
          }
          else {
            $_SESSION['ErrorMessage'] = "Something went worng.";
            Redirect_To('edit-profile.php');
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
                
                <h2>Update Company Profile</h2>

                <div>
                    <?php 
                        echo Message();
                        echo SuccessMessage();
                    ?>
                </div>

                <form action="" method="POST" enctype="multipart/form-data" class="form-wrapper">
                    <div class="form-group">
                        <span>Comapany Name</span>
                        <input type="text" class="form-control" id="" name="title" value="<?php echo $data['COMP_NAME'];?>" disabled>
                    </div>
                    <div class="form-group">
                        <span>Manager Name</span>
                        <input type="text" class="form-control" id="" name="m_name" value="<?php echo $data['MANAGER_NAME'];?>" disabled>
                    </div>
                    <div class="form-group">
                        <span>User ID</span>
                        <input type="text" class="form-control" id="" name="comy-id" value="<?php echo $data['USER_ID'];?>" disabled>
                    </div>
                    <div class="form-group">
                        <span>Comapany Logo</span>
                        <input type="file" class="form-control" id="" name="pack_file" value="<?php echo $data['COMP_LOGO'];?>">
                    </div>
                    <div class="form-group">
                        <span>E-mail</span>
                        <input type="email" class="form-control" id="" name="email" value="<?php echo $data['EMAIL'];?>" disabled>
                    </div>
                    <div class="form-group">
                        <span>Contact no</span>
                        <input type="number" class="form-control" id="" name="phone" value="<?php echo $data['PHONE'];?>" maxlength="10">
                    </div>
                    <div class="form-group">
                        <span>Address</span>
                        <textarea class="form-control" name="addrs"><?php echo $data['ADDRESS']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <span>Location</span>
                        <div class="row">
                          <div class="col-6">
                            <input type="text" name="longitude" placeholder="Longitude" class="form-control" value="<?php echo $data['LONGITUDE'];?>">
                          </div>
                          <div class="col-6">
                            <input type="text" name="latitude" placeholder="Latitude" class="form-control" value="<?php echo $data['LATITUDE'];?>">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="tinymce" name="post_content" placeholder=""><?php echo $data['DESCRIPTION'];?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-block btn-success">Update Information</button>
                    <br>
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

  <script src="assets/js/ty/tinymce.min.js"></script>
  <script src="assets/js/ty/init-tinymce.js"></script>

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

