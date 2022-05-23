<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Voice Technology">
    <meta name="author" content="Joy, Nelson, Uzman, Tom, Minh">
    <!-- Viewport set to scale 1.0 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- References to external CSS files-->
    <link rel="stylesheet" href="styles/style.css">
    <!-- References to external fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Sigmar Once font -->
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">
    <!-- Yanone Kaffeesatz font -->
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Yanone+Kaffeesatz:wght@600&display=swap" rel="stylesheet">
    <!-- Roboto font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Exo font -->
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- References to external responsive CSS file -->
    <link rel="stylesheet" href="styles/style.css" media="screen and (max-width: 1024px)">

</head>

<body id="login_body">
    <?php include 'header.inc'; ?>
    <form action="login.php" method="post">
        <?php
            if(isset($_GET["error"])) {
                echo $_GET["error"];
            }
        ?>
        <fieldset>
            <legend><strong>LOGIN</strong></legend>
            <label for="">Username:</label> &nbsp;
            <input type="text" name="username" placeholder="username"> <br>

            <label for="">Password:</label> &nbsp;
            <input type="password" name="userpwd" placeholder="password"> <br>
            
            <!-- <input type="submit" name="login" value="Login"> -->
            <button type="submit" name="login">Login</button>
        </fieldset>
    </form>

    <?php include 'footer.inc'; ?>
</body>

</html>