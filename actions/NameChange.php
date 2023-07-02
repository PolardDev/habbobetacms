<?php
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	if(isset($_POST['submit'])) {
		if(isset($_POST['username']) && !empty($_POST['username'])) {
			$usernameQuery = $db->prepare("SELECT * FROM users WHERE username = :username");
			$usernameQuery->execute(array(':username' => $habbo->INTorHTML($_POST['username'])));
			if($usernameQuery->rowCount() == 0) {
				if (ctype_alnum($_POST['username']) && strlen($_POST['username']) <= 15) {
					if($user->ComplementsData($_SESSION['user_id'], 'points') >= 90) {
						if($user->UserData($_SESSION['user_id'], 'online') == 0) {
							$usersComplementsQuery = $db->prepare("UPDATE hbeta_users_complements SET points = points - :points WHERE user_id = :user_id");
							$usersComplementsQuery->execute(array(':points' => "90", ':user_id' => $_SESSION['user_id']));
							$usersQuery = $db->prepare("UPDATE users SET username = :username WHERE id = :id");
							$usersQuery->execute(array(':username' => $habbo->INTorHTML($_POST['username']), ':id' => $_SESSION['user_id']));
							$historyQuery = $db->prepare("INSERT INTO hbeta_history (user_id, body, created_at) VALUES (:user_id, :body, :created_at)");
							$historyQuery->execute(array(':user_id' => $_SESSION['user_id'], ':body' => "Changement de pseudo, nouveau pseudo : ".$habbo->INTorHTML($_POST['username']).".", ':created_at' => time()));
							$success = "Votre pseudo a bien été changé, vous pouvez désormais jouer.";
						} else {
							$error = "Vous devez être déconnecté du jeu afin d'effectuer cette action.";
						}
					} else {
						$error = "Vous n'avez pas assez de points.";
					}
				} else {
					$error = "Ce pseudo est invalide.";
				}
			} else {
				$error = "Ce pseudo est déjà pris.";
			}
		} else {
			$error = "Merci d'entrer un pseudo.";
		}
	}
} else {
	$error = "Connectez-vous pour effectuer cette action.";
}
?>