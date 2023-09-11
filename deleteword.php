<?php
session_start();
if(!isset($_SESSION['iduser'])){
    header("Location: login.php");
    exit();
 }

//###require_once("connect.inc");
require_once("connlocal.inc");

if (isset($_GET['idword'])) {
    //from the URL

    $idword = $_GET['idword'];

    $q_deleteword = "DELETE FROM vocab WHERE idword = '$idword' ";
    $r_deleteword = @mysqli_query($conn, $q_deleteword);
}
else {
    header("Location: addwords.php?idlist=" . $_GET['idlist']);
    exit();
}

header("Location: addwords.php?idlist=" . $_GET['idlist']);
exit();
?>
