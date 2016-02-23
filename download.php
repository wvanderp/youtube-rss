<?php
	include("urlAsambler.php");
	$type = str_replace("yt:", "", $_GET["type"]);
	$id = $_GET["id"];
	
	$url = "https://www.youtube.com/watch?v=".$id;

	if(file_exists("/var/www/html/youtube-rss/cash/".$id.".mp3")){
		header("location: http://cwms.cc/youtube-rss/cash/".$id.".mp3");
		//die("hallo");
	}else{

		//echo 'youtube-dl -x --audio-format mp3 -o "/var/www/html/youtube-rss/cash/%(id)s.%(ext)s" '.$id;

		$output = exec('youtube-dl -x --audio-format mp3 -o "/var/www/html/youtube-rss/cash/%(id)s.%(ext)s" "'.$url.'"', $ret);
		header("location: http://cwms.cc/youtube-rss/cash/".$id.".mp3");
	}
?>
