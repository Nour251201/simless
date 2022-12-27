<?php 
include("../inc/conn.inc.php");
session_start();// démarrer une session
$nom= $_SESSION['name'];
$user= $_SESSION['username'];
?>
<html>
<head>
<title>modification des comptes</title>
	</head>
	<body>
	<div id='page'>
	<div id="menu">	<ul > 
	<li><a href="compte.php">compte</a></li> 
	<li><a href="home.php">accueil</a></li> 
	</ul ></div>
	<div id="corp">
	   
         <form id="modifier" method="post" >
			<fieldset>
				<legend>modifier</legend>
				<label for="pass">mot de passe: </label><input type="password" id="pass" name="pass"/><br />
			   <label for="pass1">nouveau mot de passe: </label><input type="password" id="pass1" name="pass1"/><br />
               </select>
				<input type="submit"   name="envoi2" value="modifier"/>				
			</fieldset>			
		</form>
<?php		
if(isset($_POST['envoi2'])){
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];

$sql="select password from user WHERE username='$user'";
$res=mysqli_query($conn,$sql);
$donne=mysqli_fetch_assoc($res);

if($pass==$donne['password']){
$sql="UPDATE user SET password= '$pass1' WHERE username='$user'";
$res=mysqli_query($conn,$sql);
echo'mot de passe modifié avec succes';
}
else echo'mote passe incorrecte';
}
?>

	</body>
</html>
