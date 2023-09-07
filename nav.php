
<header>
    <nav class="navbar">
        <div class="logo">
            <a class="logo" href="/"><img id="logo" src="/logo1.png" alt="the logo" height="50px" width= "50px"></a>
        </div>
        <ul class="nav_links">
            <li><a href="/">study</a></li>
            <li><a href="/">link 2</a></li>
            <li><a href="/">link 3</a></li>
            <li class="dropdown">
                <span class="dropbtn"><?php echo $_SESSION['username']; ?>
                    <i class="fa fa-caret-down"></i>
                </span>
                <div class="dropdown-content">
                    <a href="logout.php">LOGOUT</a> 
                </div>
            </li> 
        </ul>
    </nav>
</header>