<!--This page is basically the same as addwords.php, but you can't edit the words and you can only view them-->
<?php
session_start();
if(!isset($_SESSION['iduser'])){
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once("./includes/connlocal.inc");

if (isset($_GET['idlist'])) {
$idlist = $_GET['idlist'];

$q_validate = "SELECT * FROM lists WHERE idlist = $idlist AND public = 1";
$r_validate = @mysqli_query($conn, $q_validate);

if (mysqli_num_rows($r_validate) == 0) {
    // the user does not have access to this list so redirect
    header("Location: home.php");
    exit();
}

//selects the listname for display
$q_list="SELECT listname FROM lists WHERE idlist = $idlist"; 
$r_list= @mysqli_query ($conn, $q_list);

$row1 = mysqli_fetch_array($r_list, MYSQLI_ASSOC);
$listname = $row1['listname'];}
/////////////////////

else {
    header("Location: home.php");
}
?>

<head>  
    <?php echo '<title> View ' . $listname . ' - Vocable</title>'?>
    <meta charset="UTF-16" name="+viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="./includes/favicon.png">
</head>

<?php

include_once("./includes/nav.php");
$q_vocab="SELECT wordTL, translation, pronunciation FROM vocab WHERE idlist = $idlist"; 
$r_vocab= @mysqli_query ($conn, $q_vocab);

mysqli_close($conn);

?>

<body>
<div class="content">

<?php
if (mysqli_num_rows($r_vocab) > 0) {
    echo '<h2>' . $listname . ':</h2>';

    //start the table
    echo '<table class="vocab-table">';

    //fetches the rows
    while ($row = mysqli_fetch_array($r_vocab, MYSQLI_ASSOC)) {

        echo '<tr>';
        echo '<td style="font-weight:bold;">' . $row['wordTL'] . '</td>';
        echo '<td>' . $row['pronunciation'] . '</td>';
        echo '<td>' . $row['translation'] . '</td>';

        echo '</tr>';}

    echo '</table>';}

else {
echo "<p>The person who made this list has no entries... Sorry! Come back another time.</p>";}
?>
</div>

<footer>
    <p>&copy; Vocable by Otylia 2023</p>
</footer>

</body>
</html>