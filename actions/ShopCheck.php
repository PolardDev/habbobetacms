<?php
require_once('../../configurations.php');

if(!isset($_SESSION['id']))
{
  header('Location: '.url.'/connexion');
  exit();
}

$code = isset($_POST['code']) ? preg_replace('/[^a-zA-Z0-9]+/', '', $_POST['code']) : '';
if(isset($code) AND empty($code))
{
  echo 'Vous devez saisir un code';
}
else
{
  $dedipass = file_get_contents('http://api.dedipass.com/v1/pay/?public_key='.app_dedipass_p.'&private_key='.app_dedipass_s.'&code='.$code);
  $dedipass = json_decode($dedipass); 
  if($dedipass->status == 'success')
  {
    $TU = $bdd->prepare('UPDATE users SET vip_points = vip_points + ? WHERE id = ?');
    $TU->execute(array($THT['number_points'], $_SESSION['id']));
    $HLBT = $bdd->prepare('INSERT INTO hbetacms_logs_boutique_theodev (id_utilisateur, message, date) VALUES (?, ?, ?)');
    $HLBT->execute(array($_SESSION['id'], "Achat de ".$THT['number_points']." points.", time()));
    $_SESSION['achat'] = "valide";
    header('Location: '.url.'/boutique');
    exit();
  }
  else
  {
    $_SESSION['achat'] = "nonvalide";
    header('Location: '.url.'/boutique');
    exit();
  }
}
?>