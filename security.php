<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 4;
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
        <div class="w-12">
            <div class="box">
                <div class="content_box">
                    <div style="color: #2767A7;margin-bottom:5px;font-size:18px">Les conseils sécuritaires</div>
                    <div style="border-bottom: 1px solid #2767A7;margin-bottom: 0px;"></div>
                    <img src="<?= APP_ASSETS; ?>/img/security/page_0.png" style="float: left;margin-right: 50px;">
                    <br /><br /><br /><br />
                    <h4>Protège tes informations personnelles </h4>
                    Tu ne sais jamais avec qui tu es vraiment en train de parler en ligne, donc ne donne jamais ton vrai
                    nom, adresse, numéro de téléphone, photos ou nom de ton école. Partager ces informations
                    personnelles peut te conduire à être victime d'une arnaque, d'intimidation ou de te mettre en
                    danger.
                    <br clear="both">
                    <img src="<?= APP_ASSETS; ?>/img/security/page_1.png" style="float: left;margin-right: 50px;">
                    <br /><br /><br /><br />
                    <h4>Protège ta vie privée </h4>
                    Garde les coordonnées de ton Skype, MSN, Facebook pour toi. Tu ne sais jamais où cela peut te
                    conduire.
                    <br clear="both">

                    <img src="<?= APP_ASSETS; ?>/img/security/page_2.png" style="float: left;margin-right: 50px;">
                    <br /><br /><br /><br />
                    <h4>Ne cède pas à la pression des autres </h4>
                    Que tout le monde fasse quelque chose n'est pas une raison pour toi de le faire si tu n'es pas à
                    l'aise avec cette idée.
                    <br clear="both">
                    <img src="<?= APP_ASSETS; ?>/img/security/page_3.png" style="float: left;margin-right: 50px;">
                    <br /><br /><br /><br />
                    <h4>Garde tes copains en pixels! </h4>
                    Ne jamais rencontrer des personnes que tu connais uniquement via internet, les gens ne sont pas
                    toujours ceux qu'ils prétendent être ! Si quelqu'un te demande de le/la rencontrer dans la vraie
                    vie, il vaut mieux dire &quot;Non merci!&quot; et prévenir un modérateur, tes parents ou un autre
                    adulte de confiance.
                    <br clear="both">
                    <img src="<?= APP_ASSETS; ?>/img/security/page_5.png" style="float: left;margin-right: 50px;">
                    <br /><br /><br /><br />
                    <h4>Exclus la Webcam</h4>
                    Tu n'as aucun contrôle sur tes photos et images webcam une fois que tu les as partagées sur
                    Internet, tu ne peux plus les récupérer. Elles peuvent être partagées avec n'importe qui, n'importe
                    où et être utilisées pour t'intimider, te faire du chantage ou te menacer. Avant de publier une
                    photo, demande-toi si tu es à l'aise pour que des gens que tu ne connais pas la voient.
                    <br clear="both">
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>