<?php
	ini_set('max_execution_time', 0);
	header('Content-Type: text/xml; charset=utf-8');
	include("urlAsambler.php");
	$br = "\n";
	
	$type = str_replace("yt:", "", $_GET["type"]);
	$id = $_GET["id"];
	
	$url = ytUrlMaker($type, $id);
	
	$minMax = "--playlist-start 1 --playlist-end 20";
	
	$output = shell_exec('youtube-dl -J -i '.$minMax.' '.$url);
	$data = json_decode($output, true);
	$episodes = array();
	
	$title = htmlspecialchars($data["title"]);
	
	foreach($data["entries"] as $json){
		$episode = array();
		
		$episode["id"] = htmlspecialchars($json["id"]);
		$episode["description"] = htmlspecialchars($json["description"]);
		$episode["title"] = htmlspecialchars($json["title"]);
		$episode["upload_date"] = date("r", strtotime($json["upload_date"]));

		$episode["thumbnail"] = date("r", strtotime($json["thumbnail"]));
		
		$episodes[] = $episode;
	}
	
	//var_dump($episodes);
	rssMaker($episodes, $title);
		
function rssMaker($episodes, $title){
	echo '<?xml version="1.0" encoding="UTF-8"?>'.$br;
	echo '<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">'.$br;
		echo '<channel>'.$br;
			  echo '<title>'.$title.'</title>'.$br; //needs to be ajusted
			  //echo '<description>random rss youtube podcast</description>'.$br; //needs to be ajusted
			  //echo '<link>http://www.podcast411.com</link>'.$br; //needs to be ajusted
			  //echo '<category>Technology</category>'.$br; //needs to be ajusted
			  
			  echo '<generator>youtube-rss 0.1.0</generator>'.$br; //needs to be ajusted
			  echo '<pubDate>'.date("r",time()).'</pubDate>'.$br; //needs to be ajusted
				foreach($episodes as $epi){
					echo '<item>'.$br;
						echo '<title>'.$epi["title"].'</title>'.$br;
						echo '<pubDate>'.$epi["upload_date"].'</pubDate>'.$br; //needs to be ajusted
						//echo '<comments>http://twit.tv/sn/528</comments>'.$br; //needs to be ajusted
						echo '<description>'.$epi["description"].'</description>'.$br; //needs to be ajusted
						
						echo '<link>http://cwms.cc/youtube-rss/download.php?type=yt:video&amp;id='.$epi["id"].'</link>'.$br; //needs to be ajusted
						echo '<enclosure url="http://cwms.cc/youtube-rss/download.php?type=yt:video&amp;id='.$epi["id"].'" type="audio/mpeg"/>'.$br; //needs to be ajusted
					echo '</item>'.$br;
					
				}
		echo '</channel>'.$br;
	echo '</rss>'.$br;
}
?>