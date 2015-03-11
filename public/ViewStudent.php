<?php include("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>

<?php 
session_start();
is_logged();
?>

<?php include("../includes/layouts/header.php") ?>

    <div id="page-wrapper" style="height: 640px;">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>


       <div class="row">
           <div class="panel panel-primary">
               <div class="panel-heading">
                   <h3 class="panel-title">Best Places to Visit</h3>
               </div>
               <div class="panel-body">
                  
                  <div id="map_canvas" style="width:1000px;height:500px;"></div>
                   
               </div>
           </div>
       </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("../includes/layouts/footer.php") ?>
