<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylesheets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">
    <title>Contact Us</title>
</head>
<body>
    <?php require 'partials/_nav.php' ?>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            require 'partials/_dbconnect.php';

            // inserting the data in the table

            $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `date`) VALUES ('$name', '$email', '$message', current_timestamp());";

            $result = mysqli_query($conn, $sql);
            // echo '<script>alert("Congratulations!! Your form has been submitted")';
        }

    ?>

    <div class="container-contact">

        <div class="form-heading">
            <h1>Contact Us</h1>
            <p>Please fill up this form properly to contact with us</p>
        </div>

        <div class="form-body">
            <form action="/New Project/contact.php" method="post">

                <span class="form-fields"> Full Name </span><br>
                <input type="text" name="name" id="name-box" placeholder="Enter Your Name here"><br><br><br>

                <span class="form-fields"> Email Id </span><br>
                <input type="text" name="email" id="email-box" placeholder="Enter your email here"><br>
                <span style= "color:blue"> Example: xyz@xyz.com </span><br><br><br>

                <span class="form-fields"> Your Message </span><br>
                <textarea name="message" id="msg-box" cols="53" rows="10" placeholder="Enter Your message here"></textarea><br><br>

                <input type="submit" value="SUBMIT" id="submit-btn">

            </form>

        </div>
    
    </div>

    <?php require 'partials/_footer.php' ?>
    
</body>
</html>