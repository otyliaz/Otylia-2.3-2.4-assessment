<?php
session_start();
if(!isset($_SESSION['iduser'])){
    header("Location: login.php");
    exit();
 }

//###require_once("connect.inc");
require_once("connlocal.inc");

if (isset($_GET['language'])) {
    //from the URL
    $selected_language = $_GET['language'];
    $iduser = $_SESSION['iduser'];

    //finds the iduser_lang that is the language they want to delete
    $q_selectuser_lang = "SELECT iduser_lang FROM user_languages WHERE iduser = '$iduser' AND idlanguage = (SELECT idlanguage FROM languages WHERE language = '$selected_language')";
    $r_selectuser_lang = @mysqli_query($conn, $q_selectuser_lang);

    //then finds if there are any lists under that iduser_lang.
    if ($row = mysqli_fetch_assoc($r_selectuser_lang)) {
        $iduser_lang = $row['iduser_lang'];

        $q_selectlists = "SELECT idlist FROM lists WHERE iduser_lang = '$iduser_lang'";
        $r_selectlists = @mysqli_query($conn, $q_selectlists);

        //if there are lists, find if the lists have any words
        if (mysqli_num_rows($r_selectlists) > 0) {
            $liststodelete = [];

            while ($row = mysqli_fetch_assoc($r_selectlists)) {
                $liststodelete[] = $row['idlist'];
            }

            $idlists_string = implode(',', $liststodelete);

            //select to see if there is any vocab under the lists
            $q_selectwords = "SELECT * FROM vocab WHERE idlist IN ($idlists_string)";
            $r_selectwords = @mysqli_query($conn, $q_selectwords);

            //if the lists have words, then delete the words.
            if (mysqli_num_rows($r_selectwords) > 0) {
                $q_deletewords = "DELETE FROM vocab WHERE idlist IN ($idlists_string)";
                $r_deletewords = @mysqli_query($conn, $q_deletewords);
            }

            //if the lists don't have vocab, then just delete the lists
            $q_deletelists = "DELETE FROM lists WHERE idlist IN ($idlists_string)";
            $r_deletelists = @mysqli_query($conn, $q_deletelists);
        }

        //if there are no lists, then just delete the user_lang
        $q_deleteuser_lang = "DELETE FROM user_languages WHERE iduser_lang = '$iduser_lang'";
        $r_deleteuser_lang = @mysqli_query($conn, $q_deleteuser_lang);
    }
}

else {
    header("Location: home.php");
}

header("Location: home.php");
?>
