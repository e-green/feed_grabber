<?php 
include("../includes/db_connection.php");
require_once("../includes/functions.php");

$category = $_GET['id'];

?> 

 <?php include("../includes/layouts/header.php") ?>
    <div id="page-wrapper" style="height: 640px;">
        <div class="container-fluid">
            <div class="row">
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        RSS Feed Information ---- <?php echo $category; ?>
                    </h3>
                </div>
                <div class="panel-body">

				<?php 

                getFeed_for_view($category);

                 ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php") ?>