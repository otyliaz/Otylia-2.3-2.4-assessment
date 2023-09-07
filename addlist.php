<?php
session_start();
if(!isset($_SESSION['iduser'])){
   header("Location: login.php");
}
?>
<!--remember TO SANITIZE INPUTS-->
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
//#########require_once("connect.inc");
require_once("connlocal.inc");

// select from user_languages where language = the language and user = the user
$iduser_lang = $_SESSION['iduser_lang'];

$q_select="SELECT idlist, listname, level FROM lists WHERE iduser_lang = $iduser_lang"; 
$r_select= @mysqli_query ($conn, $q_select);

if(isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $level = $_POST['level'];

    $query="INSERT INTO `lists` (`listname`, `iduser_lang`, `level`) VALUES ('$name', '$iduser_lang', '$level')";
    
    $inserted= @mysqli_query ($conn, $query);

    //echo $_SESSION['iduser_lang'] ; 
    //echo $query;
}

//select from table lists where the idlist=
$selected_language = $_SESSION['selected_language'];
?>

<body>
<div class="content">

<?php 
if (mysqli_num_rows($r_select) > 0) {
    echo '<h2>Here are your lists for ' . $selected_language . ':</h2>';
    //fetches the rows
    while ($row = mysqli_fetch_array($r_select, MYSQLI_ASSOC)) {
    $idlist = $row['idlist'];
    //the link for the lists
    echo '<a href="/addwords.php?idlist=' . $idlist . '"><div class= "loop"><p>' . $row['listname'] . '</p>';
    echo '<p>' . $row['level'] . '</p> </div></a>';} 

    echo '<br><h2>Or create a new list below!</h2>';
}
else{
    echo "<p>Looks like you don't have any vocabulary lists, create one below!</p><br>";
}
?>

    <div class="form">
        <form action="addlist.php" method="post"> 
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