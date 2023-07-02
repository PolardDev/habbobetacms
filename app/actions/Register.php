<?php
if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
	if(isset($_POST['pseudo'],$_POST['mail'],$_POST['pass'],$_POST['re_pass'],$_POST['captcha'],$_POST['captcha_verif'])) {
		if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['pass']) && !empty($_POST['re_pass']) && !empty($_POST['captcha']) && !empty($_POST['captcha_verif'])) {
			$usernameQuery = $db->prepare("SELECT * FROM users WHERE username = :username");
			$usernameQuery->execute(array(':username' => $habbo->INTorHTML($_POST['pseudo'])));
			if($usernameQuery->rowCount() == 0) {
				if (ctype_alnum($_POST['pseudo']) && strlen($_POST['pseudo']) <= 15) {
					$mailQuery = $db->prepare("SELECT id FROM users WHERE mail = :mail");
					$mailQuery->execute(array(':mail' => $habbo->INTorHTML($_POST['mail'])));
					if ($mailQuery->rowCount() == 0) {
						if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
							if (strlen($_POST['pass']) >= 4) {
								if($_POST['pass'] == $_POST['re_pass']) {
									if($_POST['captcha'] == $_POST['captcha_verif']) {
										$usersQuery = $db->prepare("INSERT INTO users (username, password, mail, account_created, last_online, ip_register, ip_current) VALUES (:username, :password, :mail, :account_created, :last_online, :ip_register, :ip_current)");
										$usersQuery->execute(array('username' => $habbo->INTorHTML($_POST['pseudo']), ':password' => password_hash($_POST['pass'], PASSWORD_BCRYPT), ':mail' => $habbo->INTorHTML($_POST['mail']), ':account_created' => time(), ':last_online' => time(), ':ip_register' => $user->IPAdress(), ':ip_current' => $user->IPAdress()));
										$_SESSION['user_id'] = $db->getLastInsertId();
										$token = $habbo->GenerateText('35');
										$_SESSION['token'] = $token;
										$usersComplementsQuery = $db->prepare("INSERT INTO hbeta_users_complements (user_id, token_session) VALUES (:user_id, :token_session)");
										$usersComplementsQuery->execute(array(':user_id' => $_SESSION['user_id'], ':token_session' => $token));
										$usersCurrencyQuery = $db->prepare("INSERT INTO users_currency (user_id, type, amount) VALUES (:user_id, :type, :amount)");
										$usersCurrencyQuery->execute(array(':user_id' => $_SESSION['user_id'], ':type' => "0", ':amount' => "0"));
										$usersCurrencyQuery = $db->prepare("INSERT INTO users_currency (user_id, type, amount) VALUES (:user_id, :type, :amount)");
										$usersCurrencyQuery->execute(array(':user_id' => $_SESSION['user_id'], ':type' => "5", ':amount' => "0"));
										header('Location: '.APP_URL.'/profil');
										exit();
									} else {
										$erreur = "Le captcha est incorrect.";
									}
								} else {
									$erreur = "Les mots de passe ne correspondent pas.";
								}
							} else {
								$erreur = "Le mot de passe doit contenir plus de 4 caractères.";
							}
						} else {
							$erreur = "Cette adresse e-mail est invalide.";
						}
					} else {
						$erreur = "Cette adresse e-mail est déjà utilisée.";
					}
				} else {
					$erreur = "Ce pseudo est invalide.";
				}
			} else {
				$erreur = "Ce pseudo est déjà pris.";
			}
		} else {
			$erreur = "Merci de remplir tous les champs.";
		}
	}
} else {
	$erreur = "Connectez-vous pour effectuer cette action.";
}
?>