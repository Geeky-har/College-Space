<?php

    session_start();

    if( isset($_GET['logout'] ) && $_GET['logout'] == true){
        echo '<script>alert("You are successfully, Logged out!!")</script>';
    }

    if( isset($_GET['incorrect'] ) && $_GET['incorrect'] == true){
        echo '<script>alert("Username or Password incorrect")</script>';
    }

echo '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/New Project/Stylesheets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">
    <title></title>
</head>
<body>
    <header>
        <nav id="navbar">
            <ul class="navigation"> ';

            if( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

                echo '<li class="item">
                <a href="partials/_logout.php">
                <input type="submit" value="Log Out" id="submit-btn" style="margin-top: -10px; ">
                </a>
                </li>';

                echo '<li class="item">Welcome '.$_SESSION['username'].'</li>';
            }

            else{
                echo ' 
                <li class="item"><a href="/New Project/signup.php">Sign Up</a></li>
                <li class="item"><a href="/New Project/login.php">Login</a></li> 
                '; 
            }

            echo '
                
                <li class="item"><a href="/New Project/contact.php">Contact Us</a></li>
                <li class="item"><a href="/New Project/about.php">About Us</a></li>
                <li class="item"><a href="/New Project/resources.php">Resources</a></li>
                <li class="item"><a href="/New Project/forums.php">Forums</a></li>
                <li class="item"><a href="/New Project/index.php">Home</a></li> ';

            echo '
            </ul>

            <img id="esp" src="/New Project/images/ndiit logo.jpg" height="80" width="180" alt="NDIIT">
        </nav>

    </header>

</body>
</html>

';

?>