<header>
    <div class="navbar">
        <h1><span id="logo">HW_</span>Bros</h1>
        <label for="navcheck" id="navlabel">Menu &#9776;</label>
        <input type="checkbox" id="navcheck">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#skills">Skills</a></li>
                <li><a href="index.php#projects">Projects</a></li>
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
        </nav>
        
        <?php
        if (empty($_SESSION)) {
            echo (
            '<div class="dropdown">
                <button class="dropbtn">Account &#9662;</button>
                <div class="dropdown-content">
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                </div>
            </div>');
        } else {
            echo '
            <form action="login.php" method="post">
                <input class="btn" type="submit" name="logout" value="Logout">
            </form>
            ';
            if(isset($_POST["logout"])) {
                session_destroy();
            }
        }
        ?>


    </div>
</header>