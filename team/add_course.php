<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>
<?php
    
    require_once 'includes/config.php';

    if (isset($_SESSION['T_ID'])) 
    {
        $USER_ID = $_SESSION['T_ID'];
        $C_ID = $_SESSION['C_ID'];
        $Uname = $_SESSION['U_name'];

        $sql = "SELECT * FROM `tbl_team` WHERE USER_ID = '$USER_ID' AND COMP_ID = '$C_ID' AND NAME = '$Uname'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $c = $data['COMP_ID'];
        $e = $data['ID'];
?>

<?php

if(isset($_POST['submit']))
{
    $title = ucwords($_POST['title']);
    $act_price = $_POST['price'];
    $dic_price = $_POST['dic_price'];
    $post_content= $_POST['post_content'];
    $category = $_POST['category'];

    $img = $_FILES['img']['name'];
    $img = date('mjYHis').$img;
    $img = preg_replace("/\s+/", "_", $img);
    $tmpname = $_FILES['img']['tmp_name'];
    $folder = "pack_img/".$img;
    move_uploaded_file($tmpname,$folder);

    if(empty($title)) {
        $_SESSION['ErrorMessage'] = "All field must be fill out";
        Redirect_To('add_course.php');
    }

    if (empty($tmpname)) {
        $_SESSION['ErrorMessage'] = "Upload a cover photo";
        Redirect_To('add_course.php');
    }

    if (empty($act_price)) {
        $_SESSION['ErrorMessage'] = "Price must include";
        Redirect_To('add_course.php');
    }

    if (empty($dic_price)) {
        $_SESSION['ErrorMessage'] = "Price must include";
        Redirect_To('add_course.php');
    }

    if (empty($post_content)) {
        $_SESSION['ErrorMessage'] = "Post content must include";
        Redirect_To('add_course.php');
    }

    if (!empty($title))
    {
        $insert = "INSERT INTO `tbl_course`(`COMP_ID`, `EMP_ID`, `CATEGORY_ID`, `TITLE`, `COVER_PIC`, `POST_CONTENT`, `ACT_PRICE`, `DIS_PRICE`, `LOGS`, `STATUS`) VALUES ('$c','$e','$category','$title','$folder','$post_content','$act_price','$dic_price',now(),1)";

        if (mysqli_query($conn,$insert)) 
        {
            $_SESSION['SuccessMessage'] = "Data is successfully uploaded";
            Redirect_To('add_course.php');
        }
        else 
        {
            $_SESSION['ErrorMessage'] = "Something went worng.";
            Redirect_To('add_course.php');
        }
    }
}

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
              <img src="<?php echo $data['PROFILE'];?>" alt="profile"/>
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
            <a href="add_course.php" class="nav-link" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Add Course</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="add_lessons.php" class="nav-link" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Add Lessons</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="view_course.php" class="nav-link" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">View Course</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="pay_status.php" class="nav-link"  aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Payment Status</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="chatroom.php" class="nav-link"  aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Message</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_profile.php" aria-expanded="false" aria-controls="auth">
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
              <h3>ADD COURSE</h3>
              <p>Fill the details of this package.</p><hr>

              <form action="add_course.php" method="POST" enctype="multipart/form-data" class="formWrapper">
                  <div>
                      <?php 
                          echo Message();
                          echo SuccessMessage();
                      ?>
                  </div>
                  <div class="form-group">
                      <span>Course Title</span>
                      <input type="text" class="form-control" id="" name="title">
                  </div>
                  <div class="form-group">
                      <span>Category</span>
                      <select name="category" class="form-control">
                        <option>Choose</option>
                        <?php
                          $cat = "SELECT * FROM `tbl_category`";
                          $cat_exe = mysqli_query($conn, $cat);
                          while ($r = mysqli_fetch_assoc($cat_exe)) 
                          {
                        ?>
                            <option value="<?php echo $r['ID'];?>"><?php echo $r['NAME'];?></option>
                        <?php
                          }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <span>Cover Image</span>
                      <input type="file" class="form-control" id="" name="img">
                  </div>
                  <span>Amount</span>
                  <div class="row">
                      <div class="col-6">
                          <input type="text" class="form-control" name="price" placeholder="₹ Actual Price">
                      </div>
                      <div class="col-6">
                          <input type="text" class="form-control" name="dic_price" placeholder="₹ Discount Price">
                      </div>
                  </div> <br>
                  <div class="form-group">
                      <span>Course Description</span>
                      <textarea class="tinymce" name="post_content"></textarea>
                  </div>
                  <button type="submit" name="submit" class="btn btn-block btn-success">Add Course</button>
              </form>
              <br>
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

  <script src="assets/js/ty/tinymce.min.js"></script>
  <script src="assets/js/ty/init-tinymce.js"></script>

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

