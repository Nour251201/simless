<?php 
session_start();

if ((!empty($_POST['login'])) && (!empty($_POST['pass']) ))
{

$mdp=$_POST['pass'];
$login=$_POST['login'];

include("inc\conn.inc.php");
$req="select * from user";
$x=0;

if($res=mysqli_query($conn,$req)){


    while($row=mysqli_fetch_array($res,MYSQLI_BOTH)){
    
    if($mdp==$row['password'] && $login==$row['username'])
    {
    $profile=$row['profil'];
    $nom=$row['name'];
    $_SESSION['name']=$nom;
    $_SESSION['profil']=$profile;
    $_SESSION['username']=$login;
    $x=1;
    }
    }
    }

    print("bonjour"); 
if ($profile == 'admin') 
{
    header('location: admin/home.php');		  
} 
if  ($profile == 'org')
{
    header('location: org/home.php');		  
}
else if ($profile == ''){
    header('location: index.php');
}

else if ($profile == 'res'){
    header('location: opmarq/home.php');
}
if($x==0)
{
header('Location: login.php');  
}
}
?>