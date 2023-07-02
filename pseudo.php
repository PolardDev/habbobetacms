<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 5;

require_once 'app/actions/NameChange.php';
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
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Changer de pseudo</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($error)) : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">
                        <?= $error; ?></div>
                    <?php endif; ?>
                    <?php if(isset($success)) : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">
                        <?= $success; ?></div>
                    <?php endif; ?>
                    <img src="<?= APP_ASSETS; ?>/img/store_pseudo.jpg" style="width: 100%;">
                    <form method="post">
                        <img src="<?= APP_ASSETS; ?>/img/xmas15_stand.png"
                            style="margin-top: -25px;float:right;margin-bottom: 10px;position: relative;">
                        <br><span style="font-size:16px;">Ton pseudo est:
                            <i><?= $user->UserData($_SESSION['user_id'], 'username'); ?></i><br><br>
                        </span><b>Tu peux changer de pseudo pour 50 points</b>.<br> Tous tes apparts, tes mobis, tes
                        amis<br> et tes badges seront
                        transférés.<br><br>
                        <input type="text" name="username"
                            style="padding: 6px;width: 70%;margin-top: 5px;height: 22px;font-size: 16px;"
                            placeholder="Mon nouveau pseudo"><br><br>
                        <button type="submit" class="button green" name="submit">Changer de pseudo</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0fbcac;margin-bottom:5px;font-size:18px">Mon porte-feuille</div>
                    <div style="border-bottom: 1px solid #0fbcac;margin-bottom: 10px;"></div>
                    <div class="in" style="cursor:pointer;" onclick="location.href='?p=boutique';">
                        <div style="position: relative;float: left;width: 50px;top: 3px;margin-right: 5px;">
                            <center>
                                <img src="<?= APP_ASSETS; ?>/img/purse_coin.png">
                            </center>
                        </div>
                        <div style="position: relative;float: left;width: 218px;margin-top: -31px;margin-left: 50px;">
                            <b>Tu as actuellement:</b><br>
                            <small><?= $user->ComplementsData($_SESSION['user_id'], 'points'); ?> points</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>