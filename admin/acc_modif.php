<?php
//start session
session_start();

//Inclusion du fichier de connexion conn.php
include("../inc/conn.inc.php");


//Code for deleting selected patient's data
//Get passed parameter value, in this case, code_pat
if(isset($_GET['modUN'])){
	$id=$_GET['modUN'];
	$sql="update user set username=  WHERE id='$id'";
	$res=mysqli_query($conn,$sql);
	$_SESSION['message']= "L'enregistrement choisi a été modifié avec succès!";
	//Alert danger message when data is successfully deleted
	$_SESSION['msg_type']= "alert alert-danger";

	header("location: Account.php");
}

//Code for updating selected patient's data
//Get passed parameter value, in this case, code_pat
if(isset($_GET['modifier'])){
	$id=$_GET['modifier'];
	//Set the $maj variable to true
	$maj = true;
	$sql="SELECT * FROM user WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	if (count($result)>0){
        $ligne=mysqli_fetch_assoc($result);
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		
	}
	
}

if(isset($_POST['update'])){
	if(!empty($_POST['nom'])&& !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['tel'])){
		//Get hidden input value
		$id=$_POST['id']; 
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		
		//update query
		$sql="UPDATE user SET name='$name', username='$username', password='$password', email='$email' WHERE id='$id'";
		$res=mysqli_query($conn,$sql);
		$_SESSION['message']= "Le patient choisi a été modifié avec succès!";
		//Alert success message when data is successfully updated
		$_SESSION['msg_type']= "alert alert-success";
		}
	else{
		$_SESSION['message']= "Les champs ne devraient pas être vides!";
		//Alert warning message when empty values are submitted
		$_SESSION['msg_type']= "alert alert-warning";
	}
	// redirect to index page and 
    // tell the patient record was updated
	header("location: Account.php");
}

?>