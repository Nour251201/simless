<?php
require_once("../inc/conn.inc.php");
if(!isset($_GET['idevent'])){
    echo "<script> alert('Undefined event ID.'); location.replace('./calender.php') </script>";
    $conn->close();
    exit;
}
$naming = $conn->query("SELECT lib FROM `event` where event_id = '{$_GET['idevent']}'");

while($ligne=mysqli_fetch_assoc($naming))
{
    $name = $ligne['lib'];
    // echo $name;
//    echo "<script> location.replace('./calender.php?lib=$name') </script>";
   echo "<script> location('./calender.php') ; $('#event-details-modal').find('#eventname').text($name) </script>";
 
}
    //echo "<script> alert('Event has deleted successfully.'); location.replace('./calender.php') </script>";

?> 