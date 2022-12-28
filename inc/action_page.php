<?php
include("../inc/conn.inc.php");
//ini_set(PHP_INI_PERDIR,	"0");
$name=$_POST['name'];
$email=$_POST['mail'];
 
 
$query= "INSERT INTO subscribers (`name`,`email`) VALUES ('$name', '$email')"; 
mysqli_query ($conn, $query) ;
// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
$subject="hello";
// the message
$msg = "bonjour $name your are subscribing to our newsletter simless with <3";
$from= 'steamperso12@gmail.com';
$query= "SELECT * FROM subscribers"; 
$result= mysqli_query ($conn, $query)  
or die ('Error querying database.'); 
 
while ($row = mysqli_fetch_array($result)) { 
$name= $row['name']; 
$email= $row['email']; 

//$msg= "Dear $first_name $last_name,\n$body"; 
mail($email, $subject, $msg, 'From:' . $from); 
echo 'Email sent to: ' . $email. '<br>'; 
} 
//mail($mail,"My subject",$msg);
?>