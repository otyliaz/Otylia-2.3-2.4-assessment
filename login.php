<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <title>login page</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>login page</h1>

<?php 
//require_once("connect.inc");
require_once("connlocal.inc");

//if(isset($_SESSION['username'])){
  //  echo $_SESSION['username'];}

//var_dump($_SERVER['REQUEST_METHOD']);
if(isset($_GET['login'])) { //change to POST!!!
        
    $username = $_GET['username'];
    $password = $_GET['password'];

    $passworden = hash('sha256', $password);

    // if username matches password, make a session
    $query = "SELECT iduser FROM users WHERE username = '$username' and password = '$passworden' ";

    $result= @mysqli_query ($conn, $query);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo $username . ', you are logged in.';
        $_SESSION['username'] = $username;
        header("Location: home.php");
    }

    else {
        echo 'Your username or password is invalid';}
}
?>

<h2>login</h2>
<div class="form">
<form action="login.php" method="get"> <!-- change to post-->
    <label for="username">username:</label><br>
    <input type="text" name="username" id="username" placeholder="Type here..." required> 
    <br>
    <label for="password">password:</label><br>
    <input type="password" name="password" id="password" placeholder="Type here..." required> 
    <input type="submit" name="login" value="log in!">
</form>
</div>



</body>
</html>