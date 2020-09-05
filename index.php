<?php

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);
$router->namespace("App\Controllers");

$router->group("/");
$router->get("/", "Home:index");
$router->post("/", "Home:uploadMusic");

$router->group("/list");
$router->get("/", "Songs:index", "song.list");
$router->get("/delete/{id}", "Songs:delete", "song.delete");

$router->group("/listen");
$router->get("/{name}", "Songs:listen", "song.listen");


$router->dispatch();