<?php
/**
 * Created by PhpStorm.
 * User: namah
 * Date: 30/10/17
 * Time: 20:25
 */

try{
    $bdd=new PDO('mysql:host=localhost;dbname=siteFedeFPMS;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die(' Erreur: '.$e->getMessage());
}
$commentaire=htmlspecialchars($_POST['comment']);
$titre=htmlspecialchars($_POST['titre']);
$id='1';
$req = $bdd->prepare('INSERT INTO `anecdote` (`texte_anecdote`, `date_publication`, `id_utilisateur`, `titre_anecdote`) VALUES (?,NOW(),?, ?)');
//INSERT INTO `anecdote` (`id_anecdote`, `texte_anecdote`, `date_publication`, `id_utilisateur`, `titre_anecdote`) VALUES (NULL, 'yoloooooooohahahahahahananananananaoapapapapajdhdhddhdhzzsjxja,ia', '2017-12-14 00:00:00', '1', 'Devine quoi ? ');

$req->execute(array($commentaire,$id,$titre));

header('Location:livreOr.php');


//$req = $bdd->prepare('INSERT INTO `anecdote` (`id_anecdote`, `texte_anecdote`, `date_publication`, `id_utilisateur`) VALUES (NULL,"yolo3000//", \'2017-12-22\', \'1\'); ');

//$req->execute(array($_POST['pseudo'], $_POST['message']));

?>