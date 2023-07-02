<?php
if(isset($_POST['form1'])) {
	if($_POST['block_following'] != "" && $_POST['can_trade'] != "" && $_POST['block_friendrequests'] != "" && $_POST['allow_radio'] != "") {
		if(ctype_digit($_POST['block_following']) && ctype_digit($_POST['can_trade']) && ctype_digit($_POST['block_friendrequests']) && ctype_digit($_POST['allow_radio'])) {
			$usersComplementsQuery = $db->prepare("UPDATE hbeta_users_complements SET allow_radio = :allow_radio WHERE user_id = :user_id");
			$usersComplementsQuery->execute(array(':allow_radio' => $habbo->INTorHTML($_POST['allow_radio']), ':user_id' => $_SESSION['user_id']));
			$usersSettingsQuery = $db->prepare("UPDATE users_settings SET block_following = :block_following, can_trade = :can_trade, block_friendrequests = :block_friendrequests WHERE user_id = :user_id");
				$usersSettingsQuery->execute(array(':block_following' => $habbo->INTorHTML($_POST['block_following']), ':can_trade' => $habbo->INTorHTML($_POST['can_trade']), ':block_friendrequests' => $habbo->INTorHTML($_POST['block_friendrequests']), ':user_id' => $_SESSION['user_id']));
			$success = "Vos paramètres ont bien été pris en compte.";
		} else {
			$error = "Une erreur est survenue.";
		}
	} else {
		$error = "Merci de remplir les champs vides.";
	}
}

if(isset($_POST['form2'])) {
	if(!empty($_POST['mail1']) && !empty($_POST['mail2']) && !empty($_POST['mail3'])) {
		if($_POST['mail1'] == $user->UserData($_SESSION['user_id'], 'mail')) {
			$mailQuery = $db->prepare("SELECT id FROM users WHERE mail = :mail");
			$mailQuery->execute(array(':mail' => $habbo->INTorHTML($_POST['mail2'])));
			if ($mailQuery->rowCount() == 0) {
				if (filter_var($_POST['mail2'], FILTER_VALIDATE_EMAIL)) {
	                if($_POST['mail2'] == $_POST['mail3']) {
						$usersQuery = $db->prepare("UPDATE users SET mail = :mail WHERE id = :id");
						$usersQuery->execute(array(':mail' => $habbo->INTorHTML($_POST['mail2']), ':id' => $_SESSION['user_id']));
	                	$success = "Votre adresse e-mail a bien été modifiée.";
	                } else {
	                	$error = "Les adresses e-mail ne correspondent pas.";
	                }
	            } else {
	                $error = "Cette adresse e-mail est invalide.";
	            }
	        } else {
	            $error = "Cette adresse e-mail est déjà utilisée.";
			}
	    } else {
			$error = "Une erreur est survenue.";
		}
	} else {
		$error = "Merci de remplir les champs vides.";
	}
}

if(isset($_POST['form3'])) {
	if(!empty($_POST['pass1']) && !empty($_POST['pass2']) && !empty($_POST['pass3'])) {
		if(password_verify($_POST['pass1'], $user->UserData($_SESSION['user_id'], 'password'))) {
			if(strlen($_POST['pass2']) >= 4 AND strlen($_POST['pass3']) >= 4) {
				if($_POST['pass2'] == $_POST['pass3']) {
					$usersQuery = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
					$usersQuery->execute(array(':password' => password_hash($_POST['pass2'], PASSWORD_BCRYPT), ':id' => $_SESSION['user_id']));
					$success = "Votre mot de passe a bien été changé, déconnexion de votre compte en cours..";
					header('Refresh: 3;url='.APP_URL.'/logout');
				} else {
					$error = "Les mots de passe ne correspondent pas.";
				}
			} else {
				$error = "Le mot de passe doit contenir plus de 4 caractères.";
			}
		} else {
			$error = "Le mot de passe actuel est incorrect.";
		}
	} else {
		$error = "Merci de remplir les champs vides.";
	}
}
?>