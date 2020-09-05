<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= css("materialize.min") ?>" />
    <link href="<?= css("home"); ?>" rel="stylesheet" />
    <title>Home Upload mp3</title>
</head>
<body>
<?php require_once(PATH."/views/template/navbar.php"); ?>
<section class="upload">
    <div class="container">
        <p>Upload your mp3 here</p>
        <p>
        <?php
            if (isset($_SESSION['error_msg'])) {
                echo $_SESSION['error_msg'];
            }else if (isset($_SESSION['success_msg'])) {
                echo $_SESSION['success_msg'];
            }
        ?>
        </p>
        <i style="font-size: 40px;" class="navi  large material-icons">navigation</i>
        <div class="container">
        <form action="<?= url(""); ?>" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="input-field col s12">
                    <input id="first_name2" type="text" name="fileName" class="validate">
                    <label class="active" for="first_name2">Mp3 Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="first_name2" type="text" name="artistName" class="validate">
                    <label class="active" for="first_name2">Artist name</label>
                </div>
            </div>

            <div class="row">
                <div class="file-field input-field">
                    <div class="btn white">
                        <i style="font-size: 30px;color:black;" class="large material-icons bla">music_note</i>
                        <input type="file" name="audio">
                    </div><!--btn-->
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div><!--file-->

                <div class="file-field input-field">
                    <div class="btn white">
                        <i style="font-size: 30px;color:black;" class="large material-icons bla">image</i>
                        <input type="file" name="image">
                    </div><!--btn-->
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div><!--file-->

                <button class="btn waves-effect waves-large bt white" type="submit" name="action">Upload
                    <i class="material-icons right">send</i>
                </button>
            </div><!--row-->
        </form>
        </div>
    </div><!--container-->
</section><!--uplaod-->


<script type="text/javascript" src="<?= js("materialize.min") ?>"></script>
</body>
</html>