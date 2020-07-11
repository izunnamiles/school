<?php

require_once("../X/function.php");


$connector = mysql_connector("localhost","root","","register_db");

$result = selector($connector,"SELECT * FROM regForm_tb");

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data</title>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" >
</head>

<body>

<div class="container">
    <div class="row">

        <p class="col-lg-8 col-lg-offset-2 text-center">
            <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
            <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
        </p>

        <div class="col-lg-10 col-lg-offset-1" style="margin-top: 50px;">

            <table class="table table-striped table-condensed table-bordered">

                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Passport</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

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
                            <td><?php echo $value['first_name']." ".$value['last_name']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['phone_no']; ?></td>
                            <td><?php echo $value['dob']; ?></td>
                            <td><?php echo $value['gender']; ?></td>
                            <td><a href="../Images/Uploads/<?php echo $value['passport']; ?>" target="_blank" ><img src="../Images/passport/<?php echo $value['passport']; ?>" style="width: 50px;" /></a></td>
                            <td><a class="btn btn-primary " href="edit.php?id=<?php echo $value['id']; ?>">Edit</a></td>
                            <td><a class="btn btn-primary " href="delete.php?id=<?php echo $value['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>


                </tbody>

            </table>

        </div>
    </div>
</div>


</body>
<script type="text/javascript" src="js/jquery-3.1.1.js" ></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js" ></script>
</html>
