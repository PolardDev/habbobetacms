<noscript>
    <div style="text-align: center;font-size: 16px;background: #D04336;color: #fff;padding: 0 10px;line-height: 40px;">
        Merci d'activer le Javascript sur votre navigateur afin d'utiliser l'intégralité des fonctionnalités du site !
    </div>
</noscript>
<?php if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) : ?>
<div
    style="text-align: center;font-size: 16px;background: #268612;border-bottom: 1px solid green;color: #fff;padding: 0 10px;line-height: 40px;">
    Le royal suprème est désormais disponible sur <?= APP_NAME; ?></br>
</div>
<?php endif; ?>
<header>
    <div class="millieu">
        <a href="<?= APP_URL; ?>/connexion">
            <div class="logo"><img src="<?= APP_ASSETS; ?>/img/logo.png" style="margin-top: -7px;"></div>
        </a>
        <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) : ?>
        <div class="topright">
            <a href="<?= APP_URL; ?>/preference/1">
                <div class="topaccount">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </div>
            </a>
            <a href="<?= APP_URL; ?>/logout">
                <div class="toplogout">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <strong>
            <a style="color:rgba(100,100,100,0); font-size:1px;">beta ,rabbo, bobbalive, bobba, hbc, hcity, habbo-city,
                theocms, hbetacms, habbo, HABBO, habbo hotel, forum, forum habbo, enable, tutoriel, staff, devenir
                staff, devenir staff gratuitement habbo, handitem, badge habbo, enables, inscription habbo, inscription,
                habboo, retro habbo, rétro habbo, serveur habbo, retro, habbo retro gratuit, autre habbo, habbo autre,
                habbo retro qui marche bien, jeu comme habbo, jeux comme habbo, site comme habbo, habbo site, serveur
                privé habbo, bobba, bobbah hotel, bobbahotel, bobba hotel, bobba-hotel, jabbo, jabbo hotel, jabbonow,
                jabbohotel, jabborp, habbo-alpha, habbo alpha, habboalpha, habbolove, habbo-love, habbo love, hlove,
                habbolove inscription, habbo-dreams, habbo dreams, habbo dream, habbo-dreams, acheter sur habbocms.com,
                cola-hotel, cola hotel, bobbaworld, bobba-world, world, worldhabbo, world-habbo, habbiworld, abbo,
                habbi,
                abboz, habboz, habbo gratuit, habbo credit, habbo hotel, habbo hotel gratuit, jouer a habbo
                gratuitement,
                habbo retro, recrutement staff, recrutement, mmorpg, vip, animateur, animation, jeu du celib, clack ou
                smack, staff, rencontre, celibataire, casino, rares, magots, enable, boutique, fifa, foot, cheval,
                chevaux, piscine, crédits gratuits, crédit gratuit, staff club, virtuel, monde, réseau social, gratuit,
                communauté, avatar, chat, connecté, adolescence, jeu de rôle, rejoindre, social, groupes, forums, jouer,
                jeux, amis, ados, jeunes, collector, créer, connecter, meuble, mobilier, animaux, déco, design, appart,
                décorer, partager, création, badges, musique, célébrité, chat vip, fun, sortir, mmo, chat, youtube,
                facebook, twitter, habbo en gratuit</a>
        </strong>
    </div>
