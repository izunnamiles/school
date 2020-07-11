<?php
session_start();

include'Index.php';?>
<div class="container">
<form class="form-horizontal" action="class/process_login.php" method="POST">
    <p>
        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
    </p>
    <div class="form-group">
        <label for="inputEmail5" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-4">
            <input type="email"  name="email_login"  value="<?php if(isset($_SESSION['email_login'])){ echo $_SESSION['email_login']; } ?>" class="form-control" id="inputEmail5" placeholder="E-mail">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail4" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-4">
            <input type="password" name="password"  class="form-control" id="inputEmail4" placeholder="Enter Password">
        </div>
    </div>

    <div class="col-sm-1" style="margin-left: 25%">
        <button type="submit" class="form-control" name="login">Login</button>
    </div>
</form>
</div>
