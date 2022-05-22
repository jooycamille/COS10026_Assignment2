<?php 

    require_once("../settings.php");
	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);

	//Test Connection
	
	if(!$conn) 
	{
		echo "<p>Error connecting to database.</p>";
	}else
    {
        $sql_table = "attempts";

        $query = "select fname, lname, sid FROM $sql_table WHERE score >= 2";

        $result = mysqli_query($conn, $query);

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
            . "</tr>\n";  

            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>\n";
                echo "<td>", $row["fname"], "</td>\n";
                echo "<td>", $row["lname"], "</td>\n";
                echo "<td>", $row["sid"], "</td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";

            mysqli_free_result($result);
        }

        mysqli_close($conn);
        
    }

?>
