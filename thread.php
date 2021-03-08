<?php require 'partials/_dbconnect.php' ?>

<?php

    // Handling the headings and description of a thread

    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $thread_title = $row['thread_title'];
        $thread_desc = $row['thread_desc'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="Stylesheets/style-forums.css">
    <title>Threads</title>
</head>

<body>

    <?php require 'partials/_nav.php' ?>

    <div class="container-forums">
        <div class="container-head">
            <h2><?php echo $thread_title; ?></h2>
        </div>

        <div class="container-details">
            <p><?php echo $thread_desc; ?></p>
            <br><br>

            <p>Some Forum rules: Don’t challenge or attack others/ Don’t post commercial messages/ All defamatory,
                abusive, profane, threatening, offensive, or illegal materials are strictly prohibited/ Send your
                message only to the most appropriate topic(s).
            </p>
            <br>
            <p><b>Posted By: </b></p>
            <br>

            <div class="container-form">

                <h2 style="font-size: 2rem; margin:25px; margin-left: 0px">Post a Comment Here</h2>

                <!-- $_SERVER['REQUEST_URI'] will hold the full request path including the querystring. -->

                <?php 
                
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

                        echo '
                        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">

                        <span class="form-fields-threads"> Your Comment </span><br>
                        <textarea name="comment" id="question-desc" cols="53" rows="10"
                            placeholder="Your Comment" style="height: 120px; width:350px;"></textarea><br><br>

                        <input type="submit" value="Submit" id="btn-submit-forum">

                        </form>
                        
                        ';
                    }

                    else{
                        echo 'You have to login before commenting anything';
                    }
                
                ?>

                
            </div>

            <?php

                // Handling the submission of a comment of a thread by a user

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $comment = $_POST["comment"];

                    //Inserting data in the database

                    $uname = $_SESSION['username'];

                    $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_date`) VALUES ('$comment', '$id', '$uname', current_timestamp());";

                    $result = mysqli_query($conn, $sql);

                }

            ?>


            <div class="forum-threads">
                <h3>Comments/Discussions</h3>

                <?php

                // Displaying all the available comments from the database

                $id = $_GET['threadid'];
                $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        $thread_id = $row['comment_id'];
                        $thread_comment = $row['comment_content'];
                        $thread_date = $row['comment_date'];
                        $comment_by = $row['comment_by'];
    
                        echo '     <div class="question-card">
                        <div class="user-pic">
                            <img src="images/default-user-pic.png" alt="User-pic" height="100" width="90">
                        </div>
        
                        <div class="user-question">
                        <h4>'.$comment_by.' at '.$thread_date.'</h4>
                            <p style="margin-top: 15px;">'.  $thread_comment  .'</p>
                        </div>
                    </div>     ';
    
                    }
                }

                else{
                    echo 'No Comments found, Be the first one to answer!!';
                }

            ?>

            </div>
        </div>

    </div>

        <?php require 'partials/_footer.php' ?>


</body>

</html>