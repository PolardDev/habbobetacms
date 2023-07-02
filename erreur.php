<?php
require_once 'config.php';
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 8;
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= APP_ASSETS; ?>/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS; ?>/css/style.css?cache=<?= time(); ?>">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS; ?>/css/sweetalert.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery.min.js@3.5.1/jquery.min.js"></script>
    <script type='text/javascript' src='<?= APP_ASSETS; ?>/js/jquery.slides.min.js'></script>
    <script type='text/javascript' src='<?= APP_ASSETS; ?>/js/sweetalert.js'></script>
    <?php require_once 'app/templates/Meta.php'; ?>
</head>

<body>
    <?php require_once 'app/templates/Header.php'; ?>
    <div class="millieu" style="width: 960px;margin-top: 10px;">
        <div class="w-8">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0fbc7c;margin-bottom:5px;font-size:18px">Impossible de trouver la page</div>
                    <div style="border-bottom: 1px solid #0fbc7c;margin-bottom: 10px;"></div>
                    Nous n'avons pas réussi à trouver le page que tu demandais... <br><br>
                    Il se peut que cette page ait été supprimée ou qu'elle n'existe pas encore. <br>
                    Vérifiez que votre page soit correctement orthographiée. Si vous atterrissez toujours sur cette page
                    contacter le webmaster du site.
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <center>
                        <img src="<?= APP_ASSETS; ?>/img/404.png">
                    </center>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>