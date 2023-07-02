<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 3;
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
        .in.a:nth-child(even) {
            background: none
        }

        .in.a:nth-child(odd) {
            background: rgba(113, 15, 188, 0.13)
        }

        .in.b:nth-child(even) {
            background: none
        }

        .in.b:nth-child(odd) {
            background: rgba(188, 175, 15, 0.13)
        }
        </style>

        <div class="w-6">
            <div class="box">
                <div class="content_box">
                    <div style="color: #710fbc;margin-bottom:5px;font-size:18px">Top des respects</div>
                    <div style="border-bottom: 1px solid #710fbc;margin-bottom: 10px;"></div>
                    <?php
					$usersSettingsQuery = $db->prepare("SELECT * FROM users_settings ORDER BY respects_received DESC LIMIT 10");
					$usersSettingsQuery->execute();
					while($usersSettings = $usersSettingsQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<div class="in a">';
							echo '<div style="position: relative;float: left;width: 75px;margin-top: 10px;">';
								echo '<div style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url(\''.APP_AVATAR.''.$user->UserData($usersSettings['user_id'], 'look').'&head_direction=3&gesture=sml\');"></div>';
							echo '</div>';
							echo '<div style="position: relative;float: left;width: 198px;overflow: hidden;">';
								echo '<b style="color: #710fbc">'.$user->UserData($usersSettings['user_id'], 'username').'</b><br />';
								echo '<small>'.$usersSettings['respects_received'].' respects</small>';
							echo '</div>';
						echo '</div>';
					}
					?>
                </div>
            </div>
        </div>

        <div class="w-6">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bcaf0f;margin-bottom:5px;font-size:18px">Top des win-wins</div>
                    <div style="border-bottom: 1px solid #bcaf0f;margin-bottom: 10px;"></div>
                    <?php
					$usersSettingsQuery = $db->prepare("SELECT * FROM users_settings ORDER BY achievement_score DESC LIMIT 10");
					$usersSettingsQuery->execute();
					while($usersSettings = $usersSettingsQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<div class="in b">';
							echo '<div style="position: relative;float: left;width: 75px;margin-top: 10px;">';
								echo '<div style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url(\''.APP_AVATAR.''.$user->UserData($usersSettings['user_id'], 'look').'&head_direction=3&gesture=sml\');"></div>';
							echo '</div>';
							echo '<div style="position: relative;float: left;width: 198px;overflow: hidden;">';
								echo '<b style="color: #bcaf0f">'.$user->UserData($usersSettings['user_id'], 'username').'</b><br />';
								echo '<small>'.$usersSettings['achievement_score'].' win-wins</small>';
							echo '</div>';
						echo '</div>';
					}
					?>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>