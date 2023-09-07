<?php
session_start();
if(!isset($_SESSION['iduser'])){
   header("Location: login.php");
}
?>
<!--######remember TO SANITIZE INPUTS-->
<!DOCTYPE html>
<html lang="en">
<head>  
    <title>home???????</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<?php
include_once("nav.php");
//###require_once("connect.inc");
require_once("connlocal.inc");

if (isset($_GET['idlist'])) {
$idlist = $_GET['idlist']; }

mysqli_close($conn);

?>

<body>
<div class="content">
    
<p> literalmente yo </p>
<div class="form">
        <form action="addlist.php" method="get"> 
            <label for="name">Name of your vocabulary list:</label><br>
            <input type="text" name="name" id="name" placeholder="Type here..." required> 
            <br>
            <label for="level">Proficiency level</label><br>
            <select name="level" id="level">
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
                <option value="technical">Technical</option>
            </select>
            <input type="submit" name="submit" value="go!">
        </form>
    </div>


</div>

<footer>
    <p>&copy; otylia 2023</p>
</footer>

</body>
</html>