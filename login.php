<?php
session_start()
?>

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
require_once("./includes/connlocal.inc");

//var_dump($_SERVER['REQUEST_METHOD']);
if(isset($_POST['login'])) {
        
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
        $_SESSION['iduser'] = $row["iduser"];;

        //sets username as a session variable
        $_SESSION['username'] = $username;
        header("Location: home.php");
    }

    else {
        $invalid = 'Your username or password is invalid. Please try again.';}       
}

mysqli_close($conn);
?>


<body>

<div class="content"> 
    <h1>Log in!</h1>

    <p>Don't have an account? Click <a href="/register.php">here</a> to create one!</p>

    <div class="form">
        <form action="login.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" placeholder="Type here..." required> 
            <br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Type here..." required> 
            <?php if (isset($invalid)) {
                echo '<p class="error">' . $invalid . '</p><br>';}
            ?>
            <input type="submit" name="login" value="Log in!">
        </form>
    </div>

</div>

<footer>
    <p>&copy; Vocable by Otylia 2023</p>
</footer>

</body>
</html>