<?php

include("..\inc\conn.inc.php");
$user=$_POST['username'];
$pas=$_POST['pass'];
$nom=$_POST['nom'];
$mail=$_POST['mail'];
$type=$_POST['type'];

$req="insert into user (`id`,`username`,`password`,`type`,`name`,`email`,`tel`,`photo`,`adresse`) 
values ('','".$user."','".$pas."','res','".$nom."','".$mail."','','','')";
$res=mysqli_query($conn,$req);
if(!$res)
{ 
    print("erreur");
}
else 
{ 
    header('location: home.php');
}
?>