<?php
/*
<<<<<<< HEAD
Page d'accueil, doit passer par index.php (CF)
*/

// on va récupérer tous les articles avec le texte à maximum 220 caractères, avec l'utilisateur qui l'a écrit ,si il éxiste .c'est donc une jointure externe (voir datas/crud01-requests-test.sql)

$sql="SELECT a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,250) AS thearticletext, a.thearticledate,
=======
Page d'accueil de l'admin, doit passer par index.php (CF)
*/

// on va récupérer tous les articles avec le texte à maximum 120 caractères, avec l'utilisateur qui l'a écrit, si il existe. C'est donc une jointure externe -> FROM thearticle LEFT JOIN theuser
$sql="SELECT a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,60) AS thearticletext, a.thearticledate,
>>>>>>> 20ee4091a6285d9120d587c8163126ff0a2d558e
             u.idtheuser, u.theuserlogin
    FROM thearticle a
        LEFT JOIN  theuser u 
            ON u.idtheuser = a.theuser_idtheuser
            -- WHERE a.idthearticle=3
    ORDER BY a.thearticledate DESC;";

// on effectue la requête
$recup = mysqli_query($db,$sql) or die("Erreur lors de la requête :".mysqli_error($db));

// on va vérifier si on au moins un article (on compte le nombre de lignes de résultats)
$nbArticle = mysqli_num_rows($recup);

// si le résultat est vide ($nbArticle===0)
if(empty($nbArticle)){
    $vide = "Il n'y a pas encore d'article sur ce site";
}else{
    // conversion dans un format lisible pour PHP, le mysqli_fetch_all nous donne un tableau indexé contenant des tableaux associatifs grâce au flag (constante) MYSQLI_ASSOC
    $result = mysqli_fetch_all($recup, MYSQLI_ASSOC);
    // var_dump($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>First CRUD | Home</title>
=======
    <title>First CRUD | Administration</title>
>>>>>>> 20ee4091a6285d9120d587c8163126ff0a2d558e
</head>
<body>
    <?php
    // menu publique
    include "menu.php";
    ?>
<<<<<<< HEAD
    <h1>First CRUD | admin</h1>
=======
    <h1>First CRUD | Administration</h1>
    <h4><a href='?page=create'>Créer un article</a></h4>
>>>>>>> 20ee4091a6285d9120d587c8163126ff0a2d558e
    <?php
    // on a pas encore d'articles
    if(isset($vide)):
    ?>
    <h3>Il n'y a pas encore d'articles sur ce site</h3>
    <?php
    // on a au moins un article
    else:
        // ternaire qui remplit $nb pour ajouter ou pas le 's'. Si on en a qu'un, pas de 's', sinon, on ajoute un 's'
        $nb = $nbArticle===1 ? "" : "s";
    ?>
    <h3>Il y a <?=$nbArticle?> article<?=$nb?></h3>
<<<<<<< HEAD
    <?php
        foreach($result as $item): 
    ?>
    <hr>
    <h4><?=$item['thearticletitle']?></h4>
    <p><?=cuteTheText($item['thearticletext'],NEWS_HOME_LENGTH)?> <a href="?page=article&id=<?=$item['idthearticle']?>">Lire la suite</a></p>
    <h5>Ecrit par <a href="?page=user&id=<?=$item['idtheuser']?>"><?=$item['theuserlogin']?></a> le <?=frenchDate($item['thearticledate'])?></h5>
    <?php
        endforeach;
=======
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Texte</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($result as $item): 
    ?>
    <tr>
        <td><?=$item['idthearticle']?></td>
        <td><?=cuteTheText($item['thearticletitle'],50)?></td>
        <td><?=cuteTheText($item['thearticletext'],50)?></td>
        <td><?=$item['theuserlogin']?></td>
        <td><?=$item['thearticledate']?></td>
        <td><a href='?page=update&id=<?=$item['idthearticle']?>'>Update</a></td>
        <td><a href='?page=delete&&id=<?=$item['idthearticle']?>'>Delete</a></td>

    </tr>
    <?php
        endforeach;
        ?>
        </tbody>
    </table>
    <?php
>>>>>>> 20ee4091a6285d9120d587c8163126ff0a2d558e
    endif;
    ?>
</body>
</html>