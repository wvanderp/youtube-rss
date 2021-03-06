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
                <li class="active"><a href="./">Home</a></li>
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
        <div class="form-inline">
            <input type="text" class="form-control" id="ytUrl" placeholder="youtube url">
        </div>
        <div class="panel panel-default hidden" id="ytClass">
            <div class="panel-body">

            </div>
        </div>
    </div>
    <div class="row well">
        <div class="well-header">options</div>
        no options at the moment
    </div>
    <div class="row well">
        <div class="form-inline input-group">
            <div class="input-group-addon" id="urlBtn">
                <a id="feedLink" href="#">
                    click here
                </a>
            </div>
            <input type="text" class="form-control" id="feedUrl" placeholder="youtube url">
        </div>
    </div>
</div>

</body>
</html>
