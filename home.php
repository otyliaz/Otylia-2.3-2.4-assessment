<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <title>change this</title>
    <meta charset="UTF-16" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">
            <a class="logo" href="/"><img id="logo" src="" alt="the logo here"></a>
        </div>
        <ul class="nav_links">
            <li><a href="/">study</a></li>
            <li><a href="/">link 2</a></li>
            <li><a href="/">link 3</a></li>
            <div class="dropdown">
            <button class="dropdown"><?php echo $_SESSION['username']; ?>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="logout.php">LOGOUT</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div> 
        </ul>
    </nav>
</header>

<div class="content">
    <h2>cool catchphrase</h2>
    <p>sub-heading start now </p>
    <a href="/">LETS GO - button</a>
</div>

<footer>
    <div class="container">
      <p>&copy; otylia 2023</p>
    </div>
</footer>

</body>
</html>