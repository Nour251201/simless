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
  
    <?php require_once("crud_Interv.php"); ?>
	
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
	<p><a href="home.php" > <== Home</a></p>

	<!-- HTML form for creating a new patient -->
	<div class="container mt-2 mb-4 p-2 shadow ">
		
		<form action="crud_Interv.php" method="POST">
		<div class="form-row justify-content-center">
			<!-- Add patient code, code_pat, to the hidden field value -->
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<div class="col-auto">
			<input type="text" name="nom" class="form-control" value="<?php if(isset($nom)) echo $nom; ?>" placeholder="Entrer nom intervenant" />
			</div>
            <div class="col-auto">
			<input type="text" name="ste" class="form-control" value="<?php if(isset($ste)) echo $ste; ?>" placeholder="Entrer socioté de l'intervenant" />
			</div>
			<div>
			<label for="type">Choose a type:</label>
				<select name="type">
				<option value=""></option>	
				<option value="formateur">formateur</option>
				<option value="speaker">speaker</option>
				</select>
			</div>
			<div class="col-auto">
			<input type="text" name="fonc" class="form-control" value="<?php if(isset($fonc)) echo $fonc ; ?>" placeholder="Entrer leur fonction" />
			</div>
			
			<div class="col-auto">
			<?php
				if($maj == true):
			?>
				<button type="submit" name="update" class="btn btn-info">Mettre à jour</button>
			<?php else: ?>
				<button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
			<?php endif; ?>
			</div>
			</div>
		</form>
	
		</div>
	<!-- PHP code to read records from the patient table -->
	<?php
	// include database connection
	include("../inc/conn.inc.php");
	// select query
	$result=mysqli_query($conn,"SELECT * FROM intervenant ") or die("erreur");
	?>
	
	<div class="container">
	<!-- ADD HTML table that will display data from the database -->
		<table class="table table-bordered table-striped">
			<!-- Creating table heading -->
			<thead>
				<tr>
					<th>Nom d'intervenant</th>
					<th>Société</th>
					<th>Type</th>
					<th colspan="2">Fonction</th>
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
					<td><?php echo $ligne['nom']; ?></td>
					<td><?php echo $ligne['societe']; ?></td>
					<td><?php echo $ligne['profileint']; ?></td>
					<td><?php echo $ligne['fonction']; ?></td>

					<td style="width: 10%">
						<!-- Creating action icons for each record displayed in the table -->
						<a href="Interv.php?modifier=<?php echo $ligne['id_int']; ?>" title="Modification enregistrement" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>
						<a href="crud_Interv.php?supprimer=<?php echo $ligne['id_int']; ?>" title="Suppression enregistrement" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
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