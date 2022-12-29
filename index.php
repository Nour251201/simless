<?php

include("inc/header.php");
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="inc/style.css" />

</head>
<body  >
<header> <!-- Entête -->
<div id="en_tete"> </div>
</header>
 <input id="searchbar" onkeyup="" type="text"
        name="search" placeholder="search bar" style="width:300px;">
<div id="About">
    <h1>About us</h1>
</div>
<div id="event">
    <h1>up comming events</h1>
</div>
<div id="calender">
    <a href="calender.php"><h1>calender</h1></a>
</div> 
<footer>
<?php include("inc/footer.php"); ?>

<div id="footer"> </div> 
</footer>
</body>

</html>