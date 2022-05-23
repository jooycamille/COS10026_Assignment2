<?php
session_start();
?>
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
<body id="mark_body">
	<?php include 'header.inc'; ?>
	<section class="mark_container">
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
					return $data;
			}
			
			// echo "<br><br><br><br><br><br><br>";
			
			//Validate Input Data
			$errMsg = "";
			$score = 0;
			if(!isset($_SESSION['attempt'])){
				$_SESSION['attempt'] = 0;
			}
			if (empty($_POST["fname"])){
				$errMsg .= "<p style='color:red;'>*Please enter first name*</p>";
			}
			else {
				$fname = $_POST["fname"];
				$fname = sanitise_input($fname);
				if (!preg_match("/^[a-zA-Z- ]{0,30}$/", $fname)){
					$errMsg .= "<p style='color:red;'>*Please enter only alpha, hyphens, and space*</p>";
				}
			}	
			if (empty($_POST["lname"])){
				$errMsg .= "<p style='color:red;'>*Please enter last name*</p>";
			}
			else {
				$lname = $_POST["lname"];
				$lname = sanitise_input($lname);
				if (!preg_match("/^[a-zA-Z- ]+$/", $lname)){
					$errMsg .= "<p style='color:red;'>*Please enter only alpha, hyphens, and space*</p>";
				}
			}
			
			if (empty($_POST["studentid"])){
				$errMsg .= "<p style='color:red;'>*Please enter student id*</p>";

			}
			else {
				$sid = $_POST["studentid"];
				$sid = sanitise_input($sid);
				if (!preg_match("/\d{7,10}/", $sid)){
					$errMsg .= "<p style='color:red;'>*Please enter only integers 0-9 with a minimum of 7 and a maximum of 10 digits*</p>";
				}
			}
			
			if (empty ($_POST["q1"])) {
				$errMsg .= "<p style='color:red;'>*Please answer question 1*</p>";	

			}
			else{
				$q1 = $_POST["q1"];
				$q1 = sanitise_input($q1);
				if (!preg_match("/^[a-zA-Z- ]+$/", $q1)){
					$errMsg .= "<p style='color:red;'>*Please enter only alpha, hyphens, and space for question 1*</p>";
				}
				if ((strcasecmp($q1,'voice search')== 0)||(strcasecmp($q1,'voice recognition software') == 0)){
					$score += 1;
				}
			}
			
			if (isset ($_POST["q2"])) {
				$q2 = $_POST["q2"];
				$q2 = sanitise_input($q2);
				if (!preg_match("/^[a-zA-Z]+$/", $q2)){
					$errMsg .= "<p style='color:red;'>*The answer to question 2 is in the wrong format*</p>";
				}
				if ($q2 == 'audrey'){
					$score += 1;
				}
			}
			else{
				$errMsg .= "<p style='color:red;'>*Please answer question 2*</p>";
			}
			
			if (isset ($_POST["q3"])) {
				$q3 = $_POST["q3"];
				$q3 = sanitise_input($q3);
				if (!preg_match("/^[a-zA-Z]+$/", $q3)){
					$errMsg .= "<p>The answer to question 3 is in the wrong format</p>";
				}
				if($q3 == 'applesiri'){
					$score += 1;
				}
			}
			else{
				$errMsg .= "<p style='color:red;'>*Please answer question 3*</p>";
			}
			
			if (isset ($_POST["q4"])) {
				$q4 = $_POST["q4"];
				$q4 = sanitise_input($q4);
				if (!preg_match("/^[a-zA-Z]+$/", $q4)){
					$errMsg .= "<p>The answer to question 4 is in the wrong format</p>";
				}
				if ($q4 == 'bio'){
					$score += 1;
				}	
			}
			else{
				$errMsg .= "<p style='color:red;'>*Please answer question 4*</p>";
			}
			
			if (empty ($_POST["q5"])) {
				$errMsg .= "<p style='color:red;'>*Please answer question 5*</p>";
			}
			else{
				$q5 = $_POST["q5"];
				$q5 = sanitise_input($q5);
				if (!preg_match("/^[a-zA-Z- ]+$/", $q5)){
					$errMsg .= "<p>Please enter only alpha, hyphens, and space for question 5</p>";
				}
				if ((strpos($q5, 'convenient')== true)||(strpos($q5, 'disabilities')== true)||(strpos($q5, 'easy')== true)||(strpos($q5, 'efficient')== true)||(strpos($q5, 'easily')== true)||(strpos($q5, 'efficiently')== true)||(strpos($q5, 'remember')== true)){
					$score += 1;
				}
			}
			
			
			if ($errMsg != "") {
				echo "<p> $errMsg </p>";
				
				//Add retry button here.
			}
			else {
				//Test Connection, then get name and sid from database table.
				if(!$connection) {
					echo "<p><br><br>Database connection failure.</p>";
				}
				else {
					$count = 0;
					$query = "select COUNT(*) as num FROM $sql_table WHERE sid = $sid"; // the count counts the number of time the student id exist in the database; num creates a temporary column with the count number of the selected WHERE clause (in this stage student id)
					$result = mysqli_query($connection, $query);

					if (!$result) {
						echo "<p>Something went wrong with finding the student data</p>";
					}
					else {
						$numOfAttempts = mysqli_fetch_array($result); // gives the result set for the query
						$numOfAttempts = $numOfAttempts['num']; // grabbing the temporary column which contains the number of times the selected student id exist
	                    $numOfAttempts += 1; // increments, because when the user doesnt exist, the temp column 'num' is 0, and we need to store 1 for the 1st attempt
					
						if ($numOfAttempts > 2) { 
							echo "<p>You have surpassed the allowed number of attempts. Highest Score will be accepted for grading.</p>";
						}
						else {
							$link = "";
							if ($numOfAttempts == 1) {
								$link = "<a href='quiz.php'><button>Please Retry</button></a>";
							}

							//Create Datetime on sucessful attempt.
							$datetime = date("Y-m-d H:i:s");
							
							//Add Test Data to the Database;
							$insert_query = "insert INTO $sql_table(id, datetime, fname, lname, sid, score, numOfAttempts) VALUES ('PRIMARY', '$datetime', '$fname','$lname', $sid, $score, $numOfAttempts)";
							$insert_result = mysqli_query($connection, $insert_query);
							
							//Test Result
							if(!$insert_result) {
								echo "<p>Error when adding data to table.</p>";
							}
							else {
								echo "<p>
								<strong>First name:</strong> $fname </br>
								<strong>Last name:</strong> $lname </br>
								<strong>ID:</strong> $sid </br>
								<strong>Score:</strong> $score </br>
								</p>";
								echo "<p>Well done!</br></p>";
								echo $link;
							}		
						}
						
						mysqli_free_result($result);
					}
					
					mysqli_close($connection);
				}
			}
		?>
	</section>
	
	<?php include 'footer.inc'; ?>
</body>
</html>
