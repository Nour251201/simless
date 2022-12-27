<?php    
    /*define("SERVEUR", "localhost");
    define("NOMBASE", "simless");
    define("USER", "root");
    define("MDP", "");*/
	$conn=mysqli_connect("localhost","root","","simless") ;
    if(!$conn){
        die("Cannot connect to the database.". $conn->error);
    }
    
?>