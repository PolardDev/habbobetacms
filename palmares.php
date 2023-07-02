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
            background: rgba(15, 188, 124, 0.13)
        }

        .in.b:nth-child(even) {
            background: none
        }

        .in.b:nth-child(odd) {
            background: rgba(188, 15, 111, 0.13)
        }

        .in.c:nth-child(even) {
            background: none
        }

        .in.c:nth-child(odd) {
            background: rgba(188, 15, 15, 0.13)
        }
        </style>
        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0fbc7c;margin-bottom:5px;font-size:18px">Top des points</div>
                    <div style="border-bottom: 1px solid #0fbc7c;margin-bottom: 10px;"></div>
                    <?php
					$usersComplementsQuery = $db->prepare("SELECT * FROM hbeta_users_complements ORDER BY points DESC LIMIT 10");
					$usersComplementsQuery->execute();
					while($usersComplements = $usersComplementsQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<div class="in a" style="padding: 7px;">';
							echo '<div style="position: relative;float: left;width: 75px;margin-top: 7px;">';
								echo '<div style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url(\''.APP_AVATAR.''.$user->UserData($usersComplements['user_id'], 'look').'&head_direction=3&gesture=sml\');"></div>';
							echo '</div>';
							echo '<div style="position: relative;float: left;width: 198px;overflow: hidden;">';
								echo '<b style="color: #0fbc7c">'.$user->UserData($usersComplements['user_id'], 'username').'</b><br />';
								echo '<small>'.$usersComplements['points'].' points</small>';
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
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Top des crédits</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php
					$usersQuery = $db->prepare("SELECT * FROM users ORDER BY credits DESC LIMIT 10");
					$usersQuery->execute();
					while($users = $usersQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<div class="in b" style="padding: 7px;">';
							echo '<div style="position: relative;float: left;width: 75px;margin-top: 7px;">';
								echo '<div style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url(\''.APP_AVATAR.''.$users['look'].'&head_direction=3&gesture=sml\');"></div>';
							echo '</div>';
							echo '<div style="position: relative;float: left;width: 198px;overflow: hidden;">';
								echo '<b style="color: #bc0f6f">'.$users['username'].'</b><br />';
								echo '<small>'.$users['credits'].' credits</small>';
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
                    <div style="color: #bc0f0f;margin-bottom:5px;font-size:18px">Top des duckets</div>
                    <div style="border-bottom: 1px solid #bc0f0f;margin-bottom: 10px;"></div>
                    <?php
					$usersCurrencyQuery = $db->prepare("SELECT * FROM users_currency WHERE type = :type ORDER BY amount DESC LIMIT 10");
					$usersCurrencyQuery->execute(array(':type' => "0"));
					while($usersCurrency = $usersCurrencyQuery->fetch(PDO::FETCH_ASSOC)) {
						echo '<div class="in c" style="padding: 7px;">';
							echo '<div style="position: relative;float: left;width: 75px;margin-top: 7px;">';
								echo '<div style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url(\''.APP_AVATAR.''.$user->UserData($usersCurrency['user_id'], 'look').'&head_direction=3&gesture=sml\');"></div>';
							echo '</div>';
							echo '<div style="position: relative;float: left;width: 198px;overflow: hidden;">';
								echo '<b style="color: #bc0f0f">'.$user->UserData($usersCurrency['user_id'], 'username').'</b><br />';
								echo '<small>'.$usersCurrency['amount'].' duckets</small>';
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