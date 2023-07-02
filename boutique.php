<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 5;
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
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Acheter des points</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($_SESSION['achat']) && !empty($_SESSION['achat'])) : ?>
                    <?php if($_SESSION['achat'] == "error") : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">Une erreur est
                        survenue durant votre achat.</div>
                    <?php else : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">Votre compte a été
                        crédité de 100 points.</div>
                    <?php endif; ?>
                    <?php unset($_SESSION['achat']); ?>
                    <?php endif; ?>
                    <h2>Mais comment obtenir des points?</h2>
                    Pour obtenir <b style="color: #73C8A9;">des points</b>, c'est très simple vous devez suivre les
                    étapes sur le module <b>Starpass</b> en dessous, avec le mode de paiement de votre choix. Lorsque
                    vous aurez obtenu un code, il vous suffira de le mettre dans le champ <b>"code d'accès"</b> et le
                    tour est joué !
                    <br><br>
                    Mais à quoi servent <b style="color: #73C8A9;">les points?</b> Pas de panique nous allons vous
                    l'expliquer à quoi <b>ils servent</b>.<br><br>
                    Dans l'hôtel, <b>les crédits</b> vous permettent d'acheter des mobiliers dans le catalogue, faire
                    des trocs, etc. Ça en fait une monnaie d'échange.<br><br>
                    Eh bien <b style="color: #73C8A9;">les points</b>, c'est exactement la même chose, sauf qu'ils sont
                    utilisable uniquement dans la rubrique <b>Boutique</b> de <?= APP_NAME; ?>, avec cette monnaie
                    vous pourrez acquérir des avantages exclusifs. (<small><b>Abonnement VIP, Badges,
                            Rares..</b></small>)
                    <br><br>
                    Vous êtes <b>curieux</b> de savoir qui sont les plus riche de l'hôtel? <br>
                    <a href="<?= APP_URL; ?>/palmares">Regarder le classement des plus riches de l'hôtel »</a>
                    <br /><br /><br />
                    <script src="//api.dedipass.com/v1/pay.js"></script>
                    <div data-dedipass="<?= DP_KEY_PUBLIC; ?>" data-dedipass-custom=""></div>
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