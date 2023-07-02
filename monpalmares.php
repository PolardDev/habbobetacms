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

        .in.d:nth-child(even) {
            background: none
        }

        .in.d:nth-child(odd) {
            background: rgba(113, 15, 188, 0.13)
        }

        .in.e:nth-child(even) {
            background: none
        }

        .in.e:nth-child(odd) {
            background: rgba(188, 175, 15, 0.13)
        }
        </style>
        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0fbc7c;margin-bottom:5px;font-size:18px">Mon nombre de points</div>
                    <div style="border-bottom: 1px solid #0fbc7c;margin-bottom: 10px;"></div>
                    <div class="in a">
                        <div style="position: relative;float: left;width: 75px;margin-top: 10px;">
                            <div
                                style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url('<?= APP_AVATAR; ?><?= $user->UserData($_SESSION['user_id'], 'look'); ?>&head_direction=3&gesture=sml');">
                            </div>
                        </div>
                        <div
                            style="position: relative;float: left;width: 198px;overflow: hidden;margin-top: -43px;margin-left: 65px;">
                            <b
                                style="color: #0fbc7c"><?= $user->UserData($_SESSION['user_id'], 'username'); ?></b><br />
                            <small><?= $user->ComplementsData($_SESSION['user_id'], 'points'); ?> points</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Mon nombre de crédits</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <div class="in b">
                        <div style="position: relative;float: left;width: 75px;margin-top: 10px;">
                            <div
                                style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url('<?= APP_AVATAR; ?><?= $user->UserData($_SESSION['user_id'], 'look'); ?>&head_direction=3&gesture=sml');">
                            </div>
                        </div>
                        <div
                            style="position: relative;float: left;width: 198px;overflow: hidden;margin-top: -43px;margin-left: 65px;">
                            <b
                                style="color: #bc0f6f"><?= $user->UserData($_SESSION['user_id'], 'username'); ?></b><br />
                            <small><?= $user->UserData($_SESSION['user_id'], 'credits'); ?> crédits</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bc0f0f;margin-bottom:5px;font-size:18px">Mon nombre de duckets</div>
                    <div style="border-bottom: 1px solid #bc0f0f;margin-bottom: 10px;"></div>
                    <div class="in c">
                        <div style="position: relative;float: left;width: 75px;margin-top: 10px;">
                            <div
                                style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url('<?= APP_AVATAR; ?><?= $user->UserData($_SESSION['user_id'], 'look'); ?>&head_direction=3&gesture=sml');">
                            </div>
                        </div>
                        <div
                            style="position: relative;float: left;width: 198px;overflow: hidden;margin-top: -43px;margin-left: 65px;">
                            <b
                                style="color: #bc0f0f"><?= $user->UserData($_SESSION['user_id'], 'username'); ?></b><br />
                            <small><?= $user->CurrencyData($_SESSION['user_id'], '0'); ?> duckets</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #710fbc;margin-bottom:5px;font-size:18px">Mon nombre de respects</div>
                    <div style="border-bottom: 1px solid #710fbc;margin-bottom: 10px;"></div>
                    <div class="in d">
                        <div style="position: relative;float: left;width: 75px;margin-top: 10px;">
                            <div
                                style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url('<?= APP_AVATAR; ?><?= $user->UserData($_SESSION['user_id'], 'look'); ?>&head_direction=3&gesture=sml');">
                            </div>
                        </div>
                        <div
                            style="position: relative;float: left;width: 198px;overflow: hidden;margin-top: -43px;margin-left: 65px;">
                            <b
                                style="color: #710fbc"><?= $user->UserData($_SESSION['user_id'], 'username'); ?></b><br />
                            <small><?= $user->SettingsData($_SESSION['user_id'], 'respects_received'); ?>
                                respects</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bcaf0f;margin-bottom:5px;font-size:18px">Mon nombre de win-wins</div>
                    <div style="border-bottom: 1px solid #bcaf0f;margin-bottom: 10px;"></div>
                    <div class="in e">
                        <div style="position: relative;float: left;width: 75px;margin-top: 10px;">
                            <div
                                style="width: 63px;height: 68px;margin-top: -35px;margin-left: -5px;background: url('<?= APP_AVATAR; ?><?= $user->UserData($_SESSION['user_id'], 'look'); ?>&head_direction=3&gesture=sml');">
                            </div>
                        </div>
                        <div
                            style="position: relative;float: left;width: 198px;overflow: hidden;margin-top: -43px;margin-left: 65px;">
                            <b
                                style="color: #bcaf0f"><?= $user->UserData($_SESSION['user_id'], 'username'); ?></b><br />
                            <small><?= $user->SettingsData($_SESSION['user_id'], 'achievement_score'); ?>
                                win-wins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>