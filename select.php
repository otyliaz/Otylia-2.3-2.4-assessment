<?php
session_start();
if(!isset($_SESSION['iduser'])){
   header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Choose a language - Vocable</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<?php 
include_once("nav.php");

//##########require_once("connect.inc");
require_once("connlocal.inc");

$query="SELECT `idlanguage`, `language` FROM languages ORDER BY `family`, `sub-family` ASC"; 
$result= @mysqli_query ($conn, $query);

$iduser = $_SESSION['iduser'];

if(isset($_GET['submit']))  {
    $language = $_GET['languages'];

    $q_idlanguage = "SELECT `idlanguage` FROM languages WHERE `language` = '$language'";
    $r_idlanguage = @mysqli_query($conn, $q_idlanguage);
    
    $q_check = "SELECT * FROM user_languages WHERE idlanguage = '$idlanguage'";
    $r_check = @mysqli_query($conn, $q_check);

    if (mysqli_num_rows($r_check) > 0) {
        $taken= 'You already learn this language! Choose another one.';
    }
    
    else {

        if ($r_idlanguage && $row = mysqli_fetch_assoc($r_idlanguage)) { 
            $idlanguage = $row['idlanguage'];
            $insert="INSERT INTO `user_languages` (`iduser`, `idlanguage`) VALUES ('$iduser', '$idlanguage')";

            $inserted= @mysqli_query ($conn, $insert);

            header("Location: home.php");
        } 

        else {
            $errormsg = 'Sorry, there was an error. Please try again!';
        }

    }
}

mysqli_close($conn);
?>

<body>
<div class="content">
<?php if (isset($errormsg)) {
        echo '<p class="error">' . $errormsg . '</p>';}
    ?>
    <h2>Choose a language from the list to add to your dashboard!</h2>
    <div class="form" id="select">
    <form action="select.php" method="get">
        <input type="text" list="languages" name="languages" placeholder="Type here...">
            <datalist id="languages">
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo ' <option value="' . $row['language'] . '">'   ;}
            ?>
            </datalist>
        <input type="submit"  name="submit" value="Go!"> 
    </form>
    </div>
</div>

<footer>
    <p>&copy; Otylia 2023</p>
</footer>

</body>
</html>