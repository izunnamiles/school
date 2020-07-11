
<?php
include'../Index.php';?>
<div class="wrapper">
<div class="container">
    <form class="form-horizontal" action="admin_inc_log.php" method="POST">
        <p>
            <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
            <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
        </p>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-4">
                <input type="email"  name="admin_email"  value="<?php if(isset($_SESSION['admin_email'])){ echo $_SESSION['admin_email']; } ?>" class="form-control" id="inputEmail5" placeholder="E-mail">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail4" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-4">
                <input type="password" name="admin_password"  class="form-control" id="inputEmail4" placeholder="Enter Password">
            </div>
        </div>

        <div class="col-sm-1" style="margin-left: 25%">
            <button type="submit" class="form-control" name="admin_login">Login</button>
        </div>
    </form>
</div>
</div>
