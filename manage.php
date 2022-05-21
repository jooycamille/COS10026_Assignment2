<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "utf-8" />
	<meta name = "description" content = "Viewing Table of Score"/>
	<meta name = "keywords" content = "HTML, CSS, PHP" />
	<meta name = "author" content  = "Nelson, Minh, Tom, Joy, Uzi" />
	<title> Manage </title>
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
	
	<h1> Manager's Page </h1>
	
	<!-- Need to create buttons for each query. Some buttons will need input fields (form) alongside them. -->
	
	<section class = "manage_section">
	<?php
		//Get Connectiong Settings
		require_once("settings.php");
			
		//Button Functions
		function List100() {
			
		}
		function List50() {
			
		}
		function DeleteBySID($id) {
			
		}
		function ChangeScore($score) {
			
		}
			
		//Open Server Connection
		$connection = @mysqli_connect($host, $user, $pwd, $sql_db);
		
		//Default query gets the whole table.
		$query = "SELECT * FROM $sql_table";
		
	?>
	
		<button type="button">List 100% Scores</button>
		<button type="button">List Scores more than 50%</button>
		<button type="button">Delete</button>
		<button type="button">Change Score</button>
		
	<?php
		
		//Test Connection
		if(!$connection) {
			echo "<p>Error connecting to database.</p>";
		}
		else {
			//Run Queries
			$result = mysqli_query($connection, $query);
			
			//Test Result
			if(!$result) {
				echo "<p>Error in query.</p>";
			}
			else {
				//Display table with data from the database.
				echo "<table border = \"1\">";
				echo "<tr>"
					."<th> First Name </th>"
					."<th> Last Name </th>"
					."<th> Student ID </th>"
					."<th> Score </th>"
					."<th> Date/Time of Test </th>"
					."</tr>";
				
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>", $row["fname"], "</td>";
					echo "<td>", $row["lname"], "</td>";
					echo "<td>", $row["sid"], "</td>";
					echo "<td>", $row["score"], "</td>";
					echo "<td>", $row["datetime"], "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}
	?>
	</section>
	
	<?php include 'footer.inc'; ?>
</body>
</html>