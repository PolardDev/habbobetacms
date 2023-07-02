<?php
if(isset($_POST['formenvoie'],$_POST['comment']))
{
	if(!empty($_POST['comment']))
	{
		$comment = htmlspecialchars($_POST['comment']);
		if(strlen($comment) <= 220)
		{
			$THACT = $bdd->prepare('INSERT INTO hbetacms_articles_comments_theodev (id_article, id_utilisateur, pseudo, commentaire) VALUES (?, ?, ?, ?)');
			$THACT->execute(array($id, $_SESSION['id'], $_SESSION['pseudo'], $comment));
			$erreurok = "Ton commentaire à bien été ajouté.";
		}
		else
		{
			$erreur = "Ton commentaire ne peux pas avoir plus de 120 caractères.";
		}
	}
	else
	{
		$erreur = "Tous les champs n'ont pas été remplis.";
	}
}

if(isset($_POST['deleteform'],$_POST['idcom']))
{
	if(!empty($_POST['idcom']))
	{
		$idcom = intval($_POST['idcom']);
		$THACT = $bdd->prepare('SELECT * FROM hbetacms_articles_comments_theodev WHERE id = ?');
		$THACT->execute(array($idcom));
		if($THACT->rowCount() == 1)
		{
			$DTHACT = $THACT->fetch();
			if($DTHACT['id_utilisateur'] == $_SESSION['id'] || $_SESSION['rank'] >= 4)
			{
				$THACT = $bdd->prepare('DELETE FROM hbetacms_articles_comments_theodev WHERE id = ?');
				$THACT->execute(array($idcom));
				$erreurok = "Le commentaire a bien été supprimé.";
			}
			else
			{
				$erreur = "Ce commentaire ne vous appartient pas.";
			}
		}
		else
		{
			$erreur = "Ce commentaire n'existe pas.";
		}
	}
	else
	{
		$erreur = "Une erreur est survenue.";
	}
}
?>
