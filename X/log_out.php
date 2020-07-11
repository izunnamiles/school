<?php session_start(); ?>
<?php if(!isset($_SESSION['email_login'])){

    session_destroy();
    header("location:login.php?error=Please login first");
    die();
}
?>