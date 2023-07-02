<?php
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	if(isset($_POST['submit'],$_POST['badge_code']) && empty($_POST['badge_code'])) {
		$badgesQuery = $db->prepare("SELECT * FROM hbeta_badges WHERE badge_code = :badge_code");
		$badgesQuery->execute(array(':badge_code' => $habbo->INTorHTML($_POST['badge_code'])));
		if($badgesQuery->rowCount() == 1) {
			$badges = $badgesQuery->fetch(PDO::FETCH_ASSOC);
			if($user->ComplementsData($_SESSION['user_id'], 'points') >= $badges['points']) {
				$usersBadgesQuery = $db->prepare("SELECT * FROM users_badges WHERE user_id = :user_id AND badge_code = :badge_code");
				$usersBadgesQuery->execute(array(':user_id' => $_SESSION['user_id'], ':badge_code' => $badges['badge_code']));
				if($usersBadgesQuery->rowCount() == 0) {
					$usersComplementsQuery = $db->prepare("UPDATE hbeta_users_complements SET points = points - :points WHERE user_id = :user_id");
					$usersComplementsQuery->execute(array(':points' => $badges['points'], ':user_id' => $_SESSION['user_id']));
					$usersBadgesInsertQuery = $db->prepare("INSERT INTO users_badges (user_id, badge_code) VALUES (:user_id, :badge_code)");
					$usersBadgesInsertQuery->execute(array(':user_id' => $_SESSION['user_id'], ':badge_code' => $badges['badge_code']));
					$historyQuery = $db->prepare("INSERT INTO hbeta_history (user_id, body, created_at) VALUES (:user_id, :body, :created_at)");
					$historyQuery->execute(array(':user_id' => $_SESSION['user_id'], ':body' => "Achat du badge (".$badges['badge_code'].").", ':created_at' => time()));
					$success = "Le badge a bien été ajouté à votre inventaire.";
				} else {
					$error = "Vous possédez déjà ce badge.";
				}
			} else {
				$error = "Vous n'avez pas assez de points.";
			}
		} else {
			$error = "Ce badge n'est pas en vente.";
		}	
	}
} else {
	$error = "Connectez-vous pour effectuer cette action.";
}
?>