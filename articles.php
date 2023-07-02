<?php
require_once 'config.php';
$user->UserisOffline();
$pageid = 2;

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $newsQuery = $db->prepare("SELECT * FROM hbeta_news WHERE id = :id");
	$newsQuery->execute(array(':id' => $habbo->INTorHTML($_GET['id'])));
    if($newsQuery->rowCount() == 1) {
        $news = $newsQuery->fetch(PDO::FETCH_ASSOC);
        $title = "".$news['title'];
        $snippet = "".$news['snippet'];
    } else {
        header('Location: /profil');
        exit();
    }
} else {
    header('Location: /profil');
    exit();
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
        <script type="text/javascript">
        function reste(texte) {
            var restants = 220 - texte.length;
            document.getElementById('caracteres').innerHTML = restants;
        }
        </script>

        <div class="w-2">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bc0f0f;margin-bottom:5px;font-size:18px">Choisis un article</div>
                    <div style="border-bottom: 1px solid #bc0f0f;margin-bottom: 10px;"></div>
                    <b>Aujourd'hui</b><br />
                    <hr>
                    <?php
					$today = strtotime('today midnight');
					$newsDQuery = $db->prepare('SELECT * FROM hbeta_news WHERE created_at >= :created_at ORDER BY id DESC');
					$newsDQuery->execute(array(':created_at' => $today));
					while($newsD = $newsDQuery->fetch(PDO::FETCH_ASSOC)) {
                        if($newsD['id'] == $news['id']) {
                            echo '<a style="font-size:13px;font-weight:bold;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        } else {
                            echo '<a href="'.APP_URL.'/articles/'.$newsD['id'].'" style="font-size:13px;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        }
                    }
					?>
                    <br />
                    <b>Hier</b><br />
                    <hr>
                    <?php
					$yesterday_midnight = strtotime('yesterday midnight');
					$newsDQuery = $db->prepare('SELECT * FROM hbeta_news WHERE created_at >= :created_at ORDER BY id DESC');
					$newsDQuery->execute(array(':created_at' => $yesterday_midnight));
					while($newsD = $newsDQuery->fetch(PDO::FETCH_ASSOC)) {
                        if($newsD['id'] == $news['id']) {
                            echo '<a style="font-size:13px;font-weight:bold;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        } else {
                            echo '<a href="'.APP_URL.'/articles/'.$newsD['id'].'" style="font-size:13px;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        }
                    }
					?>
                    <br />
                    <b>Cette semaine</b><br />
                    <hr>
                    <?php
					$start_of_week = strtotime('monday this week midnight');
                    $start_of_next_week = strtotime('monday next week midnight');
					$newsDQuery = $db->prepare('SELECT * FROM hbeta_news WHERE created_at >= :created_at AND created_at <= :created_at2 ORDER BY id DESC');
					$newsDQuery->execute(array(':created_at' => $start_of_week, ':created_at2' => $start_of_next_week));
					while($newsD = $newsDQuery->fetch(PDO::FETCH_ASSOC)) {
                        if($newsD['id'] == $news['id']) {
                            echo '<a style="font-size:13px;font-weight:bold;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        } else {
                            echo '<a href="'.APP_URL.'/articles/'.$newsD['id'].'" style="font-size:13px;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        }
                    }
					?>
                    <br />
                    <b>La semaine derni&egrave;re</b><br />
                    <hr>
                    <?php
					$start_of_last_week = strtotime('monday last week midnight');
                    $start_of_current_week = strtotime('monday this week midnight');
					$newsDQuery = $db->prepare('SELECT * FROM hbeta_news WHERE created_at >= :created_at AND created_at <= :created_at2 ORDER BY id DESC');
					$newsDQuery->execute(array(':created_at' => $start_of_last_week, ':created_at2' => $start_of_current_week));
					while($newsD = $newsDQuery->fetch(PDO::FETCH_ASSOC)) {
                        if($newsD['id'] == $news['id']) {
                            echo '<a style="font-size:13px;font-weight:bold;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        } else {
                            echo '<a href="'.APP_URL.'/articles/'.$newsD['id'].'" style="font-size:13px;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        }
                    }
					?>
                    <br />
                    <b>Ce mois-ci</b><br />
                    <hr>
                    <?php
					$start_of_month = strtotime('first day of this month midnight');
                    $end_of_month = strtotime('last day of this month 23:59:59');
					$newsDQuery = $db->prepare('SELECT * FROM hbeta_news WHERE created_at >= :created_at AND created_at <= :created_at2 ORDER BY id DESC');
					$newsDQuery->execute(array(':created_at' => $start_of_month, ':created_at2' => $end_of_month));
					while($newsD = $newsDQuery->fetch(PDO::FETCH_ASSOC)) {
                        if($newsD['id'] == $news['id']) {
                            echo '<a style="font-size:13px;font-weight:bold;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        } else {
                            echo '<a href="'.APP_URL.'/articles/'.$newsD['id'].'" style="font-size:13px;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        }
                    }
					?>
                    <br />
                    <b>Le mois dernier</b><br />
                    <hr>
                    <?php
					$start_of_last_month = strtotime('first day of last month midnight');
                    $end_of_last_month = strtotime('last day of last month 23:59:59');
					$newsDQuery = $db->prepare('SELECT * FROM hbeta_news WHERE created_at >= :created_at AND created_at <= :created_at2 ORDER BY id DESC');
					$newsDQuery->execute(array(':created_at' => $start_of_last_month, ':created_at2' => $end_of_last_month));
					while($newsD = $newsDQuery->fetch(PDO::FETCH_ASSOC)) {
                        if($newsD['id'] == $news['id']) {
                            echo '<a style="font-size:13px;font-weight:bold;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        } else {
                            echo '<a href="'.APP_URL.'/articles/'.$newsD['id'].'" style="font-size:13px;">'.$news['title'].'&nbsp;&raquo;</a><br />';
                        }
                    }
					?>
                </div>
            </div>
        </div>

        <div class="w-10">
            <div class="box">
                <div class="content_box">
                    <div style="color: #0f7cbc;margin-bottom:5px;font-size:18px">La news</div>
                    <div style="border-bottom: 1px solid #0f7cbc;margin-bottom: 10px;"></div>
                    <div
                        style="background-image: url('<?= $news['background']; ?>');background-repeat: no-repeat;position: relative;background-position: 100%;height: 150px;width: 100%;margin-bottom: 10px;">
                    </div>
                    <div style="font-weight: bold;"><?= $news['title']; ?></div>
                    <div style="position: relative;float: right;right: 5px;color: grey;font-size: 17px;top: -10px;">
                        <?= date('d/m/Y', $news['created_at']); ?></div>
                    <div style="color: #808080;font-size: 15px;width: 85%;">
                        <?= $news['snippet']; ?></div>
                    <div
                        style="height: 1px;width: 100%;background-color: #e4e4e4;margin-top: 10px;margin-bottom: 10px;">
                    </div>
                    <?= html_entity_decode($news['body']); ?>
                </div>
            </div>
        </div>

        <div class="w-10" style="float: right;">
            <div class="box">
                <div class="content_box">
                    <div style="color: #bc0f6f;margin-bottom:5px;font-size:18px">Les commentaires</div>
                    <div style="border-bottom: 1px solid #bc0f6f;margin-bottom: 10px;"></div>
                    <?php if(isset($erreur)) : ?>
                    <div class="msg" style="background-color: #cc2727;padding: 10px;width: 97.2%;">
                        <?= $erreur; ?></div>
                    <?php endif; ?>
                    <?php if(isset($success)) : ?>
                    <div class="msg" style="background-color: #20820f;padding: 10px;width: 97.2%;">
                        <?= $success; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <textarea id="comments" name="comment" maxlength="220" onkeyup="reste(this.value);"
                            placeholder="Exprimez-vous"
                            style="margin: 0px;width: 540px;height: 100px;font-family: 'Roboto', sans-serif;font-size: 14px;resize: none;"></textarea><br>
                        <div class="action">
                            <button type="submit" name="formenvoie" class="button green">Envoyer le commentaire</button>
                        </div>
                    </form>
                    <div
                        style="position: relative;float: right;margin-top: -140px;right: 5px;width: 155px;height: 110px;">
                        <center>
                            <h1 style="font-size: 50px;margin-top: 0;color: #069;" id="caracteres">220</h1>
                            <p style="margin-top: -40px;margin-left: -3px;margin-bottom: -10px;font-size: 14px;">
                                caractères restants avant<br />d'atteindre la limitation</p>
                        </center>
                    </div>
                    <div
                        style="height: 1px;width: 100%;background-color: #e4e4e4;margin-top: 10px;margin-bottom: 10px;">
                    </div>
                    <table
                        style="padding: 5px;background-color: #F3F3F3;width: 100%;word-break: break-all;margin-bottom: 10px;">
                        <tbody>
                            <?php
                            $newsCommentsQuery = $db->prepare("SELECT * FROM hbeta_news_comments WHERE news_id = :news_id");
                            $newsCommentsQuery->execute(array(':news_id' => $news['id']));
                            while($newsComments = $newsCommentsQuery->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                    echo '<td valign="middle" width="25">';
                                        echo '<div style="width: 64px; height: 70px; margin-bottom:3px; margin-top:-21px; margin-right:20px;margin-left:-10px; float: right; background: url('. APP_AVATAR.''.$user->UserData($newsComments['user_id'], 'look').'&amp;direction=2&amp;head_direction=3&amp;gesture=sml&amp;size=big&amp;img_format=gif);"></div>';
                                    echo '</td>';
                                    echo '<td valign="top">';
                                        echo '<a style="text-decoration: none;cursor:pointer;font-weight: bold;font-size: 14px;">'.$user->UserData($newsComments['user_id'], 'username').'</a>:';
                                        if($_SESSION['user_id'] == $newsComments['user_id'] or $user->UserData($newsComments['user_id'], 'rank') >= 4) {
                                            echo '<form method="post">';
                                                echo '<input type="hidden" name="idcom" value="'.$newsComments['id'].'">';
                                                echo '<button type="submit" name="deleteform" style="border: none;color: red;cursor: pointer;font-size: 12px;font-weight: bold;float: right;margin-top: -15px;background-color: transparent;">x</button>';
                                            echo '</form>';
                                        }
                                        echo '<div style="overflow: hidden;word-break: break-word;font-size: 13px;margin-top: 5px;color:grey;">'.$newsComments['body'].'</div>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>