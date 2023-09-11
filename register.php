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
//if they submit the form,
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    //query
    $select = "SELECT `username` FROM users WHERE `username` = ?";
    
    if ($stmt = mysqli_prepare($conn, $select)) {

        // bind parameters
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);

        // store the result
        mysqli_stmt_store_result($stmt);

        //check if username already exists
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $nametaken = 'This username is already taken. Please choose another one.';
        } 
        else {
            if ($_POST['password'] == $_POST['confirm']) {
                // hash the password
                $passworden = hash('sha256', $password);

                $query = "INSERT INTO `users` (`username`, `password`) VALUES (?, ?)";

                if ($stmt2 = mysqli_prepare($conn, $query)) {

                    //bind parameters
                    mysqli_stmt_bind_param($stmt2, "ss", $name, $passworden);
                    mysqli_stmt_execute($stmt2);

                    //redirect to login after registering
                    header("Location: login.php");
                    exit();
                }
                else {
                    echo "Error: " . mysqli_error($conn);
                }
            } 
            else {
                $confirmerror = "Your passwords don't match, please try again.";
            }
        }
        //close the statement
        mysqli_stmt_close($stmt);
    } 
    else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<body>

<div class="content login">
<h2>Sign up!</h2>

<p>Already have an account? Click <a href="/login.php">here</a> to login.</p>

<!--form-->
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