<?php

include("inc\conn.inc.php");

$user=$_POST['username'];
$pas=$_POST['pass'];
$nom=$_POST['nom'];
$mail=$_POST['mail'];
$tel=$_POST['tel'];
$photo=$_POST['photo'];

/* $folder = "./image/" . $filename;
if (isset($_POST['uploadfile'])) {
 
   $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
   // $folder = "./image/" . $filename;
 
    // Now let's move the uploaded image into the folder: image
  if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    } 
} */
$adr=$_POST['adr'];
$req="insert into user (`id`,`username`,`password`,`type`,`name`,`email`,`tel`,`photo`,`adresse`) values ('','".$user."','".$pas."','','".$nom."','".$mail."','".$tel."','".$photo."','".$adr."')";
$res=mysqli_query($conn,$req);
if(!$res)
{ 
    print("erreur");
}
else 
{ 
    header('location: login.php');
}
?>