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

$iduser = $_SESSION['iduser'];

$q_validate = "SELECT * FROM lists WHERE idlist = $idlist AND iduser_lang IN (
    SELECT iduser_lang FROM user_languages WHERE iduser = $iduser)";
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="./includes/favicon.png">
</head>

<?php
include_once("/.includes/nav.php");
$q_vocab="SELECT idword, wordTL, translation, pronunciation FROM vocab WHERE idlist = $idlist"; 
$r_vocab= @mysqli_query ($conn, $q_vocab);

//echo $idlist;
if(isset($_POST['submit'])) {
    
    $wordTL = $_POST['wordTL'];
    $translation = $_POST['translation'];
    $pronunciation = $_POST['pronunciation'];

    $query="INSERT INTO `vocab` (`idlist`, `wordTL`, `translation`, `pronunciation`) VALUES ('$idlist','$wordTL', '$translation', '$pronunciation')";
    
    $inserted= @mysqli_query ($conn, $query);

    header("Location: addwords.php?idlist=" . $idlist);
    exit();

    //echo $_SESSION['iduser_lang'] ; 
    //echo $query;
}

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
        echo '<td>' . $row['wordTL'] . '</td>';
        echo '<td>' . $row['pronunciation'] . '</td>';
        echo '<td>' . $row['translation'] . '</td>';
        echo '<td><a class="button delete" id="delete-word" href="/deleteword.php?idword=' . $row['idword'] . '&idlist=' . $idlist . '">Delete</a></td>';        

        echo '</tr>';}

    echo '</table>';

    echo '<br><h2>Add some more words below!</h2>';
}
else {
    echo "<h2>You don't have anything in this list... Add some words to ". $listname."! </h2>";}
?>

<div class="form">
        <?php echo '<form action="addwords.php?idlist=' . $idlist . '" method="post">' ?>
            <label for="wordTL">Your word:</label><br>
            <input type="text" name="wordTL" id="wordTL" placeholder="Type here..." required> <br>
            <label for="translation">Translation:</label><br>
            <input type="text" name="translation" id="translation" placeholder="Type here..." required> <br>
            <label for="pronunciation">Pronunciation (optional):</label><br>
            <input type="text" name="pronunciation" id="pronunciation" placeholder="Type here..."> <br>
            <!--<input type="hidden" name="idlist" value="<?php //echo $idlist; ?>">-->
            <input type="submit" name="submit" value="Go!">
        </form>
    </div>


</div>

<footer>
    <p>&copy; Vocable by Otylia 2023</p>
</footer>

</body>
</html>