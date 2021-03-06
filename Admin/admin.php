<?php
session_start();
require_once("../class/library.php");
$lib = new processes();
$lib->getConnection();

$result = $lib->selector('SELECT * FROM regForm_tb');?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="admin_table.php">
                        <i class="pe-7s-user"></i>
                        <p>Users Table</p>
                    </a>
                </li>
                <li>
                    <a href="course.php">
                        <i class="pe-7s-note2"></i>
                        <p>Course</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                <b class="caret hidden-lg hidden-md"></b>
                                <p class="hidden-lg hidden-md">
                                    5 Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Courses
                                    <b class="caret"></b>
                                </p>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="reg_course.php">Register Course</a></li>
                                <li><a href="#">View Course</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../Dashboard/log_out.php">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <?php require_once("../X/function.php"); ?>
                                <?php $id = trim($_GET['id']); ?>
                                <?php $connection = mysql_connector("localhost","root","","register_db"); ?>
                                <?php $result = selector($connection, "SELECT * FROM regForm_tb WHERE id = '$id'")?>
                                <form name="form_here" action="admin_process.php" method="POST" enctype="multipart/form-data">
                                    <p>
                                        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
                                        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
                                    </p>
                                    <?php foreach($result as $key => $value){ ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class=" boom">First Name</label>
                                                <input type="text" name="edi_company" value="<?php if(isset($value['first_name'])){ echo $value['first_name']; } ?>" class="form-control profile" placeholder="Company">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="boom">Last Name</label>
                                                <input type="text" name="edi_username" value="<?php if(isset($value['last_name'])){ echo $value['last_name']; } ?>" class="form-control profile" placeholder="Username">
                                                <input type="hidden" value="<?php echo $id ?>" name="id_holder">
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label class="boom">E-mail</label>
                                                <input type="text" name="edi_address" value="<?php if(isset($value['email'])){ echo $value['email']; } ?>" class="form-control profile" placeholder="Home Address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="boom">Phone No.</label>
                                                <input type="tel" name="edi_phone_no" value="<?php if(isset($value['phone_no'])){ echo $value['phone_no']; } ?>" class="form-control profile"  placeholder="Phone No.">
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="boom">Date of Birth</label>
                                                <input type="text" name="edi_dob" value="<?php if(isset($value['dob'])){ echo $value['dob']; } ?>" class="form-control profile"  placeholder="YYYY/MM/DD">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="boom">Address</label>
                                                <input type="text" name="edi_city" value="<?php if(isset($value['address'])){ echo $value['address']; } ?>" class="form-control profile" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="boom">Region</label>
                                                <input type="text" name="edi_zip_code" value="<?php if(isset($value['region'])){ echo $value['region']; } ?>" class="form-control profile" placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="boom">State</label>
                                                <input type="text" name="edi_country" value="<?php if(isset($value['state'])){ echo $value['state']; } ?>" class="form-control profile" placeholder="Country">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="boom">Country</label>
                                            <input type="text" name="edi_country" value="<?php if(isset($value['country'])){ echo $value['country']; } ?>" class="form-control profile" placeholder="Country">
                                        </div>
                                    </div>
                            </div>

                                    <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="../Images/Uploads/" alt="IMG"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img class="avatar border-gray" src="Images/Uploads/<?php echo $value['passport']; ?>"/>
                                    <input name="edi_reg_image[]" type="file">
                                    <h4 class="title"><?php echo $value['first_name']; echo " "; echo $value['last_name']; ?><br />
                                    </h4>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" name="admin_update" class="btn btn-info btn-fill pull-left">Update Profile</button>
                    </form>


                    <footer class="footer" style="margin-top: 40%">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
