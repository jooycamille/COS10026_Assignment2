<?php 

    require_once("../settings.php");
	$connection = @mysqli_connect($host,$user,$pwd,$sql_db);

	//Test Connection

  	
	if(!$connection) {
		echo "<p>Error connecting to database.</p>";
	}
    else {
       
        $score = $_POST["score_change"];
        $sid = $_POST["ch_score_sid"];
        $att = $_POST["ch_score_att"];

        $score_change = htmlspecialchars($score);
        $ch_score_sid = htmlspecialchars($sid);
        $ch_score_att = htmlspecialchars($att);

        $query = "update $sql_table SET score = $score_change WHERE (sid = $ch_score_sid) AND (numOfAttempts = $ch_score_att)";

        $result = mysqli_query($connection, $query);

         if(!$result) {
            echo "<p> Something is wrong with ", $query, "</p>";
        } 
        else {
            echo "<p>Updated Score for $ch_score_sid. </br>
                Updated Score: $score_change </br>
                </p>";

            $query2 = "select * FROM $sql_table where sid='$ch_score_sid'";
            $result2 = mysqli_query($connection, $query2);

            if(!$result2) {
                echo "<p>Error: ", $query, "</p>";
            }
            else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                . "<th scope=\"col\"> Date </th>\n"
                . "<th scope=\"col\"> First Name </th>\n"
                . "<th scope=\"col\"> Last Name </th>\n"
                . "<th scope=\"col\"> Student ID </th>\n"
                . "<th scope=\"col\"> Score </th>\n"
                . "<th scope=\"col\"> Number of Attempts </th>\n"
                . "</tr>\n";  
        
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr>\n";
                    echo "<td>", $row["datetime"], "</td>\n";
                    echo "<td>", $row["fname"], "</td>\n";
                    echo "<td>", $row["lname"], "</td>\n";
                    echo "<td>", $row["sid"], "</td>\n";
                    echo "<td>", $row["score"], "</td>\n";
                    echo "<td>", $row["numOfAttempts"], "</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
                echo "<p><a href='../manage.php'>Go Back</a></p>";
                mysqli_free_result($result2);
            }
        } 
    }
    mysqli_close($connection);
?>
