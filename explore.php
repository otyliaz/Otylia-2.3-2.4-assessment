<!--pretty much the same as addlist.php but you can't edit the lists-->
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
    <title>Explore - Vocable</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<?php
include_once("nav.php");
//ADD require_once("connect.inc");

require_once("connlocal.inc");
$iduser = $_SESSION['iduser'];

$q_username = "SELECT username FROM users where iduser = ";

//gets all the public lists that are associated with the same languages that the user is learning, 
//but excludes lists created by the user themself.
$query="SELECT lists.idlist, lists.listname, lists.level, languages.language, u.username 
FROM lists JOIN user_languages AS ul1 ON lists.iduser_lang = ul1.iduser_lang
JOIN languages ON ul1.idlanguage = languages.idlanguage
JOIN user_languages AS ul2 ON ul1.idlanguage = ul2.idlanguage
JOIN users AS u ON ul2.iduser = u.iduser
WHERE lists.public = 1
AND ul1.iduser <> '26'
AND ul2.iduser = '26'"; 

$result= @mysqli_query ($conn, $query);
?>

<body>
<div class="content">
<h2>Explore published lists in your favourite languages!</h2><br>
<?php 
if (mysqli_num_rows($result) > 0) { 
    echo "<div class='container'>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $idlist = $row['idlist'];
    //the link for the lists
    echo '<div class="card" id="explore"><a id="list" href="/viewwords.php?idlist=' . $idlist . '"><p id="name">' . $row['listname'] . '</p>';
    echo '<p>' . $row['level'] . '</p>'; 
    echo '<p>'. $row['language']. '</p>';
    echo '<p style="font-style:italic;">By '. $row['username']. '</p></a></div>';}

    echo "</div>";
}

else {
    echo '<p>No results found. Choose some more languages to see what other people have put out!</p>';
}
?>

</div>

<footer>
    <p>&copy; Vocable by Otylia 2023</p>
</footer>

</body>
</html>