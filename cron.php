<?php

    require "settings.php";

    function cron() {
        global $cronTimeFile, $cronTime;
        //check if file exists

        if (!file_exists($cronTimeFile)) {
        	echo $cronTimeFile;
        	echo "no cron file<br>";
        	echo "makeing cron file<br>";
        	makeCronFile();
        }

        $nextTime = file_get_contents($cronTimeFile);
        $now = time();

        //check if it needs to run
        if ($now > $nextTime){
            runCron();

            echo "writing next time to file<br>";
            file_put_contents($cronTimeFile, ($now+$cronTime));
        }


        //run the stuf that needs to run
    }

    function makeCronFile(){
    	$now = time();
        file_put_contents($cronTimeFile, $now);
    }

    cron();

    function runCron(){
        global  $root_dir, $cash_location;
        //clear the cash
        $bin = "rm -rf -- " . $root_dir . $cash_location . "/*";
        $output = shell_exec($bin);
        mkdir("cash/thumb/");

        // update youtube dl
        $bin = $youtube_dl_bin . " -U";
        $output = shell_exec($bin);
        echo $output."<br>";
    }