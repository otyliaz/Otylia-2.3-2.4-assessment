<?php
session_start();
if(!isset($_SESSION['iduser'])){
   header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Home - Vocable</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="./includes/favicon.png">

</head>

<?php
include_once("./includes/nav.php");
require_once("./includes/connlocal.inc");

//query
$query="SELECT `idlanguage`, `language` FROM languages ORDER BY `family`, `sub-family` ASC"; 
$result= @mysqli_query ($conn, $query);

$iduser = $_SESSION['iduser'];

//don't need to sanitize this query because the user is just choosing.
if(isset($_GET['submit']))  {
    $language = $_GET['languages'];

    //select query
    $q_idlanguage = "SELECT `idlanguage` FROM languages WHERE `language` = '$language'";
    $r_idlanguage = @mysqli_query($conn, $q_idlanguage);

    if ($r_idlanguage && $row = mysqli_fetch_assoc($r_idlanguage)) {
        $idlanguage = $row['idlanguage'];

        //check if the user is already learning this language
        $q_check = "SELECT * FROM user_languages WHERE idlanguage = '$idlanguage' AND iduser = '$iduser'";
        $r_check = @mysqli_query($conn, $q_check);

        //if they already have the language
        if (mysqli_num_rows($r_check) > 0) {
            $taken = 'You are already learning this language! Choose another one.';
        } 
        //if they don't have the language
        else {
            $insert = "INSERT INTO `user_languages` (`iduser`, `idlanguage`) VALUES ('$iduser', '$idlanguage')";
            $inserted = @mysqli_query($conn, $insert);

            header("Location: home.php");
        }
    } 
    else {
        $errormsg = 'Sorry, there was an error. Please try again!';
    }
}

mysqli_close($conn);
?>

<body>
<div class="content">
    <!--if there is an error, print error-->
    <?php if (isset($errormsg)) {
        echo '<p class="error">' . $errormsg . '</p>';
    } ?>
    <h2>Start typing to find a language from the list to add to your dashboard!</h2>
    <div class="form" id="select">
    <form action="select.php" method="get">
        <input type="text" list="languages" name="languages" placeholder="Type here...">
            <datalist id="languages">
            <?php
            //prints out all the languages in a datalist for select
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo ' <option value="' . $row['language'] . '">'   ;}
            ?>
            </datalist>
    <?php if (isset($taken)) {
        //if they already have the language, print error
        echo '<p class="error">' . $taken . '</p><br>';
    } ?>
        <input type="submit"  name="submit" value="Go!"> 
    </form>
    </div>
</div>

<footer>
    <p>&copy; Vocable by Otylia 2023</p>
</footer>

</body>
</html>