<?php

    require "settings.php";

    function cron() {
        global $cronTimeFile, $cronTime;
        //check if file exists

        if (!file_exists($cronTimeFile)) {
            return;
        }

        $nextTime = file_get_contents($cronTimeFile);
        $now = time();

        //check if it needs to run
        if ($now > $nextTime){
            runCron();

            file_put_contents($cronTimeFile, ($now+$cronTime));
        }


        //run the stuf that needs to run
    }

    cron();

    function runCron(){
        global  $root_dir, $cash_location;
        //clear the cash
        $bin = "rm -rf -- " . $root_dir . $cash_location . "/*";
        $output = shell_exec($bin);
    }