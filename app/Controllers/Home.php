<?php

namespace App\Controllers;

class Home
{

    protected $musicModel;

    public function __construct()
    {
        $this->musicModel = new \App\Models\Music;
    }

    public function index()
    {
        include(view("home"));
    }

    public function uploadMusic($data)
    {
        $fileName = $data['fileName'];
        $artistName = $data['artistName'];
        $this->musicModel->uploadMusic($fileName,$artistName);
        include(view("home"));
    }
}