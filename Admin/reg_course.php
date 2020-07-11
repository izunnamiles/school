<?php ?>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
<body style="background-color: aqua">
<div class="container" style="margin-top: 30px">
<form class="form-horizontal" action="course_pro.php" method="POST">
    <p class="col-lg-12 text-center">
        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
    </p>
<div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Course Title</label>
            <div class="col-sm-3">
                <input type="text"  name="course_title" class="form-control" id="inputEmail5" placeholder="Course Title">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Course Code</label>
            <div class="col-sm-3">
                <input type="text" name="code" class="form-control" id="inputEmail5" placeholder="Course Code">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Credit Load</label>
            <div class="col-sm-3">
                <input type="text"  name="credit_load" class="form-control" id="inputEmail5" placeholder="Credit Load">
            </div>
        </div>
        <div class="col-sm-1 form-group-sm" style="margin-left: 16%">
             <button type="submit" name="reg_submit" style="font-family: Arial" class="form-control">Submit</button>
        </div>
</form>
</div>
</body>