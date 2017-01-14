<?php
    require "settings.php";
    if(isset($_GET["command"])){
        if($_GET["command"] == "clearCash"){
            $bin = "rm -rf -- " . $root_dir . $cash_location . "/*";
            $output = shell_exec($bin);

            header("location: commands.php?message=cleared Cash \n".$output);
        }

        if($_GET["command"] == "updateYTDL"){
            $bin = $youtube_dl_bin . " -U";
            $output = shell_exec($bin);

            header("location: commands.php?message=updated youtube-dl \n".$output);
        }

        die();
    }

?>
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


    <script> window.domain = "<?php echo $domain?>";</script>
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
                <li><a href="./">Home</a></li>
                <li><a href="gui/about.html">About</a></li>
                <li><a href="cash/">Cash</a></li>
                <li class="active"><a href="commands.php">commands</a></li>
                <li><a href="status.php">status</a></li>
            </ul>
        </div>

    </div>
</nav>
<?php     if(isset($_GET["message"])) {
    echo '
    <div class="container">
        <div class="row well">
            '.nl2br($_GET["message"]).'
        </div>
    </div>';
}
?>

<div class="container">
    <div class="row well">
        <a class="btn btn-success btn-lg" href="commands.php?command=clearCash" role="button">clear cash</a>
        <a class="btn btn-success btn-lg" href="commands.php?command=updateYTDL" role="button">update youtube-dl</a>


    </div>
</div>

</body>
</html>
