<?php
session_start();
if(!isset($_SESSION['iduser'])){
    header("Location: login.php");
    exit();
 }

//###require_once("connect.inc");
require_once("connlocal.inc");

if (isset($_GET['idlist'])) {
    //from the URL
    $idlist = $_GET['idlist'];

    //select to see if there is any vocab inside that list
    $q_selectwords = "SELECT * FROM vocab WHERE idlist = '$idlist'";
    $r_selectwords = @mysqli_query($conn, $q_selectwords);

    //if that list has words, then delete the words.
    if (mysqli_num_rows($r_selectwords) > 0) {
        $q_deletewords = "DELETE FROM vocab WHERE idlist = '$idlist' ";
        $r_deletewords = @mysqli_query($conn, $q_deletewords);
    }

    //if the list doesn't have vocab, then just delete the list
    $q_deletelist = "DELETE FROM lists WHERE idlist = '$idlist' ";
    $r_deletelist = @mysqli_query($conn, $q_deletelist);

}

else {
    header("Location: addlist.php");
}

header("Location: addlist.php");
?>
