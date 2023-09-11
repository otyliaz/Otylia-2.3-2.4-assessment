
<header>
    <nav class="navbar">
        <div class="logo">
            <a class="logo" href="/"><img id="logo" src="/logo.png" alt="the logo" height="50px" width= "50px"></a>
        </div>
        <ul class="nav_links">
            <!-- CHECKBOX THING -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <!--------------------->
            <div class="menu">
                <li><a href="/explore.php">Explore</a></li>
                <li class="dropdown" id="dropdown">
                    <span class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true"></i><?php echo $_SESSION['username']; ?>
                        <i class="fa fa-caret-down"></i>
                    </span>
                    <div class="dropdown-content">
                        <a href="logout.php">LOGOUT</a> 
                    </div>
                </li> 
            </div>
        </ul>
    </nav>
</header>