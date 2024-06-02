<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="../login-page/style.css">

</head>
<body>

<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1></h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Curabitur et est sed felis aliquet sollicitudin</p>
		</div>
	</div>
		<form class="right" method="POST" action="../Models/login.php">
		<h5>Login</h5>
		<p>Vous n'avez pas encore de compte ? <a href="register">Crée le votre dès maintenant! </a>Cela prend moins d'une minute</p>
		<div class="inputs">
		<input type="text" placeholder="Email" name="email">
			<br>
			<input type="password" placeholder="Mot de passe" name="mdp">
			<br>
		</div>
			
			<br><br>

			<button type="submit">Login</button>
</form>
	
</div>


</body>
</html>
