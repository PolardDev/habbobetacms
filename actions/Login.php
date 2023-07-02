<?php
require_once '../../config.php';

if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
	if(isset($_POST['pseudo'],$_POST['pass']) && !empty($_POST['pseudo']) && !empty($_POST['pass'])) {
		$usersQuery = $db->prepare("SELECT * FROM users WHERE username = :username");
		$usersQuery->execute(array(':username' => $habbo->INTorHTML($_POST['pseudo'])));
		if($usersQuery->rowCount() == 1) {
			$users = $usersQuery->fetch(PDO::FETCH_ASSOC);
			if(password_verify($_POST['pass'], $users['password'])) {
				$bansQuery = $db->prepare('SELECT id FROM bans WHERE user_id = :user_id AND ban_expire >= :ban_expire');
				$bansQuery->execute(array(':user_id' => $users['id'], ':ban_expire' => time()));
				if ($bansQuery->rowCount() == 0) {
					$_SESSION['user_id'] = $users['id'];
					$token = $habbo->GenerateText('35');
					$_SESSION['token'] = $token;
					$usersComplementsQuery = $db->prepare("UPDATE hbeta_users_complements SET token_session = :token_session WHERE user_id = :user_id");
					$usersComplementsQuery->execute(array(':token_session' => $token, ':user_id' => $_SESSION['user_id']));
					$usersQuery = $db->prepare("UPDATE users SET ip_current = :ip_current, last_online = :last_online WHERE id = :id");
					$usersQuery->execute(array(':ip_current' => $_SERVER['REMOTE_ADDR'], ':last_online' => time(), ':id' => $_SESSION['user_id']));
					echo 'ok';
				} else {
					echo 'Vous avez été banni(e) de '.APP_NAME;
				}
			} else {
				echo 'Les identifiants sont incorrects.';
			}
		} else {
			echo 'Les identifiants sont incorrects.';
		}
	} else {
		echo 'Merci de remplir les champs vides.';
	}
} else {
	echo 'Déconnectez-vous pour effectuer cette action.';
}
?>