<?php

$url = $_GET["url"];

yt($url);

function yt($url){
	$typeRegex = "%\/\w+(\/|\?)%";
	preg_match($typeRegex, $url, $typeRes);
	$type = $typeRes[0];

	$type = str_replace("/", "", $type);
	$type = str_replace("\\", "", $type);
	$type = str_replace("?", "", $type);
	$type = str_replace(" ", "", $type);
	$type = strtolower($type);
	
	$idRegex = "%(\/|=)[a-zA-Z0-9_]*$%";
	preg_match($idRegex, $url, $idRes);
	$id = $idRes[0];
	
	$id = str_replace("/", "", $id);
	$id = str_replace("\\", "", $id);
	$id = str_replace("=", "", $id);	
	
//	echo $type." ";
	//echo $id;
	
	echo "http://cwms.cc/youtube-rss/rss.php?type=yt:".$type."&id=".$id;
	
}