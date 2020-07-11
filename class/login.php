<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
</head>

<body>

<form action="process_login.php" method="post" enctype="multipart/form-data">

    <p>
        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
    </p>

    <p>Email Address
        <input name="login_email" value="<?php if(isset($_SESSION['login_email'])){ echo $_SESSION['login_email']; } ?>" type="email" />
    </p>

    <p>Password
        <input name="login_password" type="password" >
    </p>

    <p>
        <button type="submit" name="login_button">Submit</button>
    </p>

</form>


</body>
</html>