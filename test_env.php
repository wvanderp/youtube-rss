<?php
    require "setting.php";
    $neededPhpVersion = 50509;

    define("br", "<br>");
    //things to test:
    // * php install

    if (!defined('PHP_VERSION_ID')) {
        $version = explode('.', PHP_VERSION);

        define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));

    }

    if (PHP_VERSION_ID < $neededPhpVersion) {
        die("php is out of date<br>php version is: ".PHP_VERSION_ID);
    } else {
        echo "php version: " . PHP_VERSION_ID . " is ok" . br;
    }

    if (exec('echo EXEC') != 'EXEC') {
        die("there is no exec function");
    } else {
        echo "exec enabled: true" . br;
    }

    // * folder existing
    $dir = "cash/";
    if (!file_exists($dir)) {
        echo "file exists \"" . $dir . "\": false" . br;
        echo "file exists \"" . $dir . "\": making directory" . br;
        mkdir($dir);
        echo "file exists \"" . $dir . "\": success" . br;
    } else {
        echo "file exists \"" . $dir . "\": true" . br;
    }

    // * folder permissions
    $dir = "./";
    if (!is_writable($dir)) {
        die("file permission \"" . $dir . "\": not granted");
    } else {
        echo "file permission \"" . $dir . "\": ok" . br;
    }

    // current dir: ./cash
    $dir = "cash/";
    if (!is_writable($dir)) {
        die("file permission \"" . $dir . "\": not granted");
    } else {
        echo "file permission \"" . $dir . "\": ok" . br;
    }

    // * youtube-dl
    // is youtube-dl working
    if (exec($youtube_dl_bin . " --version") == "") {
        die("youtube-dl: isn't working");
    } else {
        echo "youtube-dl: is working fine" . br;
    }

    //is youtube-dl up to date
    $youtube_dl_version = exec($youtube_dl_bin . " --version");
    $latest = json_decode(file_get_contents("https://rg3.github.io/youtube-dl/update/versions.json"), true);

    if ($youtube_dl_version != $latest["latest"]) {
        echo "youtube-dl up to date: false" . br;
        die("youtube-dl is not up to date. run: " . $youtube_dl_bin . " -U");
    } else {
        echo "youtube-dl up to date: true";
    }


   echo "<h1>everything is awesome</h1>";

