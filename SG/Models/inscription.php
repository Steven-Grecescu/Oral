<?php
require_once "./Model.class.php";

$erros = [];

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['mdp'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['mdp'];
    $password = password_hash($_POST['mdp'],PASSWORD_DEFAULT);

        
        if (empty($nom)) {
            $errors[] = "Le nom est requis.";
        }
        
        if (empty($prenom)) {
            $errors[] = "Le prénom est requis.";
        }
        
        if (empty($adresse)) {
            $errors[] = "L'adresse est requise.";
        }
        
        if (!preg_match('/^\+?\d+$/', $tel)) {
            $errors[] = "Veuillez entrer un numéro de téléphone valide.";
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez entrer une adresse e-mail valide.";
        }
        
        if (empty($password)) {
            $errors[] = "Le mot de passe est requis.";
        }

    if(empty($errors)){

    $pdo = new PDO('mysql:host=localhost;dbname=magasin_de_vetements;port=3308;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);



    /*Ici on a une requête qui va nous permettre d'entrer l'email et le mot de passe de l'utilisateur */
    $req = $pdo->prepare('INSERT INTO clients (nom_Clients, prenom_Clients, adresse_Clients, tel_Clients, email_Clients, pwd_Clients, role_Clients) 
    VALUES (:nom, :prenom, :adresse, :tel, :email, :pwd, :role)');
    $req->bindValue(':nom', $nom,);
    $req->bindValue(':prenom', $prenom);
    $req->bindValue(':adresse', $adresse);
    $req->bindValue(':tel', $tel);
    $req->bindValue(':email', $email);
    $req->bindValue(':pwd', $password); 
    $req->bindValue(':role', 'user');
    $resultat = $req->execute();

    if ($resultat) {
        echo "Inscription réussie";
        header('Location: '. "/login");
    }
    else {
        echo "Inscription échouée";
    }

    }else{
        foreach ($errors as $error) {
            echo "<p>$error</p>";
            
        }
    }
}


