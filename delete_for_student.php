<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Validating Quiz Input" />
    <meta name="keywords" content="HTML, CSS, PHP" />
    <meta name="author" content="Nelson, Minh, Tom, Joy, Uzi" />
    <title> Quiz Marking Form </title>

    <!-- Viewport set to scale 1.0 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <link rel="stylesheet" href="styles/responsive.css" media="screen and (max-width: 1024px)">
</head>

<body id="mark_body">
    <?php include 'header.inc'; ?>
    <?php
    require_once("settings.php");
    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);

    $del_atte = htmlspecialchars($_POST["del_atte"]);

    if (!$connection) {
        echo "<p> Database connection failure. </p>";
    } else {
        $sql_table = "attempts";

        $query = "delete FROM $sql_table WHERE sid = $del_atte";

        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<p class='logout_link'>$del_atte attempt record has been deleted.</p>";
        } else {
            echo "<p class='logout_link'>no record has been found for $del_atte.</p>";
        }
        echo "<p class='logout_link'><a href='manage.php'>Go Back</a></p>";
        mysqli_close($connection);
    }

    ?>
    <?php include 'footer.inc'; ?>
</body>

</html>