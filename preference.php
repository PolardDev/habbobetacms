<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 8;
$id = 1;

if(isset($_GET['page']) && !empty($_GET['page'])) {
	if($_GET['page'] == 2) {
		$id = 2;
	} elseif($_GET['page'] == 3) {
		$id = 3;
	}
}

require_once 'app/actions/Settings.php';
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
        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0fbc7c;margin-bottom:5px;font-size:18px">Navigation</div>
                    <div style="border-bottom: 1px solid #0fbc7c;margin-bottom: 10px;"></div>
                    <ul style="margin-top: 10px;margin-bottom: 5px;">
                        <li><a <?php if($id == 1) : ?>style="color: black;font-weight: bold;"
                                <?php else : ?>href="<?= APP_URL; ?>/preference/1" style="color:
                                black;" <?php endif; ?>>Paramètres de compte</a></li>
                        <li><a <?php if($id == 2) : ?>style="color: black;font-weight: bold;"
                                <?php else : ?>href="<?= APP_URL; ?>/preference/2" style="color: black;"
                                <?php endif; ?>>Changer mon adresse mail »</a></li>
                        <li><a <?php if($id == 3) : ?>style="color: black;font-weight: bold;"
                                <?php else : ?>href="<?= APP_URL; ?>/preference/3" style="color: black;"
                                <?php endif; ?>>Changer mon mot de passe »</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-8">
            <div class="box">
                <div id="load"
                    style="display:none;z-index:99;width:100%;height:100%;position:absolute;background: url(<?= APP_ASSETS; ?>/img/loader.gif) no-repeat center center rgba(0, 0, 0, 0.67);">
                </div>
                <?php if($id == 1) : ?>
                <div class="content_box">
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Paramètres de compte</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($error)) : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">
                        <?= $error; ?></div>
                    <?php endif; ?>
                    <?php if(isset($success)) : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">
                        <?= $success; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <h4>Suivi</h4>
                        Autoriser le suivi via la console ?
                        <input name="block_following" id="block_following"
                            <?php if($user->SettingsData($_SESSION['user_id'], 'block_following') == 1) : ?>checked<?php endif; ?>
                            value="1" type="radio">Personne
                        <input name="block_following" id="block_following"
                            <?php if($user->SettingsData($_SESSION['user_id'], 'block_following') == 0) : ?>checked<?php endif; ?>
                            value="0" type="radio">Tout le
                        monde
                        <br>

                        <h4>Troc</h4>
                        Activer/Désactiver le troc ?
                        <input name="can_trade" id="can_trade"
                            <?php if($user->SettingsData($_SESSION['user_id'], 'can_trade') == 1) : ?>checked<?php endif; ?>
                            value="1" type="radio">Activé
                        <input name="can_trade" id="can_trade"
                            <?php if($user->SettingsData($_SESSION['user_id'], 'can_trade') == 0) : ?>checked<?php endif; ?>
                            value="0" type="radio">Désactivé
                        <br>

                        <h4>Textamigo</h4>
                        Autoriser les demandes d'amis ?
                        <input name="block_friendrequests" id="block_friendrequests"
                            <?php if($user->SettingsData($_SESSION['user_id'], 'block_friendrequests') == 0) : ?>checked<?php endif; ?>
                            value="0" type="radio">Autorisé
                        <input name="block_friendrequests" id="block_friendrequests"
                            <?php if($user->SettingsData($_SESSION['user_id'], 'block_friendrequests') == 1) : ?>checked<?php endif; ?>
                            value="1" type="radio">Refusé
                        <br>

                        <h4>Radio</h4>
                        Configure la radio sur la page principale
                        <input name="allow_radio" id="allow_radio"
                            <?php if($user->ComplementsData($_SESSION['user_id'], 'allow_radio') == 1) : ?>checked<?php endif; ?>
                            value="1" type="radio">Activé
                        <input name="allow_radio" id="allow_radio"
                            <?php if($user->ComplementsData($_SESSION['user_id'], 'allow_radio') == 0) : ?>checked<?php endif; ?>
                            value="0" type="radio">Desactivé
                        <br>
                        <br>
                        <button type="submit" name="form1" class="button green">Valider les changements</button>
                    </form>
                </div>
                <?php elseif($id == 2) : ?>
                <div class="content_box">
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Changer mon adresse mail</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($error)) : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">
                        <?= $error; ?></div>
                    <?php endif; ?>
                    <?php if(isset($success)) : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">
                        <?= $success; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <label>Adresse mail actuel:</label><br>
                        <input type=" mail" name="mail1" value="<?= $user->UserData($_SESSION['user_id'], 'mail'); ?>"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;">
                        <br>
                        <label>Nouvelle adresse e-mail:</label><br>
                        <input type="mail" name="mail2"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <label>Retape ta nouvelle adresse e-mail:</label><br>
                        <input type="mail" name="mail3"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <i style="font-size: 15px;">* Votre adresse e-mail doit être valide.</i><br /><br />
                        <button type="submit" name="form2" class="button green">Valider les changements</button>
                    </form>
                </div>
                <?php elseif($id == 3) : ?>
                <div class="content_box">
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Changer mon mot de passe</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($error)) : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">
                        <?= $error; ?></div>
                    <?php endif; ?>
                    <?php if(isset($success)) : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">
                        <?= $success; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <label>Mot de passe actuel:</label><br>
                        <input type="password" name="pass1"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <label>Nouveau mot de passe:</label><br>
                        <input type="password" name="pass2"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <label>Retape ton nouveau mot de passe:</label><br>
                        <input type="password" name="pass3"
                            style="padding: 6px;width: 97.4%;margin-top: 10px;margin-bottom: 15px;height: 22px;font-size: 16px;"><br>
                        <i style="font-size: 15px;">* Votre mot de passe doît bien être sécurisé, nous ne sommes pas
                            responsable de votre compte.</i><br /><br />
                        <button type="submit" name="form3" class="button green">Valider les changements</button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>