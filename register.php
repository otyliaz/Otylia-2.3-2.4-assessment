<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Home - Vocable</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="./includes/favicon.png">

</head>

<?php
include_once("./includes/nav.php");
require_once("./includes/connlocal.inc");

//var_dump($_SERVER['REQUEST_METHOD']);
if(isset($_POST['register'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $select = "SELECT `username` FROM users WHERE `username`= '$name'";
    //result 
    $r1= mysqli_query ($conn, $select);

    //if there is already that username in the database,
    if (mysqli_num_rows($r1) > 0) {
        $nametaken = 'This username is already taken. Please choose another one.';}    
        
    else {
        //echo 'username is unique.';
    
        if($_POST['password']==$_POST['confirm'] ) {
            // echo '<p>passwords match</p>' ;
    
                $passworden = hash('sha256', $password);
    
                $query="INSERT INTO `users` (`username`, `password`) VALUES ('$name', '$passworden')"; 
                $result= @mysqli_query ($conn, $query);
    
                header("Location: login.php");
    
                //echo $query;
                //var_dump($result);
                //if ($result) {
                //    echo '<p>added :)</p>' ;}
                //else {
                //    echo "<p>didn't work :(</p>";} 
                }
    
            else {
                $confirmerror = "Your passwords don't match, please try again.";
                }
        }
}

mysqli_close($conn);
?>

<body>

<div class="content">
<h2>Sign up!</h2>

<p>Already have an account? Click <a href="/login.php">here</a> to login.</p>
    <div class="form">
        <form action="register.php" method="post"> 
            <label for="name">Username:</label><br>
            <input type="text" name="name" id="name" placeholder="Type here..." required> 
            <!-- if the username already exists, then print the error-->
            <?php if (isset($nametaken)) {
                echo '<p class="error">' . $nametaken . '</p>';}
            ?><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Type here..." minlength="8" required> <br>
            <label for="confirm">Confirm passsword:</label><br>
            <input type="password" name="confirm" id="confirm" placeholder="Type here..." minlength="8" required> 
            <!-- if the passwords don't match, then print the error-->
            <?php if (isset($confirmerror)) {
                echo '<p class="error">' . $confirmerror . '</p>';}
            ?>
            <br>
            <input type="submit" name="register" value="Sign up!">
        </form>
    </div>
</div>

<footer>
    <p>&copy; Vocable by Otylia 2023</p>
</footer>

</body>
</html>