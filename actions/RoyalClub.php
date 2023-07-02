<?php
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	if(isset($_POST['submit'])) {
		if($user->ComplementsData($_SESSION['user_id'], 'points') >= 60) {
			if($user->UserData($_SESSION['user_id'], 'online') == 0) {
				$usersComplementsQuery = $db->prepare("UPDATE hbeta_users_complements SET points = points - :points WHERE user_id = :user_id");
				$usersComplementsQuery->execute(array(':points' => "60", ':user_id' => $_SESSION['user_id']));
				if($user->UserData($_SESSION['user_id'], 'rank') >= 4) {
					$rank = $user->UserData($_SESSION['user_id'], 'rank');
				} else {
					$rank = 2;
				}
				$usersQuery = $db->prepare("UPDATE users SET credits = credits + :credits, rank = :rank WHERE id = :id");
				$usersQuery->execute(array(':credits' => "3000000", ':rank' => $rank, ':id' => $_SESSION['user_id']));
				$usersCurrencyQuery = $db->prepare("UPDATE users_currency SET amount = amount + :amount WHERE user_id = :user_id AND type = :type");
				$usersCurrencyQuery->execute(array(':amount' => "10000", ':user_id' => $_SESSION['user_id'], ':type' => "0"));
				$usersSettingsQuery = $db->prepare("UPDATE users_settings SET achievement_score = achievement_score + :achievement_score, daily_respect_points = daily_respect_points + :daily_respect_points WHERE user_id = :user_id");
				$usersSettingsQuery->execute(array(':achievement_score' => "3000", ':daily_respect_points' => "100", ':user_id' => $_SESSION['user_id']));
				$badgeIds = [
					"ROYALPLUS", "ROYALPLUS1", "ROYALPLUS2", "ROYALPLUS3", "ROYALPLUS4",
					"ROYALPLUS5", "ROYALPLUS6", "ROYALPLUS7", "ROYALPLUS8", "ROYALPLUS9",
					"ROYALPLUS10", "ROYALPLUS11", "ROYALPLUS12", "ROYALPLUS13", "ROYALPLUS14",
					"ROYALPLUS15", "ROYALPLUS16", "ROYALPLUS17"
				];
				
				$usersBadgesQuery = $db->prepare("INSERT INTO users_badges (user_id, badge_code) VALUES (:user_id, :badge_code)");
				$existingBadgesQuery = $db->prepare("SELECT COUNT(*) FROM users_badges WHERE user_id = :user_id AND badge_code = :badge_code");
				
				foreach ($badgeIds as $badgeId) {
					$existingBadgesQuery->execute(array($_SESSION['id'], $badgeId));
					$count = $existingBadgesQuery->fetchColumn();
				
					if ($count == 0) {
						$usersBadgesQuery->execute(array($_SESSION['id'], $badgeId));
					}
				}
				
				$historyQuery = $db->prepare("INSERT INTO hbeta_history (user_id, body, created_at) VALUES (:user_id, :body, :created_at)");
				$historyQuery->execute(array(':user_id' => $_SESSION['user_id'], ':body' => "Achat du Royal Club (60 points).", ':created_at' => time()));
				$success = "Vous êtes désormais un membre du Royal Club.";
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