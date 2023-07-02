<?php
session_start();

require_once 'app/class/HabboDatabase.php';
require_once 'app/class/HabboUtilies.php';
require_once 'app/class/HabboUser.php';

define('APP_NAME', 'Habbo');
define('APP_URL', 'http://localhost');
define('APP_ASSETS', 'http://localhost/app/assets');
define('APP_AVATAR', 'https://avatar.habbocity.me/?figure=');

define('DP_KEY_PUBLIC', '1670576806512253');
define('DP_KEY_PRIVATE', '1670576806512253');

define('SOCIAL_FB_PAGENAME', 'HabboCityFR');
define('SOCIAL_TWITTER', 'HabboCityFR');