<?php

session_start();// d�marrer une session

$user= $_SESSION['username'];
$name= $_SESSION['name'];
$profile= $_SESSION['profil'];
include("../inc\conn.inc.php");
$req="select id from user where username='$user'"; 
$res=mysqli_query($conn,$req);
$id = $res;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>account setting</title>
	
	<!-- custom css -->
	<style type="text/css">
            table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
  </head>
  
  <body>
  
    <?php require_once("acc_modif.php"); ?>
	
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
	<!-- PHP code to read records from the patient table -->
	<?php
	include("../inc/conn.inc.php");
	// $result=mysqli_query($conn,"SELECT * FROM user where id=$id; ") or die("erreur");
	?>
	
	<div class="container">
	<!-- ADD HTML table that will display data from the database -->
		<table class="table table-bordered table-striped">
			<?php
			//Retrieve contents from the patient table
			//Loop through the list of records from this table
			while($ligne=mysqli_fetch_array($result,MYSQLI_BOTH)){ ?>
                <tr>
                    <td>Account</td> <td colspan="2">Action</td> </tr>                  
                    <td>username</td> <td><?php echo $ligne['username']; ?></td> <td colspan="2"><a href="acc_modif.php?modUN=<?php echo $ligne['id']; ?>" title="Modification enregistrement" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a></td> </tr>
                    <tr><td>password</td> <td><?php echo $ligne['password']; ?></td><td colspan="2"></td></tr>
                    <tr><td>name</td> <td><?php echo $ligne['name']; ?></td> <td colspan="2"></td></tr>
                    <tr><td>email</td> <td><?php echo $ligne['email']; ?></td> <td colspan="2"></td></tr>
                    <tr><td>tel</td> <td><?php echo $ligne['tel']; ?>     </td> <td colspan="2"></td></tr>
                    <tr><td>photo</td> <td><?php echo $ligne['photo']; ?></td> <td colspan="2"></td></tr>
                    <tr><td>adresse </td> <td><?php echo $ligne['adresse']; ?></td> <td colspan="2"></td></tr>
                    
                
                    
					
                    <a href="acc_modif.php?modifier=<?php echo $ligne['id']; ?>" title="Modification enregistrement" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>
						<a href="Account.php?supprimer=<?php echo $ligne['id']; ?>" title="Suppression enregistrement" data-toggle="tooltip"><span class="fa fa-trash"></span></a>

			<!-- Creating table body -->
			<tbody>
		
		
				<!-- Creating new table row per record -->

						<!-- Creating action icons for each record displayed in the table -->
						<a href="acc_modif.php?modifier=<?php echo $ligne['id']; ?>" title="Modification enregistrement" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>
						<a href="Account.php?supprimer=<?php echo $ligne['id']; ?>" title="Suppression enregistrement" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
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