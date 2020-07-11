<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <title>Registration Form</title>
</head>

<body style="background-color:#f1ffbd">
<header><nav class="navbar navbar-default"style="background-color: #ffb788">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Index.php"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="Index.php">Home</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teachers<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <!--<form class="navbar-form navbar-left">-->
                <!--<div class="form-group">-->
                <!--<input type="text" class="form-control" placeholder="Search">-->
                <!--</div>-->
                <!--<button type="submit" class="btn btn-default">Submit</button>-->
                <!--</form>-->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="Log_In.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log In<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Sign In</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    </div>
</header>
<div class="container">
    <form class="form-horizontal" action="signup_processor.php" method="POST" enctype="multipart/form-data">
        <p class="form-group col-lg-12 text-center">
            <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
            <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
        </p>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>

            <div class="col-sm-3">
                <input type="text" name="first_name" class="form-control" id="inputEmail2" placeholder="First Name">
            </div>

            <div class="col-sm-3">
                <input type="text" name="last_name" class="form-control" id="inputEmail2" placeholder="Last name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email"  name="email" class="form-control" id="inputEmail5" placeholder="E-mail">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Phone No</label>
            <div class="col-sm-3">
                <input type="tel" name="phone_no" class="form-control" id="inputEmail5" placeholder="Phone Number">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Date of Birth</label>
            <div class="col-sm-3">
                <input type="date"  name="dob" class="form-control" id="inputEmail5" placeholder="YYYY/MM/DD">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-3">
                <select name="gender" class="form-control" id="gender">
                    <option>Select Gender</option>
                    <option>M</option>
                    <option>F</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-3">
                <input type="password" name="passcode" class="form-control" id="inputEmail5" placeholder="Enter Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-3">
                <input type="password" name="con_passcode" class="form-control" id="inputEmail5" placeholder="Confirm Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-6">
                <input type="text" name="address" class="form-control" id="inputEmail3" placeholder="Address">
            </div>
        </div>
        <div class="form-group" style="margin-left: 9%">
            <div class="row">
                <div class="col-xs-3 col-xs-offset-1">
                    <input type="text" name="region" class="form-control" id="inputsurname" placeholder="Region">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="state" class="form-control" id="inputname" placeholder="State">
                </div>
                <div class="col-xs-3">
                    <input type="text" name="country" class="form-control" placeholder="Country">
                </div>
            </div>
        </div>

        <div style="margin-left: 16%">
            <label for="exampleInputFile">Upload passport</label>
            <input type="file" name="passport" id="exampleInputFile" style="border: 1px black solid;">
        <p class="help-block">passport size must not be more than 200kb<span style="color: maroon">*</span></p>
        </div>
        <br>
        <div class="col-sm-1 form-group-sm" style="margin-left: 16%">
            <button type="submit" name="submit" style="font-family: Arial" class="form-control">SignUp</button>
        </div>
    </form>

</div>
</body>
<script type="text/javascript" src="Javascript/jquery_3_3_1.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</html>