<?php
include '../Layouts/sidebar.php'?>
<?php
require_once ('../functions/function.php');
$connection = mysqli_connect("localhost","root","","register_db");
?>
<style>
    #xylo{
        margin-bottom: -5%;
    }

</style>
<div class="content" id="xylo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title col-md-7">Registered Course</h4>
                        <div class="pull-right"><button class="btn btn-primary " style="right: inherit" onclick="gpa()"> GPA</button></div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course Unique ID</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Course Credit Load</th>
                                <th>Academic Year</th>
                                <th>Date Registered</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $user = $_SESSION['unique_id']; ?>
                            <?php $result = selector($connection,"SELECT * FROM registeredcourse_tb WHERE user_unique_id = '$user'");  ?>

                            <?php if($result === "No Result Found"){ ?>
                                <tr>
                                    <td colspan="10">No Result Found</td>
                                </tr>
                            <?php } ?>
                            <?php if($result !== "No Result Found"){ $no = 0; ?>
                                <?php foreach($result as $k => $value){ $no++; ?>


                                    <tr>
                                        <td><?php echo $no; ?> <input type="hidden" value="<?php echo $value['unique_id'] ?>" ></td>
                                        <td><?php echo $value['course_unique_id'] ?></td>

                                        <?php $course_unique_id = $value['course_unique_id'] ?>
                                        <?php $course_details = selector($connection,"SELECT * FROM course_tb WHERE unique_id = '$course_unique_id'");?>
                                        <td><?php echo $course_details[0]['course_title']; ?></td>
                                        <td><?php echo $course_details[0]['course_code']; ?></td>
                                        <td><?php echo $course_details[0]['credit_load']; ?></td>

                                        <?php $academic_year_unique_id = $value['academic_year_unique_id'] ?>
                                        <?php $academic_year_details = selector($connection,"SELECT * FROM academic_tb WHERE academic_unique_id = '$academic_year_unique_id'");  ?>
                                        <td><?php echo $academic_year_details[0]['academic_year']; ?></td>
                                        <td><?php echo $value['date_of_registration']; ?></td>

                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../Layouts/footer.php';
?>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
<script src="gpaNav.js"></script>


</html>