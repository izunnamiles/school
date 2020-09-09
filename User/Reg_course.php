<?php
include "../Layouts/sidebar.php";
?>
 <?php
 require_once("../functions/function.php");
$connection = mysqli_connect("localhost","root","","register_db");
$get = selector($connection,"SELECT * FROM course_tb");
 $result = selector($connection,"SELECT * FROM academic_tb");

?>
<style>
    body{
        background-color: #1DC7EA;
    }
    form{
        padding-bottom: 259px;
    }
</style>

<form class="form-horizontal center-block" action="reg_course_pro.php" method="POST" >
    <p class="col-lg-8 col-lg-offset-2 text-center">
        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
    </p>
<div class="container-fluid">
        <div class="form-group" style="margin-top: 10%">
            <label for="inputEmail5" class="col-sm-2 control-label">Course Name</label>
            <div class="col-sm-3">
                <select name="course" class="form-control" id="course" required>
                    <option value="">Course</option>
                    <?php foreach($get as $key => $value){ ?>
                    <option value="<?php echo $value['unique_id'];?>"><?php echo $value['course_title']." (".$value['course_code'].")";?></option>
                    <?php }?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Academic Year</label>
            <div class="col-sm-3">
                <select name="year" class="form-control" id="year" required>
                    <option value="">Academic Section</option>
                    <?php foreach($result as $key => $value){ ?>
                        <option  value="<?php echo $value['academic_unique_id'];?>"><?php echo $value['academic_year'];?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="col-sm-1" style="margin-left: 25%">
            <button type="submit" name="course_submit" style="font-family:'Times New Roman';font-size: small" class="form-control btn btn-primary">Submit</button>
        </div>
    <div class="col-sm-1">
        <button type="reset" name="submit" style="font-family: 'Times New Roman';font-size: small" class="form-control btn btn-default">Reset</button>
    </div>
</div>
    </form>
<?php
include "../Layouts/footer.php";
?>
</html>