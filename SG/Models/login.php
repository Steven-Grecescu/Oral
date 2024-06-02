<?php
require_once "./Model.class.php";

if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
    $email = $_POST['email'];
    $password = $_POST['mdp'];

    $pdo = new PDO('mysql:host=localhost;dbname=magasin_de_vetements;port=3308;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

    $req = $pdo->prepare('SELECT * FROM clients WHERE email_Clients = :email_Clients');
    $req->bindValue(':email_Clients', $email);
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_ASSOC);
    
    if($resultat){
        $passwordHash = $resultat['pwd_Clients'];
        if(password_verify($password,$passwordHash)){
            echo "Connexion réussi";
            
            session_start();
            $_SESSION['idClient'] = $resultat['idClients_Clients'];
            $_SESSION['nom'] = $resultat['nom_Clients'];
            $_SESSION['prenom'] = $resultat['prenom_Clients'];
            $_SESSION['email'] = $resultat['email_Clients'];
            $_SESSION['adresse'] = $resultat['Adresse_Clients'];
            $_SESSION['tel'] = $resultat['tel_Clients'];
            $_SESSION['role'] = $resultat['role_Clients'];
            header('Location: '. "/accueil");

        }else{
            echo "Identifiant invalides";
        }
    }else{
        echo "Identifiant invalides";
    }
}

echo "$_SESSION[nom]";
