<?php
?>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
<body style="background-color: aquamarine">
<div class="container" style="margin-top: 30px">
<form class="form-horizontal" action="academic_pro" method="POST">
    <p class="col-lg-12 text-center">
        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
    </p>
<div class="form-group">
    <label for="inputEmail5" class="col-sm-2 control-label">Academic Year</label>
    <div class="col-sm-3">
        <input type="text"  name="academic_year" class="form-control" id="inputEmail5" placeholder="Academic Year">
    </div>
</div>

<div class="col-sm-1 form-group-sm" style="margin-left: 16%"">
    <button type="submit" name="academic_submit" style="font-family: Arial" class="form-control">Submit</button>
</div>
</form>
</div>
</body>