<?php require 'partials/_dbconnect.php' ?>

<?php

    // Handling the headings and description of a category

    $id = $_GET['catid'];
    $sql = "SELECT * FROM `forum_categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }

?>


<?php 


    // Handling the submission of a thread by a user


    $showAlert = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $showAlert = true;
        $question = $_POST["question"];
        $question_desc = $_POST["question-desc"];

        //Inserting data in the database

        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `date/time`) VALUES ('$question', '$question_desc', '$id', '0', current_timestamp());";

        $result = mysqli_query($conn, $sql);

        // if($showAlert){
        //     echo '<script>alert("Your Question is posted!!")';
        // }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="Stylesheets/style-forums.css">
    <title> <?php echo $catname; ?> Forums</title>
</head>

<body>

    <?php require 'partials/_nav.php' ?>


    <div class="container-forums">
        <div class="container-head">
            <h2>Welcome to <?php echo $catname ?> Forums</h2>
        </div>

        <div class="container-details">
            <p><?php echo $catdesc ?></p>
            <br><br>

            <p>Some Forum rules: Don’t challenge or attack others/ Don’t post commercial messages/ All defamatory,
                abusive, profane, threatening, offensive, or illegal materials are strictly prohibited/ Send your
                message only to the most appropriate topic(s).
            </p>
            <br><br>

            <a href="https://www.eassw.org/forum-rules/"><button id="btn-rules">Learn More</button></a>
        </div>

        <div class="thread-form">
            <h2>Start a Discussion</h2>
            <div class="container-form">

            <?php
            
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

                    echo '
                        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">

                            <span class="form-fields-threads"> Problem Title </span><br>
                            <input type="text" name="question" id="question-box" placeholder="Your Question"><br><br><br>

                            <span class="form-fields-threads"> Elaborate your concern </span><br>
                            <textarea name="question-desc" id="question-desc" cols="53" rows="10"
                                placeholder="Your Concern"></textarea><br><br>

                            <input type="submit" value="Submit" id="btn-submit-forum">

                        </form>
                    
                        ';
                    
                }
                
                else{
                    
                    echo 'Log in First' ;
                }
                  
            ?>

            </div>
            

            

        </div>

        <div class="forum-threads">
            <h3>Browse Questions</h3>

            <?php

                // Displaying all the available threads from the database

                $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        $thread_id = $row['thread_id'];
                        $thread_title = $row['thread_title'];
                        $thread_desc = $row['thread_desc'];
    
                        echo '     <div class="question-card">
                        <div class="user-pic">
                            <img src="images/default-user-pic.png" alt="User-pic" height="80" width="80">
                        </div>
        
                        <div class="user-question">
                            <a href="thread.php?threadid='. $thread_id  .'"><h4>'.  $thread_title  .'</h4></a>
                            <br>
                            <p>'.  $thread_desc  .'</p>
                        </div>
                    </div>     ';
    
                    }
                }

                else{
                    echo 'No Questions found, Be the first one to ask!!';
                }

            ?>


            <!-- sample cards for testing purpose -->

            <!-- <div class="question-card">
                <div class="user-pic">
                    <img src="images/default-user-pic.png" alt="User-pic" height="80" width="80">
                </div>

                <div class="user-question">
                    <h4>Unable to install pyaudio in Windows 10</h4>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet odit at labore dolor deleniti,
                        ipsam soluta omnis alias iusto quisquam voluptas explicabo, doloremque a vero, cupiditate
                        maiores quo consectetur molestias.</p>
                </div>
            </div> -->


        </div>
    </div>


    <?php require 'partials/_footer.php' ?>

</body>

</html>