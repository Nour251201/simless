<?php

session_start();// d�marrer une session

$user= $_SESSION['username'];
$name= $_SESSION['name'];
$profile= $_SESSION['type'];
include("../inc\conn.inc.php");
$req="select id from user where username='$user'"; 
$res=mysqli_query($conn,$req);
echo $donne['id'];
?>
<html>

<title>compte</title>
	</head>
	
	<body>
	<div id='page'>
	
	<div id="menu">

	<ul>
	
 
<li><a href="modmdp.php">modifier mot de passe</a></li> 
<li><a href="home.php">accueil</a></li> 
	</ul >
	</div>
	<div id="corp">
    <form id="modifier" method="post" >
			<fieldset>
				<legend>modifier profile</legend>
				<label for="nom">nom </label>
                <input type="text" id="nom" name="nom" 
                value="<?php echo $name ?>" >
                <br/>
                <label for="username">username </label>
                <input type="text" id="username" name="username" 
                value="<?php echo $user ?>" >
                <br/>
				<input type="submit"   name="envoi" value="modifier"/>				
			</fieldset>			
		</form>





		
<?php	
$ch="";	
if(isset($_POST['envoi'])){
$nom=$_POST['nom'];
$usnom=$_POST['username'];


$sql="select name from user WHERE id='$id'";
$res=mysqli_query($conn,$sql);
$donne=mysqli_fetch_assoc($res);
if($nom<>$_SESSION['name']){
$sql="UPDATE user SET name= '$nom' WHERE id='$id'";
$res=mysqli_query($conn,$sql);
$ch.=$nom;}

$sql1="select username from user WHERE id='$id'";
$res1=mysqli_query($conn,$sql1);
$donne=mysqli_fetch_assoc($res1);
if($usnom<>$_SESSION['username']){
$sql="UPDATE user SET username= '$usnom' WHERE id='$id'";
$res=mysqli_query($conn,$sql);
$ch.=$usnom;}

if($ch<>""){
	/* header('location: home.php'); */
	echo $ch ;
}
else echo'modification nom incorrecte';
}
?>

	</div>
<div id="pied"></div>
	</body>
</html>