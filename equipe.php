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
        <style type="text/css">
        .div1:nth-child(even) {
            background: none;
            height: 65px;
            width: 100%;
        }

        .div1:nth-child(odd) {
            background: rgba(39, 103, 167, 0.13);
            height: 65px;
            width: 100%;
        }

        .div2:nth-child(even) {
            background: none;
            height: 65px;
            width: 100%;
        }

        .div2:nth-child(odd) {
            background: rgba(255, 230, 0, 0.13);
            height: 65px;
            width: 100%;
        }

        .div3:nth-child(even) {
            background: none;
            height: 65px;
            width: 100%;
        }

        .div3:nth-child(odd) {
            background: rgba(214, 66, 66, 0.13);
            height: 65px;
            width: 100%;
        }

        .div4:nth-child(even) {
            background: none;
            height: 65px;
            width: 100%;
        }

        .div4:nth-child(odd) {
            background: rgba(74, 181, 1, 0.13);
            height: 65px;
            width: 100%;
        }
        </style>
        <div style="float: left;width: 640px;">
            <div class="w-8">
                <div class="box">
                    <div class="content_box">
                        <div style="color: #2767A7;margin-bottom:5px;font-size:18px">Fondateurs</div>
                        <div style="border-bottom: 1px solid #2767A7;margin-bottom: 10px;"></div>
                        <?php
						$usersQuery = $db->prepare("SELECT * FROM users WHERE rank = :rank ORDER BY id DESC");
						$usersQuery->execute(array(':rank' => "8"));
						while($users = $usersQuery->fetch(PDO::FETCH_ASSOC)) {
							echo '<div class="div1">';
								echo '<div style="float: left;width: 70px;margin-bottom: 5px;">';
									echo '<div style="background-image: url(\''.APP_AVATAR.''.$users['look'].'&head_direction=3&gesture=sml\');height: 70px;margin-top: -12px;"></div>';
								echo '</div>';
								echo '<div style="float: left;width: 80%;">';
									echo '<div style="margin-top: 15px;color: #888888;">';
										echo '<b style="color: #2767A7;">'.$users['username'].'</b><br />';
										echo '<b>Mission:</b> '.$users['motto'].'<br />';
									echo '</div>';
									echo '<div style="position: relative;float: right;right: -45px;margin-top: -35px;">';
										echo '<center>';
											echo '<img src="'.APP_ASSETS.'/img/ADM.gif" style="margin-top: -10px;"><br />';
											if($users['online'] == 0) {
												echo '<img src="'.APP_ASSETS.'/img/offline.gif">';
											} else {
												echo '<img src="'.APP_ASSETS.'/img/online.gif">';
											}
										echo '</center>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						?>
                    </div>
                </div>
            </div>

            <div class="w-8">
                <div class="box">
                    <div class="content_box">
                        <div style="color: #C1B31C;margin-bottom:5px;font-size:18px">Responsables</div>
                        <div style="border-bottom: 1px solid #C1B31C;margin-bottom: 10px;"></div>
                        <?php
						$usersQuery = $db->prepare("SELECT * FROM users WHERE rank = :rank ORDER BY id DESC");
						$usersQuery->execute(array(':rank' => "7"));
						while($users = $usersQuery->fetch(PDO::FETCH_ASSOC)) {
							echo '<div class="div2">';
								echo '<div style="float: left;width: 70px;margin-bottom: 5px;">';
									echo '<div style="background-image: url(\''.APP_AVATAR.''.$users['look'].'&head_direction=3&gesture=sml\');height: 70px;margin-top: -12px;"></div>';
								echo '</div>';
								echo '<div style="float: left;width: 80%;">';
									echo '<div style="margin-top: 15px;color: #888888;">';
										echo '<b style="color: #2767A7;">'.$users['username'].'</b><br />';
										echo '<b>Mission:</b> '.$users['motto'].'<br />';
									echo '</div>';
									echo '<div style="position: relative;float: right;right: -45px;margin-top: -35px;">';
										echo '<center>';
											echo '<img src="'.APP_ASSETS.'/img/ADM.gif" style="margin-top: -10px;"><br />';
											if($users['online'] == 0) {
												echo '<img src="'.APP_ASSETS.'/img/offline.gif">';
											} else {
												echo '<img src="'.APP_ASSETS.'/img/online.gif">';
											}
										echo '</center>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						?>
                    </div>
                </div>
            </div>

            <div class="w-8">
                <div class="box">
                    <div class="content_box">
                        <div style="color: #D64242;margin-bottom:5px;font-size:18px">Animateurs</div>
                        <div style="border-bottom: 1px solid #D64242;margin-bottom: 10px;"></div>
                        <?php
						$usersQuery = $db->prepare("SELECT * FROM users WHERE rank = :rank ORDER BY id DESC");
						$usersQuery->execute(array(':rank' => "6"));
						while($users = $usersQuery->fetch(PDO::FETCH_ASSOC)) {
							echo '<div class="div3">';
								echo '<div style="float: left;width: 70px;margin-bottom: 5px;">';
									echo '<div style="background-image: url(\''.APP_AVATAR.''.$users['look'].'&head_direction=3&gesture=sml\');height: 70px;margin-top: -12px;"></div>';
								echo '</div>';
								echo '<div style="float: left;width: 80%;">';
									echo '<div style="margin-top: 15px;color: #888888;">';
										echo '<b style="color: #2767A7;">'.$users['username'].'</b><br />';
										echo '<b>Mission:</b> '.$users['motto'].'<br />';
									echo '</div>';
									echo '<div style="position: relative;float: right;right: -45px;margin-top: -35px;">';
										echo '<center>';
											echo '<img src="'.APP_ASSETS.'/img/ADM.gif" style="margin-top: -10px;"><br />';
											if($users['online'] == 0) {
												echo '<img src="'.APP_ASSETS.'/img/offline.gif">';
											} else {
												echo '<img src="'.APP_ASSETS.'/img/online.gif">';
											}
										echo '</center>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						?>
                    </div>
                </div>
            </div>

            <div class="w-8">
                <div class="box">
                    <div class="content_box">
                        <div style="color: #4AB501;margin-bottom:5px;font-size:18px">Modérateurs</div>
                        <div style="border-bottom: 1px solid #4AB501;margin-bottom: 10px;"></div>
                        <?php
						$usersQuery = $db->prepare("SELECT * FROM users WHERE rank = :rank ORDER BY id DESC");
						$usersQuery->execute(array(':rank' => "5"));
						while($users = $usersQuery->fetch(PDO::FETCH_ASSOC)) {
							echo '<div class="div4">';
								echo '<div style="float: left;width: 70px;margin-bottom: 5px;">';
									echo '<div style="background-image: url(\''.APP_AVATAR.''.$users['look'].'&head_direction=3&gesture=sml\');height: 70px;margin-top: -12px;"></div>';
								echo '</div>';
								echo '<div style="float: left;width: 80%;">';
									echo '<div style="margin-top: 15px;color: #888888;">';
										echo '<b style="color: #2767A7;">'.$users['username'].'</b><br />';
										echo '<b>Mission:</b> '.$users['motto'].'<br />';
									echo '</div>';
									echo '<div style="position: relative;float: right;right: -45px;margin-top: -35px;">';
										echo '<center>';
											echo '<img src="'.APP_ASSETS.'/img/ADM.gif" style="margin-top: -10px;"><br />';
											if($users['online'] == 0) {
												echo '<img src="'.APP_ASSETS.'/img/offline.gif">';
											} else {
												echo '<img src="'.APP_ASSETS.'/img/online.gif">';
											}
										echo '</center>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						?>
                    </div>
                </div>
            </div>
        </div>

        <div style="float: right;width: 320px;">
            <div class="w-4">
                <div class="box">
                    <div class="content_box">
                        <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">L'Equipe des Staffs</div>
                        <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                        "Qui sont ces personnes ?"<br>
                        <b>Les staffs sont des personnes qui modèrent, administrent ou animent l'hôtel selon le poste
                            qu'ils occupent.</b><br>
                        Ils ont juré de faire respecter les conditions d'utilisation et de mettre à disposition des
                        joueurs tout leur savoir pour rendre l'hôtel meilleur.<br>
                        La sécurité est le point le plus important pour eux. Afin de repérer les staffs, sache qu'ils
                        portent un badge "Habbo Staff".
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>