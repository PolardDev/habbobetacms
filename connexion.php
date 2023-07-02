<?php
require_once 'config.php';

$user->UserisOnline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$page = "login";

if(isset($_GET['p']) && !empty($_GET['p'])) {
	if($_GET['p'] == "inscription") {
		$page = "register";
		$captcha = mt_rand(100000,999999);
        require_once 'app/actions/Register.php';
	} elseif($_GET['p'] == "forgot") {
		$page = "forgot";
	}
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
        <?php if($page == "login") : ?>
        <script type="text/javascript">
        $(function() {
            $("#formlog").submit(function() {
                pseudo = $(this).find("input[name=pseudo]").val();
                pass = $(this).find("input[name=pass]").val();
                document.getElementById('load').style.display = "block";
                $.post("<?= APP_URL; ?>/app/actions/Login.php", {
                    pseudo: pseudo,
                    pass: pass
                }, function(data) {
                    if (data != "ok") {
                        swal({
                            title: "Erreur",
                            text: data,
                            html: true,
                            type: "error",
                        });
                        document.getElementById('load').style.display = "none";
                    } else {
                        document.location.href = "<?= APP_URL; ?>/profil"
                    }
                });
                return false;
            });
        });
        </script>

        <div class="w-12" style="margin-top: 5px;">
            <div class="box_gauche">
                <div class="titre">Un nouveau monde,<br> totalement virtuel</div>
                <div class="bulle">Crée ton propre personnage...</div>
                <div class="bulle deuxieme">et construis ta vie sociale</div>
                <div class="main"></div>
                <div class="user" style="background-image: url(<?= APP_ASSETS; ?>/img/avatarimage.png);">
                </div>
                <a href="?p=inscription" style="cursor: pointer;">
                    <div class="inscription">Inscris-toi gratuitement !</div>
                </a>
                <div class="desc"><?= APP_NAME; ?> est une nouvelle innovation<br> Viens vite découvrir et te faire
                    des amis</div>
                <strong>
                    <a style="color:rgba(100,100,100,0); font-size:1px;">beta ,rabbo, bobbalive, bobba, hbc, hcity,
                        habbo-city, theocms, hbetacms, habbo, HABBO, habbo hotel, forum, forum habbo, enable, tutoriel,
                        staff, devenir staff, devenir staff gratuitement habbo, handitem, badge habbo, enables,
                        inscription habbo, inscription, habboo, retro habbo, rétro habbo, serveur habbo, retro, habbo
                        retro gratuit, autre habbo, habbo autre, habbo retro qui marche bien, jeu comme habbo, jeux
                        comme habbo, site comme habbo, habbo site, serveur privé habbo, bobba, bobbah hotel, bobbahotel,
                        bobba hotel, bobba-hotel, jabbo, jabbo hotel, jabbonow, jabbohotel, jabborp, habbo-alpha, habbo
                        alpha, habboalpha, habbolove, habbo-love, habbo love, hlove, habbolove inscription,
                        habbo-dreams, habbo dreams, habbo dream, habbo-dreams, cola-hotel, cola hotel, bobbaworld,
                        bobba-world, world, worldhabbo, world-habbo, habbiworld, abbo, habbi, abboz, habboz, habbo
                        gratuit, habbo credit, habbo hotel, habbo hotel gratuit, jouer a habbo gratuitement, habbo en
                        gratuit, habbo retro, recrutement staff, recrutement, mmorpg, vip, animateur, animation, jeu du
                        celib, clack ou smack, staff, rencontre, celibataire, casino, rares, magots, enable, boutique,
                        fifa, foot, cheval, chevaux, piscine, crédits gratuits, crédit gratuit, staff club, virtuel,
                        monde, réseau social, gratuit, communauté, avatar, chat, connecté, adolescence, jeu de rôle,
                        rejoindre, social, groupes, forums, jouer, jeux, amis, ados, jeunes, collector, créer,
                        connecter, meuble, mobilier, animaux, déco, design, appart, décorer, partager, création, badges,
                        musique, célébrité, chat vip, fun, sortir, mmo, chat, youtube, facebook, twitter</a>
                </strong>
            </div>

            <div style="float: right;width: 510px">
                <div class="box">
                    <div id="load"
                        style="display:none;z-index:99;width:100%;height:100%;position:absolute;background: url(<?= APP_ASSETS; ?>/img/loader.gif) no-repeat center center rgba(0, 0, 0, 0.67);">
                    </div>
                    <div class="content_box">
                        <div style="color: #0f7cbc;margin-bottom:5px;font-size:18px">Se connecter sur <?= APP_NAME; ?>
                        </div>
                        <div style="border-bottom: 1px solid #0f7cbc;margin-bottom: 10px;"></div>
                        <form method="post" id="formlog">
                            <label>Nom d'utilisateur:</label><br>
                            <input type="text" value="" name="pseudo" placeholder="Entre ton pseudo"
                                style="padding: 6px;width: 96.8%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                            <label>Mot de passe:</label><br>
                            <input type="password" value="" name="pass" placeholder="Entre ton mot de passe"
                                style="padding: 6px;width: 96.8%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                            <button type="submit"
                                style="border-radius: 3px;cursor:pointer;margin-top: -5px;padding: 10px;border: 1px solid #2ab62f;text-decoration: none;color: #FFF;background-color: #29ab2d;">
                                Se connecter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="box_img"></div>
        </div>
        <?php elseif($page == "register") : ?>
        <div class="w-8">
            <div class="box">
                <div id="load"
                    style="display:none;z-index:99;width:100%;height:100%;position:absolute;background: url(<?= APP_ASSETS; ?>/img/loader.gif) no-repeat center center rgba(0, 0, 0, 0.67);">
                </div>
                <div class="content_box">
                    <div style="color: #0f7cbc;margin-bottom:5px;font-size:18px">Inscris-toi sur <?= APP_NAME; ?>
                    </div>
                    <div style="border-bottom: 1px solid #0f7cbc;margin-bottom: 10px;"></div>
                    <?php if(isset($erreur)) : ?>
                    <div class="msg" id="error"
                        style="margin-bottom: 10px;padding: 10px;width: 96.7%;background-color: #b32518;">
                        <?= $erreur; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <label>Choisis un pseudo:</label><br>
                        <input type="text" name="pseudo" placeholder="Entre ton pseudo"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <label>Entre ta vraie adresse mail:</label><br>
                        <input type="mail" name="mail" placeholder="Entre ton adresse e-mail"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <label>Entre un mot de passe:</label><br>
                        <input type="password" name="pass" placeholder="Entre ton mot de passe"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <label>Répète le mot de passe choisi:</label><br>
                        <input type="password" name="re_pass" placeholder="Répete ton mot de passe"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <b style="font-size:15px;"><?= $captcha; ?></b>
                        <input type="number" name="captcha" placeholder="Entre le captcha situé ci-dessus"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <input type="hidden" name="captcha_verif" value="<?= $captcha; ?>">
                        <button type="submit" name="form_reg"
                            style="border-radius: 3px;cursor:pointer;margin-top: -5px;padding: 10px;border: 1px solid #2ab62f;text-decoration: none;color: #FFF;background-color: #29ab2d;">Valider
                            mon inscription</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0fbc7c;margin-bottom:5px;font-size:18px">Informations</div>
                    <div style="border-bottom: 1px solid #0fbc7c;margin-bottom: 10px;"></div>
                    Ton pseudo peut contenir des lettres (majuscules et minuscule) et des nombres.<br /><br />
                    Ton adresse e-mail doit être vraie, pour que tu puisses valider ton compte.<br /><br />
                    Ton mot de passe doit comprendre au moins 6 caractères et inclure des lettres et des
                    chiffres.<br /><br />
                    Valide le captcha pour confirmer ton inscription et ta présence humaine.<br /><br />
                    <center>
                        <img src="<?= APP_ASSETS; ?>/img/frank_reg.gif">
                    </center>
                </div>
            </div>
        </div>
        <?php elseif($page == "forgot") : ?>
        <?php endif; ?>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>