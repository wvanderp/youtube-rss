<?php
    require("settings.php");

    //adding running cron to this page
    require("cron.php");
    cron();

    //get type from url.
    //replacing "yt:" with nothing because we don’t support other sites
    $type = str_replace("yt:", "", $_GET["type"]);
    $id = $_GET["id"];


    if (file_exists($root_dir . "/" . $cash_location . "/" . $id . ".mp3")) {
        header("location: http://" . $domain . "/" . $path . "/" . $cash_location . "/" . $id . ".mp3");
    } else {
        $url = "http://www.youtube.com/watch?v=" . $id;
        $youtube_dl_command = $youtube_dl_bin .
            ' --extract-audio' .
            ' --audio-format mp3' .
            ' --embed-thumbnail' .
            ' -o "' . $root_dir . "/" . $cash_location . '/%(id)s.%(ext)s"' .
            ' "' . $url . '"';

        $output = exec($youtube_dl_command, $ret);

        header("location: http://" . $domain . "/" . $path . "/" . $cash_location . "/" . $id . ".mp3");
    }

