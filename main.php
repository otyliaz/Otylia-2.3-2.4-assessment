<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <title>change this</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<p>Choose a language to start with.........</p>

<!--basically they can collate some vocab lists, that can be shared with other people -->

<?php 
include_once("nav.php");

//require_once("connect.inc");
require_once("connlocal.inc");

$query="SELECT `idlanguage`, `language` FROM languages ORDER BY `family`, `sub-family` ASC"; 
$result= @mysqli_query ($conn, $query);

$iduser = $_SESSION['iduser'];

if(isset($_GET['submit']))  {
    $language = $_GET['languages'];

    $q_idlanguage = "SELECT `idlanguage` FROM languages WHERE `language` = '$language'";
    $r_idlanguage = @mysqli_query($conn, $q_idlanguage);
    
    if ($r_idlanguage && $row = mysqli_fetch_assoc($r_idlanguage)) { 
        $idlanguage = $row['idlanguage'];
        $insert="INSERT INTO `user_languages` (`iduser`, `idlanguage`) VALUES ('$iduser', '$idlanguage')";

        $inserted= @mysqli_query ($conn, $insert);
    } 
}
?>

<div class="content">
<h2>heading</h2>
    <div class="form">
    <form action="main.php" method="get">
        <label for="languages">Choose your language from the list:</label><br>
        <input type="text" list="languages" name="languages" placeholder="Type here...">
        <!--try and validate the input, maybe use a select thing instead-->
            <datalist id="languages">
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo ' <option value="' . $row['language'] . '">'   ;}
            ?>
            </datalist>
        <input type="submit"  name="submit" value="get started!"> 
    </form>
    <!--or add a new language -->
    </div>
</div>

<footer>
    <div class="container">
      <p>&copy; otylia 2023</p>
    </div>
</footer>

</body>
</html>