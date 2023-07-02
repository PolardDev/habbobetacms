<?php
require_once 'config.php';

$user->UserisOffline();
$title = "".APP_NAME.": Un endroit étrange avec des personnes incroyables !";
$snippet = "Découvre le nouveau Habbo gratuitement sur ".APP_NAME." ! Crée ton Habbo et fais-toi un max d'amis !";
$pageid = 4;
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
        <div class="w-12">
            <div class="box">
                <div class="content_box">
                    <div style="color: #2767A7;margin-bottom:5px;font-size:18px">Habbo Attitude</div>
                    <div style="border-bottom: 1px solid #2767A7;margin-bottom: 10px;"></div>
                    <style>
                    #habbo-way-content td {
                        text-align: left;
                        margin-top: 70px;
                        width: 210px;
                        font-size: 12px;
                        color: #444;
                        font-weight: 500;
                        padding: 5px 5px 5px 10px;
                    }

                    .wrong {
                        background: transparent url(<?= APP_ASSETS; ?>/img/security/wrong.png) center left no-repeat;
                        padding-left: 22px;
                        padding-top: 5px;
                        height: 18px;
                    }

                    .right {
                        background: transparent url(<?= APP_ASSETS; ?>/img/security/correct.png) center left no-repeat;
                        padding-left: 22px;
                    }
                    </style>
                    <div id="habbo-way-content">
                        <table>
                            <tr>
                                <td>
                                    <h4 class="right">Jouer</h4>
                                    Joue avec tes amis, crée tes jeux, déchire tout et fais plein de rencontres !
                                </td>
                                <td>
                                    <img src="<?= APP_ASSETS; ?>/img/security/page_7.png" alt="" /> <br />
                                </td>
                                <td>
                                    <h4 class="wrong">Tricher</h4>
                                    Les tricheurs ne font jamais long feu. Ils gâchent juste le plaisir des autres.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="right">Tchater</h4>
                                    Parle à tes amis, rencontre des nouveaux joueur's et fais-toi une tonne de nouveaux
                                    potes...et plus!
                                </td>
                                <td>
                                    <img src="<?= APP_ASSETS; ?>/img/security/page_8.png" alt="" /> <br />
                                </td>
                                <td>
                                    <h4 class="wrong">Troller</h4>
                                    Personne n'aime les trolls, même pas leur mère, et personne ne tolère les
                                    agressions.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="right">Trouver ton âme sœur</h4>
                                    Flirte, sors, tombe amoureux et rencontre peut-être ton âme sœur... ou frère...
                                </td>
                                <td>
                                    <img src="<?= APP_ASSETS; ?>/img/security/page_9.png" alt="" /> <br />
                                </td>
                                <td>
                                    <h4 class="wrong">Cyber</h4>
                                    Le cybersexe est strictement interdit, les demandes de webcam entraîneront une
                                    sanction.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="right">Aider</h4>
                                    Aide un inconnu, gagne un ami ! Ou deux, ou trois. Tu ne sais jamais qui tu vas
                                    rencontrer !
                                </td>
                                <td>
                                    <img src="<?= APP_ASSETS; ?>/img/security/page_10.png" alt="" /> <br />
                                </td>
                                <td>
                                    <h4 class="wrong">Piéger</h4>
                                    Profiter des autres Beta's crée généralement un mauvais karma... Et des émeutes.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="right">Créer</h4>
                                    Lâche ta créativité, plus fort qu'Andy Warhol sous caféine ! Dépasse les limites du
                                    style et de la création ! Sois le meilleur !
                                </td>
                                <td>
                                    <img src="<?= APP_ASSETS; ?>/img/security/page_11.png" alt="" /> <br />
                                </td>
                                <td>
                                    <h4 class="wrong">Copier</h4>
                                    Crée, evite de copier.
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'app/templates/Footer.php'; ?>
    </div>
</body>

</html>