<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 5;

require_once 'app/actions/RoyalClub.php';
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
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
        </style>
        <div class="w-8">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Mes transactions</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <table>
                        <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$historyQuery = $db->prepare("SELECT * FROM hbeta_history WHERE user_id = :user_id");
							$historyQuery->execute(array(':user_id' => $_SESSION['user_id']));
							if($historyQuery->rowCount() == 0) {
								echo '<center>Tu n\'as fait aucun achat sur la boutique pour le moment.</center>';
							}
							while($history = $historyQuery->fetch(PDO::FETCH_ASSOC)) {
								echo '<tr>';
									echo '<td>'.$user->UserData($history['user_id'], 'username').'</td>';
									echo '<td>'.$history['body'].'</td>';
                            		echo '<td>'.date('d/m/Y', $history['created_at']).'</td>';
                            	echo '</tr>';
                            }
							?>
                        </tbody>
                    </table>
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