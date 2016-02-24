<?php
	include("setting.php");

	$type = str_replace("yt:", "", $_GET["type"]);
	$id = $_GET["id"];

	if(file_exists("/var/www/html/youtube-rss/cash/".$id.".mp3")){
		header("location: http://".$domain."/".$path."/cash/".$id.".mp3");
	}else{
		$youtube_dl_command = $youtube_dl_bin.' -x --audio-format mp3 -o '.$root_dir."/".$cash_location.' '.$id;
		$output = exec($youtube_dl_command, $ret);
		header("location: http://".$domain."/".$path."/cash/".$id.".mp3");
	}

