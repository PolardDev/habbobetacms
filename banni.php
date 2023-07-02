<?php
require_once 'config.php';
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 8;

$bansQuery = $db->prepare('SELECT * FROM bans WHERE ip = :ip AND ban_expire >= :ban_expire');
$bansQuery->execute(array(':ip' => $user->IPAdress(), ':ban_expire' => time()));
if ($bansQuery->rowCount() > 0) {
	$bans = $bansQuery->fetch(PDO::FETCH_ASSOC);
} else {
	header('Location: /connexion');
	exit();
}
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
        <div class="w-9">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0fbc7c;margin-bottom:5px;font-size:18px">Votre adresse IP n'est pas autorisée
                        sur ce site</div>
                    <div style="border-bottom: 1px solid #0fbc7c;margin-bottom: 10px;"></div>
                    Nous n'avons pas réussi à aboutir votre demande... <br><br>
                    Votre adresse IP a peut être été banni de ce site, si c'est le cas un message s'affichera
                    ci-dessous. <br>
                    Votre adresse IP <b><?= $bans['ip']; ?></b> a été banni de
                    <?= APP_NAME; ?> pour la raison suivante <b><?= $bans['ban_reason']; ?></b>,
                    celui-ci expirera le <b><?= date('d/m/Y à H:i:s', $bans['ban_expire']); ?></b>.
                </div>
            </div>
        </div>

        <div class="w-3">
            <div class="box">
                <div class="content_box">
                    <center>
                        <img src="<?= APP_ASSETS; ?>/img/frank_banni.gif">
                    </center>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>