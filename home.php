<?php
session_start();
if(!isset($_SESSION['iduser'])){
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <title>home???????</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<?php
include_once("nav.php")
?>

<div class="content">
    <h2>cool catchphrase</h2>
    <p>sub-heading start now </p>

    <!--log in to get started please, they can't do anything without logging in-->
    <a href="/main.php">LETS GO - button</a>

</div>

<footer>
    <div class="container">
      <p>&copy; otylia 2023</p>
    </div>
</footer>

</body>
</html>