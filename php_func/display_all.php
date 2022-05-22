<?php 

    require_once("../settings.php");
	$connection = @mysqli_connect($host,$user,$pwd,$sql_db);

	//Test Connection
	
	if(!$connection) 
	{
		echo "<p>Error connecting to database.</p>";
	}else
    {
        $sql_table = "attempts";

        $query = "select * FROM $sql_table";

        $result = mysqli_query($connection, $query);

        if(!$result)
        {
            echo "<p> Something is wrong with", $query, "</p>";
        } else
        {
            echo "<table border=\"1\">\n";
            echo "<tr>\n"
            . "<th scope=\"col\">Date </th>\n"
            . "<th scope=\"col\">Name </th>\n"
            . "<th scope=\"col\">Student ID </th>\n"
			. "<th scope=\"col\">Score </th>\n"
			. "<th scope=\"col\">Number of Attempts </th>\n"
            . "</tr>\n";  

            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>\n";
                echo "<td>", $row["datetime"], "</td>\n";
                echo "<td>", $row["fname"], "</td>\n";
                echo "<td>", $row["sid"], "</td>\n";
				echo "<td>", $row["score"], "</td>\n";
				echo "<td>", $row["numOfAttempts"], "</td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";

            mysqli_free_result($result);
        }

        mysqli_close($connection);
        
    }

?>
