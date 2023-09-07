<?php
session_start();
unset($_SESSION['iduser']);
unset($_SESSION['username']);
unset($_SESSION['selected_language']);
session_destroy();
header("Location:login.php");
?>