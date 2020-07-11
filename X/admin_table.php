<?php

    require_once("function.php");

    //call the mysql connector function
    $connector = mysql_connector("localhost","root","","Company_db");

    $result = selector($connector,"SELECT * FROM company_tb");

?>
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
<?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
<?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
<div class="wrapper">
    <div class="container">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title table_ali">ADMIN TABLE</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th class="table_head">ID</th>
                                    	<th class="table_head">Company</th>
                                    	<th class="table_head">Username</th>
                                    	<th class="table_head">Email</th>
                                    	<th class="table_head">Country</th>
                                        <th class="table_head">Phone</th>
                                        <th class="table_head">Menu</th>
                                    </thead>
                                    <tbody>
                                        <?php if($result === "No Result Found"){ ?>
                                        <tr>
                                            <td colspan="10">No Result Found</td>
                                        </tr>
                                        <?php } ?>
                                        <?php if($result !== "No Result Found"){ $no = 0; ?>
                                        <?php foreach($result as $k => $value){ $no++; ?>
                                        <tr>
                                        	<td><?php echo $no; ?></td>
                                            <td><?php echo $value['Company']; ?></td>
                                            <td><?php echo $value['Username']; ?></td>
                                            <td><?php echo $value['Email']; ?></td>
                                            <td><?php echo $value['Country']; ?></td>
                                            <td><?php echo $value['Phone']; ?></td>
                                            <td><a href="admin_page.php?id=<?php echo $value['id']; ?>">
                                                <i  class="pe-7s-menu zoom dropdown-toggle"></i></td>
                                            </tr>
                                        </tr>
                                            <?php } ?>
                                            <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

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
