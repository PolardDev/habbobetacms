<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 2;
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
                    <div style="color: #bc0f0f;margin-bottom:5px;font-size:18px">Sitefan</div>
                    <div style="border-bottom: 1px solid #bc0f0f;margin-bottom: 10px;"></div>
                    <div
                        style="position: relative;height: 200px;float: right;top: -10px;width: 235px;background-image: url(<?= APP_ASSETS; ?>/img/sitefan2.png);">
                    </div>
                    Les Sites de Fans <?= APP_NAME; ?> te permettent de rester au top des dernières nouveautés et des
                    potins de la communauté. Certains te proposent même d'écrire ta propre chronique.<br />
                    Pour le moment, nos Sites de Fans Officiels sont:<br /><br />
                    <?php
					$fansitesQuery = $db->prepare("SELECT * FROM hbeta_fansites WHERE type = :type ORDER BY id DESC");
					$fansitesQuery->execute(array(':type' => "fansite"));
					while($fansites = $fansitesQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<a href="'.$fansites['url'].'" target="_blank">'.$fansites['title'].'</a><br />';
					}
					?>
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #FAAC58;margin-bottom:5px;font-size:18px">Officialiser son site fan et/ou rpg
                    </div>
                    <div style="border-bottom: 1px solid #FAAC58;margin-bottom: 10px;"></div>
                    Tu es propriétaire d'un <font color="red">site de fans</font> ou d'un <font color="red">RPG</font>
                    et tu veux le faire officialiser? Contacte-nous via l'adresse suivante : <b><a
                            href="https://facebook.com/<?= SOCIAL_FB_PAGENAME; ?>"><?= SOCIAL_FB_PAGENAME; ?></a></b>
                    avec pour objet <font color="red">"Site de fans"</font> ou <font color="red">"RPG"</font>.
                    Explique-nous le but de ton
                    site de fan et en quoi il sera bénéfique à la communauté d'<?= APP_NAME; ?>.
                </div>
            </div>
        </div>

        <div class="w-8">
            <div class="box">
                <div class="content_box">
                    <div style="color: #2767a7;margin-bottom:5px;font-size:18px">Role Play Game</div>
                    <div style="border-bottom: 1px solid #2767a7;margin-bottom: 10px;"></div>
                    <div
                        style="position: relative;height: 200px;float: right;top: -10px;width: 235px;background-image: url(<?= APP_ASSETS; ?>/img/sitefan2.png);">
                    </div>
                    Les Role play game (RPG) sont des jeux de rôles où tu peux créer ta vie comme tu le sens, dans les
                    divers RPG vous pouvez retrouver diverses catégories, comme les RPG surnaturels, réels, mode ou
                    encore mafieux.<br />
                    Alors qu'attends-tu pour rejoindre cette liste ?<br /><br />
                    <?php
					$fansitesQuery = $db->prepare("SELECT * FROM hbeta_fansites WHERE type = :type ORDER BY id DESC");
					$fansitesQuery->execute(array(':type' => "rpg"));
					while($fansites = $fansitesQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<a href="'.$fansites['url'].'" target="_blank">'.$fansites['title'].'</a><br />';
					}
					?>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>