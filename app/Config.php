<?php

define("URL", "http://localhost/Music-play");
define("PATH", "app/public");

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "music_play");

function url($url)
{
    return URL."/{$url}";
}

function view($file)
{
    return PATH."/views/{$file}.php";
}

function css($file)
{
    return URL."/app/public/style/{$file}.css";
}

function audio($file)
{
    return URL."/app/public/music/{$file}.mp3";
}

function image($file)
{
    return URL."./app/public/image/{$file}";
}

function js($file)
{
    return URL."/app/public/js/{$file}.js";
}


