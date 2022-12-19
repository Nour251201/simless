<?php
//start session
session_start();

//Inclusion du fichier de connexion conn.php
include("../inc/conn.inc.php");

//Set the $code variable to 0
$code=0;

//Set the $maj variable to false
$maj = false;

//Code for saving patient's data
//Processing form data when form is submitted
//isset()is a PHP function used to verify if a variable is declared and is different than NULL
if(isset($_POST['enregistrer'])){
	//Check input errors before inserting in database
	//empty()is a PHP function used to verify whether a variable is empty
	if(!empty($_POST['lib'])&& !empty($_POST['description']) && !empty($_POST['date_deb']) && !empty($_POST['date_fin']) && !empty($_POST['lieu'])){	
        $lib=$_POST['lib'];
		$des=$_POST['description'];
		$deb=$_POST['date_deb'];
		$fin=$_POST['date_fin'];
        $lieu=$_POST['lieu'];
		//insert query
		$sql="INSERT INTO event (`event_id`,`lib`,`description`,`date_deb`,`date_fin`,`lieu`) VALUES (``,`$lib`,`$des`,$deb,$fin,`$lieu`);";
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
// tell the patient record was saved
header("location: event.php");
}

//Code for deleting selected patient's data
//Get passed parameter value, in this case, code_pat
if(isset($_GET['supprimer'])){
	$id=$_GET['supprimer'];
	
	//delete query
	$sql="DELETE FROM event WHERE id='$event_id'";
	$res=mysqli_query($conn,$sql);
	$_SESSION['message']= "L'enregistrement choisi a été supprimé avec succès!";
	//Alert danger message when data is successfully deleted
	$_SESSION['msg_type']= "alert alert-danger";
	
	// redirect to index page and 
    // tell the patient record was deleted
	header("location: event.php");
}

//Code for updating selected patient's data
//Get passed parameter value, in this case, code_pat
if(isset($_GET['modifier'])){
	$event_id=$_GET['modifier'];
	//Set the $maj variable to true
	$maj = true;
	$sql="SELECT * FROM event WHERE id='$event_id'";
	$result=mysqli_query($conn,$sql);
	if (count($result)>0){
        $ligne=mysqli_fetch_assoc($result);
		$lib=$_POST['lib'];
		$des=$_POST['description'];
		$deb=$_POST['date_deb'];
		$fin=$_POST['date_fin'];
        $lieu=$_POST['lieu'];
		
	}
	
}

if(isset($_POST['update'])){
	if(!empty($_POST['lib'])&& !empty($_POST['description']) && !empty($_POST['date_deb']) && !empty($_POST['date_fin']) && !empty($_POST['lieu'])){	
		//Get hidden input value
		$event_id=$_POST['id']; 
		$lib=$_POST['lib'];
		$des=$_POST['description'];
		$deb=$_POST['date_deb'];
		$fin=$_POST['date_fin'];
        $lieu=$_POST['lieu'];
		
		//update query
		$sql="UPDATE event SET lib=$lib , description=$des,date_deb=$deb,date_fin=$fin,lieu=$lieu ";
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
	header("location: event.php");
}

?>