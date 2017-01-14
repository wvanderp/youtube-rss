<?php


    /**
     * @param $type
     *      indicator of the site used
     * @param $id
     *      id of the item for witch a url is generated
     * @return string
     *      the url of the item according to the type and id
     */
    function ytUrlMaker($type, $id) {
        switch ($type) {
            case "channel":
                //youtube:channel
                return "https://www.youtube.com/channel/" . $id;
                break;
            case "playlist":
                //youtube:playlist
                return "https://www.youtube.com/playlist?list=" . $id;
                //echo "playlist";
                break;
            case "show":
                //youtube:show
                return "https://www.youtube.com/show/" . $id;
                //echo "show";
                break;
            case "user":
                //youtube:user
                return "https://www.youtube.com/user/" . $id;
                //echo "user";
                break;
            case "video":
                //youtube:video
                return "https://www.youtube.com/watch?v=" . $id;
                //echo "video";
                break;
            default:
                //header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error -- no match found', true, 500);
                die("no match found");
        }
    }