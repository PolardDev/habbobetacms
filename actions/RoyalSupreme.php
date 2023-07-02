<?php
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	if(isset($_POST['submit'])) {
		if($user->ComplementsData($_SESSION['user_id'], 'points') >= 60) {
			if($user->UserData($_SESSION['user_id'], 'online') == 0) {
				$usersComplementsQuery = $db->prepare("UPDATE hbeta_users_complements SET points = points - :points WHERE user_id = :user_id");
				$usersComplementsQuery->execute(array(':points' => "90", ':user_id' => $_SESSION['user_id']));
				if($user->UserData($_SESSION['user_id'], 'rank') >= 4) {
					$rank = $user->UserData($_SESSION['user_id'], 'rank');
				} else {
					$rank = 3;
				}
				$usersQuery = $db->prepare("UPDATE users SET credits = credits + :credits, rank = :rank WHERE id = :id");
				$usersQuery->execute(array(':credits' => "6000000", ':rank' => $rank, ':id' => $_SESSION['user_id']));
				$usersCurrencyQuery = $db->prepare("UPDATE users_currency SET amount = amount + :amount WHERE user_id = :user_id AND type = :type");
				$usersCurrencyQuery->execute(array(':amount' => "50000", ':user_id' => $_SESSION['user_id'], ':type' => "0"));
				$usersSettingsQuery = $db->prepare("UPDATE users_settings SET achievement_score = achievement_score + :achievement_score, daily_respect_points = daily_respect_points + :daily_respect_points WHERE user_id = :user_id");
				$usersSettingsQuery->execute(array(':achievement_score' => "3000", ':daily_respect_points' => "100", ':user_id' => $_SESSION['user_id']));
				$badgeIds = [
					"SUPREME1", "SUPREME2", "SUPREME3", "SUPREME4", "SUPREME5",
					"SUPREME6", "SUPREME7", "SUPREME8", "SUPREME9", "SUPREME10",
					"SUPREME11", "SUPREME12", "SUPREME13", "SUPREME14", "SUPREME15",
					"SUPREME16", "SUPREME17", "SUPREME18", "SUPREME19", "SUPREME20",
					"SUPREME21", "SUPREME22", "SUPREME23", "SUPREME24", "SUPREME25",
					"SUPREME26", "SUPREME27", "SUPREME28", "SUPREME29", "SUPREME30",
					"SUPREME31", "SUPREME32", "SUPREME33", "SUPREME34", "SUPREME35",
					"SUPREME36", "SUPREME37", "SUPREME38"
				];
				$usersBadgesQuery = $bdd->prepare("INSERT INTO users_badges (user_id, badge_code) VALUES (:user_id, :badge_code)");
				$existingBadgesQuery = $bdd->prepare("SELECT COUNT(*) FROM users_badges WHERE user_id = :user_id AND badge_code = :badge_code");

				foreach ($badgeIds as $code) {
					$existingBadgesQuery->execute(array(':user_id' => $_SESSION['id'], ':badge_code' => $code));
					$count = $existingBadgesQuery->fetchColumn();

					if ($count == 0) {
						$usersBadgesQuery->execute(array(':user_id' => $_SESSION['id'], ':badge_code' => $code));
					}
				}
				$historyQuery = $db->prepare("INSERT INTO hbeta_history (user_id, body, created_at) VALUES (:user_id, :body, :created_at)");
				$historyQuery->execute(array(':user_id' => $_SESSION['user_id'], ':body' => "Achat du Royal Supreme (90 points).", ':created_at' => time()));
				$success = "Vous êtes désormais un membre du Royal Supreme.";
			} else {
				$error = "Vous devez être déconnecté du jeu afin d'effectuer cette action.";
			}
		} else {
			$error = "Vous n'avez pas assez de points.";
		}
	}
} else {
	$error = "Connectez-vous pour effectuer cette action.";
}
?>