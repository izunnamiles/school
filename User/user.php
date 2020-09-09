<?php
include '../Layouts/sidebar.php';
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Profile</h4>
                            </div>
                            <div class="content">
                                <form action="update_pro.php" method="post">
                                    <p>
                                        <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
                                        <?php if(isset($_GET['success'])){ echo $_GET['success']; } ?>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Company" value="<?php echo $_SESSION['u_first']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $_SESSION['u_last']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" value="<?php echo $_SESSION['logged_email']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="update_address" placeholder="Home Address" value="<?php echo $row['address']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" name="update_state" placeholder="City" value="<?php echo $row['state']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="<?php echo $_SESSION['u_country']; ?>" disabled>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" name="update_info" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                         <?php
                                         $id = $_SESSION['unique_id'];
                                         $conn = mysqli_connect("localhost","root","","register_db");
                                         $query = "SELECT * FROM regForm_tb WHERE id = '$id'";
                                         $result = mysqli_query($conn, $query);
                                         $row = mysqli_fetch_array($result);

                                         //foreach ($row as $value){
                                             ?>
                                             <img id="myImg" class="avatar border-gray" src="../Images/Uploads/<?php echo $row['passport']; ?>" alt="No image" height="80%"/>

                                          <?php
                                        // }
                                         ?>
                                         <!-- Trigger the Modal -->
<!--                                         <img id="myImg" src="default.png" width="200" height="150">-->

                                         <!-- The Modal -->
                                         <div id="myModal" class="modal">

                                             <!-- The Close Button -->
                                             <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                                             <!-- Modal Content (The Image) -->
                                             <img class="modal-content" id="img01">

                                             <!-- Modal Caption (Image Text) -->
                                             <div id="caption"></div>
                                         </div>

                                         <h4 class="title"><?php echo $_SESSION['full_name']; ?></h4>
                                    </a>
                                    <div class="row">
                                        <div>
                                            <label><i class="pe-7s-mail"></i></label>
                                            <?php echo $_SESSION['logged_email']; ?>
                                        </div>
                                        <div>
                                            <label><i class="pe-7s-home"></i></label>
                                            <?php echo $row['address']; ?>
                                        </div>
                                        <div>
                                            <label><i class="pe-7s-compass"></i></label>
                                            <?php echo $row['state']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php
include '../Layouts/footer.php';
?>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>


