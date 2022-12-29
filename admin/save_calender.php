<?php 
require_once("../inc/conn.inc.php");
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./calender.php') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `calender` (`title`,`description`,`start_datetime`,`end_datetime`,`price`,`place`,`event_id`) VALUES ('$title','$description','$start_datetime','$end_datetime','$price','$place','$eventname')";
}else{
    $sql = "UPDATE `calender` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}', `price` = '{$price}', `place` = '{$place}', `event_id` = '{$eventname}'  where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./calender.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>