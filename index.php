<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="StyleSheets/style.css">
    <title>College Space</title>
</head>
<body>
    <?php require 'partials/_nav.php' ?>

    <?php 
        if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']  == 'true'){
            echo '<script>alert("Account successfully created")</script>';
        }

        if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'inc'){
            echo '<script>alert("Passwords does not match")</script>';
        }

        if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'exists'){
            echo '<script>alert("Username already exists")</script>';
        }

        if(isset($_GET['lgin']) && $_GET['lgin'] == 'success'){
            echo '<script>alert("Logged in successfully")</script>';
        }
    
    ?>

    <div class="container-home">
        <h1 style="margin-top: 100px;">Hello</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo aspernatur numquam. Repellat aliquam beatae itaque eligendi nisi ipsa. Eligendi consequatur voluptate doloremque recusandae laboriosam, illum sequi fugiat nostrum mollitia eum, quidem, et repellat dolores! Eveniet, voluptas exercitationem. Cupiditate porro nulla quasi dolor beatae. Libero facilis cum quibusdam adipisci molestias quisquam quia nulla similique ab veniam odit soluta inventore asperiores explicabo odio molestiae eaque consectetur sunt voluptates, est sed exercitationem dolores officiis. Vero ipsa illo accusamus dolores suscipit officia aliquam, deserunt aut ullam vitae tempore fuga nesciunt cupiditate eum saepe. Minus a eos facere dolor corrupti neque commodi aspernatur sunt.</p>
    </div>


    <?php require 'partials/_footer.php' ?>
    
</body>
</html>