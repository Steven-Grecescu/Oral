<?php
require_once "./Model.class.php";
require_once "./Article.class.php";

    if (!empty($_POST['idArticle'])){
        $idArticle = $_POST['idArticle'];
        session_start();
        $idClient = $_SESSION['idClient'];
        $pdo = new PDO('mysql:host=localhost;dbname=magasin_de_vetements;port=3308;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $req = $pdo->prepare('INSERT INTO panier (idClients_Panier, idArticles_Panier) VALUES (:idClients_Panier, :idArticles_Panier)');
        $req->bindValue(':idClients_Panier', $idClient,);
        $req->bindValue(':idArticles_Panier', $idArticle,);
        $resultat = $req->execute();
        header('Location: '. "/panier");
    }else{
        echo "erreur";
    }



