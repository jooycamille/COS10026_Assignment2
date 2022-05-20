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
<body>
	<?php include 'header.inc'; ?>
	<section class = "errorbox">
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
			$score = 0;
			if(!isset($_SESSION['attempt'])){
				$_SESSION['attempt'] = 0;
			}
			if (empty($_POST["fname"])){
				$errMsg .= "<p>no first name</p>";
			}
			else {
				$fname = $_POST["fname"];
				$fname = sanitise_input($fname);
				if (!preg_match("/^[a-zA-Z- ]{0,30}$/", $fname)){
					$errMsg .= "<p>Please enter only alpha, hyphens, and space.</p>";
				}
			}	
			if (empty($_POST["lname"])){
				$errMsg .= "<p>no last name</p>";
			}
			else {
				$lname = $_POST["lname"];
				$lname = sanitise_input($lname);
				if (!preg_match("/^[a-zA-Z- ]+$/", $lname)){
					$errMsg .= "<p>Please enter only alpha, hyphens, and space.</p>";
				}
			}
			
			if (empty($_POST["studentid"])){
				$errMsg .= "<p>no student id</p>";
			}
			else {
				$sid = $_POST["studentid"];
				$sid = sanitise_input($sid);
				if (!preg_match("/\d{7,10}/", $sid)){
					$errMsg .= "<p>Please enter only integers 0-9 with a minimum of 7 and a maximum of 10 digits</p>";
				}
			}
			
			if (empty ($_POST["q1"])) {
				$errMsg .= "<p>please answer q1</p>";	
			}
			else{
				$q1 = $_POST["q1"];
				$q1 = sanitise_input($q1);
				if (!preg_match("/^[a-zA-Z- ]+$/", $q1)){
					$errMsg .= "<p>Please enter only alpha, hyphens, and space for question 1</p>";
				}
				if ((strcasecmp($q1,'voice search')== 0)||(strcasecmp($q1,'voice recognition software') == 0)){
					$score += 1;
				}
			}
			
			if (isset ($_POST["q2"])) {
				$q2 = $_POST["q2"];
				$q2 = sanitise_input($q2);
				if (!preg_match("/^[a-zA-Z]+$/", $q2)){
					$errMsg .= "<p>The answer to question 2 is in the wrong format</p>";
				}
				if ($q2 == 'audrey'){
					$score += 1;
				}
			}
			else{
				$errMsg .= "<p>please answer q2</p>";
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
				$errMsg .= "<p>please answer q3</p>";
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
				$errMsg .= "<p>please answer q4</p>";
			}
			
			if (empty ($_POST["q5"])) {
				$errMsg .= "<p>please answer q5</p>";
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
			
			if($errMsg != "") {
				echo"<p>$errMsg</p>";
				$_SESSION['attempt'] += 1;
				if($_SESSION['attempt'] >= 3){
					//stop submitting = time() + (5*60);
					echo"<p>stappp</p>";
				}
				echo $_SESSION['attempt'];
			}
			else {
				echo "<p>Congratulations! You have completed the quiz. <a href='quiz.php'>Retry</a></p>";
				echo "<p>$score</p>";
				$_SESSION['attempt'] += 1;
				if($_SESSION['attempt'] >= 3){
					//stop submitting = time() + (5*60);
					echo"<p>stappp</p>";
				}
				echo $_SESSION['attempt'];
			}

			//Test Successful Connection
			if(!$connection) {
				echo "<p><br><br>Databse connection failure.</p>";
			}
			else {
				//Add Test Data to the Database;
				$sql_table = "attempts";
				$score = 0;
				$numOfAttempts = 0;
				$query = "INSERT INTO `$sql_table`(`id`, `datetime`, `fname`, `lname`, `sid`, `numOfAttempts`, `score`) VALUES ('PRIMARY', '$datetime', '$fname','$lname','$sid', '$numOfAttempts', '$score')";
				$result = mysqli_query($connection, $query);
				
				//Test Result
				if(!$result) {
					echo "<p>Error when adding data to table.</p>";
				}
				else {
					echo "<p>You did it!</p>";
				}
				
				//Free Up 'result' Memory and Close Database Connections
				//mysqli_free_result($result);
				mysqli_close($connection);
			}
		?>
	</section>
	
	<?php include 'footer.inc'; ?>
</body>
</html>
