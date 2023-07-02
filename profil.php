<?php
require_once 'config.php';
$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 1;
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
        <div class="w-12" style="width: 588px;">
            <div
                style="position: relative;width: 100%;height: 185px;background-image: url(http://img15.hostingpics.net/pics/749527football.png);background-position: 47% 40%;border-radius: 5px;">
                <div style="position: relative;float: left;">
                    <div
                        style="background:url('<?= APP_AVATAR; ?><?= $user->UserData($_SESSION['user_id'], 'look'); ?>&size=l');height: 180px;width: 100px;margin-top: -30px;">
                    </div>
                </div>
                <div
                    style="position: relative;float: left;color: white;font-size: 25px;margin-top: 25px;margin-left: 30px;">
                    <b><i><?= $user->UserData($_SESSION['user_id'], 'username'); ?></i>
                        <?php if($user->UserData($_SESSION['user_id'], 'rank') == 1) : ?><font color="#049404">
                            [VIP]</font><?php elseif($user->UserData($_SESSION['user_id'], 'rank') == 2) : ?><font
                            color="#049404">[RC]</font>
                        <?php elseif($user->UserData($_SESSION['user_id'], 'rank') == 3) : ?><font color="#049404">[RS]
                        </font>
                        <?php elseif($user->UserData($_SESSION['user_id'], 'rank') == 4) : ?><font color="#DB0808">
                            [STAFF]</font>
                        <?php endif; ?></b><br />
                    <div style="font-size:17px;margin-top: 5px;"><i>Mission:
                            <?= $habbo->INTorHTML($user->UserData($_SESSION['user_id'], 'motto')); ?></i></div>
                </div>

                <div style="position: absolute;bottom: 0;width: 100%;color: white;">
                    <div
                        style="height: 40px;background-color: #EFBE4A;width: 33.33%;float: left;line-height: 45px;border-bottom: 3px solid #BDA221;">
                        <div style="margin-left: 20px;margin-right: 20px;">
                            <?= $user->UserData($_SESSION['user_id'], 'credits'); ?><div style="float: right;"><img
                                    src="<?= APP_ASSETS; ?>/img/credits.png" style="position: relative;top: 5px;"></div>
                        </div>
                    </div>
                    <div
                        style="height: 40px;background-color: #FFA6C6;width: 33.33%;float: left;line-height: 45px;border-bottom: 3px solid #F7799C;">
                        <div style="margin-left: 20px;margin-right: 20px;">
                            <?= $user->CurrencyData($_SESSION['user_id'], '0'); ?><div style="float: right;"><img
                                    src="<?= APP_ASSETS; ?>/img/duckets.png" style="position: relative;top: 5px;"></div>
                        </div>
                    </div>
                    <div
                        style="height: 40px;background-color: #793F26;width: 33.33%;float: left;line-height: 45px;border-bottom: 3px solid #65321C;">
                        <div style="margin-left: 20px;margin-right: 20px;">
                            <?= $user->ComplementsData($_SESSION['user_id'], 'points'); ?><div style="float: right;">
                                <img src="<?= APP_ASSETS; ?>/img/points.png" style="position: relative;top: 5px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background-color: rgba(0, 0, 0, 0.60);height: 185px;"></div>
            </div>
        </div>

        <div style="width: 352px;margin-bottom: 10px;margin-right: 5px;margin-left: 5px;float: left;">
            <div class="box" style="height: 184px;">
                <div class="content_box">
                    <div style="color: #D64242;margin-bottom:5px;font-size:18px">Dernières mises à jour</div>
                    <div style="border-bottom: 1px solid #D64242;margin-bottom: 10px;"></div>
                    <div
                        style="padding: 10px;background-color: #8DCFF4;color: white;border-radius: 3px;font-size: 16px;">
                        lalala<br />
                        <div style="margin-top:10px;border-bottom: 1px solid #CDCDCD;margin-bottom: 10px;"></div>
                        <i style="color: black;font-size: 15px;color: #E4E4E4">Par Administrateur le
                            15/04/2023</i>
                    </div>
                </div>
            </div>
        </div>

        <div style="width: 588px;margin-right: 5px;margin-left:5px;margin-bottom: 10px;float: left;">
            <div id="slides">
                <?php
				$newsQuery = $db->prepare("SELECT * FROM hbeta_news ORDER BY id DESC LIMIT 5");
				$newsQuery->execute();
				while($news = $newsQuery->fetch(PDO::FETCH_ASSOC)) {
					echo '<div style="position: relative;width: 100%;">';
						echo '<img src="'.$news['background'].'" style="">';
						echo '<div style="position: relative;float: left;top: -285px;left: 25px;color: white;width: 535px;text-shadow: 0 1px 3px #000;font-size: 30px;">';
							echo ''.$news['title'].'<br />';
							echo '<div style="font-size:13px;margin-top: 5px;">'.$news['snippet'].'</div>';
						echo '</div>';
						echo '<div style="position: absolute;float: right;right: 10px;top: 250px;">';
							echo '<a href="'.APP_URL.'/articles/'.$news['id'].'" style="text-decoration: none;">';
								echo '<div class="button green" style="padding: 13px;width: 100px;text-align: center;">Lire la suite</div>';
							echo '</a>';
						echo '</div>';
					echo '</div>';
        		}
        		?>
                <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left"></i></a>
                <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right"></i></a>
            </div>
        </div>
        <script>
        $(function() {
            $('#slides').slidesjs({
                width: 940,
                height: 480,
                navigation: true
            });
        });
        </script>

        <div style="width: 352px;margin-bottom: 10px;margin-right: 5px;margin-left: 5px;float: left;">
            <div class="box">
                <div class="content_box">
                    <div style="color: #1571AF;margin-bottom:5px;font-size:18px">FuturStation (Radio)</div>
                    <?php if($user->ComplementsData($_SESSION['user_id'], 'allow_radio') == 1) : ?>
                    <div style="border-bottom: 1px solid #1571AF;margin-bottom: 10px;"></div>
                    <div
                        style="position: relative;float: left;width: 80px;height: 80px;background: url('<?= APP_ASSETS; ?>/img/futurstation.png');background-position: center;background-size: 80px 80px;line-height: 80px;text-align: center;">
                        <div class="player" style="font-size: 40px;color: white;cursor: pointer;"><i class="fa fa-pause"
                                aria-hidden="true"></i></div>
                    </div>
                    <audio autoplay="autoplay" id="player">
                        <source src="http://futurstationnet.ice.infomaniak.ch/futurstationnet-192.mp3">
                    </audio>
                    <span id="volume_text"
                        style="font-size: 16px;margin-left: 87px;margin-top: 5px;position: absolute;">Volume: 10%</span>
                    <div id="volume_down"
                        style="cursor:pointer;background: url('<?= APP_ASSETS; ?>/img/volume_down.png');height: 40px;width: 40px;background-size: 40px 40px;float: left;margin-top: 39px;margin-left: 10px;margin-right: 10px">
                    </div>
                    <div id="volume_up"
                        style="cursor:pointer;background: url('<?= APP_ASSETS; ?>/img/volume_up.png');height: 40px;width: 40px;background-size: 40px 40px;float: left;margin-top: 39px;">
                    </div>
                    <div style="float: right;">
                        <a href="http://futurstation.net/envoyer-dedicace" target="_blank">
                            <div
                                style="background-color: #1571af;padding: 10px;font-size: 15px;width: 125px;margin-bottom: 5px;text-align: center;color: white;cursor: pointer;">
                                Dédicace</div>
                        </a>
                        <a href="http://FuturStation.net/" target="_blank">
                            <div
                                style="background-color: #1571af;padding: 10px;font-size: 15px;width: 125px;text-align: center;color: white;cursor: pointer;">
                                FuturStation</div>
                        </a>
                    </div>
                    <?php else : ?>
                    <center>Vous avez désactivé à la radio.</center>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if($user->ComplementsData($_SESSION['user_id'], 'allow_radio') == 1) : ?>
        <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById('player').pause();
            document.getElementById('player').play();
            var playing = true;
            var vid = document.getElementById("player");
            vid.volume = 0.1;
            var volume = 10;
            $('#volume_up').click(function() {
                vid.volume = vid.volume + 0.1;
                volume = volume + 10;
                $("#volume_text").html("Volume " + volume + "%");
            });
            $('#volume_down').click(function() {
                vid.volume = vid.volume - 0.1;
                volume = volume - 10;
                $("#volume_text").html("Volume " + volume + "%");
            });
            $('.player').click(function() {
                $(this).toggleClass("down");
                if (playing == false) {
                    document.getElementById('player').play();
                    playing = true;
                    $(this).html('<i class="fa fa-pause" aria-hidden="true">');
                } else {
                    document.getElementById('player').pause();
                    playing = false;
                    $(this).html('<i class="fa fa-play" aria-hidden="true">');
                }
            });
        });
        </script>
        <?php endif; ?>

        <div style="width: 352px;margin-bottom: 10px;margin-right: 5px;margin-left: 5px;float: left;">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bc0f0f;margin-bottom:5px;font-size:18px">Nos réseaux sociaux</div>
                    <div style="border-bottom: 1px solid #bc0f0f;margin-bottom: 10px;"></div>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=<?= SOCIAL_FB_PAGENAME; ?>&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId"
                        width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true"></iframe>
                    <br><br>
                    <div class="section" id="embedded-timelines">
                        <div>
                            <a class="twitter-timeline" href="<?= SOCIAL_TWITTER; ?>" data-width="520"
                                data-height="400"></a>
                        </div>
                    </div>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>

        <?php require_once 'app/templates/Footer.php'; ?>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script>
        jQuery.noConflict();
        </script>
        <script>
        function fade(id) {
            element = document.getElementById(id);
            var op = 1;
            var timer = setInterval(function() {
                if (op <= 0.1) {
                    clearInterval(timer);
                    element.style.display = 'none';
                }
                element.style.opacity = op;
                element.style.filter = 'alpha(opacity=' + op * 100 + ")";
                op -= op * 0.1;
            }, 16);
        }
        </script>
    </div>
</body>

</html>