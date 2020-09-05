<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= css("list"); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= css("materialize.min") ?>" />
    <title>Song List</title>
</head>
<body>
<?php require_once(PATH."/views/template/navbar.php"); ?>
<section class="list">
    <div class="container">
        <h2>Your songs</h2>
        <?php foreach($listSongs as $song){ ?>
        <div class="row">
            <div class="col s12">
                <div class="card grey lighten-3 hoverable">
                     <div class="card-content black-text valign center">
                        <span class="card-title"><?= $song['name']; ?></span>
                        <p><?= $song['artist']; ?></p>
                    </div>
                    <div class="card-action align-center valign center">
                        <a class="black-text" href="<?= url("listen/{$song['name']}") ?>">Listen</a>
                        <a class="red-text" href="<?= url("list/delete/{$song['id']}") ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div><!--container-->
</section><!--list-->

<script src="<?= js('PastJs/index') ?>" type="module"></script>
</body>
</html>