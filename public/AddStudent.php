<?php include("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>

<?php 
session_start();
is_logged();
?>

<?php 

$site_names =  get_site_name_for_view_all();
		

?>

<?php include("../includes/layouts/header.php") ?>

    <div id="page-wrapper" style="height: 640px;">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        RSS Generator
                    </h3>
                </div>
                <div class="panel-body">

                    <fieldset>

	                    <form action="StudentSave.php" method="POST">
	                        
	                        <input type="text" class="form-control" placeholder="Enter URL here" name="url">
	                        	<br>
	                        	<div class="row">
	                        		<div class="col-lg-6">
	                        			<input type="text" class="form-control" placeholder="Enter Content Name Here" name="content">
	                        		</div>
	                        		
	                        		<div class="col-lg-6">
	                        			<input type="text" class="form-control" placeholder="Enter News Name Here" name="news">
	                        		</div>
	                        	</div>
								
	                        	<div class="row">
	                        		<div class="col-lg-6">
	                        			<input type="text" class="form-control" placeholder="Enter Imgage URL Here" name="img_url">
	                        		</div>
									
	                        		<div class="col-lg-6">
	                        			<input type="text" class="form-control" placeholder="Enter Video URL" name="video_url">
	                        		</div>
	                        	</div>
	                        	<br>
	                        <div class="col-lg-offset-9 col-lg-3">
	                        <button class="btn btn-default btn-primary">Generate</button>
	                    	</div>
	                    </form>
						<br><br><br>
                    	<div>
                    		<table class="table table-bordered">
                       <tr>
                           <th>Site Name</th>
                           <th>URL</th>
                           <th>View Content</th>
                       </tr>

                            <?php 
                            while ($row = mysqli_fetch_assoc($site_names)) {
                            	$url = rawurlencode($row["name"]);
                            echo "<tr>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["url"]."</td>";
                            echo "<td>"."<a href=ViewDetails.php?id={$row["url"]}>View</a></td>";
                            echo "</tr>";
                            }
                            ?>
                       <!-- <a class="button" href="DeleteStudent.php"></a> -->
                   </table>
                    	</div>

                    </fieldset>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("../includes/layouts/footer.php") ?>
<?php 

 ?>
