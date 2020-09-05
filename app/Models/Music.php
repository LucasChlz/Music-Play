<?php

namespace App\Models;

use App\Database\Sql;

class Music extends Sql
{
    public function uploadMusic($fileName,$artistName)
    {
        $this->verifyUpload($fileName,$artistName);
    }

    public function verifyUpload($fileName,$artistName)
    {
        if ($fileName == "")
        {
            $_SESSION['error_msg'] = "enter the name of the audio";
        } else if (!$this->verifyAudio($_FILES['audio'])) {
            $_SESSION['error_msg'] = "invalid format (only mp3)";
        } else if (!$this->verifyName($fileName)) {
            $_SESSION['error_msg'] = "music name already exist";
        } else if (!$this->verifyImage($_FILES['image'])) {
            $_SESSION['error_msg'] = "invalid image type, please select JPEG,PNG or JPG";
        } else {

            $imageName = $this->uploadImage($_FILES['image']);
            $this->uploadAudio($_FILES['audio'], $fileName);
            $sql = Sql::connect()->prepare("INSERT INTO `audios` VALUES (null, ?, ?, ?) ");

            if ($sql->execute(array($fileName, $imageName, $artistName)))
            {
                $_SESSION['success_msg'] = "successfully uploaded";

            } else {
                $_SESSION['error_msg'] = "error";
            }
        }
    }

    public function verifyAudio($audio) {

        if ($audio['type'] == 'audio/mpeg') {
            return true;
        } else {
            return false;
        }
    }

    public function uploadAudio($audio,$fileName) {

        if (move_uploaded_file($_FILES['audio']['tmp_name'], PATH."/music/".$fileName.".mp3")) {
            return $fileName;
        } else {
            return false;
        }
    }

    public function verifyImage($image) {
        if ($image['type'] == 'image/JPEG' || $image['type'] == 'image/png' || $image['type'] == 'image/jpeg' || $image['type'] == 'image/jpg') {
            return true;
        } else {
            return false;
        }
    }

    public function uploadImage($image) {
        $typeImage = explode('.', $image['name']);
        $imageName = uniqid().'.'.$typeImage[1];

        if (move_uploaded_file($image['tmp_name'], PATH."/image/".$imageName)) {
            return $imageName;
        } else {
            return false;
        }
    }

    public function verifyName($fileName)
    {
        $sql = Sql::connect()->prepare("SELECT * FROM `audios` WHERE name = ?");
        $sql->execute(array($fileName));
        return ($sql->rowCount() === 1 ? false : true);
    }

    public function listSongs($condition,$param)
    {
        if($condition != "")
        {
            $sql = Sql::connect()->prepare("SELECT * FROM `audios` $condition");    
            $sql->execute(array($param));

            return $sql;
        }

        $sql = Sql::connect()->prepare("SELECT * FROM `audios`");
        $sql->execute();
        
        return $sql;
    }
    
    public function deleteSong($id,$songName,$songImage)
    {
        $sql = Sql::connect()->prepare("DELETE FROM `audios` WHERE id = ?");
        unlink("./app/public/music/{$songName}.mp3");
        unlink("./app/public/image/{$songImage}");
        if ($sql->execute(array($id)))
        {
            return true;
        } else {
            return false;
        }

    }
}