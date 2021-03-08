<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleSheets/style-forum.css">
    <script src="https://kit.fontawesome.com/d14fcf947d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">
    <title>Forums - College Space</title>
</head>

<body>

    <?php require 'partials/_nav.php' ?>
    <?php require 'partials/_dbconnect.php' ?>

    <div class="container-forum">
        <div class="head">
            <h1>Forum - Categories</h1>
        </div>

        <?php
        
        $sql = "SELECT * FROM `forum_categories`";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['category_id'];
            $cat = $row['category_name'];
            $desc = $row['category_description'];

            echo '      <div class="container">
            <div class="card">
                <img src="https://source.unsplash.com/400x200/?'.$cat.',study">
                <div class="info">
                    <h2><b><a href="threadlist.php?catid='. $id .'">'.$cat.'</a></b></h2>
                    <p>'.$desc.'</p>
                    <a href="threadlist.php?catid='. $id .'"><button class="btn">Know More<i class="fas fa-angle-double-right"></i></button></a>
                </div>
            </div>      ';

        }
        
        ?>

    </div>

</body>

</html>