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

//var_dump($_SERVER['REQUEST_METHOD']);
if(isset($_POST['login'])) { //change to POST!!!
        
    $username = $_POST['username'];
    $password = $_POST['password'];

    $passworden = hash('sha256', $password);

    // if username matches password, make a session
    $query = "SELECT iduser FROM users WHERE username = '$username' and password = '$passworden' ";

    $result= @mysqli_query ($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        echo $username . ', you are logged in.';

        //fetches the results from the query
        $row = mysqli_fetch_assoc($result);

        // sets iduser as a session variable
        $iduser = $row["iduser"];
        $_SESSION['iduser'] = $iduser;

        //sets username as a session variable
        $_SESSION['username'] = $username;
        header("Location: home.php");
    }

    else {
        echo 'Your username or password is invalid';}
}
?>

<h2>login</h2>

<p>don't have an account? click <a href="/register.php">here</a> to create one!</p>

<div class="form">
<form action="login.php" method="post"> <!-- change to post-->
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