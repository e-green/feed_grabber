<?php include("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>

<?php 

$data = get_site_name();
	    while ($row = mysqli_fetch_assoc($data)) {
		    $url =  $row["url"];
		    $name = $row["name"];
		    echo $url. " - ".$name .  "<br>";

		    $content = file_get_contents($url);
    		$x = new SimpleXmlElement($content);

		    //updating the site :-)
			deleteSiteData($name);

			foreach($x->channel->item as $entry) {
				SaveSiteData($name , $entry->title , $entry->link);
    		}
		}
?>