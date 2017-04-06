<?php
    $version = "1.2.0";
    $youtube_dl_bin = "youtube-dl";

    $domain = "yourdomain";
    $path = "youtube-rss/";
    $root_dir = "/var/www/html/youtube-rss/";
    $cash_location = "cash/";

    $episodePerRss = 20;

    //time in seconds
    $cronTime = 300;
    $cronTimeFile = $root_dir . "cronFile.txt";
