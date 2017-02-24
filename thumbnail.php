<?php
    include("settings.php");
    //get type from url.
    //replacing "yt:" with nothing because we don’t support other sites
    $type = str_replace("yt:", "", $_GET["type"]);
    $id = $_GET["id"];

    $url = "http://www.youtube.com/watch?v=" . $id;

    if (file_exists($root_dir . "/" . $cash_location . "/thumb/" . $id . ".jpg")) {
         header("location: http://" . $domain . "/" . $path . "/" . $cash_location . "/thumb/" . $id . ".jpg");
//        echo "image exists";
    } else {
        $youtube_dl_command = $youtube_dl_bin . ' --skip-download --write-thumbnail -o "' . $root_dir . '/cash/thumb/%(id)s.%(ext)s" "' . $url . '"';
        $output = exec($youtube_dl_command, $ret);

//        echo $youtube_dl_command;
//        echo "</br>";
//        var_dump($ret);
//        echo "</br>";
//        echo "</br>";
//
//        var_dump($output);
        
         header("location: http://" . $domain . "/" . $path . "/" . $cash_location . "/thumb/" . $id . ".jpg");
    }

