<!DOCTYPE html>
<html lang="en">
<head>  
    <title>dogs</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>hi</h1>


<?php 
//require_once("connect.inc");
require_once("connlocal.inc");

//var_dump($_SERVER['REQUEST_METHOD']);
if(isset($_GET['register'])) { //change to POST!!!
    
    if($_GET['password']==$_GET['confirm']) {
       // echo '<p>passwords match</p>' ;
        
        $name = $_GET['name'];
        $password = $_GET['password'];
        $email = $_GET['email'];
        $age = $_GET['age'];

        $passworden = hash('sha256', $password);

        $query="INSERT INTO `users` (`username`, `password`, `email`, `age`) VALUES ('$name', '$passworden', '$email', '$age')"; 

        $result= @mysqli_query ($conn, $query);

        header("Location: login.php");

        //echo $query;
        //var_dump($result);
        //if ($result) {
        //    echo '<p>added 👍</p>' ;}
        //else {
        //    echo "<p>didn't work 😕</p>";} 
        }

    else {
        echo "<p>Your passwords don't match, please try again...</p>";
        }
}
?>

<h2>sign up</h2>
<div class="form">
<form action="register.php" method="get"> <!-- change to post-->
    <label for="name">username:</label><br>
    <input type="text" name="name" id="name" placeholder="Type here..." required> 
    <br>
    <!-- this username is already taken-->
    <label for="password">password:</label><br>
    <input type="password" name="password" id="password" placeholder="Type here..." minlength="8" required> <br>
    <label for="confirm">re-type passsword:</label><br>
    <input type="password" name="confirm" id="confirm" placeholder="Type here..." minlength="8" required> <br>
    <label for="email">email:</label><br>
    <input type="email" name="email" id="email" placeholder="Type here..."  required> <br>
    <label for="age">age</label><br>
    <input type="text" name="age" id="age" placeholder="Type here..."> <br>
    <input type="submit" name="register" value="sign up">
</form>
</div>


</body>
</html>