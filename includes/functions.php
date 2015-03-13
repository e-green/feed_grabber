<?php 

function get_site_name(){
	global $connection;
	$query = "select * from site";
	$result = mysqli_query($connection , $query);
	return $result;
}

function get_site_name_for_view_all(){
	global $connection;
	$query = "select * from site";
	$result = mysqli_query($connection , $query);
	return $result;
}

function saveSite($id,$name,$url){
	global $connection;
	$query = "INSERT INTO site ".
       "(id,name, url) ".
       "VALUES ".
       "('$id','$name','$url')";

	$result = mysqli_query($connection , $query);

	if ($result) {
		// header("Location: AddStudent.php");
		
	}else{
		die("Database Query Failed "."<br>"."<h2>".mysqli_error($connection)."</h2>");
	}
}

function saveSiteData($site,$title,$link){
	global $connection;

	$stmt = $connection->prepare("INSERT INTO sitedata (site, title, link) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $site, $title, $link);

	// set parameters and execute
	$site = $site ;
	$title = $title;
	$link = $link;
	$stmt->execute();
}

// Adding data to Panikaju Panikaju Panikaju Panikaju Panikaju Panikaju Panikaju Panikaju Panikaju
function saveSiteDataWeb($title , $content){
	global $connection;

	$stmt = $connection->prepare("INSERT INTO wp_posts (ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES (NULL, '1', '2015-03-11 04:55:36', '2015-03-11 04:55:36', ?, ?, '','publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0', '', '0', 'post', '', '0')");

	$stmt->bind_param("ss", $content, $title);

	// set parameters and execute
	$title = $title;
	$stmt->execute();
}

//

function saveSitelink($site_name,$content_name,$news_name , $img_url , $video_url){
	global $connection;

	$stmt = $connection->prepare("INSERT INTO sitelink (site_name, content_name, news_name,image_url,video_url) VALUES (?, ?, ?,?,?)");
	$stmt->bind_param("sssss", $site_name, $content_name, $news_name,$img_url,$video_url);

	// set parameters and execute
	$site_name = $site_name ;
	$content_name = $content_name;
	$news_name = $news_name;
	$img_url = $img_url;
	$video_url = $video_url;
	$stmt->execute();

}

function deleteSiteData($name){
	global $connection;
	$query = "delete from sitedata where site = '$name'";
	$result = mysqli_query($connection , $query);
	if ($result && mysqli_affected_rows($connection) == 1) {
		// echo "Deleting Success";
	}else{
		// echo "Deleting Failed";
	}
}

function is_logged(){
	global $_SESSION;
	if (!($_SESSION["username"]=="admin" && $_SESSION["password"]==1234)) {
		header("Location: index.php");
	}
}

function getFeed($feed_url,$content_name,$news_name,$img_url,$video_url) {
     
     // Define variables in the top of the function
	$site_id = "";
	$boolean = false;

    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
     
    foreach($x->channel as $detail) {
        echo "<h2> {$detail->title} - $detail->link</h2>";
        echo "<br>";

        // 	Getting site names from the database.
	    $data = get_site_name();
	    while ($row = mysqli_fetch_assoc($data)) {
		    $name =  $row["url"];
		    if (strcmp($name, $detail->link) == 0) {
		    	$boolean = false;
		    }else{
		    	$boolean = true;
		    }
		}

		if ($boolean === true) {
			echo $boolean;
			saveSite("" , $detail->title , $feed_url);
			saveSitelink($detail->title,$content_name,$news_name , $img_url , $video_url);
		}else{
			echo $boolean;
			// echo "The site exists in database";
			echo "<br>";
		}
		$site_id = $detail->title;
    }
    echo "<ul>";
	deleteSiteData($site_id);

    foreach($x->channel->item as $entry) {
        echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";

		SaveSiteData($site_id , $entry->title , $entry->link);

		
    }
    echo "</ul>";

	// Adding real data to server
	$content = file_get_contents($feed_url);
	    $x = new SimpleXmlElement($content);

	    foreach($x->channel->item as $entry) {
	       
			saveSiteDataWeb($entry->title , $entry->description);

	    }
		// End of adding data
}

function getFeed_for_view($url){

	$content = file_get_contents($url);
    $x = new SimpleXmlElement($content);

    foreach($x->channel->item as $entry) {
        echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
        echo "<br>";
        echo "<li>" . $entry->description . "</li>";
    }
}

?>