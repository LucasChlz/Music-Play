<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= css("materialize.min") ?>" />
    <link rel="stylesheet" href="<?= css("single") ?>" />
    <title>Listen now ?></title>
</head>
<body>
<?php require_once(PATH."/views/template/navbar.php"); ?>
<div class="listen">
    <div id="player">
        <h4 id="title"><i class="material-icons"></i></h4>
        <div class="card">
            <div class="card-content">

                <div class="card-image">
                    <img id="music_image" class="music_image"></img>
                    <button id="play">Play</button>
                </div><!--card--image-->

                <div class="txt">
                    <p id="artist" class="artist"><i class="material-icons"></i></p>
                </div><!--txt-->
                <div class="row valign-wrapper">

                    <div class="col s12 range-field valign-wrapper">
                        <input type="range" min="0" max="0" id="timeBar" step="1">
                    </div>

                </div><!--row-->

                <div class="row valign-wrapper">
                    <span id="back" class="back"><</span>
                    <div class="timer col s4">
                        <span id="current_time">00:00 </span>
                        <span>/ </span>
                        <span id="total_time"></span>
                    </div>
                    <span><i class="material-icons" id="mute">volume_up</i></span>
                    <div class="vol col s4">
                        <div class="range-field valign-wrapper">
                                <input id="vol" type="range" min="0" max="100" step="1">
                        </div>
                    </div>
                    <span id="skip" class="skip">></span>                    
                </div>
                <audio id="audio" src=""></audio>
            </div><!--card-content-->
        </div><!--card-->
    </div><!--player-->
</div><!--listen-->
<script>

    var songName = <?= $songName ?>;
    var path = <?= $pathSong ?>;
    var listSongs = <?= $list ?>;
    var songs = [];
    var songNumber;

    listSongs.forEach(music => {
            songs.push(music.name);    
    });

    songNumber = songs.indexOf(songName);
</script>
<script src="<?= js("MusicJs/index"); ?>" type="module"></script>
</body>
</html>