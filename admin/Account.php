<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Latest compiled and minified Bootstrap CSS -->
  <!--   <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="icon/css/all.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CRUD org</title>
	
	<!-- custom css -->
	<style type="text/css">
            table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
  </head>
  
  <body>
  
    <?php require_once("acc_modif.php");
	$path= "C:\\xampp\\htdocs\\simless\\media\\" ; ?>
	
	<div class="container">
	<?php
		if(isset($_SESSION['message'])): ?>
		
		<div class="<?=$_SESSION['msg_type']; ?>">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	</div>
	<!-- HTML form for creating a new patient -->
	<div class="container mt-2 mb-4 p-2 shadow ">
	<?php
				if($maj == true){
				?>
		<form action="acc_modif.php" method="POST" enctype="multipart/form-data">
		<div class="form-row justify-content-center">
			<!-- Add patient code, code_pat, to the hidden field value -->
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<div class="col-auto">
			<input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>" placeholder="Entrer un nom" />
			</div>
			<div class="col-auto">
			<input type="text" name="username" class="form-control" value="<?php if(isset($username)) echo $username; ?>" placeholder="Entrer un username" />
			</div>
			<div class="col-auto">
			<input type="password" name="password" class="form-control" value="<?php if(isset($password)) echo $password; ?>" placeholder="Entrer password" />
			</div>
			<div class="col-auto">
			<input type="email" name="email" class="form-control" value="<?php if(isset($email)) echo $email; ?>" placeholder="Entrer un mail" />
			</div>
			<div class="col-auto">
			<input type="tel" name="tel" class="form-control" value="<?php if(isset($tel)) echo $tel; ?>" placeholder="Entrer un tel" />
			</div>
			<div class="col-auto">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload" value="<?php if(isset($photo))  echo  $photo; ?>" placeholder="photo" />
			 


		</div>
			<div class="col-auto">
			<input type="text" name="adresse" class="form-control" value="<?php if(isset($adresse)) echo $adresse; ?>"  />
			</div>
			<div class="col-auto">
			
				
				<button type="submit" name="update" class="btn btn-info">Mettre à jour</button>
		
			</div>
			</div>
		</form>
		<?php	} ?>
		</div>
	<!-- PHP code to read records from the patient table -->
	<?php
	// include database connection
	include("../inc/conn.inc.php");
	// select query
	$result=mysqli_query($conn,"SELECT * FROM user where profil='admin' ") or die("erreur");
	?>
	
	<div class="container">
	<!-- ADD HTML table that will display data from the database -->
		<table class="table table-bordered table-striped">
			<!-- Creating table heading -->
			<thead>
				<tr>
					<th>name</th>
					<th>username</th>
					<th>password</th>
					<th>email</th>
					<th>tel</th>
					<th>photo</th>
					<th>adresse</th>
					<th colspan="2">Action</th>
				</tr>
			<thead>
			<!-- Creating table body -->
			<tbody>
		
		<?php
			//Retrieve contents from the patient table
			//Loop through the list of records from this table
			while($ligne=mysqli_fetch_array($result,MYSQLI_BOTH)){ ?>
				<!-- Creating new table row per record -->
				<tr>
					<td><?php echo $ligne['name']; ?></td>
					<td><?php echo $ligne['username']; ?></td>
					<td><?php echo $ligne['password']; ?></td>
					<td><?php echo $ligne['email']; ?></td>
					<td><?php echo $ligne['tel']; ?></td>
					<td><?php echo '<img  style="width:100px;" src="'. $ligne['photo'].'">'?></td>
					<td><?php echo $ligne['adresse']; ?></td>
					<td style="width: 10% ">
						<!-- Creating action icons for each record displayed in the table -->
						<a href="Account.php?modifier=<?php echo $ligne['id']; ?>" title="Modification enregistrement" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>
				</td>
				</tr>
			<?php } ?>	
			</tbody>	
		</table>
	
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>-->
  
  <!--Script for removing the alert message after three seconds via the SetTimeout() method -->
  <!--Script for enabling tooltips in the document via the tooltip() method -->
  <script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
		$(".alert").remove();
		}, 3000);
		
		$('[data-toggle="tooltip"]').tooltip();
	});
  
  </script>
  
  </body>
</html>