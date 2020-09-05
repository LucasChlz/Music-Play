<?php

namespace App\Controllers;

class Songs
{

    protected $musicModel;
    public $router;

    public function __construct($router)
    {
        $this->router = $router;
        $this->musicModel = new \App\Models\Music;
    }

    public function index()
    {
        $listSongs = $this->musicModel->listSongs("","")->fetchAll();
        include(view('/songs/list'));
    }

    public function delete($data)
    {
        $id = $data['id'];
        $songName = $this->musicModel->listSongs("WHERE id = ?", $id)->fetch()['name'];
        $songImage = $this->musicModel->listSongs("WHERE id = ?", $id)->fetch()['image'];
       
        if ($this->musicModel->deleteSong($id,$songName,$songImage))
        {
            $this->router->redirect("song.list");
        }
    }

    public function listen($data)
    {
        $listSongs = $this->musicModel->listSongs("","")->fetchAll();
        $path = URL."/app/public/";
        
        $songName = json_encode($data['name']);
        $list = json_encode($listSongs);
        $pathSong = json_encode($path);

        include(view("/songs/single"));
    }
}