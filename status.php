<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>youtube-rss</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="gui/style.css" rel="stylesheet">
    <script src="gui/script.js"></script>

    <script> window.domain = "<?php require "settings.php"; echo $domain?>";</script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">youtube-rss</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="gui/about.html">About</a></li>
                <li><a href="cash/">Cash</a></li>
                <li><a href="commands.php">commands</a></li>
                <li><a href="status.php">status</a></li>
            </ul>
        </div>

    </div>
</nav>

<div class="container">
    <div class="row well">
        <?php

            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                echo '<h1>This feature is Linux only!</h1>';
                die();
            }

            define("br", "<br>");
            require "settings.php";

            echo "<h2>hard disk drive space</h2>";

            $bin = "df -h";
            $output = shell_exec($bin);
            echo nl2br($output);
            echo br;


            echo "<h2>size of the cash folder</h2>";

            $bin = "du -sh " . $root_dir . $cash_location;
            $output = shell_exec($bin);
            echo($output);
            echo br;

            echo "<h2>test env</h2>";
            require "test_env.php";


        ?>
    </div>
</div>

</body>
</html>

