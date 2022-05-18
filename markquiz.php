<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "utf-8" />
	<meta name = "description" content = "Validating Quiz Input"/>
	<meta name = "keywords" content = "HTML, CSS, PHP" />
	<meta name = "author" content  = "Nelson, Minh, Tom, Joy, Uzi" />
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
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Yanone+Kaffeesatz:wght@600&display=swap"
			rel="stylesheet">
    <!-- Roboto font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
			rel="stylesheet">
	<!-- Exo font -->
	<link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet">

	<!-- References to external responsive CSS file -->
	<link rel="stylesheet" href="styles/responsive.css" media="screen and (max-width: 1024px)">
</head>
<body>
	<?php include 'header.inc'; ?>

	<?php 
		//Get Connectiong Settings
		require_once("settings.php");
		
		//Open Server Connection
		$connection = @mysqli_connect($host, $user, $pwd, $sql_db);
		
		//Data Sanitization Function
		function sanitise_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;}
		
		//Sanitize Data
		
		
		//Validate Input Data
		$errMsg = "";
		if (isset ($_POST["fname"])) {
	    $fname = $_POST["fname"];
	    $fname = sanitise_input($fname);	
            }
        else if($fname ==""){
		$errMsg .= "<p>No firstname</p>";
           }
	if (!preg_match("/^[a-zA-z_- ]+$/", $fname))
	{
		$errMsg .= "Please match the requested format";

	}
        if (isset ($_POST["lname"])) {
	    $lname = $_POST["lname"];
	    $lname = sanitise_input($lname);
           }
        else{

		
		$errMsg .= "No lastname";
         }
	if (!preg_match("/^[a-zA-z_- ]+$/", $lname))
	{
		$errMsg .= "Please match the requested format";
	}
		if(isset($_POST["studentid"])) {
			$studentid = $_POST["studentid"];
			$studentid = sanitise_input($studentid);
		}
		else{
			$errMsg .= "No Student ID";
		}
	if (!is_numeric("$studentid"))
	{
		$errMsg .= "Student id must be a number";
	}
		if (!preg_match("/^[a-zA-z_- ]+$/", $studentid))
	{
		$errMsg .= "Please match the requested format";
	}
		if(isset($_POST["q1"])) {
			$q1 = $_POST["q1"];
			$q1 = sanitise_input($q1);
		}
		else{
			$errMsg .= "Please answer proper";

		}
		if(isset($_POST["q2"])) {
			$q2 = $_POST["q2"];
			$q2 = sanitise_input($q2);
		}
		else{

			$errMsg .= "Please answer prop";

		}
		
		if (isset($_POST["q3"])) 
		{
			$q3 = $_POST["q3"];
			$q3 = sanitise_input($q3);
		}
		else 
		{

		$errMsg .= "Please answer pro";	
		}

		if (isset($_POST["q4"])) {
			$q4 = $_POST["q4"];
			$q4 = sanitise_input($q4);
		}
		else {
			$errMsg .= "Please answer pr";

		}

		
		
		
		
		
		
		
		if($errMsg != "") {
			echo"<p>$errMsg</p>";

			echo"<p><a href='quiz.php'>Rretry</a></p>";
		}
		else {
			echo"<p>Congratulations! You have completed the quiz</p>";
			
		}

		//Test Successful Connection
		if(!$connection) {
			echo "<p>Databse connection failure.</p>";
		}
		else {
			//Add Test Data to the Database;
			$sql_table = "results";
			
			$query = "insert into $sql_table (fname, lname, sid) values ($fname, $lname, $studentid)";
			$result = mysqli_query($connection, $query);
			

			//Test Result
			if(!$result) {
				echo "<p>Error when adding data to table.</p>";
			}
			else {
				//success code here
			}
		}
		
		//Free Up 'result' Memory and Close Database Connections
		mysqli_free_result($result);
		mysqli_close($connection);
		
	?>
	
	<?php include 'footer.inc'; ?>
</body>
</html>
