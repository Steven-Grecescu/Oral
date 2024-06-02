<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Register</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="../login-page/register/style.css">

</head>
<body>

<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h2>Etoile D'élégance</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Curabitur et est sed felis aliquet sollicitudin</p>
		</div>
	</div>
	
	
		<form class="right" method="POST" action="../Models/inscription.php" id="registrationForm">
		<h5>Register</h5>
		<p>Vous avez déjà un compte ? <a href="login">Cliquez ici pour vous connecter</a>et ainsi acceder a notre site !</p>
		<div class="inputs">
			<input type="text" placeholder="Nom" name="nom">
			<br>
			<input type="text" placeholder="Prenom" name="prenom">
			<br>
			<input type="text" placeholder="Adresse" name="adresse">
			<br>
			<input type="number" id="phone" name="phone" placeholder="+33">
			<br>
			<input type="text" placeholder="Email" name="email">
			<br>
			<input type="password" placeholder="Mot de passe" name="mdp">
			<br>
			<input type="password" placeholder="Confirmation du mot de passe" name="mdp_confirm">
		</div>
			
			<br><br>
			
			<br>
			<button type="submit">S'inscrire</button>
</form>
	
</div>
<script >    document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let nom = document.querySelector('input[name="nom"]').value
    let	prenom = document.querySelector('input[name=prenom]').value
    let adresse = document.querySelector('input[name=adresse]').value
    let tel = document.querySelector('input[name=phone]').value
    let email = document.querySelector('input[name=email]').value
    let password = document.querySelector('input[name="mdp"]').value;
    let confirmPassword = document.querySelector('input[name="mdp_confirm"]').value;

    if (nom === "") {
        alert("Veuillez entrer un nom.");
        event.preventDefault();
        return false;
    }
    if (prenom === "") {
        alert("Veuillez entrer un prénom.");
        event.preventDefault();
        return false;
    }
    if (adresse === "") {
        alert("Veuillez entrer une adresse.");
        event.preventDefault();
        return false;
    }
    if (tel === "") {
        alert("Veuillez entrer un numéro de téléphone.");
        event.preventDefault();
        return false;
    }else if (!/^0[567]\d{8}$/.test(tel)) {
        alert("Le numéro de téléphone doit comporter 10 chiffres et commencer par 05, 06 ou 07.");
        event.preventDefault();
        return false;
    }
    if (email === "") {
        alert("Veuillez entrer une adresse e-mail.");
        event.preventDefault();
        return false;
    }else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Veuillez entrer une adresse e-mail valide.");
        event.preventDefault();
        return false
    }

    if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas.");
        event.preventDefault();
        return false;
    }else if (password.length < 8) {
        alert("Le mot de passe doit comporter au moins 8 caractères.");
        event.preventDefault();
        return false;
    } else if (!/[A-Z]/.test(password)) {
        alert("Le mot de passe doit comporter au moins une majuscule.");
        event.preventDefault();
        return false;
    } else if (!/[a-z]/.test(password)) {
        alert("Le mot de passe doit comporter au moins une minuscule.");
        event.preventDefault();
        return false;
    } else if (!/[0-9]/.test(password)) {
        alert("Le mot de passe doit comporter au moins un chiffre.");
        event.preventDefault();
        return false;
    } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        alert("Le mot de passe doit comporter au moins un caractère spécial.");
        event.preventDefault();
        return false;
    }
});</script>
</body>
</html>
