<?php 
include("../includes/db_connection.php");
require_once("../includes/functions.php");

$id = $_POST['url'];

$content_name = $_POST['content'];
$news_name = $_POST['news'];
$img_url = $_POST['img_url'];
$video_url = $_POST['video_url'];

?> 

 <?php include("../includes/layouts/header.php") ?>
    <div id="page-wrapper" style="height: 640px;">
        <div class="container-fluid">
            <div class="row">
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        RSS Feed Information ---- <?php echo $id; ?>
                    </h3>
                </div>
                <div class="panel-body">

				<?php 

                getFeed($id,$content_name,$news_name,$img_url,$video_url);

                 ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php") ?>