<?php
    require_once("../settings.php");
    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);

    $del_atte = htmlspecialchars($_POST["del_atte"]);

    if (!$connection) {
        echo "<p> Database connection failure. </p>";
    } else {
        $sql_table = "attempts";

        $query = "delete FROM $sql_table WHERE sid = $del_atte";

        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "$del_atte attempt record has been deleted.";
        } else {
            echo "no record has been found for $del_atte.";
        }
        echo "<p><a href='../manage.php'>Go Back</a></p>";
        mysqli_close($connection);
    }

?>