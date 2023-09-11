<?php
session_start();
if(!isset($_SESSION['iduser'])){
   header("Location: login.php");
   exit();
}
?>

<!--DO put things into folders-->
<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Home - Vocable</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="favicon.png">

</head>

<?php
include_once("nav.php");
//###require_once("connect.inc");
require_once("connlocal.inc");

$iduser = $_SESSION['iduser'];

if (isset($_GET['language'])) {
    //this $_get is from the url that it created
    
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

    <?php echo "<h2>Welcome " . $_SESSION['username'] . "! This is your dashboard:</h2>" ;
    if (mysqli_num_rows($result) == 0) {
        echo "<p>Looks like you haven't chosen any languages. Click the button below to get started!</p>";
        echo '<a class="button" href="/select.php">Get Started!</a>';
    }

    else {
        echo "<p>Your languages:</p><br>";
    
        //select the languages of the user from the database and prints them out here. -->
        //the url when you click on the language is like using a form with "get"--->

        echo "<div class='container'>";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
        echo "<div class='card'>";
        echo "<a id='language' href='home.php?language=" . urlencode($row['language']) . "'>" . $row['language'] . "</a>\n" ;
        echo '<a class="button delete" href="/deletelanguage.php?language='. urlencode($row['language']) . '">Remove</a>';
        echo "</div>";}

        echo "</div>";

        //DO need to make it look cool, like cards-->
    
        echo '<br><a class="button" href="/select.php">Add another language!</a>';
    }
    ?>

</div>

<footer>
    <p>&copy; Vocable by Otylia 2023</p>
</footer>

</body>
</html>