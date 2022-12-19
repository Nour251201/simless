<?php
//start session
session_start();

//Inclusion du fichier de connexion conn.php
include("../inc/conn.inc.php");

//Set the $code variable to 0
$id=0;

//Set the $maj variable to false
$maj = false;
//Code for saving user's data
//Processing form data when form is submitted
if(isset($_POST['enregistrer'])){
	//Check input errors before inserting in database
	//empty()is a PHP function used to verify whether a variable is empty
	if(!empty($_POST['nom'])&& !empty($_POST['ste'])&& !($_POST['type']=="") && !empty($_POST['fonc'])){
		$nom=$_POST['nom'];
        $ste=$_POST['ste'];
		$type=$_POST['type'];
        $fonc=$_POST['fonc'];
		 //insert query
		$sql="INSERT INTO intervenant (`nom`,`societe`,`profileint`,`fonction`) VALUES('$nom','$ste','$type','$fonc')";
		$res=mysqli_query($conn,$sql);
		//Creating session messages and message types
		$_SESSION['message']= "Un nouvel enregistrement a été ajouté avec succès!";
		//Alert success message when data is successfully stored
		$_SESSION['msg_type']= "alert alert-success";
}
	else{ 		
		$_SESSION['message']= "Les champs ne devraient pas être vides!";
		//Alert warning message when empty values are submitted
		$_SESSION['msg_type']= "alert alert-warning";
}
// Redirect to index page and 
// tell the user record was saved
header("location: Interv.php");  
}

//Code for deleting selected user's data
//Get passed parameter value, in this case, code_pat
if(isset($_GET['supprimer'])){
	$id=$_GET['supprimer'];
	
	//delete query
	$sql="DELETE FROM intervenant WHERE id_int='$id'";
	$res=mysqli_query($conn,$sql);

	$_SESSION['message']= "L'enregistrement choisi a été supprimé avec succès!";
	//Alert danger message when data is successfully deleted
	$_SESSION['msg_type']= "alert alert-danger";
	
	// redirect to index page and 
    // tell the user record was deleted
	header("location: Interv.php");
}

//Code for updating selected user's data
//Get passed parameter value, in this case, code_pat
if(isset($_GET['modifier'])){
	$id=$_GET['modifier'];
	//Set the $maj variable to true
	$maj = true;
	$sql="SELECT * FROM intervenant WHERE id_int='$id'";
	$result=mysqli_query($conn,$sql);
        $ligne=mysqli_fetch_assoc($result);
		$nom=$ligne['nom'];
        $ste=$ligne['societe'];
		$type=$ligne['profileint'];
		$fonc=$ligne['fonction'];
}

if(isset($_POST['update'])){
	if (!empty($_POST['nom'])&& !empty($_POST['ste'])&& !($_POST['type']=="") && !empty($_POST['fonc'])) {
		//Get hidden input value
		$id = $_POST['id'];
		$nom=$_POST['nom'];
        $ste=$_POST['ste'];
		$type=$_POST['type'];
        $fonc=$_POST['fonc'];	
 		 //update query
		$sql="UPDATE intervenant SET nom='$nom',societe='$ste', profileint='$type',fonction='$fonc' WHERE id_int='$id'";
		$res=mysqli_query($conn,$sql);

		$_SESSION['message']= "Le collaborateur choisi a été modifié avec succès!";
		//Alert success message when data is successfully updated
		$_SESSION['msg_type']= "alert alert-success";
		}
	else{
		$_SESSION['message']= "Les champs ne devraient pas être vides!";
		//Alert warning message when empty values are submitted
		$_SESSION['msg_type']= "alert alert-warning";
	}
	// redirect to index page and 
    // tell the user record was updated
	header("location: Interv.php");  
}

?>