</header>
<ul class="navigation1">
    <div class="millieu">
        <?php if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) : ?>
        <?php if(isset($page) && !empty($page)) : ?>
        <a href="<?= APP_URL; ?>/connexion">
            <li class="nav1" <?php if(isset($page) && $page == "login") : ?>
                style="border-left: 1px solid #E7E7E7;border-top: 3px solid #3b968e;margin-left:-20px;" <?php else : ?>
                style="border-left: 1px solid #E7E7E7;padding-top: 13px;margin-left:-20px;" <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/home.png" <?php if(isset($page) && $page == "login") : ?>class=""
                    <?php else : ?>class="opac" <?php endif; ?>>
            </li>
        </a>

        <a href="<?= APP_URL; ?>/connexion?p=inscription">
            <li class="nav1"
                <?php if(isset($page) && $page == "register") : ?>style="border-top: 3px solid #3b968e;padding-top: 11px;"
                <?php else : ?>style="padding-top: 14px;" <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/community.png"
                    <?php if(isset($page) && $page == "register") : ?>class="" <?php else : ?>class="opac"
                    <?php endif; ?>>
            </li>
        </a>

        <a href="<?= APP_URL; ?>/connexion?p=forgot">
            <li class="nav1"
                <?php if(isset($page) && $page == "forgot") : ?>style="border-top: 3px solid #3b968e;padding-top: 6px;"
                <?php else : ?>style="padding-top: 8px;" <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/forgot.png"
                    <?php if(isset($page) && $page == "forgot") : ?>class="" <?php else : ?>class="opac"
                    <?php endif; ?>>
            </li>
        </a>
        <?php endif; ?>
        <?php else : ?>

        <?php if(isset($pageid) && !empty($pageid)) : ?>
        <a href="<?= APP_URL; ?>/profil">
            <li class="nav1"
                <?php if($pageid == 1) : ?>style="border-left: 1px solid #E7E7E7;border-top: 3px solid #3b968e;margin-left:-20px;"
                class="" <?php else : ?>style="border-left: 1px solid #E7E7E7;padding-top: 15px;margin-left:-20px;"
                <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/home.png" <?php if($pageid == 1) : ?>class=""
                    <?php else : ?>class="opac" <?php endif; ?>>
            </li>
        </a>

        <a href="<?= APP_URL; ?>/articles">
            <li class="nav1" <?php if($pageid == 2) : ?>style="border-top: 3px solid #3b968e;padding-top: 11px;"
                <?php else : ?>style="padding-top: 14px;" <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/community.png" <?php if($pageid == 2) : ?>class=""
                    <?php else : ?>class="opac" <?php endif; ?>>
                <ul style="margin-top: 15px;">
                    <a href="<?= APP_URL; ?>/articles">
                        <li class="nav2">Les articles</li>
                    </a>
                    <a href="<?= APP_URL; ?>/equipe">
                        <li class="nav2">L'équipe</li>
                    </a>
                    <a href="<?= APP_URL; ?>/sitefan">
                        <li class="nav2">Sitefan & RPG</li>
                    </a>
                </ul>
            </li>
        </a>

        <a href="<?= APP_URL; ?>/palmares">
            <li class="nav1" <?php if($pageid == 3) : ?>style="padding-top: 11px;border-top: 3px solid #3b968e;"
                <?php else : ?>style="padding-top: 14px;" <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/palmares.png" <?php if($pageid == 3) : ?>class=""
                    <?php else : ?>class="opac" <?php endif; ?>>
                <ul style="margin-top: 12px;">
                    <a href="<?= APP_URL; ?>/palmares">
                        <li class="nav2">Palmarès par richesse</li>
                    </a>
                    <a href="<?= APP_URL; ?>/palmares2">
                        <li class="nav2">Palmarès par popularité</li>
                    </a>
                    <a href="<?= APP_URL; ?>/monpalmares">
                        <li class="nav2">Mon palmarès</li>
                    </a>
                </ul>
            </li>
        </a>

        <a href="<?= APP_URL; ?>/security">
            <li class="nav1" <?php if($pageid == 4) : ?>style="padding-top: 11px;border-top: 3px solid #3b968e;"
                <?php else : ?>style="padding-top: 14px;" <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/forgot.png" style="margin-top: -5px;"
                    <?php if($pageid == 4) : ?>class="" <?php else : ?>class="opac" <?php endif; ?>>
                <ul style="margin-top: 4px;">
                    <a href="<?= APP_URL; ?>/security">
                        <li class="nav2">Les conseils sécuritaires</li>
                    </a>
                    <a href="<?= APP_URL; ?>/security2">
                        <li class="nav2"><?= APP_NAME; ?> Attitude</li>
                    </a>
                </ul>
            </li>
        </a>

        <a href="<?= APP_URL; ?>/boutique">
            <li class="nav1" <?php if($pageid == 5) : ?>style="padding-top: 12px;border-top: 3px solid #3b968e;"
                <?php else : ?>style="padding-top: 15px;" <?php endif; ?>>
                <img src="<?= APP_ASSETS; ?>/img/icon/boutique.png" <?php if($pageid == 5) : ?>class=""
                    <?php else : ?>class="opac" <?php endif; ?>>
                <ul style="width: 245px;margin-top: 8px;">
                    <a href="<?= APP_URL; ?>/boutique">
                        <li class="nav2">Acheter des points</li>
                    </a>
                    <a href="<?= APP_URL; ?>/badges">
                        <li class="nav2">Acheter des badges</li>
                    </a>
                    <a href="<?= APP_URL; ?>/pseudo">
                        <li class="nav2">Changer de pseudo</li>
                    </a>
                    <a href="<?= APP_URL; ?>/royal">
                        <li class="nav2">Adhérer au Royal Club</li>
                    </a>
                    <a href="<?= APP_URL; ?>/royalsupreme">
                        <li class="nav2">Adhérer au Royal Suprème </li>
                    </a>
                    <a href="<?= APP_URL; ?>/transactions">
                        <li class="nav2">Mes transactions</li>
                    </a>
                </ul>
            </li>
        </a>
        <?php endif; ?>

        <a href="<?= APP_URL; ?>/hotel" target="_blank">
            <div class="button green"
                style="text-align: center;float: right;margin-right: 20px;padding: 20px;margin-top: 7px;border-radius: 4px;font-size: 17px;box-shadow: rgba(0,0,0,0.298039) 1px 0px 0px, rgba(0,0,0,0.298039) -1px 4px 0px;">
                Entrer sur <?= APP_NAME; ?></div>
        </a>
        <?php endif; ?>
    </div>
</ul>