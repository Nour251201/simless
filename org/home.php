<?php
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	 if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	} 
/* $nom= $_SESSION['nom'];
$profile= $_SESSION['profile'];
$login= $_SESSION['username']; */
?>
<!DOCTYPE html>
<html>
	<head>
	
	</head>
		
		<body>
	<div id='page'>
   
	<div id="menu">
	<ul>
	<li><a href="compte.php">compte</a></li>  
    <li><a href="collab.php">Ajouter collaborateur</a></li>  
	<li><a href="interv.php">Ajouter intervenant</a></li>  
	<li><a href="calender.php">calendrier</a></li>  
	<li><a href="../logout.php">Déconnexion</a></li>
		</ul>
		</div>
		
		<div id="corp">
	  


	  
	</div>
	<div id="pied"></div>
	</body>
</html>
