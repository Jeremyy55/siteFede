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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="livreOr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


    <div class="jumbotron">
        <h1>Pornhub, ou bien site fédé?</h1>
        <p>
            En voilà, une bonne question.
        </p>
    </div>


    <div class="row">
        <div class="col-sm-3">
            <h1> <strong> Ici il faut mettre un truc de connection</strong> </h1>
        </div>
        <div class="col-sm-6">
            <h1>Site fédé: Livre d'Or</h1>
            <h2> Bienvenue sur le livre d'or officiel du site fédé.</h2>

            <div class ='entreCom'>
                <h2> <strong> Entrez votre annecdote! </strong> </h2>

                <form class="postForm" method="post" action="livreOrController.php">
                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez votre titre" required />
                    <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                    <input type='submit' class='submitButton btn btn-danger' name='forminscription' value="Envoyer" required/>


                </form>



                <?php
                echo'<p>'.date('d/m/Y h:i:s').' </p>';

                $reponses=$bdd->query('SELECT id_anecdote,texte_anecdote,titre_anecdote,date_publication FROM anecdote ORDER BY id_anecdote DESC');

                while($reponse=$reponses->fetch())
                {
                    echo '
                        <div class="commentaire">
                            <h3><strong> '.$reponse['titre_anecdote'].'</strong> </h3>
                            <p>'.$reponse['texte_anecdote'].'</p>
        
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>'.$reponse['date_publication'].'</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6>'.$reponse['id_anecdote'].'</h6>
                                </div>
                            </div>
                        </div>
                    ';
                }


                $reponses->closeCursor();

                ?>



            </div>
        </div>
    </div>






</body>
</html>