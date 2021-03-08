<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <?php require 'partials/_nav.php'  ?>

    <div class="container-contact">

        <div class="form-heading">
            <center>
                <h1>Login!!</h1>
                <p>Login now to use the forums of College Space</p>
            </center>

        </div>

        <?php 
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include 'partials/_dbconnect.php';

            $username = $_POST['uname'];
            $password = $_POST['pass'];

            $sql = " select * from `users` where `username` = '$username' ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                if( password_verify( $password, $row['password'] ) ){

                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                }

                header("Location: /New Project/index.php?lgin=success");
                
            }

            else{
                header("Location: /New Project/index.php?incorrect=true");
            }
        }

        ?>

        <div class="form-body">
            <form action="/New Project/login.php" method="post">

                <span class="form-fields"> Username </span><br>
                <input type="text" name="uname" id="name-box" placeholder="Enter username here"><br><br><br>

                <span class="form-fields"> Password </span><br>
                <input type="text" name="pass" id="email-box" placeholder="Enter your password here"><br><br><br>

                <input type="submit" value="LOGIN" id="submit-btn">

            </form>

        </div>

    </div>


    <?php require 'partials/_footer.php'  ?>
</body>

</html>