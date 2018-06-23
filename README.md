# YouTube-rss
YouTube-rss is a php script based on [YouTube-dl](https://rg3.github.io/youtube-dl/) that generates an rss feed based on YouTube channels or users.
It uses the much loved [YouTube-dl](https://rg3.github.io/youtube-dl/) for downloading and feed generation.

The songs are downloaded on the fly and converted to mp3. And then stored on the server for later use.

# Features
* downloads youtube channels and playlists
* converts videos to mp3
* on the fly downloading
* Thumbnails

# Requirements
* a web server
* [php](http://php.net)
* [YouTube-dl](https://rg3.github.io/youtube-dl/)
* [ffmpeg](https://www.ffmpeg.org/) or [libav](https://libav.org/)

# how to install
* setup a web server
* install php
* install youtube-dl
* install ffmpeg
* git clone the repo
* change the contents of settings.exp.php and rename it to settings.php
* go to `http://yourDomain/youtube-rss/test_env.php` in your browser

# Wanted features

* video podcasts
* Rss cashing 
* Clearing cash
* making some stats
* dashboard
* Other YouTube-dl site





