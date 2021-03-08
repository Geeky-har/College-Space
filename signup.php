<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylesheets/style.css">
    <title>Sign Up page</title>
</head>

<body>
    <?php require 'partials/_nav.php'  ?>

    <div class="container-contact">

        <div class="form-heading">
            <center>
                <h1>Sign Up Now!!</h1>
                <p>Please fill up this form to create an account</p>
            </center>

        </div>

        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                include 'partials/_dbconnect.php';

                $username = $_POST["uname"];
                $password = $_POST["pass"];
                $cpassword = $_POST["cpass"];

                // check whether the username already exists

                $existsSql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($conn, $existsSql);
                $numRows = mysqli_num_rows($result);

                if($numRows > 0){
                    header('Location: /New Project/index.php?signupsuccess=exists');
                }

                else{
                    if($password == $cpassword){
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                        $sql = " INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$password_hash', current_timestamp()); ";

                        $result = mysqli_query($conn, $sql);

                        if($result){
                            header('Location: /New Project/index.php?signupsuccess=true');

                            exit();
                        }

                        // echo '<script>alert("Your account is successfully created")</script>';
                    }

                    else{
                        // 
                        
                        header('Location: /New Project/index.php?signupsuccess=inc');

                    }
                }
            }

        ?>

        <div class="form-body">
            <form action="/New Project/signup.php" method="post">

                <span class="form-fields"> Username </span><br>
                <input type="text" name="uname" id="name-box" placeholder="Enter username here"><br><br><br>

                <span class="form-fields"> Password </span><br>
                <input type="text" name="pass" id="email-box" placeholder="Enter your password here"><br><br><br>

                <span class="form-fields">Confirm Password </span><br>
                <input type="password" name="cpass" id="email-box" placeholder="Enter your password"><br><br><br>

                <input type="submit" value="CREATE" id="submit-btn">

            </form>

        </div>

    </div>


    <?php require 'partials/_footer.php'  ?>

</body>

</html>