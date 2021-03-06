<?php
    ini_set('max_execution_time', 0);
    header('Content-Type: text/xml; charset=utf-8');

    //adding running cron to this page
    require("cron.php");
    cron();

    require("settings.php");
    require("urlAsambler.php");
    $br = "\n";

    $type = str_replace("yt:", "", $_GET["type"]);
    $id = $_GET["id"];

    $url = ytUrlMaker($type, $id);

    $minMax = "--playlist-start 1 --playlist-end " . $episodePerRss;

    $bin = $youtube_dl_bin . ' -J -i ' . $minMax . ' \'' . $url . '\'';

    //$bin .= ' 2>&1';

    $output = shell_exec($bin);

    $data = json_decode($output, true);
    $episodes = array();

    //yt specific
    $title = str_replace("Uploads from ", "", $data["title"]);
    $title = htmlspecialchars($title);

    foreach ($data["entries"] as $json) {
        $episode = array();

        $episode["id"] = htmlspecialchars($json["id"]);
        $episode["description"] = htmlspecialchars($json["description"]);
        $episode["title"] = htmlspecialchars($json["title"]);
        $episode["upload_date"] = date("r", strtotime($json["upload_date"]));

        $episode["thumbnail"] = date("r", strtotime($json["thumbnail"]));

        $episodes[] = $episode;
    }

    rssMaker($episodes, $title);

    /**
     * after getting a episode list from back in the code this function writes the rss
     *
     * @param $episodes
     *      an array with episodes with an array with the data of the episode
     * @param $title
     *      the title of the rss feed according to code above
     */
    function rssMaker($episodes, $title) {
        global $br, $version, $domain, $path;

        echo '<?xml version="1.0" encoding="UTF-8"?>' . $br;
        echo '<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">' . $br;
        echo '<channel>' . $br;
        echo '<title>' . $title . '</title>' . $br; //needs to be adjusted
        //echo '<description>random rss youtube podcast</description>'.$br; //needs to be adjusted
        //echo '<link>http://www.podcast411.com</link>'.$br; //needs to be adjusted
        //echo '<category>Technology</category>'.$br; //needs to be adjusted

        echo '<generator>youtube-rss ' . $version . '</generator>' . $br;
        echo '<pubDate>' . date("r", time()) . '</pubDate>' . $br;

        foreach ($episodes as $epi) {
            echo '<item>' . $br;
            echo '<title>' . $epi["title"] . '</title>' . $br;
            echo '<pubDate>' . $epi["upload_date"] . '</pubDate>' . $br; //needs to be adjusted
            //echo '<comments>http://twit.tv/sn/528</comments>'.$br; //needs to be adjusted
            echo '<description>' . $epi["description"] . '</description>' . $br; //needs to be adjusted

            echo '<link>http://' . $domain . '/' . $path . '/download.php?type=yt:video&amp;id=' . $epi["id"] . '</link>' . $br; //needs to be adjusted
            echo '<enclosure url="http://' . $domain . '/' . $path . '/download.php?type=yt:video&amp;id=' . $epi["id"] . '" type="audio/mpeg"/>' . $br; //needs to be adjusted

            echo '<media:thumbnail url="http://' . $domain . '/' . $path . '/thumbnail.php?type=yt:video&amp;id=' . $epi["id"] . '"/>' . $br;
            echo '<itunes:image href="http://' . $domain . '/' . $path . '/thumbnail.php?type=yt:video&amp;id=' . $epi["id"] . '"/>';
            echo '<image>' . $br;
            echo '<url>http://' . $domain . '/' . $path . '/thumbnail.php?type=yt:video&amp;id=' . $epi["id"] . '</url>' . $br;
            echo '</image>' . $br;
            echo '</item>' . $br;
        }
        echo '</channel>' . $br;
        echo '</rss>' . $br;
    }
