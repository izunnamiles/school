<?php session_start();
if(!isset($_SESSION['unique_id'])){ header('location:../Log_In.php?error=Please login first!'); die();}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>School</title>

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
    <style>
        ul, #nav {
            list-style-type: none;
        }

        /* Remove margins and padding from the parent ul */
        #nav {
            margin: 0;
            padding: 0;
        }

        /* Style the caret/arrow */
        .treeview {
            user-select: none; /* Prevent text selection */
        }

        /* Create the caret/arrow with a unicode, and style it */
        .treeview::before {
            /*content: "\25B6";*/
            /*color: black;*/
            display: inline-block;
            margin-right: 6px;
        }

        /* Rotate the caret/arrow icon when clicked on (using JavaScript) */
        .treeview-down::before {
            transform: rotate(90deg);
        }

        /* Hide the nested list */
        .treeview-menu {
            display: none;
        }

        /* Show the nested list when the user clicks on the caret/arrow (with JavaScript) */
        .work {
            display: block;
        }

    </style>

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
                <a href="#" class="simple-text">
                    School
                </a>
            </div>

            <ul class="nav" id="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="pe-7s-note"></i>
                        <p class>
                            Courses
                        </p>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="Reg_course.php"><i class="pe-7s-cloud-upload"></i><p>Register Course</p></a></li>
                        <li><a href="course_table.php"><i class="pe-7s-cloud-download"></i><p>View Course</p></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-info"></i>
                        <p>Lecturers</p>
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
                    <a class="navbar-brand" href="#">School Board</a>
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
                           <a href="#">
                               <p>Blog</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <p>Lecturers</p>
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
                                <li><a href="Reg_course.php">Register Course</a></li>
                                <li><a href="course_table.php">View Course</a></li>
                              </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php
                                $id = $_SESSION['unique_id'];
                                $conn = mysqli_connect("localhost","root","","register_db");
                                $query = "SELECT * FROM regForm_tb WHERE id = '$id'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);

                                //foreach ($row as $value){
                                ?>
                                <img class="img-rounded avatar" src="../Images/Uploads/<?php echo $row['passport']; ?>" alt="No image" height="20px"/>

                                <?php
                                // }
                                ?>

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="../Log_Out.php">Log Out</a>
                                </li>
                            </ul>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>