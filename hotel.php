<?php
require_once 'config.php';
$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= APP_ASSETS; ?>/img/favicon.png">
    <script src="//code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script src="<?= APP_ASSETS; ?>/js/client_flash.js"></script>
    <script src="<?= APP_ASSETS; ?>/js/flashclient.js" type="text/javascript"></script>
    <link href="<?= APP_ASSETS; ?>/client/modstaff.css" rel="stylesheet">
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script class="jsbin" src="https://code.jquery.com/ui/1.8.22/jquery-ui.min.js"></script>
    <?php require_once 'app/templates/Meta.php'; ?>
</head>

<body>
    <div id="fullscreen-button-a" onclick="Fullscreen();">
        <i id="fullscreen-button-a-icon"></i>
    </div>
    <center>
        <div id="client-ui">
            <div id="client"
                style='position:absolute; left:0; right:0; top:0; bottom:0; overflow:hidden; height:100%; width:100%;'>
            </div>
        </div>
    </center>
</body>

</html>