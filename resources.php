<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleSheets/style-resources.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">
    <title>Resources</title>
</head>

<body>
    <?php require 'partials/_nav.php'  ?>

    <div class="container-resources">
        <div class="headings">
            <div id="hsub-name">
                <h5>Subject Name</h5>
            </div>

            <div id="hdiscipline">
                <h5>Discipline</h5>
            </div>

            <div id="hauthor">
                <h5>Author</h5>
            </div>

            <div id="htype">
                <h5>Content Type</h5>
            </div>
        </div>
        <!-- <br> -->
        <hr>

        <?php 
            include 'partials/_dbconnect.php';

            $sql = "SELECT * FROM `resources`";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
                $sname = $row['name'];
                $disc = $row['discipline'];
                $author = $row['author'];
                $type = $row['type'];
                $path = $row['path'];

                echo '<!-- for loop here -->

                <div class="resource-items">
                    <div id="subject">
                        <a href= "'.$path.'" target=_harsh><p>'.$sname.'</p></a>
                    </div>
        
                    <div id="discipline">
                        <p>'.$disc.'</p>
                    </div>
        
                    <div id="author">
                        <p>'.$author.'</p>
                    </div>
        
                    <div id="type">
                        <p>'.$type.'</p>
                    </div>
                </div>
                <br>
                <hr>
                ';
            }


        ?>


    </div>

    <?php require 'partials/_footer.php' ?>

</body>

</html>