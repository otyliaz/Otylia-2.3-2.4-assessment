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

$iduser = $_SESSION['iduser'];

if (isset($_GET['language'])) {
    //this get is from the url that it created
    
    $selected_language = $_GET['language'];
    $_SESSION['selected_language'] = $selected_language;
    
    // query selected language in the language databse,  to find the id of the lanugae
    //then query the user_languages database to find the iduser_lang with language and 
    //   select the iduser_lang from where the language = the language they chose, and the user is their current user

    $q_select = "SELECT user_languages.iduser_lang FROM user_languages JOIN languages ON user_languages.idlanguage = languages.idlanguage WHERE languages.language = '$selected_language' AND user_languages.iduser = '$iduser' ";
    $r_select = @mysqli_query($conn, $q_select);

    $row1 = mysqli_fetch_assoc($r_select);

    $_SESSION['iduser_lang'] = $row1['iduser_lang'];

    header("Location: addlist.php"); 
}

// this query selects the names of languages that the user has, by joining the tables languages and user_languages 
$query="SELECT languages.language FROM user_languages JOIN languages ON user_languages.idlanguage = languages.idlanguage WHERE user_languages.iduser = '$iduser' "; 
$result= @mysqli_query ($conn, $query);

mysqli_close($conn);

?>

<body>
<div class="content">
    <?php echo "<h2>Welcome " . $_SESSION['username'] . "! this is your dashboard</h2>" ;?>
    <p>Your languages:</p>
    
    <!--select the languages of the user from the database and prints them out here. -->
    <!---###if they don't have any, direct them to selectlanguage.php, saying: looks like you don't have any -->
    <!--the url when you click on the language is like using a form with "get"--->

    <?php
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    echo "<a href='home.php?language=" . urlencode($row['language']) . "'>" . $row['language'] . "</a>\n" ;}
    ?>
    <!--#####need to make it look cool, like cards-->

    <br><a href="/selectlanguage.php">choose another language</a>
    <!---####delete this-->

</div>

<footer>
    <p>&copy; otylia 2023</p>
</footer>

</body>
</html>