
<?php session_start(); ?>
<?php if(isset($_SESSION['full_name'])){

    session_destroy();
    header("location:Log_In.php?success=You have successfully logged out");
    die();
} ?>
<script>
    window.alert('please Login')
</script>