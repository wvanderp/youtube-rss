<?php

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    echo '<h1>This feature is linux only!</h1>';
    die();
}

define("br", "<br>");
require "settings.php";

echo "<h2>hard disk drive space</h2>";

$bin = "df";
$output = shell_exec($bin);
echo nl2br($output);
echo br;


echo "<h2>size of the cash folder</h2>";

$bin = "du -sh ".$root_dir.$cash_location;
$output = shell_exec($bin);
echo($output);
echo br;

echo "<h2>test env</h2>";
require "test_env.php";
