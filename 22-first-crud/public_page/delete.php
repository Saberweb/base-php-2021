<?php
// il doit y exister l'id ET il doit être numérique int positif ET ce n'est pas 0
if(isset($_GET['id'])&&ctype_digit($_GET['id'])&&!empty($_GET['id'])){

    // transtypage de string to int
    $idarticle = (int) $_GET['id'];

    // si on a cliqué sur OUI (confirmation de suppression) avec la variable get "ok
    if(isset($_GET['ok'])){
        // préparation requête
        $sql = "DELETE FROM thearticle WHERE idthearticle = $idarticle";
        // exécution de la requête
        mysqli_query($db,$sql) or die("Erreur lors de la suppression : ".mysqli_error($db));

        header("Location: ./?page=admin");
        die();
    }

    // requête dans une variable entre double guillemets
    $sql="SELECT a.idthearticle, a.thearticletitle,
    u.theuserlogin
FROM thearticle a
INNER JOIN  theuser u 
ON u.idtheuser = a.theuser_idtheuser
WHERE a.idthearticle = $idarticle ;";

    // exécution de la requête
    $request = mysqli_query($db,$sql) or die("Erreur de Select : ".mysqli_error($db));

    // on va vérifier si on trouve 1 article. possibilité 1 ou 0 article
    if(mysqli_num_rows($request)){ // on a un article (1 == true)

        // on va mettre l'article en tableau associatif pour pouvoir l'afficher facilement en PHP
        $result = mysqli_fetch_assoc($request);

        // var_dump($result);

    }else{ // sinon (0 == false)

        // redirection vers l'erreur 404
        header("Location: ./?page=erreur404");
        exit; // on quitte pour éviter la lecture de la suite de la page sur certains serveur

    }


// pas de variable id    
}else{
    // redirection
    header("Location: ./");
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First CRUD | Delete Article | <?=$result['thearticletitle']?></title>
</head>
<body>
    <?php
    // menu publique
    include "menu.php";
    ?>
    <h1>First CRUD | Delete Article </h1>
    <h2><?=$result['thearticletitle']?></h2>
    <h5>Ecrit par <?=$result['theuserlogin']?></h5>
    <h2>Voulez-vous vraiment supprimer cet article?</h2>
    <a href="?page=delete&id=<?=$idarticle?>&ok"><button>OUI</button></a> | <button onclick="history.go(-1)">NON</button>
    <hr>
    <?php
    // menu publique
    include "menu.php";
    ?>
</body>
</html>