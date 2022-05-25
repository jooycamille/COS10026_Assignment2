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

    //Test Connection

    if (!$connection) {
        echo "<p>Error connecting to database.</p>";
    } else {
        $sql_table = "attempts";

        $query = "select * FROM $sql_table WHERE (score = 5) AND (numOfAttempts = 1)";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo "<p> Something is wrong with ", $query, "</p>";
        } else {
            echo "<table border=\"1\">\n";
            echo "<tr>\n"
                . "<th scope=\"col\"> Date </th>\n"
                . "<th scope=\"col\"> First Name </th>\n"
                . "<th scope=\"col\"> Last Name </th>\n"
                . "<th scope=\"col\"> Student ID </th>\n"
                . "<th scope=\"col\"> Score </th>\n"
                . "<th scope=\"col\"> Number of Attempts </th>\n"
                . "</tr>\n";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>", $row["datetime"], "</td>\n";
                echo "<td>", $row["fname"], "</td>\n";
                echo "<td>", $row["lname"], "</td>\n";
                echo "<td>", $row["sid"], "</td>\n";
                echo "<td>", $row["score"], "</td>\n";
                echo "<td>", $row["numOfAttempts"], "</td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n </br>";
            echo "<p class='logout_link'><a href='manage.php'>Go Back</a></p>";
            mysqli_free_result($result);
        }
        mysqli_close($connection);
    }

    ?>
    <?php include 'footer.inc'; ?>
</body>

</html>