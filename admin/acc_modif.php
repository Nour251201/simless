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


//Code for deleting selected user's data
//Get passed parameter value, in this case, code_pat


//Code for updating selected user's data
//Get passed parameter value, in this case, code_pat
if(isset($_GET['modifier'])){
	$id=$_GET['modifier'];
	//Set the $maj variable to true
	$maj = true;
	$sql="SELECT * FROM user WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
        $ligne=mysqli_fetch_assoc($result);
		$name=$ligne['name'];
		$username=$ligne['username'];
		$password=$ligne['password'];
		$email=$ligne['email'];
		$tel=$ligne['tel'];
		$photo=$ligne['photo'];
		$adresse=$ligne['adresse'];
}

if(isset($_POST['update'])){

	if(!empty($_POST['name'])&& !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])&& !empty($_POST['tel'])&& !empty($_POST['adresse'])){
		//Get hidden input value
		$id=$_POST['id']; 
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$tel=$_POST['tel'];
		//$photo=$new_file_name;
		
		$adresse=$_POST['adresse'];

		$file_loc = $_FILES['fileToUpload']['tmp_name'];
		$file_size = $_FILES['fileToUpload']['size'];
	  $file_type = $_FILES['fileToUpload']['type'];
	  $folder="../media/";
	  $file1 = $folder.$_FILES['fileToUpload']['name'];
	
	  
	 /* new file size in KB */
	 $new_size = $file_size/1024;  
	 /* new file size in KB */
	  
	  /* make file name in lower case */
	   $new_file_name = strtolower($file1);
	   /* make file name in lower case */
	  
	  $final_file=str_replace(' ','-',$new_file_name);
	  $photo=$final_file;
		
		 //update query
		$sql="UPDATE user SET username='$username', password='$password', name='$name', email='$email', tel='$tel', photo='$photo',adresse='$adresse' WHERE id='$id'";
	

		

		if(move_uploaded_file($file_loc, $folder.$final_file)&& ($conn->query($sql) === TRUE))
		{
		$last_id = $conn->insert_id;
		$sql1="UPDATE media SET med_nom='$final_file', med_type='$file_type', med_size='$new_size' where id='$id'";
	
		$res1=mysqli_query($conn,$sql1);


		$_SESSION['message']= "Le user choisi a été modifié avec succès!";
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
	header("location: Account.php"); 
}
}
?>