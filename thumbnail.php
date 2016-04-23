<?php
include("setting.php");
//get type from url.
//replacing "yt:" with nothing because we don’t support other sites
$type = str_replace("yt:", "", $_GET["type"]);
$id = $_GET["id"];

$url = "https://www.youtube.com/watch?v=".$id;

if(file_exists($root_dir."/".$cash_location."/thumb/".$id.".jpg")){
    header("location: http://".$domain."/".$path."/".$cash_location."/thumb/".$id.".jpg");
}else{
    $youtube_dl_command = $youtube_dl_bin.' --skip-download --write-thumbnail -o "'.$root_dir.'"/cash/thumb/%(id)s.%(ext)s "'.$url.'"';
    $output = exec($youtube_dl_command, $ret);
    //var_dump($ret);
    header("location: http://".$domain."/".$path."/".$cash_location."/thumb/".$id.".jpg");
}

