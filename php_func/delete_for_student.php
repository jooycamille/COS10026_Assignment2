<?php
    require_once("../settings.php");
    $conn = @mysqli_connect($host,$user,$pwd,$sql_db);

    $del_atte = htmlspecialchars($_POST["del_atte"]);

    if(!$conn)
    {
        echo "<p> Database connection failure. </p>";
    } else
    {
        $sql_table = "attempts";

        $query = "DELETE FROM $sql_table WHERE sid ='$del_atte'";

        $result = mysqli_query($conn, $query);

        if($result)
        {
            echo "$del_atte attempt record has been deleted.";
        }else
        {
            echo "no record has been found for $del_atte.";
        }

        mysqli_close($conn);
    }

?>