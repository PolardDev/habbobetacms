<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 5;

require_once 'app/actions/Badges.php';
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
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Acheter des badges</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($error)) : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">
                        <?= $error; ?></div>
                    <?php endif; ?>
                    <?php if(isset($success)) : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">
                        <?= $success; ?></div>
                    <?php endif; ?>
                    <style>
                    .badge {
                        height: 112px;
                        color: white;
                        background: url(<?= APP_ASSETS; ?>/img/store_fond.png);
                        background-repeat: no-repeat;
                        background-position: 50% 45%;
                        border: 1px solid #7F7F7F;
                        float: left;
                        border-radius: 4px;
                        width: 130px;
                        margin-right: 10px;
                        margin-left: 10px;
                        margin-bottom: 15px;
                    }

                    .badge>.titre {
                        background-color: #5e75b7;
                        border-top: 1px solid #808080;
                        border-bottom: 1px solid #808080;
                        position: relative;
                        padding: 6px;
                        margin-top: 15px;
                        text-align: center;
                        text-transform: uppercase;
                        font-size: 16px;
                    }
                    </style>
                    <?php
					$badgesQuery = $db->prepare("SELECT * FROM hbeta_badges ORDER BY id DESC");
					$badgesQuery->execute();
					while($badges = $badgesQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<div class="badge">';
							echo '<center>';
								echo '<img src="//images.habbo.com/c_images/album1584/'.$badges['badge_code'].'.gif" style="position: absolute;margin-left: -17px;margin-top: 15px;margin-bottom: 15px;">';
							echo '</center>';
							echo '<div style="position: relative;top:71px;">';
								echo '<form method="post">';
									echo '<input type="hidden" name="badge_code" value="'.$badges['badge_code'].'">';
									echo '<button type="submit" name="submit" class="button green" style="width: 80px;font-size: 12px;float: left;margin-left: 5px;">ACHETER</button>';
								echo '</form>';
								echo '<div class="button" style="background-color: #FFA000;border: 1px solid #a07d41;width: 15px;font-size: 12px;float: right;margin-right: 5px;cursor:default;">'.$badges['points'].'</div>';
							echo '</div>';
						echo '</div>';
					}
					?>
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