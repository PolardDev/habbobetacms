<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 5;

require_once 'app/actions/RoyalSupreme.php';
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
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Adhérer au Royal Suprème</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($error)) : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">
                        <?= $error; ?></div>
                    <?php endif; ?>
                    <?php if(isset($success)) : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">
                        <?= $success; ?></div>
                    <?php endif; ?>
                    <img src="<?= APP_ASSETS; ?>/img/royal_supreme.png" style="width: 100%;">
                    <div style="position: relative;width: 100%;margin-right: 10px;">
                        <h2>Tes badges:</h2>
                        <div
                            style="position: relative;padding: 10px;border-radius: 2px;border: 1px solid #CCCCCC;background-color: #EDEDED;font-size: 15px;margin-top: -10px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME1.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME2.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME3.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME4.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME5.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME6.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME7.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME8.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME9.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME10.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME11.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME13.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME14.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME15.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME16.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME17.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME18.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME19.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME20.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME21.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME22.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME23.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME24.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME25.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME26.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME27.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME28.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME29.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME30.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME31.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME32.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME33.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME34.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME35.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME36.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME37.gif" style="margin-right: 2px;">
                            <img src="<?= APP_ASSETS; ?>/img/supreme/SUPREME38.gif" style="margin-right: 2px;">
                        </div>
                    </div>
                    <h2>Tes avantages:</h2>
                    <div
                        style="position: relative;padding: 10px;border-radius: 2px;border: 1px solid #CCCCCC;background-color: #EDEDED;font-size: 15px;margin-top: -10px;">
                        <div style="margin-top: 3px;margin-bottom: 3px;margin-left: px;margin-right: 10px;">
                            <span style="color: #DDAA00;font-size: 14px;">1.</span> <b>38 badges</b> exclusifs!<br />
                            <span style="color: #DDAA00;font-size: 14px;">2.</span> <b>6 000 000 crédits</b>
                            offerts!<br />
                            <span style="color: #DDAA00;font-size: 14px;">3.</span> <b>50 000 duckets</b> offerts!<br />
                            <span style="color: #DDAA00;font-size: 14px;">4.</span> Un accès à la <b>Royal Club
                                Zone</b><br />
                            <span style="color: #DDAA00;font-size: 14px;">5.</span> Un <b>catalogue exclusif</b>, et
                            inédit dans l'hôtel!<br />
                            <span style="color: #DDAA00;font-size: 14px;">6.</span> Catalogue du <b>VIP Club</b> & du
                            <b>Royal Club</b> & du <b>Royal Suprème</b> <br />
                            <span style="color: #DDAA00;font-size: 14px;">7.</span> Un <b> shop badge</b> gratuit
                            présent dans le catalogue<br />
                            <span style="color: #DDAA00;font-size: 14px;">8.</span> Trois badges personnalisés par
                            toi-même <b>(contacte le fondateur)<b><br />
                                    <span style="color: #DDAA00;font-size: 14px;">9.</span> <b>3 000 Win-Win</b> ajouté
                                    à ton compte <br />
                                    <span style="color: #DDAA00;font-size: 14px;">10.</span> <b>100 Respects</b> ajouté
                                    à ton compte <br /> </br>
                                    <span style="color: #FF0000;font-size: 14px;"></span> <b>Deconnecte toi avant</b> de
                                    t'inscrire au Royal Suprème <br />
                        </div>
                    </div>

                    <h2>Tes commandes:</h2>
                    <div
                        style="position: relative;padding: 10px;border-radius: 2px;border: 1px solid #CCCCCC;background-color: #EDEDED;font-size: 15px;margin-top: -10px;">
                        <div style="margin-top: 3px;margin-bottom: 3px;margin-left: px;margin-right: 10px;">
                            <span style="color: #DDAA00;font-size: 14px;">1.</span> <b>:push</b> PSEUDO - Pousser un
                            utilisateur<br />
                            <span style="color: #DDAA00;font-size: 14px;">2.</span> <b>:spull</b> PSEUDO - Tirer un
                            utilisateur vers vous<br />
                            <span style="color: #DDAA00;font-size: 14px;">3.</span> <b>:follow</b> PSEUDO - Rejoindre un
                            utilisateur<br />
                            <span style="color: #DDAA00;font-size: 14px;">4.</span> <b>:enable</b> CHIFFRE - Utiliser un
                            effet<br />
                            <span style="color: #DDAA00;font-size: 14px;">5.</span> <b>:moonwalk</b> Marcher à
                            réculons<br />
                            <span style="color: #DDAA00;font-size: 14px;">6.</span> <b>:mimic</b> PSEUDO - Copier le
                            look d'un utilisateur<br />
                            <span style="color: #DDAA00;font-size: 14px;">7.</span> <b>:kiss</b> PSEUDO - Embrasser un
                            utilisateur<br />
                            <span style="color: #DDAA00;font-size: 14px;">8.</span> <b>:hit</b> PSEUDO - Frapper un
                            utilisateur<br />
                            <span style="color: #DDAA00;font-size: 14px;">9.</span> <b>:myteleport</b> - Se teleporter
                            dans son appart<br />
                            <span style="color: #DDAA00;font-size: 14px;">10.</span> <b>A venir</b> - Des commandes
                            exclusifs à venir :O<br />
                        </div>
                    </div>

                    <h2>Un catalogue inédit !</h2>
                    <img src="<?= APP_ASSETS; ?>/img/Royalsupreme.gif" style="margin-right: 10px;">
                    <div style="clear: both;"></div><br />
                    <form method="POST">
                        <button type="submit" class="button green" style="width: 100%;padding: 20px;font-size: 25px;"
                            name="submit">Adhérer au Royal Suprème (90 points)
                        </button>
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