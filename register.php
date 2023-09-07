<!DOCTYPE html>
<html lang="en">
<head>  
    <title>doga</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<?php 
//#####require_once("connect.inc");
require_once("connlocal.inc");

//var_dump($_SERVER['REQUEST_METHOD']);
if(isset($_POST['register'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $select = "SELECT `username` FROM users WHERE `username`= '$name'";
    //result 
    $r1= @mysqli_query ($conn, $select);

    //if there is already that username in the database,
    if (mysqli_num_rows($r1) > 0) {
        $nametaken = 'username already taken. choose another one.';}    
        
    else {
        //echo 'username is unique.';
    
        if($_POST['password']==$_POST['confirm'] ) {
            // echo '<p>passwords match</p>' ;
    
                $passworden = hash('sha256', $password);
    
                $query="INSERT INTO `users` (`username`, `password`, `email`, `age`) VALUES ('$name', '$passworden', '$email', '$age')"; 
                //$result= @mysqli_query ($conn, $query);
    
                header("Location: login.php");
    
                //echo $query;
                //var_dump($result);
                //if ($result) {
                //    echo '<p>added :)</p>' ;}
                //else {
                //    echo "<p>didn't work :(</p>";} 
                }
    
            else {
                $confirmerror = "Your passwords don't match, please try again...";
                }
        }
}


mysqli_close($conn);
?>

<body>

<div class="content">
<h2>sign up</h2>

<p>already have an account? click <a href="/login.php">here</a> to login</p>
    <div class="form">
        <form action="register.php" method="post"> 
            <label for="name">username:</label><br>
            <input type="text" name="name" id="name" placeholder="Type here..." required> <br>
            <!-- if the username already exists, then print the error-->
            <?php if (isset($nametaken)) {
                echo '<p class="error">' . $nametaken . '</p>';}
            ?>

            <label for="password">password:</label><br>
            <input type="password" name="password" id="password" placeholder="Type here..." minlength="8" required> <br>
            <label for="confirm">re-type passsword:</label><br>
            <input type="password" name="confirm" id="confirm" placeholder="Type here..." minlength="8" required> 
            <!-- if the passwords don't match, then print the error-->
            <?php if (isset($confirmerror)) {
                echo '<p class="error">' . $confirmerror . '</p>';}
            ?>
            <br>
            
            <label for="email">email:</label><br>
            <input type="email" name="email" id="email" placeholder="Type here..."  required> <br>
            <label for="age">age</label><br>
            <input type="text" name="age" id="age" placeholder="Type here..."> <br>
            <input type="submit" name="register" value="sign up">
        </form>
    </div>
</div>

</body>
</html>