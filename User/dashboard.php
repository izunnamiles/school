<?php
include '../layouts/sidebar.php';
?>
        <div class="container-fluid"><h1 align="center">Welcome <?php echo $_SESSION['full_name']; ?></h1></div>

<?php
include '../Layouts/footer.php'
?>
	<script type="text/javascript">

    	$(document).ready(function(){
        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "<?php echo $_SESSION['full_name']; ?> logged In"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
